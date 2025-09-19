<?php

$dest = imagecreatefromgif('http://cgchamber.org/Image/cert_format1.jpg');
$src = imagecreatefromgif('http://cgchamber.org/Image/1b.jpg');

// Copy and merge
imagecopymerge($dest, $src, 10, 10, 0, 0, 100, 47, 75);

// Output and free from memory
header('Content-Type: image/gif');
imagegif($dest);

imagedestroy($dest);
imagedestroy($src);

?>