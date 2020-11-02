<?php
//Llamar a la conexion
include_once '../dao/conexion.php';
//Captura id
$id = $_GET['id_editar'];
$plato = $_GET['plato'];
$descripcion = $_GET['descripcion'];
$precio = $_GET['precio'];
//Sentencia sql
$sql_actualizar = "UPDATE tbl_menu SET plato=?,descripcion_plato=?,precio_plato=? WHERE idplato=?";
//Preparar la consulta
$consultar_actualizar = $pdo->prepare($sql_actualizar);
//Ejecutar
$consultar_actualizar->execute(array($plato, $descripcion, $precio, $id));
//Redireccionar
header('location:admi_menu.php');
?>