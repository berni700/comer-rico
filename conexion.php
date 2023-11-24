<?php
 $conexion = new mysqli("127.0.0.1","root","","pagina");
 
  if(!$conexion){
   echo"conexion no exitosa";
  exit;
  }
?>
