<?php
require("conexion.php");
$foto = "img/sinimagen.jpg";

// enciar datos al btnguardar
if (isset($_POST['btnguardar'])) {
    $nombre = $_POST['txtnombre'];
    $subtitulo = $_POST['txtsubtitulo'];
    $precio = $_POST['txtprecio'];
    $imagen = $_FILES['btnfoto']['name']; 
    if ($id == 0) {
        $sql = "INSERT INTO card (nombre, subtitulo, precio, imagen) VALUES ('$nombre', '$subtitulo', '$precio', '$imagen')";
    } else {
        $sql = "UPDATE card SET nombre='$nombre', subtitulo='$subtitulo', precio='$precio', imagen='$imagen' WHERE id='$id'";
    }

    // Realiza la operación en la base de datos aquí
    $consulta = mysqli_query($conexion, $sql);

    //va a la página de la tabla en el segundo frame
    header("Location: autotabla.php");
    exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
body {
	background-color: #99FF33;
    background-image: url('img/fondo.JPG');
	background-size: cover;
}
table {
	border-color:#FF0066;
   
}
-->
</style>
</head>
<body>
<table width="466" height="161" border="5">
  <tr>
    <td>NOMBRE</td>
    <td>SUBTITULO</td>
    <td>PRECIO</td>
    <td>IMAGEN</td>
    <td>HABILITADA</td>
  </tr>
  <tr>
    <?php
 /////////LLAMAR A LA VARIABLES////////////////////////////////////////////
   $sql="SELECT * FROM card ORDER BY nombre ";
   $consulta=mysqli_query($conexion,$sql);
   while($registro=mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
     $nombre=$registro['nombre'];
     $subtitulo=$registro['subtitulo'];
     $precio=$registro['precio'];
     $foto=$registro['imagen'];
	 $habilitado=$registro['habilitada'];
	 $id=$registro['id'];
    
	echo "<td><a href='autoformulario.php?id=".$id."' target='uno'>".$nombre."</a></td>";
    echo "<td>".$subtitulo."</a></td>";
    echo "<td>".$precio."</a></td>";
    echo "<td><img src='".$foto."' width='140' height='89' </a></td>";
    $valor="";
	if($habilitado==1) {
	 $valor="checked='checked'";
	} 

	echo "<td><input name='checkbox' type='checkbox' value='checkbox' ".$valor." /></td>";
  echo "</tr>";
 }  //  while($registro=mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
 ?>
  </tr>
</table> 

<a class="btn btn-success" href='autoformulario.php?id=0' target='uno'>MODIFICAR TABLA</a>

</body>
</html>
