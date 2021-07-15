<?php
$id = $_REQUEST['id'];

include("config/conexion.php");

$eliminar = "DELETE FROM categoria WHERE id_cat = '$id'";
$ejecucion = $conexion->query($eliminar);

if($ejecucion){
    header("Location: consulta_categoria.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>