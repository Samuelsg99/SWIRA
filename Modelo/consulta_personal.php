<?php

include_once './../conexion.php';

$result = mysqli_query($conexion,"SELECT 
	B.id_personal, 
	B.nombre, 
	A.analitica, 
	A.id_analitica,
	B.puesto,
	B.RFC, 
	B.NSS, 
	B.CURP, 
	B.Email_Personal,
	B.Email_Empresa, 
	B.Telefono_Personal,
	B.Telefono_Empresa,
	B.estado_civil,
	B.titular_emergencia,
	B.contacto_titular, 
	B.tipo_sangre, 
	B.domicilio,
	B.SUTERM,
	B.alta_imss,
	B.Estatus

	FROM personal B INNER JOIN analiticas A ON B.fk_analitica = A.id_analitica WHERE B.fk_analitica");

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
