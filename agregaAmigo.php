<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>

<body>
    <?php
    ob_start();
    include './conecta_DB.php';

    $tbl_name = 'Amigo';
    conecta_DB();

    $idUsuario = $_GET['idUsuario'];
    $idAmigo = $_GET['idAmigo'];

    if ($_POST['boton'] == 'Agregar a mis compas') {
        $sql = "INSERT INTO `$tbl_name`(`Id_Usuario`,`Id_Amigo`) VALUES ($idUsuario,$idAmigo)";
        $result = mysql_query($sql);
        echo "se ha creado un nuevo lazo de amistad satisfactoriamente!!! Felicidades por eso";
    }

    ob_end_flush();
    ?>
</body>