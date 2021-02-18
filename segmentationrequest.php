<?php
class SegmentationRequest{
    public $image_base64;

    public function __construct(string $image_base64) {
        $this->image_base64 = $image_base64;
    }

    public function getImg64() {
        return (string)$this->image_base64;
    }

} 
?> //