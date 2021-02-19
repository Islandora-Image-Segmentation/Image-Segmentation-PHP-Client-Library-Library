<?php
use GuzzleHttp\Client;
$API_URL = "http//localhost:8000/api";
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => $API_URL,
    // You can set any number of default request options.
    'timeout'  => 30.0,
]);

function segmentImage($imageUrl)
{
    $client->request('POST', 'segment_image', ['json' => ['image' => $imageUrl]]);
    $response =  $client->request('POST', 'segment_image', ['json' => ['image' => $imageUrl]]);
    
    if($response->getStatusCode() == 200)
    {
       return $response->getBody();
    }
    else
    {
        new RequestException('Error Communicating with Server');
    }
}
?>