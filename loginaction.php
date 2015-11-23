<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/20/2015
 * Time: 2:53 PM
 */

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();

if (isset($_SESSION['username'])){
    header('Location: index.php');
}


if ($_POST['submit']) {
    include_once("connection.php");
    $username = strip_tags($_POST["username"]);
    $password = strip_tags($_POST["password"]);

    $query = "SELECT * FROM " . $table . " WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";

    if ($result = mysqli_query($mysqli, $query)) {
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows($result);
        //printf("Result set has %d rows.\n", $rowcount);

        $row = mysqli_fetch_row($query);
        $userId = $row[0];

        if ($rowcount != 0) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $userId;
            header('Location: index.php');

        } else {
            echo "Usuario o password incorrecta";
        }

        // Free result set
        mysqli_free_result($result);
    }
}