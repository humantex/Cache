<?php

include '../autoload.php';

$cache = new humantex\Kache\Kache();

$data = $cache->getOrCreate('uppercase.txt', ['max-age' => 2], function () {
    echo "First call: generating file...\n";

    return strtoupper(file_get_contents('original.txt'));
});

$data = $cache->getOrCreate('uppercase.txt', ['max-age' => 2], function () {
    echo "Second call: generating file, this should not happen!...\n";

    return strtoupper(file_get_contents('original.txt'));
});

echo "Waiting 4s...\n";
sleep(4);

$data = $cache->getOrCreate('uppercase.txt', ['max-age' => 2], function () {
    echo "Third call: generating cache file, because it expired...\n";

    return strtoupper(file_get_contents('original.txt'));
});
