<?php

use TightenCo\Jigsaw\Jigsaw;

/** @var \Illuminate\Container\Container $container */
/** @var \TightenCo\Jigsaw\Events\EventBus $events */

$events->afterBuild(function (Jigsaw $jigsaw) {
    $validateBuild = require __DIR__ . '/scripts/validate-build.php';
    $validateBuild($jigsaw->getDestinationPath(), [
        'services' => $jigsaw->getConfig('services')->toArray(),
        'faq' => $jigsaw->getConfig('faq')->toArray(),
        'testimonials' => $jigsaw->getConfig('testimonials')->toArray(),
    ]);
});
