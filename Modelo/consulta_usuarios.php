<?php

include_once './../conexion.php';

$result = mysqli_query($conexion,"SELECT idusuario, usuario, correo, rol FROM usuario WHERE rol !='Postulante'");

if(!$result){

	die("Error");

}else{
	$array["data"] = [];

	while($data = mysqli_fetch_assoc($result)){
		$arreglo["data"][] = $data;
	}

	echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
	mysqli_free_result($result);
	mysqli_close($conexion);


}





?>		
