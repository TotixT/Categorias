<?php

    session_start();
    if(isset($_POST['loguearse'])){
        require_once("LoginUser.php");
        $credenciales = new LoginUser();
        $credenciales->setEmail($_POST['email']);
        $credenciales->setPassword($_POST['password']);
        $credenciales->setTipo_Usuario($_POST['tipoUsuario']);

        $login = $credenciales->login();

        if($login && $_SESSION['Tipo_Usuario'] == 'Administrativo'){
            header('Location:../Home/home.php');
        } else if ($login && $_SESSION['Tipo_Usuario'] == 'Estandar'){
            header('Location:../Home2/home.php');
        } else {
            echo "<script> alert('Password o Email o Tipo Usuario Invalidos!'); document.location='loginRegister.php' </script>";
        }
    }
?>