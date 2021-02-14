<?php
class SegmentationResponse{
   
    public int $status_code;
    public string $error_message;
    public ?int $segment_count;
    public ?array $segments = array(ExtractedSegment);
} 
?>