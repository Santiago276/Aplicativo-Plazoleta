<?php
//Llamada a la conexion
include_once '../dao/conexion.php';
$id = $_GET['id'];
//sentencia sql para eliminar
$sql_eliminar = "DELETE FROM tbl_sugerencias WHERE idsugerencias=?";
$consulta_eliminar = $pdo->prepare($sql_eliminar);
$consulta_eliminar->execute(array($id));
//redireccionar
header('location:../dashboard/sugerencias.php');