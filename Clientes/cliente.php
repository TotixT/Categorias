<?php
    require_once("../db.php");
    class Cliente{
        private $Clientes_ID;
        private $Celular;
        private $Compania;
        protected $dbCnx;

        public function __construct($Clientes_ID=0,$Celular=0,$Compania=""){
            $this->Clientes_ID = $Clientes_ID;
            $this->Celular = $Celular;
            $this->Compania = $Compania;
            $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // Clientes ID
        
        public function setClientes_ID($Clientes_ID){
            $this->Clientes_ID = $Clientes_ID;
        }
        public function getClientes_ID(){
            $this->Clientes_ID;
        }

        // Celular

        public function setCelular($Celular){
            $this->Celular = $Celular;
        }
        public function getCelular(){
            $this->Celular;
        }

        // Compañia

        public function setCompania($Compania){
            $this->Compania = $Compania;
        }
        public function getCompania(){
            $this->Compania;
        }

        // Insert Data - Insert

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO clientes (Clientes_ID,Celular,Compania) VALUES (?,?,?)");
                $stm->execute([$this->Clientes_ID,$this->Celular,$this->Compania]);
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select All - Read

        public function selectAll(){
                try {
                 $stm = $this->dbCnx->prepare("SELECT * FROM clientes");
                 $stm->execute();
                 return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Delete Data - Delete

        public function deleteData(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE Clientes_ID=?");
                $stm->execute([$this->Clientes_ID]);
                return $stm->fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='clientes.php'</script>";
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select One - Seleccion de un dato especifico por ID

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE Clientes_ID=?");
                $stm->execute([$this->Clientes_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Update Data - Update

        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE clientes SET Celular=?,Compania=? WHERE Clientes_ID=?");
                $stm->execute([$this->Celular,$this->Compania,$this->Clientes_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }
    }
?>