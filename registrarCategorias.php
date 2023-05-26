<?php
    if(isset($_POST['guardar'])){
        require_once("config.php");
        $categoria = new Categoria();
        $categoria-> setCategoria_Nombre($_POST['nombresCategoria']);
        $categoria-> setDescripcion($_POST['descripcion']);
        $categoria-> setImagen($_POST['imagen']);
        $categoria-> insertData();
        echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='categorias.php' </script>";

    }
?>