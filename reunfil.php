<?php
session_start();
$cnx=$_SESSION['idcnx'];

  $id=mysqli_connect("localhost","root","","DEPARTEMENT");

  $query=" SELECT * FROM Reunion ";
  $result = mysqli_query($id,$query);
  /*if (!$result)
  {
  die('error : ' . mysqli_error($id));
  }
  echo "Avis  bien envoyé!"."<br>";*/


  
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

      
  <!-- Button trigger modal -->

<button type="button" class="btn btn-primary" style="float: right; margin-bottom: 20px; "  data-toggle="modal" data-target="#exampleModalCenter">
  AJOUTER
</button>

         
<table class="table table-bordered">
  
  <thead>
    
      <tr class="table-secondary">
      <th > <center>Objet</center> </th>
      <th ><center>Date Reunion</center></th>
      <th > <center>Convocation</center> </th>
      <th > <center>PV</center></th>
      <th > <center>Liste de presence</center></th>
    </tr>
  
  </thead>
  <tbody id="tbody-tableau">
  <?php 
  $i=0;
    while($row = mysqli_fetch_row($result))
    {
     
      echo "<tr>";
          echo "<td><center> $row[3]</center></td>";
          echo "<td><center> $row[4]</center></td>";
          $name[]= $row['5'];
          echo "<td> <center>$row[5] <br/> <a href=\"filereu.php?name2=$name[$i]\" >Download</a></center></td>";
          
          echo "<td><center> $row[6]</center></td>";
          echo "<td><center> $row[7]</center></td>";
          echo "<td>  <a href='#' onclick='edit($row[0], \"$row[3]\", \"$row[4]\", \"$row[5]\", \"$row[6]\" , \"$row[7]\")'> <i data-feather='edit-2'> </i> </a> <a href='deletefil.php?idreunion=$row[0]' onClick=\"return confirm('Êtes-vous sûr ? ')\"> <i data-feather='delete'> </i> </a></td>";
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


<!-- Modal ajouter -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="diaog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une nouvelle reunion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="materiel-form" method="post" action="insertfil.php">
          <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
          
            <input type="hidden" class="form-control" name="idchefDep">
            <h6>Objet</h6>
            <input type="text" class="form-control" name="Objet">
            <h6>Date Reunion</h6>
            <input type="Date" class="form-control" name="DateReunion">
            <h6>Convocation</h6>
            <input type="file" class="form-control" name="Convocation">
            <h6>PV</h6>
            <textarea class="form-control" name="PV"></textarea>
            <h6>Liste de presence</h6>
            <textarea class="form-control" name="ListePresence"></textarea>
             

    
                      
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
    
        <button class="btn btn-primary" onclick="$('#materiel-form').submit()">Enregistrer</button-->
      </div>
    </div>
  </div>
</div>
    

<!-- Modal modifier-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="diaog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modifier une reunion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form id="edit-materiel-form" method="post" action="editfil.php">
            <input type="hidden" class="form-control" name="idreunion">


            <h6>Objet</h6>
            <input type="text" class="form-control" name="Objet">
            <h6>Date Reunion</h6>
            <input type="Date" class="form-control" name="DateReunion">
            <h6>Convocation</h6>
            <input type="text" class="form-control" name="Convocation">
            <h6>PV</h6>
            <input class="form-control" name="PV">
            <h6>Liste de presence</h6>
            <input class="form-control" name="ListePresence">

            
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
    
        <button class="btn btn-info" onclick="$('#edit-materiel-form').submit()">Mettre à jour</button-->
      </div>
    </div>
  </div>
</div>

            



    <script src="bootstrap/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace()
    </script>
    <script>

      function ajouterLigne(){
        var tbody =document.getElementById("tbody-tableau");
        var text = `
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
          </tr>
        `
        tbody.innerHTML +=text;
  
      }

      function edit(idreunion, objet, DateReun, convocation, PV,ListePrese) {
          $('#edit-materiel-form input[name=idreunion]').val(idreunion);
          $('#edit-materiel-form input[name=Objet]').val(objet);
          $('#edit-materiel-form input[name=DateReunion]').val(DateReun);
          $('#edit-materiel-form input[name=Convocation]').val(convocation);
          $('#edit-materiel-form input[name=PV]').val(PV);
           $('#edit-materiel-form input[name=ListePresence]').val(ListePrese);


          $('#modal-edit').modal("show");
        // body...
      }
    </script>
    <div class="row"> 
  <div class="col">
            </div>
       <div class="col-md-1">
<button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModalCenter"> <a href="./ProfileCheffiliere.php
" target="_parent">  BACK </a></button>
           
</button>
           </div> 
         </div>
  
    
            
</body>
</html>