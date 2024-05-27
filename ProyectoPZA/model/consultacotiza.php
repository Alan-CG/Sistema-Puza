<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';

// Conecta con base de datos
$mysqli= new mysqli($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB);

if($mysqli->connect_error){
    echo "Error en la conexión" .$mysqli->connect_error;
    exit;
}

$consulta = $mysqli->query("SELECT IDproducto,NombreProducto FROM productos");