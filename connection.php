<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/22/2015
 * Time: 7:59 PM
 */
$host = "localhost";
$serverusername = "root";
$serverpassword = "";
$database = "proyectodaw";
$table = "user";

$mysqli = new mysqli($host, $serverusername, $serverpassword, $database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}