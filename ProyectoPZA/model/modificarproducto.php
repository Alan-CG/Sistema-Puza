<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';

//Variables de datos enviados desde formulario
$codigo = isset($_REQUEST['IDproducto']) ? $_REQUEST['IDproducto'] : null;
$nombre = isset($_REQUEST['input_nombreprod']) ? $_REQUEST['input_nombreprod'] : null;
$descripcion = isset($_REQUEST['input_desprod']) ? $_REQUEST['input_desprod'] : null;
$costo = isset($_REQUEST['input_costoprod']) ? $_REQUEST['input_costoprod'] : null;
$precio = isset($_REQUEST['input_precioprod']) ? $_REQUEST['input_precioprod'] : null;

// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE productos 
    SET NombreProducto= :NombreProducto, DescripcionProducto= :DescripcionProducto, PrecioCosto= :PrecioCosto,
    PrecioProducto= :PrecioProducto WHERE IDproducto = :IDproducto');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'NombreProducto' => $nombre,
            'DescripcionProducto'=>$descripcion,
            'PrecioCosto' => $costo,
            'PrecioProducto' => $precio,
            'IDproducto' => $codigo,
        ]
    );
    // Redireccionamos a Leer
    header('Location: ../productosR.php');
}