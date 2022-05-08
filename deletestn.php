<?php
session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT");
$cnx=$_SESSION['idcnx'];
$sql = "SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$idchef=$row['idcheffil'];
$idstn=$_GET['idstn'];
$query = "DELETE FROM Soutenance WHERE idstn=$idstn "; 
$result = mysqli_query($id,$query);
header("Refresh:1; url= Soutenance.php "); 
?>