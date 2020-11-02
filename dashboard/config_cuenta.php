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
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4 align="center" class="m-0 font-weight-bold text-primary">Configuración de cuenta</h4>
        </div>
        <?php
        $id1 = $_SESSION["correo_usu"];
        include_once '../dao/conexion.php';
        $sql_inicio1 = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id1' ";
        $consulta_resta1 = $pdo->prepare($sql_inicio1);
        $consulta_resta1->execute();
        $resultado1 = $consulta_resta1->rowCount(array($id1));
        $prueba1 = $consulta_resta1->fetch(PDO::FETCH_OBJ);
        //Validacion de roles
        if ($resultado1) {
        ?>
          <div class="table-responsive">
            <div class="container">
              <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                  <div class="card card-signin my-5">
                    <div class="card-body">
                      <div align="center">
                        <!---Formulario para editar -->
                        <form action="actualizar_cuenta.php" method="GET">
                          <h3 class="m-0 font-weight-bold text-primary">Editar cuenta</h3>
                          <br>
                          <label for="">Nombre:</label>
                          <input class="form-control" type="text" name="nombre" value="<?php echo $prueba1->nombre_usu; ?>">
                          <br>
                          <br>
                          <label for="">Apellido:</label>
                          <input class="form-control" type="text" name="apellido" value="<?php echo $prueba1->apellido_usu; ?>">
                          <br>
                          <br>
                          <label for="">Telefono:</label>
                          <input class="form-control" type="text" name="telefono" value="<?php echo $prueba1->telefono_usu; ?>">
                          <br>
                          <br>
                          <input class="form-control" class="form-control" placeholder="id" required autofocus type="hidden" name="id_editar" value="<?php echo $prueba1->idusuario; ?>">
                          <br>
                          <button class="btn btn-primary btn-xs" type="Submit" name="subir">Editar</button>
                          <br>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php require_once 'footer_dashboard.php'; ?>

        <?php
      } else {
        echo "<script> document.location.href='404.php';</script>";
      }
    } else {
      echo "<script> document.location.href='404.php';</script>";
    }

        ?>