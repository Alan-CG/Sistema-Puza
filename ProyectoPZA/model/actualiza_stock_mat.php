<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));

$codigo = isset($_REQUEST['IDregistro_compra']) ? $_REQUEST['IDregistro_compra'] : null;



$miConsulta = $miPDO->prepare('UPDATE materias_primas SET ExistenciasMateria = ExistenciasMateria + :cantidad
 WHERE IDmateriaprima = ;');

 // Ejecuta consulta
$miConsulta->execute(
    array(
        'cantidad'=>$cantidad
    )
);