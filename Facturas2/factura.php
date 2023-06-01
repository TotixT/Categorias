<?php
    require_once("../db.php");
    class Factura{
        private $Facturas_ID;
        private $Empleados_ID;
        private $Clientes_ID;
        private $Fecha;
        protected $dbCnx;

        public function __construct($Facturas_ID=0,$Empleados_ID=0,$Clientes_ID=0,$Fecha=""){
            $this->Facturas_ID = $Facturas_ID;
            $this->Empleados_ID = $Empleados_ID;
            $this->Clientes_ID = $Clientes_ID;
            $this->Fecha = $Fecha;
            $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // Facturas ID
        
        public function setFacturas_ID($Facturas_ID){
            $this->Facturas_ID = $Facturas_ID;
        }
        public function getFacturas_ID(){
            $this->Facturas_ID;
        }

        // Empleados ID

        public function setEmpleados_ID($Empleados_ID){
            $this->Empleados_ID = $Empleados_ID;
        }
        public function getEmpleados_ID(){
            $this->Empleados_ID;
        }

        // Clientes ID

        public function setClientes_ID($Clientes_ID){
            $this->Clientes_ID = $Clientes_ID;
        }
        public function getClientes_ID(){
            $this->Clientes_ID;
        }

        // Fecha

        public function setFecha($Fecha){
            $this->Fecha = $Fecha;
        }
        public function getFecha(){
            $this->Fecha;
        }

        // Select All - Read

        public function selectAll(){
                try {
                 $stm = $this->dbCnx->prepare("SELECT facturas.Facturas_ID, empleados.Nombre, clientes.Compania, facturas.Fecha
                 FROM facturas
                 INNER JOIN empleados ON facturas.Empleados_ID = empleados.Empleados_ID
                 INNER JOIN clientes ON facturas.Clientes_ID = clientes.Clientes_ID;");
                 $stm->execute();
                 return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        public function selectNombres(){
            try {
                $stm = $this->dbCnx->prepare("SELECT Empleados_ID,Nombre FROM empleados;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        public function selectCompanias(){
            try {
                $stm = $this->dbCnx->prepare("SELECT Clientes_ID, Compania FROM clientes;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

    }
?>