<?php

return static function (string $path, array $requiredFields): array {
    if (!is_file($path)) {
        throw new RuntimeException("Missing content file: {$path}");
    }

    $items = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($items) || !array_is_list($items) || $items === []) {
        throw new RuntimeException("Empty or invalid content file: {$path}");
    }

    foreach ($items as $index => $item) {
        foreach ($requiredFields as $field) {
            if (!is_array($item) || !is_string($item[$field] ?? null) || trim(strip_tags($item[$field])) === '') {
                throw new RuntimeException("Invalid {$field} in {$path}, item {$index}");
            }
        }
    }

    return $items;
};
