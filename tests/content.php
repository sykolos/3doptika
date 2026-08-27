<?php

$loadContent = require __DIR__ . '/../scripts/load-content.php';
$path = tempnam(sys_get_temp_dir(), '3doptika-content-');
$valid = [['title' => 'Service', 'content' => '<p>Description</p>']];

try {
    foreach (['[]', '{}', 'null', '{broken', '[{"title":"Service"}]', '[{"title":"Service","content":"<p></p>"}]'] as $invalid) {
        file_put_contents($path, $invalid);
        try {
            $loadContent($path, ['title', 'content']);
        } catch (RuntimeException | JsonException $exception) {
            continue;
        }
        throw new Exception("Invalid content was accepted: {$invalid}");
    }

    file_put_contents($path, json_encode($valid));
    if ($loadContent($path, ['title', 'content']) !== $valid) {
        throw new Exception('Valid content was not loaded');
    }
} finally {
    unlink($path);
}

try {
    $loadContent($path, ['title', 'content']);
    throw new Exception('Missing content was accepted');
} catch (RuntimeException $exception) {
    echo "PASS: content validation rejects missing, empty and malformed data.\n";
}
