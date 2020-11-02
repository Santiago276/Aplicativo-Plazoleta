<?php
session_start();

if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserva | Plazoleta</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="/img/favicon.png" />
  <script src="/js/all.js"></script>
  <link rel="stylesheet" href="/css/letra1.css">
  <link rel="stylesheet" href="/css/letra2.css">
  <link rel="stylesheet" href="/css/registro.css">
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/prueba.css">
  <link rel="stylesheet" href="/css/letra.css">
  <link href="/css/styles.css" rel="stylesheet">
  <script src="/js/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="/css/fuentesplaz.css"
    <link rel="stylesheet" href="/css/letra.css">
    <link rel="stylesheet" href="/css/estiloss.css">
    <link rel="stylesheet" href="/css/fuentesplaz.css">
</head>
 
<body id="page-top" style="background-color: rgb(255, 227, 203);">
  <!-- Navigation-->
  <section class="page-section portfolio" id="portfolio" id="letra">
    <div class="container">
      <br> <br>
      <div class="text-center" style="background-color: rgb(255, 227, 203);">
      <!-- Portfolio Grid Items-->
      <div class="row justify-content-center" id="letra">
        <div id="marco2" class="img11">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-40 w-40">
              <div class="portfolio-item-caption-content text-center text-white"></div>
            </div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="POST" target="_blank">
            <img class="circular--landscape" src="https://media.gettyimages.com/vectors/checkbook-flat-icon-vector-id832016390" alt="Juan José Martínez Rincón" />
            <p class="nombreplaz">Debes cancelar $45.000COP en el restaurante con tus datos registrados</p>
            <p class="desplaz">Tienes tarjeta de crédito?</p>
            <br>
            <button class="btn btn-succes" type="submit"><input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="SXTYDJZT5QFWC">
                  <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma rápida y segura de pagar en Internet.">
                  <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1"></button>
            <div class="text-center">
                <a href="../index.php?id=<?php echo $_SESSION["correo_usu"]; ?>" type="submit">
                                    Atrás, inicio
                </a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white" id="letra">
          <div class="container"><small>Plazoleta © Tu sitio web 2020</small></div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="/assets/mail/jqBootstrapValidation.js"></script>
        <script src="/assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
</body>
</html>
<?php

} else {
  echo "<script> document.location.href='../dashboard/404.php';</script>";
}

?>