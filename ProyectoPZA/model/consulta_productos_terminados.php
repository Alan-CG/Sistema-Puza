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
$miConsulta = $miPDO->prepare('SELECT productos_terminados.*,pedidos_productos.*,pedidos.*,productos.*, clientes.* 
FROM productos_terminados INNER JOIN pedidos_productos ON productos_terminados.ID_pedido_producto = pedidos_productos.IDPedidoProducto 
INNER JOIN pedidos ON pedidos_productos.ID_Pedido = pedidos.IDPedido 
INNER JOIN productos ON pedidos_productos.ID_Producto=productos.IDproducto 
INNER JOIN clientes ON pedidos.IDCliente=clientes.IDcliente WHERE EstadoProductoTerminado=0;');
// Ejecuta consulta
$miConsulta->execute();