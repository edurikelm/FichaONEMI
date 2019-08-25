<?php 
include ("../configs/conexion_db.php"); 
include ("../mpdf/mpdf.php"); 


$numFicha = mysqli_escape_string($enlace, $_GET['ficha_numero']);
$id = mysqli_escape_string($enlace, $_GET['id_alumno']);
$sql = "SELECT fa.id_alumno, fa.numFicha, fa.entrevistador, fa.entrevistado, fa.otro_entrevistador, fa.motivo, fa.acuerdos, fa.observaciones, fa.situacion_actual, date_format(fa.fecha_entrevista, '%d/%m/%Y') AS fecha_entrevista, hora_entrevista, a.nombres, a.apellidos FROM ficha_alumno fa INNER JOIN alumnos a ON fa.id_alumno = a.id WHERE id_alumno = '$id' AND numFicha= '$numFicha' ";
$resultado = mysqli_query($enlace, $sql);
$dado = mysqli_fetch_array($resultado);

$html='
<style>
.resumen {
	width:95%;
	border: solid 2px black ;
	padding:5px;
}
.lista-estudiantes{
	width:95%;
}
@page {
	margin-top: 100px;
	margin-right:20px;
	margin-left:40px;
	margin-bottom:100px;
   }
div{
	width: 200px;
	padding: 2px 0;
	margin: 0;
}

#flotante{  /*padre*/
	overflow: hidden;
	width: 100%; 
}

#flotante .A, #flotante .B, #flotante .C, #flotante .D, #flotante .E{  /*hijos*/
    float: left;
    text-align:center;
    width:19%;
}

#flotante2{  /*padre*/
	overflow: hidden;
	width: 1000px; 
}

#flotante2 .A, #flotante2 .B, #flotante2 .C, #flotante2 .F{  /*hijos*/
    float: left;
    text-align:center;
    width:100px;
}

#flotante2 .D, #flotante2 .E{  /*hijos*/
    float: left;
    text-align:center;
    width:150px;
}


.borde{
    border: solid 1px black ;
}
</style>
<h1 align ="center">Ficha N&#176;'.$numFicha.'</h1>
<div class="borde lista-estudiantes"></div>

<div  class=" lista-estudiantes" ><strong>Nombre estudiante:</strong> '.$dado['nombres']." ".$dado['apellidos'].'</div>
<div  class=" lista-estudiantes" ><strong>Entrevistador/es:</strong> '.$dado['entrevistador'].", ".$dado['otro_entrevistador'].'</div>
<div  class=" lista-estudiantes" ><strong>Fecha Entrevista:</strong> '.$dado['fecha_entrevista'].'</div>
<div  class=" lista-estudiantes" ><strong>Situaci&#243;n actual:</strong> '.$dado['situacion_actual'].'</div>
<br>
<h4>1.- Mot&#237;vo por el cual se reliza entrevista</h4>
<div class="resumen">'.$dado['motivo'].'</div>
<br>
<h4>2.- Acuerdos tomados para llevar el caso</h4>
<div class="resumen">'.$dado['acuerdos'].'</div>
<br>
<h4>3.- Observaciones al respecto</h4>
<div class="resumen">'.$dado['observaciones'].'</div>
';


// $html .=(selectTabla($id));
// $html = utf8_encode($html);

$mpdf = new mPDF('c','A4');
$mpdf->SetImportUse();
// $css = file_get_contents('../vendor/bootstrap/css/bootstrap.min.css');
$mpdf->SetDocTemplate('../assets/img/planilla2.pdf',true);
// $mpdf->allow_charset_conversion=true;
// $mpdf->charset_in='windows-1252';
// $mpdf->writeHTML($css, 1);
$mpdf->writeHTML($html);

$mpdf->Output('planilla.pdf','I');

