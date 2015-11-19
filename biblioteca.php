<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>
    <ul>
      <?php
      $id = $_GET['id'];
      require ('./conecta_DB.php');
      conecta_DB();

$sql = "SELECT m.Nombre,m.Ruta FROM Metadata m JOIN Cancion c ON c.Id_Version=m.Id_Version JOIN Biblioteca b ON c.Id_Cancion=b.Id_Cancion JOIN Usuario u ON u.Id_Usuario=b.Id_Usuario";

      $queryResult = mysql_query($sql) or die(mysql_error());

      while ($row = mysql_fetch_array($queryResult)) {
        $var =$var.'<li><a data-src="'.$row[Ruta].'">'.$row[Nombre].'</a></li>'."\n";
      }
echo $var;


      ?>
    </ul>






</body>
