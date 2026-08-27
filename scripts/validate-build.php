<?php

return static function (string $destination, array $content): void {
    $documents = [];
    foreach (['index.html', 'services/index.html', 'gyik/index.html', 'contact/index.html'] as $file) {
        $path = $destination . '/' . $file;
        if (!is_file($path)) {
            throw new RuntimeException("Missing generated page: {$file}");
        }

        $dom = new DOMDocument();
        $previous = libxml_use_internal_errors(true);
        try {
            $dom->loadHTML(file_get_contents($path));
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }
        $documents[$file] = new DOMXPath($dom);

        foreach ($documents[$file]->query('//script[@type="application/ld+json"]') as $script) {
            json_decode($script->textContent, true, 512, JSON_THROW_ON_ERROR);
        }
        if ($documents[$file]->query('//form[@action="/api/quote/send.php"]')->length !== 1) {
            throw new RuntimeException("Missing contact form in {$file}");
        }
    }

    $checks = [
        ['index.html', 'service-item__text', $content['services'], 'title'],
        ['services/index.html', 'infoCard__title', $content['services'], 'title'],
        ['services/index.html', 'infoCard__text', $content['services'], 'content'],
        ['index.html', 'testimonial-card__text', $content['testimonials'], 'text'],
        ['index.html', 'testimonial-card__name', $content['testimonials'], 'author'],
        ['gyik/index.html', 'faqItem__q', $content['faq'], 'question'],
        ['gyik/index.html', 'faqItem__a', $content['faq'], 'answer'],
    ];
    foreach ($checks as [$file, $class, $items, $field]) {
        $nodes = $documents[$file]->query('//*[contains(concat(" ", normalize-space(@class), " "), " ' . $class . ' ")]');
        if (count($items) === 0 || $nodes->length !== count($items)) {
            throw new RuntimeException("Missing {$class} content in {$file}");
        }
        foreach ($items as $index => $item) {
            $expected = html_entity_decode(strip_tags($item[$field]), ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $actual = $nodes->item($index)->textContent;
            if (preg_replace('/\s+/u', '', $actual) !== preg_replace('/\s+/u', '', $expected)) {
                throw new RuntimeException("Incorrect {$class} content in {$file}, item {$index}");
            }
        }
    }

    $links = $documents['index.html']->query('//a[@class="service-item"]');
    $articles = $documents['services/index.html']->query('//article[@class="infoCard"]');
    foreach ($content['services'] as $index => $service) {
        if ($links->item($index)?->getAttribute('href') !== '/services/#' . $service['slug']
            || $articles->item($index)?->getAttribute('id') !== $service['slug']) {
            throw new RuntimeException("Broken service link: {$service['slug']}");
        }
    }

    if (!is_file($destination . '/api/quote/send.php') || !is_file($destination . '/api/quote/vendor/autoload.php')) {
        throw new RuntimeException('Missing contact form backend in generated site');
    }
};
