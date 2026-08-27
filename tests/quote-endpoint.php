<?php

#[AllowDynamicProperties]
class RecordingMailer
{
    private array $recipients = [];
    private array $replyTo = [];

    public function isSMTP(): void {}
    public function setFrom(string $email, string $name): void {}
    public function isHTML(bool $html): void {}

    public function addAddress(string $email, string $name): void
    {
        $this->recipients[] = $email;
    }

    public function addReplyTo(string $email, string $name): void
    {
        $this->replyTo[] = $email;
    }

    public function send(): bool
    {
        if ($this->recipients !== ['3doptika@gmail.com', 'info@3doptika.hu']) {
            throw new RuntimeException('Incorrect recipients');
        }
        if ($this->replyTo !== ['visitor@example.test']) {
            throw new RuntimeException('Incorrect reply-to');
        }
        file_put_contents(__DIR__ . '/sent.json', json_encode($this->recipients));
        return true;
    }
}

if (($argv[1] ?? '') === '--request') {
    // Replace the mail transport before the endpoint loads PHPMailer: no network or real mail.
    class_alias(RecordingMailer::class, 'PHPMailer\\PHPMailer\\PHPMailer');
    $_SERVER = ['REQUEST_METHOD' => 'POST', 'HTTP_ACCEPT' => 'application/json', 'REMOTE_ADDR' => '127.0.0.1'];
    $_POST = [
        'last_name' => 'Test', 'first_name' => 'Visitor', 'phone' => '000000000',
        'email' => 'visitor@example.test', 'consent' => '1', 'message' => 'Automated local test',
    ];
    require __DIR__ . '/send.php';
    exit;
}

$directory = sys_get_temp_dir() . '/3doptika-mail-' . bin2hex(random_bytes(8));
mkdir($directory . '/vendor', 0700, true);
try {
    copy(__FILE__, $directory . '/test.php');
    copy(__DIR__ . '/../source/api/quote/send.php', $directory . '/send.php');
    file_put_contents($directory . '/vendor/autoload.php', '<?php');
    $process = proc_open([PHP_BINARY, $directory . '/test.php', '--request'], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
    $output = stream_get_contents($pipes[1]);
    $error = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    $status = proc_close($process);

    if ($status !== 0 || (json_decode($output, true)['ok'] ?? false) !== true || !is_file($directory . '/sent.json')) {
        throw new RuntimeException('Quote endpoint test failed: ' . $error . $output);
    }
    echo "PASS: contact endpoint sends to both requested recipients; no real email sent.\n";
} finally {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) {
        $file->isDir() ? rmdir($file->getPathname()) : unlink($file->getPathname());
    }
    rmdir($directory);
}
