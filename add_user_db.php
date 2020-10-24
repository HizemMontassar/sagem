<?php
    include_once 'config.php';

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $date_creation=date('m-d-Y');
    $date_maj=date('m-d-Y');
    $role=$_POST['role'];
    $user=$_POST['user'];
    $rl=$_POST['rl'];
    $sql="select * from Roles where login='$login' ;";
    $resultrat=sqlsrv_query($conn,$sql);
    $options=['cost'=>12];
    $pass=md5($password);
    $longueur=strlen($login);
    $i=1;
  

    if(empty($nom) || empty($prenom) || empty($login) || empty($password) || empty($date_creation) || empty($role) )
    {
        
        header('location:/authentification/demande/add_user.php?error=vide&user='.$user.'&login='.$rl);

    }

    elseif($longueur!=7)
    {
        header('location:/authentification/demande/add_user.php?error=long&user='.$user.'&login='.$rl);

    }
    elseif(!ctype_alpha($login[0]))
    {
       header('location:/authentification/demande/add_user.php?error=char&user='.$user.'&login='.$rl); 
    }
    elseif($row=sqlsrv_fetch_array($resultrat))
    {
      header('location:/authentification/demande/add_user.php?error=existe&user='.$user.'&login='.$rl);  
    }
    elseif(!ctype_digit($login[1]))
    {
        header('location:/authentification/demande/add_user.php?error=digit&user='.$user.'&login='.$rl);   
    }
    elseif(!ctype_digit($login[2]))
    {
        header('location:/authentification/demande/add_user.php?error=digit&user='.$user.'&login='.$rl);   
    }
    elseif(!ctype_digit($login[3]))
    {
        header('location:/authentification/demande/add_user.php?error=digit&user='.$user.'&login='.$rl);   
    }
    elseif(!ctype_digit($login[4]))
    {
        header('location:/authentification/demande/add_user.php?error=digit&user='.$user.'&login='.$rl);   
    }
    elseif(!ctype_digit($login[5]))
    {
        header('location:/authentification/demande/add_user.php?error=digit&user='.$user.'&login='.$rl);   
    }
    elseif(!ctype_digit($login[6]))
    {
        header('location:/authentification/demande/add_user.php?error=digit&user='.$user.'&login='.$rl);   
    }
    else
    {
        

    $sql1="insert into Personnes values ('$login','$nom','$prenom','$date_creation','$date_maj','$pass') ;";
    sqlsrv_query($conn,$sql1);
    
    $sql2="insert into Roles values('$login','$role') ; ";
    sqlsrv_query($conn,$sql2);
    
    header('location:/authentification/demande/add_user.php?success=added&user='.$user.'&login='.$rl);
        

    }


?>