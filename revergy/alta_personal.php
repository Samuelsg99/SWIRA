<?php include_once "includes/header.php"; ?>

<style type="text/css">

#register_form fieldset:not(:first-of-type) {
display: none;
}
</style>

<script type="text/javascript">

  function getAnalitica(select) {
    
  var proyecto = select.options[select.selectedIndex].value;
  return proyecto;
}
 </script>


 <div class="container-fluid ">
  
  <div class="d-sm-flex card shadow mb-4 bg-white rounded border-left-info">
    <div class="card-body alinear-contenido-izquierda">
      <h2 class="h4 mb-0 text-title-formal text-color-tema2"><i class="fas fa-user-plus"></i> Registro Personal Revergy</h2>  
    </div>
  </div> 
   
  	<div class="row alinear-div"> 
  		<div class="col-lg-8">
  			<div class="card card shadow">
  				<div class="card-body shadow"> 
  					<form id="register_form" action=""  method="">
  						<!-- Seccion 1 Datos alta -->
  						<fieldset>
  							<h2 class="text-title-formal text-secondary "><i class="fas fa-clipboard-list"></i> Datos de alta</h2>
  							<br>
  							<div class="input-group mb-3">
  								<div class="input-group-prepend">
  									<span class="input-group-text text-labels">#Codigo</span>
  								</div>
  								<input type="number" id="numero_imss" class="form-control text-labels2">
  							</div>
  							<div class="form-group">
  								<label class="text-labels">Nombre Completo:</label>
  								<input type="text" id="nombre" class="form-control text-labels2">
  							</div>
  							<div class="form-group">
  								<label class="text-labels">Analitica</label>
  								<select id="analitica" class="form-control form-select text-labels2" onchange="getAnalitica(this)">  
  									<?php
  									$query = mysqli_query($conexion,"SELECT id_analitica, analitica FROM analiticas WHERE Estatus='ACTIVO'");
  									while ($valores = mysqli_fetch_array($query)){
  										echo '<option value="'.$valores[0].'">'.$valores[1].'</option>'; }?>
  									</select>
  								</div>
  								<div class="form-group">
  									<label class="text-labels">Puesto de trabajo</label>    
                    <input id="puesto" class="form-control form-select text-labels2" /> 
                    </div>
                    <div class="form-group">
                     <label class="text-labels">Fecha de alta IMSS</label>
                     <input type="date" id="fecha_imss" placeholder="" class="form-control text-labels2">
                   </div>
                   <input type="button" class="next-form btn btn-outline-primary btn-sm" value="Siguiente" />
                 </fieldset>


  							<!-- Seccion 2 Datos empresa -->
  							<fieldset>
  								<h2 class="text-title-formal text-secondary glow"><i class="fas fa-clipboard-list"></i> Datos Empresa</h2>
  								<br>
  		
  								<div class="input-group mb-3">
  									<div class="input-group-prepend">
  										<span class="input-group-text text-labels">CURP</span>
  									</div>
  									<input type="text" class="form-control text-labels2" id="CURP">   
  								</div>

  								<div class="input-group mb-3">
  									<div class="input-group-prepend">
  										<span class="input-group-text text-labels">RFC</span>
  									</div>
  									<input type="text" class="form-control text-labels2" id="RFC">   
  								</div>


  								<div class="input-group mb-3">
  									<div class="input-group-prepend">
  										<span class="input-group-text text-labels">NSS</span>
  									</div>
  									<input type="text" class="form-control text-labels2" id="NSS"> 
  								</div>

  								<div class="input-group mb-3">
  									<div class="input-group-prepend">
  										<span class="input-group-text text-labels">Correo Personal</span>
  										<input type="gmail" class="form-control text-labels2" id="correo_Personal">   
  										<span class="input-group-text text-labels">Correo Empresa</span>
  									</div>
  									<input type="email" class="form-control text-labels2" id="correo_Empresa">   
  								</div>
  								<div class="input-group mb-3">
  									<div class="input-group-prepend">
  										<span class="input-group-text text-labels">Telefono Personal</span>
  										<input type="number" class="form-control text-labels2" id="telefono_personal">   
  										<span class="input-group-text text-labels">Telefono Empresa</span>
  									</div>
  									<input type="number" class="form-control" id="telefono_empresa">   
  								</div>

  								<div class="form-group">
  									<label class="text-labels">Antigüedad SUTERM</label>
  									<input type="date" class="form-control text-labels2" id="suterm">
  								</div>

  								<input type="button" class="previous-form btn btn-outline-secondary btn-sm" value="Previous" />
  								<input type="button" class="next-form btn btn-outline-primary btn-sm" value="Siguiente" /> 
  							</fieldset>

  							<fieldset>
  								<h2 class="text-title-formal text-secondary glow"><i class="fas fa-clipboard-list"></i> Datos Personales</h2>
  								<br>
  								<div class="form-group">
  									<label>Titular en caso de emergencia</label>
  									<input type="text" id="titular_emergencia" class="form-control" placeholder="Nombre del resposable">
  								</div>
  								<div class="form-group">
  									<label>Contacto del Titular</label>
  									<input type="number" id="contacto_titular" class="form-control" placeholder="Numero telefonico">
  								</div>
  								<div class="input-group mb-3">
  									<div class="input-group-prepend">
  										<span class="input-group-text">Estado civil</span>
  									</div>
                    <select id="estado_civil" class="form-control form-select">
                      <option value="Soltero(a)">Soltero(a)</option> 
                      <option value="Casado(a)">Casado(a)</option> 
                      <option value="Divociado(a)">Divociado(a)</option>
                      <option value="Union Libre">Union Libre</option> 
                    </select>
  								</div>

  								<div class="input-group mb-3">
  									<div class="input-group-prepend">
  										<span class="input-group-text">Tipo de sangre</span>
  									</div>
  									<select id="tipo_sangre" class="form-control form-select">
                      <option value="A positivo (A +)">A positivo (A +)</option> 
                      <option value="A negativo (A-)">A negativo (A-)</option> 
                      <option value="B positivo (B +)">B positivo (B +)</option>
                      <option value="B negativo (B-)">B negativo (B-)</option>
                      <option value="AB positivo (AB+)">AB positivo (AB+)</option> 
                      <option value="AB negativo (AB-)">AB negativo (AB-)</option> 
                      <option value="A Rh positivo">A Rh positivo</option> 
                      <option value="A Rh negativo">A Rh negativo</option>
                      <option value="B Rh positivo">B Rh positivo</option> 
                      <option value="B Rh negativo">B Rh negativo</option> 
                      <option value="AB Rh positivo">AB Rh positivo</option>
                      <option value="AB Rh negativo">AB Rh negativo</option> 
                      <option value="O Rh positivo">O Rh positivo</option> 
                      <option value="O Rh negativo">O Rh negativo</option> 
                    </select>
  								</div>
  								<div class="form-group">
  									<label>Domicilio particular</label>
  									<input type="text" id="domicilio" class="form-control">
  								</div>
  								<input type="button" class="previous-form btn btn-outline-secondary btn-sm" value="Previous" >
  								<button type="button" class="next-form btn btn-primary btn-sm" ><i class="far fa-save"></i> Guardar</button>
  							</fieldset>
  						</form>
  						<br>
  						<div class="progress">
  							<div class="progress-bar bg-primary progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

<?php include_once "includes/footer.php"; ?>
<script src="js/acciones_personal.js"></script>