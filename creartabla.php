<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/25/2015
 * Time: 12:41 AM
 */

error_reporting(E_ALL & ~E_NOTICE);

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear tabla</title>
    <script type="text/javascript" src="mysql.js">

    </script>
</head>
<body>
<h2>Crea tu tabla!</h2><br>
Nombre de tabla: <input type="text" id="tabla" name="username" required/>
Columna: <input type="text" id="columna1" name="username" required/>
Columna: <input type="text" id="columna2" name="username" required/>
Columna: <input type="text" id="columna3" name="username" required/>
<br>

<br>
<button onclick="createTable()">Cambiar nombre</button>

<br>
<br>
<script>
    function createTable() {
        var tabla = new Array(document.getElementById("tabla").value);
        var columns = new Array(document.getElementById("columna1").value,
            document.getElementById("columna2").value,
            document.getElementById("columna3").value);
        console.log(columns);
        mysqlCreate(tabla, columns);
    }
</script>
</html>
