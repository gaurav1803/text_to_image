<?php
<html>
<body>
//share on facebook
<div class="fb-share-button" data-href="http://127.0.0.1/t2m.php" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%2Ft2m.php&amp;src=sdkpreparse">Share</a></div>
</body>
</html>
$text="privet privet2 privet3";
$text=wordwrap($text, 35, "\n", TRUE);

//setting the image header in order to proper display the image
header("Content-Type: image/png");
//try to create an image
$im = @imagecreate(460, 215)
    or die("Cannot Initialize new GD image stream");
//set the background color of the image
$background_color = imagecolorallocate($im, 0x00, 0x00, 0x00);
//set the color for the text
$text_color = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
//adf the string to the image

$font = "verdana.ttf";
$font_size = 20;
$angle = 0;

$splittext = explode ( "\n" , $text );
$lines = count($splittext);

foreach ($splittext as $text) {
    $text_box = imagettfbbox($font_size,$angle,$font,$text);
    $text_width = abs(max($text_box[2], $text_box[4]));
    $text_height = abs(max($text_box[5], $text_box[7]));
    $x = (imagesx($im) - $text_width)/2;
    $y = ((imagesy($im) + $text_height)/2)-($lines-2)*$text_height;
    $lines=$lines-1;
    imagettftext($im, $font_size, $angle, $x, $y, $text_color, $font, $text);
}

imagepng($im);
imagedestroy($im);
?>
