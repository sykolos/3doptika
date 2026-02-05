<?php

return [
    'production' => false,
    'baseUrl' => '',
    'title' => getenv('SITE_TITLE'),
    'siteName'=>getenv('SITE_NAME'),
    'description' => 'Ahol a látás élménnyé válik!',
    'collections' => [
    // BLOG – JSON
        'posts' => [
            'path' => 'blog/{slug}',
            'items' => function () {
                return json_decode(
                    file_get_contents(__DIR__ . '/source/_data/posts.json'),
                    true
                );
            },
            'extends' => 'blog._post',
            'section' => 'content',
        ],
    ],
        'services' => (function () {
            $path = __DIR__ . '/source/_data/services.json';
            if (!file_exists($path)) return [];
            $data = json_decode(file_get_contents($path), true);
            return is_array($data) ? $data : [];
        })(),

        'faq' => (function () {
            $path = __DIR__ . '/source/_data/faq.json';
            if (!file_exists($path)) return [];
            $data = json_decode(file_get_contents($path), true);
            return is_array($data) ? $data : [];
        })(),
        'testimonials' => (function () {
            $path = __DIR__ . '/source/_data/testimonials.json';
            if (!file_exists($path)) return [];
            $data = json_decode(file_get_contents($path), true);
            return is_array($data) ? $data : [];
        })(),
    
];
