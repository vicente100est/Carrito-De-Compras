<?php
include("global/config.php");
include("carrito.php");
include("templates/cabecera.php");
?>

<br>
<h3>LISTA DEL CARRITO</h3>
<?php
    if(!empty($_SESSION['CARRITO'])){
?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">
                <center>
                    DESCRIPCIÓN
                </center>
            </th>
            <th width="15%">
                <center>
                    CANTIDAD
                </center>
            </th>
            <th width="20%">
                <center>
                    PRECIO
                </center>
            </th>
            <th width="20%">
                <center>
                    TOTAL
                </center>
            </th>
            <th width="5%">
                <center>
                    - -
                </center>
            </th>
        </tr>
        <?php
        $total = 0;
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
        ?>
        <tr>
            <td width="40%">
                <center>
                    <?php
                    echo $producto['NOMBRE'];
                    ?>
                </center>
            </td>
            <td width="15%">
                <center>
                    <?php
                    echo $producto['CANTIDAD'];
                    ?>
                </center>
            </td>
            <td width="20%">
                <center>
                    $
                    <?php
                    echo $producto['PRECIO'];
                    ?>
                </center>
            </td>
            <td width="20%">
                <center>
                    $
                    <?php
                    echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);
                    ?>
                </center>
            </td>
            <td width="5%">
                <center>
                    <form action="" method="post">

                        <input
                        type="hidden"
                        name="id"
                        value="<?php
                            echo $producto['id_prod'];
                            ?>">

                        <button
                        class="btn btn-danger"
                        type="submit"
                        name="btnAccion"
                        value="ELIMINAR">
                            Eliminar
                        </button>
                    </form>
                </center>
            </td>
        </tr>
        <?php
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
        }
        ?>
        <tr>
            <td colspan="3" align="right">
                <h3>Total</h3>
            </td>
            <td align="right">
                <h3>$<?php echo number_format($total,2); ?></h3>
            </td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">
                <form action="pagar.php" method="post">
                    <div class="alert alert-success" role="alert">
                        <div class="form-group">
                            <label for="my-input">Correo para contacto: </label>
                            <input
                            id="email"
                            name="email"
                            class="form-control"
                            type="email"
                            placeholder="Ingresa tu correo..."
                            required>

                            <label for="my-input">Nombre Contacto: </label>
                            <input
                            id="nombre"
                            name="nombre"
                            class="form-control"
                            type="text"
                            placeholder="Ingresa tu nombre..."
                            required>

                            <label for="my-input">Dirección contacto: </label>
                            <input
                            id="direccion"
                            name="direccion"
                            class="form-control"
                            type="text"
                            placeholder="Ingresa tu dirección..."
                            required>

                            <label for="my-input">Teléfono contacto: </label>
                            <input
                            id="telefono"
                            name="telefono"
                            class="form-control"
                            type="text"
                            placeholder="Ingresa tu teléfono..."
                            required>
                        </div>
                        <small
                        id="infoHelp"
                        class="form-text text-muted"
                        >Tus productos están en proceso</small>
                    </div>
                    <button
                    class="btn btn-primary btn-lg btn-block"
                    type="submit"
                    name="btnAccion"
                    value="PROCEDER">
                        Vamos a pagar---->
                    </button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<?php
    }
    else{
?>
<div class="alert alert-success">
    NO HAY PRODUCTOS EN EL CARRITO
</div>
<?php
    }
?>
<?php
include("templates/pie.php");
?>