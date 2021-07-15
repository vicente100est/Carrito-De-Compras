<?php
include("global/config.php");
include("global/conexion.php");
include("carrito.php");
include("templates/cabecera.php");
?>

<?php
echo "<br><br>";
if($_POST){

    $total=0;
    $correo = $_POST['email'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto){
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }

    $insert=$pdo->prepare("INSERT INTO `venta` (`id_venta`, `total`, `correo`, `nombre`, `direccion`, `telefono`,
        `tiempo`) VALUES (NULL, :Total, :Correo, :Nombre, :Direccion, :Telefono, NOW());");
    $insert->bindParam(":Total",$total);
    $insert->bindParam(":Correo",$correo);
    $insert->bindParam(":Nombre",$nombre);
    $insert->bindParam(":Direccion",$direccion);
    $insert->bindParam(":Telefono",$telefono);

    $insert->execute();

    $idVenta=$pdo->lastInsertID();

    foreach($_SESSION['CARRITO'] as $indice=>$producto){
        $sbtotal=$producto['PRECIO']*$producto['CANTIDAD'];
        $insert=$pdo->prepare("INSERT INTO `venta_info` (`referencia`, `cantidad`, `subtotal`, `id_prod`, `id_venta`)
            VALUES (NULL, :Cantidad, :Subtotal, :IdProd, :IdVenta);");
        
        $insert->bindParam(":Cantidad",$producto['CANTIDAD']);
        $insert->bindParam(":Subtotal",$sbtotal);
        $insert->bindParam(":IdProd",$producto['ID']);
        $insert->bindParam(":IdVenta",$idVenta);

        $insert->execute();
    }

    //echo "<h3>".$total."</h3>";
}
?>
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=MXN"></script>
<div class="jumbotron text-center">
    <h1 class="display-4">¡ESTÁS A NADA DE TERMINAR TU COMPRA!</h1>
    <hr class="my-4">
    <p class="lead">Los pagos se deberán realizar por plataformas virtuales. Usted deberá pagar:
        <h4>$<?php echo number_format($total,2); ?> MXN</h4>
        <div id="paypal-button-container"></div>
    </p>
    <br>
    <p>Aclaraciones escribenos a: suport@officegam.com</p>
</div>

    <script>
        paypal.Buttons({

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>',
                            currency:'MXN'
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaccion completada por ' + details.payer.name.given_name +
                    '! En la parte inferior podrás consultar tu ticket GRACIAS POR TU PREFERENCIA ;)');
                });
            }
        }).render('#paypal-button-container');
    </script>
    <a href="tiket.php"><img src="admin/img/iconos/boleto.png" width=100 title="GUARDA TU TICKET"></a>
</body>

</html>
    

<?php
include("templates/pie.php");
?>