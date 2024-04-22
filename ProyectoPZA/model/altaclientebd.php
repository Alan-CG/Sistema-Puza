<!-- Realizar cambios -->

<?php
// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $id = isset($_REQUEST['input_idclient']) ? $_REQUEST['input_idclient'] : null;
    $nombre = isset($_REQUEST['input_nombreclient']) ? $_REQUEST['input_nombreclient'] : null;
    $apellidop = isset($_REQUEST['input_apellidopclient']) ? $_REQUEST['input_apellidopclient'] : null;
    $apellidom = isset($_REQUEST['input_apellidomclient']) ? $_REQUEST['input_apellidomclient'] : null;
    $telefono = isset($_REQUEST['input_telefonoclient']) ? $_REQUEST['input_telefonoclient'] : null;
    $correo = isset($_REQUEST['input_correoclient']) ? $_REQUEST['input_correoclient'] : null;
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
    $miInsert = $miPDO->prepare('INSERT INTO clientes (IDcliente, RFC_cliente, NombreCliente, 
    TelefonoCliente, CorreoCliente, CalleCliente, ColoniaCliente, CodigopostalCliente, IDestado, EstadoCliente) 
    VALUES (:IDCliente,:RFC_cliente,:NombreCliente,:TelefonoCliente,:CorreoCliente,:CalleCliente,:ColoniaCliente,:CodigopostalCliente,:IDestado,:EstadoCliente)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            
            'nombre' => $nombre,
            'ApellidoP' => $apellidop,
            'ApellidoM' => $apellidom,
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