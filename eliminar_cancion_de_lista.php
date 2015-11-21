<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>

  <?php

  ob_start();
  include './conecta_DB.php';

  $tbl_name = 'Playlist';
  conecta_DB();

  $id = $_GET['id'];
  $id_cancion = $_GET['id_cancion'];

  if (isset($id) && isset($id_cancion)) {

      $sql = "DELETE FROM `$tbl_name` WHERE `Playlist`.`Id_Usuario` = $id AND `Playlist`.`Id_Cancion` = $id_cancion ";

      $result = mysql_query($sql);
      echo "Enhorabuena! tienes una canción menos en tu playlist";
  }else{
    echo "mamut, algo ha salido catastróficamente mal";
  }

  ob_end_flush();
      ?>
</body>
