<?php include_once "includes/header.php"; 
include_once "../Modelo/funciones.php";

?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading --> 

     <div class="d-sm-flex card shadow mb-4 border-left-info">
        <div class="card-body alinear-contenido-izquierda">
            <h2 class="h3 mb-0 text-title-formal text-color-tema2"><i class="fas fa-user-tag"></i> Creacion de ofertas</h2> 
        </div>
    </div>


    <div class="row alinear-div"> 
        <div class="col-lg-8">
            <div class="card card shadow">
                <div class="card-body">
                    <form> 
                        <div class="card-header mb-4"> 
                            <h2 class="text-labels-sub text-color-verde glow"><i class="fas fa-clipboard-list"></i> REQUERIMIENTOS PARA CREACION DE OFERTA*</h2>
                        </div>
                        <br>
                        <div class="input-group mb-3 col-md-5">
                            <strong class="input-group-text text-parrafo" for="inputGroupSelect01"><b>Vacante</b></strong>  
                            <select id="vacante" class="form-control form-select text-labels2"> 
                                <?php $query = mysqli_query($conexion,"SELECT id_departamento,nombre FROM departamentos");
                                while ($valores = mysqli_fetch_array($query)){ echo '<option value="'.$valores[1].'">'.$valores[1].'</option>'; }?>
                            </select>
                        </div>
                        <div class="input-group mb-3 col-md-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-labels">Perfil</span>
                            </div>
                            <input type="text" id="perfil" class="form-control text-labels2">
                        </div>
                        <div class="mb-3 col-md-12 col-sm-12">
                            <label class="text-labels">Descripcion</label>
                            <textarea type="text" id="descripcion" class="form-control text-labels2"></textarea>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="text-labels">Detalles</label>    
                            <textarea type="text" id="detalles" class="form-control  text-labels2"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-sm" id="publicar_oferta"><i class="fas fa-edit" ></i>Publicar</button>
                            <a type="button" href="ofertas.php" class="btn btn-outline-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include_once "includes/footer.php";?>
<script src="js/acciones_ofertas.js"></script>




