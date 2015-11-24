<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/20/2015
 * Time: 2:53 PM
 */

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "proyectodaw";
$table = "user";

$mysqli = new mysqli($host, $dbusername, $dbpassword, $database);
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function login($username, $password){
	
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