<?php
include("global/config.php");
include("global/conexion.php");
include("carrito.php");
include("templates/cabecera.php");
?>

        <?php
        if($mensaje!=""){
        ?>
        <br>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
        </div>
        <?php
        }
        ?>
        <div class="row">

            <?
            $sentencia=$pdo->prepare("SELECT * FROM producto");
            $sentencia->execute();
            $listaProducto=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProducto);
            ?>

            <?php
            foreach($listaProducto as $producto){
            ?>

                <div class="col-3">
                    <div class="card">
                        <img
                        title="<?php echo $producto['nom_prod']; ?>"
                        alt="<?php echo $producto['nom_prod']; ?>"
                        class="card-img-top"
                        src="admin/img/productos/<?php echo $producto['img_prod']; ?>"
                        data-toggle="popover"
                        data-trigger="hover"
                        data-content="<?php echo $producto['des_prod']?>"
                        height="317px">
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $producto['id_prod']; ?>">
                                    <span>NUMERO IDENTIFICADOR: pro-2021/<?php echo $producto['id_prod']; ?></span><br>
                                <input type="hidden" name="nombre" value="<?php echo $producto['nom_prod']; ?>">
                                    <span><?php echo $producto['nom_prod']; ?></span>
                                <input type="hidden" name="precio" value="<?php echo $producto['pre_prod']; ?>">
                                    <h5 class="card-title">$<?php echo $producto['pre_prod']; ?></h5>
                                <span>
                                    <label>Cantidad: </label>
                                    <select name="cantidad">
                                        <option value="">--- Cantidad ---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </span>
                                <button
                                class="btn btn-primary"
                                type="submit"
                                name="btnAccion"
                                value="AGREGAR">
                                    Agregar al carrito
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
<?php
include("templates/pie.php");
?>