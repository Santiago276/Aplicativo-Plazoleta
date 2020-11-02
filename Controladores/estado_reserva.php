<?php
include_once '../dao/conexion.php';
//Captura id
$id = $_GET['id'];
//Sentencia sql
$sql_actualizar = "UPDATE tbl_reserva SET estado_reserva = 2 WHERE idreserva=?";
//Preparar la consulta
$consultar_actualizar = $pdo->prepare($sql_actualizar);
//Ejecutar
$consultar_actualizar->execute(array($id));
//Redireccionar
header('location:../dashboard/reservas.php');