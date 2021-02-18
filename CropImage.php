<?php
require './BoundingBox.php';
require './CreateImageObject.php';

function cropImage(Imagick $imageObj, BoundingBox $box): Imagick // return type
{
    $width = ($box->lower_right_x-$box->upper_left_x); // image width
    $height =  ($box->lower_right_y-$box->upper_left_y); // image height
    $imageObj->cropImage($width, $height, $box->upper_left_x, $box->upper_left_y); // crop image
    //header("Content-Type: image/jpeg");

    // writeImage is to check if the image is being cropped
    $imageObj->writeImage('/Users/remahwalidbadr/Newspaper-Navigator-API-PHP-Client-Library/image2.jpeg');
    return $imageObj; // return the image object
}

$filename = '/Users/remahwalidbadr/Newspaper-Navigator-API-PHP-Client-Library/image1.jpeg'; //example
$imageObject = createImageObject($filename); // setting variable to image object
$box = new BoundingBox(0, 0, 70, 80); // testing with variables
cropImage($imageObject, $box); // crop method takes in an image object and a boundingbox object
?> //
