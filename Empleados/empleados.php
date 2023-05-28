<?php
  require_once("empleado.php");
  $data = new Empleado();
  $all = $data->selectAll();


  $imagenPath = "../images/"; // Ruta de la carpeta de imágenes
  $imagenes = scandir($imagenPath); // Obtener la lista de imágenes


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
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
        <h3 style="margin-bottom: 2rem;">Empleados.</h3>
        <img src="../images/Diseño sin título.png" alt="" class="imagenPerfil">
        <h3>Santiago Lopez</h3>
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
        <a href="../Facturas/facturas.php.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="../Detalles/detalles.php.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Detalle de Facturas</h3>
        </a>
        <a href="../Productos/productos.php.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="../Proveedores/proveedores.php.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
        
       


      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Empleado</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEmpleados"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRE EMPLEADO</th>
              <th scope="col">CELULAR</th>
              <th scope="col">DIRECCION</th>
              <th scope="col">IMAGEN</th>
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
              <td><?php echo $val['Empleados_ID'] ?></td>
              <td><?php echo $val['Nombre'] ?></td>
              <td><?php echo $val['Celular'] ?></td>
              <td><?php echo $val['Direccion'] ?></td>
              <td><img src="<?php echo $imagenPath . $val['Imagen']; ?>" width="70px" alt=""></td>
              <td>  
                <a class="btn btn-danger" href="borrarEmpleados.php?Empleados_ID=<?=$val['Empleados_ID']?>&req=delete">Borrar</a>
              </td>
              <td>
                <a class="btn btn-warning" href="editarEmpleados.php?Empleados_ID=<?=$val['Empleados_ID']?>">Editar</a>
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
      <h3>Detalle Empleados</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEmpleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuev@ Empleado</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarEmpleados.php" method="post">
              <div class="mb-1 col-12">
                <label for="nombreEmpleado" class="form-label">Nombre Empleado</label>
                <input 
                  type="text"
                  id="nombreEmpleado"
                  name="nombreEmpleado"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="celular" class="form-label">Celular Empleado</label>
                <input 
                  type="text"
                  id="celular"
                  name="celular"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Direccion Empleado</label>
                <input 
                  type="text"
                  id="direccion"
                  name="direccion"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="imagen" class="form-label">Imagen</label>
                <select id="imagen" name="imagen" class="form-control">
                  <?php foreach ($imagenes as $imagen): ?>
                    <option value="<?php echo $imagen; ?>" <?php echo ($val['Imagen'] == $imagen) ? 'selected' : ''; ?>><?php echo $imagen; ?></option>
                  <?php endforeach; ?>
                </select>
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