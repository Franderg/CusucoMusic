
<!DOCTYPE html>


<html class="ng-csp" data-placeholder-focus="false">

    <head data-requesttoken="f0f9b0f8d111473a000a">
        <title>
            cusuco
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

        <link rel="shortcut icon" href="img/favicon.png" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />

    </head>
    <body id="body-login">
        <noscript><div id="nojavascript"><div>This application requires JavaScript for correct operation. Please <a href="http://enable-javascript.com/" target="_blank">enable JavaScript</a> and reload the page.</div></div></noscript>
        <div class="wrapper"><!-- for sticky footer -->
            <div class="v-align"><!-- vertically centred box -->
                <header><div id="header">
                        <div class="logo svg"></div>
                        <div id="logo-claim" style="display:none;"></div>
                    </div></header>

                <!-- Metodo post, donde se tienen las variables de usuario y clave que se van a revisar contra la DB   -->
                <form method="post" name="login" action="Registration.php">
                    <fieldset>
                        <p id="message" class="hidden">
                            <span id="messageText"></span>
                        <div style="clear: both;"></div>
                        </p>
                        <p class="grouptop">
                            <input type="text" name="user" id="user"
                                   placeholder="Username"
                                   value=""
                                   autofocus autocomplete="on" autocapitalize="off" autocorrect="off" />
                            <label for="user" class="infield">Username</label>
                            <img class="svg" src="./img/actions/user.svg" alt=""/>
                        </p>

                        <p class="groupbottom">
                            <input type="password" name="password" id="password" value=""
                                   placeholder="Password"
                                   autocomplete="on" autocapitalize="off" autocorrect="off"  />
                            <label for="password" class="infield">Password</label>
                            <img class="svg" id="password-icon" src="./img/actions/password.svg" alt=""/>
                        </p>

                        <p class="groupbottom">
                            <input type="password" name="password2" id="password" value=""
                                   placeholder="Password repeat"
                                   autocomplete="on" autocapitalize="off" autocorrect="off" />
                            <label for="password" class="infield">Password</label>
                            <img class="svg" id="password-icon" src="./img/actions/password.svg" alt=""/>
                        </p>

                        <input type="submit" value="Register" name="boton"/>
                        <input type="submit" value="Back" name="boton" />
                    </fieldset>
                </form>

                <!--    <div class="push"></div> for sticky footer -->
            </div>
        </div>

        <footer>
            <p class="info">
                <a href="index.php" target="_blank">Odyssey</a> – web music services under your control </p>
        </footer>
    </body>
</html>
