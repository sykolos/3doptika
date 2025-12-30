<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('X-Content-Type-Options: nosniff');

function wants_json(): bool {
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    $xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '';
    return str_contains($accept, 'application/json') || strtolower($xhr) === 'xmlhttprequest';
}

function respond(array $payload, int $status = 200): void {
    http_response_code($status);

    if (wants_json()) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    // Nem-AJAX: visszadobás a formhoz query parammal (egyszerű)
    $ok = ($status >= 200 && $status < 300) ? '1' : '0';
    $msg = rawurlencode($payload['message'] ?? '');
    $back = $_SERVER['HTTP_REFERER'] ?? '/';
    $sep = (str_contains($back, '?')) ? '&' : '?';
    header("Location: {$back}{$sep}sent={$ok}&m={$msg}");
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    respond(['ok' => false, 'message' => 'Method not allowed'], 405);
}

/**
 * --------------- CONFIG ---------------
 * Ezeket töltsd ki a tárhelyed SMTP adataival.
 * cPanelben jellemzően:
 * - Host: mail.sajatdomain.hu vagy a szolgáltató által adott
 * - User: info@3doptika.hu
 * - Pass: az email fiók jelszava
 * - Port: 465 (SSL) vagy 587 (TLS)
 */
$CFG = [
    'to_email'   => 'janos.kolos1@gmail.com',
    'to_name'    => '3D Optika',

    'from_email' => 'info@3doptika.hu',      // legyen ugyanazon domain, jobb kézbesíthetőség
    'from_name'  => '3D Optika weboldal',

    'smtp_host'  => 'mail.3doptika.hu',      // <-- írd át
    'smtp_user'  => 'info@3doptika.hu',      // <-- írd át
    'smtp_pass'  => '!55Attila61?',      // <-- írd át
    'smtp_port'  => 465,                     // 465 vagy 587
    'smtp_secure'=> 'ssl',                   // 'ssl' (465) vagy 'tls' (587)

    'rate_limit_seconds' => 60,              // 1 üzenet / perc / IP
    'honeypot_field'     => 'website',       // rejtett mező neve a formban
];

// Honeypot (ha bot kitölti, “csendben” eldobhatod)
$honeypot = trim((string)($_POST[$CFG['honeypot_field']] ?? ''));
if ($honeypot !== '') {
    respond(['ok' => true, 'message' => 'OK'], 200);
}

// Rate limit (nagyon egyszerű fájl alapú)
$ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$rateDir = __DIR__ . '/_rate';
if (!is_dir($rateDir)) {
    @mkdir($rateDir, 0755, true);
}
$rateFile = $rateDir . '/' . hash('sha256', $ip) . '.txt';
$now = time();
$last = is_file($rateFile) ? (int)@file_get_contents($rateFile) : 0;
if ($last > 0 && ($now - $last) < (int)$CFG['rate_limit_seconds']) {
    respond(['ok' => false, 'message' => 'Kérlek várj egy kicsit az újabb küldéssel.'], 429);
}
@file_put_contents($rateFile, (string)$now, LOCK_EX);

// Adatok beolvasása + validálás
$lastName  = trim((string)($_POST['last_name'] ?? ''));
$firstName = trim((string)($_POST['first_name'] ?? ''));
$phone     = trim((string)($_POST['phone'] ?? ''));
$email     = trim((string)($_POST['email'] ?? ''));
$service   = trim((string)($_POST['service'] ?? ''));
$message   = trim((string)($_POST['message'] ?? ''));
$consent   = (string)($_POST['consent'] ?? ''); // csak akkor jön, ha adsz name-et a checkboxnak

if ($lastName === '' || $firstName === '' || $phone === '') {
    respond(['ok' => false, 'message' => 'Kérlek töltsd ki a kötelező mezőket (név, telefon).'], 422);
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(['ok' => false, 'message' => 'Hibás email formátum.'], 422);
}

// Consent ellenőrzés (csak ha ténylegesen küldöd a mezőt)
if ($consent !== '' && $consent !== '1' && strtolower($consent) !== 'on') {
    respond(['ok' => false, 'message' => 'Az adatkezelési nyilatkozat elfogadása kötelező.'], 422);
}

// Header injection elleni minimál védelem (új sorok tiltása pár mezőben)
foreach ([$lastName, $firstName, $email] as $v) {
    if (preg_match("/\r|\n/", $v)) {
        respond(['ok' => false, 'message' => 'Érvénytelen bemenet.'], 400);
    }
}

// PHPMailer autoload
// 1) Ha a szerveren van composer vendor a projektedben (rootban), és ez a fájl root alatt van:
// require __DIR__ . '/../../vendor/autoload.php';
//
// 2) Ha ebbe a /api/quote mappába teszed a vendor-t:
// composer require phpmailer/phpmailer
$autoloadCandidates = [
    __DIR__ . '/vendor/autoload.php',
    __DIR__ . '/../../vendor/autoload.php',
    __DIR__ . '/../../../vendor/autoload.php',
];
$autoloadFound = false;
foreach ($autoloadCandidates as $path) {
    if (is_file($path)) {
        require $path;
        $autoloadFound = true;
        break;
    }
}
if (!$autoloadFound) {
    respond(['ok' => false, 'message' => 'PHPMailer autoload nem található (vendor/autoload.php).'], 500);
}

// Email összeállítás
$fullName = $lastName . ' ' . $firstName;
$subject  = 'Visszahívás kérés - ' . $fullName;

// Hasznos meta
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ref = $_SERVER['HTTP_REFERER'] ?? '';
$time = date('Y-m-d H:i:s');

$bodyText = "Új visszahívás kérés érkezett.\n\n"
    . "Név: {$fullName}\n"
    . "Telefon: {$phone}\n"
    . "Email: " . ($email !== '' ? $email : '-') . "\n"
    . "Szolgáltatás: " . ($service !== '' ? $service : '-') . "\n"
    . "Üzenet:\n" . ($message !== '' ? $message : '-') . "\n\n"
    . "---- Technikai adatok ----\n"
    . "Idő: {$time}\n"
    . "IP: {$ip}\n"
    . "User-Agent: {$ua}\n"
    . "Referer: {$ref}\n";

try {
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    $mail->isSMTP();
    $mail->Host       = $CFG['smtp_host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $CFG['smtp_user'];
    $mail->Password   = $CFG['smtp_pass'];
    $mail->Port       = (int)$CFG['smtp_port'];
    $mail->SMTPSecure = $CFG['smtp_secure'];

    // Feladó / címzett
    $mail->setFrom($CFG['from_email'], $CFG['from_name']);
    $mail->addAddress($CFG['to_email'], $CFG['to_name']);

    // Reply-To: ha a user megadott emailt, arra tudj válaszolni
    if ($email !== '') {
        $mail->addReplyTo($email, $fullName);
    }

    $mail->Subject = $subject;
    $mail->Body    = $bodyText;
    $mail->AltBody = $bodyText;

    $mail->send();

    respond(['ok' => true, 'message' => 'Köszönjük! Hamarosan visszahívunk.'], 200);
} catch (Exception $e) {
    // Opcionális: log
    $logDir = __DIR__ . '/_logs';
    if (!is_dir($logDir)) {
        @mkdir($logDir, 0755, true);
    }
    @file_put_contents($logDir . '/mail_errors.log', '[' . date('c') . '] ' . $e->getMessage() . "\n", FILE_APPEND);

    respond(['ok' => false, 'message' => 'Hiba történt a küldés közben. Kérlek próbáld meg később.'], 500);
}
