<?php
$isallok = true;
$msg = "";

if(trim($_POST['txt_f_name'])==''){
	$isallok = false; $msg .="Enter Student No.\n";
}
if(trim($_POST['txt_m_name'])==''){
	$isallok = false; $msg .="Enter Firstname\n";
}
if(trim($_POST['txt_l_name'])==''){
	$isallok = false; $msg .="Enter Middlename\n";
}
if(trim($_POST['txt_student_no'])==''){
	$isallok = false; $msg .="Enter Lastname\n";
}
if(trim($_POST['txt_username'])==''){
	$isallok = false; $msg .="Enter Lastname\n";
}
if(trim($_POST['txt_password'])==''){
	$isallok = false; $msg .="Enter Lastname\n";
}

if($isallok){
	include("db_connect.php");
	$query = "UPDATE users
			SET f_name = '".mysqli_real_escape_string($connector, $_POST['txt_f_name'])."'
			, m_name = '".mysqli_real_escape_string($connector, $_POST['txt_m_name'])."'
			, l_name = '".mysqli_real_escape_string($connector, $_POST['txt_l_name'])."'
			, student_no  = '".mysqli_real_escape_string($connector, $_POST['txt_student_no'])."'
            , username  = '".mysqli_real_escape_string($connector, $_POST['txt_username'])."'
			, password  = '".mysqli_real_escape_string($connector, $_POST['txt_password'])."'
			WHERE id = '".mysqli_real_escape_string($connector, $_POST['txt_users_id'])."'
			";
	$result = mysqli_query($connector, $query);
	$lid = $_POST['txt_users_id'];
	
	if(isset($_FILES['upload'])){
		$dir = "../uploads/";
		for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
			$pdfname = $_FILES["upload"]["name"][$i];
			$sizepdf = $_FILES["upload"]["size"][$i];
			$tmpname = $_FILES["upload"]["tmp_name"][$i];
			$fileType = $_FILES['upload']['type'][$i];
			$ext = explode('.', $pdfname);
			$actualExt = strtolower(end($ext));
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