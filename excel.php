<?php
    include_once 'config.php';
    global $ts;
    $ts=date('m/d/Y');
    
    session_start();
    $login=$_SESSION['login'];
    $role=$_GET['role'];
    

    if($role=="admin")
    {
        $sql="select * from Liste ; ";
    }
    else
    {
        $sql="select * from Liste where login='$login' ; ";
    }
    
    $resultat=sqlsrv_query($conn,$sql);
    
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Liste-".$ts.".xls");
            printf("Id"."\t");
            printf("\t Probleme"."           \t");
            printf("\t Nom Produit"."\t");
            printf("\t Uf/Service"."\t");
            printf("\t Reference"."\t");    
            printf("\t Etat du produit"."      \t");
            printf("\t Resultat    "."\t");
            printf("\t Date de creation"."\t");
            printf("\t Login"."\t");
            print("\n");
    while( $finfo = sqlsrv_fetch_array($resultat) ) 
        {

            printf($finfo['id']."             \t");
            printf("\t".$finfo['probleme']."             \t");
            printf("\t".$finfo['nom_produit']."    \t");
            printf("\t".$finfo['uf']."   \t");
            printf("\t".$finfo['ref']."          \t");
            printf("\t".$finfo['etat']."               \t");
            printf("\t".$finfo['resultat']."   \t");
            printf("\t".$finfo['date_creation']->format('d/m/y')."      \t");
            printf("\t".$finfo['login']);
            print("\n");
        }
   


  
?>