<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Elimina tabla</title>
    <script type="text/javascript" src="mysql.js">

    </script>
</head>
<body>
<h2>Elimina tu tabla!</h2><br>
Nombre de tabla: <input type="text" id="tabla" name="username" required/>

<br>

<br>
<button onclick="deleteTable()">Eliminar tabla</button>

<br>
<br>
<script>
    function deleteTable() {
        var table = new Array(document.getElementById("tabla").value);
        mysqlDrop(table);
    }
</script>
</html>