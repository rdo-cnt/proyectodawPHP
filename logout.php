<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/22/2015
 * Time: 9:06 PM
 */

session_start();
session_destroy();
header('Location: login.php');

?>

