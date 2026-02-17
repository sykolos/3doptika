<?php

return [
    'production' => false,
    'baseUrl' => 'https://3doptika.hu',
    'siteName'=>getenv('SITE_NAME'),
    'description' => 'Ahol a látás élménnyé válik!',
    'collections' => [
        'posts' => [
            'items' => function () {
                return collect(
                    json_decode(
                        file_get_contents(__DIR__ . '/source/_data/posts.json'),
                        true
                    )
                );
            },
            'sort' => '-date',
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
