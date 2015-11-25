<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cuenta nueva</title>
    <script type="text/javascript" src="mysql.js">

    </script>
</head>
<body>
<h2>Crea tu cuenta nueva!</h2><br>
Usuario: <input type = "text" id = "username" name = "username" required />
<br>
Password: <input type = "text" id = "password" name = "password" required />
<br>
<br>
<button onclick="createAccount()">Crear</button>

<br>
<br>

<form action="newaccount.php">
    <input type="submit" value="Crear cuenta">
</form>
</html>