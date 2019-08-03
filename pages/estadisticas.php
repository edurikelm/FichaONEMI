<?php 
include ("../configs/conexion_db.php"); 
include('includes/interfaz.php');

// Total de alumnos ingresados
$query1 = "SELECT * FROM alumnos";
$consulta1 = mysqli_query($enlace, $query1);
$num_filas1 = mysqli_num_rows($consulta1);

// Total de entrevistas por alumno
$query2 = "SELECT * FROM ficha_alumno";
$consulta2 = mysqli_query($enlace, $query2);
$num_filas2 = mysqli_num_rows($consulta2);

//Entrevistas por profesional, Cecilia
$query3 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Cecilia%'";
$consulta3 = mysqli_query($enlace, $query3);
$num_filas3 = mysqli_num_rows($consulta3);

//Entrevistas por profesional, Maria Paz
$query4 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Maria paz%'";
$consulta4 = mysqli_query($enlace, $query4);
$num_filas4 = mysqli_num_rows($consulta4);

//Entrevistas por profesional, Gladys Mayorga
$query5 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Gladys Mayorga%'";
$consulta5 = mysqli_query($enlace, $query5);
$num_filas5 = mysqli_num_rows($consulta5);

//Entrevistas por profesional, Marcela Varela
$query6 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Marcela Varela%'";
$consulta6 = mysqli_query($enlace, $query6);
$num_filas6 = mysqli_num_rows($consulta6);

//Entrevistas por profesional, Victoria Miranda
$query7 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Victoria Miranda%'";
$consulta7 = mysqli_query($enlace, $query7);
$num_filas7 = mysqli_num_rows($consulta7);

//Entrevistas por profesional, Elizabeth Vera
$query8 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Elizabeth Vera%'";
$consulta8 = mysqli_query($enlace, $query8);
$num_filas8 = mysqli_num_rows($consulta8);

//Entrevistas por profesional, Inspectoria
$query9 = "SELECT * FROM ficha_alumno WHERE entrevistador LIKE '%Inspectoria%'";
$consulta9 = mysqli_query($enlace, $query9);
$num_filas9 = mysqli_num_rows($consulta9);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Estadísticas de los alumnos</h1>
            <hr>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary text-center">
                                <div class="panel-heading ">
                                    <h3>Total Alumnos</h3>
                                </div>
                                <div class="panel-body">
                                    <p class="h1"><?php echo $num_filas1 ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-green text-center">
                                <div class="panel-heading ">
                                    <h3>Total Entrevistas</h3>
                                </div>
                                <div class="panel-body">
                                    <p class="h1"><?php echo $num_filas2 ?></p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>