<?php
 session_start();
 	 	$cnx=$_SESSION['idcnx'];


  $id=mysqli_connect("localhost","root","","DEPARTEMENT");
  $query=" SELECT * FROM professeurs  where idcnx='$cnx'";

$result = mysqli_query($id,$query);
  
?> 

<!DOCTYPE html>

<html>
  
<head>
    
<meta charset="utf-8">
  
  <title>Profile</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">  
body {
  font-family: "Avenir Next";
}
p{
	 display: block;
  margin-top: 1em;
  margin-bottom: 1em;
  margin-left: 1em;
  margin-right:0;
}
div {
margin-bottom: 5px;
}
label {
display: inline-block;
width: 120px;
}
.header {
  background-color: navy;
  color: white;
  height: 60px;
     font-size: 29px;
    text-align:center; 
    padding-top:10px;
  }
  .footer {
  text-align:center; 
  right: 0px;
  bottom:0px;
  color:#FFF;
  width: 100%;
    height: 50px;
  background-color: navy;
  color: white;
  font-size:22px;

}
img{
  border:2px solid black;

  width: 220px; 
    height: 140px;  

border-radius: 8px;
}
    </style>
 </style> 
 </head>
 
 <body>

<div class="header">
    Espace Chef Filiere
  </div>
  <div class="row"> 
  <div class="col">
            </div>
       <div class="col-md-2">

           <button type="button" class="btn btn-outline-transparent" style="float: right; margin-bottom: 20px; "  data-toggle="modal" data-target="#exampleModalCenter">
 <a href="./interface.php" style="color: blue"> <strong >Deconnexion</strong> </a>
</button>
           </div> 
         </div>
<h3 class="section-title" align="center" style="color: #064970"><strong><u><i>PROFIL CHEF FILIERE:</i></u></strong></h3>


        
<table class="table">

 
  <tbody id="tbody-tableau">

  <?php 
    while($row = mysqli_fetch_row($result))
    {
        echo '<center>';
        echo'<div style="width:450px;height:400px;border:2px solid #999999;">';
        echo '<p class="ridge"> </p>'; 
        echo "<strong>Photo:</strong>";
        echo"<br>";
        echo '<img src="images/'.$row[11].'"class="arrondie"/>';
        echo"<br>";
		    echo "<strong>Nom:</strong>";
        
		    echo " $row[1]";
        echo"<br>";
		    echo " <strong>Prenom:</strong>";
        
        echo " $row[2]";
        echo"<br>";
        echo " <strong>CIN:</strong>";
        
        echo "$row[6]";
        echo"<br>";
        echo "<strong> Adresse:</strong>";
       
        echo " $row[7]";
        echo"<br>";
        echo "<strong> Telephone:</strong>";
        
        echo " $row[8]";
        echo"<br>";
        echo "<strong> Email:</strong>";
        
        echo " $row[9]";
        echo"<br>";
        echo "<strong> Grade:</strong>";
        
        echo "$row[10]";
        echo '</center>';
      
          
    }

  ?>
  
     
  </tbody>
  
</table>
<center>
    &emsp;&emsp; &emsp; &emsp; &emsp;
  <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"> <a href="./ProfileEditfil.html" target="_parent">  Edit Profile </a></button>
            &emsp;&emsp; &emsp; 

<button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"> <a href="./ProfileCheffiliere.php
" target="_parent">  BACK </a></button>
            &emsp;&emsp; &emsp; &emsp; &emsp;
</center>
<div class="footer" style="position:fixed;">

     Faculté Polydisciplinaire de Taroudant - Hay El Mohammadi (Lastah) B.P : 271, 83 000 Taroudant<br>
     Tèl: 05 28 55 10 10 , Fax: 05 28 55 10 20  E-mail: FPTaroudant@univ-ibnzohr.ac.ma 
</div>
</body>
</html>