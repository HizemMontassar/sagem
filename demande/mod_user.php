<?php
    include_once '../config.php';
            session_start();
            if(!isset($_SESSION['login']))
            {
            header('location:../index.php');
            }
?>
<html>
    <head>
        <title>Modifier Utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/css.css">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
        
       
    </head>
    
        <?php

            $login=$_SESSION['login'];
            $sql2="select role from Roles where login='$login'; ";
            $resultat2=sqlsrv_query($conn,$sql2);
            $row2=sqlsrv_fetch_array($resultat2);
            $sql3="select * from Personnes ;";
            $resultat3=sqlsrv_query($conn,$sql3);
        ?>
    
    <body>
        <div>
            <ul id="menu">
                <li> <a href="../home.php?login=<?php echo $row2['role']; ?>&user=<?php echo $login ;?>">Home</a> </li>
                <li> <a href="xray.php?demande=xra&user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Rayon-X</a> </li>
                <li><a href="mouillabilites.php?demande=mouillabilite&user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Test de mouillabilite</a>  </li>
                <li><a href="autre.php?demande=autre&user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Autre demande</a> </li>
                
                <li
                    <?php if($_GET['login']!="admin"){echo 'style="visibility:hidden;"' ;}else{echo 'style="visibility:visible;"';}?>>
                   <div class="dropdown">
                    <button class="dropbtn">Utilisateur</button>
                    <div class="dropdown-content">
                        
                     <a href="add_user.php?user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Ajouter</a>
                    <a href="mod_user.php?user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Modifier</a>
                    <a href="del_user.php?user=<?php echo $login; ?>&login=<?php echo $_GET['login']; ?>">Supprimer</a>   
                       
                    </div>   
                    </div>
                    
                </li>
                <li><a href="../logout_db.php">Deconnexion</a> </li>
            </ul>
            
            <form action="../mod_user_db.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                <legend>Modifier un Utilisateur :</legend>
                <table>
                    <tr>
                        <td>Identifiant unique :</td>
                        <td>
                            <select name="matricule">
                            <?php while($row3=sqlsrv_fetch_array($resultat3)){ ?>
                                <option><?php echo $row3['login']; ?></option>
                                <?php }?>
                            </select>
                        </td>
                       
                    </tr>

                    <tr><tbody id="aaa"></tbody></tr>

                    <tr>
                        <td>Nom :</td>
                        <td><input type="text" name="nom" placeholder="Nom"></td>
                    </tr>
                    <tr>
                        <td>Prenom :</td>
                        <td><input type="text" name="prenom" placeholder="prenom"></td>
                    </tr>

                    <tr>
                        <td>Mot de passe :</td>
                        <td><input type="text" name="password" placeholder="Mot de passe"></td>
                    </tr>
                    <tr>
                        <td>Role :</td>
                        <td> <select name="role"><option>admin</option><option>user</option></select></td>
                    
                    </tr>
                   
                </table>
                    <button id="buttonDemande" type="submit">Modifier</button>
                    <input type="hidden" value="<?php echo $_GET['user'] ;?>" name="user">
                     <input type="hidden" value="<?php echo $row2['role'] ;?>" name="rl">
                    <p>
                    <?php
                        if(isset($_GET["etat"]) && $_GET["etat"]=="success")
                        {
                            echo "<font color='green'> Utilisateur modifie !!";
                        }
                        elseif(isset($_GET["etat"]) && $_GET["etat"]=="error")
                        {
                            echo "<font color='red'> utilisateur n'exite pas  !!";
                        }
                        
                        ?>
                    </p>
                       
                    
                </fieldset>
                
            </form>
            
            
            
            
        </div>
    
    
    
    </body>







</html>