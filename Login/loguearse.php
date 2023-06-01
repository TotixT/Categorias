<?php

    session_start();
    if(isset($_POST['loguearse'])){
        require_once("LoginUser.php");
        $credenciales = new LoginUser();
        $credenciales->setEmail($_POST['email']);
        $credenciales->setPassword($_POST['password']);
        $credenciales->setTipo_Usuario($_POST['tipoUsuario']);

        $login = $credenciales->login();

        if($login){
            header('Location:../Home/home.php');
        } else {
            echo "<script> alert('Password o Email o Tipo Usuario Invalidos!'); document.location='loginRegister.php' </script>";
        }
    }
?>