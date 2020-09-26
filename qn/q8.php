<?php
$folderPath="/home/arif/Documents/arif";
//echo fileinode("/home/arif/Documents/arif/Appy-Pie-Logo.mp4");
$fileLists= scandir($folderPath);
echo "<pre>";
print_r($fileLists);
