$(document).ready(function(){

var current_fs, next_fs, previous_fs; 
var current = 1;
var steps = $("fieldset").length;
setProgressBar(current);


$(".next").click(function(){

switch(current){

	case 1:
	if(!$("#nombre").val() || !$("#sexo").val() || !$("#estado_civil").val() || !$("#edad").val()) {

	Swal.fire({ icon: 'info', title: 'Campos vacios.', text: 'Rellene los campos obligatorios! ', });

	}else{

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		siguiente();
	}
	break;

	case 2:
	if(!$("#perfil").val() || !$("#ultimo_puesto").val() || !$("#telefono").val()) {

	Swal.fire({ icon: 'info', title: 'Campos vacios.', text: 'Rellene los campos obligatorios! ', });

}else{

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	siguiente();
}

break;

case 3:

 Swal.fire({
    title: 'Confirmacion',
    html: '<h3 class="text-parrafo"><strong> Desea guardar los datos ingresados?</strong><br></h3><h3 class="text-parrafo4 text-color-rojo">'+
    '*Al confirmar da por hecho que esta deacuerdo con los Terminos y declaraciones de privacidad.<br> *Puede cerrar esta ventana para verlo y confirmar cuando quiera',
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#65B15F',
    cancelButtonColor: '#686864',
    confirmButtonText: 'Aceptar y Registrarme!',
    }).then((result) => {
         if (result.isConfirmed){

         	 const datos = new FormData();
                datos.append("nombre_completo", $("#nombre").val());
                datos.append("sexo", $("#sexo").val());
                datos.append("estado_civil", $("#estado_civil").val());
                datos.append("edad", $("#edad").val());
                datos.append("perfil", $("#perfil").val());
                datos.append("ultimo_puesto", $("#ultimo_puesto").val());
                datos.append("telefono", $("#telefono").val());

                fetch('../Modelo/add_postulante.php', {
                    method: 'POST',
                    body: datos
                }).then(Response => Response.json())
                .then(({ success }) => {

                	switch(success){

                		case 0:
                		Swal.fire({
                			icon: 'error',
                			title: 'Error a guardar datos',
                			text: 'Ocurrio un error al registrar sus datos', });
                		break;

                		case 1:	
                			current_fs = $(this).parent();
                			next_fs = $(this).parent().next();

                			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                			next_fs.show();
                			current_fs.animate({opacity: 0}, {
                				step: function(now) {
                					opacity = 1 - now;

                					current_fs.css({
                						'display': 'none',
                						'position': 'relative'
                					});
                					next_fs.css({'opacity': opacity});
                				},
                				duration: 500
                			});
                			setProgressBar(++current);
                			
                			setTimeout(" window.location = '../postulante/index.php'", 5000);
                		
                			break;
                		}});
            }});
 break;
}});


// Funcion de disminuye el contador para la barra de estado segun presione el 
// boton atras
$(".previous").click(function(){

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

previous_fs.show();

current_fs.animate({opacity: 0}, {
	step: function(now) {
opacity = 1 - now;

current_fs.css({
	'display': 'none',
	'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});





function setProgressBar(curStep){
	var percent = parseFloat(100 / steps) * curStep;
	percent = percent.toFixed();
	$(".progress-bar")
	.css("width",percent+"%")
}

$(".submit").click(function(){
	return false;
});


//Funcion asincrona para alerta de bienvenida del postulante
window.alerta_bienvenida = async () => {
	const Toast = Swal.mixin({
		toast: true,
		iconColor: 'aqua',
		position: 'top-end',
		customClass: {
			popup: 'colored-toast.swal2-icon-warning'
		},
		showConfirmButton: false,
		timer: 4000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})
	await Toast.fire({
		icon: 'info',
		title: 'Bienvenido al Sistema Integral de Reclutamiento Revergy' 
	});
}


function siguiente(){
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
next_fs.show();
current_fs.animate({opacity: 0}, {
step: function(now) {
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);

}

});
