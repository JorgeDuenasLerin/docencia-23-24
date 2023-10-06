
var valorAJAXGet = document.getElementById('get-form-valor');
var valorAJAXPost = document.getElementById('post-form-valor');

var contador = document.getElementById('contador');

setInterval(function(){
  contador.innerText = 1 + parseInt(contador.innerText)
}, 1000);

document.getElementById('get-form').onsubmit = function() {
    var xhttp = new XMLHttpRequest();
    // open(method, url, async)
    xhttp.open("GET", "http://127.0.0.1:8080?valor=" + valorAJAXGet.value, true);
    xhttp.send();
    // No enviamos el formulario normal
    // hemos enviado la información por AJAX
    /*
    xhttp.onreadystatechange = function() {//Call a function when the state changes.
        if(xhttp.readyState == 4 && xhttp.status == 200) {
            alert(http.responseText);
        }
        //  readyStates 
        // 0 	UNSENT 	Client has been created. open() not called yet.
        // 1 	OPENED 	open() has been called.
        // 2 	HEADERS_RECEIVED 	send() has been called, and headers and status are available.
        // 3 	LOADING 	Downloading; responseText holds partial data.
        // 4 	DONE 	The operation is complete.
        
    }
    */
    
    return false;
};

document.getElementById('post-form').onsubmit = function() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://127.0.0.1:8080", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("valor=" + valorAJAXGet.value);
    // No enviamos el formulario normal
    // hemos enviado la información por AJAX
    return false;
};

// https://www.w3schools.com/xml/ajax_xmlhttprequest_send.asp
