<?php
    require_once("../db.php");
    class Detalle{
        private $Detalles_ID;
        private $Facturas_ID;
        private $Productos_ID;
        private $Cantidad;
        private $PrecioVenta;
        protected $dbCnx;

        public function __construct($Detalles_ID=0,$Facturas_ID=0,$Productos_ID=0,$Cantidad=0,$PrecioVenta=""){
            $this->Detalles_ID = $Detalles_ID;
            $this->Facturas_ID = $Facturas_ID;
            $this->Productos_ID = $Productos_ID;
            $this->Cantidad = $Cantidad;
            $this->PrecioVenta = $PrecioVenta;
            $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // Detalles ID

        public function setDetalles_ID($Detalles_ID){
            $this->Detalles_ID = $Detalles_ID;
        }
        public function getDetalles_ID(){
            $this->Detalles_ID;
        }

        // Facturas ID
        
        public function setFacturas_ID($Facturas_ID){
            $this->Facturas_ID = $Facturas_ID;
        }
        public function getFacturas_ID(){
            $this->Facturas_ID;
        }

        // Productos ID

        public function setProductos_ID($Productos_ID){
            $this->Productos_ID = $Productos_ID;
        }
        public function getProductos_ID(){
            $this->Productos_ID;
        }

        // Cantidad

        public function setCantidad($Cantidad){
            $this->Cantidad = $Cantidad;
        }
        public function getCantidad(){
            $this->Cantidad;
        }

        // Precio Venta

        public function setPrecioVenta($PrecioVenta){
            $this->PrecioVenta = $PrecioVenta;
        }
        public function getPrecioVenta(){
            $this->PrecioVenta;
        }

        // Select All - Read

        public function selectAll(){
                try {
                 $stm = $this->dbCnx->prepare("SELECT facturasdetalle.Detalles_ID,facturas.Facturas_ID, productos.Productos_Nombre, facturasdetalle.Cantidad, facturasdetalle.PrecioVenta
                 FROM facturasdetalle
                 INNER JOIN facturas ON facturasdetalle.Facturas_ID = facturas.Facturas_ID
                 INNER JOIN productos ON facturasdetalle.Productos_ID = productos.Productos_ID;");
                 $stm->execute();
                 return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        public function selectFacturas(){
            try {
                $stm = $this->dbCnx->prepare("SELECT Facturas_ID FROM facturas;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        public function selectProductos(){
            try {
                $stm = $this->dbCnx->prepare("SELECT Productos_ID, Productos_Nombre FROM productos;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

    }
?>