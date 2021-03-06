<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.png" />

    <title>Cusuco</title>

    <style>
        body { color: #666; font-family: sans-serif; line-height: 1.4; }
        h1 { color: #444; font-size: 1.2em; padding: 14px 2px 12px; margin: 0px; }
        h1 em { font-style: normal; color: #999; }
        a { color: #888; text-decoration: none; }
        #wrapper { width: 350px;height: 80%; margin: 40px auto; }

        ol { padding: 0px; margin: 0px; list-style: decimal-leading-zero inside; color: #ccc; width: 460px; border-top: 1px solid #ccc; font-size: 0.9em; }
        ol li { position: relative; margin: 0px; padding: 9px 2px 10px; border-bottom: 1px solid #ccc; cursor: pointer; }
        ol li a { display: block; text-indent: -3.3ex; padding: 0px 0px 0px 20px; }
        li.playing { color: #aaa; text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.3); }
        li.playing a { color: #000; }
        li.playing:before { content: '♬'; width: 14px; height: 14px; padding: 3px; line-height: 14px; margin: 0px; position: absolute; left: -24px; top: 9px; color: #000; font-size: 13px; text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2); }

        #shortcuts { position: fixed; bottom: 0px; width: 100%; color: #666; font-size: 0.9em; margin: 60px 0px 0px; padding: 20px 20px 15px; background: #f3f3f3; background: rgba(240, 240, 240, 0.7); }
        #shortcuts div { width: 460px; margin: 0px auto; }
        #shortcuts h1 { margin: 0px 0px 6px; }
        #shortcuts p { margin: 0px 0px 18px; }
        #shortcuts em { font-style: normal; background: #d3d3d3; padding: 3px 9px; position: relative; left: -3px;
                        -webkit-border-radius: 4px; -moz-border-radius: 4px; -o-border-radius: 4px; border-radius: 4px;
                        -webkit-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); -moz-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); -o-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); }

        @media screen and (max-device-width: 480px) {
            #wrapper { position: relative; left: -3%; }
            #shortcuts { display: none; }
        }
    </style>
    <script src="./audiojs/audio.min.js"></script>
    <!-- <link rel="stylesheet" href="./includes/index.css" media="screen"> -->
    <script src="js/jquery.js"></script>


    <script>

        function carga_contenido(parametro, user) {
            if (parametro == 'perfil') {
                var url = '<object type="text/html" data="perfil.php?id=' + user + '"></object>';
                document.getElementById("contenido").innerHTML = url;
            } else if (parametro == 'compas') {
                var url = '<object type="text/html" data="compas.php?id=' + user + '"></object>';
                document.getElementById("contenido").innerHTML = url;
            } else if (parametro == 'biblioteca') {
                var url = '<object type="text/html" data="biblioteca.php?id=' + user + '"></object>';
                document.getElementById("contenido").innerHTML = url;
            } else if (parametro == 'playlist') {
                var url = '<object type="text/html" data="playlist.php?id=' + user + '"></object>';
                document.getElementById("contenido").innerHTML = url;
            } else if (parametro == 'ayuda') {
                var url = '<object type="text/html" data="ayuda.php?id=' + user + '"></object>';
                document.getElementById("contenido").innerHTML = url;
            }
        }

        $(function () {

            // Setup the player to autoplay the next track
            var a = audiojs.createAll({
                trackEnded: function () {
                    var next = $('ol li.playing').next();
                    if (!next.length)
                        next = $('ol li').first();
                    next.addClass('playing').siblings().removeClass('playing');
                    audio.load($('a', next).attr('data-src'));
                    audio.play();
                }
            });
            // Load in the first track
            var audio = a[0];
            first = $('ol a').attr('data-src');
            $('ol li').first().addClass('playing');
            audio.load(first);
            // Load in a track on click
            $('ol li').click(function (e) {
                e.preventDefault();
                $(this).addClass('playing').siblings().removeClass('playing');
                audio.load($('a', this).attr('data-src'));
                audio.play();
            });
            // Keyboard shortcuts
            $(document).keydown(function (e) {
                var unicode = e.charCode ? e.charCode : e.keyCode;
                // right arrow
                if (unicode == 39) {
                    var next = $('li.playing').next();
                    if (!next.length)
                        next = $('ol li').first();
                    next.click();
                    // back arrow
                } else if (unicode == 37) {
                    var prev = $('li.playing').prev();
                    if (!prev.length)
                        prev = $('ol li').last();
                    prev.click();
                    // spacebar
                } else if (unicode == 32) {
                    audio.playPause();
                }
            })
        });
    </script>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>




<div id="playlist">
<div id="wrapper">
<ol>
  <?php

  require ('./conecta_DB.php');
  conecta_DB();
  $id = $_GET['id'];
  $query = 'SELECT Metadata.Nombre, Cancion.Ruta FROM Metadata
  JOIN Cancion ON Cancion.Id_Version = Metadata.Id_Version
  JOIN Playlist ON Playlist.Id_Cancion = Cancion.Id_Cancion
  WHERE Playlist.Id_Usuario='.$id;

  $queryResult = mysql_query($query) or die(mysql_error());

  while ($row = mysql_fetch_array($queryResult)) {
      $var = $var . '<li><a href="#" data-src="' . $row[Ruta] . '">' . $row[Nombre] . '</a></li>' . "\n";
  }
  echo $var;

  ?>
</ol>
</div>
</div>
<audio preload></audio>


</body>
