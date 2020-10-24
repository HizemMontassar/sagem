<?php
    include_once 'config.php';

            session_start();
            if(!isset($_SESSION['login']))
            {
            header('location:index.php');
            }
?>



<html>
    <head id="home">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
        $(document).ready(function(){
                $.post("trier.php",{trier: name,filter:"probleme",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
            $("#probleme").keyup(function(){
               var name = $("#probleme").val();
                $.post("trier.php",{trier: name,filter:"probleme",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
                
            });
			$("#nom_produit").keyup(function(){
               var name = $("#nom_produit").val();
                $.post("trier.php",{trier: name,filter:"nom_produit",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
                
            });
			$("#uf").keyup(function(){
               var name = $("#uf").val();
                $.post("trier.php",{trier: name,filter:"uf",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
                
            });
			$("#ref").keyup(function(){
               var name = $("#ref").val();
                $.post("trier.php",{trier: name,filter:"ref",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
                
            });
			$("#etat").keyup(function(){
               var name = $("#etat").val();
                $.post("trier.php",{trier: name,filter:"etat",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
                
            });
			$("#resultat").keyup(function(){
               var name = $("#resultat").val();
                $.post("trier.php",{trier: name,filter:"resultat",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
                
            });
			$("#date_creation").keyup(function(){
               var name = $("#date_creation").val();
                $.post("trier.php",{trier: name,filter:"date_creation",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
                
            });
            $("#ids").keyup(function(){
               var name = $("#ids").val();
                $.post("trier.php",{trier: name,filter:"login",login:$("#login").val(),user:$("#user").val()},function(data,status){
                   $("#aaa").html(data)
                    
                });
            
            
            });
        });
        
        
        </script>
    </head>
    
    <body>
    <input type="hidden" name="user" id="user" value="<?php echo $_GET['user']; ?>">
	<input type="hidden" id="login" value="<?php echo $_GET["login"];?>"/>
        <?php

         $login=$_SESSION['login'];
        $sql2="select role from Roles where login='$login'; ";
        $resultat2=sqlsrv_query($conn,$sql2);
        $row2=sqlsrv_fetch_array($resultat2);
        ?>

        <div>

            <ul id="menu">
                <li> <a href="home.php?login=<?php echo $row2['role']; ?>&user=<?php echo $login; ?>">Home</a> </li>
                <li> <a href="demande/xray.php?demande=xray&user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Rayon-X</a> </li>
                <li><a href="demande/mouillabilites.php?demande=mouillabilite&user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Test de mouillabilite</a>  </li>
                <li><a href="demande/autre.php?demande=autre&user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Autre demande</a> </li>
                
                <li
                    <?php if($_GET['login']!="admin"){echo 'style="visibility:hidden;"' ;}else{echo 'style="visibility:visible;"';}?>>
                   <div class="dropdown">
                    <button class="dropbtn">Utilisateur</button>
                    <div class="dropdown-content">
                        
                     <a href="demande/add_user.php?user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Ajouter</a>
                    <a href="demande/mod_user.php?user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Modifier</a>
                    <a href="demande/del_user.php?user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Supprimer</a>   
                       
                    </div>   
                    </div>
                    
                </li>
                <li><a href="logout_db.php">Deconnexion</a> </li>
                

            </ul>
                        <div class="btn">
        <form action="excel.php?role=<?php echo $row2['role']; ?>" method="post">
            <button type="submit" id="btnExport" name='export' value="Export to Excel" class="btn btn-info">Export to excel</button>
        </form>
            </div>
			
                        <table border="1px"><tr>
                        <td>Trier</td> 
                        <td><input type="text" id="probleme"></td>
                        <td><input type="text"id="nom_produit"></td>
						<td><input type="text" id="uf"></td>
                        <td><input type="text" id="ref"></td>
                        <td><input type="text" id="etat"></td>
                        <td><input type="text" id="resultat"></td>
                        <td><input type="text" id="date_creation"></td>
                        <td><input type="text" id="ids"></td>
                            

                    </tr>
					<tr><tbody id="aaa"></tbody></tr>
					</table>
            
        </div>
            
            <input type="hidden" name="login" value="<?php echo $_GET['user']; ?>">
            
            <input type="hidden" name="role" value="<?php echo $row2['role']; ?>">


    
    
    </body> 




</html>