<?php 

require_once ("../configs/conexion_db.php");

$current_year = $_GET['q'];
$id = $_GET['id'];

$sql = "SELECT id_ficha, numFicha, id_alumno, fecha, date_format(fecha_entrevista, '%d/%m/%Y') AS fecha_entrevista, hora_entrevista, entrevistador,otro_entrevistador,entrevistado, motivo, situacion_actual, acuerdos, observaciones FROM ficha_alumno WHERE YEAR(fecha) = $current_year AND id_alumno = $id" ;
$resultado = mysqli_query($enlace, $sql);


echo '

<table width="100%" class="table table-bordered" id="example">
    <thead>
        <tr>
            <th scope="col" hidden>idalumno</th>
            <th scope="col">Fecha Entrevista</th>
            <th scope="col">Situacion Actual</th>
            <th scope="col">Entrevistador/es</th>
            <th scope="col">Entrevistado/a</th>
            <th scope="col">Detalle</th>
        </tr>
    </thead>

';

while($dato = mysqli_fetch_array($resultado)):

    if($dato['situacion_actual'] === 'En proceso'){

        $html = '<button class="btn btn-block btn-warning">En proceso</button>';

    } elseif ($dato['situacion_actual'] === 'Pendiente') {

        $html = '<button class="btn btn-block btn-primary">Pendiente</button>';

    }elseif ($dato['situacion_actual'] === 'Cerrado') {

        $html = '<button class="btn btn-block btn-success">Cerrado</button>';

    }elseif ($dato['situacion_actual'] === 'Seguimiento') {

        $html = '<button class="btn btn-block btn-info">Seguimiento</button>';

    }

echo '
    <tbody>
        <tr>
            <th hidden>'.$dato['id_alumno'].'</th>
            <th>'.$dato['fecha_entrevista'].'</th>
            <th>'.$html.'</th>
            <th>'.$dato['entrevistador'].'</th>
            <th>'.$dato['entrevistado'].'</th>
            <th>
                <a href="mpdfprueba.php?ficha_numero='.$dato['numFicha'].'&id_alumno='.$dato['id_alumno'].' " class="btn btn-block btn-xs btn-info">Generar PDF</a>
            </th>
        </tr>

        
    </tbody>
';
endwhile;

echo '</table>';
