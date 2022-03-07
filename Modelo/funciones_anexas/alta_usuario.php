<?php 

include_once "funciones.php";

$tipo_user = $_POST['tipo_user'];
$usuario = $_POST['usuario_postulante'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$password2 = $_POST['password_verify'];

$validacion = evaluar_registro_usuario($correo,$password,$password2);

if($validacion){

  $pass_encryp = md5($password);
  $sql = "";
  switch($tipo_user){

    case 'Personal RH':
     $sql = "INSERT INTO usuario (correo, usuario, clave,rol,imagen_perfil,estado,auth) VALUES ('$correo','$usuario', '$pass_encryp','Personal RH','perfil_defecto_rh.png','Inactivo',0)";
    break;

    case 'Personal':
        $sql = "INSERT INTO usuario (correo, usuario, clave,rol,imagen_perfil,estado,auth) VALUES ('$correo','$usuario', '$pass_encryp','Personal','perfil_defecto_personal.png','Inactivo',0)";
    break;
    case 'Postulante':
      $sql = "INSERT INTO usuario (correo, usuario, clave,rol,imagen_perfil,estado,auth) VALUES ('$correo','$usuario', '$pass_encryp','Postulante','perfil_defecto_postulante.png','Inactivo',0)";

    break;
  }

  $query = Query($sql);

  if(!$query){

    echo "<script type='text/javascript'>
            Swal.fire({ icon: 'error', title: 'Error de consulta{MYSQL}..', text: 'Por favor. Revise la funcion Query y la sentencia sql!',});
          </script>";

  }else{ echo json_encode(array('success'=> 1));}


}

?>