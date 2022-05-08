<?php
session_start();
 $id=mysqli_connect("localhost","root","","DEPARTEMENT");
 $name= $_GET['name2'];


    $extensions=array ('.rar','.RAR','.png','.jpg','.jpeg','.JPG','.PNG','.JPEG','.docx','.DOCX','.pptx','.PPTX','.pdf','.PDF');
   $extension=strrchr($name,'.');
if (in_array($extension,$extensions)&& (filesize($name)<1000000)){

 header('Content-Description: File Transfer');
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename =' .basename($name));
            header('Expires: 0');
    header('Cache-Control: must-revalidate');
  header('Content-Transfer-Encoding: binary');
    header('Pragma: public');
    header('Content-Length: '. filesize($name));
    ob_clean();
    flush();
    readfile($name);
  
}

?>