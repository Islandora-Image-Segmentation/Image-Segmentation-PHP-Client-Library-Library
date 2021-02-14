
 include ("ExtractedSegment.php");
class SegmentationResponse{
   
    public int $status_code;
    public string $error_message;
    public ?int $segment_count;
    public ?array $segments = array(ExtractedSegment);
    
    public function __construct(int $status_code, string $error_message, ?int $segment_count, ?array $segments) {
        $this->status_code = $status_code;
        $this->error_message = $error_message;
        $this->segment_count = $segment_count;
        $this->segments = $segments;
        
    }
} 

