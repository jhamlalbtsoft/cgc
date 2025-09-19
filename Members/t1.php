<?php

//$src = 'http://www.cgchamber.org/Image/4162_om%2025-06-233333.jpg';
//$src = @imagecreatefromjpeg($src);
$src =@'../Image/4162_om 25-06-233333.jpg';
var_dump(is_file($src));

if (extension_loaded('gd')) {
  print 'gd loaded';
} else {
  print 'gd NOT loaded';
}
PHPinfo();

?>