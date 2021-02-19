<?php
class BoundingBox{
    public  $upper_left_x;
    public  $upper_left_y;
    public  $lower_right_x;
    public  $lower_right_y;

    public function __construct(float $upper_left_x,  float $upper_left_y, float $lower_right_x, float $lower_right_y ) {
        $this->upper_left_x = $upper_left_x;
        $this->upper_left_y = $upper_left_y;
        $this->lower_right_x = $lower_right_x;
        $this->lower_right_y = $lower_right_y;
    }
    
    public function getULX() {
        return (float)$this->upper_left_x;
    }

    public function getULY() {
        return (float)$this->upper_left_y;
    }

    public function getLRX() {
        return (float)$this->lower_right_x;
    }

    public function getLRY() {
        return (float)$this->lower_right_y;
    }
}


class ExtractedSegment{
    public $ocr_text;
    public $bounding_box;
    public $embedding;
    public $classification;
    public $confidence;

    public function __construct(string $ocr_text, BoundingBox $bounding_box, array $embedding, string $classification, float $confidence) {
        $this->ocr_text = $ocr_text;
        $this->bounding_box = $bounding_box;
        $this->embedding = $embedding;
        $this->classification = $classification;
        $this->confidence = $confidence;
    }

    public function getOCRText() {
        return (string)$this->ocr_text;
    }

    public function getBoundingBox() {
        return BoundingBox::$this->bounding_box;
    }

    public function getEmbedding() {
        return (array)$this->embedding;
    }

    public function getClassification() {
        return (string)$this->classification;
    }

    public function getConfidence() {
        return (float)$this->confidence;
    }
}


class SegmentationRequest{
    public $image_base64;

    public function __construct(string $image_base64) {
        $this->image_base64 = $image_base64;
    }

    public function getImg64() {
        return (string)$this->image_base64;
    }
}


class SegmentationResponse{
    public $status_code;
    public $error_message;
    public $segment_count;
    public $segments = array(ExtractedSegment);
    
    public function __construct(int $status_code, string $error_message, ?int $segment_count, ?array $segments) {
        $this->status_code = $status_code;
        $this->error_message = $error_message;
        $this->segment_count = $segment_count;
        $this->segments = $segments;
        
    }

    public function getStatusCode() {
        return (int)$this->status_code;
    }

    public function getErrorMsg() {
        return (string)$this-$this->error_message;
    }
} 
?>
