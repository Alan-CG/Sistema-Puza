<?php

// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Obtiene codigo del proveedor a borrar
$codigo = isset($_REQUEST['IDproducto']) ? $_REQUEST['IDproducto'] : null;
// Prepara UPDATE
$miUpdate = $miPDO->prepare('UPDATE productos SET EstadoProducto = 0 WHERE IDproducto = :IDproducto');
// Ejecuta la sentencia SQL
$miUpdate->execute([
    'IDproducto' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: ../productosR.php');