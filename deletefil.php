<?php
session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT");
$cnx=$_SESSION['idcnx'];
$sql = "SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$idchef=$row['idcheffil'];
$idreunion=$_GET['idreunion'];
$query = "DELETE FROM Reunion WHERE idreunion=$idreunion "; 
$result = mysqli_query($id,$query);
header("Refresh:1; url= reunfil.php "); 
?>