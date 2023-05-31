<?php
    require_once("factura.php");
    $data = new Factura();
    $Facturas_ID = $_GET['Facturas_ID'];
    $data->setFacturas_ID($Facturas_ID);
    $record = $data->selectOne();
    $nombres2 = $data->selectNombres();
    $companias2 = $data->selectCompanias();
    $val = $record[0];
    print_r($val);
    print_r($nombres2);

    if(isset($_POST['editar'])){
        $data->setEmpleados_ID($_POST['idsEmpleado']);
        $data->setClientes_ID($_POST['idsCliente']);
        $data->setFecha($_POST['fechasFactura']);

        $data->update();
        echo "<script> alert('Los Datos fueron Actualizados Exitosamente'); document.location='facturas.php' </script>";
    }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Facturas</title>
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
        <h2 class="m-2">Factura a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-11">
                <label for="idsEmpleado" class="form-label">ID Empleado</label>
                <select id="idsEmpleado" name="idsEmpleado" class="form-control">
                <option value="">Seleccione la ID del Empleado</option>
                <!-- Metodo Cristian Luna -->
                          <?php foreach ($nombres2 as $nombress2){ 
                            $nombresId = $nombress2['Empleados_ID'];  
                            $nombresNombre = $nombress2['Nombre'];
                            ?>
                            <option value="<?php echo $nombresId?>"><?php echo $nombresNombre?></option>
                          <?php } ?>
                        </select>
              </div>

              <div class="mb-1 col-11">
                <label for="idsCliente" class="form-label">ID Cliente</label>
                <select id="idsCliente" name="idsCliente" class="form-control">
                  <option value="">Seleccione la ID del Cliente</option>
                  <!-- Metodo Santiago Lopez Garcia -->
                          <?php foreach ($companias2 as $key=> $companias2){ ?>
                            <option value="<?php echo $companias2["Clientes_ID"]?>"><?php echo $companias2["Compania"]?></option>
                          <?php } ?>
                        </select>
              </div>

              <div class="mb-1 col-11">
                <label for="fechasFactura" class="form-label">Fecha</label>
                <input 
                  type="date"
                  id="fechasFactura"
                  name="fechasFactura"
                  class="form-control"
                  value="<?php echo $val["Fecha"] ?>"

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
      <h3>Detalle Proveedores</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>