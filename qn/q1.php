<?php

// require_once('vendor/autoload.php');

// Create an ImagickDraw object
$draw = new \ImagickDraw();

// Create ImagickPixel object
$strokeColor = new \ImagickPixel('Red');
$fillColor = new \ImagickPixel('Green');

// Set the color, opacity of image
$draw->setStrokeOpacity(1);
$draw->setStrokeColor('Red');
$draw->setFillColor('Green');

// Set the width and height of image
$draw->setStrokeWidth(7);
$draw->setFontSize(72);

// Function to draw circle
$draw->circle(250, 250, 100, 150);
$draw->polygon(array());

$imagick = new \Imagick();
$imagick->newImage(500, 500, 'White');
$imagick->setImageFormat("png");
$imagick->drawImage($draw);

// Display the output image
header("Content-Type: image/png");
echo $imagick->getImageBlob();

