<?php
session_start();

if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
    //Llamar a la conexion base de datos
    include_once '../dao/conexion.php';
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/img/favicon.png" /> 
        <script src="../js/all.js"></script>
        <link rel="stylesheet" href="../css/letra1.css">
        <link rel="stylesheet" href="../css/letra2.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/letra.css">
        <link rel="stylesheet" href="../css/registro.css">
        <link rel="stylesheet" href="../css/estiloss.css">
        <link rel="stylesheet" href="../css/fuentesplaz.css">
        <script src="../js/jquery-3.5.1.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <title>Perfil | Plazoleta</title>
    </head>
    <style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
                text-align: center;
            }
        }

        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }
        }
    </style>

    <body style="background-color: rgb(255, 227, 203);">
        <!-- <script>
      $(document).ready(function() {
        $("#mostrarmodal").modal("show");
      });
    </script> -->


        <?php require_once '../Navbar/navbar_cli.php'; ?>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <!---Formulario para editar -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <b>
                                    <p class="card-title text-center tituloplaz">Editar perfil</p>
                                </b>
                                <br>
                                <label for="">Foto de perfil:</label>
                                <input class="form-control-file" type="file" name="file" value="file" required>
                                <br>
                                <br>
                                <center>
                                    <button class="btn btn-primary btn-xs" type="Submit" name="subir">Subir foto</button>
                                </center>
                                <br>
                                <br>
                            </form>
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
                                                echo "<script> document.location.href='editarperfilcli.php';</script>";
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
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>

    </html>
<?php

} else {
    echo "<script> document.location.href='../dashboard/404.php';</script>";
}

?>