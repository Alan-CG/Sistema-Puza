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

$codigo = isset($_REQUEST['IDCompra_materia']) ? $_REQUEST['IDCompra_materia'] : null;

$consulta_cantidad=$miPDO->prepare('SELECT Cantidad_Compra FROM compras_materias WHERE IDCompra_materia = :codigo ;');

$consulta_cantidad->execute(
    array(
        'codigo'=>$codigo
    )
);

$consulta_cantidad_valor=$consulta_cantidad->fetchColumn();

$consulta_id=$miPDO->prepare('SELECT ID_Materia FROM compras_materias WHERE IDCompra_materia = :codigo ;');
$consulta_id->execute(
    array(
        'codigo'=>$codigo
    )
);

$consulta_id_valor=$consulta_id->fetchColumn();

$miConsulta = $miPDO->prepare('UPDATE materias_primas SET ExistenciasMateria = ExistenciasMateria +:cantidad
 WHERE IDmateriaprima = :codigo;');

 // Ejecuta consulta
$miConsulta->execute(
    array(
        'cantidad'=>$consulta_cantidad_valor,
        'codigo'=>$consulta_id_valor
    )
);

$miConsulta2 = $miPDO->prepare('UPDATE compras_materias SET EstadoCompraMat = :estado
 WHERE IDCompra_materia = :codigo;');

 // Ejecuta consulta
$miConsulta2->execute(
    array(
        'estado'=>1,
        'codigo'=>$codigo
    )
);

$miConsulta3 = $miPDO->prepare('SELECT IDregistro_compra FROM compras_materias WHERE IDCompra_materia = :codigo;');

 // Ejecuta consulta
$miConsulta3->execute(
    array(
        'codigo'=>$codigo
    )
);

$idregistro=$miConsulta3->fetchColumn();

$url = "../compra_llega_mat.php?IDregistro_compra=$idregistro";


header("Location:$url");