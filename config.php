<?php

return [
    'production' => false,
    'baseUrl' => '',
    'title' => getenv('SITE_TITLE'),
    'siteName'=>getenv('SITE_NAME'),
    'description' => 'Website description.',
    'collections' => [],
    'faq' => \Symfony\Component\Yaml\Yaml::parseFile(__DIR__ . '/source/_data/faq.yaml'),
];
