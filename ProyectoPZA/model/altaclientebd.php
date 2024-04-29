<?php
// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $nombre = isset($_REQUEST['input_nombreclient']) ? $_REQUEST['input_nombreclient'] : null;
    $RFC = isset($_REQUEST['input_RFCcliente']) ? $_REQUEST['input_RFCcliente'] : null;
    $telefono = isset($_REQUEST['input_telefonoclient']) ? $_REQUEST['input_telefonoclient'] : null;
    $correo = isset($_REQUEST['input_correoclient']) ? $_REQUEST['input_correoclient'] : null;
    $estado = isset($_REQUEST['input_estadoclient']) ? $_REQUEST['input_estadoclient'] : null;
    $calle = isset($_REQUEST['input_calleclient']) ? $_REQUEST['input_calleclient'] : null;
    $colonia = isset($_REQUEST['input_coloniaclient']) ? $_REQUEST['input_coloniaclient'] : null;
    $codigopostal = isset($_REQUEST['input_cpclient']) ? $_REQUEST['input_cpclient'] : null;
    // Variables 
    $hostDB = '127.0.0.1'; 
    $nombreDB = 'bd_puza';
    $usuarioDB = 'root';
    $contrasenyaDB = '';
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO clientes (NombreCliente, RFC_cliente, 
    TelefonoCliente, CorreoCliente, CalleCliente, ColoniaCliente, CodigopostalCliente, IDestado, EstadoCliente) 
    VALUES (:NombreCliente, :RFC_cliente, :TelefonoCliente,:CorreoCliente,:CalleCliente,:ColoniaCliente,:CodigopostalCliente,:IDestado,:EstadoCliente)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'NombreCliente' => $nombre,
            'RFC_cliente'=>$RFC,
            'TelefonoCliente' => $telefono,
            'CorreoCliente'=> $correo,
            'CalleCliente'=> $calle,
            'ColoniaCliente'=> $colonia,
            'CodigopostalCliente'=> $codigopostal,
            'IDestado'=> $estado,
            'EstadoCliente'=> 1
        )
    );
    // Redireccionamos a Leer
    header('Location: ../clienteR.php');
}
?>