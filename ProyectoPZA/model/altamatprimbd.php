<?php
// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $nombre = isset($_REQUEST['input_nombremp']) ? $_REQUEST['input_nombremp'] : null;
    $descripcion = isset($_REQUEST['input_descripcionmp']) ? $_REQUEST['input_descripcionmp'] : null;
    $proveedor = isset($_REQUEST['input_proveedor']) ? $_REQUEST['input_proveedor'] : null;
    $precio = isset($_REQUEST['input_precio']) ? $_REQUEST['input_precio'] : null;
    $cantidad = isset($_REQUEST['input_cantidad']) ? $_REQUEST['input_cantidad'] : null;
    $fechaentrada = isset($_REQUEST['input_fentrada']) ? $_REQUEST['input_fentrada'] : null;
    // Variables
    $hostDB = 'localhost';
    $nombreDB = 'id22222611_bd_puza';
    $usuarioDB = 'id22222611_codebreaker';
    $contrasenyaDB = 'PmW00Bn61Auy@';
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO materias_primas (NombreMateria, DescripcionMateria, 
    IDproveedor, CostoMateria, ExistenciasMateria, Fecha_entradaMateria, EstadoMateria) 
    VALUES (:NombreMateria,:DescripcionMateria,:IDproveedor,:CostoMateria,:ExistenciasMateria,:Fecha_entradaMateria,:EstadoMateria)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'NombreMateria' => $nombre,
            'DescripcionMateria' => $descripcion,
            'IDproveedor'=> $proveedor,
            'CostoMateria'=> $precio,
            'ExistenciasMateria'=> $cantidad,
            'Fecha_entradaMateria'=> $fechaentrada,
            'EstadoMateria' => 1
        )
    );

    


    // Redireccionamos a Leer
    header('Location: ../matprimR.php');
}
?>