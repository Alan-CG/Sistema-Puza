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
$codigo = isset($_REQUEST['IDusuario']) ? $_REQUEST['IDusuario'] : null;
// Prepara UPDATE
$miUpdate = $miPDO->prepare('UPDATE usuario SET EstadoUsuario = 0 WHERE IDusuario = :idusuario');
// Ejecuta la sentencia SQL
$miUpdate->execute([
    'idusuario' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: ../usuariosR.php');



