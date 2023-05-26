<?php
    require_once("config.php");
    $record = new Categoria();
    if(isset($_GET['Categoria_ID']) && isset($_GET['req']) ){
        if($_GET['req'] == "delete"){
            $record->setCategoria_ID($_GET['Categoria_ID']);
            $record->deleteData();
            echo "<script> alert('Los Datos Fueron Borrados Exitosamente'); document.location='categorias.php' </script>";
        }
    }
?>