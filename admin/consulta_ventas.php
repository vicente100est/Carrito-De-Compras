<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>VENTAS</title>
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
        <h1>VENTAS</h1>
        <table class="container">
            <thead>
                <tr>
                    <th colspan="7">
                        <center>
                            VENTAS
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>
                            ID VENTA
                        </center>
                    </td>
                    <td>
                        <center>
                            CORREO
                        </center>
                    </td>
                    <td>
                        <center>
                            NOMBRE
                        </center>
                    </td>
                    <td>
                        <center>
                            DIRECCIÓN
                        </center>
                    </td>
                    <td>
                        <center>
                            TELÉFONO
                        </center>
                    </td>
                    <td>
                        <center>
                            FECHA
                        </center>
                    </td>
                    <td>
                        <center>
                            TOTAL
                        </center>
                    </td>
                </tr>
                
                <?php
                include("config/conexion.php");

                $consulta = "SELECT * FROM venta";
                $ejecutar = $conexion->query($consulta);
                while($imprimir = $ejecutar->fetch_assoc()){
                ?>

                <tr>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['id_venta'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['correo'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['nombre'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['direccion'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['telefono'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['tiempo'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir['total'];
                            ?>
                        </center>
                    </td>
                </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

        <table class="container">
            <thead>
                <tr>
                    <th colspan="6">
                        <center>
                            INFORMACIÓN A DETALLE DE LAS VENTAS
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>
                            REFERENCIAS
                        </center>
                    </td>
                    <td>
                        <center>
                            PRODUCTO
                        </center>
                    </td>
                    <td>
                        <center>
                            PRECIO
                        </center>
                    </td>
                    <td>
                        <center>
                            CANTIDAD
                        </center>
                    </td>
                    <td>
                        <center>
                            SUBTOTAL
                        </center>
                    </td>
                    <td>
                        <center>
                            ID DE VENTA
                        </center>
                    </td>
                </tr>

                <?php
                $consulta2="SELECT vi.referencia, p.nom_prod, p.pre_prod, vi.cantidad, vi.subtotal, vi.id_venta
                    FROM venta_info vi, producto p
                    WHERE vi.id_prod = p.id_prod";
                $ejecutar2 = $conexion->query($consulta2);
                while($imprimir2 = $ejecutar2->fetch_assoc()){
                ?>

                <tr>
                    <td>
                        <center>
                            <?php
                            echo $imprimir2['referencia'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir2['nom_prod'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir2['pre_prod'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir2['cantidad'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir2['subtotal'];
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                            echo $imprimir2['id_venta'];
                            ?>
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