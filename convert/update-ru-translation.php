<?php
ini_set('display_errors', 1);
require dirname(__DIR__) . '/app/vendor/autoload.php';

use Spatie\YamlFrontMatter\YamlFrontMatter;

define('DRD', dirname(__DIR__) . '/');
define('DRD_EN', dirname(__DIR__) . '/en/');
define('DRD_RU', dirname(__DIR__) . '/ru/');
$redirects = json_decode(file_get_contents(DRD . 'redirects.json'), true);



// Look over each file and fetch its frontmatter to get a old_uri => new_uri map
$map = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DRD_RU,RecursiveDirectoryIterator::SKIP_DOTS),RecursiveIteratorIterator::SELF_FIRST);
/** @var SplFileInfo $item */
foreach ($iterator as $item) {
    $fullPath = $item->getPathname();
    if ($item->isDir()) {
        continue;
    }

    $uri = str_replace(DRD, '', $fullPath);
    if (substr($uri, -9) === '/index.md') {
        $uri = substr($uri, 0, -9);
    }


    if (!file_exists($fullPath) || !is_readable($fullPath)) {
        echo $uri . "is not readable.\n";
        continue;
    }

    $fileContents = file_get_contents($fullPath);
    $fm = YamlFrontMatter::parse($fileContents);
    $oldTranslation = $fm->matter('translation');
    if (!empty($oldTranslation)) {
        $oldTranslation = ltrim($oldTranslation, '/');
        if (file_exists(DRD_EN . $oldTranslation . '.md') || file_exists(DRD_EN . $oldTranslation . '/index.md')) {
            echo "FOUND: $oldTranslation\n";
            continue;
        }

        echo "LOOKING FOR: $oldTranslation";

        $enKey = '/en/' . $oldTranslation;
        if (array_key_exists($enKey, $redirects)) {
            $newTranslation = $redirects[$enKey];
            if (strpos($newTranslation, 'en/') === 0) {
                $newTranslation = substr($newTranslation, 3);
            }
            echo " --- FOUND: $newTranslation";
            $newContents = str_replace('translation: "'.$oldTranslation.'"', 'translation: "'.$newTranslation.'"', $fileContents);
            file_put_contents($fullPath, $newContents);
        }
        else {
            echo " --- CAN'T FIND";
        }

        echo "\n";

    }
}
