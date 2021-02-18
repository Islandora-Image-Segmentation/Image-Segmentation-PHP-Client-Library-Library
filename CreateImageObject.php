<?php
// this method creates an image object and returns it
function createImageObject($filename): Imagick // return type
{
    return $imageObject = new \Imagick(realpath($filename)); //create an instance for a specified image
}//
?>