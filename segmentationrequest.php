
class SegmentationRequest{
    public string $image_base64;

    public function __construct(string $image_base64) {
        $this->image_base64 = $image_base64;
    }

} 
