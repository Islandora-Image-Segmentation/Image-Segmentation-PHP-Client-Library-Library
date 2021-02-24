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

    public function segmentBase64(string $base64)
    {
        $response = $this->sendJsonRequest("segment_base64", ["image_base64" => $base64]);
        echo $response;
        //return new SegmentationResponse();
    }


    public function segmentUrl(string $url)
    {
        $response = $this->sendJsonRequest("segment_url", ["image_url" => $url]);
        echo $response;
        //return new SegmentationResponse();
    }

    public function segmentImagick(Imagick $image)
    {
        $response = $this->sendMultipartRequest("segment_formdata", $image->__toString());
        echo $response;
        //return new SegmentationResponse();

    }

    public function segmentFile(string $filepath)
    {
        $response = $this->sendMultipartRequest("segment_formdata", file_get_contents($filepath));
        echo $response;
    }

    private function sendJsonRequest(string $endpoint, array $json): string
    {
        $response = $this->httpClient->request('POST', $this->base_uri . $endpoint, ['json' => $json]);
        // should convert to SegmentationResponse here
        return $response->getBody();
    }

    private function sendMultipartRequest(string $endpoint, string $file_bytes): string
    {
        $response = $this->httpClient->request('POST', $this->base_uri . $endpoint, [
            'multipart' => [
                [
                    'name'     => 'image_file',
                    'contents' => $file_bytes,
                    'filename' => "test.png"
                ],
            ],
        ]);
        // should convert to SegmentationResponse here
        return $response->getBody();
    }
}

$client = new SegmentationClient();
$base64 = imageToBase64(new Imagick("./test.png"));
$client->segmentUrl("https://www.gravatar.com/avatar/a6931c71023665f96eb121b700e4ff49?s=328&d=identicon&r=PG&f=1");
$client->segmentFile("./test.png");
$client->segmentBase64($base64);
$client->segmentImagick(new Imagick("./test.png"));

?>

