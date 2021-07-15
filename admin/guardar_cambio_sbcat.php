<?php
$id = $_REQUEST['id'];

include("config/conexion.php");

$sbcat = $_POST['sbcategoria'];
$cat = $_POST['categoria'];

$actualizar = "UPDATE subcategoria SET nom_sbcat = '$sbcat', id_cat = '$cat' WHERE id_sbcat = '$id'";
$ejecucuin = $conexion->query($actualizar);

if($ejecucuin){
    header("Location: consulta_sbcat.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>