<?php include "model/consultaclientebd.php" ?>
<?php include "model/consultaproductos.php" ?>

<!DOCTYPE html>
<html lang="es-MX">

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
  <title>Registro Pedidos</title>
</head>

<body>
  <style>
    .puntero{
        cursor:pointer;
    }
    .ocultar{
        display:none;
    }
  </style>

  <header>
    <div class="jumbotron jumbotron-fluid">
         <div class="container">
             <h1 class="display-4">Puza</h1>
             <p class="lead">Sistema de inventario</p>
         </div>
     </div>
  </header>
  <br>
  <div class="container">
    <h4 class="text-center">Registro de pedidos</h4>
    <form action="model/altapedido.php" method="POST" class="needs-validation" novalidate>
        <h5>Datos Generales</h5>
        <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="input_folio">Folio</label>
                <input type="text" class="form-control" id="input_folio" name="input_folio" required></input>
            </div>
            <div class="form-group col-sm-2">
                <label for="input_fecha">Fecha</label>
                <input type="date" class="form-control" id="input_fecha" name="input_fecha" required></input>
            </div>
            <div class="form-group col-sm-4">
                <label for="input_cliente">Cliente</label>
                <select class="form-control" id="input_cliente" name="input_cliente">
                    <?php foreach($ejecutar2 as $opciones): ?>
                        <option value="<?php echo $opciones['IDcliente'] ?>"><?php echo $opciones['NombreCliente'] ?></option>
                        <?php endforeach; ?>
                </select>
            </div>
        </div>
      <br>
      <h5>Selección de productos</h5>
      <div class="row">
        <div class="col">
          <button id="agregar" class="btn btn-primary">Agregar Producto</button>
        </div>
      </div>
      <br>
      <div class="form-row clonar">
        <div class="form-group col-sm-5">
          <label for="input_producto">Producto</label>
          <select class="form-control" id="input_producto" name="input_producto[]">
          <?php foreach($miConsulta3 as $valores): ?>
            <option value="<?php echo $valores['IDproducto'] ?>"><?php echo $valores['NombreProducto'] ?></option>
            <?php endforeach; ?>
          </select>
          <span class="badge badge-danger puntero ocultar">Eliminar</span>
        </div>
        <div class="form-group col-sm-2">
          <label for="input_cantidad">Cantidad</label>
          <input type="number" class="form-control" id="input_cantidad" name="input_cantidad[]"></input>
        </div>
      </div>
      <div id="contenedor"></div>
      <br>
      <div class="form-row">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </form>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
      <a href="pedidosR.php" class="btn btn-primary">Regresar</a>
    </div>
  </div>
</div>
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
  <script>
     //El siguiente script se encarga de clonar los campos
     let agregar = document.getElementById('agregar');
        let contenido=document.getElementById('contenedor');

        agregar.addEventListener('click',e=>{
            e.preventDefault();
            let clonado =document.querySelector('.clonar');
            let clon = clonado.cloneNode(true);

            contenido.appendChild(clon).classList.remove('clonar');

            let remover =contenido.lastChild.childNodes[1].querySelectorAll('span');
            remover[0].classList.remove('ocultar');
        });

        contenido.addEventListener('click', e=>{
            e.preventDefault();
            if(e.target.classList.contains('puntero')){
                let contenedor=e.target.parentNode.parentNode;
                contenedor.parentNode.removeChild(contenedor);
            }
        });
  </script>

  <script src=""></script>
</body>

</html>