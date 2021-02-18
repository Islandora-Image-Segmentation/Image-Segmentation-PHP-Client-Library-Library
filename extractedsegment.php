<?php
include './BoundingBox.php';
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

?> //