<?php
    include_once 'config.php';
    session_start();

    $id=$_GET['id'];
    $sql="delete from Liste where id='$id' ; ";
    $resultat=sqlsrv_query($conn,$sql);
    $user=$_SESSION['login'];
    $sql2="select * from Roles where login='$user' ;";
    $resultat=sqlsrv_query($conn,$sql2);
    $row2=sqlsrv_fetch_array($resultat);
    $role=$row2['role'];
header('location:home.php?user='.$user.'&login='.$role);




?>