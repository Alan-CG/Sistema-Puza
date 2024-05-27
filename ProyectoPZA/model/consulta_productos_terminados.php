<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT productos_terminados.*,pedidos_productos.*,pedidos.*,productos.*, clientes.* 
FROM productos_terminados INNER JOIN pedidos_productos ON productos_terminados.ID_pedido_producto = pedidos_productos.IDPedidoProducto 
INNER JOIN pedidos ON pedidos_productos.ID_Pedido = pedidos.IDPedido 
INNER JOIN productos ON pedidos_productos.ID_Producto=productos.IDproducto 
INNER JOIN clientes ON pedidos.IDCliente=clientes.IDcliente WHERE EstadoProductoTerminado=0;');
// Ejecuta consulta
$miConsulta->execute();

$miConsulta2 = $miPDO->prepare('SELECT productos_terminados.*,pedidos_productos.*,pedidos.*,productos.*, clientes.* 
FROM productos_terminados INNER JOIN pedidos_productos ON productos_terminados.ID_pedido_producto = pedidos_productos.IDPedidoProducto 
INNER JOIN pedidos ON pedidos_productos.ID_Pedido = pedidos.IDPedido 
INNER JOIN productos ON pedidos_productos.ID_Producto=productos.IDproducto 
INNER JOIN clientes ON pedidos.IDCliente=clientes.IDcliente WHERE EstadoProductoTerminado=1;');
// Ejecuta consulta
$miConsulta2->execute();