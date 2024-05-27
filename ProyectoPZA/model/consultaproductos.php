<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));

$codigo = isset($_REQUEST['IDproducto']) ? $_REQUEST['IDproducto'] : null;
// Prepara SELECT
//$miConsulta = $miPDO->prepare('SELECT materias_primas.*,proveedores.Razon_social_nombre 
//FROM materias_primas INNER JOIN proveedores ON materias_primas.IDproveedor = proveedores.IDproveedor
//WHERE materias_primas.EstadoMateria = 1 ORDER BY IDproveedor ASC;');

$miConsulta = $miPDO->prepare('SELECT * FROM productos WHERE EstadoProducto = 1');

// Ejecuta consulta
$miConsulta->execute();


$miConsulta2 = $miPDO->prepare('SELECT * FROM productos WHERE IDproducto = :IDproducto');
$miConsulta2->execute(
    [
        'IDproducto' => $codigo
    ]
);
$producto = $miConsulta2->fetch();

$miConsulta3 = $miPDO->prepare('SELECT IDproducto,NombreProducto FROM productos WHERE EstadoProducto = 1');
$miConsulta3->execute();
//$producto = $miConsulta2->fetch();