<?php
session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT");
$cnx=$_SESSION['idcnx'];
$sql = "SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$idchef=$row['idcheffil'];
$idstage=$_GET['idstage'];
$query = "DELETE FROM Stage WHERE idstage=$idstage "; 
$result = mysqli_query($id,$query);
header("Refresh:1; url= stage.php "); 
?>