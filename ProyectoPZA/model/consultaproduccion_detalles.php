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

$codigo = isset($_REQUEST['IDPedido']) ? $_REQUEST['IDPedido'] : null;
// Prepara SELECT
//$miConsulta = $miPDO->prepare('SELECT materias_primas.*,proveedores.Razon_social_nombre 
//FROM materias_primas INNER JOIN proveedores ON materias_primas.IDproveedor = proveedores.IDproveedor
//WHERE materias_primas.EstadoMateria = 1 ORDER BY IDproveedor ASC;');

$miConsulta = $miPDO->prepare('SELECT pedidos_productos.*,productos.NombreProducto FROM 
pedidos_productos INNER JOIN productos ON pedidos_productos.ID_Producto = productos.IDproducto
WHERE ID_Pedido=:idpedido AND EstadoPedidoProducto=0;');

// Ejecuta consulta
$miConsulta->execute([
    'idpedido'=>$codigo
]);

if($miConsulta->rowCount()===0){
    $miConsulta2=$miPDO->prepare('UPDATE pedidos SET EstadoPedido=1 WHERE IDPedido=:codigo');
    $miConsulta2->execute([
        'codigo' => $codigo
    ]);
    header('Location: ../produccionR.php');

}