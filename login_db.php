<?php
    include_once 'config.php';
    
    $lgn=$_POST['login'];
    $word=$_POST['password'];
    $login=mysql_real_escape_string($lgn);
    $pwd=mysql_real_escape_string($word);
    $password=md5($pwd);
    $sql="SELECT * FROM Personnes WHERE login='$login' AND pwd='$password' ;";
    $resultat=sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($resultat);


    if($row['login']==$login && $row['pwd']==$password)
    {
        session_start();
            $_SESSION['login']=$row['login'];
            $_SESSION['role']=$row['role'];
            $sql2="select role from Roles where login='$login'; ";
             $resultat2=sqlsrv_query($conn,$sql2);
            $row2=sqlsrv_fetch_array($resultat2);
            $user=$row['login'];
            if($row2['role']=="admin")
            {
            header("location:home.php?login=admin&user=$user");
            }
            else
            {
            header("location:home.php?login=user&user=$user");
            }
            
            
    }
    else
    {
        header("location:index.php?login=error");        

    }






?>