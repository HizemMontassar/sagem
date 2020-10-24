<?php
    include_once 'config.php';

            session_start();
            $login=$_SESSION['login'];
            $sql2="select role from Roles where login='$login'; ";
            $resultat2=sqlsrv_query($conn,$sql2);
            $row2=sqlsrv_fetch_array($resultat2);
            if(!isset($_SESSION['login']) || $row2['role']!="admin")
            {
            header('location:index.php');
            }
?>
<html>
    <head>
        <title>Demande x-ray</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    
        <?php

            $login=$_SESSION['login'];
            $sql2="select role from Roles where login='$login'; ";
            $resultat2=sqlsrv_query($conn,$sql2);
            $row2=sqlsrv_fetch_array($resultat2);
        ?>
        <?php
            $id=$_GET['id'];
            $sql3="select * from Liste where id='$id'; ";
            $resultat3=sqlsrv_query($conn,$sql3);
            $row3=sqlsrv_fetch_array($resultat3);
        ?>
    
    <body>
        <div>
            <ul id="menu">
                <li> <a href="home.php?user=<?php echo $login; ?>&login=<?php echo $row2['role']; ?>">Home</a> </li>
                <li> <a href="demande/xray.php?demande=xray&user=<?php echo $login; ?>&login=<?php echo $row2['role']; ?>">Rayon-X</a> </li>
                <li><a href="demande/mouillabilites.php?demande=mouillabilite&user=<?php echo $login; ?>&login=<?php echo $row2['role']; ?>">Test de mouillabilite</a>  </li>
                <li><a href="demande/autre.php?demande=autre&user=<?php echo $login; ?>&login=<?php echo $row2['role']; ?>">Autre demande</a> </li>
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
            </ul>
            
            <form action="modifier_db.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                <legend>Modification d'une demande :</legend>
                <table>
                    <tr>
                        <td>UF/Service</td>
                        <td>
                            <select name="uf">
                                <option <?php if($row3['uf']=="Qlt Indus"){echo "selected";} ?>>Qlt Indus</option>
                                <option <?php if($row3['uf']=="Qlt ADT"){echo "selected";} ?>>Qlt ADT</option>
                                <option <?php if($row3['uf']=="Qlt ATR"){echo "selected";} ?>>Qlt ATR</option>
                                <option <?php if($row3['uf']=="AQF"){echo "selected";} ?>>AQF</option>
                                <option <?php if($row3['uf']=="Process Indus"){echo "selected";} ?>>Process Indus</option>
                                <option <?php if($row3['uf']=="Process ADT"){echo "selected";} ?>>Process ADT</option>
                                <option <?php if($row3['uf']=="Process ATR"){echo "selected";} ?>>Process ATR</option>
                                <option <?php if($row3['uf']=="Depannage Indus"){echo "selected";} ?>>Depannage Indus</option>
                                <option <?php if($row3['uf']=="Depannage ADT"){echo "selected";} ?>>Depannage ADT</option>
                                <option <?php if($row3['uf']=="Depannage ATR"){echo "selected";} ?>>Depannage ATR</option>
                                <option <?php if($row3['uf']=="Process Central"){echo "selected";} ?>>Process Central</option>
                                <option <?php if($row3['uf']=="Production"){echo "selected";} ?>>Production</option>
                                <option <?php if($row3['uf']=="Pole Energie"){echo "selected";} ?>>Pole Energie</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Probleme</td>
                        <td><input type="text" name="probleme" placeholder="Probleme" value="<?php echo $row3['probleme'] ;?>"></td>
                    </tr>
                    <tr>
                        <td>Nom du produit</td>
                        <td><input type="text" name="produit" placeholder="nom du produit" value="<?php  echo $row3['nom_produit'] ;?>"></td>
                    </tr>
                    <tr>
                        <td>Ref CIU</td>
                        <td><input type="text" name="ref" placeholder="reference" value="<?php echo $row3['ref']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Carte reparee</td>
                    </tr>
                    <tr>
                        <td>Etat</td>
                        <td>
                            <select name="etat">
                                <option <?php if($row3['etat']=="En cours"){echo "selected";} ?>>En cours</option>
                                <option <?php if($row3['etat']=="Resolu"){echo "selected";} ?>>Resolu</option>
                                <option <?php if($row3['etat']=="Non Resolu"){echo "selected";} ?>>Non Resolu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Resultat</td>
                        <td><input type="text" name="resultat" placeholder="resultat" value="<?php echo $row3['resultat'] ; ?>"></td>
                    </tr>
                     <tr>
                        <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ;?>"></td>
                    </tr>

                    
                </table>
                    <button id="buttonDemande" type="submit">Modifier</button>
                    
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