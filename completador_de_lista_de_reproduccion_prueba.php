
<?php

require ('./conecta_DB.php');
conecta_DB();

$query = 'SELECT Metadata.Nombre, Cancion.Ruta FROM Metadata
JOIN Cancion ON Cancion.Id_Version = Metadata.Id_Version
JOIN Playlist ON Playlist.Id_Cancion = Cancion.Id_Cancion
WHERE Playlist.Id_Usuario='.$user_id;

$queryResult = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_array($queryResult)) {
    $var = $var . '<li><a href="#" data-src="' . $row[Ruta] . '">' . $row[Nombre] . '</a></li>' . "\n";
}

return $var;
?>
