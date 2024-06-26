<?php
// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $RFC = isset($_REQUEST['input_RFCproveedor']) ? $_REQUEST['input_RFCproveedor'] : null;
    $nombre = isset($_REQUEST['input_nombreproveedor']) ? $_REQUEST['input_nombreproveedor'] : null;
    $nombre_represent = isset($_REQUEST['input_representprove']) ? $_REQUEST['input_representprove'] : null;
    $telefono = isset($_REQUEST['input_telefonoprove']) ? $_REQUEST['input_telefonoprove'] : null;
    $correo = isset($_REQUEST['input_correoprove']) ? $_REQUEST['input_correoprove'] : null;
    $estado = isset($_REQUEST['input_proveestado']) ? $_REQUEST['input_proveestado'] : null;
    $calle = isset($_REQUEST['input_provecalle']) ? $_REQUEST['input_provecalle'] : null;
    $colonia = isset($_REQUEST['input_provecolonia']) ? $_REQUEST['input_provecolonia'] : null;
    $codigopostal = isset($_REQUEST['input_provecp']) ? $_REQUEST['input_provecp'] : null;
    // Variables
    $hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO proveedores (RFC_proveedor,NombreProveedor, Nombre_representante, 
    TelefonoProveedor, CorreoProveedor, CalleProveedor, ColoniaProveedor, CodigopostalProveedor,IDestado,estadoProveedor) 
    VALUES (:RFC_proveedor,:NombreProveedor,:Nombre_representante,:TelefonoProveedor,:CorreoProveedor,:CalleProveedor,:ColoniaProveedor,:CodigopostalProveedor,:IDestado,:estadoProveedor)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'RFC_proveedor'=>$RFC,
            'NombreProveedor' => $nombre,
            'Nombre_representante' => $nombre_represent,
            'TelefonoProveedor' => $telefono,
            'CorreoProveedor'=> $correo,
            'CalleProveedor'=> $calle,
            'ColoniaProveedor'=> $colonia,
            'CodigopostalProveedor'=> $codigopostal,
            'IDestado'=> $estado,
            'estadoProveedor' => 1
        )
    );

    


    // Redireccionamos a Leer
    header('Location: ../proveedoresR.php');
}
?>