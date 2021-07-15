<?php
$id = $_REQUEST['id'];

include("config/conexion.php");

$eliminar = "DELETE FROM subcategoria WHERE id_sbcat = '$id'";
$ejecucion = $conexion->query($eliminar);

if($ejecucion){
    header("Location: consulta_sbcat.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>