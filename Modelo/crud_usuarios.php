<?php 

include_once "funciones.php";
//Actualizacion estado oferta
$opcion = $_POST['opcion'];
$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';
session_start();

switch($opcion){

//caso alta de usuario
	case 'alta':
	$tipo_user = $_POST['tipo_user'];
	$usuario = $_POST['usuario'];
	$correo = $_POST['correo'];
	$password = $_POST['password'];
	$password2 = $_POST['password_verify'];
	$validacion = evaluar_datos_usuario($correo,$password,$password2);
	$datos = user($correo);

	
	if($datos == true){
		
		echo json_encode(array('success' => 5));

	}elseif($validacion){

		$sql = "";
		$pass_encryp = md5($password);
		
		switch($tipo_user){

			case 'Administrador':
			$sql = "INSERT INTO usuario (correo, usuario, clave,rol,imagen_perfil,estado,auth) VALUES ('$correo','$usuario', '$pass_encryp','Administrador','perfil_defecto_rh.png','Inactivo',0)";
			break;

			case 'Personal':
			$sql = "INSERT INTO usuario (correo, usuario, clave,rol,imagen_perfil,estado,auth) VALUES ('$correo','$usuario', '$pass_encryp','Personal','perfil_defecto_personal.png','Inactivo',0)";
			break;
			case 'Postulante':
			$sql = "INSERT INTO usuario (correo, usuario, clave,rol,imagen_perfil,estado,auth) VALUES ('$correo','$usuario', '$pass_encryp','Postulante','perfil_defecto_postulante.png','Inactivo',0)";
			break;
		}

		if(Query($sql)){
			echo json_encode(array('success' => 0));

		}else{ echo json_encode(array('success'=> 1));} 
	}
	break;


//Caso cambiar de contraseña
		case 'change_password':

		$password_a = $_POST['password_actual'];
		$password_c  = $_POST['password_nueva'];
		$password_n = $_POST['password_confir'];
		$pass_encryp = MD5($password_c);

		if(empty($password_a) || empty($password_c) || empty($password_n)){

			echo json_encode(array('success'=> 0));

		}elseif (MD5($password_a) != $_SESSION['usuario']['clave']) {

			echo json_encode(array('success'=> 1));

		} elseif(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$password_c) == 0){

			echo json_encode(array('success'=> 4));

		}elseif($password_n != $password_c ){

			echo json_encode(array('success'=> 3));

		}else{

			$update = Query("UPDATE usuario SET  clave ='$pass_encryp' WHERE idusuario ='{$_SESSION['usuario']['idUser']}'");
			echo json_encode(array('success'=> 2));
			session_destroy();
		}
		break;

	//Caso eliminar usuario
	case 'delete':

	$query = Query("DELETE FROM usuario WHERE idusuario='$id_usuario'");

	if(!$query){ echo json_encode(array('success'=> 1));

	}else {echo json_encode(array('success'=> 2));}
	break;


//caso actualizar usaurio
	case 'update':

	$usuario = $_POST['usuario'];
	$correo  = $_POST['gmail'];
	$datos = datos_usuario($id_usuario);

	if ($datos['usuario'] == $usuario  && $datos['correo']== $correo){

		echo json_encode(array('success'=> 2));

	}else if (preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/",$correo) == 0){

		echo json_encode(array('success'=> 3));

	}else{

		$update = Query("UPDATE usuario SET  usuario ='$usuario', correo = '$correo'  WHERE idusuario ='$id_usuario'");

		if(!$update){

			echo json_encode(array('success'=> 0));

		}else{
			echo json_encode(array('success'=> 1));
			session_destroy();
		}	
	}
break;

//caso actualizar foto de perfil del usuario

case 'update_photo':
$temp = $_FILES['photo']['tmp_name'];
$imagenValida = false;
$codigo_imagen = generar_codigo_imagen($_SESSION['usuario']['idUser'],$_FILES['photo']['name'],'Administrador');
$dir_imagen = '../images/perfiles/users/'.$codigo_imagen;

	if (move_uploaded_file($temp, $dir_imagen)) {
	$imagenValida = true;
}

if($imagenValida){

	$url_nombre = 'users/'.$codigo_imagen;

	$update = Query("UPDATE usuario SET imagen_perfil = '$url_nombre' WHERE idusuario = {$_SESSION['usuario']['idUser']}");

	if(!$update){

		echo json_encode(array('success'=> 2));

	}else{ echo json_encode(array('success'=> 1)); }
}
break;

}


?>