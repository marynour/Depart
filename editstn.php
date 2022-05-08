<?php 
session_start();
	$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
	$cnx=$_SESSION['idcnx'];

$sql ="SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$idchef=$row['idcheffil'];
$idstn=$_POST['idstn'];
$NomComplet=$_POST['NomComplet'];
$Objet=$_POST['Objet'];
$encadrant=$_POST['encadrant'];
$jury=$_POST['jury'];
$Datesout=$_POST['Datesout'];




	$query="UPDATE `Soutenance`set NomComplet='$NomComplet',Objet='$Objet',encadrant='$encadrant',jury='$jury',Datesout='$Datesout' WHERE idstn='$idstn'";
	mysqli_query($id,$query);
	header("Refresh:2; url=Soutenance.php");


?>

            