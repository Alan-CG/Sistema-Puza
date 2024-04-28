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

//Se crean variables que almacenan los datos enviados por el formulario

//Datos de la tabla productos
$nombre=$_POST['input_nombreclient'] ?? '';
$descripcion=$_POST['input_desprod'] ?? '';
$preciocosto = 0;
$precioproducto=0;
$estado=1;
//Datos de la tabla formula_producto
$materiales=$_POST['input_matprim'] ?? [];
$cantidades=$_POST['input_cantmat'] ?? [];

// Prepara INSERT
$miInsert = $miPDO->prepare('INSERT INTO productos (NombreProducto,
DescripcionProducto,PrecioCosto,PrecioProducto,EstadoProducto) 
VALUES (:NombreProducto,:DescripcionProd,:PrecioC,:PrecioP,:EstadoP)');

// Ejecuta INSERT con los datos
$miInsert->execute(
    array(
        'NombreProducto' => $nombre,
        'DescripcionProd' => $descripcion,
        'PrecioC'=>$preciocosto,
        'PrecioP'=>$precioproducto,
        'EstadoP'=>$estado,
    )
);
$idproducto= $miPDO->lastInsertId();

// Convierte el array a string
$materiales_string = implode(",", $materiales);

// Prepara INSERT para la formula
$formula_query = "INSERT INTO formula_producto (ID_Materia, ID_Producto, Cantidad_insumo) VALUES (:materiales, :idproducto, :cantidades)";
$miInsertFormula = $miPDO->prepare($formula_query);

//Los campos dinámicos van crear un arreglo de datos:
//Algo similar a [Indice 1: ID_materia_prima,Cantidad
//                Indice 2: ID_materia_prima,Cantidad]
//De forma que para poder guardar cada registro hay que irlos registrando uno por uno de acuerdo a su indice
//El siguiente ciclo se encarga de ir recorriendo el arreglo de datos creado por los campos dinámicos y de irlos insertando
//
try {
    foreach ($_POST['input_matprim'] as $index => $materia_prima_id) {
        $cantidad_necesaria = $_POST['input_cantmat'][$index];
        
        // Ejecuta INSERT para cada materia prima con su respectiva cantidad
        $miInsertFormula->execute([
            'materiales' => $materia_prima_id,
            'idproducto' => $idproducto,
            'cantidades' => $cantidad_necesaria,
        ]);

        //A partir de aquí empieza la parte de calculo de precios y costos

        //Esta primer Query se encarga de consultar el costo de la materia prima teniendo en cuenta el ID de la materia prima

        $costo_materia = $miPDO->prepare('SELECT CostoMateria FROM materias_primas 
        WHERE IDmateriaprima = :idmateriaprima');
        $costo_materia->execute([
            'idmateriaprima'=>$materia_prima_id
        ]);
        
        //La siguiente línea transforma la consulta $costomateria en tipo número para poder hacer despues la operación
        $costo_materia_valor = $costo_materia->fetchColumn();

        //En esta línea se crea una variable para hacer la operación
        $precio_costo= $costo_materia_valor * $cantidad_necesaria;
        //La siguiente variable va sumando los resultados de cada operación para ir actualizando en la base de datos el dato
        $costo_final=$costo_final+$precio_costo;


        //La siguiente consulta se encarga de actualizar el campo de PrecioCosto con el resultado de la variable anterior $costo_final
        $miupdate=$miPDO->prepare('UPDATE productos SET PrecioCosto = :calculopreciocosto 
        WHERE IDproducto = :idproducto');
        $miupdate->execute([
            'calculopreciocosto'=>$costo_final,
            'idproducto'=>$idproducto
        ]);


        
    }

} catch (PDOException $e) {
    echo "Error al insertar en la formula: " . $e->getMessage();
}

//A partir de aquí puedes escribir el código para el calculo del precio de venta a público, ya no es necesario 
//seguir escribiendo dentro del ciclo pues en este punto ya debe estar calculado el preciocosto

//Según mi idea los siguiente pasos serían los necesarios

//Paso 1: Según mí idea primero debes capturar el dato de porcentaje el que usuario introdujo en el formulario, 
//checa la forma de que ya venga en punto decimal tipo : si es el 50% que ya te llegue como 0.5 o si no igual
//podrías hacer la transformación más adelante a punto decimal

$margen_ganancia=$_POST['input_ganancia'];

$costo_producto= $miPDO->prepare('SELECT PrecioCosto FROM productos 
        WHERE IDproducto = :idprod');

$costo_producto->execute([
    'idprod'=>$idproducto
]);

$costo_producto_valor = $costo_producto->fetchColumn();

$calculo= $costo_producto_valor * ($margen_ganancia/100);
$precio_venta_final = $costo_producto_valor + $calculo;


// Actualizar el precio de venta en la base de datos
$miupdate = $miPDO->prepare('UPDATE productos SET PrecioProducto = :preciofinal WHERE IDproducto = :idproducto');
$miupdate->execute([
    'preciofinal' => $precio_venta_final,
    'idproducto' => $idproducto
]);

// Calcula el precio de venta sumando un margen de ganancia al costo final

//Paso 2: Ahora debes consultar a la base de datos para traerte el preciocosto del producto(el que ya está calculado)

//Paso 3: Probablemente tengas que convertir la consulta a numero así como se hizo arriba para poder calcular el costo

//Paso 4: Se hace el calculo multiplicando el preciocosto por el porcentaje que se le quiere ganar y se suma 
//ese porcentaje al costo para obtener el precio de venta al público

//Paso 5: Ahora solo debes hacer un update al registro del producto  en la bd para actualizar 
//el valor del precio de venta al público.