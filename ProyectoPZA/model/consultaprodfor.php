<?php
// Variables Conexión BD
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));

//Consulta para el llenado del select de materias primas
$consulta = "SELECT * FROM materias_primas";
$opciones_select=mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));


?>