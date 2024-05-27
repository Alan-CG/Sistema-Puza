<?php

// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Obtiene codigo del proveedor a borrar
$codigo = isset($_REQUEST['IDproveedor']) ? $_REQUEST['IDproveedor'] : null;
// Prepara UPDATE
$miUpdate = $miPDO->prepare('UPDATE proveedores SET estadoProveedor = 0 WHERE IDproveedor = :IDproveedor');
// Ejecuta la sentencia SQL
$miUpdate->execute([
    'IDproveedor' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: ../proveedoresR.php');



?>