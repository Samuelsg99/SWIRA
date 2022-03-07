$("#formularioP").on("click",function(){

    var rol = $("#formularioP").data("rol");
    var verify_pass = document.getElementById("password_verify");

    if($("#usuario_postulante").val().trim()== "" || $("#gmail_register").val().trim()== "" || 
        $("#password_Register").val().trim()== "" || $("#password_verify").val().trim()== ""){

     Swal.fire({ icon: 'info', title: 'Campos Vacios..',text: 'Por favor ingrese todos los campos!',});

}else{
    

    let datos_usuario = new FormData();
    datos_usuario.append("opcion","alta");
    datos_usuario.append("tipo_user", rol);
    datos_usuario.append("usuario", $("#usuario_postulante").val());
    datos_usuario.append("correo", $("#gmail_register").val());
    datos_usuario.append("password", $("#password_Register").val());
    datos_usuario.append("password_verify", verify_pass.value);

    fetch('./Modelo/crud_usuarios.php', {
        method: 'POST',
        body: datos_usuario
    }).then(Response => Response.json())
    .then(({ success }) => {

        switch(success){

            case 0:
            Swal.fire({
                icon: 'success',
                title: 'Usuario Registrado',
                text: 'Se le redireccionara  para registrar sus datos!',
                confirmButtonText: 'OK'
            }).then((result) => { if (result.value){ window.location = 'Modelo/registro_postulante.php';  }});
            setTimeout("window.location= 'Modelo/registro_postulante.php'=", 5000);
            break;

            case 1:

            Swal.fire({ icon: 'error', title: 'Error de consulta{MYSQL}..',
             text: 'No se pudo inertar los datos. Por favor. Revise la funcion Query y la sentencia sql!',});
            break;

            case 2:
            Swal.fire({ icon: 'error',  title: 'Correo erroneo..', text: 'Por favor. Ingrese un correo valido!', });
            break;

            case 3:
            Swal.fire({
                icon: 'error',
                title: 'Contraseña erronea..',
                text: 'La contraseña debe tener entre 8 y 16 caracteres, minúsculas, mayúsculas y al menos un digito.!',});
            break;

            case 4:
            Swal.fire({ icon: 'warning', title: 'Las contraseñas no coinciden..', text: 'Ingrese correctamente la contraseña!', });
             verify_pass.value = "";
            break;

            case 5:
            Swal.fire({
                icon: 'info',
                title: 'Cuenta Existente..',
                html: '<span class="text-parrafo"> El correo propocionado ya esta registrado en el sistema!'+
                '</span>. <br /><a href="index.php"><span class="text-parrafo text-color-rojo"><b>Ir a inicio de session</b></a>',
            });   
            break;
        }
    });

}

});

function iniciar_session(datos){

    fetch('./controlador/acceso_usuario.php', {
        method: 'POST',
        body: datos
    }).then(Response => Response.json())
    .then(({ success }) => {

        switch(success){







        }

    });





}
    
