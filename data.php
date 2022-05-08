<!DOCTYPE html>
<html>
<head>
	<title>Departement</title>
</head>
<body>
<?php
$id=mysqli_connect("localhost","root","") or die ("Echec de connexion au serveur.");
$base="DEPARTEMENT";
$sql = 'CREATE DATABASE  DEPARTEMENT';
if (!mysqli_query($id,$sql)){
echo 'Error creating database: '.mysqli_error($id) . "\n";
} else {
echo "Database created successfully\n";
}
mysqli_select_db($id,$base) or die("Echec de sélection de la base.");


$prof="
CREATE TABLE  Professeurs (
idprof int NOT NULL AUTO_INCREMENT ,
nom varchar(40) ,
prenom varchar(40),
idavis  int  ,
idreunion int ,
idcourrier int ,
CodeIdentiteNational varchar(40),
adresse varchar(150),
telephone int,
adresseElectronique varchar(255), 
grade varchar(15), 
photo LONGTEXT,
idcnx int NOT NULL,
Primary key(idprof),
CONSTRAINT foreignaviss Foreign key(idavis) References Avis(idavis),
CONSTRAINT foreign_reun Foreign key(idreunion) References Reunion(idreunion),
CONSTRAINT foreign_courri Foreign key(idcourrier) References Courrier(idcourrier),
CONSTRAINT foreign_cnx Foreign key(idcnx) References Connexion(idcnx))";

$filiere="
CREATE TABLE Filiere (
idfil int NOT NULL ,
iddep int ,
idcheffil int NOT NULL,
nom varchar(100),
Primary key(idfil),
CONSTRAINT foreign_cheffill Foreign key(idcheffil) References chefFiliere(idcheffil),
CONSTRAINT foreign_idep Foreign key(iddep) References Departement(iddep))";

$departement="
CREATE TABLE Departement (
iddep int NOT NULL ,
idchefdep int NOT NULL ,
nomDep varchar(200),
Primary key(iddep),
CONSTRAINT foreign_chef Foreign key(idchefdep) References ChefDep(idchefdep))";

$chefdep="
CREATE TABLE chefDep (
idchefdep int ,
idprof int NOT NULL ,
idavis  int  ,
idcourrier int ,
idcnx int ,
date_debut DATE , 
date_fin DATE , 
Primary key(idchefdep),
CONSTRAINT foreign_prof Foreign key(idprof) References Professeurs(idprof),
CONSTRAINT FK_chefDepAvis Foreign key(idavis) References Avis(idavis),
CONSTRAINT FK_chefDepCourier  Foreign key(idcourrier) References Courrier(idcourrier),
CONSTRAINT foreign_conxion Foreign key(idcnx) References Connexion(idcnx))";

$cheffil="
CREATE TABLE chefFiliere (
idcheffil int  ,
idprof  int NOT NULL ,
idcnx int NOT NULL, 
date_debut DATE , 
date_fin DATE,
Primary key(idcheffil),
CONSTRAINT foreignprof Foreign key(idprof) References Professeurs(idprof),
CONSTRAINT foreigncnx Foreign key(idcnx) References Connexion(idcnx))";

$reunion="
CREATE TABLE Reunion (
idreunion  int AUTO_INCREMENT ,
idchefdep int ,
idcheffil int ,
Objet varchar(200), 
DateReunion DATE, 
Convocation varchar(200), 
PV varchar(600),
ListePresence varchar(600) ,
Primary key(idreunion),
CONSTRAINT foreign_chefde Foreign key(idchefdep) References ChefDep(idchefdep),
CONSTRAINT FK_ReunionchefFil FOREIGN KEY (idcheffil)REFERENCES chefFiliere(idcheffil))";

$avis="
CREATE TABLE Avis (
idavis int AUTO_INCREMENT , 
idchefdep int, 
idcheffil int, 
Titre varchar(200), 
Emetteur varchar(200), 
Destinataire varchar(200),
Message varchar(1000), 
Piecejointe varchar(200),
dateavis Date ,
primary key(idavis),
CONSTRAINT foreign_emetteur Foreign key(Emetteur) References Professeurs(adresseElectronique),
CONSTRAINT foreign_dest Foreign key(Destinataire) References Professeurs(adresseElectronique),
CONSTRAINT fchefdavis Foreign key(idchefdep) References ChefDep(idchefdep),
CONSTRAINT FK_AvischefFil FOREIGN KEY (idcheffil)REFERENCES chefFiliere(idcheffil))";

$courrier="
CREATE TABLE Courrier (
idcourrier int AUTO_INCREMENT,
idchefdep int,
idcheffil int,
Titre varchar(200),
Emetteur varchar(200),
Destinataire varchar(200),
Piecejointe varchar(200),
primary key(idcourrier),
CONSTRAINT FK_CourchefDep FOREIGN KEY (Emetteur) REFERENCES Professeurs(adresseElectronique),
CONSTRAINT FK_CourchefDep2 FOREIGN KEY (Destinataire) REFERENCES Professeurs(adresseElectronique),
CONSTRAINT fk_chefde Foreign key(idchefdep) References ChefDep(idchefdep),
CONSTRAINT FK_courrchefFil FOREIGN KEY (idcheffil)REFERENCES chefFiliere(idcheffil))";

$etudiant="
CREATE TABLE Etudiant ( 
idetudiant int  AUTO_INCREMENT,
NomComplet varchar(100),
datedenaissance DATE, 
adresse varchar(40),
CodeIdentiteNational varchar(40),
CNE varchar(40),
adresseElectronique varchar(255), 
nomFili varchar(40),
Primary key(idetudiant))";

$soutenance="
CREATE TABLE Soutenance (
idstn int AUTO_INCREMENT, 
idetudiant int,
idcheffil int,
NomComplet varchar(100),
Objet varchar(100),
encadrant varchar(60), 
jury varchar(60), 
Datesout Date ,
Primary key(idstn), 
CONSTRAINT foreign_etu Foreign key (idetudiant) References Etudiant(idetudiant),
CONSTRAINT FK_stnchefFil FOREIGN KEY (idcheffil)REFERENCES chefFiliere(idcheffil))";

$stage="
CREATE TABLE Stage (
idstage int AUTO_INCREMENT, 
idcheffil int  ,
idetudiant int, 
NomComplet varchar(100), 
encadrant varchar(60),
duree varchar(60),
Datestage Date ,
lieu varchar(60),
Primary key(idstage), 
CONSTRAINT foreign_etudiant Foreign key (idetudiant) References Etudiant(idetudiant),
CONSTRAINT FK_stagechefFil FOREIGN KEY (idcheffil)REFERENCES chefFiliere(idcheffil))";

$connexion="
CREATE TABLE Connexion (
idcnx int NOT NULL, 
username varchar(40) NOT NULL, 
password varchar(40) NOT NULL,
fct varchar(60) NOT NULL, 
Primary Key (idcnx))";

$doyen="
CREATE TABLE  Doyen (
iddoyen int NOT NULL AUTO_INCREMENT ,
nom varchar(40) ,
prenom varchar(40),
Primary key (iddoyen))";


$result=mysqli_query($id,$prof);
 mysqli_query($id,$filiere);
 mysqli_query($id,$departement);
 mysqli_query($id,$chefdep);
 mysqli_query($id,$cheffil);
 mysqli_query($id,$reunion);
 mysqli_query($id,$avis);
 mysqli_query($id,$doyen);
 mysqli_query($id,$courrier);
 mysqli_query($id,$etudiant);
 mysqli_query($id,$soutenance);
 mysqli_query($id,$stage);
 mysqli_query($id,$connexion);
 

if($result==1){
	echo 'Valeurs enregistrees';
    echo '<br/>';
}else{
	echo 'Erreur';
}


$insert1="INSERT INTO Professeurs(idprof,nom,prenom,idavis,idreunion,idcourrier,CodeIdentiteNational,adresse,telephone,adresseElectronique,grade,photo,idcnx) VALUES
(1,'Benkhiyat','Taha',NULL,NULL,NULL,'JC256194','Avenue Mohamed 5-Casablanca ',0650400303,'tahaben@gmail.com','A','img.png',3),
(2,'Berrayah','Mostafa',NULL,NULL,NULL,'JC256187','Ancienne medina-Casablanca',0650400303,'mostafaberrayah@gmail.com','B','img.png',6),
(3,'Lancom','Mohamed',NULL,NULL,NULL,'JC255461','Lastah-Taroudant',0650400303,'mohamedlancom@gmail.com','A','img.png',7),
(4,'Alaoui','Reda',NULL,NULL,NULL,'JC453292','Lmhaita-Taroudant',0650300353,'RedaAlaoui@gmail.com','B','img.png',2),
(5,'Afir','Mohamed',NULL,NULL,NULL,'Jc5648202','Avenue Hassan 2-Agadir',0698512345,'mohamedafir@gmail.com','A','img.png',8),
(6,'Bensheikh','Amine',NULL,NULL,NULL,'JC345279','Hay Mohemadi-Agadir',0650400303,'amineben@gmail.com','B','img.png',9),
(7,'Esydi','Youssef',NULL,NULL,NULL,'JC54527','Salam-Agadir',0650210302,'ysfes@gmail.com','C','img.png',1),
(8,'Redouani','Leila',NULL,NULL,NULL,'JC784902','Boulevard Mohamed V-Inzegane',0622340987,'leilared@gmail.com','C','img.png',4),
(9,'Essayfi','Khadija',NULL,NULL,NULL,'JC798265','2 Mars-Casablanca',0622340987,'khadijaess@gmail.com','B','img.png',5),
(10,'Nourelyakin','Bader',NULL,NULL,NULL,'JC782907','Lastah-Taroudant',0622902874,'baderel@gmail.com','A','img.png',10),
(11,'Saber','Imad',NULL,NULL,NULL,'JC783024','Lastah-Taroudant',0678352900,'imadsaber@gmail.com','B','img.png',11),
(12,'Nahiri','Mostafa',NULL,NULL,NULL,'JC783432','Lastah-Taroudant',0622975649,'Mosnahiri@gmail.com','A','img.png',12),
(13,'Elwali','Taher',NULL,NULL,NULL,'JC712344','Lastah-Taroudant',0620937290,'taherel@gmail.com','B','img.png',13),
(14,'Akhrif','Youssef',NULL,NULL,NULL,'JC212455','Lastah-Taroudant',0624536821,'youssefakhr@gmail.com','B','img.png',14),
(15,'Ayouch','Khalid',NULL,NULL,NULL,'JC930222','Lastah-Taroudant',0619247507,'khalidayouch@gmail.com','A','img.png',15),
(16,'Berrada','Brahim',NULL,NULL,NULL,'JC040321','Lastah-Taroudant',0675949302,'brahimberrada@gmail.com','C','img.png',16),
(17,'Bekhit','Driss',NULL,NULL,NULL,'JC300281','Lastah-Taroudant',0609473922,'drissbekhit@gmail.com','A','img.png',17),
(18,'Nkita','Mehdi',NULL,NULL,NULL,'JC703921','Lastah-Taroudant',0602973729,'mehdinkita@gmail.com','A','img.png',18)";

$insert2="INSERT INTO Connexion (idcnx,username,password,fct) VALUES
(1,'professeur','123','professeur'),
(2,'cheffil','123456','cheffiliere'),
(3,'chefdep','1234567','chefdepartement'),
(4,'professeur2','1234','professeur'),
(5,'prof','12345','professeur'),
(6,'chefdep2','12345678','chefdepartement'),
(7,'chefdep3','123456789','chefdepartement'),
(8,'cheffil2','1234567','cheffiliere'),
(9,'cheffil3','12345678','cheffiliere'),
(10,'chefdep4','12345678','chefdepartement'),
(11,'cheffil4','12345678','cheffiliere'),
(12,'cheffil5','12345678','cheffiliere'),
(13,'cheffil6','12345678','cheffiliere'),
(14,'cheffil7','12345678','cheffiliere'),
(15,'cheffil8','12345678','cheffiliere'),
(16,'cheffil9','12345678','cheffiliere'),
(17,'cheffil10','12345678','cheffiliere'),
(18,'cheffil11','12345678','cheffiliere')";

$insert3="INSERT INTO ChefDep(idchefDep,idprof,idavis,idcourrier,idcnx,date_debut,date_fin) VALUES
(1,1,null,null,3, DATE'2018-06-12',DATE '2020-03-10' ),
(2,2,null,null,6,DATE'2018-06-12',DATE '2020-02-21'),
(3,3,null,null,7,DATE'2017-01-12',DATE '2020-03-11'),
(4,10,null,null,10,DATE'2017-06-12',DATE '2020-03-11')";

$insert4="INSERT INTO chefFiliere(idcheffil,idprof,idcnx,date_debut,date_fin) VALUES
(1,4,2, DATE'2010-06-12',DATE '2019-03-11' ),
(2,5,8,DATE'2018-06-12',DATE '2020-01-01'),
(3,6,9,DATE'2016-06-12',DATE '2021-03-11'),
(4,11,11,DATE'2017-06-12',DATE '2021-01-11'),
(5,12,12,DATE'2018-06-12',DATE '2021-03-02'),
(6,13,13,DATE'2016-02-03',DATE '2020-02-11'),
(7,14,14,DATE'2017-09-12',DATE '2020-03-11'),
(8,15,15,DATE'2018-07-22',DATE '2021-06-21'),
(9,16,16,DATE'2018-09-21',DATE '2021-05-11'),
(10,17,17,DATE'2019-07-10',DATE '2020-02-27'),
(11,18,18,DATE'2018-07-12',DATE '2020-04-11')
";

$insert5="INSERT INTO Etudiant(idetudiant,NomComplet,datedenaissance, adresse,CodeIdentiteNational,CNE,adresseElectronique,nomFili ) VALUES
(1,'Mohamed Benkhir',DATE '1999-01-01','Taroudant bab lkhmiss','JC9389381','D1425792039','medben@gmail.com','Genie informatique'),
(2,'Maryam Amariss',Date '1998-08-04','Agadir 121 Batoire','JC8739012','D124083628','maryamar@gmail.com','Sciences economiques et gestion')";

$insert6="INSERT INTO `departement` (`iddep`, `idchefdep`, `nomDep`) VALUES
(1, 1, 'Mathematiques et Informatique'),
(2, 2, 'Sciences Economiques & Gestion'),
(3, 3, 'Sciences Humaines et sociales'),
(4, 4, 'Sciences & Techniques')";

$insert7="INSERT INTO `filiere` (`idfil`, `iddep`, `idcheffil`, `nom`) VALUES
(1, 4, 1, 'MASTER SPÉCIALISÉ SGARNE'),
(2, 1, 2, 'LICENCE PROFESSIONNELLE GÉNIE INFORMATIQUE'),
(3, 4, 3, 'LICENCE FONDAMENTALE SCIENCES DE LA VIE'),
(4, 3, 4, 'LICENCE EDUCATION '),
(5, 3, 5, 'LANGUES ETRANGERES APPLIQUEES'),
(6, 2, 6, 'LICENCE FONDAMENTALE SCIENCES ÉCONOMIQUES ET GESTION'),
(7, 2, 7, 'MASTER MANAGEMENT ET COMMERCE INTERNATIONAL'),
(8, 4, 8, 'MASTER SPÉCIALISÉ SGARNE'),
(9, 4, 9, 'MASTER SPÉCIALISÉ PROCÉDÉS D’ANALYSE ET CONTRÔLE QUALITÉ'),
(10, 4, 10, 'FILIÈRE SCIENCES AGROBIOLOGIQUES ET ENVIRONNEMENT'),
(11, 4, 11, 'LICENCE PROFESSIONNELLE GESTION DE L ENVIRONNEMENT ET DÉVELOPPEMENT DURABLE')";

$insert8="INSERT INTO Avis (idavis,Titre,Emetteur,Destinataire,Message,Piecejointe,dateavis) VALUES
(1,'Tutorat a distance',null,'Etudiants','Dans le but d’accompagner l’étudiant dans son processus de formation et afin de compléter et d’aiguiser son profil, la Faculté Polydiciplinaire de Taroudant lance à travers sa cellule du Tutorat un  deuxième programme du tutorat à distance consacré aux « Soft Skills ».',null,Date '2020-04-11'),
(2,'PLATEFORME COURSERA ACCÈS GRATUIT JUSQU AU 31 JUILLET 2020',null,'Etudiants','
Etudiants,
Enseignants-Chercheurs,
Personnel administratif et technique de l’Université Ibn Zohr,
Vous avez un accès gratuit jusqu’au 31 Juillet 2020 aux différents cours en ligne de la plateforme Coursera.','Capture.PNG',date '2020-04-09')";



$insert=mysqli_query($id,$insert1);
mysqli_query($id,$insert2);
mysqli_query($id,$insert3);
mysqli_query($id,$insert4);
mysqli_query($id,$insert5);
mysqli_query($id,$insert6);
mysqli_query($id,$insert7);
mysqli_query($id,$insert8);


if($insert==1){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($id);
}
 ?>
</body>
</html>
