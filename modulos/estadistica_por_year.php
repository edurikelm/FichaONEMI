<?php 
require_once ("../configs/conexion_db.php");

$year = $_GET['q'];

//Total de fichas por año
$sql = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = $year ";
$consulta = mysqli_query($enlace, $sql);
$filas = mysqli_num_rows($consulta);

// Total de alumnos ingresados
$query1 = "SELECT * FROM alumnos WHERE YEAR(fecha_creacion) = $year";
$consulta1 = mysqli_query($enlace, $query1);
$num_filas1 = mysqli_num_rows($consulta1);

//Total situacion actual por año
$query10 = "SELECT situacion_actual FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND situacion_actual='Cerrado'";
$consulta10 = mysqli_query($enlace, $query10);
$num_filas10 = mysqli_num_rows($consulta10);

$query11 = "SELECT situacion_actual FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND situacion_actual='En proceso'";
$consulta11 = mysqli_query($enlace, $query11);
$num_filas11 = mysqli_num_rows($consulta11);

$query12 = "SELECT situacion_actual FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND situacion_actual='Pendiente'";
$consulta12 = mysqli_query($enlace, $query12);
$num_filas12 = mysqli_num_rows($consulta12);

$query13 = "SELECT situacion_actual FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND situacion_actual='Seguimiento'";
$consulta13 = mysqli_query($enlace, $query13);
$num_filas13 = mysqli_num_rows($consulta13);

//Casos por usuario por año
$query3 = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND entrevistador LIKE '%Cecilia%'";
$consulta3 = mysqli_query($enlace, $query3);
$num_filas3 = mysqli_num_rows($consulta3);

//Entrevistas por profesional, Maria Paz
$query4 = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND entrevistador LIKE '%Maria paz%'";
$consulta4 = mysqli_query($enlace, $query4);
$num_filas4 = mysqli_num_rows($consulta4);

//Entrevistas por profesional, Gladys Mayorga
$query5 = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND entrevistador LIKE '%Gladys Mayorga%'";
$consulta5 = mysqli_query($enlace, $query5);
$num_filas5 = mysqli_num_rows($consulta5);

//Entrevistas por profesional, Marcela Varela
$query6 = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND entrevistador LIKE '%Marcela Varela%'";
$consulta6 = mysqli_query($enlace, $query6);
$num_filas6 = mysqli_num_rows($consulta6);

//Entrevistas por profesional, Victoria Miranda
$query7 = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND entrevistador LIKE '%Victoria Miranda%'";
$consulta7 = mysqli_query($enlace, $query7);
$num_filas7 = mysqli_num_rows($consulta7);

//Entrevistas por profesional, Elizabeth Vera
$query8 = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = '$year' AND entrevistador LIKE '%Elizabeth Vera%'";
$consulta8 = mysqli_query($enlace, $query8);
$num_filas8 = mysqli_num_rows($consulta8);

//Entrevistas por profesional, Inspectoria
$query9 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Inspectoria%'";
$consulta9 = mysqli_query($enlace, $query9);
$num_filas9 = mysqli_num_rows($consulta9);

$query15 = "SELECT nombre, id FROM users";
$consulta15 = mysqli_query($enlace, $query15);

echo /*html*/'
<h1 class="text-center">Totales Año: '.$year.'</h1>
<hr>
<div class="row">
<div class="col-md-6">
    <div class="panel panel-primary text-center">
        <div class="panel-heading ">
            <h3>Total Alumnos</h3>
        </div>
        <div class="panel-body">
            <p class="h1">'.$num_filas1.'</p>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-green text-center">
        <div class="panel-heading ">
            <h3>Total Entrevistas</h3>
        </div>
        <div class="panel-body">
            <p class="h1">'.$filas.'</p>
        </div>
    </div>
</div>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3>Total de entrevistas ingresadas por:</h3>
            </div>
            <div class="panel-body bg-info">';

            while($user = mysqli_fetch_array($consulta15)):
                $nombre = $user['nombre'];
                $id = $user['id'];
                echo'<li class="list-group-item">'.$nombre.'';

                    $query16 = "SELECT situacion_actual FROM ficha_alumno WHERE YEAR(fecha) = $year AND id_user = '.$id.'";
                    $consulta16 = mysqli_query($enlace, $query16);
                    $cantidad = mysqli_num_rows($consulta16);

                    echo'<span class="badge">'.$cantidad.'</span>
                    
                    </li>';
            endwhile;

            echo'<ul class="list-group">
                    
                </ul>
                <div class="panel-footer text-center">
                    <h3>Total: '.$filas.'</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 flex-card-estado">
        <div class="panel panel-success text-center card-hijo">
            <div class="panel-heading ">
                <h3>Cerradas</h3>
            </div>
            <div class="panel-body">
                <p class="h1">'.$num_filas10.'</p>
            </div>
        </div>
        <div class="panel panel-warning text-center card-hijo">
            <div class="panel-heading ">
                <h3>En proceso</h3>
            </div>
            <div class="panel-body">
                <p class="h1">'.$num_filas11.'</p>
            </div>
        </div>
        <div class="panel panel-danger text-center card-hijo">
            <div class="panel-heading ">
                <h3>Pendientes</h3>
            </div>
            <div class="panel-body">
                <p class="h1">'.$num_filas12.'</p>
            </div>
        </div>
        <div class="panel panel-info text-center card-hijo">
            <div class="panel-heading ">
                <h3>Seguimiento</h3>
            </div>
            <div class="panel-body">
                <p class="h1">'.$num_filas13.'</p>
            </div>
        </div>
    </div>
</div>



';