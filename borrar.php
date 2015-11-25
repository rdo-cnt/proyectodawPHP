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
    <title>Cuenta nueva</title>
    <script type="text/javascript" src="mysql.js">

    </script>
</head>
<body>
<h2>Seguro que quieres borrar tu cuenta?!</h2><br>

<br>
<button onclick="deleteAccount()">Borrar cuenta</button>

<br>
<br>
<script>
    function deleteAccount()
    {
        var where = "username = '<?php echo $username; ?>'";
        mysqlDelete("user", where);
        window.location.href="login.php";
    }
</script>
</html>