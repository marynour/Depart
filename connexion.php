<?php
session_start();
$id=mysqli_connect("localhost","root","","DEPARTEMENT"); 
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $username =$_POST['email'];
      $password =$_POST['password']; 
      
      //profil professeur
      $sql = "SELECT idcnx FROM Connexion WHERE username = '$username' and password = '$password' and fct='professeur'";
      $result = mysqli_query($id,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      //Profil chef filiere
      $sql2 = "SELECT idcnx FROM Connexion WHERE username = '$username' and password = '$password' and fct='cheffiliere'";
      $result2 = mysqli_query($id,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($result2);
      //Profil chefdep
      $sql3 = "SELECT idcnx FROM Connexion WHERE username = '$username' and password = '$password' and fct='chefdepartement'";
      $result3= mysqli_query($id,$sql3);
      $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
      $count3 = mysqli_num_rows($result3);
      // If result matched $username and $password, table row must be 1 row
      if($count == 1) {
      //session_register("email");
         $_SESSION['email'] = $username;
         $_SESSION['idcnx']=$row['idcnx'];
         
         header("location: profileprof.php");}
      elseif ($count2==1) {
          $_SESSION['email'] = $username;
          $_SESSION['idcnx']=$row2['idcnx'];
         
         header("location: profileCheffiliere.php");}
      elseif ($count3==1) {
          $_SESSION['email'] = $username;
          $_SESSION['idcnx']=$row3['idcnx'];
         
         header("location: profileChefdep.php");
      }else { //if username or password is invalid
       echo "<span style='color:red'><strong>Your Login Name or Password is invalid</strong></span>";
     
          header("refresh:1;url=interface.php");
      }
   }
?>