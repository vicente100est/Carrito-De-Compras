<?php
$id = $_REQUEST['id'];

include("config/conexion.php");

$eliminar = "DELETE FROM producto WHERE id_prod = '$id'";
$ejecutar = $conexion->query($eliminar);

if($ejecutar){
    header("Location: consulta_producto.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>