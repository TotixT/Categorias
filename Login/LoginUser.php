<?php

require_once("../db.php");

class LoginUser{
    private $Users_ID;
    private $Email;
    private $password;
    protected $dbCnx;

    public function __construct($Users_ID= 0, $Email="", $password=""){
        $this->Users_ID = $Users_ID;
        $this->Email = $Email;
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
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE Email = ? AND password = ?");
            $stm->execute([$this->Email,md5($this->password)]);
            $user = $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['users_ID'] = $user[0]['users_ID'];
                $_SESSION['Email'] = $user[0]['Email'];
                $_SESSION['password'] = $user[0]['password'];
                $_SESSION['Username'] = $user[0]['Username'];
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