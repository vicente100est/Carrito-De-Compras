<?php

$id = $_REQUEST['id'];
include("config/conexion.php");

$cat = $_POST['categoria'];

$actualizar = "UPDATE categoria SET nom_cat = '$cat' WHERE id_cat = '$id'";
$ejecucion = $conexion->query($actualizar);

if($ejecucion){
    header("Location: consulta_categoria.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>