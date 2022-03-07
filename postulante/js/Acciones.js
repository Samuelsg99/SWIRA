window.addEventListener('load', () => {
    let button = document.getElementById('Modificar_Datos_Perfil');

    let nombre = document.getElementById('name');
    let proyecto = document.getElementById('analitica');
    let gmail = document.getElementById('correo');
    let social = document.getElementById('social');
    let usuario = document.getElementById('user');

    function data() {

    let datos = new FormData();
    datos.append("name", nombre.value);
    datos.append("analitica", proyecto.value);
    datos.append("correo", gmail.value);
    datos.append("social", social.value);
    datos.append("user", usuario.value);

    fetch('./controlador/usuario.php', {
            method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ success }) => {

                switch(success){

                    case 0:
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'success',
                    title: 'Datos Actualizados Correctamente' 
                    })
                      setTimeout("window.location = '../index.php'", 3000);
                    break;

                    case 1:
                    Swal.fire({
                    icon: 'error',
                    title: 'Upps',
                    text: 'Ha ocurrido un eror al actualizar los datos!',
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




$("#cambio_imagen").click(function(){
  start();
  });
  async function start() {

const { value: file } = await Swal.fire({
  title: 'Seleccione Imagen',
  input: 'file',
  inputAttributes: {
    'accept': 'image/*',
    'aria-label': 'Upload your profile picture'
  }
})

if (file) {
  const reader = new FileReader()
  reader.onload = (e) => {
    Swal.fire({
      title: 'Foto de perfil Actualizado!',
      imageUrl: e.target.result,
      imageAlt: 'The uploaded picture'
    })
  }
  reader.readAsDataURL(file)
}

}

