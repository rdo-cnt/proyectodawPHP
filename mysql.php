<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/20/2015
 * Time: 2:53 PM
 */

// Parametros generales de coneccion
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "proyectodaw";
$table = "user";

//conexión inicial a la base de datos
$mysqli = new mysqli($host, $dbusername, $dbpassword, $database);
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function login($username, $password)
{
    global $table, $mysqli;
    $query = "SELECT * FROM " . $table . " WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";

    if ($result = $mysqli->query($query)) {
        // Return the number of rows in result set
        $rowcount = $result->num_rows;
        //printf("Result set has %d rows.\n", $rowcount);

        $row = $result->fetch_assoc();
        $userId = $row[0];

        if ($rowcount != 0) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $userId;
            header('Location: index.php');

        } else {
            echo "Usuario o password incorrecta";
        }

        // Free result set
        $result->free();
    }
}

//select
function select($table, $columns, $where)
{
    global $mysqli;
    $columnstring = $columns[0];
    for ($i = 1; $i < sizeof($columns); $i++) {
        $columnstring .= ", " . $columns[$i];
    }
    $query = "SELECT " . $columnstring . " FROM " . $table . " WHERE " . $where;
    $result = $mysqli->query($query);
    $count = 0;
    $resultarray = array();
    while ($row = $result->fetch_assoc()) {
        for ($i = 0; $i < sizeof($columns); $i++) {
            $resultarray[$count][$i] = $row[$i];
        }
        $count++;
    }
    $result->free();
    return $resultarray;
}

//update
function update($columns, $table, $values, $where){

    global $mysqli;
    if (sizeof($columns) < 1) {return "Error, no hay nada en el arreglo de columnas";}
    if (sizeof($values) < 1) {return "Error, no hay nada en el arreglo de values";}
    if (sizeof($columns) != sizeof($values)) {return "Error, los arreglos values y columns son de diferente tamaño";}
    $columnstring = $columns[0] . "= '" .$values[0]. "'" ;
    for ($i = 1; $i < sizeof($columns); $i++) {
        $columnstring .= ", " . $columns[$i] . "= '" .$values[$i]. "'";
    }

    $query = "UPDATE " . $table . " SET " . $columnstring . " WHERE " . $where;

    if ($mysqli->query($query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }

}
//insert

//delete

//create

//drop

//alter

