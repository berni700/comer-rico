<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FF9933;
        }
        .container {
            max-width: 300px;
            margin: 100px auto;
            background-color: #99FF33;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #CC0066;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 10px;
            text-align: center;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
.Estilo2 {font-size: 14px}
    </style>
</head>
<body>
<?php
session_start();
include "conexion.php";
if(isset($_SESSION['user'])) {
?>
    <div class="container">
      <img src="img/logoinicio.jpg" class="card-img-top img-fluid rounded-circle" style="width:100%; height:100%" alt="">
    </div>
        <form method="post" action="logeo.php">
            <div class="form-group">
                <label for="user">Usuario:</label>
                <span class="Estilo2"></span>
                <input type="text" id="user" name="user" required>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" required>
            </div>
            <input type="submit" name="enviar" value="Acceder">
        </form>
    </div>
<?php
} else {
?>
    <div class="container">
        <form method="post" action="logeo.php">
            <div class="form-group">
                <label for="user">Usuario:</label>
                <input type="text" id="user" name="user" required>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" required>
            </div>
            <input type="submit" name="enviar" value="Acceder">
        </form>
    </div>
<?php
}
?>
</body>
</html>
