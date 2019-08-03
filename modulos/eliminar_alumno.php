<?php
session_start();
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-delete'])):

    $id = mysqli_escape_string($enlace, $_POST['id']);
    

endif;

    $sql1 = "DELETE FROM ficha_alumno WHERE id_alumno = '$id'";
    $sql2 = "DELETE FROM alumnos WHERE id = '$id'";



    if(mysqli_query($enlace, $sql1) && mysqli_query($enlace, $sql2)):
      
        header('Location: ../pages/lista_alumno.php?successo');
        
    else:
        $_SESSION['mensaje'] = "Error al intentar eliminar";
        header('Location: ../pages/lista_alumno.php?error');
    endif;

