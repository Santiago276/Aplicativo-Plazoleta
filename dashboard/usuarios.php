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
    $sql_mostrar = "SELECT * FROM tbl_usuario";
    //Prepara sentencia
    $Consultar_mostrar = $pdo->prepare($sql_mostrar);
    //Ejecutar consulta
    $Consultar_mostrar->execute();
    $resultado_mostrar = $Consultar_mostrar->fetchAll();
    //Imprimir var dump -> Arreglos u objetos
    //Captura de información
    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4 align="center" class="m-0 font-weight-bold text-primary">Usuarios registrados</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">

            <!---**************************** -->
            <!---Tabla de usuarios -->

            <table class="table table-bordered">
              <thead>
                <tr align="center">
                  <th Style="border: 2px solid black">Tipo usuario</th>
                  <th Style="border: 2px solid black">Nombre</th>
                  <th Style="border: 2px solid black">Apellido</th>
                  <th Style="border: 2px solid black">Teléfono</th>
                  <th Style="border: 2px solid black">Correo</th>
                  <th Style="border: 2px solid black">Eliminar/desactivar usuario</th>
                  <th Style="border: 2px solid black">Activar/desactivar cuenta</th>
                <tr>
              </thead>
              <tbody>
                <?php foreach ($resultado_mostrar as $datos) { ?>
                  <tr align="center">
                    <?php
                    /* Si el rol es igual a 1 que imprima... */
                    if ($datos['roles_idroles'] == 1) {
                    ?>
                      <td Style="border: 2px solid black">Administrador</a></td>
                    <?php
                      /* Si el rol es igual a 2 que imprima... */
                    } else if ($datos['roles_idroles'] == 2) {
                    ?>
                      <td Style="border: 2px solid black">Cliente</a></td>
                    <?php
                      /* Si el rol es igual a 3 que imprima... */
                    } else if ($datos['roles_idroles'] == 3) {
                    ?>
                      <td Style="border: 2px solid black">Trabajador</a></td>
                    <?php
                    }
                    ?>
                    <td Style="border: 2px solid black"><?php echo $datos['nombre_usu'] ?></td>
                    <td Style="border: 2px solid black"><?php echo $datos['apellido_usu'] ?></td>
                    <td Style="border: 2px solid black"><?php echo $datos['telefono_usu'] ?></td>
                    <td Style="border: 2px solid black"><?php echo $datos['correo_usu'] ?></td>
                    <?php
                    /* Verificar que el estado esté activo */
                    if ($datos['estado_usu'] == 1) {
                    ?>
                      <?php
                      if ($datos['verificacion_usu'] == 1 && $datos['roles_idroles'] == 1) {
                          if ($datos['idusuario'] == 1){
                              
                          }else{
                      ?>
                        <!-- Eliminar administrador -->
                        <td Style="border: 2px solid black"><a class="btn btn-success" href="../Controladores/eliminar_admi.php?id=<?php echo $datos['idusuario']; ?>">Desactivar administrador</a></td>
                        <!-- Desactivar administrador -->
                        <td Style="border: 2px solid black"><a class="btn btn-danger" href="../Controladores/desactivar_usu.php?id=<?php echo $datos['idusuario']; ?>">Desactivar cuenta</a></td>
                      <?php
                      }} else if ($datos['verificacion_usu'] == 1 && $datos['roles_idroles'] == 3) {
                      ?>
                        <!-- Eliminar administrador -->
                        <td Style="border: 2px solid black"><a class="btn btn-success" href="../Controladores/eliminar_admi.php?id=<?php echo $datos['idusuario']; ?>">Desactivar trabajador</a></td>
                        <!-- Desactivar administrador -->
                        <td Style="border: 2px solid black"><a class="btn btn-danger" href="../Controladores/desactivar_usu.php?id=<?php echo $datos['idusuario']; ?>">Desactivar cuenta</a></td>
                        <?php
                      } else {
                        if ($datos['roles_idroles'] == 1) {
                        ?>
                          <!-- Eliminar administrador -->
                          <td Style="border: 2px solid black"><a class="btn btn-danger" style="color: white;" data-toggle="modal" data-target="#confirmardesactivaradmi">Eliminar administrador</a></td>
                          <!-- Activar administrador -->
                          <td Style="border: 2px solid black"><a class="btn btn-info" href="../Controladores/verificar.php?id=<?php echo $datos['idusuario']; ?>">Verificar administrador</a></td>
                        <?php
                        } else if ($datos['roles_idroles'] == 2) {
                        ?>
                          <!-- Eliminar cliente -->
                          <td Style="border: 2px solid black"><a class="btn btn-success" href="../Controladores/eliminar_admi.php?id=<?php echo $datos['idusuario']; ?>">Desactivar cliente</a></td>
                        <?php
                        } else if ($datos['roles_idroles'] == 3) {
                        ?>
                          <!-- Eliminar trabajador -->
                          <td Style="border: 2px solid black"><a class="btn btn-danger" style="color: white;" data-toggle="modal" data-target="#confirmardesactivaradmi">Eliminar trabajador</a></td>
                          <!-- Verificación trabajador -->
                          <td Style="border: 2px solid black"><a class="btn btn-info" href="../Controladores/verificar.php?id=<?php echo $datos['idusuario']; ?>">Verificar trabajador</a></td>
                      <?php
                        }
                      }
                      /* Si no está activo... */
                    } else { ?>
                      <!-- Eliminar cuenta -->
                      <td Style="border: 2px solid black"><a style="color: white;" class="btn btn-danger" data-toggle="modal" data-target="#confirmardesactivaradmi">Eliminar cuenta</a></td>
                      <!-- Activar cuenta -->
                      <td Style="border: 2px solid black"><a class="btn btn-info" href="../Controladores/eliminar_cli.php?id=<?php echo $datos['idusuario']; ?>">Activar cuenta</a></td>
                    <?php
                    }
                    ?>
                  <?php } ?>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Modal para eliminar admin-->
      <div class="modal fade" id="confirmardesactivaradmi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <b>
                <p class="fplaz">¿Seguro quieres eliminar el usuario?</p>
              </b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="pplaz">Seleccione "Eliminar" a continuación si desea eliminar el administrador seleccionado.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <a href="../Controladores/eliminar_cuenta.php?id=<?php echo $datos['idusuario']; ?>"><button type="button" class="btn btn-primary">Eliminar</button></a>
            </div>
          </div>
        </div>
      </div>
      <!--/Modal -->

      <!-- Modal para eliminar cliente-->
      <div class="modal fade" id="confirmardesactivaradmi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <b>
                <p class="fplaz">¿Seguro quieres eliminar el administrador?</p>
              </b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="pplaz">Seleccione "Eliminar" a continuación si desea eliminar el administrador seleccionado.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <a href="../Controladores/eliminar_admi.php?id=<?php echo $datos['idusuario']; ?>"><button type="button" class="btn btn-primary">Eliminar</button></a>
            </div>
          </div>
        </div>
      </div>
      <!--/Modal -->

      <!-- Modal para eliminar trabajadores-->
      <div class="modal fade" id="confirmardesactivaradmi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <b>
                <p class="fplaz">¿Seguro quieres eliminar el administrador?</p>
              </b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="pplaz">Seleccione "Eliminar" a continuación si desea eliminar el administrador seleccionado.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <a href="../Controladores/eliminar_admi.php?id=<?php echo $datos['idusuario']; ?>"><button type="button" class="btn btn-primary">Eliminar</button></a>
            </div>
          </div>
        </div>
      </div>
      <!--/Modal -->

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
      <?php require_once 'footer_dashboard.php'; ?>
  <?php
  } else {
    echo "<script> document.location.href='404.php';</script>";
  }
} else {
  echo "<script> document.location.href='404.php';</script>";
}
  ?>