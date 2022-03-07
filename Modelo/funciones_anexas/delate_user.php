<?php 

include_once "funciones.php";

if (!empty($_GET['id_user'])){

	$query = Query("DELETE FROM usuario WHERE idusuario='{$_GET['id_user']}'");

	if(!$query){

		echo json_encode(array('success'=> 1));

	}else {echo json_encode(array('success'=> 2));}


}else{ echo json_encode(array('success'=> 0)); }


?>