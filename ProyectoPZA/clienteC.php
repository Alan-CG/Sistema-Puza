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
  <link rel="stylesheet" href="css/style_general.css">
  <title>Clientes</title>

</head>

<body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Puza</h1>
        <p class="lead">Sistema de inventario</p>
      </div>
    </div>
  </header>
  <div class="container">
    <br>
    <h4 class="text-center">Registrar Cliente</h4>

    <form action="model/altacliente.php" method="POST" class="needs-validation" novalidate>

        <div class="form-group col-md-4">
          <label for="input_nombreclient">Nombre</label>
          <input type="text" class="form-control" id="input_nombreclient" name="input_nombrecliente"
            placeholder="Nombre del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div> 
        </div>
        <div class="form-group col-md-4">
          <label for="input_rfc">RFC</label>
          <input type="text" class="form-control" id="input_rfc" name="input_rfc"
            placeholder="RFC del cliente o representante" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div> 
        </div>
        <div class="form-group col-md-3">
          <label for="input_telefocliente">Teléfono</label>
          <input type="number" class="form-control" id="input_telefocliente" name="input_telefocliente"
            placeholder="Número de teléfono" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div class="form-group col-md-4">
          <label for="input_correocliente">Correo</label>
          <input type="email" class="form-control" id="input_correocliente" name="input_correocliente"
            placeholder="Correo del cliente o representante" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div> 
        </div> 

        <div class="form-group col-md-4">
          <label for="input_callecliente">Calle</label>
          <input type="text" class="form-control" id="input_callecliente" name="input_callecliente"
            placeholder="calle del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div> 
        </div> 
        <div class="form-group col-md-4">
          <label for="input_clientecolonia">Colonia</label>
          <input type="text" class="form-control" id="input_clientecolonia" name="input_clientecolonia"
            placeholder="Colonia del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div> 
        </div>
        <div class="form-group col-md-4">
          <label for="input_clientecp">Codigo postal</label>
          <input type="number" class="form-control" id="input_clientecp" name="input_clientecp"
            placeholder="Codigo postal" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div> 
        </div>
        <div class="form-group col-md-4">
          <label for="input_clienteestado">Estado</label>
          <select class="form-control" name="input_clienteestado" id="input_clienteestado" required>
            <?php foreach ($ejecutar as $opciones): ?>
            <option value="<?php echo $opciones['ID_estado'] ?>">
              <?php echo $opciones['Estado'] ?>
            </option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-row">
          <input type="submit" class="btn btn-primary" name="submit">
      </div>
    </form>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
        <a href="clienteR.php" class="btn btn-primary">Regresar</a>
      </div>
    </div>
  </div>                                  
</body>

</html> 