<?php  
session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT");

$cnx=$_SESSION['idcnx'];

$sql = "SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	
$NomComplet=$_POST['NomComplet'];	
$sql2 = "SELECT idetudiant FROM  Etudiant where NomComplet='$NomComplet'";
$result2 = mysqli_query($id,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

$idchef=$row['idcheffil'];
$idetudiant=$row2['idetudiant'];
$Objet=$_POST['Objet'];
$encadrant=$_POST['encadrant'];
$jury=$_POST['jury'];
$Datesout=$_POST['Datesout'];





$query="INSERT INTO Soutenance VALUES (null,'$idetudiant','$idchef','$NomComplet','$Objet','$encadrant','$jury','$Datesout')";



mysqli_query($id,$query);
header("Refresh:2; url= Soutenance.php ")
?>