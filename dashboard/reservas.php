<?php
session_start();

if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
  $id = $_SESSION["correo_usu"];
  include_once '../dao/conexion.php';
  $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id' AND estado_usu = '1' AND verificacion_usu = '1' ";
  $consulta_resta = $pdo->prepare($sql_inicio);
  $consulta_resta->execute();
  $resultado = $consulta_resta->rowCount();
  $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
  //Validacion de roles
  if ($resultado) {
?>
    <?php
    //Llamar a la conexion base de datos
    include_once '../dao/conexion.php';
    //Mostrar los datos almacenados
    $sql_mostrar = "SELECT * FROM tbl_reserva ORDER BY fecha_reserva asc";
    //Prepara sentencia
    $Consultar_mostrar = $pdo->prepare($sql_mostrar);
    //Ejecutar consulta
    $Consultar_mostrar->execute();
    $resultado_mostrar = $Consultar_mostrar->fetchAll();
    //Imprimir var dump -> Arreglos u objetos

    //Mostrar o traer los campos del editar
    if ($_GET) {
      //Captura el id del usuario a editar
      $id = $_GET['id'];
      //Sentencia sql para mostrar
      $sql_editar = "SELECT * FROM tbl_reserva WHERE idreserva=?";
      //Preparar consulta
      $consulta_editar = $pdo->prepare($sql_editar);
      //Ejecutar consulta
      $consulta_editar->execute(array($id));
      $resultado_editar = $consulta_editar->fetch();
      //Mostrar prueba
      //var_dump($resultado_editar);
    }
    ?>
    <?php require_once 'navbar_dashboard.php'; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4 align="center" class="m-0 font-weight-bold text-primary">Reservas</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr align="center" style="border: 2px solid black">
                  <th style="border: 2px solid black">Nombre</th>
                  <th style="border: 2px solid black">Apellido</th>
                  <th style="border: 2px solid black">Fecha de reserva</th>
                  <th style="border: 2px solid black">Hora</th>
                  <th style="border: 2px solid black">Ocasión</th>
                  <th style="border: 2px solid black">Teléfono</th>
                  <th style="border: 2px solid black">No. personas</th>
                  <th style="border: 2px solid black">No. menores</th>
                  <th style="border: 2px solid black">Mensaje</th>
                  <th style="border: 2px solid black">Fecha del registro</th>
                  <th style="border: 2px solid black">Estado</th>
                  <th style="border: 2px solid black">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($resultado_mostrar as $datos) { ?>
                  <tr align="center" style="border: 2px solid black">
                    <th style="border: 2px solid black"><?php echo $datos['nombre_reserva']; ?></th>
                    <th style="border: 2px solid black"><?php echo $datos['apellido_reserva']; ?></th>
                    <th style="border: 2px solid black"><?php echo $datos['fecha_reserva']; ?></th>
                    <th style="border: 2px solid black"><?php echo $datos['hora_reserva']; ?></th>
                    <td style="border: 2px solid black"><?php echo $datos['ocasion_reserva']; ?></td>
                    <td style="border: 2px solid black"><?php echo $datos['telefono_reserva']; ?></td>
                    <td style="border: 2px solid black"><?php echo $datos['cantidad_personas']; ?></td>
                    <td scope="border: 2px solid black"><?php echo $datos['menores_reserva']; ?></td>
                    <td style="border: 2px solid black"><?php echo $datos['mensaje']; ?></td>
                    <td scope="border: 2px solid black"><?php echo $datos['fecha_registro']; ?></td>
                    <?php
                    if ($datos['estado_reserva'] == 1) {
                    ?>
                      <td><b>Pago pendiente</b></td>
                      <td Style="border: 2px solid black"><a class="btn btn-info" href="../Controladores/estado_reserva.php?id=<?php echo $datos['idreserva']; ?>">Reserva pagada</a></td>
                    <?php
                    } else if ($datos['estado_reserva'] == 2) {
                    ?>
                      <td><b>Pendiente</b</a> </td> <td Style="border: 2px solid black"><a class="btn btn-success" href="../Controladores/reserva.php?id=<?php echo $datos['idreserva']; ?>">Reserva completa</a></td>

                    <?php
                    } else if ($datos['estado_reserva'] == 3) {
                    ?>
                        <td><b>Completada</b</a> </td> <td Style="border: 2px solid black"><a class="btn btn-danger" href="../Controladores/eliminar_reserva.php?id=<?php echo $datos['idreserva']; ?>">Eliminar reserva</a></td>
                  </tr>
                  <?php
                    }
                    ?>
              </tbody>
            <?php  } ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>   
      <!-- Modal -->
      <div class="modal" id="fotoperfil" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <img class=" card-img-top" src="../perfil/<?php echo $prueba->url_foto; ?>">
            </div>
            <center>
              <a href="perfil.php"><button type="button" class="btn btn-primary">
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
      <!-- Footer -->
      <?php require_once 'footer_dashboard.php'; ?>
  <?php
  } else {
    echo "<script> document.location.href='404.php';</script>";
  }
} else {
  echo "<script> document.location.href='404.php';</script>";
}
  ?>