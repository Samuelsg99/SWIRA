<?php 

include_once "./../conexion.php";

$id_personal = $_POST['numero_imss'];
$nombre = $_POST['nombre'];
$analitica = $_POST['analitica'];
$puesto = $_POST['puesto'];
$rfc = $_POST['RFC'];
$nss = $_POST['NSS'];
$curp = $_POST['CURP'];
$emailP = $_POST['correo_Personal'];
$emailE = $_POST['correo_empresa'];
$telefonoP = $_POST['telefono_personal'];
$telefonoE = $_POST['telefono_empresa'];
$estado_civil = $_POST['estado_civil'];
$titularE = $_POST['titular_emergencia'];
$contactoE = $_POST['contacto_titular'];
$tipo_sangre = $_POST['estado_civil'];
$domicilio = $_POST['domicilio'];
$SUTERM = $_POST['suterm'];
$alta_imss = $_POST['fecha_imss'];


	$query = mysqli_query($conexion,"INSERT INTO personal (id_personal, nombre, fk_analitica, puesto, RFC, NSS, CURP, Email_Personal, Email_Empresa, Telefono_Personal,Telefono_Empresa, estado_civil, titular_emergencia, contacto_titular, tipo_sangre, domicilio, Estatus, SUTERM, alta_imss) VALUES ('$id_personal','$nombre','$analitica','$puesto','$rfc','$nss','$curp','$emailP','$emailE','$telefonoP','$telefonoE','$estado_civil','$titularE','$contactoE','$tipo_sangre','$domicilio','ACTIVO','$SUTERM', '$alta_imss')");
	
	
	if ($query){
	
		echo json_encode(array('success'=> 1));

	}else { echo json_encode(array('success'=> 0)); }


?>