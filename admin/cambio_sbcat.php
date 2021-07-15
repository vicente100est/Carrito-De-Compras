<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ACTUALIZAR SUBCATEGORÍA</title>
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
            <legend><h1>SUBCATEGORÍA</h1></legend>
            <?php
            $id = $_REQUEST['id'];

            include("config/conexion.php");

            $consulta = "SELECT sbcat.*, cat.nom_cat
                FROM subcategoria sbcat, categoria cat
                WHERE sbcat.id_cat = cat.id_cat AND id_sbcat = '$id'";
            $ejecucion = $conexion->query($consulta);
            $imprimir = $ejecucion->fetch_assoc();
            ?>

            <form action="guardar_cambio_sbcat.php?id=<?php echo $imprimir['id_sbcat']; ?>" method="POST">
                <label>SUBCATEGORÍA: </label>
                    <input type="text" name="sbcategoria" value="<?php echo $imprimir['nom_sbcat']?>" placeholder="Subcategoría..." required>
                    <br><br>
                    <span>
                        <label>CATEGORÍA: </label>
                        
                        <?php
                        include("config/conexion.php");
                        $consulta = mysqli_query($conexion, "SELECT * FROM categoria");
                        $ejecucion = mysqli_fetch_array($consulta);
                        ?>

                        <select name="categoria" required>
                            <option value="<?php echo $imprimir['id_cat']; ?>">--- <?php echo $imprimir['nom_cat'];?> ---</option>
                            <?php
                            do{
                                $idcat = $ejecucion['id_cat'];
                                $nomcat = $ejecucion['nom_cat'];
                            ?>
                            <option value="<?php echo $idcat; ?>"><?php echo $nomcat; ?></option>

                            <?php
                            }while($ejecucion = mysqli_fetch_array($consulta));
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