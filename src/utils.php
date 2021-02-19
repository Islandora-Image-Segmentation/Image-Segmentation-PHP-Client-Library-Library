<?php


function imageToBase64(Imagick $imageObj)
{ 
    $return base64_encode($imageObj); 
}


function cropImage(Imagick $imageObj, BoundingBox $box): Imagick 
{
    $width = ($box->lower_right_x - $box->upper_left_x); 
    $height =  ($box->lower_right_y - $box->upper_left_y); 
    return cropImage($width, $height, $box->upper_left_x, $box->upper_left_y); // crop image
?>