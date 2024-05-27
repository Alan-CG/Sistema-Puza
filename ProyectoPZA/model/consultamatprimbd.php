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
$miConsulta = $miPDO->prepare('SELECT materias_primas.*,proveedores.Razon_social_nombre 
FROM materias_primas INNER JOIN proveedores ON materias_primas.IDproveedor = proveedores.IDproveedor
WHERE materias_primas.EstadoMateria = 1 ORDER BY IDproveedor ASC;');
// Ejecuta consulta
$miConsulta->execute();
//Las siguientes dos lineas sirven para llenar el select de estados en registro de proveedores
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));
$consulta = "SELECT * FROM proveedores";
$ejecutar=mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));


?>