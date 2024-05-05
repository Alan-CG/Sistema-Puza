<?php include 'model/consultaproductos.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style><?php include "css/style_general.css" ?></style>
  <title>Productos</title>
</head>

<body>

  <header>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Puza</h1>
        <p class="lead">Sistema de inventario</p>
      </div>
    </div>
    <nav class="nav navbar-expand-sm">
          <a class="nav-link active" href="menu.php">Menú</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Catálogos
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="matprimR.php">Materias primas</a>
              <a class="dropdown-item" href="clienteR.php">Clientes</a>
              <a class="dropdown-item" href="proveedoresR.php">Proveedores</a>
              <a class="dropdown-item" href="productosR.php">Productos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Otros
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="productosterminadosR.php">Productos terminados</a>
              <a class="dropdown-item" href="comprasR.php">Compras</a>
              <a class="dropdown-item" href="pedidosR.php">Pedidos</a>
              <a class="dropdown-item" href="compras_llegaR.php">Compras Por Llegar</a>
              <a class="dropdown-item" href="compras_confiR.php">Compras Confirmadas</a>
              <a class="dropdown-item" href="produccionR.php">Producción</a>
            </div>
          </li>
        </nav>
  </header>
  <div class="container">
    <h3 class="text-center">Lista de Productos</h3>
    <div class="form-row">
      <div class="form-group col">
         <a href="formulaprodC.php" class="btn btn-success">Crear Nuevo Producto</a> 
      </div>
    </div>
     <div class="row w-100 align-items-center ">
        <div class="col text-center">
          <table class="table table-striped">
            <thead>
              <tr>
                <th hidden scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Costo</th>
                <th scope="col">Precio de venta</th>
                <th scope="col">Materiales</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($miConsulta as $clave => $valor): ?>
              <tr>
                <td hidden>
                  <?= $valor['IDproducto']; ?>
                </td>
                <td>
                  <?= $valor['NombreProducto']; ?>
                </td>
                <td>
                  <?= $valor['DescripcionProducto']; ?>
                </td>
                <td>
                  $<?= $valor['PrecioCosto']; ?>
                </td>
                <td>
                  $<?= $valor['PrecioProducto']; ?>
                </td>
                <td>
                  <a class="btn btn-primary bi bi-plus-square" href="productos_matR.php?IDproducto=<?= $valor['IDproducto'] ?>"></a>
                </td>
                <td>
                  <a class="btn btn-primary bi bi-pencil-square" href="productosU.php?IDproducto=<?= $valor['IDproducto'] ?>"></a>
                </td>
                <td>
                  <a class="btn btn-danger bi bi-trash3-fill" href="model/borrarprodbd.php?IDproducto=<?= $valor['IDproducto'] ?>"></a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="menu.php" class="btn btn-primary bi bi-arrow-return-left"></a>
        </div>
      </div>
  </div>


</body>

</html>