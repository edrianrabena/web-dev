<?php
$isallok = true;
$msg = "";

if($isallok){
	include("db_connect.php");
	$query = "SELECT * FROM thesis WHERE id = '".mysqli_real_escape_string($connector, $_POST['txtid'])."'";
	$result = mysqli_query($connector, $query);
	$row = mysqli_fetch_array($result);
	$id = $row['id'];
	$uploadFolder = '../uploads/';
	$uploadedFileName = $id.'.pdf';
	$filePath = $uploadFolder . $uploadedFileName;
	if (file_exists($filePath)) {
		unlink("../uploads/".$uploadedFileName);
	}
	
	echo "success";
} else {
	echo $msg;
}
?>