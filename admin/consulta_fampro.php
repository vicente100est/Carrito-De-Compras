<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>FAMILIA DE PRODUCTOS</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/tabla.css">
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
        <h1>FAMILIA DE PRODUCTOS</h1>
        <table class="container">
            <thead>
                <tr>
                    <th>
                        <center>
                            <a href="agregar_fampro.php"><img src="img/iconos/nuevo.png" width="100"></a>
                        </center>
                    </th>
                    <th colspan="4">
                        <center>
                            FAMILIA DE PRODUCTOS
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>
                            ID FAMILIA
                        </center>
                    </td>
                    <td>
                        <center>
                            FAMILIA
                        </center>
                    </td>
                    <td>
                        <center>
                            SUBCATEGORÍA
                        </center>
                    </td>
                    <td colspan=" 2">
                        <center>
                            OPCIONES
                        </center>
                    </td>
                </tr>
                <?php
                include("config/conexion.php");

                $consulta = "SELECT fp.id_fam_pro, fp.nom_fam_pro, sbc.nom_sbcat
                    FROM familia_producto fp, subcategoria sbc
                    WHERE fp.id_sbcat = sbc.id_sbcat";
                $ejecucion = $conexion->query($consulta);
                while($imprimir = $ejecucion->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['id_fam_pro'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['nom_fam_pro'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['nom_sbcat'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="cambio_fampro.php?id=<?php echo $imprimir['id_fam_pro']; ?>"><img src="img/iconos/lapiz.png" width="100"></a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="eliminar_fampro.php?id=<?php echo $imprimir['id_fam_pro']; ?>"><img src="img/iconos/eliminar.png" width="100"></a>
                        </center>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </center>
</body>
</html>