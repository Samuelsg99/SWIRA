<?php include_once "includes/header.php"; 
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-title-formal text-color-gris">Panel de control</h1>
                        <abbr title="Los reportes se generan apartir de todos los resultados mostrados en el panel (Nominas,personal,postulantes, ofertas)">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm" >
                            <i class="fas fa-download fa-sm"></i> Generar Reporte</a></abbr>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Personal Contratado</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php $query = mysqli_query($conexion, "SELECT count(id_personal) from personal WHERE Estatus='Activo';");
                                               $data = mysqli_fetch_array($query);
                                                         echo $data[0];  ?> <!-- Numero total de perosnal contratado revergy -->
                                        </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <!-- Estadisticas: Oferta/Vacante-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ofertas / Vancates
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php $query = mysqli_query($conexion, "SELECT count(id_oferta) from ofertas");
                                                        $data = mysqli_fetch_array($query);
                                                         echo $data[0];  ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Nominas (Mensuales)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$00.00</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Estadisticas Solicitudes disponibles -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Solicitudes Pendientes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php $query = Query("SELECT count(id_solicitud) from postula_oferta WHERE estado_postulacion='Pendiente'");
                                               $data = mysqli_fetch_array($query);
                                                         echo $data[0];  ?> <!-- Numero total de perosnal contratado revergy --></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope fa-fw fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Pie Chart -->
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <!-- Color System -->
                            <!-- Color System fin-->
                        </div>
                        <div class="col-lg-6 mb-4">
                            <!-- Illustrations -->
                            <!--<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informacion</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="../images/logo_revergy.png" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>-->

                            <!-- Approach -->
        

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<?php include_once "includes/footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


</body>

</html>