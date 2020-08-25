<?php

include '../autoload.php';

use humantex\Kache\Kache;

$cache = new Kache();

$data = $cache->getOrCreate('uppercase.txt', ['younger-than' => 'original.txt'], function () {
    echo "Generating file...\n";

    return strtoupper(file_get_contents('original.txt'));
});

echo $data;
