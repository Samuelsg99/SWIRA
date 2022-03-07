<?php
include "./../conexion.php";
session_start();

if(empty( $_FILES['photo']['tmp_name'])){

   echo json_encode(array('success'=> 0)); 

}else{


  $dir_subida = '../images/perfiles/';
  $imagenRuta = $dir_subida . basename($_FILES['photo']['name']);
  $imagenNombre = $_FILES['photo']['name'];
  $imagenValida = false;

  if (move_uploaded_file($_FILES['photo']['tmp_name'], $imagenRuta)) {
    $imagenValida = true;
 }

 if($imagenValida) {

   $update = mysqli_query($conexion,"UPDATE usuario SET imagen_perfil ='$imagenNombre' WHERE idusuario ='{$_SESSION['usuario']['idUser']}'");
  
   if(!$update){

    echo json_encode(array('success'=> 2));
    
 }else{

    echo json_encode(array('success'=> 1));
 }


}

}




  
  


?>
