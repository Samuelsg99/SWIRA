<?php 

include_once "funciones.php";

//Variables que se pasan segun la accion

$id_postulante = (isset($_POST['id_postulante'])) ? $_POST['id_postulante'] : '';
$id_doc = (isset($_POST['id_doc'])) ? $_POST['id_doc'] : '';
$desc_doc = (isset($_POST['formato'])) ? $_POST['formato'] : '';
$tipo_doc = (isset($_POST['tipo_doc'])) ? $_POST['tipo_doc'] : '';

// Consultas para obtener los datos del documento(s)

$query = Query("SELECT * FROM documentos WHERE fk_postulante='$id_postulante' AND tipo='$tipo_doc' AND descripcion= '$desc_doc'");
$query_doc = Query("SELECT * FROM documentos WHERE id_documentacion='$id_doc'");

switch($tipo_doc){

			case 'PERSONAL':
			if (mysqli_num_rows($query) > 0){
				$datos = mysqli_fetch_array($query);

				if(empty($datos[5]) || empty($datos[6])){
					$data['case'] = 0;
					echo json_encode($data);

				}else{

					switch($desc_doc){

						case 'CV':
						$data['case'] = 1;
						$data['datos'] = $datos;
						echo json_encode($data);
						break;

						case 'LICENCIA':
						$data['case'] = 1;	
						$data['datos'] = $datos;
						echo json_encode($data);
						break;

						case 'INE':
						$data['case'] = 1;	
						$data['datos'] = $datos;
						echo json_encode($data);
						break;
					}
				}

			}else{		
				$data['case'] = 0;
				echo json_encode($data);
			}
			break;

			case 'FORMACION':
			break;

			case 'EXPERIENCIA':
			break;

			case 'ANEXOS':
			break;

			case 'DOCUMENTO':
			if (mysqli_num_rows($query_doc) > 0){
				$datos_doc = mysqli_fetch_array($query_doc);
				$data['case'] = 1;	
				$data['datos'] = $datos_doc;
				echo json_encode($data);
			}else{
				$data['case'] = 0;
				echo json_encode($data);
			}
			break;

			

		}

?>