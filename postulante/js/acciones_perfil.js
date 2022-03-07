
//Funcion cambiar de datos del usuario
window.addEventListener('load', () => {

	button = document.getElementById('modificar_datos');
    var id = document.getElementById('id');
    var user = document.getElementById('usuario');
    var correo = document.getElementById('gmail');
    var rol = document.getElementById('rol');
 
	function data(){
        const datos = new FormData();
        datos.append("id_usuario", id.value);
        datos.append("opcion", "update");
        datos.append("usuario", user.value);
        datos.append("gmail", correo.value);
        fetch('../Modelo/crud_usuarios.php', {
            method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ success }) => {

                switch(success){

                    case 0:
                     Swal.fire({
                        icon: 'error',
                        title: 'Error al actualizar datos..',
                        text: 'Ocurrio un error al modificar los datos del usuario',
                    }); 
                     setTimeout("window.location = 'perfil_usuario.php'", 2000);
                        break;
                        
                    case 1:
                    Swal.fire({
                        icon: 'success',
                        title: 'Datos de usuario actualizados correctamente',
                        footer:'<p class=\'mb-0 text-parrafo text-color-azul\'><b>*Se procedera a reiniciar su sesion!</b></p>',
                        type: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => { if (result.value) { location.reload(); }});
                        setTimeout("window.location = './../index.php'", 10000);
                        break;

                    case 2: 
                    Swal.fire({
                        icon:'info',
                        title: 'Sin modificaciones!',
                        text: 'No se relizaron nunguna modificacion de los datos del usuario Activo',
                    });

                    break;

                    case 3:
                    Swal.fire({
                        icon:'warning',
                        title: 'Corrreo invalido!',
                        text: 'Por favor ingrese un correo valido ejem: usuario@gmail.com',
                    });
                    break;
                } 
            });
        }

        button.addEventListener('submit', (e) => {
            e.preventDefault();
            data();
        });
    });


//funcion cambio de foto de perfil

document.getElementById("change_image").onclick = function () {
    event.preventDefault();

    window.captura_imagen = async () => {

        const { value: file } = await Swal.fire({
          title: 'Seleccione foto de perfil',
          input: 'file',
          inputAttributes: {
            'accept': 'image/*',
            'aria-label': 'Carga tu foto de perfil' }});


        if (file) {

            const datos = new FormData();
            var r = new FileReader();
            datos.append("photo", file);
            datos.append("opcion","update_photo");
            fetch('../Modelo/crud_usuarios.php', {
                method: 'POST',
                contentType: false,
                processData: false,
                body: datos
            }).then(Response => Response.json())
            .then(({ success }) => {

                switch(success){

                    case 0:
                    Swal.fire({
                        icon:'error',
                        title: 'Error al cargar imagen ..',
                        text: 'Por favor seleccione una imagen con el formato correcto',}); 
                    break;

                    case 1:
                    
                    r.readAsDataURL(file);
                    r.onload = (e) => { 
                        Swal.fire({
                            html:'<span class="text-title-formal text-color-verde"> Imagen perfil actualizada!</span>',
                            imageUrl: e.target.result,
                            imageAlt:'Custom image',
                            confirmButtonText: 'OK'
                        }).then((result) => { if (result.value) {
                            location.reload(); }});
                    }

                    break;
                } 
            });
        }

    }
    captura_imagen();

};


