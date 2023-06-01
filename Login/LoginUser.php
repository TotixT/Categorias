<?php

require_once("../db.php");

class LoginUser{
    private $Users_ID;
    private $Email;
    private $password;
    private $Tipo_Usuario;
    protected $dbCnx;

    public function __construct($Users_ID= 0, $Email="", $password="",$Tipo_Usuario=""){
        $this->Users_ID = $Users_ID;
        $this->Email = $Email;
        $this->password = $password;
        $this->Tipo_Usuario = $Tipo_Usuario;
        $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    // Users ID

    public function setUsers_ID($Users_ID){
        $this->Users_ID = $Users_ID;
    }
    public function getUsers_ID(){
        return $this->Users_ID;
    }

    // Email

    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function getEmail(){
        return $this->Email;
    }

    // Password

    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    // Tipo_Usuario

    public function setTipo_Usuario($Tipo_Usuario){
        $this->Tipo_Usuario = $Tipo_Usuario;
    }
    public function getTipo_Usuario(){
        return $this->Tipo_Usuario;
    }

    public function fetchAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm->execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }        
    }

    public function login(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE Email = ? AND password = ? AND Tipo_Usuario=?");
            $stm->execute([$this->Email,md5($this->password),$this->Tipo_Usuario]);
            $user = $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['Users_ID'] = $user[0]['Users_ID'];
                $_SESSION['Email'] = $user[0]['Email'];
                $_SESSION['password'] = $user[0]['password'];
                $_SESSION['Username'] = $user[0]['Username'];
                $_SESSION['Tipo_Usuario'] = $user[0]['Tipo_Usuario'];
                return true;
            } else {
                false;
            }
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }
}

?>