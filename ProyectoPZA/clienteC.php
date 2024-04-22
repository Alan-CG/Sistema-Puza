<!-- Realziar cambios -->

<?php include 'model/altaclientebd.php' ?>
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

  <style type="text/css">
    .esconder{
      display: none;
    }
  </style>

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
    <h4 class="text-center">Registrar clientes</h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="rfc_des">¿Es persona física o moral?</label>
        <select class="form-control" id="rfc_des" onchange="activacampos(this)">
          <option value="2">Selecciona una opción</option>
          <option value="1">Persona Moral</option>
          <option value="0">Persona Física</option>
        </select>
      </div>
    </div>
    <form action="model/altaclientebd.php" method="POST" class="needs-validation" novalidate>
      <div class="form-row">
        <div id="campo_rfc12" class="form-group col-md-6 esconder">
          <label for="input_rfc12">RFC</label>
          <input minlength="12" maxlength="12" type="text" class="form-control" id="input_rfc12" name="input_rfc12"
            placeholder="RFC del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div id="campo_rfc13" class="form-group col-md-6 esconder">
          <label for="input_rfc13">RFC</label>
          <input minlength="13" maxlength="13" type="text" class="form-control" id="input_rfc13" name="input_rfc13"
            placeholder="RFC del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div id="campo_razonsocial" class="form-group col-md-6 esconder">
          <label for="input_razonsocial">Razón Social</label>
          <input type="text" class="form-control" id="input_razonsocial" name="input_razonsocial"
            placeholder="Razón social del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div id="campo_nombrecliente" class="form-group col-md-6 esconder">
          <label for="input_nombreproveedor">Nombre</label>
          <input type="text" class="form-control" id="input_nombreclient" name="input_nombreclient"
            placeholder="Nombre del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div  id="campo_representclient" class="form-group col-md-6 esconder">
          <label for="input_representclient">Representante</label>
          <input type="text" class="form-control" id="input_representclient" name="input_representclient"
            placeholder="Nombre del representante del cliente" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_telefonoclient">Teléfono</label>
          <input type="number" class="form-control" id="input_telefonoclient" name="input_telefonoclient"
            placeholder="Teléfono del cliente o representante" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_correoclient">Correo</label>
          <input type="email" class="form-control" id="input_correoclient" name="input_correoclient"
            placeholder="Correo del cliente o representante" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_clientestado">Estado</label>
          <select class="form-control" name="input_clientestado" id="input_clientestado" required>
            <?php foreach ($ejecutar as $opciones): ?>
            <option value="<?php echo $opciones['ID_estado'] ?>">
              <?php echo $opciones['Estado'] ?>
            </option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="input_ciudad">Municipio</label>
          <input type="text" class="form-control" id="input_ciudad" name="input_ciudad" placeholder="Nombre del municipio"
            required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_clientcalle">Calle</label>
          <input type="text" class="form-control" id="input_clientcalle" name="input_clientcalle"
            placeholder="Nombre de la calle" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_clientnumex">Número Exterior</label>
          <input type="number" class="form-control" id="input_clietnumex" name="input_clientnumex"
            placeholder="Número exterior de la dirección" required>
          <div class="invalid-feedback">Rellena el campo correctamente</div>
        </div>
          <div class="form-group col-md-6">
            <label for="input_clientcolonia">Colonia</label>
            <input type="text" class="form-control" id="input_clientcolonia" name="input_clientcolonia"
              placeholder="Nombre de la colonia" required>
            <div class="invalid-feedback">Rellena el campo correctamente</div>
          </div>
          <div class="form-group col-md-6">
            <label for="input_clientcp">Código Postal</label>
            <input type="number" class="form-control" id="input_clientcp" name="input_clientcp"
              placeholder="Introduce el código postal" required>
            <div class="invalid-feedback">Rellena el campo correctamente</div>
          </div>
        </div>
      <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
        <a href="clienteR.php" class="btn btn-primary">Regresar</a>
      </div>
    </div>
  </div>

  <script>
    //El siguien es un scrip Javascript que se encarga de deshabilitar el envío del formulario si algún campo no es válido
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


  <script type="text/javascript">
    //El siguiente es un script Javascript que se encarga de ocultar los campos en función del tipo de RFC
    function activacampos(answer){
      console.log(answer.value);
      if(answer.value==1){
        document.getElementById('campo_razonsocial').classList.remove('esconder');
        document.getElementById('campo_representclient').classList.remove('esconder');
        document.getElementById('campo_rfc12').classList.remove('esconder');
        document.getElementById('input_nombreclient').value='n/a';
        document.getElementById('input_rfc13').value='0000000000000'; 
        document.getElementById('campo_nombreclient').classList.add('esconder');
        document.getElementById('campo_rfc13').classList.add('esconder'); 
      }else if (answer.value==0){
        document.getElementById('campo_razonsocial').classList.add('esconder');
        document.getElementById('campo_representclient').classList.add('esconder');
        document.getElementById('campo_rfc12').classList.add('esconder');
        document.getElementById('input_razonsocial').value='n/a';
        document.getElementById('input_representclient').value='n/a';
        document.getElementById('input_rfc12').value='n/a';
        
        document.getElementById('input_nombreclient').value='';
        document.getElementById('input_rfc13').value=''; 
        document.getElementById('campo_rfc13').classList.remove('esconder');
        document.getElementById('campo_nombreclient').classList.remove('esconder');
      }else if(answer.value==2){
        document.getElementById('campo_nombreclient').classList.add('esconder');
        document.getElementById('campo_razonsocial').classList.add('esconder');
        document.getElementById('campo_representclient').classList.add('esconder');
        document.getElementById('campo_rfc12').classList.add('esconder');
        document.getElementById('campo_rfc13').classList.add('esconder'); 
        document.getElementById('input_nombreclient').value='';
        document.getElementById('input_rfc13').value=''; 
        document.getElementById('input_razonsocial').value='';
        document.getElementById('input_representclient').value='';
        document.getElementById('input_rfc12').value='';
      }
    };
  </script>



</body>

</html>