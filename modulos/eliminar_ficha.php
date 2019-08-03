<?php
session_start();
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-delete'])):

    $id = mysqli_escape_string($enlace, $_POST['id']);
    $id_alumno = mysqli_escape_string($enlace, $_POST['id_alumno']);
    

endif;

    $sql = "DELETE FROM ficha_alumno WHERE id_ficha = '$id'";



    if(mysqli_query($enlace, $sql)):
       
        header('Location: ../pages/ver_ficha.php?id='.$id_alumno);
        
    else:
        $_SESSION['mensaje'] = "Error al intentar eliminar";
        header('Location: ../pages/lista_alumno.php?error');
    endif;
