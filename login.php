<?php
    include("ajaxHandler.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script

        ></script>
</head>
<body>
<form action ='login.php' method='POST'>
    Usuario: <input type = "text" name = "username" required />
    <br>
    Password: <input type = "text" name = "password" required />
    <br>
    <br>
    <input type = "submit" name = "submit" value="Login" />
</form>
</body>
</html>