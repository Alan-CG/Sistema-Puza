<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));

//Recupero el IDPedidoProducto
$idpedidoproducto = isset($_REQUEST['IDPedidoProducto']) ? $_REQUEST['IDPedidoProducto'] : null;

//Hago una consulta para obtener el id del producto
$consulta_idproducto=$miPDO->prepare('SELECT ID_Producto FROM pedidos_productos WHERE IDPedidoProducto = :codigo ;');

$consulta_idproducto->execute(
    array(
        'codigo'=>$idpedidoproducto
    )
);
//Convierto el resultado a valor númerico
$consulta_idproducto_valor=$consulta_idproducto->fetchColumn();


//Realizo consulta para traer el id de las materias primas usadas para el producto así como la cantidad de las mismas

//$consulta_idproducto=$miPDO->prepare('SELECT ID_Materia,Cantidad_insumo FROM formula_producto WHERE ID_Producto = :codigo;');
//$consulta_idproducto->execute(
//    array(
//        'codigo'=>$consulta_idproducto_valor
//    )
//);
$consulta="SELECT ID_Materia,Cantidad_insumo FROM formula_producto WHERE ID_Producto = $consulta_idproducto_valor;";
$consulta_materias=mysqli_query($conexion, $consulta);

//A su vez también se requiere consultar la cantidad de productos comprados
$cantidad_productos=$miPDO->prepare('SELECT Cantidad FROM pedidos_productos WHERE IDPedidoProducto = :codigo ;');

$cantidad_productos->execute(
    array(
        'codigo'=>$idpedidoproducto
    )
);

//Se convierte el valor devuelto a valor númerico para poder usarlo más adelante
$cantidad_productos_valor=$cantidad_productos->fetchColumn();

//Habiendo capturado la cantidad de productos del pedido se anidaran ciclos para poder descontar el total de materias
//primas utilizadas
//A continuación se usa un ciclo para ir iterando entre los registros de la formula de producto, por cada registro se hace
//el update(descuento) de las materias primas requeridas

if (mysqli_num_rows($consulta_materias) > 0) {
    while ($fila = mysqli_fetch_row($consulta_materias)) {
      $id_materia_prima = $fila[0];
      $cantidad_usada = $fila[1];
      $cantidad_usada_multi=$cantidad_usada*$cantidad_productos_valor;
  
      $consulta_actualizacion = "UPDATE materias_primas 
      SET ExistenciasMateria = ExistenciasMateria - $cantidad_usada_multi WHERE IDmateriaprima = $id_materia_prima";
      mysqli_query($conexion, $consulta_actualizacion);
    }
  } else {
    echo "No hay registros para actualizar";
    $consulta_url=$miPDO->prepare('SELECT ID_Pedido FROM pedidos_productos WHERE IDPedidoProducto = :codigo ;');
    $consulta_url->execute(
        array(
            'codigo'=>$idpedidoproducto
            ));
    $url_idpedido= $consulta_url->fetchColumn();
    $url = "../produccion_detallesR.php?IDPedido=$url_idpedido";
    header("Location:$url");
  }


//A continuación actualizo el estado del registro para que se deje de visualizar en producción
$update_estado=$miPDO->prepare('UPDATE pedidos_productos SET EstadoPedidoProducto = 1 WHERE IDPedidoProducto = :codigo ;');

$update_estado->execute(
    array(
        'codigo'=>$idpedidoproducto
    )
);

//A continuación envío el id del pedido producto a la tabla de productos terminados
$insertprodter=$miPDO->prepare('INSERT INTO productos_terminados(ID_pedido_producto) VALUES (:codigo);');

$insertprodter->execute(
    array(
        'codigo'=>$idpedidoproducto
    )
);


//Regreso a la página de leer  
$consulta_url=$miPDO->prepare('SELECT ID_Pedido FROM pedidos_productos WHERE IDPedidoProducto = :codigo ;');

$consulta_url->execute(
    array(
        'codigo'=>$idpedidoproducto
    )
);

$url_idpedido= $consulta_url->fetchColumn();

$url = "../produccion_detallesR.php?IDPedido=$url_idpedido";


header("Location:$url");
