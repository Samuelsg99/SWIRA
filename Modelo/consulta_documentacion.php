<?php 

include_once "./../conexion.php";

$result = mysqli_query($conexion,"SELECT 
d.id_documentacion,
d.fk_postulante,
p.nombre_completo,
d.tipo,
d.descripcion,
d.fecha_adjunto,
d.documento 
FROM documentos d INNER JOIN postulantes p ON p.id_postulante = d.fk_postulante");

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

