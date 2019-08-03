<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-crear'])):
    $rut = mysqli_escape_string($enlace, $_POST['rut']);
    $nombres = mysqli_escape_string($enlace, $_POST['nombres']);
    $apellidos = mysqli_escape_string($enlace, $_POST['apellidos']);
    $nacimiento = mysqli_escape_string($enlace, $_POST['fecha_nacimiento']);
    $direccion = mysqli_escape_string($enlace, $_POST['direccion']);
    $salud = mysqli_escape_string($enlace, $_POST['salud']);
    $vive = mysqli_escape_string($enlace, $_POST['vive']);
    $apodrado1 = mysqli_escape_string($enlace, $_POST['apodrado1']);
    $apodrado2 = mysqli_escape_string($enlace, $_POST['apodrado2']);
    $telefono = mysqli_escape_string($enlace, $_POST['telefono']);
    $pie = mysqli_escape_string($enlace, $_POST['pie']);
    $social = mysqli_escape_string($enlace, $_POST['social']);
    $tipo = mysqli_escape_string($enlace, $_POST['tipo']);
    $curso = mysqli_escape_string($enlace, $_POST['curso']);
    $repitencia = mysqli_escape_string($enlace, $_POST['repitencia']);
    $diagnostico = mysqli_escape_string($enlace, $_POST['diagnostico']);


endif;

    $sql = "INSERT INTO alumnos (nombres, apellidos, rut, direccion, fecha_nacimiento, telefono, curso, salud, vive, apodrado1, apodrado2, pie, social, tipo, repitencia, diagnostico) 
    VALUES ('".$nombres."', '".$apellidos."', '".$rut."', '".$direccion."', '".$nacimiento."', '".$telefono."', '".$curso."', '".$salud."', '".$vive."', '".$apodrado1."', '".$apodrado2."', '".$pie."', '".$social."', '".$tipo."', '".$repitencia."', '".$diagnostico."' )";

    if(mysqli_query($enlace, $sql)):
        $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Alumno agregado con exito!</div>';
        header('Location: ../pages/lista_alumno.php?success');
    else:
        //header('Location: ../pages/pantalla_error_alumno.php');
        echo $sql;
        echo "error";
    endif;

    

