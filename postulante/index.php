<?php include_once "includes/header.php"; ?>

    <div class="container-fluid"><!-- Page Heading -->
        <div class="row"> <!-- Content Row -->
            <div class="col-xl-12 col-md-10 mb-3">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <img class="img-responsive img-fluid rounded-circle" src="./../images/logo_revergy.png" width="190px"  /> 
                                </div>
                                <div class="h5 mb-0 font-italic text-gray-800">Sistema Integral de reclutamiento Rervergy SA de CV</div>
                            </div>
                    <!-- Contenedor del calendario -->
                    <div class="col mr-2 alinear-contenido-derecha">
                        <!-- Calendario -->
                        
           
                        <!-- Modal creacion de evento -->
                        
                    </div>
                            <!-- Fin contenedor calendario -->
                </div>
                </div>
            </div>
            </div>


<!-- Contendor Vacantes Ofertas -->

        <div class="col-xl-12 col-md-10 mb-3">
            <div class="card border-left-al h-100 py-0 shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="h5 mb-0 text-title-normal">Ofertas de empleos Disponibles 
                                <?php $consulta = datos_oferta();
                                $datos = mysqli_num_rows($consulta);

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <!-- Tarjetas de publicaciones de ofertas -->

        <?php 
            if($datos > 0){ 

                while($item = mysqli_fetch_array($consulta)){
                    $parrafo ='';
                    if (strlen($item[3]) > 200){ $parrafo = substr($item[3],0,200);
                    }else{$parrafo = $item[3];}
                ?>

                <div class="card-ofert">
                    <div class="box one">
                      <div class="details">
                        <div class="topic">REQUERIMIENTOS</div>
                        <p><?php echo $parrafo.'...' ?></p>
                        <div class="price text-parrafo"><u><?php echo $item[1];?></u></div>
                        <div class="rating">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                      </div>
                      <div class="price-box">
                          <div class="price"><?php echo $item[2];?></div>
                      </div>
                  </div>
              </div>
              <div class="box two">
                  <div class="image-box">
                    <div class="image">
                        <?php 

                        switch($item[1]){

                            case 'TIC':  echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_TIC.png">';
                            break;
                            case 'ESHQ': echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_QEHS.png">';
                            break;
                            case 'ALMACEN': echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_almacenista.png">';
                            break;
                            case 'MECANICO': echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_mtto.png">';
                            break;
                            case 'INSPECTORES': echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_inspeciones.png">';
                            break;
                            case 'RRHH': echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_RRHH.png">';
                            break;
                            case 'ELECTRICO OPERADORES': echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_electrico.png">';
                            break;
                            default: echo '<img src="../images/cars_ofertas/iconos_ofertas/logotipo_default.png">';
                            break;

                        }?>

                      <div class="info">
                        <!-- <div class="brand">Oferta</div>
                        <div class="name"><?php echo $item[1];?></div> -->
                        <div class="button2">
                            <button class="btn btn-outline-light btn-sm">Ver detalles</button>
                      </div>
                  </div>
              </div>

          </div>

      </div>
  </div>
<?php }}?>
</div>
</div>
</div> <!-- Div para pie de pagina-->

<!-- Footer -->
<?php include_once "includes/footer.php"; ?>
