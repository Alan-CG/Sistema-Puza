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

$codigo = isset($_REQUEST['IDproducto']) ? $_REQUEST['IDproducto'] : null;
// Prepara SELECT
//$miConsulta = $miPDO->prepare('SELECT materias_primas.*,proveedores.Razon_social_nombre 
//FROM materias_primas INNER JOIN proveedores ON materias_primas.IDproveedor = proveedores.IDproveedor
//WHERE materias_primas.EstadoMateria = 1 ORDER BY IDproveedor ASC;');

$miConsulta = $miPDO->prepare('SELECT formula_producto.*,productos.NombreProducto,materias_primas.NombreMateria FROM 
formula_producto 
INNER JOIN productos ON formula_producto.ID_Producto = productos.IDproducto 
INNER JOIN materias_primas ON formula_producto.ID_Materia=materias_primas.IDmateriaprima 
WHERE ID_Producto=:ID_producto;');

// Ejecuta consulta
$miConsulta->execute(
    array(
        'ID_producto'=>$codigo
    )
);


//$miConsulta2 = $miPDO->prepare('SELECT * FROM productos WHERE IDproducto = :IDproducto');
//$miConsulta2->execute(
//    [
//        'IDproducto' => $codigo
//    ]
//);
//$producto = $miConsulta2->fetch();