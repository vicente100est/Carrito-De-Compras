<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'AGREGAR':
            if(is_numeric($_POST['id'])){
                $id=$_POST['id'];
                $mensaje.="Producto agregado ".$id;
            }
            else{
                $mensaje.="¡UPS! ALGO SALIO MAL CON TU PRODUCTO";
            }

            if(is_string($_POST['nombre'])){
                $nom=$_POST['nombre'];
                $mensaje.=" ".$nom. " ";
            }
            else{
                $mensaje="¡UPS! ALGO SALIO MAL CON EL NOMBRE DE TU PRODUCTO";
            }

            if(is_numeric($_POST['precio'])){
                $pre=$_POST['precio'];
                $mensaje.=" $".$pre. " ";
            }
            else{
                $mensaje.="¡UPS! ALGO SALIO MAL CON EL PRECIO DE TU PRODUCTO";
            }

            if(is_numeric($_POST['cantidad'])){
                $can=$_POST['cantidad'];
                $mensaje.="se lleva ".$can. " ";
            }
            else{
                $mensaje.="¡UPS! ALGO SALIO MAL CON LA CANTIDAD DE TU PRODUCTO";
            }

            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID'=>$id,
                    'NOMBRE'=>$nom,
                    'PRECIO'=>$pre,
                    'CANTIDAD'=>$can,
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="Producto agregado";
            }
            else{
                $idProductos=array_column($_SESSION['CARRITO'],'ID');
                if(in_array($id,$idProductos)){
                    echo "<script>alert('El producto ya ha sido seleccionado...')</script>";
                    $mensaje="";
                }
                else{
                    $numeroproductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=>$id,
                        'NOMBRE'=>$nom,
                        'PRECIO'=>$pre,
                        'CANTIDAD'=>$can,
                    );
                    $_SESSION['CARRITO'][$numeroproductos]=$producto;
                    $mensaje="Producto agregado";
                }
            }
            //$mensaje=print_r($_SESSION,true);
        break;

        case 'ELIMINAR':
            if(is_string($_POST['id'])){
                $id=$_POST['id'];

                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                }
                if($producto['id_prod']==$id){
                    unset($_SESSION['CARRITO'][$indice]);
                    echo "<script>alert('Producto eliminado');</script>";
                }
            }
            else{
                $mensaje.="¡UPS! ALGO SALIO MAL CON TU PRODUCTO";
            }
        break;
    }
}
else{}
?>