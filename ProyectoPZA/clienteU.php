<?php include 'model/modificarclientebd.php' ?>
<?php include 'model/consultaclientebd.php' ?>
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
  <title>Clientes</title>
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
    <br>
    <h4 class="text-center">Actualizar datos de cliente</h4>
    <div class="card card-default border-light shadow p-3 mb-5">
    <form action="model/modificarclientebd.php" method="POST" class="needs-validation" novalidate>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="input_nombreclient">Nombre</label>
        <input type="text" class="form-control" id="input_nombreclient" name="input_nombreclient"
          value="<?= $cliente['NombreCliente'] ?>" required>
          <div class="invalid-feedback">
      Rellena el campo correctamente
    </div>
      </div>
      <!-- <div class="form-group col-md-6">
        <label for="input_apellidopclient">Apellido Paterno</label>
        <input type="text" class="form-control" id="input_apellidopclient" name="input_apellidopclient"
          value $cliente['ApellidoP'] ?>" required>
          <div class="invalid-feedback">
      Rellena el campo correctamente
    </div>
      </div>
      <div class="form-group col-md-6">
        <label for="input_apellidomclient">Apellido Materno</label>
        <input type="text" class="form-control" id="input_apellidomclient" name="input_apellidomclient"
          value $cliente['ApellidoM'] ?>" required>
          <div class="invalid-feedback">
      Rellena el campo correctamente
    </div> -->
    <div class="form-group col-md-6">
      <label for="input_rfc_cliente">RFC</label>
      <input minlength="13" maxlength="13" type="text" class="form-control" id="input_rfc_cliente" name="input_rfc_cliente"
          value="<?= $cliente['RFC_cliente'] ?>" required>
        <div class="invalid-feedback"> 
      Rellena el campo correctamente
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="input_telefonoclient">Teléfono</label>
      <input type="number" class="form-control" id="input_telefonoclient" name="input_telefonoclient"
          value="<?= $cliente['TelefonoCliente'] ?>" required>
        <div class="invalid-feedback">Rellena el campo correctamente
        </div>
    </div>
      <div class="form-group col-md-6">
        <label for="input_correoclient">Correo</label>
        <input type="email" class="form-control" id="input_correoclient" name="input_correoclient"
          value="<?= $cliente['CorreoCliente'] ?>" required>
          <div class="invalid-feedback">
      Rellena el campo correctamente
    </div>
      </div>
      <div class="form-group col-md-6">
        <label for="input_estadocliente">Estado</label>
        <select class="custom-select" name="input_estadocliente" id="input_estadocliente" value="<?= $cliente['IDestado'] ?>">
        <?php foreach ($ejecutar as $opciones): ?>
            <option value="<?php echo $opciones['ID_estado'] ?>"><?php echo $opciones['Estado'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="input_calleclient">Calle</label>
        <input type="text" class="form-control" id="input_calleclient" name="input_calleclient"
          value="<?= $cliente['CalleCliente'] ?>" required>
          <div class="invalid-feedback">
      Rellena el campo correctamente
    </div>
      </div>
      <div class="form-group col-md-6">
        <label for="input_coloniaclient">Colonia</label>
        <input type="text" class="form-control" id="input_coloniaclient" name="input_coloniaclient"
          value="<?= $cliente['ColoniaCliente'] ?>" required>
          <div class="invalid-feedback">
      Rellena el campo correctamente
    </div>
      </div>
      <div class="form-group col-md-6">
        <label for="input_cpclient">Código Postal</label>
        <input type="number" class="form-control" id="input_cpclient" name="input_cpclient"
          value="<?= $cliente['CodigopostalCliente'] ?>" required>
          <div class="invalid-feedback">
      Rellena el campo correctamente
    </div>
      </div>
      <div class="form-group col-md-6">
      <input type="hidden" name="IDcliente" value="<?= $codigo ?>">
      <button type="submit" class="btn btn-primary" >Guardar</button>
      </div>
    </form>
    </div>
    
    
  </div>
  <div style="padding-bottom:0.5cm" class="row w-100 align-items-center">
            <div class="col text-center">
                <a href="clienteR.php" class="btn btn-primary bi bi-arrow-return-left shadow"></a>
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