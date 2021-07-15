<?php
include("config/conexion.php");

$img = $_POST['img'];
$nom = $_POST['nombre_prod'];
$pre = $_POST['prec'];
$des = $_POST['desc'];
$sto = $_POST['stok'];
$fpo = $_POST['fampro'];

$insertar = "INSERT INTO producto(img_prod, nom_prod, pre_prod, des_prod, stok_prod, id_fam_pro)
    VALUE ('$img','$nom','$pre','$des','$sto','$fpo')";
$ejecucion = $conexion->query($insertar);

if($ejecucion){
    header("Location: consulta_producto.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>