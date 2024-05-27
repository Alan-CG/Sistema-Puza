<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Obtiene codigo del producto a "borrar"
$codigo = isset($_REQUEST['IDproductosterminados']) ? $_REQUEST['IDproductosterminados'] : null;
// Prepara UPDATE
$miConsulta = $miPDO->prepare('UPDATE productos_terminados SET EstadoProducto = 0 WHERE IDproductosterminados = :IDproductosterminados');
// Ejecuta la sentencia SQL
$miConsulta->execute([
    'IDproductosterminados' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: ../prodtermR.php');
?>