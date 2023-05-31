<?php
  require_once("../Login/LoginUser.php");
  session_start();
  require_once("producto.php");
  $data = new Producto();
  $all = $data->selectAll();
  $categorias = $data->selectCategorias();
  $proveedores = $data->selectProveedores();
  //print_r($all);
  //print_r($categorias);
  //print_r($proveedores);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facturas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Productos.</h3>
        <img src="../images/Diseño sin título.png" alt="" class="imagenPerfil">
        <h3><?php echo $_SESSION['Username']?></h3>
      </div>
      <div class="menus">
        <!-- <a href="/Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
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
      <div style="display: flex; justify-content: space-between;">
        <h2>Producto</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarProductos"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID DE LA CATEGORIA</th>
              <th scope="col">ID DEL PROVEEDOR</th>
              <th scope="col">NOMBRE PRODUCTO</th>
              <th scope="col">PRECIO UNITARIO</th>
              <th scope="col">STOCK</th>
              <th scope="col">UNIDADES PEDIDAS</th>
              <th scope="col">DESCONTINUADO</th>
              <th scope="col">ELIMINAR</th>
              <th scope="col">EDITAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
            foreach($all as $key=> $val){
            ?>
            <tr>
              <td><?php echo $val['Productos_ID'] ?></td>
              <td><?php echo $val['Categoria_Nombre'] ?></td>
              <td><?php echo $val['Proveedor_Nombre'] ?></td>
              <td><?php echo $val['Productos_Nombre'] ?></td>
              <td><?php echo $val['Precio_Unitario'] ?></td>
              <td><?php echo $val['Stock'] ?></td>
              <td><?php echo $val['UnidadesPedidas'] ?></td>
              <td><?php echo $val['Descontinuado'] ?></td>
              <td>  
                <a class="btn btn-danger" href="borrarProductos.php?Productos_ID=<?=$val['Productos_ID']?>&req=delete">Borrar</a>
              </td>
              <td>
                <a class="btn btn-warning" href="editarProductos.php?Productos_ID=<?=$val['Productos_ID']?>">Editar</a>
              </td>
            </tr>
          </tbody>
        <?php
            }
            ?>
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Productos</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarProductos.php" method="post">
              <div class="mb-1 col-12">
                <label for="idCategoria" class="form-label">Id de la Categoria</label>
                <select id="idCategoria" name="idCategoria" class="form-control">
                          <?php foreach ($categorias as $key=> $val){ ?>
                            <option value="<?php echo $val["Categoria_ID"]?>"><?php echo $val["Categoria_Nombre"]?></option>
                          <?php } ?>
                        </select>
              </div>

              <div class="mb-1 col-12">
                <label for="idProveedor" class="form-label">Id del Proveedor</label>
                <select id="idProveedor" name="idProveedor" class="form-control">
                          <?php foreach ($proveedores as $key=> $val){ ?>
                            <option value="<?php echo $val["Proveedor_ID"]?>"><?php echo $val["Proveedor_Nombre"]?></option>
                          <?php } ?>
                        </select>
              </div>

              <div class="mb-1 col-12">
                <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                <input 
                  type="text"
                  id="nombreProducto"
                  name="nombreProducto"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="precioProducto" class="form-label">Precio Unitario</label>
                <input 
                  type="text"
                  id="precioProducto"
                  name="precioProducto"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="stockProducto" class="form-label">Stock</label>
                <input 
                  type="text"
                  id="stockProducto"
                  name="stockProducto"
                  class="form-control"  
                />
              </div>
              
              <div class="mb-1 col-12">
                <label for="unidadesProducto" class="form-label">Unidades Pedidas</label>
                <input 
                  type="text"
                  id="unidadesProducto"
                  name="unidadesProducto"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="descontinuadoProducto" class="form-label">Descontinuado</label>
                <input 
                  type="text"
                  id="descontinuadoProducto"
                  name="descontinuadoProducto"
                  class="form-control"  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="Guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>