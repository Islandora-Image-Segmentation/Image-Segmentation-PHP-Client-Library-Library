# Newspaper-Navigator-API-PHP-Client-Library

## How to install with Composer
You can add this package as a requirement by adding it to your `composer.json` like so:
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

## Example Usage
```
$client = new SegmentationClient();
$base64 = imageToBase64(new Imagick("./test.png"));

$client->segmentUrl("https://www.gravatar.com/avatar/a6931c71023665f96eb121b700e4ff49?s=328&d=identicon&r=PG&f=1");
$client->segmentFile("./test.png");
$client->segmentBase64($base64);
$client->segmentImagick(new Imagick("./test.png"));
```