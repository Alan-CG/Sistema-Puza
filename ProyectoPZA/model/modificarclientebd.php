<?php
// Variables
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
$codigo = isset($_REQUEST['IDcliente']) ? $_REQUEST['IDcliente'] : null;
$nombre = isset($_REQUEST['input_nombreclient']) ? $_REQUEST['input_nombreclient'] : null;
$rfc_cliente = isset($_REQUEST['input_rfc_cliente']) ? $_REQUEST['input_rfc_cliente'] : null;
$telefono = isset($_REQUEST['input_telefonoclient']) ? $_REQUEST['input_telefonoclient'] : null;
$correo = isset($_REQUEST['input_correoclient']) ? $_REQUEST['input_correoclient'] : null;
$idestado = isset($_REQUEST['input_estadocliente']) ? $_REQUEST['input_estadocliente'] : null;
$calle = isset($_REQUEST['input_calleclient']) ? $_REQUEST['input_calleclient'] : null;
$colonia = isset($_REQUEST['input_coloniaclient']) ? $_REQUEST['input_coloniaclient'] : null;
$codigopostal = isset($_REQUEST['input_cpclient']) ? $_REQUEST['input_cpclient'] : null;

// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE clientes SET RFC_cliente = :RFC_cliente, 
    NombreCliente = :NombreCliente, 
    TelefonoCliente = :TelefonoCliente, CorreoCliente = :CorreoCliente, 
    CalleCliente = :CalleCliente, ColoniaCliente = :ColoniaCliente, 
    CodigopostalCliente = :CodigopostalCliente, IDestado = :IDestado, EstadoCliente=:EstadoCliente WHERE IDcliente = :IDcliente');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'IDcliente' => $codigo,
            'NombreCliente' => $nombre,
            'RFC_cliente' =>$rfc_cliente,
            'TelefonoCliente' => $telefono,
            'CorreoCliente' => $correo,
            'CalleCliente'=> $calle,
            'ColoniaCliente'=> $colonia, 
            'CodigopostalCliente'=> $codigopostal,
            'IDestado'=> $idestado,
            'EstadoCliente' => 1
        ]
    );
    // Redireccionamos a Leer
    header('Location: ../clienteR.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM clientes WHERE IDcliente = :IDcliente;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            'IDcliente' => $codigo
        ]
    );
}

// Obtiene un resultado
$cliente = $miConsulta->fetch();

?>