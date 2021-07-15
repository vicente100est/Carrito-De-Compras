<?php
include("config/conexion.php");

$cat = $_POST['categoria'];

$insertar = "INSERT INTO categoria(nom_cat) VALUE ('$cat')";
$ejecucion = $conexion->query($insertar);

if($ejecucion){
    header("Location: consulta_categoria.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>