<?php

require_once "vendor/autoload.php";
require_once "schemas.php";
require_once "utils.php";
use GuzzleHttp\Client;

class SegmentationClient
{
    private Client $httpClient;
    private string $base_uri;
    private float $timeout;

    public function __construct(string $base_uri="localhost:8000/api/", float $timeout=30.0) {
        $this->base_uri = $base_uri;
        $this->time_out = $timeout;
        $this->httpClient = new Client(["base_uri" => $base_uri, "timeout" => $timeout]);
    }

    public function segmentBase64(string $base64): SegmentationResponse
    {
        $response = $this->sendRequest("segment_base64", ["image_base64" => $base64]);
    }


    public function segmentUrl(string $url): SegmentationResponse
    {

    }

    public function segmentImagick(Imagick $image): SegmentationResponse
    {
        
    }

    public function segmentFile(string $filepath): SegmentationResponse
    {
        
        // 'multipart' => [
        //     [
        //         'name'     => 'FileContents',
        //         'contents' => file_get_contents($path . $name),
        //         'filename' => $name
        //     ],
        //     [
        //         'name'     => 'FileInfo',
        //         'contents' => json_encode($fileinfo)
        //     ]
        // ],

    }

    private function sendRequest(string $endpoint, array $json): string
    {
        $response = $this->httpClient->request('POST', $this->base_uri . $endpoint, ['json' => $json]);
        // should convert to SegmentationResponse here
        return $response->getBody();
    }
}
?>