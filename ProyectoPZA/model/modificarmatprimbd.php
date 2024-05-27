<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
$codigo = isset($_REQUEST['IDmateriaprima']) ? $_REQUEST['IDmateriaprima'] : null;
$nombre = isset($_REQUEST['input_nombremp']) ? $_REQUEST['input_nombremp'] : null;
$descripcion = isset($_REQUEST['input_descripcionmp']) ? $_REQUEST['input_descripcionmp'] : null;
$proveedor = isset($_REQUEST['input_proveedor']) ? $_REQUEST['input_proveedor'] : null;
$costo = isset($_REQUEST['input_precio']) ? $_REQUEST['input_precio'] : null;
$cantidad = isset($_REQUEST['input_cantidad']) ? $_REQUEST['input_cantidad'] : null;
$fechaentrada = isset($_REQUEST['input_fentrada']) ? $_REQUEST['input_fentrada'] : null;
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE materias_primas 
    SET NombreMateria = :NombreMateria, DescripcionMateria = :DescripcionMateria, 
    IDproveedor = :IDproveedor, CostoMateria = :CostoMateria, ExistenciasMateria = :ExistenciasMateria,
    Fecha_entradaMateria = :Fecha_entradaMateria WHERE IDmateriaprima = :IDmateriaprima');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'IDmateriaprima' => $codigo,
            'NombreMateria' => $nombre,
            'DescripcionMateria' => $descripcion,
            'IDproveedor' => $proveedor,
            'CostoMateria' => $costo,
            'ExistenciasMateria'=> $cantidad,
            'Fecha_entradaMateria'=> $fechaentrada

        ]
    );
    // Redireccionamos a Leer
    header('Location: ../matprimR.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM materias_primas WHERE IDmateriaprima = :IDmateriaprima;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            'IDmateriaprima' => $codigo
        ]
    );
}

// Obtiene un resultado
$matprim = $miConsulta->fetch();

?>