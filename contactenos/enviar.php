<?php
//Llamando a los campos
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

//Datos para el correo
$destinatario = "appdiamondplazoleta@gmail.com";
$asunto = "Contacto a programadores de Plazoleta";

$carta = "De: $nombre\n";
$carta .= "Correo: $correo \n";
$carta .= "Telefono: $telefono \n";
$carta .= "Mensaje: $mensaje";

//Enviando mensaje
mail($destinatario, $asunto, $carta);
echo "<script>alert('Se envió el mensaje correctamente');</script>";
echo "<script> document.location.href='../quienes_somos.php';</script>";