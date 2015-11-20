<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body>
    <?php
    //funcion para conectar a la base de datos
    include './conecta_DB.php';

    $tbl_name = 'Usuario';
    conecta_DB();

    $id = $_GET['id'];
    $sql = "SELECT * FROM $tbl_name WHERE Id_Usuario='$id' ";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $username = $row['Username'];

    echo 'Bienvenido ' . $username;
    ?>

    <form method="post" name="login" action="busca_amigos.php" >
        <p class="groupbottom">
            <input id="textbox-busqueda" name="textbox-busqueda" style="width:250px;height:50px" placeholder="busca usuarios" type="text">        
        <input type="submit" style="width:50px;height:50px" value="Busca" name="boton"/>
        </p>
    </form>
</body>
