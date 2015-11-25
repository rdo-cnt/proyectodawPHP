<?php

error_reporting(E_ALL & ~E_NOTICE);

session_start();

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
else{
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
Que cool. Tu username es <?php echo $username ?>. Que padre.

<button></button>

<form action ="logout.php">
    <input type = "submit" value="Log out">
</form>
</body>
</html>