<?php
require '../configs/conexion_db.php';

if(isset($_POST["agregar_user"])){

	$nombre = $_POST["nombre"];
	$username = $_POST["username"];
  $password =$_POST["password"];
  // $password2 =$_POST["password2"];
  $admin =$_POST["chk_admin"];

  if ($admin) {
    $check = 1;
  }else{
    $check = 0;
  }

  
	
    }
    // echo $nombre;
    // echo $username;
    // echo $password;
    echo $check;

    $sql="INSERT INTO users (nombre, username, password, privilegio) VALUES('".$nombre."','".$username."','".$password."','".$check."')";
    
  
    if(mysqli_query($enlace, $sql)){
      header('Location: ../pages/lista_usuarios.php?successo'); 
      // echo 'correcto =)';
      // echo $sql;
    }
    else{
      header('Location: ../pages/lista_usuarios.php?error');
    }

	
	