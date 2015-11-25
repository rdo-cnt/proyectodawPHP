<?php
error_reporting(E_ALL & ~E_NOTICE);

session_start();

if (isset($_SESSION['username'])){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="mysql.js">

    </script>
</head>
<body>

    Usuario: <input type = "text" id = "username" name = "username" required />
    <br>
    Password: <input type = "text" id = "password" name = "password" required />
    <br>
    <br>
    <button onclick="log()">Login</button>

</body>
</html>