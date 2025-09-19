<?php 
session_start();
$_ADMIN = false;
$UserTypeId = 0;
$SGRep1 = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}
if (!$_ADMIN) {
	echo "you dont have permission";
	die;
}
if(!isset($_REQUEST['fId'])) {
	echo "invalid try";
	die;
}
// Check if form was submited 
if(isset($_POST['submit'])) { 

	// Configure upload directory and allowed file types 
	$upload_dir = '../Image/merged'.DIRECTORY_SEPARATOR; 
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif','pdf','xls', 'xlxs'); 
	
	// Define maxsize for files i.e 2MB 
	$maxsize = 7 * 1024 * 1024; 
    $imgPath='';
    $filePath1='';
	// Checks if user sent an empty form 
	if(!empty(array_filter($_FILES['files']['name']))) { 
		$Error=0;
		// Loop through each file in files[] array 
		foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
			
			$file_tmpname = $_FILES['files']['tmp_name'][$key]; 
			$file_name = $_FILES['files']['name'][$key]; 
			$file_size = $_FILES['files']['size'][$key]; 
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 

			// Set upload file path 
			$filepath = $upload_dir.$file_name; 

			// Check file type is allowed or not 
			if(in_array(strtolower($file_ext), $allowed_types)) { 

				// Verify file size - 2MB max 
				if ($file_size > $maxsize){		 
					echo "Error: File size is larger than the allowed limit."; 
				  //$Error++;
				}

				// If file with name already exist then append time in 
				// front of name of the file to avoid overwriting of file 
				
				if(file_exists($filepath)) { 
					$filepath = $upload_dir.time().$file_name; 
					//echo $filepath.':f$key<br>';
					if( move_uploaded_file($file_tmpname, $filepath)) { 
						$filepath = str_replace('../','', $filepath);
						//echo "{$file_name} successfully uploaded <br />";
						if(strtolower($file_ext)=='pdf' || strtolower($file_ext)=='xls' || strtolower($file_ext)=='xlsx'){
							if($filePath1)
								$filePath1.=',';
							$filePath1.=$filepath;
						}else{
							if($imgPath)
								$imgPath.=',';
							$imgPath.=$filepath;
						}
					} 
					else {					 
						echo "Error uploading {$file_name} <br />"; 
						$Error++;
					} 
				} 
				else { 
				
					if( move_uploaded_file($file_tmpname, $filepath)) { 
						$filepath = str_replace('../','', $filepath);
						echo "{$file_name} successfully uploaded <br />"; 
						if(strtolower($file_ext)=='pdf' || strtolower($file_ext)=='xls' || strtolower($file_ext)=='xlsx'){
							if($filePath1)
								$filePath1.=',';
							$filePath1.=$filepath;
						}else{
							if($imgPath)
								$imgPath.=',';
							$imgPath.=$filepath;
						}
					} 
					else {					 
						echo "Error uploading new {$file_name} <br />"; 
						$Error++;
					} 
				}
				//echo "{$file_ext} :: {$imgPath}:: {$filePath1} <br />"; 
			} 
			else { 
				
				// If file extention not valid 
				echo "Error uploading {$file_name} "; 
				echo "({$file_ext} file type is not allowed)<br / >"; 
				$Error++;
			}
		}

		if(isset($_REQUEST['fId']) && $_REQUEST['fId']!='') {
			require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
			require PATH_LIB . "lib-eep.php";
			$eepLib = new Eep();
			$user = $eepLib->get($_REQUEST['fId']);
			$Imagedb = $user['Image'];
			$filePathdb = $user['filePath'];
			if($imgPath){
				$Imagedb.=','.$imgPath;
				$Imagedb = trim(str_replace(',,',',', $Imagedb),',');
			}
			if($filePath1){
				$filePathdb.=','.$filePath1;
				$filePathdb = trim(str_replace(',,',',', $filePathdb),',');
			}
			///echo $Imagedb, '---',$filePathdb;
			if($eepLib->updateFiles ($Imagedb, $filePathdb, $_REQUEST['fId']) && $Error==0){
				echo '<br><font color="green">Successfully file uploaded</font>';
			}else{
				echo '<br><font color="red">error on upload</font>';
			}
			
		}else{
			echo "<br>DB Error on uploading files "; 
		}
	} 
	else { 
		
		// If no files selected 
		echo "No files selected."; 
	} 
} 

?>
<!DOCTYPE html> 
<html> 
  
<head> 
    <title> 
        Select and upload multiple 
        files to the server 
    </title> 
</head> 
  
<body> 
  
    <!-- multipart/form-data ensures that form 
    data is going to be encoded as MIME data -->
    <form action="" method="POST"
            enctype="multipart/form-data"> 
  
        <h2>Upload Files</h2> 
          
        <p> 
            Select files to upload:  
              
            <!-- name of the input fields are going to 
                be used in our php script-->
            <input type="file" name="files[]" multiple> 
            <input type="hidden" name="fId" value="<?=$_REQUEST['fId']?>"> 
              
            <br><br> 
              
            <input type="submit" name="submit" value="Upload" > 
        </p> 
    </form> 
</body> 
  
</html>    
