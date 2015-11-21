<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />


<script>

    function carga_contenido(parametro, user) {
        if (parametro == 'perfil') {
            this.location.href = 'perfil.php?id=' + user;
        }
    }
</script>

</head>
<body>


<?php
 //   echo $_GET['id'];
//    include './aside.php';
    require ('./conecta_DB.php');

    $tbl_name = 'Amigo';
    conecta_DB();

    $id = $_GET['id'];
    $id_amigo = $_GET['id_amigo'];

    $sql = "SELECT `Usuario`.`Id_Usuario`, `Usuario`.`Username` FROM $tbl_name JOIN `Usuario` ON `Amigo`.`Id_Amigo`=`Usuario`.`Id_Usuario` WHERE `Amigo`.`Id_Usuario`=$id_amigo";

    $result = mysql_query($sql);

    if ($row = mysql_fetch_array($result)) {
        echo "<ul> \n";
        do {

            echo '<a href ="#"><li class="perfil">'. $row['Username'] .'</li></a>';
        } while ($row = mysql_fetch_array($result));
        echo "</ul> \n";
    } else {
        echo "¡ No se ha encontrado ningún Amigo! Que esperas para buscar amigos.";
    }

    $url = "busca_amigos.php?id=" . $id;
    ?>

    <form method="post" name="login" action=<?php echo $url ?> >
        <p class="groupbottom">
            <input id="textbox-busqueda" name="textbox-busqueda" style="width:250px;height:50px" placeholder="busca usuarios" type="text">
        <input type="submit" style="width:50px;height:50px" value="Busca" name="boton"/>
        </p>
    </form>

</body>
