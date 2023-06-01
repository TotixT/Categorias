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
    }
?>