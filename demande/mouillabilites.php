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
        <title>Demande de mouillabilite</title>
        <link rel="stylesheet" type="text/css" href="../css/css.css">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
        <?php

            $login=$_SESSION['login'];
            $sql2="select role from Roles where login='$login'; ";
            $resultat2=sqlsrv_query($conn,$sql2);
            $row2=sqlsrv_fetch_array($resultat2);
        ?>
    <body>
        <div>
            <ul id="menu">
                <li> <a href="../home.php?login=<?php echo $row2['role']; ?>&user=<?php echo $login ;?>">Home</a> </li>
                <li> <a href="xray.php?demande=xray&user=<?php echo $login; ?>&login=<?php echo $row2['role']; ?>">Rayon-X</a> </li>
                <li><a href="mouillabilites.php?demande=mouillabilite&user=<?php echo $login; ?>&login=<?php echo $row2['role']; ?>">Test de mouillabilite</a>  </li>
                <li><a href="autre.php?demande=autre&user=<?php echo $login; ?>&login=<?php echo $row2['role']; ?>">Autre demande</a> </li>
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
            
            <form action="../home_db.php" method="POST">
                <fieldset>
                <legend>Demande de mouillabilite :</legend>
                <table>
                    <tr>
                        <td>UF/Service</td>
                        <td>
                            <select name="uf">
                                <option>Qlt Indus</option>
                                <option>Qlt ADT</option>
                                <option>Qlt ATR</option>
                                <option>AQF</option>
                                <option>Process Indus</option>
                                <option>Process ADT</option>
                                <option>Process ATR</option>
                                <option>Depannage Indus</option>
                                <option>Depannage ADT</option>
                                <option>Depannage ATR</option>
                                <option>Process Central</option>
                                <option>Production</option>
                                <option>Pole Energie</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Probleme</td>
                        <td><input type="text" name="probleme" placeholder="Probleme"></td>
                    </tr>
                    <tr>
                        <td>Nom du produit</td>
                        <td><input type="text" name="produit" placeholder="nom du produit"></td>
                    </tr>
                    <tr>
                        <td>Fiche technique</td>
                        <td><input type="file" name="fiche"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="description" placeholder="description"></td>
                    </tr>
                    <tr>
                        <td>Etat</td>
                        <td>
                            <select name="etat">
                                <option>En cours</option>
                                <option>Resolu</option>
                                <option>Non Resolu</option>
                            </select>
                        </td>
                    </tr>
                     <tr >
                        <td>Resultat</td>
                        <td><input type="text" name="resultat" placeholder="resultat"></td>
                        <td><input type="file" name="upload"></td>

                    </tr>
                    <tr>
                        <td><input type="hidden" name="demande" value="<?php echo $_GET['demande'] ;?>"></td>
                    </tr>

                    
                </table>
                    <button id="buttonDemande" type="submit">Demander</button>
                    <input type="hidden" value="<?php echo $_GET['user'] ;?>" name="login">
                     <input type="hidden" value="<?php echo $row2['role'] ;?>" name="role">

                    <p>                    
                        <?php
                            if(isset($_GET["error"]))
                            {
                                echo "<font color='red'> veuillez remplir tous les champs !!";
                            }
                    
                        ?>
                    </p>
                    
                </fieldset>
            </form>
            
            
            
            
        </div>
    
    
    
    </body>







</html>