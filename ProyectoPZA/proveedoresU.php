<?php include 'model/modificarprovebd.php' ?>
<?php include 'model/consultaprovebd.php' ?>
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
  <title>Proveedores</title>
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
    <h4 class="text-center">Modificar  proveedores</h4>
    <div class="card card-default border-light shadow p-3 mb-5">
    <form action="model/modificarprovebd.php" method="POST" class="needs-validation" novalidate>
      <div class="form-row">
          <div class="form-group col-sm-3">
          <label for="input_RFCproveedor">RFC</label>
          <input type="text" class="form-control" id="input_RFCproveedor" name="input_RFCproveedor"
            value="<?= $proveedor['RFC_proveedor'] ?>" required>
            <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
          </div>
            <div class="form-group col-md-4">
              <label for="input_nombreproveedor">Razón Social o Nombre</label>
              <input type="text" class="form-control" id="input_nombreproveedor" name="input_nombreproveedor"
                value="<?= $proveedor['Razon_social_nombre'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="input_representprove">Representante</label>
              <input type="text" class="form-control" id="input_representprove" name="input_representprove"
                value="<?= $proveedor['Nombre_representante'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-2">
              <label for="input_telefonoprove">Teléfono</label>
              <input type="tel" class="form-control" id="input_telefonoprove" name="input_telefonoprove"
                value="<?= $proveedor['TelefonoProveedor'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="input_correoprove">Correo</label>
              <input type="email" class="form-control" id="input_correoprove" name="input_correoprove"
                value="<?= $proveedor['CorreoProveedor'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="input_proveestado">Estado</label>
              <select class="custom-select" name="input_proveestado" id="input_proveestado"
                value="<?= $proveedor['IDestado'] ?>">
                <?php foreach ($ejecutar as $opciones): ?>
                  <option value="<?php echo $opciones['ID_estado'] ?>"><?php echo $opciones['Estado'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="input_ciudad">Municipio</label>
              <input type="text" class="form-control" id="input_ciudad" name="input_ciudad"
                value="<?= $proveedor['Municipio'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="input_provecolonia">Colonia</label>
              <input type="text" class="form-control" id="input_provecolonia" name="input_provecolonia"
                value="<?= $proveedor['ColoniaProveedor'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="input_provecalle">Calle</label>
              <input type="text" class="form-control" id="input_provecalle" name="input_provecalle"
                value="<?= $proveedor['CalleProveedor'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-sm-2">
              <label for="input_provenumex">Número Exterior</label>
              <input type="text" class="form-control" id="input_provenumex" name="input_provenumex"
                value="<?= $proveedor['Num_exterior'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
            <div class="form-group col-sm-2">
              <label for="input_provecp">Código Postal</label>
              <input type="text" class="form-control" id="input_provecp" name="input_provecp"
                value="<?= $proveedor['CodigopostalProveedor'] ?>" required>
              <div class="invalid-feedback">
                Rellena el campo correctamente
              </div>
            </div>
          </div>
          <input type="hidden" name="IDproveedor" value="<?= $codigo ?>">
          <button type="submit" class="btn btn-success shadow-sm">Actualizar</button>
    </form>
    </div>
    <div style="padding-bottom:0.5cm" class="row w-100 align-items-center">
            <div class="col text-center">
                <a href="proveedoresR.php" class="btn btn-primary bi bi-arrow-return-left shadow"></a>
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