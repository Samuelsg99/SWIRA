<?php

include_once "includes/header.php";
include_once "../Modelo/funciones.php";
 
$consulta_datos = Query("SELECT p.id_postulante,p.nombre_completo,p.perfil,p.sexo,p.estado_civil,p.edad,u.correo,u.imagen_perfil,p.telefono 
  FROM postulantes p INNER JOIN usuario u ON u.idusuario = p.fk_usuario WHERE u.idusuario = '{$_SESSION['usuario']['idUser']}'");

if(mysqli_num_rows($consulta_datos) > 0){
  $datos = mysqli_fetch_assoc($consulta_datos);
}else{ header("location: index.php");}

?>
    <link rel="stylesheet" type="text/css" href="css/estilos_postulante.css">
    <div class="container-fluid">
      <div class="d-sm-flex card shadow mb-4 border-left-info">
        <div class="card-body alinear-contenido-izquierda">
          <h2 class="h4 mb-0 text-title-formal text-color-tema2"><i class="fas fa-user-tag"></i> Perfil postulante</h2> 
          <div class="alinear-item-derecha">
            <a href="index.php" class="btn btn-outline-primary btn-sm"><i class="fas fa-undo-alt"></i> Regresar</a>
          </div>
        </div>
      <!--   <div class="subcard">
         |  <strong>Estado: <?php estado_solicitud($datos['id_postulante']) ?></strong>
         |  <strong>Fecha de solictud:  </strong><span class="badge badge-pill badge-primary"><?php echo date("d-M-Y", strtotime($datos['fecha_postulacion']));?></span>
         |  <strong>Postulado a:</strong> <span class="badge badge-pill badge-primary"><?php echo $datos['vacante'];?></span>
       </div> -->
     </div>
   </div>

  <div class="cv-block block-intro gradiente">
    <div class="avatar">
      <img class="image"  src="../images/perfiles/<?php echo $datos['imagen_perfil']?>"/>
    </div>
    <div class="card-perfil-name">
      <span class="h4"><strong><?php echo $datos['nombre_completo']; ?></strong></span>
      <h5><span class="text-center h5 badge badge-dark"><strong><?php echo $datos['perfil']; ?></strong></span></h5>
    </div>

    <button type="button" class="btn btn-primary btn-sm descargar_personal" data-id="<?php echo $_GET['id'];?>" id="CV"><i class="fas fa-download"></i> CV</button>

    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modal_entrevista"><span>
      <i class="fas fa-clipboard-list"></i> Entrevista</span></button>
<!-- 
    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modal_entrevista"><span>
      <i class="fas fa-bell"></i> Alertas</span></button> -->


  </div>

      <!-- Datos Generales y perosnales del postulante -->

      <div class="row alinear-contenido">
        <div class="col-md-9">
            <table class="table2 shadow">
              <tr>
                <th><h5 class="text-center"><b><i class="fa-solid fa-user-large"></i> Datos Personales</b></h5></th>


              </tr>
              <tr>
                <th class="text-parrafo">Nombre(s)</th>
                <th class="text-parrafo">Perfil</th>
                <th class="text-parrafo">Sexo</th>
                <th class="text-parrafo">Estado Civil</th>
                <th class="text-parrafo">Edad</th>
                <th class="text-parrafo">Correo</th>
                <th class="text-parrafo">Telefono</th>
                <th class="text-parrafo"><i class="fas fa-id-card"></i> Licencia conducir</th>
                <th class="text-parrafo"><i class="fas fa-id-card"></i> INE</th>
              </tr>
              <tr>
                <td  class="text-parrafo"><?php echo $datos['nombre_completo'];?></td>
                <td  class="text-parrafo"><?php echo $datos['perfil'];?></td>
                <td  class="text-parrafo"><?php echo $datos['sexo'];?></td>
                <td  class="text-parrafo"><?php echo $datos['estado_civil'];?></td>
                <td  class="text-parrafo"><?php echo $datos['edad'];?></td>
                <td  class="text-parrafo"><?php echo $datos['correo'];?></td>
                <td  class="text-parrafo"><?php echo $datos['telefono'];?></td>
                <td  class="text-parrafo">
                  <button type="button" class="btn btn-primary btn-sm descargar_personal" data-id="<?php echo $_GET['id'];?>" id="LICENCIA">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir Licencia
                  </button>
                </td>
                <td class="text-parrafo">
                  <button type="button" class="btn btn-primary btn-sm descargar_personal" data-id="<?php echo $_GET['id'];?>" id="INE">
                      <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir INE
                  </button>
                </td>
              </tr>
            </table> 
          </div>

        </div>
      </div>

<!-- Fin tabla -->
<!-- Seccion de experiencia laboral y formaciones -->

      <section class="cv-block info">
        <div class="container">

          <!-- Experiencia Laboral -->
          <div class="work-experience group" id="work-experience">
            <br>
            <h2 class="text-left"><i class="fa-solid fa-briefcase"></i> Experiencia laboral</h2>
            <div class="item">
              <div class="row">
                <div class="col-md-6">
                  <h3>Web Developer</h3>
                  <h4 class="organization">Amazing Co.</h4>
                </div>
                <div class="col-md-6">
                  <time class="period">10/2013 - 04/2015</time>
                </div>
              </div>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget velit ultricies, feugiat est sed, efficitur nunc, vivamus vel accumsan dui.</p>
            </div>
          </div>

          <!-- Formaciones academicas / Profecionales -->

          <div class="education group" id="education">
            <h2 class="text-left"><i class="fa-solid fa-graduation-cap"></i> Formaciones Academicas / Profesionales</h2>
            <div class="item">
              <div class="row">
                <div class="col-md-6">
                  <h3>High School</h3>
                  <h4 class="organization">Albert Einstein School</h4>
                </div>
                <div class="col-md-6">
                  <time class="period">09/2005 - 05/2010</time>
                </div>
              </div>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget velit ultricies, feugiat est sed, efficitur nunc, vivamus vel accumsan dui.</p>
            </div>

          </div>
        </div>
      </section>


      <footer class="page-footer"><?php include_once "includes/footer.php"; ?></footer>
      <script src="js/acciones_postulante.js"></script>

 
      <!-- Modal Agregar Usuario Revergy -->
      <div class="modal fade" id="Modal_entrevista" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header justify-modal">
              <header class="alinear-contenido-izquierda">
                <img class="img-thumbnail" src="../images/logo_RH.png" width="90px"/>
                <h5 class="modal-title text-title-header"><u>Asignaciones de entrevistas</u></h5>
              </header>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!--Cuerpo del modal --> 
            <div class="modal-body">
          
              <div class="input-group mb-3">
                <strong class="text-labels">Nombre: 
                <label class="text-parrafo5 text-color-gris"> <?php echo $datos['nombre_completo'] ?></label></strong>
              </div>
              <div class="input-group mb-3">
                <strong class="text-labels">Postulado a vacante:  
                <label class="text-parrafo5 text-color-gris"> <?php echo $datos['vacante'] ?></label></strong>
              </div>

              <div class="input-group mb-3">
               <strong class="text-labels">Correo: 
               <label class="text-parrafo5 text-color-gris"> <?php echo $datos['correo'] ?></label></strong> 
             </div>

             <div class="input-group mb-3">
              <strong class="input-group-text text-labels">Resposable</strong>
              <select id="responsable" class="form-control form-select text-parrafo5"> 
                <?php
                $query = mysqli_query($conexion,"SELECT id_departamento,responsable FROM departamentos");
                while ($valores = mysqli_fetch_array($query)){
                  echo '<option value="'.$valores[0].'">'.$valores[1].'</option>'; }?>
                </select>
            </div>

             <div class="modal-footer">
              <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit" ></i>Asignar</button>
              <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">
                <i class="fas fa-times"></i> Cerrar</button> 
              </div>

            </div>
          </div>
        </div>
      </div>



          <!-- Seccion habilidades -->
          <!-- <div class="group" id="skills">
            <div class="row">
              <div class="col-md-6">
                <div class="skills info-card">
                  <h2>Skills</h2>
                  <h3>HTML</h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    </div>
                  </div>
                  <h3>PHP</h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:90%">
                    </div>
                  </div>
                  <h3>JavaScript</h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:80%">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="contact-info info-card">
                  <h2>Contact Info</h2>
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-android-calendar icon"></i>
                    </div>
                    <div class="col-9">
                      <span>10/10/1990</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                        <i class="ion-person icon"></i>
                    </div>
                    <div class="col-9">
                      <span>John Smith</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-ios-telephone icon"></i>
                    </div>
                    <div class="col-9">
                      <span>+235 3217 424</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-at icon"></i>
                    </div>
                    <div class="col-9">
                      <span>lorem@email.com</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
 -->


       <!--    <div class="hobbies group" id="hobbies">
            <h2 class="text-center">Hobbies</h2>
            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras risus ligula, iaculis ut metus sit amet, luctus pharetra mauris. Aliquam purus felis, pretium vel pretium vitae, dapibus sodales ante. Suspendisse potenti. Duis nunc eros.</p>
          </div> -->

       