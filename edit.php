<?php 
session_start();
	$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
	$cnx=$_SESSION['idcnx'];

$sql = "SELECT * FROM ChefDep WHERE ChefDep.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$idchef=$row['idchefdep'];
	$idreunion=$_POST['idreunion'];
	$Objet=$_POST['Objet'];
	$DateReunion=$_POST['DateReunion'];
	$Convocation=$_POST['Convocation'];
	$PV=$_POST['PV'];
	$ListePresence=$_POST['ListePresence'];
	

	$query="UPDATE `Reunion`set Objet='$Objet',DateReunion='$DateReunion',Convocation='$Convocation',PV='$PV', ListePresence='$ListePresence' WHERE idreunion='$idreunion'";
	mysqli_query($id,$query);
	header("Refresh:2; url=Reunion.php");


?>

            