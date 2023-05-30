<?php

require_once("../db.php");

class RegistroUser{
    private $Users_ID;
    private $Empleados_ID;
    private $Email;
    private $Username;
    private $password;
    protected $dbCnx;

    public function __construct($Users_ID= 0, $Empleados_ID = 0, $Email="", $Username="", $password=""){
        $this->Users_ID = $Users_ID;
        $this->Empleados_ID = $Empleados_ID;
        $this->Email = $Email;
        $this->Username = $Username;
        $this->password = $password;
        $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    // Users ID

    public function setUsers_ID($Users_ID){
        $this->Users_ID = $Users_ID;
    }
    public function getUsers_ID(){
        return $this->Users_ID;
    }

    // Empleados ID

    public function setEmpleados_ID($Empleados_ID){
        $this->Empleados_ID = $Empleados_ID;
    }
    public function getEmpleados_ID(){
        return $this->Empleados_ID;
    }

    // Email

    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function getEmail(){
        return $this->Email;
    }

    // Username

    public function setUsername($Username){
        $this->Username = $Username;
    }
    public function getUsername(){
        return $this->Username;
    }

    // Password

    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO users (Empleados_ID, Email, Username, password) values (?,?,?,?)");
            $stm->execute([$this->Empleados_ID,$this->Email,$this->Username,md5($this->password)]);
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT empleados.Empleados_ID FROM empleados;");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }
}

?>