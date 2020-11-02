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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¿Quiénes somos? | Plazoleta</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="/img/favicon.png" />
  <script src="js/all.js"></script>
  <link rel="stylesheet" href="/css/letra1.css">
  <link rel="stylesheet" href="/css/letra2.css">
  <link rel="stylesheet" href="/css/registro.css">
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/prueba.css">
  <link rel="stylesheet" href="/css/letra.css">
  <link href="/css/styles.css" rel="stylesheet" />
  <script src="js/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="/css/fuentesplaz.css" <link rel="stylesheet" href="/css/letra.css">
  <link rel="stylesheet" href="/css/estiloss.css">
  <link rel="stylesheet" href="/css/fuentesplaz.css">
</head>

<body id="page-top" style="background-color: rgb(255, 227, 203);">
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
  ?>
  <section class="page-section portfolio" id="portfolio" id="letra">
    <div class="container">
      <br> <br>
      <div class="text-center" style="background-color: rgb(255, 227, 203);">
        <p class="tituloplaz">Creadores</p>
      </div>
      <!-- Icon Divider-->
      <div class="divider-custom">
        <div class="divider-custom-line" style="background-color: rgb(0, 0, 0);"></div>
        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
        </svg>
        <div class="divider-custom-line" style="background-color: rgb(0, 0, 0);"></div>
      </div>
      <!-- Portfolio Grid Items-->
      <div class="row justify-content-center" id="letra">
        <!-- Portfolio Items-->
        <div id="circular--square" class="circular--square">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal0">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-40 w-40">
              <div class="portfolio-item-caption-content text-center text-white"></div>
            </div><img class="circular--landscape" src="img/santiago2.jpg" alt="Santiago Gómez Duque" />
            <p class="nombreplaz">Santiago Gómez Duque</p>
            <p class="desplaz">Se encarga de la base de datos y ayuda a codificar en PHP</p>
          </div>
        </div>
        <br>
        <br>
        <div id="marco2" class="img11">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-40 w-40">
              <div class="portfolio-item-caption-content text-center text-white"></div>
            </div><img class="circular--landscape" src="img/heider.jpg" alt="Heider Alexis Giraldo Vásquez" />
            <p class="nombreplaz">Heider Alexis Giraldo Vásquez</p>
            <p class="desplaz">Se encarga de codificar con PHP</p>
          </div>
        </div>
        <br>
        <br>
        <div id="marco2" class="img11">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-40 w-40">
              <div class="portfolio-item-caption-content text-center text-white"></div>
            </div><img class="circular--landscape" src="img/karen.jpg" alt="Karen Melisa Olmos Figueroa" />
            <p class="nombreplaz">Karen Melissa Olmos Figueroa</p>
            <p class="desplaz">Se encarga de codificar con PHP</p>
          </div>
        </div>
        <br>
        <br>
        <div id="marco2" class="img11">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-40 w-40">
              <div class="portfolio-item-caption-content text-center text-white"></div>
            </div>
            <img class="circular--landscape" src="img/juanjo.jpg" alt="Juan José Martínez Rincón" />
            <p class="nombreplaz">Juan José Martínez Rincón</p>
            <p class="desplaz">Se encarga de maquetar</p>
          </div>
        </div>
      </div>
    </div>
    </div>
    <p class="nombreplaz">¿Nos quieres apoyar?</p>
    <center>
      <form action="https://www.paypal.com/donate" method="post" target="_blank">
        <input type="hidden" name="hosted_button_id" value="TGFT8DY8CNC9U" />
        <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/es_ES/i/scr/pixel.gif" width="1" height="1" />
      </form>
    </center>
    <br>
    <!--- Contact Section-->
    <section class="page-section" id="contact" id="letra">
      <div class="container">
        <!-- Contact Section Heading-->
        <p class="tituloplaz">Contáctanos</p>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line" style="background-color: rgb(0, 0, 0);"></div>
          <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
          </svg>
          <div class="divider-custom-line" style="background-color: rgb(0, 0, 0);"></div>
        </div>
        <div class="container" id="letra">
          <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
              <div class="card card-signin my-5">
                <div class="card-body">
                  <form class="form-signin" method="POST" action="contactenos/enviar.php">
                    <div class="form-label-group">
                      <input type="text" id="inputName" class="form-control" name="nombre" placeholder="Nombre *" onkeypress="return Sololetras(event)" onpaste="return false" required>
                      <label for="inputName">Nombre *</label>
                    </div>
                    <div class="form-label-group">
                      <input type="email" id="inputCorreo" class="form-control" name="correo" placeholder="Correo *" required>
                      <label for="inputCorreo">Correo *</label>
                    </div>
                    <div class="form-label-group">
                      <input type="number" id="inputTelefono" class="form-control" name="telefono" placeholder="Telefono">
                      <label for="inputTelefono">Teléfono / Celular</label>
                    </div>
                    <div class="form-label-group">
                      <input type="text" id="inputMensaje" class="form-control" name="mensaje" placeholder="Mensaje *" onkeypress="return Sololetras(event)" onpaste="return false" required>
                      <label for="inputMensaje">Mensaje *</label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" name="enviar" type="submit">Enviar Mensaje</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white" id="letra">
          <div class="container"><small>Plazoleta © Tu sitio web 2020</small></div>
        </div>
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

</html>