<?php
//Llamar a la conexión
include_once '../dao/conexion.php';
//Captura id
$id = $_GET['id_editar'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$telefono = $_GET['telefono'];
//Sentencia sql
$sql_actualizar = "UPDATE tbl_usuario SET nombre_usu=?,apellido_usu=?,telefono_usu=? WHERE idusuario=?";
//Preparar la consulta
$consultar_actualizar = $pdo->prepare($sql_actualizar);
//Ejecutar
$consultar_actualizar->execute(array($nombre, $apellido, $telefono, $id));
//Redireccionar
//Redireccionar
echo "<script>alert('Datos actualizados correctamente');</script>";

echo "<script> document.location.href='../Usuario/reservar.php';</script>";