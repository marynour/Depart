<?php 
session_start();
	$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
	$cnx=$_SESSION['idcnx'];

$sql ="SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $idchef=$row['idcheffil'];
	$idstage=$_POST['idstage'];
	$NomComplet=$_POST['NomComplet'];
    $encadrant=$_POST['encadrant'];
    $duree=$_POST['duree'];
    $Datestage=$_POST['Datestage'];
    $lieu=$_POST['lieu'];


	$query="UPDATE `Stage`set NomComplet='$NomComplet',encadrant='$encadrant',duree='$duree',Datestage='$Datestage', lieu='$lieu' WHERE idstage='$idstage'";
	mysqli_query($id,$query);
	header("Refresh:2; url=stage.php");


?>

            