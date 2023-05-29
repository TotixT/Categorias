<?php
    require_once("factura.php");
    $record = new Factura();
    if(isset($_GET['Facturas_ID']) && isset($_GET['req']) ){
        if($_GET['req'] == "delete"){
            $record->setFacturas_ID($_GET['Facturas_ID']);
            $record->deleteData();
            echo "<script> alert('Los Datos Fueron Borrados Exitosamente'); document.location='facturas.php' </script>";
        }
    }
?>