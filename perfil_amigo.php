<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>
    <?php
    //funcion para conectar a la base de datos
    include './conecta_DB.php';

    $tbl_name = 'Usuario';
    conecta_DB();

    $id = $_GET['id'];
    $id_amigo = $_GET['id_amigo'];
    $sql = "SELECT * FROM $tbl_name WHERE Id_Usuario='$id_amigo' ";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $username = $row['Username'];

    echo 'Este es el perfil de tu amigo, el famosísimo ' . $username. "\n";

    echo "<ul> \n";

        echo '<a href ="biblioteca_compa.php?id='.$id.'&id_amigo='.$id_amigo.'"><li class="perfil"> Música de '. $row['Username'] .'</li></a>';
        echo '<a href ="compas_de_compa.php?id='.$id.'&id_amigo='.$id_amigo.'"><li class="perfil"> Compas de '. $row['Username'] .'</li></a>';

    echo "</ul> \n";
    ?>
</body>
