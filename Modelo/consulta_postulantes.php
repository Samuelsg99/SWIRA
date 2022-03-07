
<?php

include_once './../conexion.php';

$result = mysqli_query($conexion,"SELECT s.id_solicitud,p.nombre_completo,p.imagen_perfil,o.vacante, p.perfil, s.fecha,s.estatus FROM ofertas o 
	INNER JOIN solicitud s ON o.id_oferta = s.fk_vancante 
	INNER JOIN postulantes p ON s.fk_postulante = p.id_postulante");

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
