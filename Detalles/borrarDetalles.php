<?php
    require_once("detalle.php");
    $record = new Detalle();
    if(isset($_GET['PrecioVenta']) && isset($_GET['req']) ){
        if($_GET['req'] == "delete"){
            $record->setPrecioVenta($_GET['PrecioVenta']);
            $record->deleteData();
            echo "<script> alert('Los Datos Fueron Borrados Exitosamente'); document.location='detalles.php' </script>";
        }
    }
?>