# Newspaper-Navigator-API-PHP-Client-Library
An API PHP wrapper around the Newspaper Navigator app.

## Installation (Bare Metal)
 1. Clone this repo.
 2. Install PHP 7.4 (https://formulae.brew.sh/formula/php@7.4#default).
 3. Install ImageMagick (https://formulae.brew.sh/formula/imagemagick#default).
 4. Install imagick and ghostschript (https://ma.ttias.be/install-phps-imagick-extension-on-mac-with-brew/). 

 ## Launching the API
 https://github.com/Islandora-Image-Segmentation/Newspaper-Navigator-API/blob/dev/README.md


## Endpoints
The API has the following endpoints:

/api/segment_formdata: This endpoint expects the image to be segmented appended as formdata. /api/segment_url: This endpoint expects a POST request with JSON body in the format of {"image_url": URL_HERE} /api/segment_base64: This endpoint expects a POST request with JSON body in the format of {"image_base64": BASE64_HERE}

All endpoints will return a SegmentationResponse in the following format:

class SegmentationResponse{
    public int $status_code;
    public string $error_message;
    public ?int $segment_count;
    public ?array $segments = array();}



where ExtractedSegment is defined by:

class ExtractedSegment{
    public string $ocr_text;
    public BoundingBox $bounding_box;
    public array $embedding;
    public string $classification;
    public float $confidence;
}

Note: If something goes wrong with your request, the status_code of the response will be non-zero and the reason will be returned in error_message. In that case, segment_count and segments will be null so make sure to check the status_code of the response before accessing those fields.

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