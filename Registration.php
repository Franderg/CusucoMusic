
<!DOCTYPE html>

<html class = "ng-csp" data-placeholder-focus = "false">
<head data-requesttoken="f0f9b0f8d111473a000a">
    <title>
        cusuco
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />

</head>
</html>

<?php
ob_start();

include './conecta_DB.php';

conecta_DB();

// username and password sent from form
$myusername = $_POST['user'];
$mypassword = $_POST['password'];
$mypassword2 = $_POST['password2'];
$tbl_name = 'Usuario';

switch ($_POST['boton']) {
    case "Back":header('Location:index.php');
        break;
    case "Register":
        if ($myusername != "" and $mypassword != "" and $mypassword2 != "") {

            if ($mypassword != $mypassword2) {
                echo 'passw diferentes';
            } else {
                $sql = "INSERT INTO `$tbl_name`(`Id_Usuario`, `Username`, `Password`) VALUES ('', '$myusername' ,'$mypassword')";
                $result = mysql_query($sql);
                header('Location:index.php');
            }

            ob_end_flush();
        } else {
            header('Location:index.php');
        }
}
