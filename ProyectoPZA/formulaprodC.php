<!DOCTYPE html>
<html lang="en">
<?php include 'model/consultaprodfor.php' ?>
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
    <title>Formula de productos</title>
</head>

<body> 
    <!--
        A continuación se insertan clases y se modifican con CSS en línea de código
    -->
    <style>
        .puntero{
            cursor:pointer;
        }
        .ocultar{
            display:none;
        }
    </style>
    <!--////////////-->
    <header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Puza</h1>
                <p class="lead">Sistema de inventario</p>
            </div>
        </div>
    </header>
    <div class="container">
        <h4 class="text-center">Alta de Nuevo Producto</h4>
        <br>
        <form action="model/altaproductos.php" method="POST" class="needs-validation" novalidate>
            <h5 class="text-align-left">Datos básicos del producto</h5>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="input_nombreprod">Nombre del producto</label>
                    <input type="text" class="form-control" id="input_nombreprod" placeholder="Nombre del nuevo producto" name="input_nombreclient" required>
                    <div class="invalid-feedback">Rellena el campo correctamente</div>
                </div>
                <div class="col-md-6">
                    <label for="input_desprod">Descripción</label>
                    <input type="text" class="form-control" id="input_desprod" placeholder="Nombre del nuevo producto" name="input_desprod" required>
                    <div class="invalid-feedback">Rellena el campo correctamente</div>
                </div>
                <div class="col-md-6">
                    <label for="input_ganancia">Utilidad</label>
                    <input type="number" class="form-control" id="input_ganancia" placeholder="Introduce el porcentaje de ganancia" name="input_ganancia" required>
                    <div class="invalid-feedback">Rellena el campo correctamente</div>
                </div>
            </div>
            <br>
            <!--
                El siguiente row es el correspondiente a los campos dinámicos que permiten el registro 
                de las materias primas necesarias para fabricar un producto en particular("Formula del producto")
            -->
            <h5 class="text-align-left">Formula del producto</h5>
            <div class="row">
                <div class="col">
                    <button id="agregar" class="btn btn-primary">Agregar Materia Prima</button>
                </div>
            </div>
            <br> 
            <div class="form-row clonar">
                <div class="form-group col-md-6">
                    <label for="input_matprim">Materia Prima</label>
                    <select class="custom-select" id="input_matprim" name="input_matprim[]">
                     <?php foreach ($opciones_select as $opciones): ?>
                        <option value="<?php echo $opciones['IDmateriaprima'] ?>"><?php echo $opciones['NombreMateria'] ?></option>
                     <?php endforeach ?>
                    </select>
                    <span class="badge badge-danger puntero ocultar">Eliminar</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="input_cantmat">Cantidad Necesaria</label>
                    <input type="number" class="form-control" id="input_cantmat" placeholder="Cantidad requerida para el producto" name="input_cantmat[]" required>
                    <div class="invalid-feedback">Rellena el campo correctamente</div>
                </div>
            </div>
            <div id="contenedor"></div>
            <div class="form-row">
                <div class="col-md-12">
                    <button  type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>

        </form>
        <div class="row w-100 align-items-center">
            <div class="col text-center">
                <a href="productosR.php" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>

    
    
    
    
    
    
    
    <!--
        Sección para los Scripts JavaScript
    -->
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

</body>

</html>