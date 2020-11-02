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
    <?php require_once 'navbar_dashboard.php'; ?>
    <?php
    //Llamar a la conexion base de datos
    include_once '../dao/conexion.php';
    //Mostrar los datos almacenados
    $sql_mostrar = "SELECT * FROM tbl_restaurante";
    //Prepara sentencia
    $Consultar_mostrar = $pdo->prepare($sql_mostrar);
    //Ejecutar consulta
    $Consultar_mostrar->execute();
    $resultado_mostrar = $Consultar_mostrar->fetchAll();
    //Imprimir var dump -> Arreglos u objetos
    //Captura de información
    if ($_POST) {
      $nombre = $_POST['nombre'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $ciudad = $_POST['ciudad'];
      $nit = $_POST['nit'];
      //sentencia Sql
      $sql_insertar = "INSERT INTO tbl_restaurante (nombre_resta, direccion_resta, telefono_resta, ciudad_resta, nit_resta)VALUES (?,?,?,?,?)";
      //Preparar consulta
      $consulta_insertar = $pdo->prepare($sql_insertar);
      //Ejecutar la sentencia
      $consulta_insertar->execute(array($nombre, $direccion, $telefono, $ciudad, $nit));
      //Header redirecciona la pagina
      echo "<script> document.location.href='../dashboard/registrares.php';</script>";
    }
    //Mostrar o traer los campos del editar
    if ($_GET) {
      //Captura el id del usuario a editar
      $id = $_GET['id'];
      //Sentencia sql para mostrar
      $sql_editar = "SELECT * FROM tbl_restaurante WHERE idrestaurante=?";
      //Preparar consulta
      $consulta_editar = $pdo->prepare($sql_editar);
      //Ejecutar consulta
      $consulta_editar->execute(array($id));
      $resultado_editar = $consulta_editar->fetch();
      //Mostrar prueba
      //var_dump($resultado_editar);
    }
    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4 align="center" class="m-0 font-weight-bold text-primary">Información del restaurante</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <!---FORMULARIO DE REGISTRO-->
            <?php if (!$_GET) { ?>
              <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                      <div class="card-body">
                        <h5 class="card-title text-center">Registrar restaurante</h5>
                        <div align="center">
                          <form action="" method="POST">
                            <div class="form-label-group">
                              <input class="form-control" placeholder="Nombre" required autofocus type="text" name="nombre">
                              <br>
                              <input class="form-control" placeholder="Dirección" required autofocus type="text" name="direccion">
                              <br>
                              <input class="form-control" placeholder="Teléfono" required autofocus type="text" name="telefono">
                              <br>
                              <input class="form-control" placeholder="Ciudad" required autofocus type="text" name="ciudad">
                              <br>
                              <input class="form-control" placeholder="NIT" autofocus type="text" name="nit">
                              <br>
                              <button class="btn btn-primary btn-xs" type="Submit">Registrar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <?php } ?>
        <!---**************************** -->
        <!---Formulario para editar -->
        <?php if ($_GET) { ?>
          <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                  <div class="card-body">
                    <h5 class="card-title text-center">Editar restaurante</h5>
                    <div align="center">
                      <form action="actualizar_resta.php" method="GET">
                        <div class="form-label-group">
                          <input class="form-control" placeholder="Nombre" required autofocus type="text" name="nombre" value="<?php echo $resultado_editar['nombre_resta']; ?>">
                          <br>
                          <input class="form-control" placeholder="Dirección" required autofocus type="text" name="direccion" value="<?php echo $resultado_editar['direccion_resta']; ?>">
                          <br>
                          <input class="form-control" placeholder="Teléfono" required autofocus type="text" name="telefono" value="<?php echo $resultado_editar['telefono_resta']; ?>">
                          <br>
                          <input class="form-control" placeholder="Ciudad" required autofocus type="text" name="ciudad" value="<?php echo $resultado_editar['ciudad_resta']; ?>">
                          <br>
                          <input class="form-control" placeholder="NIT" required autofocus type="text" name="nit" value="<?php echo $resultado_editar['nit_resta']; ?>">
                          <br>
                          <input class="form-control" placeholder="id" required autofocus type="hidden" name="id_editar" value="<?php echo $resultado_editar['idrestaurante']; ?>">
                          <br>
                          <button class="btn btn-primary btn-xs" type="Submit">Editar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <!---**************************** -->
      <!---Tabla de restaurantes -->
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr align="center" Style="border: 2px solid black">
              <th Style="border: 2px solid black">Nombre</th>
              <th Style="border: 2px solid black">Dirección</th>
              <th Style="border: 2px solid black">Telefono</th>
              <th Style="border: 2px solid black">Ciudad</th>
              <th Style="border: 2px solid black">Nit</th>
              <th Style="border: 2px solid black">Eliminar</th>
              <th Style="border: 2px solid black">Editar</th>

            <tr>


          </thead>

          <tbody>
            <?php foreach ($resultado_mostrar as $datos) { ?>
              <tr align="center" Style="border: 2px solid black">
                <td style="border: 2px solid black"><?php echo $datos['nombre_resta'] ?></td>
                <td style="border: 2px solid black"><?php echo $datos['direccion_resta'] ?></td>
                <td style="border: 2px solid black"><?php echo $datos['telefono_resta'] ?></td>
                <td style="border: 2px solid black"><?php echo $datos['ciudad_resta'] ?></td>
                <td style="border: 2px solid black"><?php echo $datos['nit_resta'] ?></td>
                <td style="border: 2px solid black"><a href="eliminar_resta.php?id=<?php echo $datos['idrestaurante']; ?>">
                    <button class="btn btn-primary btn-xs" type="submit">Eliminar</button></a></td>
                <td style="border: 2px solid black"><a href="registrares.php?id=<?php echo $datos['idrestaurante']; ?>">
                    <button class="btn btn-primary btn-xs" type="submit">Editar</button></a></td>
              </tr>
          </tbody>
        </table>
      </div>
    <?php } ?>
      </div>
    </div>
    </div>

    </div>
    <!-- End of Topbar -->


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