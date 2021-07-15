<?php
include("config/conexion.php");

$fam = $_REQUEST['familia'];
$sbc = $_REQUEST['sbcat'];

$insertar = "INSERT INTO familia_producto(nom_fam_pro, id_sbcat) VALUE('$fam','$sbc')";
$ejecucion = $conexion ->query($insertar);

if($ejecucion){
    header("Location: consulta_fampro.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>