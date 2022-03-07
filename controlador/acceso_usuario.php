<?php

  include "../Modelo/funciones.php";

  $correo = $_POST['correo'];
  $password = $_POST['password'];

  $validacion = REGEX($correo,$password);

  if($validacion){

  $dato = login($correo);

  if($dato == false){

    echo json_encode(array('success'=> 4));

  }else{
    session_start();
    $_SESSION['usuario'] = array();
    $_SESSION['usuario']['idUser'] = $dato['idusuario'];
    $_SESSION['usuario']['user'] = $dato['usuario'];
    $_SESSION['usuario']['correo'] = $dato['correo'];
    $_SESSION['usuario']['clave'] = $dato['clave'];
    $_SESSION['usuario']['rol_name'] = $dato['rol'];
    $_SESSION['usuario']['auth'] = $dato['auth'];
    apdate_estadoU('Activo',$dato['idusuario']);

    switch ($_SESSION['usuario']['rol_name']){

      case 'Administrador': 
      echo json_encode(array('success'=> 0));
      $_SESSION['usuario']['active_admin'] = true;
      break;

      case 'Personal Revergy':
      echo json_encode(array('success'=> 0));
      $_SESSION['usuario']['active_Personal'] = true;
      break;

      case 'Postulante': 
      echo json_encode(array('success'=> 1));
      $_SESSION['usuario']['active_post'] = true;
      break;
    }
  }
}

  

?>