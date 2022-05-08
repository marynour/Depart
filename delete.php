<?php
session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT");
$cnx=$_SESSION['idcnx'];
$sql = "SELECT * FROM ChefDep WHERE ChefDep.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$idchef=$row['idchefdep'];
$idreunion=$_GET['idreunion'];
$query = "DELETE FROM Reunion WHERE idreunion=$idreunion "; 
$result = mysqli_query($id,$query);
header("Refresh:1; url= Reunion.php "); 
?>