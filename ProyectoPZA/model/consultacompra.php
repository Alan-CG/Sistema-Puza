<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT registro_compra.*,proveedores.Razon_social_nombre 
FROM registro_compra INNER JOIN proveedores ON registro_compra.ID_proveedor = proveedores.IDproveedor;');
// Ejecuta consulta
$miConsulta->execute();

//Las siguientes líneas de código se encargan de llenar los select de comprasC
$mysqli= new mysqli($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB);

if($mysqli->connect_error){
    echo "Error en la conexión" .$mysqli->connect_error;
    exit;
}

$consulta = $mysqli->query("SELECT IDproveedor,Razon_social_nombre FROM proveedores");

$miConsulta2 = $miPDO->prepare('SELECT registro_compra.*,proveedores.Razon_social_nombre 
FROM registro_compra INNER JOIN proveedores ON registro_compra.ID_proveedor = proveedores.IDproveedor
WHERE Estado_Compra=0;');
// Ejecuta consulta
$miConsulta2->execute();

$miConsulta3 = $miPDO->prepare('SELECT registro_compra.*,proveedores.Razon_social_nombre 
FROM registro_compra INNER JOIN proveedores ON registro_compra.ID_proveedor = proveedores.IDproveedor
WHERE Estado_Compra=1;');
// Ejecuta consulta
$miConsulta3->execute();
