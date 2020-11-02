<?php
session_start();

session_destroy();
echo "<script> document.location.href='../Usuario/iniciar sesion.php';</script>";
