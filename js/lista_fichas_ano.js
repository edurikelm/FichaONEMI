const currentFecha = new Date();
const currentYear = currentFecha.getFullYear();

const obtenerYearFicha = () => {

    const year = document.getElementById('yearFicha').value;
    const idAlumno = document.getElementById('idAlumno').value;

    if(year == currentYear){
        location.href = `http://localhost/proyectos/FichaOnemi%20_1/pages/ver_ficha.php?id=${idAlumno}`;
    }

    enviarDatosYear(year, idAlumno)
    infoPorYear(year, idAlumno)
} 

const enviarDatosYear = (dato, idAlumno) => {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint2").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET",`../modulos/lista_fichas_year.php?q=${dato}&id=${idAlumno}`, true);
    xmlhttp.send();
}

const infoPorYear = (year, idAlumno) => {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("total_year").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET",`../modulos/total_por_year.php?q=${year}&id=${idAlumno}`, true);
  xmlhttp.send();
}