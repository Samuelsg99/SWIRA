<?php include_once "includes/header.php";
include_once "../Modelo/funciones.php";
 ?>
 <div class="container-fluid">
 	<link rel="stylesheet" href="css/estilos_titulos.css" />
	<!-- Page Heading -->

    <div class="d-sm-flex  mb-4 card shadow bg-white rounded border-left-info">
        <div class="card-body alinear-contenido-izquierda">
            <h2 class="h4 mb-0 text-title-formal text-color-tema2"><i class="fas fa-folder-open"></i> Documentacion \ Postulantes</h2> 
            <div class="alinear-item-derecha">
                <a href="index.php" class="btn btn-outline-primary btn-sm"><i class="fas fa-undo-alt"></i>  Volver</a>
            </div>
        </div>
    </div>

    <div class="card shadow mb-3">
    	<div class="card-body">
    		<div class="table-responsive">
    			<div class="mb-4 rounded border-left-info border-left-info">
    				<div class="card-body alinear-contenido-izquierda">
    					<h2 class="h4 mb-0 text-title-formal text-color-tema2"><i class="fas fa-file-pdf"></i> Historial de documentacion del postulante</h2> 
    				</div>
    			</div>

    			<table class="table display dt-responsive nowrap" id="tabla_documentos" width="100%" cellspacing="0">
    				<thead class="table-primary">
    					<tr>
    						<th  align="center">id documento</th>
    						<th  align="center">id postulante</th>
    						<th  align="center">Nombre</th>
    						<th  align="center">Tipo documento</th>
    						<th  align="center">Descripcion</th>
    						<th  align="center">Fecha de subida</th>
    						<th  align="center">Documento(Codificado)</th>
    					</tr>
    				</thead>
    				<tbody>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>
</div>

<?php include_once "includes/footer.php"; ?>
<script type="text/javascript">
  
 $('#tabla_documentos').DataTable({
   "language":{"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" },
   "ajax":{ "method":"POST", "url": "../Modelo/consulta_documentacion.php" },

   dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-4"><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"><"col-sm-12 col-md-6"p>>',
   buttons: [{
    text: '<i class="fas fa-file-archive"></i> Generar zip', titleAttr: 'Adjuntar todo en un .zip', className: 'btn btn-secondary',
    action: function(e,dt, node, config) {

      if(dt.rows({ selected: true }).indexes().length == 0){

        Swal.fire({ icon: 'warning', title: 'Descarga Vacia', text: 'Seleccione un documento a descargar!'});

      }else{

        var datos = dt.row({ selected: true }).data();
        alert("Sin implementar");
      }
    }
  },
  {
    text: '<i class="fas fa-file-pdf fa-sm"></i> Descargar PDF', titleAttr: 'Descargar pdf seleccionado', className: 'btn btn-info',
    action: function(e,dt, node, config) {

      
      if(dt.rows({ selected: true }).indexes().length == 0){

        Swal.fire({ icon: 'warning', title: '', text: 'Seleccione postulante!'});

      }else{
      
        var datos = dt.row({ selected: true }).data();

      try {

        window.location.href = 
        "../Modelo/download.php?id_doc="+datos.id_documentacion+"&doc="+datos.documento+"&tipo_doc="+datos.tipo+"&desc_doc="+datos.descripcion;
        descarga_correcta(datos.tipo);

      }catch(error){ error_descarga(); }
    }
  }
  },

    {
    text: '<i class="fas fa-user"></i> Ver postulante', titleAttr: 'Ir ala informacion del postulante', className: 'btn btn-success',
    action: function(e,dt, node, config) {

      if(dt.rows({ selected: true }).indexes().length == 0){

        Swal.fire({ icon: 'warning', title: '', text: 'Seleccione postulante!'});

      }else{
        
        var datos = dt.row({ selected: true }).data();
        window.location = "postulante.php?id=" + datos.fk_postulante;
      }
    }
  }],


  "columns":[
  {"data":"id_documentacion"},
  {"data":"fk_postulante", "targets": [1], "visible": false, "searchable": false },   
  {"data":"nombre_completo"},
  {"data":"tipo"},
  {"data":"descripcion"},
  {"data":"fecha_adjunto"},
  {"data":"documento"}
  ],  
  select: {
    style: "single",
  },
  scroller:true,
  scrollX:200,
  select: true
});



window.descarga_correcta = async (doc) => {
  const Toast = Swal.mixin({
    toast: true, position: 'top-right',  iconColor: '#fff',background: "#3095B2", color: '#fff',
    customClass: { popup: 'colored-toast' }, showConfirmButton: false, timer: 2000, timerProgressBar: true })
  await Toast.fire({ icon: 'success', html: 
    '<i class="fas fa-file-pdf"></i> <span class="text-alert text-color-blanco">Documento <b>('+doc+')</b> descargado</span><br>' })
}

window.error_descarga = async (doc) => {
  const Toast = Swal.mixin({
    toast: true, position: 'top-right',  iconColor: '#fff',background: "#f27474", color: '#fff',
    customClass: { popup: 'colored-toast' }, showConfirmButton: false, timer: 3000, timerProgressBar: true })
  await Toast.fire({icon: 'error', html: 
    '<i class="fas fa-file-pdf"></i> <span class="text-alert text-color-blanco">Ocurrio un error al descargar archivo</span><br>' })
}



</script>





