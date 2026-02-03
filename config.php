<?php

return [
    'production' => false,
    'baseUrl' => '',
    'title' => getenv('SITE_TITLE'),
    'siteName'=>getenv('SITE_NAME'),
    'description' => 'Website description.',
    'collections' => [
    ],
    'faq' => \Symfony\Component\Yaml\Yaml::parseFile(__DIR__ . '/source/_data/faq.yaml'),
    // BLOG – JSON
    'posts' => (function () {
    $path = __DIR__ . '/source/_data/posts.json';

    if (!file_exists($path)) {
        return [];
    }

    $json = file_get_contents($path);
    $data = json_decode($json, true);

    return is_array($data) ? $data : [];
})(),
];
