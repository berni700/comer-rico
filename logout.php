<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
 session_start();
 include "conexion.php";
 if (isset($_SESSION['user'])) {
 session_destroy();
 header("location:principalservi.php");
 } else {
 echo "Error!";
 }
?>

</body>
</html>