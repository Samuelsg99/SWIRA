document.getElementById("cambio_pass").onclick = function () {
    event.preventDefault();

    Swal.fire({
    title: 'Estas seguro de cambiar la contraseña?',
    text: "Esta accion es irreversible!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#28a745',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si,  Deseo cambiarla!',
    }).then((result) => {
         if (result.isConfirmed) {
        //Variables a pasar por POST

        var pass_actual = document.getElementById('pass_actual');
        var pass_new = document.getElementById('nueva_pass');
        var pass_confir = document.getElementById('confirmar');

        if (result.value) {

                const datos = new FormData();
                datos.append("password_actual", pass_actual.value);
                datos.append("opcion", "change_password");
                datos.append("password_nueva", pass_new.value);
                datos.append("password_confir", pass_confir.value);

                fetch('../Modelo/crud_usuarios.php', {
                    method: 'POST',
                    body: datos
                }).then(Response => Response.json())
                .then(({ success }) => {

                    switch(success){

                        case 0:
                            Swal.fire({
                                icon: 'info',
                                title: 'Campos Vacios ..',
                                text: 'Por favor rellene todos los campos',
                                }); 
                            break;

                            case 1:
                            Swal.fire({
                                icon: 'error',
                                title: 'Contraseña incorrecta ..',
                                text: 'Por favor, ingrese la contraseña actual',
                                });
                                pass_actual.value = "";
                                pass_new.value = "";
                                pass_confir.value = "";
                                break;


                            case 2:
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Contraseña actualizada correctamente',
                                    text: 'Se cerrara session para comprobar su usuario',
                                    type: 'success',
                                    confirmButtonText: 'OK'
                                    }).then((result) => { if (result.value) { 
                                        location.href = './../index.php'; }});

                                    setTimeout("window.location = './../index.php'", 10000);
                                    break;

                            case 3: 
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Las contraseñas no coinciden ..',
                                    text: 'No se ingreso correctemanete la comprobacion de contraseñas',
                                    });
                                
                                    pass_confir.value = "";
                                    break;

                                    case 4: 
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Contraseña invalida ..',
                                        text: 'Introdusca una contraseña con: 8 caracteres como minimo, 1 letra mayuscula y un digito como minimo',
                                    });
                                   
                                    break;
                                } 
                            });
            }}


        });

};
