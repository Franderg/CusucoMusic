<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>

        <?php

        $id = $_GET['id'];
        $amigo = $_GET['amigo'];
        $id_cancion = $_GET['id_cancion'];
        $ruta = $_GET['ruta'];
        $nombre_cancion = $_GET['nombre_cancion'];
        $nombre_grupo = $_GET['nombre_grupo'];


echo "Nombre de la canción: ".$nombre_cancion."</br>";
echo "Amigo que te comparte la canción: ".$amigo."</br>"."</br>";



            echo "<ul> \n";

                echo '<a href ="eliminar_cancion_de_lista.php?id='.$id.'&id_cancion='.$id_cancion.'"><li class="perfil"> Eliminar del Playlist </li></a>';

            echo "</ul> \n";
            ?>





</body>
