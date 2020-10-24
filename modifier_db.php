    <?php
    include_once 'config.php';
    session_start();

    $id=$_POST['id'];
    $probleme=$_POST['probleme'];
    $produit=$_POST['produit'];
    $uf=$_POST['uf'];
    $ref=$_POST['ref'];
    $etat=$_POST['etat'];
    $res=$_POST['resultat'];
    $user=$_SESSION['login'];
    $sql2="select * from Roles where login='$user' ;";
    $resultat=sqlsrv_query($conn,$sql2);
    $row2=sqlsrv_fetch_array($resultat);
    $role=$row2['role'];

    $sql="UPDATE Liste SET probleme='$probleme',nom_produit='$produit',uf='$uf',ref='$ref',etat='$etat',resultat='$res' WHERE id='$id' ;";
    sqlsrv_query($conn,$sql);
    header('location:home.php?user='.$user.'&login='.$role);





?>