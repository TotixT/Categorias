<?php
    if(isset($_POST['guardar'])){
        require_once("factura.php");
        $factura = new Factura();
        $factura-> setEmpleados_ID($_POST['idEmpleado']);
        $factura-> setClientes_ID($_POST['idCliente']);
        $factura-> setFecha($_POST['fechaFactura']);
        $factura-> insertData();
        echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='facturas.php' </script>";

    }
?>