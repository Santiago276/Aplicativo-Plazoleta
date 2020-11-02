<?php
session_start();

if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
?>
  <?php
  //Llamar a la conexion base de datos
  include_once '../dao/conexion.php';
  //Imprimir var dump -> Arreglos u objetos 
  //Captura de información
  if ($_POST) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $numpersonas = $_POST['numero_personas'];
    $nummenores = $_POST['menores_reserva'];
    $mensaje = $_POST['mensaje'];
    $telefono = $_POST['telefono_reserva']; 
    $ocasion = $_POST['ocasion_reserva'];
    $estado = '1';
    //sentencia Sql
    $sql_insertar = "INSERT INTO tbl_reserva (nombre_reserva,apellido_reserva,fecha_reserva,hora_reserva,cantidad_personas,mensaje,telefono_reserva,ocasion_reserva,estado_reserva,menores_reserva)
    VALUES (?,?,?,?,?,?,?,?,?,?)";
    //Preparar consulta
    $consulta_insertar = $pdo->prepare($sql_insertar);
    //Ejecutar la sentencia
    $consulta_insertar->execute(array($nombre,$apellido,$fecha, $hora, $numpersonas, $mensaje, $telefono, $ocasion, $estado,$nummenores));
    echo "<script>alert('Reserva completada con éxito');</script>";
    echo "<script> document.location.href='reserva.php';</script>";
  }
  $id = $_SESSION["correo_usu"];
  $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id' ";
  $consulta_resta = $pdo->prepare($sql_inicio);
  $consulta_resta->execute();
  $resultado = $consulta_resta->rowCount();
  $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
  //Validacion de roles
  if ($resultado) {
    $Nombre = $prueba->nombre_usu . " " . $prueba->apellido_usu;
  }
  ?>
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
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/img/favicon.png" />
    <script src="/js/all.js"></script>
    <link rel="stylesheet" href="/css/letra1.css">
    <link rel="stylesheet" href="/css/letra2.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/letra.css">
    <link rel="stylesheet" href="/css/carrusel.css">
    <link rel="stylesheet" href="/css/registro.css">
    <link rel="stylesheet" href="/css/estiloss.css">
    <link rel="stylesheet" href="/css/fuentesplaz.css">
    <script src="/js/jquery-3.5.1.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <title>Reservar | Plazoleta</title>
  </head>

  <body style="background-color: rgb(255, 227, 203);">


    <?php require_once '../Navbar/navbar_cli.php'; ?>
    <br>
    <br>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <b>
                <p class="card-title text-center tituloplaz">Reserva</p>
              </b>
              <p pplaz>Para hacer sus reservas por favor llene todos los campos del formulario
                de esta sección. Contáctenos al número 3208984729
                para confirmar su reserva.</p>
              <br>
              <center>
                <p>¡Gracias por elegirnos!</p>
              </center>
              <form class="form-signin" method="POST">
                <!--FORMULARIO DE REGISTRO-->
                <div class="form-label-group">
                  <input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Digite su nombre" onkeypress="return Sololetras(event)" onpaste="return false" required autofocus>
                  <label for="inputNombre">Digite su nombre</label>
                </div>
                <div class="form-label-group">
                  <input type="text" id="inputApellido" name="apellido" class="form-control" placeholder="Digite su apellido" onkeypress="return Sololetras(event)" onpaste="return false" required>
                  <label for="inputApellido">Digite su apellido</label>
                </div>
                <div class="form-label-group">
                  <input type="Date" id="inputFecha" name="fecha" class="form-control" placeholder="Fecha" min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required autofocus>
                  <label for="inputFecha">Fecha</label>
                </div>
                <div class="form-label-group">
                  <input type="Time" id="inputPassword" name="hora" class="form-control" placeholder="Hora" required>
                  <label for="inputPassword">Hora</label>
                </div>
                <div class="form-label-group">
                  <input type="number" id="inputNumero" name="numero_personas" class="form-control" placeholder="Número de personas" required>
                  <label for="inputNumero">Número de personas</label>
                </div>
                <div class="form-label-group">
                  <input type="number" id="inputmenores" name="menores_reserva" class="form-control" placeholder="Número de infantes " required>
                  <label for="inputmenores">Número de infantes (menor de 5 años)</label>
                </div>
                <div class="form-label-group">
                  <input type="number" id="inputTelefono" name="telefono_reserva" class="form-control" placeholder="Telefono" required>
                  <label for="inputTelefono">Digite su teléfono</label>
                </div>
                <div class="form-label-group">
                  <input type="text" id="inputMensaje" name="mensaje" class="form-control" placeholder="Mensaje (opcional)" onkeypress="return Sololetras(event)" onpaste="return false">
                  <label for="inputMensaje">Mensaje u observación</label>
                </div>
                <div class="form-label-group">
                  <select name="ocasion_reserva" class="form-control" required>
                    <option value="" disabled selected>Seleccione la ocasión de la reserva</option>
                    <option value="Cumpleaños">Cumpleaños</option>
                    <option value="Reserva de mesa">Reserva de mesa normal</option>
                    <option value="Evento social">Evento social</option>
                  </select>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Reservar ahora</button>
                <br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <!-- Sección de copyright-->
    <div class="copyright py-4 text-center text-white">
      <div class="container"><small>Plazoleta © Tu sitio web 2020</small></div>
    </div>

    <!-- Mejora de alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../js/sweetAlert.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="../assets/mail/jqBootstrapValidation.js"></script>
    <script src="../assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
  </body>

  <!-- Modal -->
  <div class="modal" id="fotoperfil" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <img class=" card-img-top" src="/perfil/<?php echo $prueba->url_foto; ?>">
        </div>
        <center>
          <a href="../editarcuenta/editarperfilcli.php"><button type="button" class="btn btn-primary">
              <svg width="1.5em" height="1.5em" viewBox="0 0 17 16" class="bi bi-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.002 2h-12a1 1 0 0 0-1 1v9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V3a1 1 0 0 0-1-1zm-12-1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
              </svg></button>
          </a>
        </center>
        <br>
      </div>
    </div>
  </div>
  <!--/Modal -->

  </html>
<?php

} else {
  echo "<script> document.location.href='../dashboard/404.php';</script>";
}

?>