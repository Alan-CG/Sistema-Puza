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
  <link rel="stylesheet" href="../css/style_general.css">
  <title>Compras</title>
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
                    <th scope="col">Materia prima</th>
                    <th scope="col">Cantidad Comprada</th>
                    <th scope="col">Fecha de compra</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($miConsulta as $clave => $valor): ?>
            <tr>
              <td>
                <?= $valor['NombreMateria']; ?>
              </td>
              <td>
                <?= $valor['Cantidad_Compra']; ?>
              </td>
              <td>
                <?= $valor['Fecha_Entrada']; ?>
              </td>
              <td>
                <a class="btn btn-success" href="comprasU.php?ID_Compra=<?= $valor['ID_Compra'] ?>">Modificar</a>
              </td>
              <td>
                <a class="btn btn-danger"
                  href="model/borrarcompra.php?ID_Compra=<?= $valor['ID_Compra'] ?>">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
      <a href="menuprove.php" class="btn btn-primary">Regresar</a>
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