<?php
$loginreq = true;
$tell = "";

if (trim($_POST['inputUsername']) == '' && trim($_POST['inputPassword']) == '') {
    $loginreq = false;
    $tell .= "Please enter your login details.\n";
}
else if (trim($_POST['inputUsername']) == '') {
    $loginreq = false;
    $tell .= "Please enter your username.\n";
}
else if (trim($_POST['inputPassword']) == '') {
    $loginreq = false;
    $tell .= "Please enter your password.\n";
}

if ($loginreq) {
    include ("db_connect.php");

    $query = "SELECT * FROM users WHERE username = '".mysqli_real_escape_string($connector, $_POST['inputUsername'])."' AND password = '".mysqli_real_escape_string($connector, $_POST['inputPassword'])."'";
    $query_result = mysqli_query ($connector, $query);

    if (mysqli_num_rows($query_result) == 1) {
        $row = mysqli_fetch_array($query_result);
        session_start();
        if ($row['level_auth'] == 2) {
            $_SESSION['logged_in'] = '1';
		    $_SESSION['user'] = $row['username'];
            $_SESSION['level'] = $row['level_auth'];
            $tell = "success";
        }
        else if ($row['level_auth'] == 1) {
            $_SESSION['logged_in'] = '1';
		    $_SESSION['user'] = $row['username'];
            $_SESSION['level'] = $row['level_auth'];
            $tell = "success";
        }
        else {
            $_SESSION['logged_in'] = '1';
		    $_SESSION['user'] = $row['username'];
            $_SESSION['level'] = $row['level_auth'];
            $tell = "success";
        }

    }
    else {
        $tell = "Please enter valid login details.";
    }
}
echo $tell;
?>