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

//Recupero el IDPedidoProducto
$idprodter = isset($_REQUEST['IDProductoTerminado']) ? $_REQUEST['IDProductoTerminado'] : null;

//Hago una consulta para obtener el id del producto
$confirmaenvio=$miPDO->prepare('UPDATE productos_terminados SET EstadoProductoTerminado=1 WHERE IDProductoTerminado=:codigo;');

$confirmaenvio->execute(
    array(
        'codigo'=>$idprodter
    )
);
header('Location: ../productosterminadosR.php');