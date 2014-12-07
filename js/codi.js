function omplir(num) {
  // Obtener la instancia del objeto XMLHttpRequest
  if(window.XMLHttpRequest) {
    peticion_http = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {
    peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
  }
 
  // Preparar la funcion de respuesta
  peticion_http.onreadystatechange = muestraContenido;
 
  // Realizar peticion HTTP
  //peticion_http.open('GET', 'http://localhost/portal/equips.php?num='+num, true);
  peticion_http.open('GET', 'http://tallerxmlrce.comuf.com/web/equips.php?num='+num, true);
  peticion_http.send(null);
 
  function muestraContenido() {
    if(peticion_http.readyState == 4) {
      if(peticion_http.status == 200) {
        document.getElementById('desplegable').innerHTML =peticion_http.responseText;
      }
    }
  }
}
function temps()
{
var http_request = new XMLHttpRequest();
var url = "http://api.openweathermap.org/data/2.5/weather?q=Banyeres,es&units=metric&lang=ca,es"; 

 // Descarrega les dades JSON del servidor.
http_request.onreadystatechange = handle_json;
http_request.open("GET", url, true);
http_request.send(null);
 
function handle_json() {
  if (http_request.readyState == 4) {
    if (http_request.status == 200) {
      var json_data = http_request.responseText;   // l'objecte json_data guarda les dades rebudes en format JSON
      var the_object = eval("(" + json_data + ")");   // guarda les dades en format objecte 
      var json = JSON.parse(json_data);          // parseja les dades per si volem accedir a un valor concret ja separat
       var res = "La temperatura a Banyeres de Mariola (Alacant) actualment és de " + json.main.temp + " ºC " ; // Construim la cadena 
       document.getElementById('temps').innerHTML = res ;    // Enviem la cadena construida a la capa amb id = temps 
    } else {
      alert("Fora de servei ");   // Si no carrega mostra missatge d'error 
    }
    http_request = null;
  }
}
}


function carregar_partits() {
  if(window.XMLHttpRequest) {
    peticion_http = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {
    peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
  }
  peticion_http.onreadystatechange = muestraContenido;
  peticion_http.open('GET', 'http://tallerxmlrce.comuf.com/web/calendari.php', false);
  peticion_http.send(null);
 
  function muestraContenido() {
    if(peticion_http.readyState == 4) {
      if(peticion_http.status == 200) {
        document.getElementById('partits').innerHTML =peticion_http.responseText;
      }
    }
  }
}