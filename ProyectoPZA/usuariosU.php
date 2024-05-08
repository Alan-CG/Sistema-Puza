<?php include 'model/consultausuario.php' ?>
<?php include 'model/modificarusuario.php' ?>
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
  <title>Usuarios</title>
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
    <h4 class="text-center">Modificar Usuario</h4>
    <form action="model/modificarusuario.php" method="POST" class="needs-validation" novalidate>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="input_nombre">Nombre</label>
          <input type="text" class="form-control" id="input_nombre" placeholder="Nombre del trabajador"
            name="input_nombre" value="<?= $usuario['Nombre'] ?>" required>
          <div class="invalid-feedback">
            Rellena el campo correctamente
          </div>
        </div>
        <div class="form-group col-md-4">
          <label for="input_nombre_usuario">Nombre de Usuario</label>
          <input type="text" class="form-control" id="input_nombre_usuario" placeholder="Nombre a usar para ingresar"
            name="input_nombre_usuario" value="<?= $usuario['Nombre_usuario'] ?>" required>
          <div class="invalid-feedback">
            Rellena el campo correctamente
          </div>
        </div>
        <div class="form-group col-md-4">
          <label for="input_password">Contraseña</label>
          <input type="text" class="form-control" id="input_password" placeholder="Contraseña a usar para ingresar"
            name="input_password" value="<?= $usuario['Contraseña'] ?>" required>
          <div class="invalid-feedback">
            Rellena el campo correctamente
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="input_tipo">Tipo de usuario</label>
          <select class="custom-select" id="input_tipo" name="input_tipo">
            <?php foreach ($miConsulta2 as $opciones): ?>
              <option value="<?php echo $opciones['IDtipo_usuario'] ?>">
                <?php echo $opciones['Tipo'] ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
        <input type="hidden" name="IDusuario" value="<?= $codigo ?>">
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
        <a href="usuariosR.php" class="btn btn-primary">Regresar</a>
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