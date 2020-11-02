<?php
//Llamar a la conexion base de datos
include_once '../dao/conexion.php';
//Imprimir var dump -> Arreglos u objetos
//Captura de información
if ($_POST) {
    $nombre = strip_tags($_POST['nombre']);
    $apellido = strip_tags($_POST['apellido']);
    $telefono = strip_tags($_POST['telefono']);
    $correo = strip_tags($_POST['correo']);
    $contrasena = strip_tags($_POST['contrasena']);
    $contrasena = sha1($_POST['contrasena']);
    $estado = "1";
    $perfil = 'NO_borrar.PNG';
    //Capturo la informacion del campo rol
    $roles = $_POST['roles'];

    if ($roles == '1' || $roles == '3') {
        $verificacion = '0';
    } else {
        $verificacion = '1';
    }
    //LLamo al campo cédula y verifico que no esté registrado
    $sql_restaexistente = "SELECT*FROM tbl_usuario WHERE correo_usu='$correo'";
    $consulta_resta = $pdo->prepare($sql_restaexistente);
    $consulta_resta->execute();
    //Filtrar
    $resultado_resta = $consulta_resta->rowCount();
    var_dump($resultado_resta);
    if ($resultado_resta) {
        echo "<script>alert('El correo ingresado ya existe!, por favor verificalo e intenta nuevamente');</script>";
    } else {
        //sentencia Sql
        $sql_insertar = "INSERT INTO tbl_usuario (nombre_usu,apellido_usu,telefono_usu,correo_usu,contrasena_usu,verificacion_usu,roles_idroles,estado_usu,url_foto)VALUES (?,?,?,?,?,?,?,?,?)";
        //Preparar consulta
        $consulta_insertar = $pdo->prepare($sql_insertar);
        //Ejecutar la sentencia
        $consulta_insertar->execute(array($nombre, $apellido, $telefono, $correo, $contrasena, $verificacion, $roles, $estado, $perfil));
        if ($roles == '1' || $roles == '3') {
            echo "<script>alert('Recuerda que debes ser verificado para iniciar sesión');</script>";
            echo "<script> document.location.href='../Usuario/iniciar sesion.php';</script>";
        } else {
            echo "<script>alert('Datos almacenados correctamente');</script>";
            echo "<script> document.location.href='../Usuario/iniciar sesion.php';</script>";
        }
    }
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="stylesheet" href="../css/letra1.css">
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="stylesheet" href="..css/letra2.css">
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/letra.css">
    <link rel="stylesheet" href="../css/fuentesplaz.css">
    <title>Registro | Plazoleta</title>

</head>

<body style="background-color: rgb(255, 227, 203);">
    <?php require_once '../Navbar/navbar_invi.php'; ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <b>
                            <p class="card-title text-center tituloplaz">Registro</p>
                        </b>
                        <center>
                            <p pplaz>Para registrarse por favor llene todos los campos del formulario
                                de esta sección.</p>
                        </center>
                        <br>
                        <center>
                            <p>¡Gracias por elegirnos!</p>
                        </center>
                        <form class="form-signin" method=POST>
                            <div class="form-label-group">
                                <input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Nombre" onkeypress="return Sololetras(event)" onpaste="return false" required autofocus>
                                <label for="inputNombre">Nombre</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="inputApellido" name="apellido" class="form-control" placeholder="Apellido" onkeypress="return Sololetras(event)" onpaste="return false" required>
                                <label for="inputApellido">Apellido</label>
                            </div>
                            <div class="form-label-group">
                                <input type="number" id="inputTelefono" name="telefono" class="form-control" placeholder="Telefono" required>
                                <label for="inputTelefono">Teléfono</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Correo" required>
                                <label for="inputEmail">Correo</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="contrasena" class="form-control" placeholder="Contraseña" required>
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <div class="form-label-group">
                                <select name="roles" class="form-control" required autofocus>
                                    <option value="" disabled selected>Seleccione un rol</option>
                                    <option value="1">Administrador</option>
                                </select>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
                            <br>
                            <div class="text-center">
                                <a href="../Usuario/iniciar sesion.php" type="submit">
                                    ¿Tienes cuenta? Inicia sesión
                                </a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Sección de copyright-->
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