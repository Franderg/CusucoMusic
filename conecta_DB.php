<?php

function conecta_DB() {
    $host = "138.94.56.27"; // Host name
    $username = "root"; // Mysql username
    $password = "adm1n1strator"; // Mysql password
    $db_name = "cusuco"; // Database name
    mysql_connect($host, $username, $password)or die("cannot connect");
    mysql_select_db($db_name)or die("cannot select DB");
}
?>
