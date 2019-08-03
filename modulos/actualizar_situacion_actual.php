<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn_actualizar_actual'])):
    $actual = mysqli_escape_string($enlace, $_POST['actual']);

    $id_ficha = mysqli_escape_string($enlace, $_POST['id']);
    $id_alumno = mysqli_escape_string($enlace, $_POST['id_alumno']);
    

endif;

    $sql = "UPDATE ficha_alumno SET situacion_actual = '$actual' WHERE id_ficha = '$id_ficha' AND id_alumno = '$id_alumno'";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/ver_ficha.php?id='.$id_alumno);
        
    else:
        header('Location: ../pages/ver_ficha.php?error');
    endif;

