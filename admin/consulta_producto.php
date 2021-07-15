<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PRODUCTOS</title>
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
        <h1>PRODUCTOS</h1>
        <table class="container">
            <thead>
                <tr>
                    <th>
                        <center>
                            <a href="agregar_producto.php"><img src="img/iconos/nuevo.png" width="100"></a>
                        </center>
                    </th>
                    <th colspan="8">
                        <center>
                            PRODUCTOS
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>
                            ID PRODUCTO
                        </center>
                    </td>
                    <td>
                        <center>
                            IMAGEN
                        </center>
                    </td>
                    <td>
                        <center>
                            NOMBRE
                        </center>
                    </td>
                    <td>
                        <center>
                            PRECIO
                        </center>
                    </td>
                    <td>
                        <center>
                            DESCRIPCIÓN
                        </center>
                    </td>
                    <td>
                        <center>
                            STOK
                        </center>
                    </td>
                    <td>
                        <center>
                            FAMILIA DE PRODUCTO
                        </center>
                    </td>
                    <td colspan="2">
                        <center>
                            OPCIONES
                        </center>
                    </td>
                </tr>
                <?php
                include("config/conexion.php");

                $consulta = "SELECT pro.id_prod, pro.img_prod, pro.nom_prod, pro.pre_prod, pro.des_prod, pro.stok_prod,
                        fpr.nom_fam_pro
                    FROM producto pro, familia_producto fpr
                    WHERE pro.id_fam_pro = fpr.id_fam_pro";
                $ejecutar = $conexion->query($consulta);
                while($imprimir = $ejecutar->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['id_prod'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <img src="img/productos/<?php echo $imprimir['img_prod']; ?>" width="100">
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['nom_prod'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['pre_prod'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['des_prod'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['stok_prod'];
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
                            <a href="cambio_producto.php?id=<?php echo $imprimir['id_prod']; ?>"><img src="img/iconos/lapiz.png" width="100"></a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="eliminar_producto.php?id=<?php echo $imprimir['id_prod']; ?>"><img src="img/iconos/eliminar.png" width="100"></a>
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