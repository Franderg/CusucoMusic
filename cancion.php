<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>

        <?php

        $id = $_GET['id'];
        $id_amigo = $_GET['id_amigo'];
        $id_cancion = $_GET['id_cancion'];
        $ruta = $_GET['ruta'];
        $nombre_cancion = $_GET['nombre_cancion'];
        $nombre_grupo = $_GET['nombre_grupo'];



            echo "<ul> \n";

                echo '<a href ="meta.php?nombre_cancion='.$nombre_cancion.'&nombre_grupo='.$nombre_grupo.'"><li class="perfil"> Consultar Metadata </li></a>';
                echo '<a href ="agregar_cancion_a_lista.php?id='.$id.'&id_cancion='.$id_cancion.'"><li class="perfil"> Incluir al Playlist </li></a>';

            echo "</ul> \n";
            ?>





</body>
