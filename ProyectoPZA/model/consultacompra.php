<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT compras.*,materias_primas.NombreMateria 
FROM compras INNER JOIN materias_primas ON compras.ID_Materia = materias_primas.IDmateriaprima;');
// Ejecuta consulta
$miConsulta->execute();

//Las siguientes líneas de código se encargan de llenar los select de comprasC
$mysqli= new mysqli($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB);

if($mysqli->connect_error){
    echo "Error en la conexión" .$mysqli->connect_error;
    exit;
}

$consulta = $mysqli->query("SELECT IDproveedor,NombreProveedor FROM proveedores");
