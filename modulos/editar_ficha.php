<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST["enviar"])){

    // $entrevistador = mysqli_escape_string($enlace, $_POST['nombre1']).', '.mysqli_escape_string($enlace, $_POST['nombre2']).', '.mysqli_escape_string($enlace, $_POST['nombre3']).', '.mysqli_escape_string($enlace, $_POST['nombre4']).', '.mysqli_escape_string($enlace, $_POST['nombre5']);
    $entrevistador = mysqli_escape_string($enlace, $_POST['entrevistador']);
	$entrevistador1 = mysqli_escape_string($enlace, $_POST['nombre1']);
	$otro_entrevistador = mysqli_escape_string($enlace, $_POST['otro_entrevistador']);
	$entrevistado = mysqli_escape_string($enlace, $_POST['entrevistado']);
	$motivo = mysqli_escape_string($enlace, $_POST['motivo']);
	$acuerdos = mysqli_escape_string($enlace, $_POST['acuerdos']);
	$obs = mysqli_escape_string($enlace, $_POST['observaciones']);	
	$actual = mysqli_escape_string($enlace, $_POST['actual']);
	$fecha_entrevista = mysqli_escape_string($enlace, $_POST['fecha_entrevista']);	
	$hora_entrevista = mysqli_escape_string($enlace, $_POST['hora_entrevista']);	

    $numFicha = mysqli_escape_string($enlace, $_POST['ficha_numero']);
    $idAlumno = mysqli_escape_string($enlace, $_POST['numero']);
	$bucle_ficha = mysqli_escape_string($enlace, $_POST['bucle_ficha']);
	$id_user = mysqli_escape_string($enlace, $_POST['id_user']);
	
}

	if ($bucle_ficha == 1 && !$entrevistador1 == "") {

		$entrevistadores = $entrevistador.', '.$entrevistador1;
		// echo $entrevistadores;
	
	}elseif ($bucle_ficha == 1 && $entrevistador1 == "") {

		$entrevistadores = $entrevistador;
		// echo $entrevistadores;
		
	}else{
		echo '<script language="javascript">alert("Error");</script>';
	}

    $sql = "UPDATE ficha_alumno SET id_user = '$id_user', entrevistador = '$entrevistadores', otro_entrevistador = '$otro_entrevistador', entrevistado = '$entrevistado', motivo = '$motivo', 
    acuerdos = '$acuerdos', observaciones = '$obs', situacion_actual = '$actual', fecha_entrevista = '$fecha_entrevista', hora_entrevista = '$hora_entrevista' WHERE numFicha = '$numFicha' AND id_alumno = '$idAlumno'";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/ver_ficha.php?id='.$idAlumno);
        
    else:
        header('Location: ../pages/ver_ficha.php?error');
    endif;

