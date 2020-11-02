<?php
$host = "mysql:host=localhost;dbname=u218013079_bd_plazoleta";
$usuario = "u218013079_root";
$contrasena = "123456Abc";

try {
     //Conexion exitosa	
     $pdo = new PDO($host, $usuario, $contrasena);
     $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeception $e) {      
     //error Conexion
     print "Error!". $e->getMessage() ."br/>";
     die();
}
?>