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
        break;
    case "select":
        $table = $_POST['table'];
        $columns = $_POST['columns'];
        $where = $_POST['where'];
        $columnsArray = json_decode($columns);
        echo json_encode(select($table, $columnsArray, $where));
        break;
    case "update":
        $table = $_POST['table'];
        $values = $_POST['values'];
        $columns = $_POST['columns'];
        $where = $_POST['where'];
        $columnsArray = json_decode($columns);
        $valuesArray = json_decode($values);
        echo json_encode(update($columnsArray, $table, $valuesArray, $where));
        break;
    case "delete":
        $table = $_POST['table'];
        $where = $_POST['where'];
        echo json_encode(delete($table, $where));
        break;
    case "insert":
        $table = $_POST['table'];
        $values = $_POST['values'];
        $columns = $_POST['columns'];
        $columnsArray = json_decode($columns);
        $valuesArray = json_decode($values);
        echo json_encode(insert($table, $columnsArray, $valuesArray));
        //echo  $values . $columns;
        break;
    case "create":
        $table = $_POST['table'];
        $columns = $_POST['columns'];
        $columnsArray = json_decode($columns);
        echo json_encode(create($table, $columnsArray));
        break;
    case "drop":
        $table = $_POST['table'];
        echo json_encode(drop($table));
        break;
    case "alter":
        $table = $_POST['table'];
        $operation = $_POST['operation'];
        $column = $_POST['column'];
        echo json_encode(alter($table, $operation, $column));
        break;
    default:
        break;
}