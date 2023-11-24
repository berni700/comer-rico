<?php
require("conexion.php");
$sql="SELECT * FROM card WHERE habilitada=1";
$consulta=mysqli_query($conexion,$sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.css">
	<link rel="stylesheet" href="css/style.css">

<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<div class="card-footer text-muted">

<?php
session_start();
include "conexion.php";
if(isset($_SESSION['user']))
{
?>

  <div class="header">
    <p>Est�s conectado como <strong><?php echo $_SESSION['user']; echo ' ';echo '<a href="logout.php">Cerrar sesi�n</a>';?></strong></p>
  </div>
  <!-- verifica el usuario que esta guardado en user -->
<?php
}
else
{
?>

    </ul>
       <a class="nav-link" href="login.php"><i class="fas fa-leaf verde fa-3x"></i></a>


</div>
<?php
}
?>  

</div>
<div class="row">
  <div class="col-md-4 mb-4">
    <div class="card-body">
      <img src="img/logoinicio.jpg" class="card-img-top img-fluid rounded-circle" style="width:600%; height:600%" alt="">
    </div>
  </div>
  <div class="col-md-8 d-flex align-items-center">
    <div class="card-container">
	<style>
  .card-title {
    text-align: justify;
    font-size: 30px; 
    line-height: 1.6; 
    color: #663300; 
    font-family: "Times New Roman"; 
    font-weight: normal;
  }
</style>
      <h5 class="card-title" style="text-align: justify;">NUTRIMOS NUESTRO CUERPO CON LA COMIDA Y NADA MEJOR QUE TENER UNA ALTRNATIVA EXTRA SALUDABLE </h5>
    </div>
  </div>
</div>



 <div class="card-deck">

  <?php
$b=0;
while($registro=mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
  $nombre=$registro['nombre'];
  $subtitulo=$registro['subtitulo'];
  $precio=$registro['precio'];
  $imagen=$registro['imagen'];
  // llamo a las variables de mi tabla

  
  echo '<div class="card">';
  echo '  <img src="'.$imagen.'" class="card-img-top" alt="...">';
  echo '  <div class="card-body">';
  echo '    <h5 class="card-title text-center">'.$nombre.'</h5>';
  echo '    <p class="card-text">'.$subtitulo.'</p>';
  echo '    <p class="card-text"><small class="text-muted">'.$precio.'</small></p>';
  echo '  </div>';
  echo '</div>';
  // resumo el codigo de los card y lo combierto en html


}  //while($registro=mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
?>


  </div>

</div>

<div class="card-footer text-muted">
   <p>Contactanos por nuestras redes.</p>
  </div>
  
<div class="card-footer text-muted">
    
    <div class="links">
        <p><i class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/place/Juan+Bautista+Alberdi,+Tucum%C3%A1n/@-27.5892697,-65.6395722,14z/data=!3m1!4b1!4m6!3m5!1s0x9423e8fe4762bf37:0xf63c0e9de0e5ad6f!8m2!3d-27.5860327!4d-65.6240762!16s%2Fm%2F0bwkz3w?entry=ttu" target="_blank"> JUAN BAUTISTA ALBERDI</a></p>
        <p><i class="fab fa-whatsapp"></i> <a href="https://wa.link/4h0ppn" target="_blank"> 3865-550797</a></p>
        <p><i class="fab fa-instagram"></i> <a href="https://www.instagram.com/comer_rico0/" target="_blank"> @comer_rico0</a></p>
    </div>
</div>



   <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="js/imagenCarga.js"></script>
  <!-- <script src="js/imprimir.js"></script> -->
  <script type="text/javascript" src="js/jquery.progressbar.min.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>

</body>
</html>