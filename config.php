<?php

$loadContent = require __DIR__ . '/scripts/load-content.php';

return [
    'production' => false,
    'baseUrl' => 'https://test.3doptika.hu',
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
    'services' => $loadContent(__DIR__ . '/source/_data/services.json', ['slug', 'title', 'content']),
    'faq' => $loadContent(__DIR__ . '/source/_data/faq.json', ['question', 'answer']),
    'testimonials' => $loadContent(__DIR__ . '/source/_data/testimonials.json', ['text', 'author']),
];
