<?php
    require_once("proveedor.php");
    $record = new Proveedor();
    if(isset($_GET['Proveedor_ID']) && isset($_GET['req']) ){
        if($_GET['req'] == "delete"){
            $record->setProveedor_ID($_GET['Proveedor_ID']);
            $record->deleteData();
            echo "<script> alert('Los Datos Fueron Borrados Exitosamente'); document.location='proveedores.php' </script>";
        }
    }
?>