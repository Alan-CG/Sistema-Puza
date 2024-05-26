
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
  </header>
  <br>
  <div class="container">
    <h4 class="text-center">Modificar Productos</h4>
    <div class="card card-default border-light shadow p-3 mb-5">
    <form action="model/modificarproducto.php" method="POST" class="needs-validation" novalidate>
      <div class="form-row">
          <div class="form-group col-sm-3">
          <label for="input_nombreprod">Nombre del Producto</label>
          <input type="text" class="form-control" id="input_nombreprod" name="input_nombreprod"
            value="<?= $producto['NombreProducto'] ?>" required>
            <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
          </div>
            <div class="form-group col-md-6">
              <label for="input_desprod">Descripción</label>
              <input type="text" class="form-control" id="input_desprod" name="input_desprod"
                value="<?= $producto['DescripcionProducto'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="input_costoprod">Costo</label>
              <input readonly type="number" class="form-control" id="input_costoprod" name="input_costoprod"
                value="<?= $producto['PrecioCosto'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-2">
              <label for="input_precioprod">Precio</label>
              <input readonly type="number" class="form-control" id="input_precioprod" name="input_precioprod"
                value="<?= $producto['PrecioProducto'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
          </div>
          <input type="hidden" name="IDproducto" value="<?= $codigo ?>">
          <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    </div>
    <div style="padding-bottom:0.5cm" class="row w-100 align-items-center">
            <div class="col text-center">
                <a href="productosR.php" class="btn btn-primary bi bi-arrow-return-left shadow"></a>
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
</body>

</html>