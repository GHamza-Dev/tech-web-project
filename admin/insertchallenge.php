
<?php 

require '../config/db_config.php';
	$db = new Db();


	$id = $db->getlastid();
	$idd=$id[0]+1;

	$errMsg = "";
	$errCode = 0;

	if(!isset($_POST["submit"])){
		header("location:index.php");
		die();
	}

	$type_chall= $_POST['level'];
	$text_langa= $_POST['langs'];
	$discription_chall= $_POST['desc'];
	$title_chall= $_POST['title'];

	
    $filename = $idd."_".$_FILES["ui"]["name"]; 
	$ui = $_FILES["ui"]["tmp_name"];	 
    $folder = "files/".$filename; 
        
    $filename1 = $idd."_".$_FILES["img2"]["name"]; 
    $img2 = $_FILES["img2"]["tmp_name"];	 
    $folder1 = "preview/mob/".$filename1; 

    $filename2 = $idd."_".$_FILES["img1"]["name"]; 
    $img1 = $_FILES["img1"]["tmp_name"];	 
    $folder2 = "preview/desk/".$filename2; 
        
    $db->addChallenge($type_chall,$text_langa,$filename,$discription_chall,$title_chall,$filename1,$filename2); 


	if (!move_uploaded_file($ui,$folder)) { 
		$errMsg.= "Failed to upload image <br>";
		$errCode = 1;		 
	}else{ 
		$errMsg.= "Image uploaded successfully <br>"; 
	}  

	if (!move_uploaded_file($img2,$folder1)) { 
		$errMsg.= "Failed to upload image <br>";
		$errCode = 1;		 
    }else{ 
        $errMsg.= "Image uploaded successfully <br>"; 
    }

	if (!move_uploaded_file($img1,$folder2)) { 
		$errMsg.= "Failed to upload image <br>";
		$errCode = 1;		 
	}else{ 
		$errMsg.= "Image uploaded successfully <br>"; 
		
	} 
	echo $errMsg;
	
	header('location:index.php?errcode='.$errCode);







?> 