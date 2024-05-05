
<?php include 'model/consultacotiza.php' ?>
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
    <title>Cotización de producto</title>
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
        <h4 class="text-center">Cotización de pedidos</h4>
        <br>
        <form action="" method="POST" class="needs-validation" novalidate>
            <h5 class="text-align-left">Datos para cotizar</h5>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="primer_select">Nombre del producto:</label>
                    <select class="form-control" id="select_nombre" name="select_nombre">
                        <?php while ($row = $consulta ->fetch_assoc()) { ?>
                            <option value="<?php echo $row['IDproducto'];?>"><?php echo $row['NombreProducto'];?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">Rellena el campo correctamente</div>
                </div>
                <div class="col-sm-2">
                    <label for="segundo_select">Precio unitario:</label>
                    <input value="" class="form-control" type="number" id="precio_producto" name="precio_producto" required>
                    <!--<select class="form-control" id="precio_producto" name="precio_producto">
                    </select>-->
                    
                    <div class="invalid-feedback">Rellena el campo correctamente</div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidadproducto" placeholder="Cantidad de productos"
                        name="cantidadproducto" required><br>
                    <div class="invalid-feedback">Rellena el campo correctamente</div>
                    </div>
                </div>

            </div>
            
            <span onclick="cotizar()" class="btn btn-primary">Generar cotización</span>
        </form> 
        <br>
        <div class="form-row">
            <div class="col-md-4">
                <label for="resultado">Total:</label>
                <input  id="resultado" class="form-control">
            </div>
        </div>

        <script src="js/peticiones_cotiza.js"></script>
</body>

<script type="text/javascript">
    function cotizar(){
        try{
            var a =parseFloat(document.getElementById("precio_producto").value) || 0,
                b =parseFloat(document.getElementById("cantidadproducto").value) || 0;
            document.getElementById("resultado").value=a*b;
        }catch(e){}
    }
</script>


</html>