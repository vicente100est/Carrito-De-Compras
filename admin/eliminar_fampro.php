<?php
$id = $_REQUEST['id'];

include("config/conexion.php");

$eliminar = "DELETE FROM familia_producto WHERE id_fam_pro = '$id'";
$ejecucion = $conexion->query($eliminar);

if($ejecucion){
    header("Location: consulta_fampro.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>