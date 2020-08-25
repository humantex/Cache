<?php

include '../autoload.php'; // If using composer

use humantex\Kache\Kache;

$cache = new Kache();
$cache->setCacheDirectory('cache'); // This is the default

// If the cache exists, this will return it, else, the closure will be called
// to create this image
$data = $cache->getOrCreate('red-square.png', [], function ($filename) {
    $i = imagecreatetruecolor(100, 100);
    imagefill($i, 0, 0, 0xff0000);
    file_put_contents($filename, 'abc');
    imagepng($i, $filename);
});

header('Content-type: image/png');
echo $data;
