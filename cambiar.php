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
    <title>Cambiar nombre de cuenta</title>
    <script type="text/javascript" src="mysql.js">

    </script>
</head>
<body>
<h2>Cambiar nombre de tu cuenta!</h2><br>
Usuario: <input type = "text" id = "username" name = "username" required />
<br>

<br>
<button onclick="changeName()">Cambiar nombre</button>

<br>
<br>
<script>
    function changeName()
    {
        var columnas = new Array("username");
        var values = new Array (document.getElementById("username").value);
        var where = "username = '<?php echo $username; ?>'";
        console.log(values);
        mysqlUpdate("user",columnas,values, where);
    }
    </script>
</html>