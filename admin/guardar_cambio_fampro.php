<?php
$id = $_REQUEST['id'];

include("config/conexion.php");

$fam = $_REQUEST['familia'];
$sbc = $_REQUEST['sbcat'];

$actualizar = "UPDATE familia_producto SET 	nom_fam_pro = '$fam', id_sbcat = '$sbc' WHERE id_fam_pro = '$id'";
$ejecucion = $conexion ->query($actualizar);

if($actualizar){
    header("Location: consulta_fampro.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>