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
$codigo = isset($_REQUEST['IDusuario']) ? $_REQUEST['IDusuario'] : null;
// Prepara UPDATE
$miUpdate = $miPDO->prepare('UPDATE usuario SET EstadoUsuario = 0 WHERE IDusuario = :idusuario');
// Ejecuta la sentencia SQL
$miUpdate->execute([
    'idusuario' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: ../usuariosR.php');



