<?php
namespace NewspaperNavigator;
class BoundingBox{
    public  float $upper_left_x;
    public  float $upper_left_y;
    public  float $lower_right_x;
    public  float$lower_right_y;

    public function __construct(float $upper_left_x,  float $upper_left_y, float $lower_right_x, float $lower_right_y ) {
        $this->upper_left_x = $upper_left_x;
        $this->upper_left_y = $upper_left_y;
        $this->lower_right_x = $lower_right_x;
        $this->lower_right_y = $lower_right_y;
    }
}


class ExtractedSegment{
    public string $ocr_text;
    public BoundingBox $bounding_box;
    public array $embedding;
    public string $classification;
    public float $confidence;
    public string $hocr;

    public function __construct(string $ocr_text, BoundingBox $bounding_box, array $embedding, string $classification, float $confidence, string $hocr) {
        $this->ocr_text = $ocr_text;
        $this->bounding_box = $bounding_box;
        $this->embedding = $embedding;
        $this->classification = $classification;
        $this->confidence = $confidence;
        $this->hocr = $hocr;
    }
}


class SegmentationRequest{
    public string $image_base64;

    public function __construct(string $image_base64) {
        $this->image_base64 = $image_base64;
    }
}


class SegmentationResponse{
    public int $status_code;
    public string $error_message;
    public ?int $segment_count;
    public ?array $segments = array();
    
    public function __construct(int $status_code, string $error_message, ?int $segment_count, ?array $segments) {
        $this->status_code = $status_code;
        $this->error_message = $error_message;
        $this->segment_count = $segment_count;
        $this->segments = $segments;
        
    }

    public function __toString()
    {
        return json_encode($this);
    }
} 
?>
