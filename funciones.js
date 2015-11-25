/**
 * Created by fofo on 11/22/2015.
 */

function test() {
    var xhr = new XMLHttpRequest();
    xhr.onload = handler;
    function handler(){
        if(xhr.status == 200)
           document.getElementById("test").innerHTML = xhr.responseText;
    }
    xhr.open("GET","mysql.php",true);
    xhr.send(null);
}
