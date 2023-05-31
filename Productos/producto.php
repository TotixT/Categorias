<?php
    require_once("../db.php");
    class Producto{
        private $Productos_ID;
        private $Categoria_ID;
        private $Proveedor_ID;
        private $Productos_Nombre;
        private $Precio_Unitario;
        private $Stock;
        private $UnidadesPedidas;
        private $Descontinuado;
        protected $dbCnx;

        public function __construct($Productos_ID=0,$Categoria_ID=0,$Proveedor_ID=0,$Productos_Nombre="",$Precio_Unitario="",$Stock=0,$UnidadesPedidas=0,$Descontinuado=""){
            $this->Productos_ID = $Productos_ID;
            $this->Categoria_ID = $Categoria_ID;
            $this->Proveedor_ID = $Proveedor_ID;
            $this->Productos_Nombre = $Productos_Nombre;
            $this->Precio_Unitario = $Precio_Unitario;
            $this->Stock = $Stock;
            $this->UnidadesPedidas = $UnidadesPedidas;
            $this->Descontinuado = $Descontinuado;
            $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // Productos ID
        
        public function setProductos_ID($Productos_ID){
            $this->Productos_ID = $Productos_ID;
        }
        public function getProductos_ID(){
            $this->Productos_ID;
        }

        // Categoria ID

        public function setCategoria_ID($Categoria_ID){
            $this->Categoria_ID = $Categoria_ID;
        }
        public function getCategoria_ID(){
            $this->Categoria_ID;
        }

        // Proveedor ID

        public function setProveedor_ID($Proveedor_ID){
            $this->Proveedor_ID = $Proveedor_ID;
        }
        public function getProveedor_ID(){
            $this->Proveedor_ID;
        }

        // Productos Nombre

        public function setProductos_Nombre($Productos_Nombre){
            $this->Productos_Nombre = $Productos_Nombre;
        }
        public function getProductos_Nombre(){
            $this->Productos_Nombre;
        }

        // Precio Unitario

        public function setPrecio_Unitario($Precio_Unitario){
            $this->Precio_Unitario = $Precio_Unitario;
        }
        public function getPrecio_Unitario(){
            $this->Precio_Unitario;
        }

        // Stock

        public function setStock($Stock){
            $this->Stock = $Stock;
        }
        public function getStock(){
            $this->Stock;
        }

        // Unidades Pedidas

        public function setUnidadesPedidas($UnidadesPedidas){
            $this->UnidadesPedidas = $UnidadesPedidas;
        }
        public function getUnidadesPedidas(){
            $this->UnidadesPedidas;
        }

        // Descontinuado

        public function setDescontinuado($Descontinuado){
            $this->Descontinuado = $Descontinuado;
        }
        public function getDescontinuado(){
            $this->Descontinuado;
        }

        // Insert Data - Insert

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO productos (Productos_ID,Categoria_ID,Proveedor_ID,Productos_Nombre,Precio_Unitario,Stock,UnidadesPedidas,Descontinuado) VALUES (?,?,?,?,?,?,?,?)");
                $stm->execute([$this->Productos_ID,$this->Categoria_ID,$this->Proveedor_ID,$this->Productos_Nombre,$this->Precio_Unitario,$this->Stock,$this->UnidadesPedidas,$this->Descontinuado]);
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select All - Read

        public function selectAll(){
                try {
                 $stm = $this->dbCnx->prepare("SELECT productos.Productos_ID, categoria.Categoria_Nombre, proveedor.Proveedor_Nombre, productos.Productos_Nombre, productos.Precio_Unitario, productos.Stock, productos.UnidadesPedidas, productos.Descontinuado
                 FROM productos
                 INNER JOIN categoria ON productos.Categoria_ID = categoria.Categoria_ID
                 INNER JOIN proveedor ON productos.Proveedor_ID = proveedor.Proveedor_ID;");
                 $stm->execute();
                 return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        public function selectCategorias(){
            try {
                $stm = $this->dbCnx->prepare("SELECT Categoria_ID,Categoria_Nombre  FROM categoria;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        public function selectProveedores(){
            try {
                $stm = $this->dbCnx->prepare("SELECT Proveedor_ID,Proveedor_Nombre FROM proveedor;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Delete Data - Delete

        public function deleteData(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM productos WHERE Productos_ID=?");
                $stm->execute([$this->Productos_ID]);
                return $stm->fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='productos.php'</script>";
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select One - Seleccion de un dato especifico por ID

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT productos.Productos_ID, categoria.Categoria_Nombre, proveedor.Proveedor_Nombre, productos.Productos_Nombre, productos.Precio_Unitario, productos.Stock, productos.UnidadesPedidas, productos.Descontinuado
                FROM productos
                INNER JOIN categoria ON productos.Categoria_ID = categoria.Categoria_ID
                INNER JOIN proveedor ON productos.Proveedor_ID = proveedor.Proveedor_ID
                WHERE productos.Productos_ID = ?;");
                $stm->execute([$this->Productos_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Update Data - Update

        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE productos 
                INNER JOIN categoria ON productos.Categoria_ID = categoria.Categoria_ID
                INNER JOIN proveedor ON productos.Proveedor_ID = proveedor.Proveedor_ID
                SET productos.Categoria_ID=?,productos.Proveedor_ID=?,productos.Productos_Nombre=?,productos.Precio_Unitario=?,productos.Stock=?,productos.UnidadesPedidas=?,productos.Descontinuado=?
                WHERE Productos_ID=?;");
                $stm->execute([$this->Categoria_ID,$this->Proveedor_ID,$this->Productos_Nombre,$this->Precio_Unitario,$this->Stock,$this->UnidadesPedidas,$this->Descontinuado,$this->Productos_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

    }
?>