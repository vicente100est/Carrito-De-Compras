<?php

include("config/conexion.php");

$sbcat = $_POST['sbcategoria'];
$cat = $_POST['categoria'];

$insertar = "INSERT INTO subcategoria(nom_sbcat,id_cat) VALUE ('$sbcat', '$cat')";
$ejecucion = $conexion->query($insertar);

if($ejecucion){
    header("Location: consulta_sbcat.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>