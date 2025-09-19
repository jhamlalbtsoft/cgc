<?php
$name=date('Ymd');

if (file_exists("downloads/".$name)) {
   unlink("downloads/".$name);
}
$dir = "downloads/".$name;
 mkdir($dir,0777, true);

/* if(!is_dir("downloads/".$name)){
    //Create our directory.
    mkdir("downloads/".$name, 755, true);
}
 */
 $mid = $_REQUEST['mid'];
$file = $dir."/p".$mid.".html";

$url = 'http://www.cgchamber.org/Members/showcard?MembersId='.$mid.'&Card=1&frmAdmin=1';

$src = fopen($url, 'r');
$dest = fopen($file, 'w');
///echo stream_copy_to_stream($src, $dest) . " bytes copied.\n";
echo stream_copy_to_stream($src, $dest) . " bytes copied.\n";

echo '<a href="'.$file.'" target="_blank">Click here</a>';
die;

     
  // Use the basename function to return the name of the file.
/*  
$url = 'http://www.cgchamber.org/Members/showcard?MembersId=18346&Card=1'; 
   header('Content-Type: application/pdf');  
  
	///file_put_contents("sample.pdf",file_get_contents("URL"));
  if(file_put_contents( "sample.pdf",file_get_contents($url))) { 
    echo "File downloaded successfully."; 
  } 
  else { 
    echo "File download failed."; 
  } */
?>