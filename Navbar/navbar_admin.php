<?php
session_start();
if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Administrador | Plazoleta</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../img/favicon.png" />
        <script src="../js/all.js"></script>
        <link rel="stylesheet" href="../css/letra1.css">
        <link rel="stylesheet" href="../css/letra2.css">
        <link rel="stylesheet" href="../css/estiloss.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/imagen.css">
        <link rel="stylesheet" href="../css/letra.css">
        <link rel="stylesheet" href="../css/fuentesplaz.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <body id="page-top" style="background-color: rgb(255, 227, 203);">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" id="letra">
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-justify" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <br>
            <br>
            <a href="../index.php?id=<?php echo $_SESSION["correo_usu"]; ?>"><img width="160" src="/img/íconos/plaznegro.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarResponsive" id="letra">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://laplazoletacafeparrillabar.000webhostapp.com/index.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Inicio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="quienes_somos.php?id=<?php echo $_SESSION["correo_usu"]; ?>">¿Quiénes somos?</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="menu.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Menú</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-toggle="modal" data-target="#modaldomicilio">Domicilios</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="dashboard/usuarios.php">Administrar</a></li>
                </ul>
                <?php
                $id = $_SESSION["correo_usu"];
                $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id' ";
                $consulta_resta = $pdo->prepare($sql_inicio);
                $consulta_resta->execute();
                $resultado = $consulta_resta->rowCount();
                $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
                //Validacion de roles
                if ($resultado) {
                    $Nombre = $prueba->nombre_usu . " " . $prueba->apellido_usu;
                ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $Nombre;
                    } ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <!-- Button trigger modal -->
                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar sesión</a>
                        </div>
                    </div>
            </div>
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"></a>
                    <a data-toggle="modal" data-target="#fotoperfil"><img width="35px" height="35px" class="img-profile rounded-circle" src="../perfil/<?php echo $prueba->url_foto; ?>"></a>
            </div>
        </nav>
    </body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <b>
                        <p class="fplaz">¿Seguro quieres salir?</p>
                    </b>
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg></a>
                </div>
                <div class="modal-body">
                    <p class="pplaz">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="Controladores/Cerrar_Sesion.php"><button type="button" class="btn btn-primary">Cerrar sesión</button></a>
                </div>
            </div>
        </div>
    </div>
    <!--/Modal -->
    <!-- Modal -->
    <div class="modal fade" id="modaldomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg></a>
                </div>
                <div class="modal-body">
                <center>
                    <b>
                        <p class="fplaz"> Domicilios</p>
                    </b>
                    <b>
                        <p class="fplazs"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-week-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                            </svg> Horario</p>
                    </b>
                    <p class="domiplaz">Lunes a Viernes</p>
                    <p class="domiplaz">12:00 p.m a 9:00 p.m</p>
                    <p class="domiplaz">Sábados, Domingos y festivos</p>
                    <p class="domiplaz">12:00 p.m a 9:00 p.m</p>
                    <b>
                        <p class="fplazs"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg> Teléfono</p>
                    </b>
                    <p class="domiplaz">311 739 2008</p><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </center>
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
                    <a href="../dashboard/perfil.php"><button type="button" class="btn btn-primary">
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