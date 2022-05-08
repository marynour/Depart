<?php 

session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
$cnx=$_SESSION['idcnx'];


$Emetteur= $_POST['Emetteur'];
$Destinataire=$_POST['Destinataire'];
$Titre=$_POST['Titre'];
$fich=$_FILES['Piecejointe']['name'];

$sql = "SELECT * FROM ChefDep WHERE ChefDep.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$idchef=$row['idchefdep'];




$sql="INSERT into  Courrier values(null,'$idchef',null,'$Titre','$Emetteur','$Destinataire','$fich')" ;
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
header("Refresh:2; url= profileChefdep.php ");


?>