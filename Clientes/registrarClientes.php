<?php
    if(isset($_POST['guardar'])){
        require_once("cliente.php");
        $categoria = new Cliente();
        $categoria-> setCelular($_POST['celularCliente']);
        $categoria-> setCompania($_POST['compañia']);
        $categoria-> insertData();
        echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='clientes.php' </script>";

    }
?>