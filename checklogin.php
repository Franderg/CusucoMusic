<!DOCTYPE html>

<html class = "ng-csp" data-placeholder-focus = "false">
    
        <title>
            odyssey
        </title>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
        <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <meta name = "apple-itunes-app" content = "app-id=543672169">

        <link rel = "shortcut icon" href = "/owncloud/core/img/favicon.png" />
        <link rel = "apple-touch-icon-precomposed" href = "/owncloud/core/img/favicon-touch.png" />

        <link rel = "stylesheet" href = "/owncloud/core/css/styles.css?v=c738ceb8e9cad987cfe7d26b33de9901" type = "text/css" media = "screen" />

    
</html>

<?php
ob_start();

//funcion para conectar a la base de datos
include './conecta_DB.php';

$tbl_name = 'Usuario';
conecta_DB();


// username and password sent from form
$myusername = $_POST['user'];
$mypassword = $_POST['password'];


switch ($_POST['boton']) {
    case "Registro":header('Location:register.php');
        break;
    case "Ingreso":
        if ($myusername != "") {

// To protect MySQL injection (more detail about MySQL injection)
            $myusername = stripslashes($myusername);
            $mypassword = stripslashes($mypassword);
            $myusername = mysql_real_escape_string($myusername);
            $mypassword = mysql_real_escape_string($mypassword);

            $sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
            $result = mysql_query($sql);

// Mysql_num_row is counting table row
            $count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

            if ($count == 1) {

// Register $myusername, $mypassword and redirect to file "login_success.php"
                $_SESSION['user']= $myusername;
                session_start();
                $row = mysql_fetch_array($result);
                $id = "location:cusuco.php?id=" . $row['Id_Usuario'];
                header($id);
            } else {
                echo '<script language="javascript">';
                echo 'alert("El usuario no se encuentra registrado")';
                echo '</script>';
               // header("Location:index.php");
            }
            ob_end_flush();
        } else {
            header('Location:index.php');
        }
        break;
}
