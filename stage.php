<?php
session_start();
$cnx=$_SESSION['idcnx'];

  $id=mysqli_connect("localhost","root","","DEPARTEMENT");

  $query=" SELECT * FROM `Stage` where idstage in ( select Stage.idstage from Stage,ChefFiliere where ChefFiliere.idcheffil=Stage.idcheffil and ChefFiliere.idcnx='$cnx')";
  $result = mysqli_query($id,$query);

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
  <meta charset="utf-8">
        
        <title> Stage </title>
</head>
<body>
   <h3 class="section-title" align="center" style="color: #064970;"><strong><u><i>TABLEAU DE GESTION DES STAGES:</i></u></strong></h3>

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

  
  <thead class="thead-light">
    <tr>
      <th ><center> Nom complet Etudiant:</center> </th>
      <th ><center> Encadrant:</center> </th>
      <th ><center> Duree de stage:</center></th>
      <th > <center>Date de stage: </center></th>
      <th > <center>Lieu de stage:</center> </th>
      
    </tr>
  </thead>
  <tbody id="tbody-tableau">
  <?php 
    while($row = mysqli_fetch_row($result))
    {
     
      echo "<tr>";
          echo "<td><center> $row[3]</center></td>";
          echo "<td><center> $row[4]</center></td>";
          echo "<td><center> $row[5]</center></td>";
          echo "<td> <center>$row[6]</center></td>";
          echo "<td><center> $row[7]</center></td>";
          echo "<td>  <a href='#' onclick='edit($row[0], \"$row[3]\",\"$row[4]\", \"$row[5]\", \"$row[6]\", \"$row[7]\" )'> <i data-feather='edit'> </i> </a> <a href='deletestage.php?idstage=$row[0]' onClick=\"return confirm('Êtes-vous sûr ? ')\"> <i data-feather='delete'> </i> </a></td>";
          
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un stage </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="materiel-form" method="post" action="insertstage.php">
         
          
            <input type="hidden" class="form-control" name="idstage">
            <h6>Nom Complet Etudiant:</h6>
            <input type="text" class="form-control" name="NomComplet">
            <h6>Encadrant:</h6>
            <input type="text" class="form-control" name="encadrant">
            <h6>Duree de stage:</h6>
            <select class="form-control" name="duree">
                 <option></option>
                 <option>1 mois</option>
                 <option>2 mois</option>
                 <option>3 mois</option>
             </select>
            <h6>Date de stage:</h6>
            <input type="Date" class="form-control" name="Datestage">
            <h6>Lieu de stage:</h6>
            <input type="text" class="form-control" name="lieu">
            

    
                      
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Modifier un stage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form id="edit-materiel-form" method="post" action="editstage.php">

            <input type="hidden" class="form-control" name="idstage">
            <h6>Nom Complet Etudiant:</h6>
            <input type="text" class="form-control" name="NomComplet">
            <h6>Encadrant:</h6>
            <input type="text" class="form-control" name="encadrant">
            <h6>Duree de stage:</h6>
            <select class="form-control" name="duree">
                 <option></option>
                 <option>1 mois</option>
                 <option>2 mois</option>
                 <option>3 mois</option>
             </select>
            <h6>Date de stage:</h6>
            <input type="Date" class="form-control" name="Datestage">
            <h6>Lieu de stage:</h6>
            <input type="text" class="form-control" name="lieu">
            
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
          
          </tr>
        `
        tbody.innerHTML +=text;
  
      }

      function edit(idstg, nom, enc, Durees, Datestg,lieux) {
          $('#edit-materiel-form input[name=idstage]').val(idstg);
          $('#edit-materiel-form input[name=NomComplet]').val(nom);
          $('#edit-materiel-form input[name=encadrant]').val(enc);
          $('#edit-materiel-form input[name=duree]').val(Durees);
          $('#edit-materiel-form input[name=Datestage]').val(Datestg);
           $('#edit-materiel-form input[name=Lieu]').val(lieux);


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