<?php
class segmentationresponse{
   
    private $status_code = int;
    private $error_message = str;
    private $segment_count = Optional[int];
    private $segments = Optional[array(extractedsegment.class_implements)];
} 
?>