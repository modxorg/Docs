<?php
require dirname(__DIR__) . '/app/vendor/autoload.php';

use Spatie\YamlFrontMatter\YamlFrontMatter;

define('DRD', dirname(__DIR__) . '/');
define('DRD_EN', dirname(__DIR__) . '/en/');
$redirects = json_decode(file_get_contents(DRD . 'redirects.json'));



// Look over each file and fetch its frontmatter to get a old_uri => new_uri map
$map = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DRD_EN,RecursiveDirectoryIterator::SKIP_DOTS),RecursiveIteratorIterator::SELF_FIRST);
/** @var SplFileInfo $item */
foreach ($iterator as $item) {
    $fullPath = $item->getPathname();
    if ($item->isDir()) {
        $uri = str_replace(DRD, '', $fullPath);

        $fullPath .= '/index.md';
        if (!file_exists($fullPath)) {
            continue;
        }
    }
    else {
        $uri = str_replace(DRD, '', $fullPath);
        if (substr($uri, -9) === '/index.md') {
            $uri = substr($uri, 0, -9);
        }
    }


    if (!file_exists($fullPath) || !is_readable($fullPath)) {
        echo $uri . "is not readable.\n";
        continue;
    }

    $fm = YamlFrontMatter::parse(file_get_contents($fullPath));
    $oldUri = $fm->matter('_old_uri');

    if (!empty($oldUri)) {
        $map[$oldUri] = $uri;
    }
}

// Look at the existing redirects to see which ones are still valid, and which are now broken
$newRedirects = [];
$brokenRedirects = [];
$prefixes = ['revolution', 'community', 'xpdo'];
foreach ($redirects as $old => $oldNewTarget) {
    if (file_exists(DRD . $oldNewTarget . '.md') || file_exists(DRD . $oldNewTarget . '/index.md')) {
        $newRedirects[$old] = $oldNewTarget;
        echo 'OK: ' . $old . ' => ' . $oldNewTarget . "\n";
        continue;
    }


    if (array_key_exists($old, $map)) {
        echo "Found $old in map: {$map[$old]}\n";
        $newUri = substr($map[$old], -3) === '.md' ? substr($map[$old], 0, -3) : $map[$old];
        $newRedirects[$old] = $newUri;
        continue;
    }
    else {
        $boom = explode('/', ltrim($old, '/'));
        $firstBit = array_shift($boom);
        $remainder = implode('/', $boom);

        if (array_key_exists($remainder, $map)) {
            echo "Found {$remainder} without prefix {$firstBit} in map: {$map[$remainder]}\n";
            $newUri = substr($map[$remainder], -3) === '.md' ? substr($map[$remainder], 0, -3) : $map[$remainder];
            $newRedirects[$old] = $newUri;
        }
        else {
            $brokenRedirects[$old] = true;
            echo "X: {$firstBit} / {$remainder} not found [{$oldNewTarget}]\n";
            continue;
        }
    }

    if ($newUri !== $oldNewTarget) {
        $newRedirects['/' . $oldNewTarget] = $newUri;
    }

}
file_put_contents(DRD . 'redirects_map.json', json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// Look over each file and fetch its frontmatter to get a old_uri => new_uri map
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DRD_EN,RecursiveDirectoryIterator::SKIP_DOTS),RecursiveIteratorIterator::SELF_FIRST);
//
///** @var SplFileInfo $item */
//foreach ($iterator as $item) {
//    $fullPath = $item->getPathname();
//    if ($item->isDir()) {
//        $uri = str_replace(DRD, '', $fullPath);
//
//        $fullPath .= '/index.md';
//        if (!file_exists($fullPath)) {
//            continue;
//        }
//    }
//    else {
//        $uri = str_replace(DRD, '', $fullPath);
//        if (substr($uri, -9) === '/index.md') {
//            $uri = substr($uri, 0, -9);
//        }
//    }
//
//
//    if (!file_exists($fullPath) || !is_readable($fullPath)) {
//        echo $uri . "is not readable.\n";
//        continue;
//    }
//
//    $fm = YamlFrontMatter::parse(file_get_contents($fullPath));
//    $oldUri = $fm->matter('_old_uri');
//
//    if (!empty($oldUri)) {
//        if (array_key_exists($oldUri, $newRedirects)) {
//            $existingRedirect = $newRedirects[$oldUri];
//            if ($existingRedirect === $uri) {
//                echo "$oldUri redirect duplicated\n";
//            }
//            echo "$oldUri redirect points to $existingRedirect -- not adding $uri \n";
//            continue;
//        }
//
//        $newRedirects[$oldUri] = $uri;
//
//        if (array_key_exists($oldUri, $brokenRedirects)) {
//            unset ($brokenRedirects[$oldUri]);
//        }
//    }
//    else {
////        echo "$uri does not have an oldUri\n";
//    }
//
//
//
////    echo $path . "\n";
//}


file_put_contents(DRD . 'redirects_new.json', json_encode($newRedirects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
file_put_contents(DRD . 'redirects_broken.json', json_encode($brokenRedirects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
