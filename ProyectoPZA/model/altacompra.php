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

$idmateria=$_POST['input_nombremat'];
$cantidad=$_POST['input_cantidad'];
$fecha=$_POST['input_Fecha'];

$miInsert = $miPDO->prepare('INSERT INTO compras (ID_Materia,Fecha_Entrada,Cantidad_Compra) 
VALUES (:idmateria,:fecha,:cantidad)');

// Ejecuta INSERT con los datos
$miInsert->execute(
    array(
        'idmateria' => $idmateria,
        'cantidad' => $cantidad,
        'fecha'=>$fecha,
    )
);

header('Location: ../comprasR.php');