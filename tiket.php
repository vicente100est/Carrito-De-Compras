<?php
include("admin/config/conexion.php");
include("carrito.php");
include("templates/cabecera.php");
?>
<br>

<?php
$consulta = "SELECT v.id_venta, v.total, v.correo, v.nombre, v.direccion, v.telefono, v.tiempo
    FROM venta v
    WHERE v.id_venta=(SELECT MAX(id_venta) FROM venta)";
$ejecutar = $conexion->query($consulta);
$imprimir = $ejecutar->fetch_assoc();

echo "ID Venta: " .$imprimir['id_venta']. "<br>";
echo "Nombre de Contacto: " .$imprimir['nombre']. "<br>";
echo "Correo de Contacto: " .$imprimir['correo']. "<br>";
echo "Dirección de Contacto: " .$imprimir['direccion']. "<br>";
echo "Teléfono de Contacto: " .$imprimir['telefono']. "<br>";
echo "Fecha de Compra: " .$imprimir['tiempo']. "<br><br>";
?>

<?php
$consulta = "SELECT vi.referencia, p.pre_prod, vi.cantidad, vi.subtotal, p.nom_prod
    FROM venta v, venta_info vi, producto p
    WHERE vi.id_prod=p.id_prod AND vi.id_venta=v.id_venta AND v.id_venta=(SELECT MAX(id_venta) FROM venta)";
$ejecutar = $conexion->query($consulta);
while($imprimir = $ejecutar->fetch_assoc()){
?>
<ul>
    <li><?php echo "Referencia: " .$imprimir['referencia']; ?></li>
    <li><?php echo "Producto: " .$imprimir['nom_prod']; ?></li>
    <li><?php echo "Cantidad: " .$imprimir['cantidad']; ?></li>
    <li><?php echo "Precio: $" .$imprimir['pre_prod']; ?></li>
    <li><?php echo "Subtotal: $" .$imprimir['subtotal']; ?></li>
</ul>

<?php
}
?>
<a href="salir.php"><img src="admin/img/iconos/salida.png" width=100 title="SALIR"></a>
<?php
include("templates/pie.php");
?>