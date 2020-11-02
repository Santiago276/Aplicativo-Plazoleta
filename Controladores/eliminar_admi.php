<?php
//Llamada a la conexion
include_once '../dao/conexion.php';
$id = $_GET['id'];
$estado = '0';
//sentencia sql para eliminar
$sql_eliminar = "UPDATE tbl_usuario SET estado_usu = '$estado'  WHERE idusuario=?";
$consulta_eliminar = $pdo->prepare($sql_eliminar);
$consulta_eliminar->execute(array($id));
//redireccionar
header('location:../dashboard/usuarios.php');
