
<!DOCTYPE html>

<html>
  
<head>
    
<meta charset="utf-8">
  
  <title>Courrier</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">  
  
    body {
  font-family: "Avenir Next";
}

.main {
  padding: 60px 80px;
}
.contact-submit{
  background-color: #dee7ec;
  color :#548eb0;
   width:400px;
  margin-top:10px;
  margin-bottom:30px;
  padding:20px;
  font-size:18px;
   border:1px solid #dee7ec ;
}
.contact-reset{
  background-color: #e6e6e6;
  color :#7d7d7d;
  width:400px;
  margin-top:10px;
  margin-bottom:30px;
  padding:20px;
  font-size:18px;
   border:1px solid #dee7ec ;
}


/* Add CSS for <input> and <textarea> tags */
input,textarea{
  width:450px;
  margin-top:10px;
  margin-bottom:20px;
  padding:12px;
  font-size:18px;
   border:1px solid #dee7ec ;
   border-radius: 5px;
}

p{
	 color: #333333; font-family: "Helvetica Neue",Arial,sans-serif; font-size: 16px; font-weight: 300; line-height: 1.5625; margin-bottom: 15px;
  margin-left: 1em;
}
 </style> 
 </head>
 
 <body >

<div class="header" align="center"> 
<h2 class="section-title" style="color:#26277a;"><strong><i><u>ENVOI D'UN COURRIER:</u></i></strong></h2>
</div> 


        
<div class="main" align="center">   
  <div style="width:700px;height:850px;border:3px solid #999999;">
    
      <p class="ridge"> </p>
<form action="CourrierenvoiCF.php" method="post"  ENCTYPE="multipart/form-data">
  <p><strong>Titre:</strong></p>            
<input type="text" name="Titre"> 
<p><strong>Emetteur:</strong></p> <br/>           
<input type="text" name="Emetteur"> 
 <p><strong>Destinataire:</strong></p>             
<input type="text" name="Destinataire"> 
<input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
<p><strong>Piece-Jointe :</strong></p>         
<input type="file" name="Piecejointe"> <br/>
<input class="contact-submit" type="submit" value="Send">
<input class="contact-reset" type="reset" value="Reset"><br>
<button type="button" class="btn btn-outline-secondary btn-lg"  data-toggle="modal" data-target="#exampleModalCenter"> <a href="./ProfileCheffiliere.php
" target="_parent">  BACK </a></button>
</form>   
</div>
     </div>
    
</div>


</body>
</html>