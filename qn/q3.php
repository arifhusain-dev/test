<?php
header('Content-type: image/png');
$png_image = imagecreate(300, 300);
$grey = imagecolorallocate($png_image, 229, 229, 229);
$green = imagecolorallocate($png_image, 128, 204, 204);
imagefilltoborder($png_image, 0, 0, $grey, $grey);

imagefilledrectangle ($png_image, 20, 20, 80, 80, $green);     // SQUARE
imagefilledrectangle ($png_image, 100, 20, 280, 80, $green);   // RECTANGLE
imagefilledellipse ($png_image, 50, 150, 75, 75, $green);      // CIRCLE
imagefilledellipse ($png_image, 200, 150, 150, 75, $green);    // ELLIPSE

$poly_points = array(150, 200, 100, 280, 200, 280);
imagefilledpolygon ($png_image, $poly_points, 3, $green);      // POLYGON

imagepng($png_image);
imagedestroy($png_image);