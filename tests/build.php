<?php

$root = dirname(__DIR__);
$destination = $root . '/' . ($argv[1] ?? 'build_production');
$content = require $root . '/config.php';
$validateBuild = require $root . '/scripts/validate-build.php';
$validateBuild($destination, $content);
echo "PASS: generated pages contain every service, testimonial and FAQ, with working links and forms.\n";

$directory = sys_get_temp_dir() . '/3doptika-build-' . bin2hex(random_bytes(8));
$pages = ['index.html', 'services/index.html', 'gyik/index.html', 'contact/index.html'];
mkdir($directory . '/api/quote/vendor', 0700, true);

try {
    foreach ($pages as $page) {
        if (!is_dir(dirname($directory . '/' . $page))) {
            mkdir(dirname($directory . '/' . $page), 0700, true);
        }
        copy($destination . '/' . $page, $directory . '/' . $page);
    }
    // The validator only checks backend file presence; never copy SMTP credentials into fixtures.
    touch($directory . '/api/quote/send.php');
    touch($directory . '/api/quote/vendor/autoload.php');

    foreach ([
        ['index.html', '//span[@class="service-item__text"]'],
        ['index.html', '//div[@class="testimonial-card__text"]'],
        ['services/index.html', '//div[@class="infoCard__text"]'],
        ['gyik/index.html', '//div[@class="faqItem__a"]'],
        ['contact/index.html', '//form'],
    ] as [$page, $selector]) {
        $dom = new DOMDocument();
        $previous = libxml_use_internal_errors(true);
        $dom->loadHTMLFile($destination . '/' . $page);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        $nodes = (new DOMXPath($dom))->query($selector);
        foreach ($nodes as $node) {
            $node->parentNode->removeChild($node);
        }
        $dom->saveHTMLFile($directory . '/' . $page);

        $rejected = false;
        try {
            $validateBuild($directory, $content);
        } catch (RuntimeException $exception) {
            $rejected = true;
        }
        if (!$rejected) {
            throw new RuntimeException("Incomplete page was accepted: {$page} ({$selector})");
        }
        copy($destination . '/' . $page, $directory . '/' . $page);
    }
    echo "PASS: deployment validation rejects missing content and contact forms.\n";
} finally {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) {
        $file->isDir() ? rmdir($file->getPathname()) : unlink($file->getPathname());
    }
    rmdir($directory);
}
