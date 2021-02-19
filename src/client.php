<?php

require_once "vendor/autoload.php";
require_once "schemas.php";
require_once "utils.php";
use GuzzleHttp\Client;

class SegmentationClient
{
    private Client $httpClient;

    public function __construct(string $base_uri="http//localhost:8000/api", float $timeout=30.0) {
        $this->httpClient = new Client(["base_uri" => $base_uri, "timeout" => $timeout]);
    }

    public function segmentBase64(string $base64): SegmentationResponse
    {

    }


    public function segmentUrl(string $url): SegmentationResponse
    {

    }

    public function segmentFormdata(Imagick $image): SegmentationResponse
    {

    }

    private function sendRequest(string $endpoint, array $json): string
    {
        $response = $this->$httpClient->request('POST', $endpoint, ['json' => $json]);
        
        if($response->getStatusCode() == 200)
        {
        return $response->getBody();
        }
    }
}
?>