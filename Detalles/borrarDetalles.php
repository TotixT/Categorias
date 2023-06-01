<?php
    require_once("detalle.php");
    $record = new Detalle();
    if(isset($_GET['Detalles_ID']) && isset($_GET['req']) ){
        if($_GET['req'] == "delete"){
            $record->setDetalles_ID($_GET['Detalles_ID']);
            $record->deleteData();
            echo "<script> alert('Los Datos Fueron Borrados Exitosamente'); document.location='detalles.php' </script>";
        }
    }
?>