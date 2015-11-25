<?php

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
    <title>Title</title>
    <script type="text/javascript" src="mysql.js"></script>
</head>
<body>
Que cool. Tu username es <?php echo $username ?>. Que padre.

<button onclick="selectUsers()">Checa tabla</button>

<form action="cambiar.php">
    <input type="submit" value="Cambiar nombre">
</form>
<br>
<form action="creartabla.php">
    <input type="submit" value="Crear tabla">
</form>
<br>
<form action="alterartabla.php">
    <input type="submit" value="Alterar tabla">
</form>
<br>
<form action="dropthebase.php">
    <input type="submit" value="Eliminar tabla">
</form>
<br>
<form action="borrar.php">
    <input type="submit" value="Borrar cuenta">
</form>
<br>
<form action="logout.php">
    <input type="submit" value="Log out">
</form>
</body>
<script>

    function selectUsers() {
        var columnas = new Array("username","password");
        mysqlSelect("user", columnas, 1);
    }
</script>
</html>