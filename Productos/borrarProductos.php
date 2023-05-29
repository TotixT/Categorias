<?php
    require_once("producto.php");
    $record = new Producto();
    if(isset($_GET['Productos_ID']) && isset($_GET['req']) ){
        if($_GET['req'] == "delete"){
            $record->setProductos_ID($_GET['Productos_ID']);
            $record->deleteData();
            echo "<script> alert('Los Datos Fueron Borrados Exitosamente'); document.location='productos.php' </script>";
        }
    }
?>