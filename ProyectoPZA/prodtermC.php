<!-- ?php include 'model/altaprodterbd.php' ?> -->
<!-- ?php include 'model\consultaprodterbd.php' ?> -->
<!-- Error el las 2 primeras lineas, revisar -->

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
  <title>Productos terminados</title>
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
  <div class="container">
    <h4 class="text-center">Registrar Productos terminados</h4>
    <form action="" method="post" class="needs-validation" novalidate>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="input_nombrepd">Nombre</label>
          <input type="text" class="form-control" id="input_nombrepd" placeholder="Nombre del producto terminado"
          name="input_nombrepd" required>
          <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_descripcionpd">Descripción</label>
          <input type="text" class="form-control" id="input_descripcionpd" placeholder="Descripción del producto terminado"
          name="input_descripcionpd" required>
          <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_prodmat">Materia Prima</label>
          <select class="custom-select" id="input_prodmat" name="input_prodmat">
          <?php foreach ($ejecutar2 as $opciones2): ?>
              <option value="<?php echo $opciones2['IDmateriaprima'] ?>"><?php echo $opciones2['NombreMateria'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="input_cliente">Cliente</label>
          <select class="custom-select" id="input_cliente" name="input_cliente">
          <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['IDcliente'] ?>"><?php echo $opciones['NombreCliente'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="input_precio">Precio</label>
          <input type="number" class="form-control" id="input_precio" placeholder="Introduce el precio por unidad"
          name="input_precio" required>
          <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_cantidad">Cantidad</label>
          <input type="number" class="form-control" id="input_cantidad" placeholder="Introduce la cantidad de productos"
          name="input_cantidad" required>
          <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_fentrada">Fecha de entrada</label>
          <input type="date" class="form-control" id="input_fentrada" name="input_fentrada" required>
          <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
        <a href="prodtermR.php" class="btn btn-primary">Regresar</a>
      </div>
    </div>
  </div>
  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
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