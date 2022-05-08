<?php
session_start();
$cnx=$_SESSION['idcnx'];

  $id=mysqli_connect("localhost","root","","DEPARTEMENT");

  $query=" SELECT * FROM `Reunion` ";
  $result = mysqli_query($id,$query);

  
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
  <meta charset="utf-8">
        
        <title> Modification </title>
</head>
<body>
  <h3 class="section-title" align="center" style="color: #064970;"><strong><u><i>TABLEAU DE GESTION DES REUNIONS:</i></u></strong></h3>
  

  <div class="row"> 
  <div class="col">
            </div>
       <div class="col-md-2">

           <button type="button" class="btn btn-outline-transparent" style="float: right; margin-bottom: 20px; "  data-toggle="modal" data-target="#exampleModalCenter">
 <a href="./interface.php" style="color: blue"> <strong > Deconnexion  </strong> </a>
</button>
           </div> 
         </div>
        <br>

      
  

         
<table class="table table-bordered">
  
  <thead class="thead-light">
    <tr>
      <th ><center> Objet </center></th>
      <th ><center>Date Reunion</center></th>
      <th > <center>Convocation </center></th>
      <th ><center> PV</center></th>
      <th ><center> Liste de presence</center></th>
    </tr>
  </thead>
  <tbody id="tbody-tableau">
  <?php 
  $i=0;
    while($row = mysqli_fetch_row($result))
    {
     
      echo "<tr>";

         
          echo "<td> <center>$row[3]</center></td>";
          echo "<td> <center>$row[4]</center></td>";
          $name[]= $row['5'];
          echo "<td> <center>$row[5] <br/> <a href=\"filereu.php?name2=$name[$i]\" >Download</a></center></td>";
          echo "<td> <center>$row[6]</center></td>";
          echo "<td><center> $row[7]</center></td>";

         
          $i++;
          
      echo "</tr>";
    }

  ?>
        
  </tbody>
  
</table>
<div class="row">
 <div class="col">
   
    </div>
  
</div>



    <div class="row"> 
  <div class="col">
            </div>
       <div class="col-md-1">
<button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"> <a href="./profileprof.php
" target="_parent">  BACK </a></button>
           
</button>
           </div> 
         </div>
  
    
            
</body>
</html>