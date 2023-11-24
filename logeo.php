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
 if(isset($_POST['enviar'])) {
 $user = $_POST['user'];
 $enlace=  mysqli_connect("127.0.0.1", "root", "", "pagina");
 $pass = $_POST['pass'];
 $select = "SELECT * FROM users where user = '".$user."' AND pass = '".$pass."'";
 $query = mysqli_query($enlace,$select);
 $rows = mysqli_num_rows($query);
     if ($row = mysqli_fetch_array($query)) {
        $_SESSION['user'] = $row['user'];
        $_SESSION['pass'] = $row['pass'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['rango'] = $row['rango'];

        if ($_SESSION['rango'] === '1') {
            header("Location: frameservi.php");
        } 
    } else {
        echo '<h2 style="text-align: center;">El usuario o la contrase&ntilde;a son inválidos</h2>';
        header('refresh:2; login.php');
    }
}
?>
</body>
</html>