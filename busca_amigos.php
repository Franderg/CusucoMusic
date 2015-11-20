
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>

<?php
ob_start();
include './conecta_DB.php';

$tbl_name = 'Usuario';
conecta_DB($tbl_name);

if ($_POST['boton'] == "Busca") {
    $username = $_POST['textbox-busqueda'];
    $sql = "SELECT * FROM $tbl_name WHERE Username='$username' ";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    if ($row == '') {
        echo ' <h2> No se encuentra al usuario ' . $username . ' , puedes registarlo y disfrutar de la musica! </h2>';
    } else {
        $user = $row['Username'];

        echo '<h2> Perfil de ' . $user . '</h2>';

        $tbl_name2 = 'Amigo';
        conecta_DB();

        $id = $_GET['id'];

        $sql = "SELECT `Usuario`.`Id_Usuario`, `Usuario`.`Username` FROM $tbl_name2 JOIN `Usuario` ON `Amigo`.`Id_Amigo`=`Usuario`.`Id_Usuario` WHERE `Amigo`.`Id_Usuario`=$id";

        $result = mysql_query($sql);
    }
}