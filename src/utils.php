<?php
require_once "schemas.php";


function imageToBase64(Imagick $imageObj): string
{ 
    return base64_encode($imageObj->getImageBlob()); 
}


function cropImage(Imagick $imageObj, BoundingBox $box): Imagick 
{
    $width = ($box->lower_right_x - $box->upper_left_x) * $imageObj->getImageWidth(); 
    $height = ($box->lower_right_y - $box->upper_left_y) * $imageObj->getImageHeight(); 
    $imageClone = $imageObj->clone();
    $imageClone->cropImage($width, 
                        $height, 
                        $box->upper_left_x * $imageObj->getImageWidth(), 
                        $box->upper_left_y * $imageObj->getImageHeight()
                        );
    return $imageClone;
}

?>