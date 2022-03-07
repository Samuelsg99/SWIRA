<?php 

include_once "funciones.php";

// Constantes para realizar los procesos del personal
$opcion = $_POST['opcion'];
$id_personal  = $_POST['numero_imss'];

// Varibles segun el la opcion a realizar
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$analitica = (isset( $_POST['analitica'])) ? $_POST['analitica'] : '';
$puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : '';
$rfc =(isset( $_POST['RFC'])) ? $_POST['RFC'] : '';
$nss =(isset( $_POST['NSS'])) ? $_POST['NSS'] : '';
$curp = (isset($_POST['CURP'])) ? $_POST['CURP'] : '';
$emailP = (isset($_POST['correo_Personal'])) ? $_POST['correo_Personal'] : '';
$emailE = (isset($_POST['correo_empresa'])) ? $_POST['correo_empresa'] : '';;
$telefonoP = (isset($_POST['telefono_personal'])) ? $_POST['telefono_personal'] : '';
$telefonoE = (isset($_POST['telefono_empresa'])) ? $_POST['telefono_empresa'] : '';
$estado_civil = (isset($_POST['estado_civil'])) ? $_POST['estado_civil'] : '';;
$titularE = (isset($_POST['titular_emergencia'])) ? $_POST['titular_emergencia'] : '';
$contactoE = (isset($_POST['contacto_titular'])) ? $_POST['contacto_titular'] : '';
$tipo_sangre = (isset($_POST['estado_civil'])) ? $_POST['estado_civil'] : '';
$domicilio = (isset($_POST['domicilio'])) ? $_POST['domicilio'] : '';
$SUTERM = (isset($_POST['suterm'])) ? $_POST['suterm'] : '';
$alta_imss = (isset($_POST['fecha_imss'])) ? $_POST['fecha_imss'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';


switch($opcion){

	case "agregar":

	$query_insert = Query("INSERT INTO personal ( id_personal, nombre, fk_analitica, puesto, RFC,NSS, CURP, Email_Personal, Email_Empresa, Telefono_Personal, Telefono_Empresa, estado_civil,titular_emergencia, contacto_titular, tipo_sangre, domicilio, Estatus, SUTERM, alta_imss)
		VALUES('$id_personal', '$nombre', '$analitica','$puesto','$rfc','$nss','$curp','$emailP','$emailE','$telefonoP','$telefonoE','$estado_civil',
		'$titularE','$contactoE','$tipo_sangre','$domicilio','ACTIVO','$SUTERM','$alta_imss')");
	
	if ($query_insert){ echo json_encode(array('success'=> 1));

	}else{ echo json_encode(array('success'=> 0));}
	
	break;


	case 'update_info':

	$query_update = Query("UPDATE personal SET 
		nombre='$nombre',
		puesto='$puesto',
		RFC='$rfc',
		NSS='$nss',
		CURP='$curp',
		Email_Personal='$emailP',
		Email_Empresa='$emailE',
		Telefono_Personal='$telefonoP',
		Telefono_Empresa='$telefonoE',
		estado_civil='$estado_civil',
		titular_emergencia='$titularE',
		contacto_titular='$contactoE',
		tipo_sangre='$tipo_sangre',
		domicilio='$domicilio',
		SUTERM='$SUTERM',
		alta_imss='$alta_imss' WHERE id_personal='$id_personal'");

	
	if ($query_update){ echo json_encode(array('success'=> 1));

	}else{ echo json_encode(array('success'=> 0));}
	break;
	

	case 'update_estatus':

	$query = Query("UPDATE personal SET Estatus='$estatus' WHERE id_personal='$id_personal'");

	if($query){ echo json_encode(array('success'=> 0));

	}else{ echo json_encode(array('success'=> 1));}
	break;
		
}


?>