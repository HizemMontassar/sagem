<html>
    <head>
        <title>Authentification</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    
    <body>
        <div class="login">
            <h1>Login</h1>
            <form action="login_db.php" method="POST" id="formLogin">
                <div class="textbox">
                    
                    <i class="fa fa-user" aria-hidden="true"></i><input type="text" name="login" id="login" placeholder="Identifiant">
                </div>
                <div class="textbox">
                    
                    <i class="fa fa-lock" aria-hidden="true"></i><input type="password" name="password" id="password" placeholder="mot de passe" >
                </div>
                <p><button type="submit" id="buttonLogin" class="button">Connexion</button> </p>
                
                <?php
                    
                   if(isset($_GET["login"]) && $_GET["login"]='error')
                    {
                        echo "login/password incorrect";
                    }
                    
                ?>
                
            </form>
        </div>
    
    </body>










</html>