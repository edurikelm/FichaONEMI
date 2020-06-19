<?php

require_once ("../configs/conexion_db.php");

if(isset($_POST['delete_user'])):

    $id = mysqli_escape_string($enlace, $_POST['id']);

endif;

$sql = "DELETE FROM users WHERE id=$id";


if(mysqli_query($enlace, $sql)){

    header('Location: ../pages/lista_usuarios.php?successo');

}else{
    
    header('Location: ../pages/lista_usuarios.php?error');
    
}

