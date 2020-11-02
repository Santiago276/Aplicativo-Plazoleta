<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/img/favicon.png" />
    <link rel="stylesheet" href="/css/inicio.css">
    <script src="js/all.js"></script>
    <link rel="stylesheet" href="/css/letra1.css">
    <link rel="stylesheet" href="/css/letra2.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/letra.css">
    <link rel="stylesheet" href="/css/estiloss.css">
    <link rel="stylesheet" href="/css/fuentesplaz.css">
    <script src="js/jquery-3.5.1.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
  <title>Iniciar Sesión | Plazoleta</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
</head>

<body id="page-top" style="background-color: rgb(255, 227, 203);">
  <!-- Navbar-->
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
    require_once '../Navbar/navbar_invi.php';
  }
  ?>
  <br>
  <br>
  <!-- Formulario inicio de sesion-->
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <p>Bienvenidos a la Plazoleta Marinilla, Iniciar sesión</p>
                <form action="../Controladores/iniciar_Sesion.php" method="POST" autocomplete="on">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Correo" required autofocus>
                    <label for="inputEmail">Correo</label>
                  </div>

                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="contrasena" class="form-control" placeholder="Contraseña" required>
                    <label for="inputPassword">Contraseña</label>
                  </div>

                  <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Iniciar sesión <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                      <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg></button>
                  <div class="text-center">
                    <a href="../Usuario/registro.php" type="submit">
                      <p class="/Plazoleta/dpieplaz">¿No tienes cuenta? crea una aquí</p>
                    </a></div>
                </form>
              </div>
            </div>
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
  <div class="container-fluid">
</body>

</html>