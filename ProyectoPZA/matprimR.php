<?php include 'model/consultamatprimbd.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style><?php include "css/style_general.css" ?></style>
    <title>Materias primas</title>
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
              Catalogos
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="matprimR.php">Materias primas</a>
              <a class="dropdown-item" href="clienteR.php">Clientes</a>
              <a class="dropdown-item" href="proveedoresR.php">Proveedores</a>
              <a class="dropdown-item" href="">Productos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Otros
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Productos terminados</a>
              <a class="dropdown-item" href="#">Cotización</a>
            </div>
          </li>
        </nav>
        
 </header>
    <div class="container">
      <h3 class="text-center"> Lista de materias primas</h3>
      <div class="form-row">
         <div class="form-group col">
           <a href="matprimC.php" class="btn btn-success">Registrar Materia Prima</a> 
        </div>
      </div>
      <div class="row w-100 align-items-center table-responsive-md">
        <div class="col text-center">
          <table class="table table-striped">
            <thead>
              <tr>
                <th hidden scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Costo</th>
                <th scope="col">Existencias</th>
                <th scope="col">Fecha de entrada</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($miConsulta as $clave => $valor): ?>
                <tr>
                  <td hidden>
                    <?= $valor['IDmateriaprima']; ?>
                  </td>
                  <td>
                    <?= $valor['NombreMateria']; ?>
                  </td>
                  <td>
                    <?= $valor['DescripcionMateria']; ?>
                  </td>
                  <td>
                    <?= $valor['Razon_social_nombre']; ?>
                  </td>
                  <td>
                    <?= $valor['CostoMateria']; ?>
                  </td>
                  <td>
                    <?= $valor['ExistenciasMateria']; ?>
                  </td>
                  <td>
                    <?= $valor['Fecha_entradaMateria']; ?>
                  </td>
                  <td>
                    <a class="btn btn-primary bi bi-pencil-square" href="matprimU.php?IDmateriaprima=<?= $valor['IDmateriaprima'] ?>"></a>
                  </td>
                  <td>
                    <a class="btn btn-danger bi bi-trash3-fill" href="model/borrarmatprimbd.php?IDmateriaprima=<?= $valor['IDmateriaprima'] ?>"></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="menu.php" class="bi bi-arrow-return-left btn btn-primary"></a> 
        </div>
      </div>
    </div>
</body>
</html>