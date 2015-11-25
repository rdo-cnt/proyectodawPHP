/**
 * Created by lsanchez on 11/24/15.
 */


var request;

function getRequestObject() {
    if (window.ActiveXObject) {
        return(new ActiveXObject("Microsoft.XMLHTTP"));
    } else if (window.XMLHttpRequest) {
        return(new XMLHttpRequest());
    } else {
        return(null);
    }
}

function handleResponse() {
    if (request.status == 200) {
        alert(request.responseText);
    }
}

function mysqlLogin(username, password){
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "login");
    data.append("username", username);
    data.append("password", password);
    request.send(data);
}

function mysqlSelect(table, columns, where){
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "select");
    data.append("table", table);
    var columnsString = JSON.stringify(columns);
    data.append("columns", columnsString);
    data.append("where", where);
    request.send(data);
}


//update
function mysqlUpdate(table, columns, values, where){
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "update");
    data.append("table", table);
    var columnsString = JSON.stringify(columns);
    data.append("columns", columnsString);
    var valuesString = JSON.stringify(values);
    data.append("columns", valuesString);
    data.append("where", where);
    request.send(data);
}

//insert
function mysqlInsert(table, columns, values){
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "insert");
    data.append("table", table);
    var columnsString = JSON.stringify(columns);
    data.append("columns", columnsString);
    var valuesString = JSON.stringify(values);
    data.append("columns", valuesString);
    request.send(data);
}

//delete
function mysqlDelete(table, where){
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "delete");
    data.append("table", table);
    data.append("where", where);
    request.send(data);
}

//create
function mysqlCreate(table, columns, options){
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "create");
    data.append("table", table);
    var columnsString = JSON.stringify(columns);
    data.append("columns", columnsString);
    var optionsString = JSON.stringify(options);
    data.append("options", optionsString);
    request.send(data);
}

//drop
function mysqlDrop(table) {
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "drop");
    data.append("table", table);
    request.send(data);
}

//truncate
function mysqlTruncate(table) {
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "truncate");
    data.append("table", table);
    request.send(data);
}

//alter
function mysqlAlter(table, operation, info) {
    request = getRequestObject();
    request.open("POST", 'mysql.php', true);
    request.onload = handleResponse;
    var data = new FormData();
    data.append("function", "delete");
    data.append("table", table);
    data.append("operation", operation);
    request.send(data);
}