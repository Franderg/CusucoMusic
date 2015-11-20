<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>


<?php
 //   echo $_GET['id'];
//    include './aside.php';
    require ('./conecta_DB.php');

    $tbl_name = 'Amigo';
    conecta_DB();

    $id = $_GET['id'];

    $sql = "SELECT `Usuario`.`Id_Usuario`, `Usuario`.`Username` FROM $tbl_name JOIN `Usuario` ON `Amigo`.`Id_Amigo`=`Usuario`.`Id_Usuario` WHERE `Amigo`.`Id_Usuario`=$id";

    $result = mysql_query($sql);

    if ($row = mysql_fetch_array($result)) {
        echo "<ul> \n";
        do {
            $url = "<li><a href=\"#\" >" . $row['Username'] . "</a></li> \n";
            echo $url;
        } while ($row = mysql_fetch_array($result));
        echo "<ul> \n";
    } else {
        echo "¡ No se ha encontrado ningún Amigo! Que esperas para buscar amigos.";
    }
?>

</body>
