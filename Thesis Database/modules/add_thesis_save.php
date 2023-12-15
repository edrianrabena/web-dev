<?php
$isallok = true;
$msg = "";

if(trim($_POST['txt_title'])==''){
	$isallok = false; $msg .="Enter thesis title.\n";
}
if(trim($_POST['txt_date'])==''){
	$isallok = false; $msg .="Enter date of publication.\n";
}
if(trim($_POST['txt_author'])==''){
	$isallok = false; $msg .="Enter author.\n";
}
if(trim($_POST['txt_abstract'])==''){
	$isallok = false; $msg .="Enter abstract.\n";
}
if(trim($_POST['txt_location'])==''){
	$isallok = false; $msg .="Enter thesis storage location.\n";
}

if($isallok){
	include("db_connect.php");
	$query = "INSERT INTO thesis (title, date, author, abstract, location) VALUES (
			'".mysqli_real_escape_string($connector, $_POST['txt_title'])."',
			'".mysqli_real_escape_string($connector, $_POST['txt_date'])."',
			'".mysqli_real_escape_string($connector, $_POST['txt_author'])."',
			'".mysqli_real_escape_string($connector, $_POST['txt_abstract'])."',
			'".mysqli_real_escape_string($connector, $_POST['txt_location'])."'
			)";
	$result = mysqli_query($connector, $query);
	$lid = mysqli_insert_id($connector);
	
	if(isset($_FILES['upload'])){
		$dir = "../uploads/";
		
		for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
			$pdfname = $_FILES["upload"]["name"][$i];
			$sizepdf = $_FILES["upload"]["size"][$i];
			$tmpname = $_FILES["upload"]["tmp_name"][$i];
			$fileType = $_FILES['upload']['type'][$i];
			$ext = explode('.', $pdfname);
			$actualExt = strtolower(end($ext));
			//2MB -> 2097152 bytes
			//20MB -> 20971520 bytes
			//50 MB -> 52428800 bytes 
			$extension = strtolower(pathinfo($dir.$pdfname,PATHINFO_EXTENSION));
			$allowed = array('pdf');
			if($sizepdf>0){
				if(in_array($actualExt,$allowed)){
					if($sizepdf < 20971520){ 
						if(!file_exists($dir.$pdfname)){
							move_uploaded_file($tmpname,$dir.$lid.".".$actualExt);
							$msg = "success";
						}
					} else {
						$msg = "File too large.";
					}
				} else {
					$msg = "Invalid File format";
				}		 
			} else {
				$msg = "success";
			}
		}
		mysqli_close($connector);
	} else {
		$msg = "success";
	}
	echo $msg;
} else {
	echo $msg;
}
?>