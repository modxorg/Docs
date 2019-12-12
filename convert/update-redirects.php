<?php

define('DRD', dirname(__DIR__) . '/');
define('DRD_EN', dirname(__DIR__) . '/en/');
$redirects = json_decode(file_get_contents(DRD . 'redirects.json'), true);

foreach ($redirects as $source => $target) {
    if (strpos($source, '/xpdo/2.x/') === 0) {
        $newSource = '/xpdo/1.x/' . substr($source, strlen('/xpdo/1.x/'));
        $redirects[$newSource] = $target;
    }
}

file_put_contents(DRD . 'redirects.json', json_encode($redirects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
