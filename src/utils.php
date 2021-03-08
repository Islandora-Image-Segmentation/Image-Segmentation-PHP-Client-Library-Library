<?php
namespace NewspaperNavigator;

function imageToBase64(Imagick $imageObj): string
{
    return base64_encode($imageObj->getImageBlob());
}


function cropImage(\Imagick $imageObj, BoundingBox $box): \Imagick
{
    $width = ($box->lower_right_x - $box->upper_left_x) * $imageObj->getImageWidth();
    $height = ($box->lower_right_y - $box->upper_left_y) * $imageObj->getImageHeight();
    $imageClone = clone $imageObj;
    $imageClone->cropImage($width,
                        $height,
                        $box->upper_left_x * $imageObj->getImageWidth(),
                        $box->upper_left_y * $imageObj->getImageHeight()
                        );
    $imageClone->setImagePage($width, $height, 0, 0);
    return $imageClone;
}


?>