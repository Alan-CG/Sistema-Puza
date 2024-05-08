<?php session_start(); ?>
<?php include 'model/consultaclientebd.php' ?>
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
    <title>Clientes</title>
    <style type="text/css">
    .esconder{
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
            </div>
          </li>
          <a class="btn btn-danger ml-auto bi bi-box-arrow-right" href="model/logout.php"> Cerrar Sesión </a>
        </nav>
 </header>
    <div class="container">
      <h3 class="text-center">Lista de clientes</h3>
      <div class="form-row">
         <div class="form-group col">
           <a href="clienteC.php" class="btn btn-primary">Registrar Clientes</a>   
        </div>
      </div>
      <div class="row w-100 align-items-center">
        <div class="col text-center">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th hidden scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">RFC</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Calle</th>
                <th scope="col">Colonia</th>
                <th scope="col">Código Postal</th>
                <th scope="col">Estado</th>
                <th scope="col">Modificar</th>
                <th id="tab-borrar" class="" scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($miConsulta as $clave => $valor): ?>
                <tr>
                  <td hidden>
                    <?= $valor['IDcliente']; ?>
                  </td>
                  <td>
                    <?= $valor['NombreCliente']; ?>
                  </td>
                  <td>
                    <?=$valor['RFC_cliente']; ?>
                  </td>
                  <!-- <td> 
                    $valor['ApellidoM']; ?>
                  </td> -->
                  <td>
                    <?= $valor['TelefonoCliente']; ?>
                  </td>
                  <td>
                    <?= $valor['CorreoCliente']; ?>
                  </td>
                  <td>
                  <?= $valor['CalleCliente']; ?>
                  </td>
                  <td>
                  <?= $valor['ColoniaCliente']; ?>
                  </td>
                  <td>
                  <?= $valor['CodigopostalCliente']; ?>
                  <td>
                  <?= $valor['Estado']; ?>
                  </td>
                  <td >
                    <a class="btn btn-primary bi bi-pencil-square" href="clienteU.php?IDcliente=<?= $valor['IDcliente'] ?>"></a>
                  </t>
                  <td id="boton-borrar" class="">
                    <a id="boton-borrar" class="" class="btn btn-danger bi bi-trash3-fill" href="model/borrarclientebd.php?IDcliente=<?= $valor['IDcliente'] ?>"></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="menu.php" class="bi bi-arrow-return-left btn btn-primary"></a> 
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
        document.getElementById('tab-borrar').classList.add('esconder');
        document.getElementById('boton-borrar').classList.add('esconder');
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

</body>
</html>