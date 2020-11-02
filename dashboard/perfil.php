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
        <div class="table-responsive">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <div align="center">
                                    <!---Formulario para editar -->
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <h3 class="m-0 font-weight-bold text-primary">Editar cuenta</h3>
                                        <br>
                                        <label for="">Foto de perfil:</label>
                                        <input class="form-control-file" type="file" name="file" value="file" required>
                                        <br>
                                        <br>
                                        <button class="btn btn-primary btn-xs" type="Submit" name="subir">Subir foto</button>
                                        <br>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['subir'])) {

                    $directorio = "../perfil/";

                    $archivo = $directorio . basename($_FILES['file']['name']);
                    $directoryName = basename($_FILES['file']['name']);

                    $tipo_archivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                    //Validar que es imagen
                    $checarsiimagen = getimagesize($_FILES['file']['tmp_name']);

                    //var_dump($size);

                    if ($checarsiimagen != false) {
                        $size = $_FILES['file']['size'];
                        //Validando tamano del archivo
                        if ($size > 3 * 1024 * 1024 * 1024) {
                            echo "El archivo excede el limite, debe ser menor de 700kb";
                        } else {
                            if ($tipo_archivo == 'jpg' || $tipo_archivo == 'jpeg' || $tipo_archivo == 'png') {
                                //Se validó el archivo correctamente
                                if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
                                    $id = $_SESSION["correo_usu"];
                                    include_once '../dao/conexion.php';
                                    //Sentencia sql
                                    $sql_actualizar = "UPDATE tbl_usuario SET url_foto=? WHERE correo_usu=?";
                                    //Preparar la consulta
                                    $consultar_actualizar = $pdo->prepare($sql_actualizar);
                                    //Ejecutar
                                    $consultar_actualizar->execute(array($directoryName, $id));
                                    echo "<script>alert('Foto de perfil subida y actualizada correctamente');</script>";
                                    echo "<script> document.location.href='reservas.php';</script>";
                                } else {
                                    echo "<script>alert('Ocurrió un error');</script>";
                                }
                            } else {
                                echo "<script>alert('Error: solo se admiten archivos jpg, png y jpegr');</script>";
                            }
                        }
                    } else {
                        echo "<script>alert('Error: el archivo no es una imagen');</script>";
                    }
                }
                ?>


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