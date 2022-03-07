window.addEventListener('load', () => {

    let button = document.getElementById('login');
    let correo = document.getElementById('correo');
    let password = document.getElementById('password');

    function data() {

        let datos = new FormData();
        datos.append("correo", correo.value);
        datos.append("password", password.value);
        fetch('./controlador/acceso_usuario.php', {
            method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ success }) => {

                switch(success){

                    case 0:
                    correo.value = "";
                    password.value = "";
                    const Toast = Swal.mixin({
                    toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)}})
                    
                    Toast.fire({ icon: 'success',  title: 'Accesso correcto Bienvenido'})
                      setTimeout("window.location = 'revergy/'", 2000);
                    break;

                    case 1:

                    correo.value = "";
                    password.value = "";
                    const Toast1 = Swal.mixin({ 
                        toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,
                        didOpen: (toast) => { 
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })
                    Toast1.fire({ icon: 'success', title: 'Accesso correcto Bienvenido' })
                    setTimeout("window.location = 'postulante/'", 2000);
                    break;

                    case 2:
                    Swal.fire({
                    icon: 'error',
                    title: 'Contraseña Incorrecta..',
                    text: 'Verifique su informacion!',
                    footer: 'Olvidaste tu contraseña? <b><a href=""><font color="#709073" size="2px" text-align="left">Click aqui</b></a>',
                    });

                    correo.value = "";
                    password.value = "";
                    break;

                    case 3:
                    Swal.fire({
                    icon: 'info',
                    title: 'Campos Vacios..',
                    text: 'Ingrese los campos de usuario y contraseña!', });
                    break;

                    case 4: window.location = './Modelo/registro_postulante.php';  
                    break;

                    case 5:
                    Swal.fire({
                    icon: 'warning',
                    title: 'Correo Incorrecto..',
                    text: 'Por favor. Ingrese un correo valido!', });
                    break;
                } 
            });
    }

    button.addEventListener('submit', (e) => {
        e.preventDefault();
        data();
    });
});