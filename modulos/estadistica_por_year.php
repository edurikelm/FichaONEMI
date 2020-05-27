<?php 
require_once ("../configs/conexion_db.php");

$year = $_GET['q'];

//Total de fichas
$sql = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = $year ";
$consulta = mysqli_query($enlace, $sql);
$filas = mysqli_num_rows($consulta);

// Total de alumnos ingresados
$query1 = "SELECT * FROM alumnos WHERE YEAR(fecha_creacion) = $year";
$consulta1 = mysqli_query($enlace, $query1);
$num_filas1 = mysqli_num_rows($consulta1);

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


echo /*html*/'
<h1 class="text-center">Año: '.$year.'</h1>
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
            <div class="panel-body bg-info">
                <ul class="list-group">
                    <li class="list-group-item">
                        Cecilia Castro <span class="badge"><?php echo $num_filas3 ?></span>
                    </li>
                    <li class="list-group-item">
                        María Paz Sepúlveda <span class="badge"><?php echo $num_filas4 ?></span>
                    </li>
                    <li class="list-group-item">
                        Gladys Mayorga <span class="badge"><?php echo $num_filas5 ?></span>
                    </li>
                    <li class="list-group-item">
                        Marcela Varela <span class="badge"><?php echo $num_filas6 ?></span>
                    </li>
                    <li class="list-group-item">
                        Victoria Miranda <span class="badge"><?php echo $num_filas7 ?></span>
                    </li>
                    <li class="list-group-item">
                        Elizabeth Vera <span class="badge"><?php echo $num_filas8 ?></span>
                    </li>
                    <li class="list-group-item">
                        Inspectoría <span class="badge"><?php echo $num_filas9 ?></span>
                    </li>
                </ul>
                <div class="panel-footer text-center">
                    <h3>Total:<?php echo $num_filas3 + $num_filas4 + $num_filas5 + $num_filas6 +$num_filas7 + $num_filas8 + $num_filas9?>
                    </h3>
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