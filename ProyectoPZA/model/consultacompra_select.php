<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';

//Las siguientes líneas de código se encargan de llenar los select de comprasC
$mysqli= new mysqli($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB);

if($mysqli->connect_error){
    echo "Error en la conexión" .$mysqli->connect_error;
    exit;
}

$consulta = $mysqli->query("SELECT IDproveedor,NombreProveedor FROM proveedores");
