<?php session_start(); ?>
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
    <title>Menú</title>

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
        <nav class="nav navbar-expand-sm shadow">
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
              <a id="nav-enviados" class="dropdown-item" href="productosenviadosR.php">Productos Enviados</a>
            </div>
          </li>
          <a class="btn btn-danger ml-auto bi bi-box-arrow-right" href="model/logout.php"> Cerrar Sesión </a>
        </nav>
 </header>
    <br>
    
    <div class="container">
        <div class="row">
            <div id="div-usuario" class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title">Usuarios</h5>
                  <p class="card-text">Acceder a los registros de usuarios</p>
                  <a href="usuariosR.php" class="btn btn-primary shadow-sm">Acceder</a>
                </div>
              </div>
            </div>
            <div id="div-materiasprimas" class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title">Materias primas</h5>
                  <p class="card-text">Acceder a la base de datos de materias primas</p>
                  <a href="matprimR.php" class="btn btn-primary shadow-sm">Acceder</a>
                </div>
              </div>
            </div>
            <div id="div-productos" class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title">Productos</h5>
                  <p class="card-text">Acceder a los registros de datos de productos</p>
                  <a href="productosR.php" class="btn btn-primary shadow-sm">Acceder</a>
                </div>
              </div>
            </div>
            <div id="div-clientes" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Acceder a la base de datos de clientes</p>
                    <a href="clienteR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-proveedores" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Proveedores</h5>
                    <p class="card-text">Acceder a la base de datos de proveedores</p>
                    <a href="proveedoresR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-prodter" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Productos Terminados</h5>
                    <p class="card-text">Acceder a los registros de productos terminados</p>
                    <a href="productosterminadosR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-enviados" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Productos Enviados</h5>
                    <p class="card-text">Acceder a los registros de productos enviados</p>
                    <a href="productosenviadosR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-compras_llegar" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Compras por llegar</h5>
                    <p class="card-text">Acceder a los registros de compras por llegar</p>
                    <a href="compras_llegaR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-compras_confir" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Compras confirmadas</h5>
                    <p class="card-text">Acceder a los registros de compras confirmadas</p>
                    <a href="compras_confiR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-compras" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Compras</h5>
                    <p class="card-text">Acceder a los registros de compras</p>
                    <a href="comprasR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-pedidos" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text">Acceder a los registros de pedidos</p>
                    <a href="pedidosR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
              <div id="div-produccion" class="col-sm-4">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Producción</h5>
                    <p class="card-text">Acceder al modulo de producción</p>
                    <a href="produccionR.php" class="btn btn-primary shadow-sm">Acceder</a>
                  </div>
                </div>
              </div>
          </div>
    </div>
    <span id="usuario" class="esconder"><?php echo $_SESSION['rol_usuario']; ?></span>

    <script>
      var tipo_usuario = document.getElementById('usuario').innerText;
      if(tipo_usuario=="2"){
        //IDs de tarjetas
        document.getElementById('div-usuario').classList.add('esconder');
        document.getElementById('div-productos').classList.add('esconder');
        document.getElementById('div-clientes').classList.add('esconder');
        document.getElementById('div-proveedores').classList.add('esconder');
        document.getElementById('div-compras').classList.add('esconder');
        document.getElementById('div-pedidos').classList.add('esconder');
        document.getElementById('div-produccion').classList.add('esconder');
        //IDs de nav items
        document.getElementById('nav-usuario').classList.add('esconder');
        document.getElementById('nav-productos').classList.add('esconder');
        document.getElementById('nav-clientes').classList.add('esconder');
        document.getElementById('nav-proveedores').classList.add('esconder');
        document.getElementById('nav-compras').classList.add('esconder');
        document.getElementById('nav-pedidos').classList.add('esconder');
        document.getElementById('nav-produccion').classList.add('esconder');
      }else if(tipo_usuario=="3"){
        //IDs de tarjetas
        document.getElementById('div-usuario').classList.add('esconder');
        document.getElementById('div-materiasprimas').classList.add('esconder');
        document.getElementById('div-prodter').classList.add('esconder');
        document.getElementById('div-compras_llegar').classList.add('esconder');
        document.getElementById('div-compras_confir').classList.add('esconder');
        document.getElementById('div-produccion').classList.add('esconder');
        document.getElementById('div-productos').classList.add('esconder');
        document.getElementById('div-enviados').classList.add('esconder');
        //IDs de nav items
        document.getElementById('nav-usuario').classList.add('esconder');
        document.getElementById('nav-matprim').classList.add('esconder');
        document.getElementById('nav-prodter').classList.add('esconder');
        document.getElementById('nav-compras_llegar').classList.add('esconder');
        document.getElementById('nav-compras_confir').classList.add('esconder');
        document.getElementById('nav-produccion').classList.add('esconder');
        document.getElementById('nav-productos').classList.add('esconder');
        document.getElementById('nav-enviados').classList.add('esconder');
      }else if(tipo_usuario=="4"){
        //IDs de tarjetas
        document.getElementById('div-usuario').classList.add('esconder');
        document.getElementById('div-clientes').classList.add('esconder');
        document.getElementById('div-proveedores').classList.add('esconder');
        document.getElementById('div-compras').classList.add('esconder');
        document.getElementById('div-pedidos').classList.add('esconder');
        document.getElementById('div-materiasprimas').classList.add('esconder');
        document.getElementById('div-prodter').classList.add('esconder');
        document.getElementById('div-compras_llegar').classList.add('esconder');
        document.getElementById('div-compras_confir').classList.add('esconder');
        document.getElementById('div-enviados').classList.add('esconder');
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
        document.getElementById('nav-enviados').classList.add('esconder');
      }
      
    </script>
    
</body>
</html>