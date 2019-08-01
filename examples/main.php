<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Subscriber\Count;

$directory = __DIR__ . '/youtube';
$files = array_diff(scandir($directory), ['..', '.']);


foreach ($files as $file) {
    echo '//////////////////////////////' . PHP_EOL;

    echo 'File: ' . $file . PHP_EOL;

    // Mock response from YouTube API
    $response = file_get_contents(__DIR__ . '/youtube/' . $file);

    // Convert json to array
    $arr = json_decode($response, true);

    // Extract the subscriber count
    $subscribers = $arr['items'][0]['statistics']['subscriberCount'];

    // Echo Response
    echo 'String: ' . $subscribers . PHP_EOL;
    echo 'Parsed: ' . Count::parse($subscribers) . PHP_EOL;

}

echo '//////////////////////////////' . PHP_EOL;
