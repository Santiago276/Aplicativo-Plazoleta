<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">

  <script>
    function Sololetras(e) {

      key = e.keycode || e.which;
      teclado = String.fromCharCode(key).toLowerCase();

      usuario = "  abcdefghijklmnñopqrstuvwxyz";

      especiales = "8-37-39-46-164"; //aray

      teclado_especial = false;

      for (var i in especiales) {

        if (key == especiales[i]) {
          teclado_especial = true;
          break;

        }

      }

      if (usuario.indexOf(teclado) == -1 && !teclado_especial) {
        return false;

      }
    }
  </script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Inicio | Plazoleta</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="img/favicon.png" />
  <script src="js/all.js"></script>
  <link rel="stylesheet" href="css/letra1.css">
  <link rel="stylesheet" href="css/letra2.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/letra.css">
  <link rel="stylesheet" href="css/carrusel.css">
  <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="css/estiloss.css">
  <link rel="stylesheet" href="css/fuentesplaz.css">
  <script src="js/jquery-3.5.1.js"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top" style="background-color: rgb(255, 227, 203);">
  <!-- Modal -->
  <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
              <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg></a>
        </div>
        <div class="modal-body">
          <img class="card-img-top" src="/img/bienvenido.png">
          <br>
          <center>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!--/Modal -->
  <script>
    $(document).ready(function() {
      $("#mostrarmodal").modal("show");
    });
  </script>
  <?php if (!isset($_GET['id'])) { ?>
    <script>
      $(document).ready(function() {
        $('.toast').toast('show');
      });
    </script><?php  } ?>
  <!-- Navigation-->
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once 'dao/conexion.php';
    $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id' AND estado_usu = '1' ";
    $consulta_resta = $pdo->prepare($sql_inicio);
    $consulta_resta->execute();
    $resultado = $consulta_resta->rowCount();
    $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
    //Validacion de roles
    if ($resultado) {
      $rol = $prueba->roles_idroles;
      if ($rol == 1) {
        require_once 'Navbar/navbar_admin.php';
      } else if ($rol == 2) {
        require_once 'Navbar/navbar_cli.php';
      } else if ($rol == 3) {
        require_once 'Navbar/navbar_usu.php';
      }
    } else {
      require_once 'Controladores/Cerrar_Sesion2.php';
    }
  } else {
    require_once 'Navbar/navbar_invi.php';
  }
  include_once 'dao/conexion.php';
  //Mostrar los datos almacenados
  $sql_mostrar = "SELECT * FROM tbl_restaurante";
  //Prepara sentencia
  $Consultar_mostrar = $pdo->prepare($sql_mostrar);
  //Ejecutar consulta
  $Consultar_mostrar->execute();
  $resultado_mostrar = $Consultar_mostrar->fetchAll();
  ?>
  <!-- Masthead-->
  <header>
    <br><br><br><br>
    <center>
      <div aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="100000">
          <div class="toast-header">
            <img width="30px" src="/img/íconos/reserva.png">
            <strong class="mr-auto toasttplaz">¿Quieres reservar?</strong>
            <small></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            <center><strong class="toasttplaz"></strong></center>
            <p class="toastplaz">Crea una cuenta <a href="/Usuario/registro.php">(aquí)</a> e inicia sesión para reservar</p>
          </div>
        </div>
      </div>
    </center>
    <div class="container d-flex align-items-center flex-column" id="letra">
      <!-- Masthead Avatar Image-->
      <img class="circular--landscape" src="img/logo.png" width="300" alt="" />
      <!-- Icon Divider-->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading-->
      <p class="fplaz">Mil sabores en un solo lugar.</p>
  </header>
  <!-- Page Content -->
  <div class="container">

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img size="5" class="img-fluid rounded" src="img/redwine.jpg" alt="">
      </div>

      <div class="col-md-4">
        <p class="fplaz">Descripción</p>
        <p class="pplaz">Es un local ubicado en el municipio de Marinilla, Antioquia. Ofrece servicios
          relacionados con eventos,
          fechas especiales, domicilios y otros productos de la carta como café, parrilla y bar.
          Es un espacio bastante acogedor, busca dar al usuario una experiencia de tranquilidad, armonía y cercanía.
          Dispuesto a prestar espacios para reuniones familiares, encuentros, y ocasiones especiales.
          Bienvenidos.</p>
      </div>
    </div>
  </div><br>
  <p class="tituloplaz">Nuestra ubicación</p>
  <div class="container">
    <div class="row">
      <br> <br>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.67628765046!2d-75.33695148618608!3d6.174075898120659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e46a1909f748083%3A0x9ab43fd52d06c491!2sLA%20PLAZOLETA%20-%20caf%C3%A9%20parrilla%20bar!5e0!3m2!1ses-419!2sco!4v1601427895927!5m2!1ses-419!2sco" width="800" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>
  <br>
  <br>
  <!-- Footer-->
  <footer class="footer text-center">
    <div class="container" id="letra">
      <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsugerencias">Cuéntanos tu experiencia</a><br><br>
      <div class="row">
        <!-- Footer Location-->
        <?php foreach ($resultado_mostrar as $datos) { ?>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <p class="pieplaz">Nit</p>
            <p class="dpieplaz">
              <?php echo $datos['nit_resta'] ?>
            </p>
          </div>
          <!-- Footer Social Icons-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <p class="pieplaz">Redes sociales</p>
            <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/laplazoletacafeparrillabar/" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/laplazoletacafeparrillabar/" target="_blank"><i class="fab fa-fw fa-instagram"></i></a>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <p class="pieplaz">Teléfono</p>
            <p class="dpieplaz">
              <?php echo $datos['telefono_resta'] ?>
            </p>
          </div>
      </div>
    </div>
  </footer>
<?php } ?>
</div>
<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white" id="letra">
  <div class="container"><small>Plazoleta © Tu sitio web 2020</small></div>
</div>

<!-- Contador de visitas -->
<center>
  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Contador de visitas
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <center>
        <center> <img src="https://www.cerotec.net/contador.php?t=1&s=3&i=135606" alt="www.cerotec.net"></center>
        <br>
      </center>
    </div>
  </div>
</center>
<!-- Fin Contador de visitas -->

<br>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->
<script src="assets/mail/jqBootstrapValidation.js"></script>
<script src="assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
<!-- Modal -->
<div class="modal" id="modalsugerencias" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg></a>
      </div>
      <div class="modal-body">
        <?php
        //Llamar a la conexion base de datos
        //Imprimir var dump -> Arreglos u objetos
        //Captura de información
        if ($_POST) {
          $nombresg = $_POST['nombresug'];
          $telefonosg = $_POST['telefonosug'];
          $correosg = $_POST['correosug'];
          $mensajesg = $_POST['mensajesug'];

          //sentencia Sql
          $sql_insertar = "INSERT INTO tbl_sugerencias (nombre_sug, telefono_sug, correo_sug, mensaje_sug)VALUES (?,?,?,?)";
          //Preparar consulta
          $consulta_insertar = $pdo->prepare($sql_insertar);
          //Ejecutar la sentencia
          $consulta_insertar->execute(array($nombresg, $telefonosg, $correosg, $mensajesg));
          echo "<script>alert('Mensaje enviado correctamente');</script>";
        }
        ?>
        <b>
          <p class="card-title text-center tituloplaz">Sugerencias</p>
        </b>
        <center>
          <p pplaz>Para la Plazoleta es importante conocer sus opiniones, quejas, comentarios y sugerencias. Te invitamos a escribirlas en el siguiente formulario</p>
        </center>
        <div class="container">
          <center>
            <form class="form-signin" method=POST>
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="nombresug" class="form-control" placeholder="Nombre" onkeypress="return Sololetras(event)" onpaste="return false" required autofocus>
                <label for="inputEmail">Nombre*</label>
              </div>

              <div class="form-label-group">
                <input type="number" id="inputPassword" name="telefonosug" class="form-control" placeholder="Teléfono" onkeypress="return Sololetras(event)" onpaste="return false" required>
                <label for="inputPassword">Telefono*</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputPhone" name="correosug" class="form-control" placeholder="Correo" required>
                <label for="inputPhone">Correo*</label>
              </div>

              <div class="form-label-group">
                <input type="text" id="inputMessage" name="mensajesug" class="form-control" placeholder="Mensaje" onkeypress="return Sololetras(event)" onpaste="return false" required>
                <label for="inputMessage">Mensaje*</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Enviar</button>
            </form>
          </center>
        </div>

</html>