<?php
require 'conexion.php';

session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$q = "SELECT COUNT(*) as contar FROM administradores
 WHERE `usuario`='$usuario' AND `password` = '$password' ";

$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {
    header("location: ../admin.php");
} else {
    echo "<center><h1>Datos incorrectos<h1></center>";
}
