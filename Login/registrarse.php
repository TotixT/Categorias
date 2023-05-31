<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if(isset($_POST['registrarse'])){
        require_once("RegistroUser.php");
        $RegistroUser = new RegistroUser();
        $RegistroUser-> setEmpleados_ID($_POST['idEmpleados']);
        $RegistroUser-> setEmail($_POST['email']);
        $RegistroUser-> setUsername($_POST['username']);
        $RegistroUser-> setPassword($_POST['password']);
        if($RegistroUser->checkUser($_POST['email'])){
            echo "<script> alert('Usuario existente!'); document.location='loginRegister.php' </script>";
        } else {
            $RegistroUser-> insertData();
        echo "<script> alert('User creado Satisfactoriamente'); document.location='../Home/home.php' </script>";
        }
        

    }
?>
