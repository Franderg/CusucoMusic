<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>
    <ul>
        <?php
        echo "este es tu playlist!";
        $id = $_GET['id'];
        require ('./conecta_DB.php');
        conecta_DB();

        $sql = 'SELECT m.Nombre,c.Ruta,u.Username,c.Id_Cancion,a.Nombre_Artista FROM Metadata m '
                . 'JOIN Cancion c ON c.Id_Version=m.Id_Version '
                . 'JOIN Playlist p ON c.Id_Cancion=p.Id_Cancion '
                . 'JOIN Biblioteca b ON p.Id_Cancion=b.Id_Cancion '
                . 'JOIN Usuario u ON u.Id_Usuario=b.Id_Usuario '
                . 'JOIN Artista a ON m.Id_Artista=a.Id_Artista '
                . 'WHERE p.Id_Usuario='.$id;

        $queryResult = mysql_query($sql) or die(mysql_error());
        while ($row = mysql_fetch_array($queryResult)) {
            $var = $var . '<a href ="cancion_playlist.php?id='.$id.'&id_cancion='.$row[Id_Cancion].'&amigo='.$row[Username].'&ruta='.$row[Ruta].'&nombre_cancion='.$row[Nombre].'&nombre_grupo='.$row[Nombre_Artista].'"><li class="perfil">'. $row[Nombre].'</li></a>'. "\n";

        }
        echo $var;
        ?>
    </ul>

</body>
