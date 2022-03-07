<?php include_once('includes/header.php'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-1 text-gray-800">Informacion del Usuario [<?php echo $_SESSION['usuario']['user'];?>]</h1> 
        
<div class="breadcrumbs">
                <a class="breadcrumbs__item" href="index.php"><b>Inicio</b></a>
                <a class="breadcrumbs__item font-italic" href="">Perfil</a>
</div>
</div>


    <div class="row">
      <div class="col-lg-6" id="div modificar">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        Cambio de contraseña
                    </div>
                    <div class="card-body">
                        <form action="" method="post"  class="p-3" id="Modificar_Datos_Perfil" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <label>Contraseña Actual:</label>
                                <input type="text" name="nombre" id="name" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label>Nueva Contraseña:</label>
                                <input type="text" name="analitica" id="analitica" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirmar nueva contraseña:</label>
                                <input type="email" name="correo" id="correo" class="form-control" required>
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-outline-info btn-sm"><i class="fas fa-save " ></i> Cambiar contraseña</button>
    

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


</div>
 <?php include_once "includes/footer.php"; ?>
<script src="js/acciones_perfil.js"></script>


