<?php
 include ("BoundingBox.php");
class ExtractedSegment{
    public string $ocr_text;
    public BoundingBox $bounding_box;
    public array $embedding;
    public string $classification;
    public float $confidence;
}
$embedding[0] = 100;
$embedding[1] = 30.565;
$bounding_box = new BoundingBox(12,3,4,4);
//$bounding_box->ff();
echo $bounding_box->upper_left_x;
echo "\n";
echo $embedding[1];

?>