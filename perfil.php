<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>


<?php
//funcion para conectar a la base de datos
include './conecta_DB.php';

$tbl_name = 'Usuario';
conecta_DB($tbl_name);

$id = $_GET['id'];
$sql = "SELECT * FROM $tbl_name WHERE Id_Usuario='$id' ";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$username= $row['Username'];

echo '<h2>Bienvenido '.$username.'</h2>'.'<br>';

?>
</body>
