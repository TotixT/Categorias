<?php
    if(isset($_POST['guardar'])){
        require_once("empleado.php");
        $empleado = new Empleado();
        $empleado-> setNombre($_POST['nombreEmpleado']);
        $empleado-> setCelular($_POST['celular']);
        $empleado-> setDireccion($_POST['direccion']);
        $empleado-> setImagen($_POST['imagen']);
        $empleado-> insertData();
        echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='empleados.php' </script>";

    }
?>