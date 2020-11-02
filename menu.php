<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Menú | Plazoleta</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../img/favicon.png" />
  <script src="/js/all.js"></script>
  <link rel="stylesheet" href="/css/letra1.css">
  <link rel="stylesheet" href="/css/letra2.css">
  <link rel="stylesheet" href="/css/estiloss.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/imagen.css">
  <link rel="stylesheet" href="/css/letra.css">
  <link rel="stylesheet" href="/css/fuentesplaz.css">
  <script src="js/jquery-3.5.1.js"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
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
  <!-- Page Content -->
  <div class="container" id="letra">
    <br>
    <!-- .......................Menú..................-->
    <!-- Header -->
    <?php
    include_once 'dao/conexion.php';
    //Mostrar los datos almacenados
    $sql_mostrar = "SELECT * FROM tbl_menu";
    //Prepara sentencia
    $Consultar_mostrar = $pdo->prepare($sql_mostrar);
    //Ejecutar consulta
    $Consultar_mostrar->execute();
    $resultado_mostrar = $Consultar_mostrar->fetchAll();
    //Imprimir var dump -> Arreglos u objetos
    ?>
    <header class="bg-primary text-center py-5 mb-4">
      <div class="container"><br><br>
        <h1 class="tituloplaz">Menú</h1>
      </div>
    </header>
    <center>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <b>
            <p class="fplazs">Índice</p>
          </b>
          <u><a class="nav-link indiplaz" href="#item-5">Especial del día</a></u>
          <u><a class="nav-link indiplaz" href="#item-1">Entradas</a></u>
          <u><a class="nav-link indiplaz" href="#item-2">Platos fuertes</a></u>
          <u><a class="nav-link indiplaz" href="#item-3">Bebidas</a></u>
          <u><a class="nav-link indiplaz" href="#item-4">Menú infantil</a></u>
        </div>
      </div>
      <center>
        <p id="item-5"></p><br><br>
        <center>
          <p class="tituloplaz" align="center">Especial del día</p>
          <p class="ppplaas">Platos que no se encuentran generalmente en el menú.</p>
        </center>
        <div class="container">
          <div class="row">
            <?php foreach ($resultado_mostrar as $datos) {
              if ($datos['tbl_tipo_plato_idtbl_tipo_plato'] == 1) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <img class="card-img-top rounded" src="<?php echo $datos['url_foto']; ?>" alt="">
                      <h4 class="card-title">
                        <p class="nombreplato"><?php echo $datos['plato'] ?></p>
                      </h4>
                      <p class="desplato"><?php echo $datos['descripcion_plato'] ?></p>
                      <p class="preplato">$<?php echo $datos['precio_plato'] ?></p>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

        <p id="item-1"></p><br><br>
        <p class="tituloplaz" align="center">Entradas</p>
        <p align="center" class="ppplaas">Comida ligera que se toma para abrir el apetito, antes de la comida principal del mediodía o antes de la cena.</p>
        <!-- Page Content -->
        <div class="container">
          <div class="row">
            <?php foreach ($resultado_mostrar as $datos) {
              if ($datos['tbl_tipo_plato_idtbl_tipo_plato'] == 2) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <img class="card-img-top rounded" src="<?php echo $datos['url_foto']; ?>" alt="">
                      <h4 class="card-title">
                        <p class="nombreplato"><?php echo $datos['plato'] ?></p>
                      </h4>
                      <p class="desplato"><?php echo $datos['descripcion_plato'] ?></p>
                      <p class="preplato">$<?php echo $datos['precio_plato'] ?></p>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

        <p id="item-2"></p><br><br>
        <p class="tituloplaz" align="center">Platos fuertes</p>
        <p class="ppplaas">Estos platos van acompañados de papas rústicas, criollas o francesas,
          arepa de queso y ensalada de maicitos. Rábanos encurtidos, tomate cherry, zanahoria y mezcla de lechugas.</p>
        <!-- Page Content -->
        <!-- Page Content -->
        <div class="container">
          <div class="row">
            <?php foreach ($resultado_mostrar as $datos) {
              if ($datos['tbl_tipo_plato_idtbl_tipo_plato'] == 3) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <img class="card-img-top rounded" src="<?php echo $datos['url_foto']; ?>" alt="">
                      <h4 class="card-title">
                        <p class="nombreplato"><?php echo $datos['plato'] ?></p>
                      </h4>
                      <p class="desplato"><?php echo $datos['descripcion_plato'] ?></p>
                      <p class="preplato">$<?php echo $datos['precio_plato'] ?></p>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

        <p id="item-3"></p><br><br>
        <p class="tituloplaz" align="center">Bebidas</p>
        <p class="ppplaas">Bebidas naturales, bebidas gaseosas y bebidas alcohólicas.</p>
        <!-- Page Content -->
        <div class="container">
          <div class="row">
            <?php foreach ($resultado_mostrar as $datos) {
              if ($datos['tbl_tipo_plato_idtbl_tipo_plato'] == 4) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <img class="card-img-top rounded" src="<?php echo $datos['url_foto']; ?>" alt="">
                      <h4 class="card-title">
                        <p class="nombreplato"><?php echo $datos['plato'] ?></p>
                      </h4>
                      <p class="desplato"><?php echo $datos['descripcion_plato'] ?></p>
                      <p class="preplato">$<?php echo $datos['precio_plato'] ?></p>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

        <p id="item-4"></p><br><br>
        <p class="tituloplaz" align="center">Menú infantil</p>
        <p class="ppplaas">Platos especialmente para niños.</p>
        <!-- Page Content -->
        <div class="container">
          <div class="row">
            <?php foreach ($resultado_mostrar as $datos) {
              if ($datos['tbl_tipo_plato_idtbl_tipo_plato'] == 5) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <img class="card-img-top rounded" src="<?php echo $datos['url_foto']; ?>" alt="">
                      <h4 class="card-title">
                        <p class="nombreplato"><?php echo $datos['plato'] ?></p>
                      </h4>
                      <p class="desplato"><?php echo $datos['descripcion_plato'] ?></p>
                      <p class="preplato">$<?php echo $datos['precio_plato'] ?></p>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

  </div>
  <div class="container">
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