<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-editar'])):
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

    $id = mysqli_escape_string($enlace, $_POST['id']);
    

endif;

    $sql = "UPDATE alumnos SET nombres = '$nombres', apellidos = '$apellidos', rut = '$rut', 
    direccion = '$direccion', fecha_nacimiento = '$nacimiento', telefono = '$telefono', 
    curso = '$curso', salud = '$salud', vive = '$vive', apodrado1 = '$apodrado1',
    apodrado2 = '$apodrado2', pie = '$pie', social = '$social', tipo = '$tipo', repitencia = '$repitencia', diagnostico = '$diagnostico' WHERE id = '$id'";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/lista_alumno.php?successo');
        
    else:
        header('Location: ../pages/lista_alumno.php?error');
    endif;

