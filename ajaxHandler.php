<?php
/**
 * Created by PhpStorm.
 * User: lsanchez
 * Date: 11/24/15
 * Time: 4:30 PM
 */

include "mysql.php";

$function = $_POST['function'];

switch ($function) {
    case "login":
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo json_encode(login($username, $password));
    case "select":
        $table = $_POST['table'];
        $columns = $_POST['columns'];
        $where = $_POST['where'];
        $columnsArray = json_decode($columns);
        echo json_encode(select($table, $columnsArray, $where));
        break;
    case "update":
        break;
    case "delete":
        break;
    case "insert":
        break;
    case "create":
        break;
    case "drop":
        break;
    case "alter":
        break;
    case "truncate":
        break;
    default:
        break;
}