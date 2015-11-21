
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>

<body>
    <?php
    ob_start();
    include './conecta_DB.php';

    $id = $_GET['id'];
    $tbl_name = 'Usuario';
    conecta_DB();

    if ($_POST['boton'] == "Busca") {
        $username = $_POST['textbox-busqueda'];
        $sql = "SELECT * FROM $tbl_name WHERE Username='$username' ";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        if ($row == '') {
            echo ' <h2> No se encuentra al usuario ' . $username . ' , puedes registarlo y disfrutar de la musica! </h2>'.'\n';
        } else {
            $user = $row['Username'];
            $idBuscado = $row['Id_Usuario'];
            echo ' Perfil de ' . $user . '<br>';
            $tbl_name2 = 'Amigo';
            conecta_DB();

            $sql2 = "SELECT `Usuario`.`Id_Usuario`, `Usuario`.`Username` FROM $tbl_name2 JOIN `Usuario` ON `Amigo`.`Id_Amigo`=`Usuario`.`Id_Usuario` WHERE `Amigo`.`Id_Usuario`=$id";
            $result2 = mysql_query($sql2);
            $row2 = mysql_fetch_array($result2);
            $find = "show";


            for ($index = 0; $index < count($row2); $index++) {
                if ($row2['Id_Usuario'] == $idBuscado) {
                    echo 'Ya es tu amigo';
                    $find = "hidden";
                    break;
                }
            }
            if ($find == "show") {
                echo 'no son amigos, que esperas para agregarlo!'."\n";
            }
        }
    }

    $url = "agregaAmigo.php?idUsuario=" . $id. '&idAmigo=' .$idBuscado;
    ?>

    <form method="post" name="agrega" <?php echo $find ?> action=<?php echo $url ?> >
        <p class="groupbottom">
            <input type="submit" style="width:300px;height:50px" value="Agregar a mis compas" name="boton"/>
        </p>
    </form>

</body>
