<?php
$id = $_REQUEST['id'];

include("config/conexion.php");

$img = $_POST['img'];
$nom = $_POST['nombre_prod'];
$pre = $_POST['prec'];
$des = $_POST['desc'];
$sto = $_POST['stok'];
$fpo = $_POST['fampro'];

$actualizar = "UPDATE producto SET img_prod = '$img', nom_prod = '$nom', pre_prod = '$pre', des_prod = '$des',
    stok_prod = '$sto', id_fam_pro = '$fpo' WHERE id_prod = '$id'";
$ejecutar = $conexion->query($actualizar);

if($ejecutar){
    header("Location: consulta_producto.php");
}
else{
    echo '<script type="text/javascript">alert("Error :(");</script>';
}
?>