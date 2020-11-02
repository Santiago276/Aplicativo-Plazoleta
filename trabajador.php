<?php
session_start();

if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
  include_once 'dao/conexion.php';
  $id = $_SESSION["correo_usu"];
  $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id' ";
  $consulta_resta = $pdo->prepare($sql_inicio);
  $consulta_resta->execute();
  $resultado = $consulta_resta->rowCount();
  $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
  //Llamar a la conexion base de datos
  include_once 'dao/conexion.php';
  //Mostrar los datos almacenados
  $sql_mostrar = "SELECT * FROM tbl_reserva";
  //Prepara sentencia
  $Consultar_mostrar = $pdo->prepare($sql_mostrar);
  //Ejecutar consulta
  $Consultar_mostrar->execute();
  $resultado_mostrar = $Consultar_mostrar->fetchAll();
  //Imprimir var dump -> Arreglos u objetos

  //Mostrar los datos almacenados
  $sql_mostrarm = "SELECT * FROM tbl_menu";
  //Prepara sentencia
  $Consultar_mostrarm = $pdo->prepare($sql_mostrarm);
  //Ejecutar consulta
  $Consultar_mostrarm->execute();
  $resultado_mostrarm = $Consultar_mostrarm->fetchAll();
  //Imprimir var dump -> Arreglos u objetos
?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Trabajador | Plazoleta</title>
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
    <?php require_once 'Navbar/navbar_usu.php'; ?><br>
    <!-- End of Topbar -->
    <!-- /.container-fluid -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <br>
          <br>
          <h4 align="center" class="tblplazz">Reservas</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" align="center">
              <thead align="center">
                <tr align="center"></tr>
                <th>Fecha de la reserva</th>
                <th>Hora</th>
                <th>Ocasión</th>
                <th>Número de personas</th>
                <th>Mensaje</th>
                <th>Fecha del registro</th>
                <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($resultado_mostrar as $datos) { ?>
                  <tr align="center">
                    <td><?php echo $datos['fecha_reserva']; ?></td>
                    <td><?php echo $datos['hora_reserva']; ?></td>
                    <td><?php echo $datos['ocasion_reserva']; ?></td>
                    <td><?php echo $datos['cantidad_personas']; ?></td>
                    <td><?php echo $datos['mensaje']; ?></td>
                    <td><?php echo $datos['fecha_registro']; ?></td>
                    <?php
                    if ($datos['estado_reserva'] == 1) {
                    ?>
                      <td><b>Pago pendiente</b></td>
                    <?php
                    } else if ($datos['estado_reserva'] == 2) {
                    ?>
                      <td><b>Pendiente</b></td>
                    <?php
                    } else if ($datos['estado_reserva'] == 3) {
                    ?>
                        <td><b>Completada</b></td>
                  </tr>
                  <?php
                    }
                    ?>
                  </tr>
              </tbody>
            <?php } ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white" id="letra">
      <div class="container"><small>Plazoleta © Tu sitio web 2020</small></div>
    </div>
    <!-- Bootstra -->
    </div>
    <!-- /.container-fluid -->
    <!-- Bootstrap core JavaScript-->
    <script src="dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="dashboard/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="dashboard/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="dashboard/js/demo/chart-area-demo.js"></script>
    <script src="dashboard/js/demo/chart-pie-demo.js"></script>
    <script src="dashboard/js/demo/chart-bar-demo.js"></script>
  </body>

  </html>
<?php

} else {
  echo "<script> document.location.href='dashboard/404.php';</script>";
}

?>