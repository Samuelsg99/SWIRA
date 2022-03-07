<?php 
include_once('includes/header.php'); 
include_once "../conexion.php"; 
include_once "../Modelo/funciones.php";

?>
<!-- Page Heading -->
<div class="container-fluid">

    <div class="d-sm-flex  mb-2 shadow-lg p-0 mb-5 bg-white rounded border-left-info">
        <div class="card-body alinear-contenido-izquierda">
           <h2 class="h4 mb-0 text-title-formal text-color-tema2"><i class="fas fa-cog"></i> Configuración [<?php echo $_SESSION['usuario']['user'] ?>]</h2> 
       </div>
   </div>

    <div class="row"> 
        <div class="col-lg-6">
            <div class="card card shadow">
                <div class="card-header bg-primary text-white">Cambiar Contraseña</div>
                <div class="card-body">

                    <!-- formulario para el cambio de contraseña-->
                    <form action="" method=""  class="p-3">
                        <div class="form-group">
                            <label>Contraseña Actual</label>
                            <input type="password" id="pass_actual" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Nueva Contraseña</label>
                            <input class="form-control" type="password" id="nueva_pass" required/>
                        </div>
                        <div class="form-group">
                            <label>Confirmar Contraseña</label>
                            <input type="password" id="confirmar" class="form-control" required/>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-primary btn-sm" id="cambio_pass">
                                <i class="fas fa-edit"></i>Cambiar Contraseña</button>
                                <a href="index.php" class="btn btn-outline-primary btn-sm" id="regresar"><i class="fas fa-undo-alt"></i> Volver</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- <?php 
            if ($_SESSION['usuario']['rol_name'] == 'Administrador'){
                $usuarios = consulta_usuarios();
                    if(mysqli_num_rows($usuarios) > 0){ ?>

            <div class="col-lg-6">
               <div class="card card shadow mb-3"> 
                <div class="card-header bg-primary text-center text-white">Administracion de usuarios</div>
              
                
                        <div class="card-body">
                            <div class="table-responsive">   
                                <table class="table table-hover" id="tablaUsuarios" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal_addUsuario">
                                                <i class="fas fa-plus"></i> Agregar</button></th>
                                            <th>id usuario</th>
                                            <th>Usuario</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                             <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <?php while($datos = mysqli_fetch_array($usuarios)){?>
                                        <tr>
                                            <td class=""></td>
                                            <td class="text-parrafo"><?php echo $datos[0];?></td>
                                            <td class="text-parrafo"><?php echo $datos[1];?></td>
                                            <td class="text-parrafo"><?php echo $datos[2];?></td>
                                            <td class="text-parrafo"><?php echo $datos[4];?></td>
                                            <td class="text-labels2">
                                                <?php 

                                                if ($datos[5] =='Activo') {
                                                    echo "<span class='badge rounded-pill bg-success text-labels3 text-color-negro'>Activo</span>";
                                                }else{ echo "<span class='badge rounded-pill bg-secondary text-labels3'>Inactivo</span>"; }?></td>
                                                <td><button type="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </td>  
                                            </tr>
                                        <?php }?>
                                        <tbody></tbody>
                                    </table>
                                </div>
                        </div>
                    <?php }
                } ?>
                </div>  
                </div> -->
            </div>
        </div>
    </div>

    <?php include_once "includes/footer.php"; ?>


<!-- Modal Agregar Usuario Revergy -->
<div class="modal fade" id="Modal_addUsuario" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-modal">
          <header class="alinear-contenido-izquierda">
            <img class="img-thumbnail" src="./../images/perfiles/<?php echo mostrar_imagen_perfil($_SESSION['usuario']['idUser']); ?>" width="60px"/>
            <h5 class="modal-title text-title-header text-color-tema">Registrar usuario Revergy al sistema</h5>
        </header>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <!--Cuerpo del modal --> 
      <div class="modal-body">
        <form  action="" method="" id="agregar_usuario">
            <div class="input-group mb-3">
                <input type="text" class="form-control text-parrafo text-color-gris" placeholder=" Usuario" id="usuario"autocomplete="off" required>
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control text-parrafo text-color-gris" placeholder=" Correo" id="gmail" autocomplete="off" required>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control text-parrafo text-color-gris" placeholder=" Contraseña" id="usuario"autocomplete="off" required>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control text-parrafo text-color-gris" placeholder=" Confirma contraseña" id="usuario"autocomplete="off" required>
            </div>
            <div class="input-group mb-3">
                <select id="rol" class="form-control form-select">
                    <option value="">Seleccione Privilegios</option> 
                    <option value="Administrador">Administrador</option> 
                    <option value="Personal RH">Personal RH</option> 
                    <option value="Personal">Personal Revergy</option> 
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit" ></i>Registrar</button>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar</button> 
                </div>
            </form>
        </div>
    </div>
</div>
</div>


    <script src="js/acciones_configuracion.js"></script>
