<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>

        <?php

        $nombre_cancion = $_GET['nombre_cancion'];
        $nombre_grupo = $_GET['nombre_grupo'];
        $meta='http://musicbrainz.org/ws/2/recording?inc=artist&query=%22'.$nombre_cancion.'%22%20AND%20artist:%22'.$nombre_grupo.'%22&fmt=json';
        $str = file_get_contents($meta);
        echo $str ."\n";
            ?>





</body>
