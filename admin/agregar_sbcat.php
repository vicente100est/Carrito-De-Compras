<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>NUEVA SUBCATEGORÍA</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <a href="principal.php"><img src="img/logo.png"></a>
    <br>
    <center>
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

    <fieldset>
        <legend><h1>AGREGAR SUBCATEGORÍA</h1></legend>
        <form action="guardar_subcategoria.php" method="POST">
            <label>SUBCATEGORÍA: </label>
            <input type="text" name="sbcategoria" value="" placeholder="Subcategoría..." required>
            <br><br>
            <span>
                <label>CATEGORÍA: </label>
                
                <?php
                include("config/conexion.php");
                $consulta = mysqli_query($conexion, "SELECT * FROM categoria");
                $ejecucion = mysqli_fetch_array($consulta);
                ?>

                <select name="categoria" required>
                    <option>--- CATEGORÍA ---</option>
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