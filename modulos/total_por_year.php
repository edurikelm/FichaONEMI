<?php

require_once ("../configs/conexion_db.php");

$current_year = $_GET['q'];
$id = $_GET['id'];

$sql = "SELECT * FROM ficha_alumno WHERE YEAR(fecha) = $current_year AND id_alumno = $id" ;
$resultado = mysqli_query($enlace, $sql);
$num_row = mysqli_num_rows($resultado);

echo '
    <h4>Total año <strong>'.$current_year.'</strong>: <strong>'.$num_row.'</strong></h4>  

';