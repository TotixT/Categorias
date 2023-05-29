<?php
    if(isset($_POST['guardar'])){
        require_once("producto.php");
        $producto = new Producto();
        $producto-> setCategoria_ID($_POST['idCategoria']);
        $producto-> setProveedor_ID($_POST['idProveedor']);
        $producto-> setProductos_Nombre($_POST['nombreProducto']);
        $producto-> setPrecio_Unitario($_POST['precioProducto']);
        $producto-> setStock($_POST['stockProducto']);
        $producto-> setUnidadesPedidas($_POST['unidadesProducto']);
        $producto-> setDescontinuado($_POST['descontinuadoProducto']);
        $producto-> insertData();
        echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='productos.php' </script>";

    }
?>