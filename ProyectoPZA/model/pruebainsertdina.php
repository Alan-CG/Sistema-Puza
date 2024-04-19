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

//Inserción de los campos del form dinámico
$nombre=$_POST['input_nombreclient'] ?? '';
$descripcion=$_POST['input_desprod'] ?? '';
$materiales=$_POST['input_matprim'] ?? [];
$cantidades=$_POST['input_cantmat'] ?? [];
$preciocosto = 100;
$precioproducto=100;
$estado=1;

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

try {
    foreach ($_POST['input_matprim'] as $index => $materia_prima_id) {
        $cantidad_necesaria = $_POST['input_cantmat'][$index];
        
        // Ejecuta INSERT para cada materia prima
        $miInsertFormula->execute([
            'materiales' => $materia_prima_id,
            'idproducto' => $idproducto,
            'cantidades' => $cantidad_necesaria,
        ]);
        header('Location: ../formulaprodC.php');
    }

} catch (PDOException $e) {
    echo "Error al insertar en la formula: " . $e->getMessage();
}



?>