<?php
    require_once("../db.php");
    class Empleado{
        private $Empleados_ID ;
        private $Nombre;
        private $Celular;
        private $Direccion;
        private $Imagen;
        protected $dbCnx;

        public function __construct($Empleados_ID=0,$Nombre="",$Celular="",$Direccion="",$Imagen=""){
            $this->Empleados_ID = $Empleados_ID;
            $this->Nombre = $Nombre;
            $this->Celular = $Celular;
            $this->Direccion = $Direccion;
            $this->Imagen = $Imagen;
            $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // Empleados ID
        
        public function setEmpleados_ID($Empleados_ID){
            $this->Empleados_ID = $Empleados_ID;
        }
        public function getEmpleados_ID(){
            $this->Empleados_ID;
        }

        // Nombre

        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        }
        public function getNombre(){
            $this->Nombre;
        }

        // Celular

        public function setCelular($Celular){
            $this->Celular = $Celular;
        }
        public function getCelular(){
            $this->Celular;
        }

        // Direccion

        public function setDireccion($Direccion){
            $this->Direccion = $Direccion;
        }
        public function getDireccion(){
            $this->Direccion;
        }

        // Imagen

        public function setImagen($Imagen){
            $this->Imagen = $Imagen;
        }
        public function getImagen(){
            $this->Imagen;
        }

        // Insert Data - Insert

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO empleados (Empleados_ID,Nombre,Celular,Direccion,Imagen) VALUES (?,?,?,?,?)");
                $stm->execute([$this->Empleados_ID,$this->Nombre,$this->Celular,$this->Direccion,$this->Imagen]);
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select All - Read

        public function selectAll(){
            try {
                 $stm = $this->dbCnx->prepare("SELECT * FROM empleados");
                 $stm->execute();
                 return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Delete Data - Delete

        public function deleteData(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM empleados WHERE Empleados_ID=?");
                $stm->execute([$this->Empleados_ID]);
                return $stm->fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='empleados.php'</script>";
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select One - Seleccion de un dato especifico por ID

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE Empleados_ID=?");
                $stm->execute([$this->Empleados_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Update Data - Update

        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE empleados SET Nombre=?,Celular=?,Direccion=?,Imagen=? WHERE Empleados_ID=?");
                $stm->execute([$this->Nombre,$this->Celular,$this->Direccion,$this->Imagen,$this->Empleados_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }
    }
?>