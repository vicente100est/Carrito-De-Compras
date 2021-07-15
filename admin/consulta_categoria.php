<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>CATEGORÍAS</title>
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
        <h1>CATEGORÍA</h1>
        <table class="container">
            <thead>
                <tr>
                    <th>
                        <center>
                            <a href="agregar_categoria.html"><img src="img/iconos/nuevo.png" width="100"></a>
                        </center>
                    </th>
                    <th colspan="3">
                        <center>
                            LISTA DE CATEGORÍA
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>
                            ID CATEGORÍA
                        </center>
                    </td>
                    <td>
                        <center>
                            CATEGORÍA
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
                $consulta = "SELECT * FROM categoria";
                $ejecucion = $conexion->query($consulta);
                while($imprimir=$ejecucion->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['id_cat'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['nom_cat'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="cambio_categoria.php?id=<?php echo $imprimir['id_cat']; ?>"><img src="img/iconos/lapiz.png" width="100"></a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="eliminar_categoria.php?id=<?php echo $imprimir['id_cat']; ?>"><img src="img/iconos/eliminar.png" width="100"></a>
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