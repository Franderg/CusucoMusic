<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>
    <ul>
        <?php
        $id_amigo = $_GET['id_amigo'];
        $id = $_GET['id'];
        require ('./conecta_DB.php');
        conecta_DB();

        $sql = 'SELECT m.Nombre,c.Ruta,c.Id_Cancion,a.Nombre_Artista FROM Metadata m '
                . 'JOIN Cancion c ON c.Id_Version=m.Id_Version '
                . 'JOIN Biblioteca b ON c.Id_Cancion=b.Id_Cancion '
                . 'JOIN Artista a ON m.Id_Artista=a.Id_Artista '
                . 'WHERE b.Id_Usuario='.$id_amigo;

        $queryResult = mysql_query($sql) or die(mysql_error());
        while ($row = mysql_fetch_array($queryResult)) {
            $var = $var . '<a href ="cancion.php?id='.$id.'&id_cancion='.$row[Id_Cancion].'&id_amigo='.$id_amigo.'&ruta='.$row[Ruta].'&nombre_cancion='.$row[Nombre].'&nombre_grupo='.$row[Nombre_Artista].'"><li class="perfil">'. $row[Nombre].'</li></a>'. "\n";

        }
        echo $var;
        ?>
    </ul>

</body>
