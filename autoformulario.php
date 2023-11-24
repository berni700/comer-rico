<?php
require("conexion.php");

$id = 0;
$nombre = "";
$subtitulo = "";
$precio = "";
$habilitado = 0;
$valor = "";


		$sql = "SELECT * FROM card LIMIT 1";
		$consulta = mysqli_query($conexion, $sql);
		if ($registro = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
			$nombre = $registro['nombre'];
			$subtitulo = $registro['subtitulo'];
			$precio = $registro['precio'];
			$foto = $registro['imagen'];
			$habilitado = $registro['habilitada'];
			$id = $registro['id'];
		}// tomalos valores de las variables
	
		if ($habilitado == 1) {
			$valor = "checked='checked'";
		}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
	if($id==0) {
		$id = 0;
		$nombre = "";
		$subtitulo = "";
		$precio = "";
		$habilitado = 0;
		$valor = "";
$foto = "img/sinimagen.jpg";	
	} else {
		$sql = "SELECT * FROM card WHERE id='$id' LIMIT 1";
		$consulta = mysqli_query($conexion, $sql);
		if ($registro = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
			$nombre = $registro['nombre'];
			$subtitulo = $registro['subtitulo'];
			$precio = $registro['precio'];
			$foto = $registro['imagen'];
			$habilitado = $registro['habilitada'];
			$id = $registro['id'];
		}
	
		if ($habilitado == 1) {
			$valor = "checked='checked'";
		}
	}
}
// verificar si  btnfoto se envio por  un formulario 
if (isset($_FILES['btnfoto']) && is_uploaded_file($_FILES['btnfoto']['tmp_name'])) {
    $source = $_FILES['btnfoto']['tmp_name'];
    $destination = "img/" . $_FILES['btnfoto']['name'];
    $destination1 = 'img/';

    if (!is_dir($destination1)) {
        mkdir($destination1, 0777, true);
    }

    if (move_uploaded_file($source, $destination)) {
        $foto = $destination; // Asigna la ruta de la imagen en el servidor
    } else {
        echo "Error: No se ha podido grabar la imagen en el servidor";
        @unlink(ini_get('upload_tmp_dir') . $_FILES['btnfoto']['tmp_name']);
        exit();
    }
}
//  verifica si el formulario que envió los datos 
if (isset($_POST['btnguardar'])) {
    $nombre = $_POST['txtnombre'];
    $subtitulo = $_POST['txtsubtitulo'];
    $precio = $_POST['txtprecio'];
	$imagen_aux = $_POST['imagen_aux'];
    $foto=$imagen_aux;
	//si el id es igual a 0 se una consulta SQL para
    if ($id == 0) {
        $sql = "INSERT INTO card (nombre, subtitulo, precio, imagen, habilitada) VALUES ('$nombre', '$subtitulo', '$precio', '$imagen_aux', '$habilitado')";
    } else {
        $sql = "UPDATE card SET nombre='$nombre', subtitulo='$subtitulo', precio='$precio', imagen='$imagen_aux', habilitada='$habilitado' WHERE id='$id'";
    }
    // verificar si la consulta fue exitosa
    $consulta = mysqli_query($conexion, $sql);
    if (!$consulta) {
        die("Error en la consulta: " . mysqli_error($conexion));
    } else {
        echo "<br>Archivo subido y registro actualizado correctamente.";
    }
	echo "<script> window.open('autotabla.php','dos'); </script>";
}  //if (isset($_POST['btnguardar'])) {
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
body {
	background-color:#99FF33;;
	background-image: url('img/fondo.JPG');
	background-size: cover;
}
-->
</style>
</head>
<body>
<form id="form1" method="post" action="" enctype="multipart/form-data">
  <label>Nombre
  <input type="text" name="txtnombre" id="txtnombre" value="<?php echo $nombre ?>" />
  </label>
  <p>
    <label>Subtitulo
    <input type="text" name="txtsubtitulo" id="txtsubtitulo" value="<?php echo $subtitulo ?>" />
    </label>
  </p>
  <p>
    <label>Precio
    <input type="text" name="txtprecio" id="txtprecio" value="<?php echo $precio ?>" />
    </label>
  </p>
  <p>
    <label>
    <input type="file" id="btnfoto" name="btnfoto" accept="image/*" style="display:none" onchange="cargar2()" />
    <button type="button" onclick="cargar()" name="imagen"><img src="<?php echo $foto ?>" id="" width="239" height="172" /></button>
    <input type="submit" name="btnguardar2" id= "btnguardar2" style="display:none" />
    </label>
    <label></label>
    <input name="txthabilitada" type="checkbox" value="checkbox" "<?php echo $valor; ?>" />
  </p>
  <p>
    <input type="hidden" name="imagen_aux" value="<?php echo $foto?>" />
    <input type="submit" name="btnguardar" value="GUARDAR" style="width: 100px; height: 70px;" />
  </p>
</form>

<script type="text/javascript">
function cargar() {
    document.getElementById("btnfoto").click();
}
function cargar2() {
    document.getElementById("btnguardar2").click();
}
</script>
<a href="autotablaframe.php" target="leftFrame"></a>
</body>
</html>
