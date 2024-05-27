<?php 
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos

$conexion=new mysqli($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB);
$conexion->set_charset("utf8");



//$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
//$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
//$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));



?>