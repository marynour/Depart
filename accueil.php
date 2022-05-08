<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style type="text/css">
   li {
  list-style: none;
}

.header {
  background-color:#cccccc;
  color: white;
  height: 90px;
   font-size: 36px;
  padding: 20px 40px;

}


.header-logo {
  float: left;
  font-size: 36px;
  padding: 20px 40px;
}

.header-list li {
  float: left;
  padding: 33px 20px;
}
.header-list a:link,a:visited {
  color: white;
   font-size: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
.main {
 display:flex;
 }
 
 .copy-container  {
    flex:1;
  }

.copy-container table {
   width:45%;
  margin-left: 50px;
   margin-top: 10%;
  
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
   width:60%;
   margin-left: 250px;
   margin-bottom: 900px;
 margin-top: 10px;
   border-collapse: collapse;


}

.copy-container2 tr,td {
    height: 50px;
  border-bottom: 1px solid #ddd;
  
}
.copy-container2 th {
background-color: red;
  color: white;
  
}
.msg{
  
  background-color: #f5f5f5;
    font-family: Arial, Helvetica, sans-serif;
}

.emt{
  color: black;
  font-size: 20px;
    font-family: "Times New Roman", Times, serif;

}
.date{
   background-color:#ebf4fa;
    font-family: Arial, Helvetica, sans-serif;
}

.titre{background-color: white;}
 </style> 
  <title>DepartementUIZ</title>
 
 </head>

 
<body style="background-color: #fcf2dc" style=" margin-bottom: 20px ; " >

  
 <div class="header">

   
    <h1 ><img src="fpt.png" width="300px" align="left">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;DEPARTEMENTS UIZ</h1>
    
    
     
</div>

<div class="row"> 
  <div class="col">
            </div>
 
          <div class="col-md-2" >

            <a href="./accueil.php"> <strong style="color: black">Accueil </strong></a>
            &emsp;&emsp;
              <a href="./interface.php"><strong style="color: black">Connexion </strong> </a>
            </div>
          </div>
         
  
  <div class="main">
    
  <div class="copy-container">
       
  <?php 
 $id=mysqli_connect("localhost","root","","DEPARTEMENT"); 

 $sql= "SELECT DISTINCT nom FROM departement,filiere WHERE departement.iddep=filiere.iddep and departement.iddep=1 ";
 $result = mysqli_query($id,$sql);
   echo "<table >";
   echo "<th> Mathematiques et Informatique</th>";     echo "<br>";

while($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
     echo "<tr>";
          echo "<td> ".$row['nom']."</td>";
         
      echo "</tr>";        
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

   $sql3= "SELECT DISTINCT nom FROM departement,filiere WHERE departement.iddep=filiere.iddep and departement.iddep=3 ";
 $result3 = mysqli_query($id,$sql3);
   echo "<table>";

   echo "<th>Sciences Humaines et sociales</th>";     echo "<br>";

while($row3= mysqli_fetch_array($result3,MYSQLI_ASSOC))
    {
     echo "<tr>";
          echo "<td> ".$row3['nom']."</td>";
         
      echo "</tr>";        
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

    <div class="copy-container2">
  <?php 
   $query= "SELECT * FROM avis WHERE Destinataire='Etudiants' order by idavis desc ";
 $Rs = mysqli_query($id,$query);
   echo "<table>";
   echo "<th>Avis aux Etudiants:</th>";  
       echo "<br>";

while($rows= mysqli_fetch_array($Rs,MYSQLI_ASSOC))
    {
      echo "<tr>";
          echo "<td class='date'> ". "<strong> Date:".$rows['dateavis']. "</strong>"."</td>"; 
          
     
   
  echo "<tr>";
          echo "<td class='titre' align='center'> ". "<strong>".$rows['Titre']. "</strong>"."</td>"; 
          
      echo "</tr>"; 
    echo "<tr>";
         
   
 
        
       echo "<td class='msg'>  ".$rows['Message']."</td>"."<br>";
      echo "</tr>";    echo "</tr>"; 
    echo "<tr>";  


    }
   echo "</table>";

?>

 
       
 </div>

     </div>    


<div align="right">
  <hr width="20%" color="#819FF7" align="right" size="3">
  <h5>Contactez-nous:</h5>
<h6>Hay El Mohammadi (Lastah)</h6>
<h6>B.P : 271, 83 000 Taroudant Maroc</h6>

 <h6>P: (+212) 05 28 55 10 10</h6>

 <h6>F: ( +212) 05 28 55 10 20</h6>

<h6> E: FPTaroudant@univ-ibnzohr.ac.ma</h6>
<hr width="20%" color="#819FF7" align="right" size="3">
    
    

    
</div>
  
</body>
</html>