<?php
    require_once("producto.php");
    $data = new Producto();
    $Productos_ID = $_GET['Productos_ID'];
    $data->setProductos_ID($Productos_ID);
    $record = $data->selectOne();
    $categorias2 = $data->selectCategorias();
    $proveedores2 = $data->selectProveedores();
    $val = $record[0];

    if(isset($_POST['editar'])){
        $data->setCategoria_ID($_POST['idsCategoria']);
        $data->setProveedor_ID($_POST['idsProveedor']);
        $data->setProductos_Nombre($_POST['nombresProducto']);
        $data->setPrecio_Unitario($_POST['preciosUnitario']);
        $data->setStock($_POST['stocks']);
        $data->setUnidadesPedidas($_POST['unidadespedidass']);
        $data->setDescontinuado($_POST['descontinuados']);

        $data->update();
        echo "<script> alert('Los Datos fueron Actualizados Exitosamente'); document.location='productos.php' </script>";
    }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Productos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css%22%3E">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Campus Skiller.</h3>
        <img src="../images/Diseño sin título.png" alt="" class="imagenPerfil">
        <h3 >Santiago Lopez</h3>
      </div>
      <div class="menus">
        <!-- <a href="home.html" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Home</h3>
        </a> -->
        <a href="../Categorias/categorias.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Categorias</h3>
        </a>
        <a href="../Clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../Empleados/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../Facturas/facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="../Detalles/detalles.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Detalle de Facturas</h3>
        </a>
        <a href="../Productos/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="../Proveedores/proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
      </div>
    </div>
<div class="parte-media">
        <h2 class="m-2">Producto a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-11">
                <label for="idsCategoria" class="form-label">ID de la Categoria</label>
                <select id="idsCategoria" name="idsCategoria" class="form-control">
                  <option value="">Seleccione la ID del Categoria</option>
                          <?php foreach ($categorias2 as $key=> $categorias2){ ?>
                            <option value="<?php echo $categorias2["Categoria_ID"]?>"><?php echo $categorias2["Categoria_Nombre"]?></option>
                          <?php } ?>
                        </select>
              </div>

              <div class="mb-1 col-11">
                <label for="idsProveedor" class="form-label">ID del Proveedor</label>
                <select id="idsProveedor" name="idsProveedor" class="form-control">
                  <option value="">Seleccione la ID del Proveedor</option>
                          <?php foreach ($proveedores2 as $key=> $proveedores2){ ?>
                            <option value="<?php echo $proveedores2["Proveedor_ID"]?>"><?php echo $proveedores2["Proveedor_Nombre"]?></option>
                          <?php } ?>
                        </select>
              </div>

              <div class="mb-1 col-11">
                <label for="nombresProducto" class="form-label">Nombre del Producto</label>
                <input 
                  type="text"
                  id="nombresProducto"
                  name="nombresProducto"
                  class="form-control"
                  value="<?php echo $val["Productos_Nombre"] ?>"
                />
              </div>

              <div class="mb-1 col-11">
                <label for="preciosUnitario" class="form-label">Precio Unitario</label>
                <input 
                  type="text"
                  id="preciosUnitario"
                  name="preciosUnitario"
                  class="form-control"
                  value="<?php echo $val["Precio_Unitario"] ?>"
                />
              </div>
              
              <div class="mb-1 col-11">
                <label for="stocks" class="form-label">Stock</label>
                <input 
                  type="text"
                  id="stocks"
                  name="stocks"
                  class="form-control"
                  value="<?php echo $val["Stock"] ?>"
                />
              </div>

              <div class="mb-1 col-11">
                <label for="unidadespedidass" class="form-label">Unidades Pedidas</label>
                <input 
                  type="text"
                  id="unidadespedidass"
                  name="unidadespedidass"
                  class="form-control"
                  value="<?php echo $val["UnidadesPedidas"] ?>"
                />
              </div>

              <div class="mb-1 col-11">
                <label for="descontinuados" class="form-label">Descontinuado?</label>
                <input 
                  type="text"
                  id="descontinuados"
                  name="descontinuados"
                  class="form-control"
                  value="<?php echo $val["Descontinuado"] ?>"
                />
              </div>


              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>
        <div id="charts1" class="charts"> </div>
      </div>
    </div>
<div class="parte-derecho " id="detalles">
      <h3>Detalle Productos</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>