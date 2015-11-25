<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/20/2015
 * Time: 2:53 PM
 */

// Parametros generales de coneccion
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$database = "proyectodaw";
$table = "user";

//conexión inicial a la base de datos
$mysqli = new mysqli($host, $dbUsername, $dbPassword, $database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function login($username, $password)
{
    global $table, $mysqli;
    $query = "SELECT * FROM " . $table . " WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";

    if ($result = $mysqli->query($query)) {
        // Return the number of rows in result set
        $rowCount = $result->num_rows;
        //printf("Result set has %d rows.\n", $rowcount);

        $row = $result->fetch_assoc();
        $userId = $row[0];
        $result->free();

        if ($rowCount != 0) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $userId;
            header('Location: index.php');
            return "Login correcto";

        } else {
            return "Usuario o password incorrecta";
        }

        // Free result set
    }
}

//select
function select($table, $columns, $where)
{
    global $mysqli;
    $columnString = $columns[0];
    for ($i = 1; $i < sizeof($columns); $i++) {
        $columnString .= ", " . $columns[$i];
    }

    $query = "SELECT " . $columnstring . " FROM " . $table . " WHERE " . $where;

    $result = $mysqli->query($query);
    $count = 0;
    $resultArray = array();
    while ($row = $result->fetch_assoc()) {
        for ($i = 0; $i < sizeof($columns); $i++) {
            $resultArray[$count][$i] = $row[$i];
        }
        $count++;
    }
    $result->free();
    return $resultArray;
}

//update
function update($columns, $table, $values, $where)
{

    global $mysqli;
    if (sizeof($columns) < 1) {
        return "Error, no hay nada en el arreglo de columnas";
    }
    if (sizeof($values) < 1) {
        return "Error, no hay nada en el arreglo de values";
    }
    if (sizeof($columns) != sizeof($values)) {
        return "Error, los arreglos values y columns son de diferente tamaño";
    }
    $columnString = $columns[0] . "= '" . $values[0] . "'";
    for ($i = 1; $i < sizeof($columns); $i++) {
        $columnString .= ", " . $columns[$i] . "= '" . $values[$i] . "'";
    }

    $query = "UPDATE " . $table . " SET " . $columnString . " WHERE " . $where;

    if ($mysqli->query($query) === TRUE) {
        return "Record updated successfully ". $mysqli->affected_rows;
    } else {
        return "Error updating record: " . $mysqli->error;
    }

}

//insert

//delete
function delete($table, $where)
{
    global $mysqli;
    $query = "DELETE FROM " . $table . " WHERE " . $where;
    $result = $mysqli->query($query);
    $count = $mysqli->affected_rows;
    $result->free();
    return $count;
}

//create

//drop
function drop($table)
{
    global $mysqli;
    $query = "DROP TABLE " . $table;
    $result = $mysqli->query($query);
    $result->free();
    if ($mysqli->sqlstate == "00000") {
        return "Table " . $table . " dropped";
    } else {
        return "Error - SQLSTATE " . $mysqli->sqlstate;
    }
}

//alter

