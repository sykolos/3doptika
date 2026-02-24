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

    $ok  = ($status >= 200 && $status < 300) ? '1' : '0';
    $msg = rawurlencode($payload['message'] ?? '');
    $back = $_SERVER['HTTP_REFERER'] ?? '/';
    $sep = (str_contains($back, '?')) ? '&' : '?';
    header("Location: {$back}{$sep}sent={$ok}&m={$msg}");
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    respond(['ok' => false, 'message' => 'Method not allowed'], 405);
}

/* ---------------- CONFIG ---------------- */

$CFG = [
    'to_email'   => 'janos.kolos1@gmail.com',
    'to_name'    => '3D Optika',

    'from_email' => 'info@3doptika.hu',
    'from_name'  => '3D Optika weboldal',

    'smtp_host'  => 'mail.3doptika.hu',
    'smtp_user'  => 'info@3doptika.hu',
    'smtp_pass'  => '!55Attila61?',
    'smtp_port'  => 465,
    'smtp_secure'=> 'ssl',

    'rate_limit_seconds' => 60,
    'honeypot_field'     => 'website',
];

/* ---------------- SPAM VÉDELEM ---------------- */

$honeypot = trim((string)($_POST[$CFG['honeypot_field']] ?? ''));
if ($honeypot !== '') {
    respond(['ok' => true, 'message' => 'OK'], 200);
}

$ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$rateDir = __DIR__ . '/_rate';
if (!is_dir($rateDir)) @mkdir($rateDir, 0755, true);

$rateFile = $rateDir . '/' . hash('sha256', $ip) . '.txt';
$now = time();
$last = is_file($rateFile) ? (int)@file_get_contents($rateFile) : 0;

if ($last > 0 && ($now - $last) < (int)$CFG['rate_limit_seconds']) {
    respond(['ok' => false, 'message' => 'Kérlek várj egy kicsit az újabb küldéssel.'], 429);
}

@file_put_contents($rateFile, (string)$now, LOCK_EX);

/* ---------------- VALIDÁLÁS ---------------- */

$lastName  = trim((string)($_POST['last_name'] ?? ''));
$firstName = trim((string)($_POST['first_name'] ?? ''));
$phone     = trim((string)($_POST['phone'] ?? ''));
$email     = trim((string)($_POST['email'] ?? ''));
$service   = trim((string)($_POST['service'] ?? ''));
$message   = trim((string)($_POST['message'] ?? ''));
$consent   = (string)($_POST['consent'] ?? '');

if ($lastName === '' || $firstName === '' || $phone === '') {
    respond(['ok' => false, 'message' => 'Kérlek töltsd ki a kötelező mezőket.'], 422);
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(['ok' => false, 'message' => 'Hibás email formátum.'], 422);
}

foreach ([$lastName, $firstName, $email] as $v) {
    if (preg_match("/\r|\n/", $v)) {
        respond(['ok' => false, 'message' => 'Érvénytelen bemenet.'], 400);
    }
}

/* ---------------- AUTOLOAD ---------------- */

$autoload = __DIR__ . '/vendor/autoload.php';
if (!is_file($autoload)) {
    respond(['ok' => false, 'message' => 'PHPMailer autoload nem található.'], 500);
}
require $autoload;

/* ---------------- EMAIL ---------------- */

$fullName = htmlspecialchars($lastName . ' ' . $firstName);
$phoneEsc = htmlspecialchars($phone);
$emailEsc = htmlspecialchars($email);
$serviceEsc = htmlspecialchars($service);
$messageEsc = nl2br(htmlspecialchars($message));
$time = date('Y-m-d H:i:s');

$subject = "Új visszahívás kérés - {$fullName}";

/* TEXT fallback */
$bodyText = 
"Új visszahívás kérés érkezett

Név: {$fullName}
Telefon: {$phone}
Email: {$email}
Szolgáltatás: {$service}

Üzenet:
{$message}

Idő: {$time}
IP: {$ip}";

/* HTML verzió */
$bodyHtml = "
<!DOCTYPE html>
<html>
<body style='font-family:Arial,sans-serif;background:#f4f6f8;padding:20px;'>
<div style='max-width:600px;margin:auto;background:#fff;padding:24px;border-radius:8px;'>

<h2 style='margin-top:0;color:#0f172a;'>Új visszahívás kérés</h2>

<table width='100%' cellpadding='8' cellspacing='0' style='border-collapse:collapse;'>
<tr><td><strong>Név:</strong></td><td>{$fullName}</td></tr>
<tr><td><strong>Telefon:</strong></td><td>{$phoneEsc}</td></tr>
<tr><td><strong>Email:</strong></td><td>{$emailEsc}</td></tr>
<tr><td><strong>Szolgáltatás:</strong></td><td>{$serviceEsc}</td></tr>
<tr>
<td style='vertical-align:top;'><strong>Üzenet:</strong></td>
<td>{$messageEsc}</td>
</tr>
</table>

<hr style='margin:24px 0;'>

<p style='font-size:12px;color:#64748b;'>
Idő: {$time}<br>
IP: {$ip}
</p>

</div>
</body>
</html>";

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

    $mail->setFrom($CFG['from_email'], $CFG['from_name']);
    $mail->addAddress($CFG['to_email'], $CFG['to_name']);

    if ($email !== '') {
        $mail->addReplyTo($email, $fullName);
    }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $bodyHtml;
    $mail->AltBody = $bodyText;

    $mail->send();

    respond(['ok' => true, 'message' => 'Köszönjük! Hamarosan visszahívunk.'], 200);

} catch (Exception $e) {
    respond(['ok' => false, 'message' => 'Hiba történt a küldés során.'], 500);
}