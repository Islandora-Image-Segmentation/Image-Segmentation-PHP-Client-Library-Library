<?php

namespace NewspaperNavigator;
use GuzzleHttp\Client;

class SegmentationClient
{
    private Client $httpClient;
    private string $base_uri;
    private float $timeout;
    private string $api_key;

    public function __construct(string $base_uri="localhost:8008/api/", 
                                float $timeout=60.0,
                                string $api_key="") {
        $this->base_uri = $base_uri;
        $this->timeout = $timeout;
        $this->api_key = $api_key;
        $this->httpClient = new Client(["base_uri" => $base_uri, "timeout" => $timeout]);
    }

    public function segmentBase64(string $base64): SegmentationResponse
    {
        return $this->sendJsonRequest("segment_base64", ["image_base64" => $base64]);
    }

    public function segmentUrl(string $url): SegmentationResponse
    {
        return $this->sendJsonRequest("segment_url", ["image_url" => $url]);
    }

    public function segmentImagick(Imagick $image): SegmentationResponse
    {
        return $this->sendMultipartRequest("segment_formdata", $image->__toString());
    }

    public function segmentFile(string $filepath): SegmentationResponse
    {
        return $this->sendMultipartRequest("segment_formdata", file_get_contents($filepath));
    }

    private function sendJsonRequest(string $endpoint, array $json)
    {
        $response = $this->httpClient->request('POST', 
                                               $this->base_uri . $endpoint, [
                                                    'json' => $json,
                                                    'headers'  => [
                                                        'X-API-KEY' => $this->api_key
                                                    ]
                                               ]
                                            );
        return $this->parseResponse($response->getBody());
    }

    private function sendMultipartRequest(string $endpoint, string $file_bytes)
    {
        $response = $this->httpClient->request('POST', $this->base_uri . $endpoint, [
            'multipart' => [
                [
                    'name'     => 'image_file',
                    'contents' => $file_bytes,
                    'filename' => "image.png"
                ]],
            'headers' => [
                    'X-API-KEY' => $this->api_key
            ]
        ]);

        return $this->parseResponse($response->getBody());
    }

    private function parseResponse(string $json) 
    {
        $decoded_object = json_decode($json);
        $segments = array();
        foreach ($decoded_object->segments as &$segment) 
        {
            $bounding_box = new BoundingBox($segment->bounding_box->upper_left_x, 
                                            $segment->bounding_box->upper_left_y, 
                                            $segment->bounding_box->lower_right_x, 
                                            $segment->bounding_box->lower_right_y);

            $extracted_segment = new ExtractedSegment($segment->ocr_text, 
                                                      $bounding_box, 
                                                      $segment->embedding, 
                                                      $segment->classification, 
                                                      $segment->confidence,
                                                      $segment->hocr);
                                                      
            array_push($segments, $extracted_segment);
        }

        return new SegmentationResponse($decoded_object->status_code, 
                                        $decoded_object->error_message, 
                                        $decoded_object->segment_count, 
                                        $segments);
    }
}
?>

