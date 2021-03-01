<?php
class BoundingBox{
public  float $upper_left_x;
public  float $upper_left_y;
public  float $lower_right_x;
public  float $lower_right_y;

public function __construct(float $upper_left_x,  float $upper_left_y, float $lower_right_x, float $lower_right_y ) {
    $this->upper_left_x = $upper_left_x;
    $this->upper_left_y = $upper_left_y;
    $this->lower_right_x = $lower_right_x;
    $this->lower_right_y = $lower_right_y;
}

}
?>