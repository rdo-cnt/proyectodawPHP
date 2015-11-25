<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alterar tabla</title>
    <script type="text/javascript" src="mysql.js">

    </script>
</head>
<body>
<h2>Crea tu tabla!</h2><br>
Nombre de tabla: <input type="text" id="tabla" name="username" required/>
Operador: <input type="text" id="operador" name="username" required/>
Columna: <input type="text" id="columna" name="username" required/>
<br>

<br>
<button onclick="createTable()">Cambiar nombre</button>

<br>
<br>
<script>
    function createTable() {
        var table = new Array(document.getElementById("tabla").value);
        var operation = new Array(document.getElementById("operador").value);
        var column = new Array(document.getElementById("columna").value);
        mysqlAlter(table, operation, column);
    }
</script>
</html>