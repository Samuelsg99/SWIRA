<?php
include "./../conexion.php";

session_start();

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

	$update = mysqli_query($conexion,"UPDATE usuario SET  clave ='$pass_encryp' WHERE idusuario ='{$_SESSION['usuario']['idUser']}'");
	echo json_encode(array('success'=> 2));
	session_destroy();
}


?>
