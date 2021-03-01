<?php
include './BoundingBox.php';
class ExtractedSegment{
    public string $ocr_text;
    public BoundingBox $bounding_box;
    public array $embedding;
    public string $classification;
    public float $confidence;

    public function __construct(string $ocr_text, BoundingBox $bounding_box, array $embedding, string $classification, float $confidence) {
        $this->ocr_text = $ocr_text;
        $this->bounding_box = $bounding_box;
        $this->embedding = $embedding;
        $this->classification = $classification;
        $this->confidence = $confidence;
    }

}

?>