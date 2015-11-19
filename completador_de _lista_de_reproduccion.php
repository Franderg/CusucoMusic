



<?php

require ('./conecta_DB.php');
conecta_DB();

$queryResult = mysql_query('SELECT Nombre,Ruta FROM Metadata') or die(mysql_error());

while ($row = mysql_fetch_array($queryResult)) {
  $var =$var.'<li><a href="#" data-src="'.$row[Ruta].'">'.$row[Nombre].'</a></li>'."\n";
}



return $var;

?>
