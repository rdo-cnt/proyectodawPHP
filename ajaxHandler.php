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
    case "select":
        $table = $_POST['table'];
        $columns = $_POST['columns'];
        $where = $_POST['where'];
        $columnsarray = json_decode($columns);
        echo json_encode(select($table, $columnsarray, $where));
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
    default:
        break;
}