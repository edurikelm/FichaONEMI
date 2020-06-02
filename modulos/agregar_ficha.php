<?php
require ('../configs/conexion_db.php');
if(isset($_POST["enviar"])){

	// $entrevistador = mysqli_escape_string($enlace, $_POST['nombre1']).', '.mysqli_escape_string($enlace, $_POST['nombre2']).', '.mysqli_escape_string($enlace, $_POST['nombre3']).', '.mysqli_escape_string($enlace, $_POST['nombre4']).', '.mysqli_escape_string($enlace, $_POST['nombre5']);

	$entrevistador1 = mysqli_escape_string($enlace, $_POST['nombre1']);
	$entrevistador2 = mysqli_escape_string($enlace, $_POST['nombre2']);
	$entrevistador3 = mysqli_escape_string($enlace, $_POST['nombre3']);
	$entrevistador4 = mysqli_escape_string($enlace, $_POST['nombre4']);
	$entrevistador5 = mysqli_escape_string($enlace, $_POST['nombre5']);
	$otro_entrevistador = mysqli_escape_string($enlace, $_POST['otro_entrevistador']);
	$entrevistado = mysqli_escape_string($enlace, $_POST['entrevistado']);
	$motivo = mysqli_escape_string($enlace, $_POST['motivo']);
	$acuerdos = mysqli_escape_string($enlace, $_POST['acuerdos']);
	$obs = mysqli_escape_string($enlace, $_POST['observaciones']);	
	$actual = mysqli_escape_string($enlace, $_POST['actual']);	
	$fecha_entrevista = mysqli_escape_string($enlace, $_POST['fecha_entrevista']);	
	$hora_entrevista = mysqli_escape_string($enlace, $_POST['hora_entrevista']);	

	$id_user = mysqli_escape_string($enlace, $_POST['id_user']);
    $numFicha = mysqli_escape_string($enlace, $_POST['ficha_numero']);
    $idAlumno = mysqli_escape_string($enlace, $_POST['numero']);
    $bucle_ficha = mysqli_escape_string($enlace, $_POST['bucle_ficha']);

	}

	// echo $otro_entrevistador;
	// echo $entrevistado;
	// echo $motivo;
	// echo $acuerdos;
	// echo $obs;
	// echo $actual;
	// echo $fecha_entrevista;
	// echo $hora_entrevista;
	// echo $numFicha;
	// echo $idAlumno;
	// echo $bucle_ficha;
	// die;

	if ($bucle_ficha == 1) {

		$entrevistadores = $entrevistador1;
		// echo $entrevistadores;
	
	} elseif ($bucle_ficha == 2) {
	
		$entrevistadores = $entrevistador1.', '.$entrevistador2;
		// echo $entrevistadores;
	
	} elseif ($bucle_ficha == 3) {
		
		$entrevistadores = $entrevistador1.', '.$entrevistador2.', '.$entrevistador3;
		// echo $entrevistadores;
	
	}elseif ($bucle_ficha == 4) {
		
		$entrevistadores = $entrevistador1.', '.$entrevistador2.', '.$entrevistador3.', '.$entrevistador4; 
		// echo $entrevistadores;
	
	}elseif ($bucle_ficha == 5) {
		
		$entrevistadores = $entrevistador1.', '.$entrevistador2.', '.$entrevistador3.', '.$entrevistador4.', '.$entrevistador5;  
		// echo $entrevistadores;
		
	}else{
		echo 'error';
	}

	// echo $bucle_ficha;
	// echo $entrevistador;

	$sql = ("INSERT INTO ficha_alumno (id_user,id_alumno,numFicha,entrevistador,otro_entrevistador,entrevistado,motivo,acuerdos,observaciones,situacion_actual,fecha_entrevista,hora_entrevista) VALUES('".$id_user."','".$idAlumno."','".$numFicha."','".$entrevistadores."','".$otro_entrevistador."','".$entrevistado."','".$motivo."','".$acuerdos."','".$obs."','".$actual."','".$fecha_entrevista."','".$hora_entrevista."')");

	if(mysqli_query($enlace, $sql)){
		header('Location: ../pages/ver_ficha.php?id='.$idAlumno); 
		echo 'correcto =)';
		echo $sql;
	}
        

    else{
		// header('Location: ../pages/pantalla_error.php'); 
		echo 'Error';

		
	}
        
   

 ?>   