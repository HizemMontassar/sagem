<?php
include_once 'config.php';

$login=$_SESSION['login'];
if(isset($_GET['orderby']) && $_GET['orderby']=='Probleme')
{
$sql="select * from Liste order by probleme ;";
$resultat=sqlsrv_query($conn,$sql);
}
elseif(isset($_GET['orderby']) && $_GET['orderby']=='Produit')

{
$sql="select * from Liste order by nom_produit ;";
$resultat=sqlsrv_query($conn,$sql);
}
elseif(isset($_GET['orderby']) && $_GET['orderby']=='UF')
{

$sql="select * from Liste order by uf ;";
$resultat=sqlsrv_query($conn,$sql);
}
elseif(isset($_GET['orderby']) && $_GET['orderby']=='Reference')
{

$sql="select * from Liste order by ref ;";
$resultat=sqlsrv_query($conn,$sql);
}
elseif(isset($_GET['orderby']) && $_GET['orderby']=='Etat')
{

$sql="select * from Liste order by etat ;";
$resultat=sqlsrv_query($conn,$sql);
}
elseif(isset($_GET['orderby']) && $_GET['orderby']=='Resultat')
{

$sql="select * from Liste order by resultat ;";
$resultat=sqlsrv_query($conn,$sql);
}
elseif(isset($_GET['orderby']) && $_GET['orderby']=='CreationDate')
{
$sql="select * from Liste order by date_creation ;";
$resultat=sqlsrv_query($conn,$sql);
}
else
{
$sql="select * from Liste ;";
$resultat=sqlsrv_query($conn,$sql); 

}






?>