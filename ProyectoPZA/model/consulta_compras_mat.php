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

$codigo = isset($_REQUEST['IDregistro_compra']) ? $_REQUEST['IDregistro_compra'] : null;
// Prepara SELECT
//$miConsulta = $miPDO->prepare('SELECT materias_primas.*,proveedores.Razon_social_nombre 
//FROM materias_primas INNER JOIN proveedores ON materias_primas.IDproveedor = proveedores.IDproveedor
//WHERE materias_primas.EstadoMateria = 1 ORDER BY IDproveedor ASC;');

$miConsulta = $miPDO->prepare('SELECT compras_materias.*,materias_primas.* FROM compras_materias 
INNER JOIN materias_primas ON compras_materias.ID_Materia = materias_primas.IDmateriaprima
WHERE IDregistro_compra=:idcompra;');
//$miConsulta = $miPDO->prepare('SELECT compras_materias.*,materias_primas.*,registro_compra.* FROM compras_materias 
//INNER JOIN materias_primas ON compras_materias.ID_Materia = materias_primas.IDmateriaprima
//INNER JOIN registro_compra ON compras_materias.IDregistro_compra = registro_compra.IDregistro_compra 
//WHERE IDregistro_compra=:idcompra;');


// Ejecuta consulta
$miConsulta->execute(
    array(
        'idcompra'=>$codigo
    )
);