<?php session_start(); ?>
<?php include 'model/consultacompra.php' ?>
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
  <style>
    <?php include "css/style_general.css" ?>
  </style>
  <title>Compras</title>

  <style type="text/css">
    .esconder {
      display: none;
    }
  </style>
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
          <a id="nav-matprim" class="dropdown-item" href="matprimR.php">Materias primas</a>
          <a id="nav-clientes" class="dropdown-item" href="clienteR.php">Clientes</a>
          <a id="nav-proveedores" class="dropdown-item" href="proveedoresR.php">Proveedores</a>
          <a id="nav-productos" class="dropdown-item" href="productosR.php">Productos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Otros
        </a>
        <div class="dropdown-menu">
          <a id="nav-usuario" class="dropdown-item" href="usuariosR.php">Usuarios</a>
          <a id="nav-prodter" class="dropdown-item" href="productosterminadosR.php">Productos terminados</a>
          <a id="nav-compras" class="dropdown-item" href="comprasR.php">Compras</a>
          <a id="nav-pedidos" class="dropdown-item" href="pedidosR.php">Pedidos</a>
          <a id="nav-compras_llegar" class="dropdown-item" href="compras_llegaR.php">Compras Por Llegar</a>
          <a id="nav-compras_confir" class="dropdown-item" href="compras_confiR.php">Compras Confirmadas</a>
          <a id="nav-produccion" class="dropdown-item" href="produccionR.php">Producción</a>
          <a id="nav-produccion" class="dropdown-item" href="productosenviadosR.php">Productos Enviados</a>
        </div>
      </li>
      <a class="btn btn-danger ml-auto bi bi-box-arrow-right" href="model/logout.php"> Cerrar Sesión </a>
    </nav>
  </header>
  <br>
  <div class="container">
    <h4 class="text-center">Compras</h4>
    <div class="form-row">
      <div class="form-group col">
        <a class="btn btn-primary" href="comprasC.php">Nueva compra</a>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th hidden scope="col">IDregistro</th>
            <th scope="col">Folio</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Fecha de pedido</th>
            <th scope="col">Total de compra</th>
            <th scope="col">Detalles</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($miConsulta as $clave => $valor): ?>
            <tr>
              <td hidden>
                <?= $valor['IDRegistro_compra']; ?>
              </td>
              <td>
                <?= $valor['Folio']; ?>
              </td>
              <td>
                <?= $valor['Razon_social_nombre']; ?>
              </td>
              <td>
                <?= $valor['Fecha_Entrada']; ?>
              </td>
              <td>$
                <?= $valor['Total_compra']; ?>
              </td>
              <td>
                <a class="bi bi-plus-square btn btn-success"
                  href="compras_matR.php?IDRegistro_compra=<?= $valor['IDRegistro_compra'] ?>"></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
        <a href="menu.php" class="btn btn-primary">Regresar</a>
      </div>
    </div>
  </div>
  <span id="usuario" class="esconder"><?php echo $_SESSION['rol_usuario']; ?></span>
  <script>
      var tipo_usuario = document.getElementById('usuario').innerText;
      if(tipo_usuario=="2"){
        //IDs de nav items
        document.getElementById('nav-usuario').classList.add('esconder');
        document.getElementById('nav-productos').classList.add('esconder');
        document.getElementById('nav-clientes').classList.add('esconder');
        document.getElementById('nav-proveedores').classList.add('esconder');
        document.getElementById('nav-compras').classList.add('esconder');
        document.getElementById('nav-pedidos').classList.add('esconder');
        document.getElementById('nav-produccion').classList.add('esconder');
      }else if(tipo_usuario=="3"){
        //IDs de nav items
        document.getElementById('nav-usuario').classList.add('esconder');
        document.getElementById('nav-matprim').classList.add('esconder');
        document.getElementById('nav-prodter').classList.add('esconder');
        document.getElementById('nav-compras_llegar').classList.add('esconder');
        document.getElementById('nav-compras_confir').classList.add('esconder');
        document.getElementById('nav-produccion').classList.add('esconder');
        document.getElementById('nav-productos').classList.add('esconder');
      }else if(tipo_usuario=="4"){
        //IDs de nav items
        document.getElementById('nav-usuario').classList.add('esconder');
        document.getElementById('nav-clientes').classList.add('esconder');
        document.getElementById('nav-proveedores').classList.add('esconder');
        document.getElementById('nav-compras').classList.add('esconder');
        document.getElementById('nav-pedidos').classList.add('esconder');
        document.getElementById('nav-matprim').classList.add('esconder');
        document.getElementById('nav-prodter').classList.add('esconder');
        document.getElementById('nav-compras_llegar').classList.add('esconder');
        document.getElementById('nav-compras_confir').classList.add('esconder');
      }
      
    </script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>


</body>

</html>