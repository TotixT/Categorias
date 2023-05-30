<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if(isset($_POST['registrarse'])){
        require_once("RegistroUser.php");
        $RegistroUser = new RegistroUser();
        $RegistroUser-> setEmpleados_ID($_POST['idEmpleados']);
        $RegistroUser-> setEmail($_POST['emailRegister']);
        $RegistroUser-> setUsername($_POST['usernameRegister']);
        $RegistroUser-> setPassword($_POST['passwordRegister']);
        $RegistroUser-> insertData();
        echo "<script> alert('User creado Satisfactoriamente Satisfactoriamente'); document.location='loginRegister.php' </script>";

    }
?>
