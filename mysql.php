<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/20/2015
 * Time: 2:53 PM
 */

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
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

session_start();

function login($username, $password)
{

    global $table, $mysqli;
    $tableInitQuery = "CREATE TABLE IF NOT EXISTS `user` (" .
        "`idUser` int(11) NOT NULL," .
        " `username` varchar(20) NOT NULL," .
        " `password` varchar(100) NOT NULL)";

    if ($mysqli->query($tableInitQuery)) {

        $query = "SELECT * FROM " . $table . " WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";
        //return $query;
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
                //header('Location: index.php');
                return "Login correcto";


            } else {
                return "Usuario o password incorrecta";
            }
        } else {
            return "No se pudo intentar hacer logn";
        }
    }else{
        return "No se puede crear la tabla de usuario";
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

    $query = "SELECT " . $columnString . " FROM " . $table . " WHERE " . $where;


    if ($result = $mysqli->query($query)) {
        $count = 0;
        $resultArray = array();
        while ($row = $result->fetch_assoc()) {
            $resultArray[$count] = array();
            for ($i = 0; $i < sizeof($columns); $i++) {
                $resultArray[$count][$i] = $row[$columns[$i]];
            }
            $count++;
        }
        $result->free();
        return $resultArray;
    } else {
        return "No se pudo hacer el select " . $mysqli->error;
    }
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

        return "Record updated successfully " . $mysqli->affected_rows;
    } else {
        return "Error updating record: " . $mysqli->error;
    }

}


//insert
function insert($table, $columns, $values)
{
    global $mysqli;
    $columnString = "";
    if (sizeof($columns) > 0) {
        $columnString .= "(" . $columns[0];
        for ($i = 1; $i < sizeof($columns); $i++) {
            $columnString .= ", " . $columns[$i];
        }
        $columnString .= ")";
    }
    $ValuesString = "";
    if (sizeof($values) > 0) {
        $ValuesString .= "( '" . $values[0] . "'";
        for ($i = 1; $i < sizeof($values); $i++) {
            $ValuesString .= ", '" . $values[$i] . "' ";
        }
        $ValuesString .= ")";
    } else {
        return "Error - Por favor de valores a insertar";
    }
    $query = "INSERT INTO " . $table . $columnString . " VALUES " . $ValuesString;
    if ($result = $mysqli->query($query)) {

        return "Record updated successfully " . $mysqli->affected_rows;
    } else {
        return "Error updating record: " . $mysqli->error;
    }
}

//delete
function delete($table, $where)
{
    global $mysqli;
    $query = "DELETE FROM " . $table . " WHERE " . $where;
    if ($result = $mysqli->query($query)) {

        return "Records deleted successfully " . $mysqli->affected_rows;
    } else {
        return "Error updating record: " . $mysqli->error;
    }
}

//create
function create($table, $columns)
{
    global $mysqli;
    if (sizeof($columns) > 0) {
        $columnString = "( " . $columns[0];
        for ($i = 1; $i < sizeof($columns); $i++) {
            $columnString .= ", " . $columns[$i];
        }
        $columnString .= " );";
    } else {
        return "Error - Por favor de valores a insertar";
    }
    $query = "CREATE TABLE " . $table . " " . $columnString;
    if ($mysqli->query($query)) {
        return "Table created successfully";
    } else {
        return "Error updating record: " . $mysqli->error;
    }
}

//drop
function drop($table)
{
    global $mysqli;
    $query = "DROP TABLE " . $table;
    if ($mysqli->query($query)) {
        return "Table " . $table . " dropped";
    } else {
        return "Error - SQLSTATE " . $mysqli->sqlstate;
    }
}

//alter
function alter($table, $operation, $columns)
{
    global $mysqli;
    $columnstring = $columns[0];
    for ($i = 1; $i < sizeof($columns); $i++) {
        $columnstring .= ", " . $columns[$i];
    }
    $query = "ALTER " . " TABLE " . $table . " " . $operation . " " . $columns;
    if ($mysqli->query($query)) {
        return "Table altered successfully";
    } else {
        return "Error updating record: " . $mysqli->error;
    }
}

