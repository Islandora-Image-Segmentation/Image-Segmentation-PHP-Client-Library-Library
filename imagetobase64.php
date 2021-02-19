<?php
require './CreateImageObject.php';

$fileName = "/Users/remahwalidbadr/Newspaper-Navigator-API-PHP-Client-Library/image1.jpeg";
$imageObject = createImageObject($fileName); // create an image object

function imagetobase64(Imagick $imageObj){ // function image to base 64

$base64 = base64_encode($imageObj); // image encoded to base 64
echo $base64;
return $base64; //returns an image encoded to base 64
}

imagetobase64($imageObject); // testing method
?>
