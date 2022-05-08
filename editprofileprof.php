<?php 
   session_start();

$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
$cnx=$_SESSION['idcnx'];


$nom= $_POST['nom'];
$prenom=$_POST['prenom'];
$CodeIdentiteNational=$_POST['CodeIdentiteNational'] ;
$adresse=$_POST['adresse'];
$telephone=$_POST['telephone'];
$adresseElectronique=$_POST['adresseElectronique'];

$fich1=$_FILES['photo']['name'];


if(strlen($nom)!=0){
$sql="UPDATE  `Professeurs` set nom='$nom' where idcnx='$cnx'" ;
mysqli_query($id,$sql);
}
if(strlen($prenom)!=0){
$sql1="UPDATE  `Professeurs` set prenom='$prenom' where idcnx='$cnx'" ; 
mysqli_query($id,$sql1);
}
if(strlen($adresse)!=0){
$sql2="UPDATE  `Professeurs` set adresse='$adresse' where idcnx='$cnx'" ;
mysqli_query($id,$sql2);
}
if(strlen($telephone)!=0){
$sql3="UPDATE  `Professeurs` set telephone='$telephone' where idcnx='$cnx'" ;
mysqli_query($id,$sql3);
}
if(strlen($adresseElectronique)!=0){
$sql4="UPDATE  `Professeurs` set adresseElectronique='$adresseElectronique' where idcnx='$cnx'" ; 
mysqli_query($id,$sql4);
}
if(strlen($CodeIdentiteNational)!=0){
$sql5="UPDATE  `Professeurs` set CodeIdentiteNational='$CodeIdentiteNational'  where idcnx='$cnx'" ; 
mysqli_query($id,$sql5);
}








	
if(strlen($fich1)!=0){	
$sql7="UPDATE professeurs set photo='$fich1' where idcnx='$cnx'" ;
mysqli_query($id,$sql7);

$dossier = 'fichier';
if(isset($_FILES['photo']))
{
$fichier1 = basename($_FILES['photo']['name']);
$extensions=array ('.png','.jpg','.jpeg','.JPG','.PNG','.JPEG');
$extension=strrchr($_FILES['photo']['name'],'.');
if (in_array($extension,$extensions)){
move_uploaded_file($_FILES['photo']['tmp_name'],$dossier.$fichier1);
}
//echo 'Upload effectue avec succes !'."<br>";
}

}
header("Refresh:2; url=profilutilprof.php");

?>