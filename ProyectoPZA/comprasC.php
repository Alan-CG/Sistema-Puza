
<?php include 'model/consultacompra_select.php' ?>
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
  <title>Compras</title>
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
    <h4 class="text-center">Registro de compra Materia Primas</h4>
    <div class="card card-default border-light shadow p-3 mb-5">
    <form action="model/altacompra.php" method="POST" class="needs-validation" novalidate>
      <h5>Datos de compra</h5>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="input_proveedor">Proveedor</label>
          <select class="form-control" id="input_proveedor" name="input_proveedor" onchange="updateSelect2()" required>
           <?php foreach($consulta as $opciones):  ?>
             <option value="<?php echo $opciones['IDproveedor'] ?>"><?php echo $opciones['Razon_social_nombre']?></option>
           <?php endforeach ;?>
          </select>
        </div>
        <div class="form-group col-sm-2">
          <label for="input_folio">Folio de compra</label>
          <input type="text" class="form-control" id="input_folio" name="input_folio" required></input>
        </div>
        <div class="form-group col-sm-2">
          <label for="input_Fecha">Fecha de compra</label>
          <input type="date" class="form-control" id="input_Fecha" name="input_Fecha" required></input>
        </div>
      </div>
      <br>
      <h5>Selección de materias primas</h5>
      <div class="row">
        <div class="col">
          <button id="agregar" class="btn btn-primary">Agregar Materia Prima</button>
        </div>
      </div>
      <br>
      <div class="form-row clonar">
        <div class="form-group col-sm-6">
          <label for="input_matprim">Materia Prima</label>
          <select class="form-control" id="input_matprim" name="input_matprim[]" required>
          </select>
          <span class="badge badge-danger puntero ocultar">Eliminar</span>
        </div>
        <div class="form-group col-sm-2">
          <label for="input_cantidad">Cantidad comprada</label>
          <input type="number" class="form-control" id="input_cantidad" name="input_cantidad[]" required></input>
        </div>
      </div>
      <div id="contenedor"></div>
      <br>
      <div class="form-row">
        <div class="col-md-10"></div>
      </div>
      <div class="form-row">
        <button  type="submit" class="btn btn-primary">Registrar</button>
      </div>

    </form>
    </div>
    <div style="padding-bottom:0.5cm" class="row w-100 align-items-center">
            <div class="col text-center">
                <a href="comprasR.php" class="btn btn-primary bi bi-arrow-return-left shadow"></a>
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

  <script src="js/compras_select.js"></script>
</body>

</html>