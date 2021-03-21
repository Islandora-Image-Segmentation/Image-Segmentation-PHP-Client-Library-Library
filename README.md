# Newspaper-Navigator-API-PHP-Client-Library
This is a PHP client library for the Islandora Image Segmentation API that can be found [here](https://github.com/Islandora-Image-Segmentation/Newspaper-Navigator-API). 


## Installation
 1. Clone this repo.
 2. Ensure you have PHP >= 7.4 installed.
 3. Ensure you have ImageMagick and imagick installed.
 4. Run `composer install` to install the PHP dependencies.
 
 
## How to add as a requirement
You can add this package as a requirement to your project by adding it to your `composer.json` like so:
```
{
   "repositories": [
       {
           "type": "vcs",
           "url": "http://github.com/Islandora-Image-Segmentation/Newspaper-Navigator-API-PHP-Client-Library"
       }
   ],
   "require": {
       "islandora_image_segmentation/php_client_library": ">=0.1"
   }
}
```

## Example usage
To use this client library, include it and create a `SegmentationClient` object. The `SegmentationClient` constructor accepts the following parameters:

`public function __construct(string $base_uri="localhost:8000/api/", float $timeout=30.0, string $api_key="")`

This object contains utility methods that will send images to the API for segmentation. You can use a URL, an image file on your computer, a base64 encoded image, or an Imagick object. Here is an example usage:

```
$client = new SegmentationClient();
$base64 = imageToBase64(new Imagick("./test.png"));

$client->segmentUrl("https://www.gravatar.com/avatar/a6931c71023665f96eb121b700e4ff49?s=328&d=identicon&r=PG&f=1");
$client->segmentFile("./test.png");
$client->segmentBase64($base64);
$client->segmentImagick(new Imagick("./test.png"));
```