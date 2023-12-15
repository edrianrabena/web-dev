<?php 
$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

if (!isset($_SESSION['logged_in'])) {
	include("login.php"); 
}
else {
    include("navigation.php");
    if ($_SESSION['level'] == "2") {
        include("debug.php");
    }
    else if ($_SESSION['level'] == "1") {
        include("debug.php");
    }
    else {
        include("debug.php");
    }

	switch($page){
		case "": include("homepage.php");break;
		case "manage_students": include("manage_students.php"); break;
		case "edit_students": include("edit_students.php"); break;
        case "add_thesis": include("add_thesis.php"); break;
        case "edit_thesis": include("edit_thesis.php"); break;
        case "view_thesis": include("view_thesis.php"); break;
		case "delete": include("delete.php"); break;
		default: include("error.php");
	}

}
?>