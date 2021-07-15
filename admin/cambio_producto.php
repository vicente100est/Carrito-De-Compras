<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ACTUALIZAR PRODUCTO</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <a href="principal.php"><img src="img/logo.png"></a>
    <br>
    <ul class="menu cf">
        <li><a href="#">CATEGORÍA</a>
            <ul class="submenu">
                <li><a href='agregar_categoria.html'>NUEVA CATEGORÍA</a><br></li>
                <li><a href='consulta_categoria.php'>VER CATEGORÍAS</a><br></li>
            </ul>
        </li>
        <li><a href="#">SUBCATEGORÍA</a>
            <ul class="submenu">
                <li><a href='agregar_sbcat.php'>NUEVA SUBCATEGORÍA</a><br></li>
                <li><a href='consulta_sbcat.php'>VER SUBCATEGORÍAS</a><br></li>
            </ul>
        </li>
        <li><a href="#">FAMILIA DE PRODUCTOS</a>
            <ul class="submenu">
                <li><a href='agregar_fampro.php'>NUEVA FAMILIA DE PRODUCTOS</a><br></li>
                <li><a href='consulta_fampro.php'>VER FAMILIA DE PRODUCTOS</a><br></li>
            </ul>
        </li>
        <li><a href="#">PRODUCTO</a>
            <ul class="submenu">
                <li><a href='agregar_producto.php'>NUEVO PRODUCTO</a><br></li>
                <li><a href='consulta_producto.php'>VER PRODUCTOS</a><br></li>
            </ul>
        </li>
        <li><a href='consulta_ventas.php'>VER VENTAS</a><br></li>
        <li><a href='logout.php'>CERRAR SESIÓN</a></li>
    </ul>
    <center>
        <fieldset>
            <legend></legend><h1>PRODUCTO</h1><legend>

            <?php
            $id = $_REQUEST['id'];

            include("config/conexion.php");

            $consulta = "SELECT pro.*, fpr.nom_fam_pro
                FROM producto pro, familia_producto fpr
                WHERE pro.id_fam_pro = fpr.id_fam_pro AND pro.id_prod = '$id'";
            $ejecutar = $conexion->query($consulta);
            $imprimir = $ejecutar->fetch_assoc();
            ?>

            <form action="guardar_cambio_producto.php?id=<?php echo $imprimir['id_prod']; ?>" method="POST">
                <label>IMAGEN: </label>
                <input type="file" name="img" value="<?php echo $imprimir['img_prod']; ?>"><br>
                <img src="img/productos/<?php echo $imprimir['img_prod']; ?>" width="100">
                <br><br>
                <label>NOMBRE DE PRODUCTO: </label>
                <input type="text" name="nombre_prod" value="<?php echo $imprimir['nom_prod']; ?>" placeholder="Nombre..." required>
                <br><br>
                <label>PRECIO: </label>
                <input type="text" name="prec" value="<?php echo $imprimir['pre_prod']; ?>" placeholder="$" required>
                <br><br>
                <label>DESCRIPCIÓN:</label>
                <br>
                <textarea name="desc" cols="30" rows="10" placeholder="Descripción..." required></textarea>
                <br><br>
                <label>STOK:</label>
                <input type="number" name="stok" value="<?php echo $imprimir['stok_prod']; ?>" placeholder="Stok..." required min="1">
                <br><br>
                <span>
                    <label>FAMILIA DE PRODUCTOS:</label>

                    <?php
                    include("config/conexion.php");

                    $consulata = mysqli_query($conexion, "SELECT * FROM familia_producto");
                    $ejecutar = mysqli_fetch_array($consulata);
                    ?>

                    <select name="fampro" required>
                        <option value="<?php echo $imprimir['id_fam_pro']; ?>">--- <?php echo $imprimir['nom_fam_pro']; ?> ---</option>

                        <?php
                        do{
                            $idfp = $ejecutar['id_fam_pro'];
                            $nomfp = $ejecutar['nom_fam_pro'];
                        ?>
                        <option value="<?php echo $idfp; ?>"><?php echo $nomfp; ?></option>
                        <?php
                        }while($ejecutar = mysqli_fetch_array($consulata));
                        ?>
                    </select>
                </span>
                <br><br>
                <input type="submit" value="ACEPTAR">
            </form>
        </fieldset>
    </center>
</body>
</html>