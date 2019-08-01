<?php

use Subscriber\Subscriber;

// Mock response from YouTube API
$response = file_get_contents('youtube/channel_response.json');

// Convert json to array
$arr = json_decode($response);

// Extract the subscriber count
$subscribers = $arr['items'][0]['statistics']['subscriberCount'];

// Echo Response
echo Subscriber::parse($subscribers);