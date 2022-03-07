<?php 
include_once "funciones.php";
//Actualizacion estado oferta
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id_oferta'])) ? $_POST['id_oferta'] : '';

switch($opcion){

	case 'estatus':
	$estado = $_POST['estado'];
	$sql = Query("UPDATE ofertas SET estatus='$estado' WHERE id_oferta='$id'");
	if($sql){ 
		echo json_encode(array('success'=> 0));
	}else{ echo json_encode(array('success'=> 1));}
	break;

	case 'eliminar':
	$sql = Query("DELETE FROM ofertas WHERE id_oferta='$id'");

	if($sql){ 
		echo json_encode(array('success'=> 0));

	}else{ echo json_encode(array('success'=> 1));}	
	break;

	case 'update':

	$vacante = $_POST['vacante'];
	$perfil = $_POST['perfil'];
	$descrip = $_POST['descripcion'];
	$detalles = $_POST['detalles'];

	$sql = Query("UPDATE ofertas SET vacante='$vacante',perfil='$perfil',descripcion='$descrip',detalles='$detalles' WHERE id_oferta='$id'");
	if($sql){ 
		echo json_encode(array('success'=> 0));
	}else{ echo json_encode(array('success'=> 1));}	
	break;

	case 'agregar':
	$vacante = $_POST['vacante'];
	$perfil = $_POST['perfil'];
	$descrip = $_POST['descripcion'];
	$detalles = $_POST['detalles'];
	$fecha = date("Y-m-d");

	$sql = Query("INSERT INTO ofertas (vacante,perfil,descripcion,detalles,fecha_emision,estatus)
		VALUES('$vacante','$perfil','$descrip','$detalles','$fecha','Activo')");

	if($sql){echo json_encode(array('success'=> 0)); 
	}else{ echo json_encode(array('success'=> 1));}	
	break;
}

?>