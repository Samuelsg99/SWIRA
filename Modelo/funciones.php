<?php
date_default_timezone_set('America/Mexico_City');

    function fecha(){
        
        $mes = array("","Enero",
                      "Febrero",
                      "Marzo",
                      "Abril",
                      "Mayo",
                      "Junio",
                      "Julio",
                      "Agosto",
                      "Septiembre",
                      "Octubre",
                      "Noviembre",
                      "Diciembre");
        return date('d')." de ". $mes[date('n')] . " de " . date('Y');
    }

//Funcion query consulta y conexion

function Query($query){

    include "./../conexion.php";
    $sql = mysqli_query($conexion,$query);

    if(!$sql){ echo "Error faltal en {mysqli}, Revise la conexion o la sintaxis de la consulta!";

    }else{ return $sql;}
    
    }

    // Funcion Iniciar session

function login($correo){

    $consulta = Query("SELECT idusuario, clave, correo, usuario,rol,estado,auth FROM usuario  WHERE correo = '$correo'");

    if(mysqli_num_rows($consulta)> 0){
        $datos_user = mysqli_fetch_assoc($consulta);
        return $datos_user;

    }else{ return false;}

}

function user($correo){

    $consulta = Query("SELECT * FROM usuario  WHERE correo = '$correo'");

    if(mysqli_num_rows($consulta)> 0){ 

        return true;

    }else{ return false;}

}

function REGEX($correo,$password){

    if(preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/",$correo) == 0){
        echo json_encode(array('success'=> 2));

        //comprueba que el password sea correcto (REGEX)
    }else if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$password) == 0){
        echo json_encode(array('success'=> 3));

}else{ return true;}

}


//funcion para evaluar datos del usuario

function evaluar_datos_usuario($correo,$password,$password2){

    //Verifica que el correo sea correcto (REGEX)
    if(preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/",$correo) == 0){
        echo json_encode(array('success'=> 2));

        //comprueba que el password sea correcto (REGEX)
     }else if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$password) == 0){
        echo json_encode(array('success'=> 3));

    //COMPRUEBA QUE AMBOS PASSWORD INGRESADOS SEAN IGUALES
    }else if($password != $password2){ echo json_encode(array('success'=> 4));

    //Todo correcto se envia un verdadero, es decir paso todas las condiciones del REGEX
        }else{ return true; }

    }


    function acciones_perfil($caso,$iduser){

        switch($caso){

            case 'datos_personal':
            $consulta = Query("SELECT p.id_personal,p.nombre, a.analitica, p.puesto, p.RFC, p.Estatus,u.correo,u.imagen_perfil,u.auth FROM personal p 
                INNER JOIN admins AS ad ON ad.fk_personal = p.id_personal
                INNER JOIN usuario AS u ON u.idusuario = ad.fk_usuario
                INNER JOIN analiticas AS a ON a.id_analitica = p.fk_analitica WHERE ad.fk_usuario = '$iduser'");
            $result = mysqli_num_rows($consulta);

            if ($result > 0){

                $datos = mysqli_fetch_assoc($consulta);
                return $datos;
                }else { echo "
                <script type='text/javascript'> 
                Swal.fire({  icon: 'error', title: 'Usuario sin datos..', text: 'El usuario no cuanta con registros vuelva a iniciar session!', });   
                </script>";}
                break;

                }
            }

function estatus($estatus_actual){

    if ($estatus_actual == 'Activo'){
        echo "<span class='badge-pill badge-success'>Activo</span>";
    }elseif ($estatus_actual =='Inactivo'){
     echo  "<span class='badge-pill badge-danger'>Inactivo</span>";
    }elseif (empty($estatus_actual) || $estatus_actual = 0 || $estatus_actual ='NA'){echo "<span class='badge-pill badge-secondary'>Desconocido</span>";}
}

function consulta_ofertas(){

    $consulta = Query("SELECT * FROM ofertas");
    return $consulta;
}


function consulta_oferta($id){

   $sql = Query("SELECT * from ofertas where id_oferta='$id'");
   if(mysqli_num_rows($sql) > 0){
    
    $datos = mysqli_fetch_assoc($sql);
    return $datos;

   } else{ echo "<script type='text/javascript'> 
            Swal.fire({ icon: 'error', title: 'Sin registros', text: 'Esta oferta no tiene registros o esta vacio!',});   
            </script>";}

}

function solcitudes_postulantes(){

    $consulta = Query("SELECT p.id_postulante,p.nombre_completo,u.imagen_perfil,o.vacante, p.perfil, s.fecha_postulacion,s.estado_postulacion, s.id_solicitud FROM ofertas o INNER JOIN postula_oferta s ON o.id_oferta = s.fk_vancante INNER JOIN postulantes p ON s.fk_postulante = p.id_postulante INNER JOIN usuario u ON u.idusuario = p.fk_usuario; ");
    return $consulta;
}
    
    function total_post_oferta($id_vacante){

       $sql =  Query("SELECT count(*) FROM postula_oferta WHERE fk_vancante ='$id_vacante'");
        if (mysqli_num_rows($sql) > 0) {

            $cantidad = mysqli_fetch_array($sql);
            return $cantidad;
        }
    }

function estado_solicitud($id){


    $query = Query("SELECT estado_postulacion FROM postula_oferta WHERE fk_postulante ='$id'");
    if(mysqli_num_rows($query) > 0){ 
        $estado = mysqli_fetch_assoc($query);

    switch($estado['estado_postulacion']){

        case 'Pendiente':
        echo "<span class='badge badge-pill badge-dark text-labels3'>Pendiente</span>";
        break;
        case 'Revisado':
        echo "<span class='badge rounded-pill bg-warning text-labels3'>Revisado</span>";
        break;
        case 'Proceso entrevista':
         echo "<span class='badge rounded-pill bg-info text-dark text-labels3'>Proceso entrevista</span>";
        break;
        case 'Proceso contratacion':
        echo "<span class='badge rounded-pill bg-success text-labels3>Proceso contratacion</span>";
        break;    

    }

}else{  echo "<span class='badge rounded-pill bg-danger text-labels3>Estado error</span>";} 

}

function datos_usuario($id){


    $query = Query("SELECT * FROM usuario WHERE idusuario ='$id'");
    $result = mysqli_fetch_assoc($query);
    return $result;

}

function consulta_usuarios(){

$consulta = Query("SELECT * FROM usuario WHERE rol !='Postulante' AND rol !='Administrador'");
return $consulta;
}

    function apdate_estadoU($actual,$id){
       
        $query = Query("UPDATE usuario SET estado ='$actual' WHERE idusuario='$id'");

        if(!$query){ 

            echo "<script type='text/javascript'> 
            Swal.fire({ icon: 'error', title: 'Sin estado..', text: 'El usuario tiene una problema de acceso o no es parte del sistema!',});   
                </script>";

         }
}


function estado_de_session($id){


$consult = Query("SELECT estado FROM usuario WHERE idusuario ='$id'");
$estado = mysqli_fetch_array($consult);

if($estado[0] == 'Activo'){
    return  "<span class='h6 mb-0 badge rounded-pill bg-success font-moserrat'>Session Activa</span>"; 

}elseif($estado[0]=='Inactivo'){ 
    return "<span class='h6 mb-0 badge rounded-pill bg-warning font-moserrat'>Session Desconectada</span>"; 
    
}

}


    function autentificar_postulante($id,$valor){

        $query = Query("UPDATE usuario SET auth = '$valor' WHERE idusuario='$id'");

        if(!$query){ 

            echo "<script type='text/javascript'> 
            Swal.fire({
                icon: 'error',
                title: 'Error al auntentificar..',
                text: 'No es posible auntentificar la informacion de este usuario {Postulante}!',
                });   
                </script>";
            }else{ return true ;}
         
}

function consulta_solicitud_postulante($id_postulante){

    $consulta = Query("SELECT 
        p.id_postulante, p.fk_usuario,s.id_solicitud, p.nombre_completo,o.vacante, p.estado_civil,p.perfil, p.sexo, p.edad,u.imagen_perfil,p.telefono, s.fecha_postulacion, s.estado_postulacion,u.correo
        FROM postula_oferta s 
        INNER JOIN postulantes p ON s.fk_postulante = p.id_postulante 
        INNER JOIN usuario u ON u.idusuario = p.fk_usuario 
        INNER JOIN ofertas o ON o.id_oferta = s.fk_vancante WHERE p.id_postulante = '$id_postulante'");
    $datos = mysqli_fetch_assoc($consulta);
    return $datos;


}

function imagen_perfil($id){
    
   $consulta = Query("SELECT imagen_perfil FROM usuario WHERE idusuario ='$id'");
   $imagen= mysqli_fetch_assoc($consulta);
   $dir = './../images/perfiles/';
   echo $dir.$imagen['imagen_perfil'];
}


//codigo cambio de imagen de perfil del postulante

function generar_codigo_imagen($id,$name,$rol){
    
    ini_set('date.timezone','America/Mexico_City');

    switch($rol){

        case 'Administrador':

        $consulta = Query("SELECT u.idusuario, a.fk_usuario FROM usuario u 
            INNER JOIN admins a ON u.idusuario = a.fk_usuario WHERE u.idusuario = '$id'");

        if(mysqli_num_rows($consulta) > 0){
             $dato = mysqli_fetch_assoc($consulta);
            $codigo = "IMG".date("-dmY-").$dato['idusuario'].'-'.$dato['fk_usuario'].'-'.$name;
            return $codigo; 

        }else{  false; }
        break;

        case 'Postulante':

        $consulta = Query("SELECT u.idusuario,p.id_postulante  FROM usuario u 
            INNER JOIN postulantes p ON u.idusuario = p.fk_usuario WHERE u.idusuario = '$id'");

        if(mysqli_num_rows($consulta) > 0){

            $dato = mysqli_fetch_assoc($consulta);
            $codigo = $dato['idusuario'].'-'.$dato['id_postulante'].'-'.date("dmY-His").'-'.$name;
            return $codigo; 

        }else{ 

            return false;
        }

        break;

    }

    

}



function subir_documento(){

if(isset($_POST['submit'])!=""){

  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  documentos WHERE name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
    while($c == 0){
        $i++;
        $reversedParts = explode('.', strrev($name), 2);
        $tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
        $chk2 = $conn->query("SELECT * FROM  documentos where name = '$tname' ")->rowCount();
        if($chk2 == 0){
            $c = 1;
            $name = $tname;
        }
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);

 if($move){

    $query=$conn->query("insert into documentos(name,fname)values('$name','$fname')");
    if($query){
    header("location:index.php");
    }
    else{

    die(mysql_error());

    }
 }
}
}

function cv($id_doc){

    $consultar = Query("SELECT documento FROM documentos WHERE id_documento='$id_doc'");
    $result = mysqli_num_rows($consultar);

    if ($result > 0){

        //Llamar funcion descarga

    }else{ echo "<script type='text/javascript'> 
    Swal.fire({
        icon: 'warning',
        title: 'CV sin cargar',
        text:'Este postulante no ha cargado se CV',
        });
    </script>"; }

}


function consulta_documentacion($id_postulante){

    $sql = Query("SELECT * FROM documentos WHERE fk_postulante ='$id_postulante'");

    $result = mysqli_num_rows($sql);


    if($result > 0){
        $docs = mysqli_fetch_assoc($sql);
        return ($docs);
    }

}

//Funciones para postulantes

function num_ofertas(){

    $query = Query("SELECT count(*) FROM ofertas");
    $numeros = mysqli_fetch_array($query);
    return $numeros;
}


function datos_oferta(){

        $query = Query("SELECT * from  ofertas WHERE estatus='Activo'");
        $rows = mysqli_num_rows($query);

        if($rows > 0){

            echo "<span class='badge rounded-pill bg-success'>{$rows}</span>";

        }else{ echo "<span class='badge rounded-pill bg-secondary'>NA</span>"; }
        return $query;
}

function formaciones($id_postulante){

    $query = Query("SELECT * FROM documentos WHERE fk_postulante='$id_postulante' AND tipo='FORMACIONES' ORDER BY id_documentacion ASC");

    if(mysqli_num_rows($query) > 0){ return $query; 
    }else{return false;}

    }


function experiencias_laboral(){

    



}    

function anexos(){


}






?>