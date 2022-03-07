
        //Variables de botones segun id asignado
        var boton_modificar = document.getElementById('modificar');
        var boton_back = document.getElementById('regresar');

        // Funcion evento click en botones

        boton_modificar.onclick = function() {

            var div_modificar = document.getElementById('div modificar');
            var div_datos = document.getElementById('div datos');

            if (div_modificar.style.display !== 'none') { 

                div_modificar.style.display = 'none';

            } else {

                    div_modificar.style.display = 'block';
                    boton_modificar.style.display = 'none';
                    boton_back.style.display = 'none';

     
                    }  

        };