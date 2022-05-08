<?php 

session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
$cnx=$_SESSION['idcnx'];


$Emetteur= $_POST['Emetteur'];
$Destinataire=$_POST['Destinataire'];
$Titre=$_POST['Titre'];
$fich=$_FILES['Piecejointe']['name'];

$sql = "SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$idchef=$row['idcheffil'];




$sql="INSERT into  Courrier values(null,null,'$idchef','$Titre','$Emetteur','$Destinataire','$fich')" ;
 $result=mysqli_query($id,$sql);
  
 

if (!$result)
	{
	die('error : ' . mysqli_error($id));
	}
	echo "Le courrier est envoyé"."<br>";

	


$dossier = 'fichier';
if(isset($_FILES['Piecejointe']))
{
$fichier1 = basename($_FILES['Piecejointe']['name']);
$extensions=array ('.rar','.RAR','.png','.jpg','.jpeg','.JPG','.PNG','.JPEG','.docx','.DOCX','.pptx','.PPTX','.pdf','.PDF');
$extension=strrchr($_FILES['Piecejointe']['name'],'.');
if (in_array($extension,$extensions)){
move_uploaded_file($_FILES['Piecejointe']['tmp_name'],$dossier.$fichier1);

//echo 'Upload effectue avec succes !'."<br>";
}

}
header("Refresh:2; url= profileCheffiliere.php ");


?>