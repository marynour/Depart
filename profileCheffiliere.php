<!DOCTYPE html>

<html>
  
<head>
    
<meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">  
body {
  font-family: "Avenir Next";
}
li {
  list-style: none;
}
.header {
  background-color: navy;
  color: white;
  height: 60px;
     font-size: 29px;
    text-align:center; 
    padding-top:10px;
  }


/* Add CSS for <input> and <textarea> tags */
input,textarea{
  width:400px;
  margin-top:10px;
  margin-bottom:30px;
  padding:20px;
  font-size:18px;
   border:1px solid #dee7ec ;
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


.main {
 display:flex;
 }
 
 .copy-container  {
    flex:1;
  }

.copy-container table {
   width:45%;
  margin-left: 90px;
   margin-bottom: 5px;
   margin-top: 90px;

  
}
.copy-container tr,td {
  border-bottom: 1px solid #ddd;
}

.copy-container th {
background-color: lightskyblue;
  color: white;
  
}

.copy-container tr:hover {background-color: #f5f5f5;}

.copy-container2  {
    flex:1;
}

.copy-container2 table {
   width:45%;
   margin-left: 300px;
   margin-bottom: 20px;
 margin-top: 20px;

}
.copy-container2 tr:hover {background-color: #f5f5f5;}

.copy-container2 tr,td {
  border-bottom: 1px solid #ddd;
  
}
.copy-container2 th {
background-color: lightskyblue;
  color: white;
  
}



    </style>
  <title>Chef Dep</title>
 
 </head>
  <body style="background-color: #FFFADF " style=" margin-bottom: 20px ; " >
   
 <div class="header">
    Espace Chef Filiere
  </div>
 <div class="row"> 
  <div class="col">
            </div>
       <div class="col-md-2">

           <button type="button" class="btn btn-outline-transparent" style="float: right; margin-bottom: 20px; "  data-toggle="modal" data-target="#exampleModalCenter">
 <a href="./interface.php" style="color: blue"> <strong > Deconnexion  </strong> </a>
</button>
           </div> 
         </div>
           
<strong>
  <?php 
   session_start();

$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
$cnx=$_SESSION['idcnx'];

// select the image 
$query = "SELECT * from professeurs where idcnx='$cnx'"; 

$result= mysqli_query($id,$query);     
 $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
   ?>
  <div align="center">
     <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"> <a href="./profilutilfil.php" target="_parent">  Profil </a></button>
            &emsp;&emsp; &emsp; &emsp; &emsp;
           <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"> <a href="./reunfil.php" target="_parent">  Reunion </a></button>
            &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;
             <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"><a href="./Soutenance.php" target="_parent"> Soutenance </a></button>
            &emsp;&emsp; &emsp; &emsp; &emsp;
            <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"><a href="./stage.php" target="_parent"> Stage </a></button>
             &emsp;&emsp; &emsp;&emsp;   
             <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"><a href="./courrierrecepCF.php" target="_parent"> Courrier </a></button>
             &emsp;&emsp; &emsp;&emsp;   
             <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"><a href="./avisrecepCF.php" target="_parent"> Avis </a></button>
             &emsp;&emsp; &emsp;&emsp;   
  </div>
  <div class="main">
    
  <div class="copy-container">
    <?php
 

 $sql= "SELECT DISTINCT nom FROM departement,filiere WHERE departement.iddep=filiere.iddep and departement.iddep=1 ";
 $result = mysqli_query($id,$sql);
   echo "<table>";
   echo "<th> Mathematiques et Informatique</th>";     echo "<br>";

while($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
     echo "<tr>";
          echo "<td> ".$row['nom']."</td>";
         
      echo "</tr>";        echo "<br>";
    }
   echo "</table>";

  $sql2= "SELECT DISTINCT nom FROM departement,filiere WHERE departement.iddep=filiere.iddep and departement.iddep=2 ";
 $result2 = mysqli_query($id,$sql2);
   echo "<table>";

   echo "<th>Sciences Economiques & Gestion</th>";     echo "<br>";

while($row2= mysqli_fetch_array($result2,MYSQLI_ASSOC))
    {
     echo "<tr>";
          echo "<td> ".$row2['nom']."</td>";
         
      echo "</tr>";        
    }
  
   echo "</table>";
echo "<br>";
  

?> 
</div>

<div class="copy-container2">
    <?php
 

 $sql3= "SELECT DISTINCT nom FROM departement,filiere WHERE departement.iddep=filiere.iddep and departement.iddep=3 ";
 $result3 = mysqli_query($id,$sql3);
   echo "<table>";
    echo "<th> Sciences Humaines et sociales</th>";     echo "<br>";

while($row3= mysqli_fetch_array($result3,MYSQLI_ASSOC))
    {
     echo "<tr>";
          echo "<td> ".$row3['nom']."</td>";
         
      echo "</tr>";        echo "<br>";
    }
   echo "</table>";

   $sql4= "SELECT DISTINCT nom FROM departement,filiere WHERE departement.iddep=filiere.iddep and departement.iddep=4 ";
 $result4 = mysqli_query($id,$sql4);
  echo "<table>";

   echo "<th>Sciences & Techniques</th>";     echo "<br>";

while($row4= mysqli_fetch_array($result4,MYSQLI_ASSOC))
    {
     echo "<tr>";
          echo "<td> ".$row4['nom']."</td>";
         
      echo "</tr>";       
    }
   echo "</table>";
  

?> 
</div>
            
</div>
</strong>
  


 

  <div class="footer" style="position:fixed;">

     Faculté Polydisciplinaire de Taroudant - Hay El Mohammadi (Lastah) B.P : 271, 83 000 Taroudant<br>
     Tèl: 05 28 55 10 10 , Fax: 05 28 55 10 20  E-mail: FPTaroudant@univ-ibnzohr.ac.ma 
</div>
      

 

  
</body>
</html>