<?php

session_start();

$usu = $_POST['usuario'];
$con = $_POST['contrasena'];

include("config/conexion.php");

$login = $conexion->query("SELECT * FROM administrador WHERE nom_admin = '$usu' OR correo_admin = '$usu' OR tel_admin = '$usu' AND admin_pass = '$con' ");

if($resultado = mysqli_fetch_array($login)){
    $_SESSION['u_usuario'] = $usu;
    header("Location: principal.php");
}
else{
    header("Location: index.html");
}
?>