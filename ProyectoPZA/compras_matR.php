<?php include 'model/consulta_compras_mat.php' ?>
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
    <h4 class="text-center">Compras</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th hidden scope="col">ID</th>
                    <th hidden scope="col">IDregistro</th>
                    <th scope="col">Materia prima</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($miConsulta as $clave => $valor): ?>
            <tr>
              <td hidden>
                <?= $valor['IDCompra_materia']; ?>
              </td>
              <td hidden>
                <?= $valor['IDregistro_compra']; ?>
              </td>
              <td>
                <?= $valor['NombreMateria']; ?>
              </td>
              <td>
                <?= $valor['DescripcionMateria']; ?>
              </td>
              <td>
                <?= $valor['CostoMateria']; ?>
              </td>
              <td>
                <?= $valor['Cantidad_Compra']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
      <a href="comprasR.php" class="btn btn-primary">Regresar</a>
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