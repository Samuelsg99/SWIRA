<?php include_once "includes/header.php"; 
include "../conexion.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex card shadow mb-4  border-left-info">
            <div class="card-body alinear-contenido-izquierda">
                <h2 class="h4 mb-8 text-title-formal text-color-tema2"><i class="fas fa-clipboard"></i> Entrevistas / Cuestionarios Postulantes</h2>
                <div class="alinear-item-derecha">
                
                    <a href="index.php" class="btn btn-outline-primary btn-sm"><i class="fas fa-undo-alt"></i> Volver</a> 
                </div>
            </div>
        </div>
	
      <!--   <style> table.dataTable thead { background: linear-gradient(to right, #4e73df , #4e73df); color:white; } </style> -->

      <div class="row  alinear-contenido">
        <div class="card shadow col-lg-9">
            <div class="card-body">
                <div class="mb-4 rounded border-left-info">
                    <div class="card-body alinear-contenido-izquierda">
                      <h2 class="h4 mb-0 text-title-formal text-color-tema2"><i class="fas fa-address-book"></i> Historial</h2> 
                      <div class="alinear-item-derecha">
                        <a href="creacion_oferta.php" class="btn btn-primary btn-sm ">
                            <i class="fas fa-briefcase"></i> Nueva</a>
                            <a href="lista_postulantes.php" class="btn btn-primary btn-sm"><i class="fas fa-books"></i> Solicitudes</a>    
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table display dt-responsive nowrap" id="tablaPersonal" width="100%" cellspacing="0">
                        <thead class="table-primary">
                            <tr>
                                <th>id entrevista</th>
                                <th>tipo</th>
                                <th>Postulante</th>
                                <th>Fecha de realizacion</th>
                                <th>Valoracion</th>
                                <th>Estatus</th>

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
</div>

<?php include_once "includes/footer.php"; ?>

