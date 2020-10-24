<?php
    
    include_once 'config.php';

    $matricule=$_POST['login'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $password=$_POST['password'];
    $date_creation=date('m-d-Y');
    $date_maj=date('m-d-Y');
    $role=$_POST['role'];
    $user=$_POST['user'];
    $rl=$_POST['rl'];
    $pass=md5($password);
    $sql="select * from Roles where login='$matricule' ;";
    $resultat=sqlsrv_query($conn,$sql);
    
    
    
    if($row=sqlsrv_fetch_array($resultat))
    {
    $sql1="UPDATE Personnes SET nom='$nom',prenom='$prenom',date_creation='$date_creation',date_maj='$date_maj',pwd='$pass' WHERE login='$matricule' ; ";
    sqlsrv_query($conn,$sql1);
    $sql2="UPDATE Roles SET role='$role' WHERE login='$matricule' ;";
    sqlsrv_query($conn,$sql2); 
    header('location:demande/mod_user.php?etat=success&user='.$user.'&login='.$rl);
    }
    else
    {
    header('location:demande/mod_user.php?etat=error&user='.$user.'&login='.$rl);

    }



?>