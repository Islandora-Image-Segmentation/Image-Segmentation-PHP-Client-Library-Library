<?php
 require ("ExtractedSegment.php");
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
?> //
