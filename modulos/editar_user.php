<?php 
require_once ("../configs/conexion_db.php");

$id = $_GET['id'];

if(isset($_POST['editar_user'])):

    $nombre = mysqli_escape_string($enlace, $_POST['nombre']);
    $username = mysqli_escape_string($enlace, $_POST['username']);
    $password = mysqli_escape_string($enlace, $_POST['password']);
    $admin = mysqli_escape_string($enlace, $_POST['admin']);

    
endif;

$sql = "UPDATE users SET nombre='$nombre', username='$username', password='$password', privilegio='$admin' WHERE id=$id";

if(mysqli_query($enlace, $sql)):
    header('Location: ../pages/lista_usuarios.php?successo');
    // echo 'Se actualizo bien';  
    
else:
    header('Location: ../pages/lista_usuarios.php?error');
    // echo 'Error';

endif;