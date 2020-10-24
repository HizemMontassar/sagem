<?php 
    include_once 'config.php';

    
if(isset($_POST["demande"]) && $_POST["demande"]=='xray')
{
    $probleme=$_POST['probleme'];
    $produit=$_POST['produit'];
    $uf=$_POST['uf'];
    $ref=$_POST['ref'];
    $etat=$_POST['etat'];
    $resultat=$_POST['resultat'];
    $date_creation=date('m-d-Y');
    $sn=$_POST['sn'];
    $nbr=$_POST['number'];
    $description=$_POST['description'];
    $file=$_POST['upload'];
    $login=$_POST['login'];
    $role=$_POST['role'];
    
    if(empty($probleme) || empty($produit) || empty($uf) || empty($ref) || empty($sn) || empty($description) || empty($nbr))
    {
        header('location:/authentification/demande/xray.php?error=rayon_vide');
    }
    else
    {
    
    $sql="INSERT INTO Liste values('$probleme','$produit','$uf','$ref','$etat','$resultat','$date_creation','$login');";
    sqlsrv_query($conn,$sql);
    
    $message ="Probleme : ".$probleme."\n";
    $message .="produit : ".$produit."\n";
    $message .="uf : ".$uf."\n";
    $message .="ref : ".$ref."\n";
    $message .="etat : ".$etat."\n";
    $message .="resultat : ".$resultat."\n";
    $message .="date de creation : ".$date_creation."\n";
    
    $subject="test send";
    $send="m.hizem98@gmail.com";
    $headers="from montassar";
    mail($send,$subject,$message,$headers);
    
    header('location:./home.php?success=true&user='.$login.'&login='.$role);
    }
}
elseif(isset($_POST["demande"]) && $_POST["demande"]=='mouillabilite')
{

    
    $probleme=$_POST['probleme'];
    $produit=$_POST['produit'];
    $uf=$_POST['uf'];
    $ref="N/A";
    $etat=$_POST['etat'];
    $resultat=$_POST['resultat'];
    $date_creation=date('m-d-Y');
    $fiche=$_POST['fiche'];
    $login=$_POST['login'];
    $role=$_POST['role'];
    if(empty($probleme) || empty($produit) || empty($uf) || empty($fiche))
    {
        header('location:/authentification/demande/mouillabilites.php?error=moui_vide');
    }
    else
    {
    
    $sql="INSERT INTO Liste values('$probleme','$produit','$uf','$ref','$etat','$resultat','$date_creation','$login');";
    sqlsrv_query($conn,$sql);
        
    
    $message ="Probleme : ".$probleme."\n";
    $message .="produit : ".$produit."\n";
    $message .="uf : ".$uf."\n";
    $message .="ref : ".$ref."\n";
    $message .="etat : ".$etat."\n";
    $message .="resultat : ".$resultat."\n";
    $message .="date de creation : ".$date_creation."\n";
    
    $subject="test send";
    $send="m.hizem98@gmail.com";
    $headers="from montassar";
    mail($send,$subject,$message,$headers);
    header('location:./home.php?success=true&user='.$login.'&login='.$role); 
    }
}

else
{
    
    $probleme=$_POST['probleme'];
    $produit=$_POST['produit'];
    $uf=$_POST['uf'];
    $ref=$_POST['ref'];
    $etat=$_POST['etat'];
    $resultat=$_POST['resultat'];
    $date_creation=date('m-d-Y');
    $description=$_POST['description'];
    $login=$_POST['login'];
    $role=$_POST['role'];
    
    if(empty($probleme) || empty($produit) || empty($uf) || empty($description))
    {
        header('location:/authentification/demande/autre.php?error=autre_vide');
    }
    else
    {
    $sql="INSERT INTO Liste values('$probleme','$produit','$uf','$ref','$etat','$resultat','$date_creation','$login');";
    sqlsrv_query($conn,$sql);
    
    $message ="Probleme : ".$probleme."\n";
    $message .="produit : ".$produit."\n";
    $message .="uf : ".$uf."\n";
    $message .="ref : ".$ref."\n";
    $message .="etat : ".$etat."\n";
    $message .="resultat : ".$resultat."\n";
    $message .="date de creation : ".$date_creation."\n";
    
    $subject="test send";
    $send="m.hizem98@gmail.com";
    $headers="from montassar";
    mail($send,$subject,$message,$headers);
    header('location:./home.php?success=true&user='.$login.'&login='.$role);
    }
}  


   


?>