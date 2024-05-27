<?php
// Variables Conexión BD
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));

//Variables para la tabla pedidos
$folio_pedido=$_POST['input_folio'];
$fecha=$_POST['input_fecha'];
$idcliente=$_POST['input_cliente'];
$total_pedido=0;
$estado_pedido=0;

//variables para la tabla pedidos productos
$idproducto=$_POST['input_producto'];
$cantidad=$_POST['input_cantidad'];

//Preparo Insert para la primera tabla
$miInsert = $miPDO->prepare('INSERT INTO pedidos (Folio,FechaPedido,IDCliente,TotalPedido,EstadoPedido) 
VALUES (:folio,:fecha,:idcliente,:total,:estadopedido)');

// Ejecuta INSERT con los datos
$miInsert->execute(
    array(
        'folio' => $folio_pedido,
        'fecha' => $fecha,
        'idcliente'=>$idcliente,
        'total'=>$total_pedido,
        'estadopedido'=>$estado_pedido,
    )
);

//Recupero el ID del ultimo insert
$idpedido=$miPDO->lastInsertId();

//Se convierte el array de id de productos en String
$productos_string = implode(",",$idproducto);

//Preparo el insert para la lista de materias compradas
$lista_query = "INSERT INTO pedidos_productos (ID_Pedido,ID_Producto,Cantidad) VALUES (:idpedido,:idproducto,:cantidad)";
$miInsertLista = $miPDO->prepare($lista_query);

$total_final=0;

try {
    foreach ($_POST['input_producto'] as $index => $producto_id) {
        $cantidad_comprada = $_POST['input_cantidad'][$index];
        
        // Ejecuta INSERT para cada materia prima con su respectiva cantidad
        $miInsertLista->execute([
            'idpedido' => $idpedido,
            'idproducto' => $producto_id,
            'cantidad' => $cantidad_comprada,
        ]);

        //A partir de aquí empieza la parte de calculo del total

        //Esta primer Query se encarga de consultar el precio del producto teniendo en cuenta el ID del producto

        $precio_producto = $miPDO->prepare('SELECT PrecioProducto FROM productos 
        WHERE IDproducto = :idproducto');
        $precio_producto->execute([
            'idproducto'=>$producto_id
        ]);
        
        //La siguiente línea transforma la consulta $precio_producto en tipo número para poder hacer despues la operación
        $precio_producto_valor = $precio_producto->fetchColumn();

        //En esta línea se crea una variable para hacer la operación
        $total_parcial= $precio_producto_valor * $cantidad_comprada;
        //La siguiente variable va sumando los resultados de cada operación para ir actualizando en la base de datos el dato
        $total_final=$total_final+$total_parcial;


        //La siguiente consulta se encarga de actualizar el campo de total con el resultado de la variable anterior $costo_final
        $miupdate=$miPDO->prepare('UPDATE pedidos SET TotalPedido = :calculopedido 
        WHERE IDPedido = :idpedido');
        $miupdate->execute([
            'calculopedido'=>$total_final,
            'idpedido'=>$idpedido
        ]);


        
    }

} catch (PDOException $e) {
    echo "Error al insertar en la formula: " . $e->getMessage();
}
header('Location: ../pedidosR.php');