<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
$codigo = isset($_REQUEST['IDproveedor']) ? $_REQUEST['IDproveedor'] : null;
$RFC = isset($_REQUEST['input_RFCproveedor']) ? $_REQUEST['input_RFCproveedor'] : null;
$nombre = isset($_REQUEST['input_nombreproveedor']) ? $_REQUEST['input_nombreproveedor'] : null;
$nombre_represent = isset($_REQUEST['input_representprove']) ? $_REQUEST['input_representprove'] : null;
$telefono = isset($_REQUEST['input_telefonoprove']) ? $_REQUEST['input_telefonoprove'] : null;
$correo = isset($_REQUEST['input_correoprove']) ? $_REQUEST['input_correoprove'] : null;
$estado = isset($_REQUEST['input_proveestado']) ? $_REQUEST['input_proveestado'] : null;
$municipio = isset($_REQUEST['input_ciudad']) ? $_REQUEST['input_ciudad'] : null;
$colonia = isset($_REQUEST['input_provecolonia']) ? $_REQUEST['input_provecolonia'] : null;
$calle = isset($_REQUEST['input_provecalle']) ? $_REQUEST['input_provecalle'] : null;
$num_ext = isset($_REQUEST['input_provenumex']) ? $_REQUEST['input_provenumex'] : null;
$codigopostal = isset($_REQUEST['input_provecp']) ? $_REQUEST['input_provecp'] : null;

// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE proveedores 
    SET RFC_proveedor=:RFC_proveedor,Razon_social_nombre = :Razon_social_nombre, Nombre_representante = :Nombre_representante, 
    TelefonoProveedor = :TelefonoProveedor, CorreoProveedor = :CorreoProveedor, CalleProveedor = :CalleProveedor,
    Num_exterior=:Num_exterior,ColoniaProveedor = :ColoniaProveedor, CodigopostalProveedor = :CodigopostalProveedor, IDestado = :IDestado,
     EstadoProveedor=:EstadoProveedor WHERE IDproveedor = :IDproveedor');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'IDproveedor' => $codigo,
            'RFC_proveedor'=>$RFC,
            'Razon_social_nombre' => $nombre,
            'Nombre_representante' => $nombre_represent,
            'TelefonoProveedor' => $telefono,
            'CorreoProveedor' => $correo,
            'CalleProveedor'=> $calle,
            'Num_exterior'=>$num_ext,
            'ColoniaProveedor'=> $colonia,
            'CodigopostalProveedor'=> $codigopostal,
            'IDestado'=> $estado,
            'EstadoProveedor'=>1
        ]
    );
    // Redireccionamos a Leer
    header('Location: ../proveedoresR.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM proveedores WHERE IDproveedor = :IDproveedor;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            'IDproveedor' => $codigo
        ]
    );
}





// Obtiene un resultado
$proveedor = $miConsulta->fetch();

?>