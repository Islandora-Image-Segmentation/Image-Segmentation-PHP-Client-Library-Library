# Newspaper-Navigator-API-PHP-Client-Library

## Example Usage
```
$client = new SegmentationClient();
$base64 = imageToBase64(new Imagick("./test.png"));

$client->segmentUrl("https://www.gravatar.com/avatar/a6931c71023665f96eb121b700e4ff49?s=328&d=identicon&r=PG&f=1");
$client->segmentFile("./test.png");
$client->segmentBase64($base64);
$client->segmentImagick(new Imagick("./test.png"));
```