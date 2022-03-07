<?php

include "../Modelo/funciones.php";

session_start();
apdate_estadoU('Inactivo',$_SESSION['usuario']['idUser']);
session_destroy();
header('location: ../index.php');


?>
