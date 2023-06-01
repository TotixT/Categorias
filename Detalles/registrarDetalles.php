<?php
    if(isset($_POST['guardar'])){
        require_once("detalle.php");
        $detalle = new Detalle();
        $detalle-> setFacturas_ID($_POST['idFactura']);
        $detalle-> setProductos_ID($_POST['idProducto']);
        $detalle-> setCantidad($_POST['cantidadDetalle']);
        $detalle-> setPrecioVenta($_POST['precioVenta']);
        $detalle-> insertData();
        echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='detalles.php' </script>";

    }
?>