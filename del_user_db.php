<?php
    include_once 'config.php';
    $matricule=$_POST['matricule'];
    $sql1="select * from Roles where login='$matricule' ;";
    $resultat1=sqlsrv_query($conn,$sql1);
    
    if($row=sqlsrv_fetch_array($resultat1))
       {
        $sql="delete from Roles where login='$matricule' ;";
        sqlsrv_query($conn,$sql);
        $sql2="delete from Personnes where login='$matricule' ;";
        sqlsrv_query($conn,$sql2); 
        header('location:demande/del_user.php?etat=success');
       }
       else
       {    
            header('location:demande/del_user.php?etat=error');

       }



?>