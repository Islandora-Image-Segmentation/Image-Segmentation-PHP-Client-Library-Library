<?php
require './BoundingBox.php';
function cropImage($imagePath, $box) {
    $imagick = new \Imagick(realpath($imagePath));
   // $imagick = new Gmagick($imagePath);
    $width = ($box->lower_right_x-$box->upper_left_x);
    $height =  ($box->lower_right_y-$box->upper_left_y);
    $imagick->cropImage($width, $height, $box->upper_left_x, $box->upper_left_y);

    header("Content-Type: image/jpeg");

    $imagick->writeImage('/Users/remahwalidbadr/Newspaper-Navigator-API-PHP-Client-Library/image2.jpeg');


}
$filepath = '/Users/remahwalidbadr/Newspaper-Navigator-API-PHP-Client-Library/image1.jpeg';

$imagick = imageCreateFromJpeg($filepath);
$box = new BoundingBox(0, 0, 80.0, 78.9);
cropImage($filepath, $box);


?>
