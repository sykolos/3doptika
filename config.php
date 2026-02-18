<?php

return [
    'production' => false,
    'baseUrl' => 'https://3doptika.hu',
    'siteName' => getenv('SITE_NAME'),
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

    // Ezek maradjanak page-level adatok
    'services' => (function () {
        $path = __DIR__ . '/source/_data/services.json';
        if (!file_exists($path)) return [];
        return json_decode(file_get_contents($path), true);
    })(),

    'faq' => (function () {
        $path = __DIR__ . '/source/_data/faq.json';
        if (!file_exists($path)) return [];
        return json_decode(file_get_contents($path), true);
    })(),

    'testimonials' => (function () {
        $path = __DIR__ . '/source/_data/testimonials.json';
        if (!file_exists($path)) return [];
        return json_decode(file_get_contents($path), true);
    })(),
];
