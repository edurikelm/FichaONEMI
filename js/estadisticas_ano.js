
function obtenerYear () {

    const year = document.getElementById('estadisticaAno').value;

    if(year === ''){
      location.href = 'http://localhost/proyectos/FichaOnemi%20_1/pages/estadisticas.php';
    }else{
      enviarDatos(year);

    }

}

function enviarDatos(dato) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../modulos/estadistica_por_year.php?q="+dato,true);
    xmlhttp.send();

    // console.log(xmlhttp);
}

