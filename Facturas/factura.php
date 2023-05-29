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

        // Insert Data - Insert

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO facturas (Facturas_ID,Empleados_ID,Clientes_ID,Fecha) VALUES (?,?,?,?)");
                $stm->execute([$this->Facturas_ID,$this->Empleados_ID,$this->Clientes_ID,$this->Fecha]);
            } catch (Exception $e) {
                $e -> getMessage();
            }
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

        // Delete Data - Delete

        public function deleteData(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM facturas WHERE Facturas_ID=?");
                $stm->execute([$this->Facturas_ID]);
                return $stm->fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='facturas.php'</script>";
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select One - Seleccion de un dato especifico por ID

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT facturas.Facturas_ID, empleados.Nombre, clientes.Compania, facturas.Fecha
                FROM facturas
                INNER JOIN empleados ON facturas.Empleados_ID = empleados.Empleados_ID
                INNER JOIN clientes ON facturas.Clientes_ID = clientes.Clientes_ID
                WHERE facturas.Facturas_ID = ?;");
                $stm->execute([$this->Facturas_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Update Data - Update

        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE facturas 
                INNER JOIN empleados ON facturas.Empleados_ID = empleados.Empleados_ID
                INNER JOIN clientes ON facturas.Clientes_ID = clientes.Clientes_ID
                SET empleados.Nombre=?,clientes.Compania=?,facturas.Fecha=?
                WHERE Facturas_ID=?;");
                $stm->execute([$this->Empleados_ID,$this->Clientes_ID,$this->Fecha,$this->Facturas_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

    }
?>