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
// Prepara SELECT
//$miConsulta = $miPDO->prepare('SELECT * FROM proveedores;');
$miConsulta = $miPDO->prepare('SELECT usuario.*, tipo_usuario.Tipo 
FROM usuario INNER JOIN tipo_usuario ON usuario.IDtipousuario = tipo_usuario.IDtipo_usuario 
WHERE usuario.EstadoUsuario=1 ORDER BY Fecha_creacion ASC;');

// Ejecuta consulta
$miConsulta->execute();
$miConsulta2 = $miPDO->prepare('SELECT * FROM tipo_usuario;');
$miConsulta2->execute();