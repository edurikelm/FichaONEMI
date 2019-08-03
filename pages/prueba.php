<?php 
 include ("../configs/conexion_db.php");

$query2 = "SELECT id_ficha, id_alumno FROM ficha_alumno WHERE id_alumno = 4";
$consulta2 = mysqli_query($enlace, $query2);
$num_filas2 = mysqli_num_rows($consulta2);
echo $num_filas2;
