<?php
class BoundingBox{
public  $upper_left_x;
public  $upper_left_y;
public  $lower_right_x;
public  $lower_right_y;

public function __construct($upper_left_x,  $upper_left_y, $lower_right_x, $lower_right_y ) {
    $this->upper_left_x = $upper_left_x;
    $this->upper_left_y = $upper_left_y;
    $this->lower_right_x = $lower_right_x;
    $this->lower_right_y = $lower_right_y;
}
}

$box = new BoundingBox(4.6, 5, 2, 3);
//echo $box->upper_left_x;
//echo "\n"
?>