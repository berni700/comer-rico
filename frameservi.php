<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?php
session_start();
  require("conexion.php");
if(isset($_SESSION['user']))
{
?></div>
<frameset rows="*" cols="496,*" framespacing="0" frameborder="no" border="0">
 
 <frame src="autoformulario.php" name="uno" scrolling="No" noresize="noresize"  " id="uno" />

  <div class="header">
    <p>Estás conectado como <strong><?php echo $_SESSION['user']; echo ' ';echo '<a href="logout.php">Cerrar sesión</a>';?></strong></p>
  <frame src="autotabla.php" name="dos" id="dos" />
</frameset>

<noframes>
</noframes>


  
<?php
}
else
{
?>
<div class="container">
    <p>Debes iniciar sesiÃ³n para acceder. <a href="login.php">Click aquÃ­</a></p>
</div>
<?php
}
?>
</body>
</html>
