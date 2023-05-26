<?php
    require_once("../db.php");
    class Categoria{
        private $Categoria_ID;
        private $Categoria_Nombre;
        private $Descripcion;
        private $Imagen;
        protected $dbCnx;

        public function __construct($Categoria_ID=0,$Categoria_Nombre="",$Descripcion="",$Imagen=""){
            $this->Categoria_ID = $Categoria_ID;
            $this->Categoria_Nombre = $Categoria_Nombre;
            $this->Descripcion = $Descripcion;
            $this->Imagen = $Imagen;
            $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // Categoria ID
        
        public function setCategoria_ID($Categoria_ID){
            $this->Categoria_ID = $Categoria_ID;
        }
        public function getCategoria_ID(){
            $this->Categoria_ID;
        }

        // Categoria Nombre

        public function setCategoria_Nombre($Categoria_Nombre){
            $this->Categoria_Nombre = $Categoria_Nombre;
        }
        public function getCategoria_Nombre(){
            $this->Categoria_Nombre;
        }

        // Descripcion

        public function setDescripcion($Descripcion){
            $this->Descripcion = $Descripcion;
        }
        public function getDescripcion(){
            $this->Descripcion;
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
                $stm = $this->dbCnx->prepare("INSERT INTO categoria (Categoria_ID,Categoria_Nombre,Descripcion,Imagen) VALUES (?,?,?,?)");
                $stm->execute([$this->Categoria_ID,$this->Categoria_Nombre,$this->Descripcion,$this->Imagen]);
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select All - Read

        public function selectAll(){
            try {
                 $stm = $this->dbCnx->prepare("SELECT * FROM categoria");
                 $stm->execute();
                 return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Delete Data - Delete

        public function deleteData(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM categoria WHERE Categoria_ID=?");
                $stm->execute([$this->Categoria_ID]);
                return $stm->fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='categorias.php'</script>";
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select One - Seleccion de un dato especifico por ID

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM categoria WHERE Categoria_ID=?");
                $stm->execute([$this->Categoria_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Update Data - Update

        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE categoria SET Categoria_Nombre=?,Descripcion=?,Imagen=? WHERE Categoria_ID=?");
                $stm->execute([$this->Categoria_Nombre,$this->Descripcion,$this->Imagen,$this->Categoria_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }
    }
?>