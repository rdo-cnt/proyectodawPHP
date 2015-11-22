<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/20/2015
 * Time: 2:53 PM
 */

$host = "localhost";
$username = "root";
$password = "";
$database = "usuarios";


    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "select * from registrados";
    $result = $mysqli->query($query);


    $mysqli -> close();
    echo "funciono";
