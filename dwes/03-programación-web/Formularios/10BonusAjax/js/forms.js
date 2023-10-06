let valorAJAXPost = document.getElementById('post-form-valor')
let button = document.getElementById('enviar')
let loading = document.getElementById('loading')

let contador = document.getElementById('contador')

setInterval(function(){
  contador.innerText = 1 + parseInt(contador.innerText)
}, 1000);


document.getElementById('post-form').onsubmit = function() {
    var xhttp = new XMLHttpRequest();
    button.style.display="none";
    loading.style.display="inline";

    // open(method, url, async)
    xhttp.open("POST", "http://127.0.0.1:8080/backend.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("valor=" + valorAJAXPost.value);

    xhttp.onreadystatechange = function() {//Call a function when the state changes.
        if(xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
        }
        loading.style.display="none";
        button.style.display="inline";
        //  readyStates 
        // 0 	UNSENT 	Client has been created. open() not called yet.
        // 1 	OPENED 	open() has been called.
        // 2 	HEADERS_RECEIVED 	send() has been called, and headers and status are available.
        // 3 	LOADING 	Downloading; responseText holds partial data.
        // 4 	DONE 	The operation is complete.
    }

    // No enviamos el formulario normal
    // hemos enviado la información por AJAX
    return false;
};

// https://www.w3schools.com/xml/ajax_xmlhttprequest_send.asp
