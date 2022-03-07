<?php 

	include_once "funciones.php";
	session_start();

	$nombre = $_POST['nombre_completo'];
	$sexo = $_POST['sexo'];
	$estado_civil = $_POST['estado_civil'];
	$edad = $_POST['edad'];
	$perfil = $_POST['perfil'];
	$ultimo_trabajo = $_POST['ultimo_puesto'];
	$telefono= $_POST['telefono'];

	$query = Query("INSERT INTO postulantes (fk_usuario, nombre_completo, perfil, sexo,estado_civil, edad, telefono) 
		VALUES ('{$_SESSION['usuario']['idUser']}','$nombre','$perfil','$sexo','$estado_civil','$edad','$telefono')");
	

	if ($query && autentificar_postulante($_SESSION['usuario']['idUser'],1)){
		
		echo json_encode(array('success'=> 1));

	}else {

		echo json_encode(array('success'=> 0));
	}


?>