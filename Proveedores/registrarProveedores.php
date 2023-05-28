<?php
    if(isset($_POST['guardar'])){
        require_once("proveedor.php");
        $proveedor = new Proveedor();
        $proveedor-> setProveedor_Nombre($_POST['nombreProveedor']);
        $proveedor-> setTelefono($_POST['telefonoProveedor']);
        $proveedor-> setCiudad($_POST['ciudadProveedor']);
        $proveedor-> insertData();
        echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='proveedores.php' </script>";

    }
?>