<?php  
session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT");

$cnx=$_SESSION['idcnx'];

$sql = "SELECT * FROM ChefFiliere WHERE ChefFiliere.idcnx='$cnx'";
$result = mysqli_query($id,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$idchef=$row['idcheffil'];

$Objet=$_POST['Objet'];
$DateReunion=$_POST['DateReunion'];
$PV=$_POST['PV'];
$ListePresence=$_POST['ListePresence'];

if(isset($_FILES['Convocation']))
{
$Convocation = basename($_FILES['Convocation']['name']);
//Definir le type du fichier
$extensionpdf = array('.PDF','.pdf','.docx','.DOCX');
$extensionconvo = strrchr($_FILES['Convocation']['name'], '.'); 
if(in_array($extensionconvo,$extensionpdf))
 //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
move_uploaded_file($_FILES['Convocation']['tmp_name'], $Convocation);
echo 'Fichier envoyé avec succès !';
echo '<br/>';
echo $_FILES['Convocation']['name'];
echo '<br/>';
echo $_FILES['Convocation']['tmp_name'];
echo '<br/>';
echo $_FILES['Convocation']['size'];
echo '<br/>';
echo $_FILES['Convocation']['type'];
echo '<br/>';
}
else //Sinon (la fonction renvoie FALSE).
{
	echo "Extension non correcte";
    echo'<br/>';
    echo 'Echec de l\'upload !';
    echo'<br/>';
}
}

$query="INSERT INTO Reunion VALUES (null,null,'$idchef','$Objet','$DateReunion','$Convocation','$PV','$ListePresence')";


mysqli_query($id,$query);
header("Refresh:2; url= reunfil.php ")
?>