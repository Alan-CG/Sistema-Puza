<?php
// Comprobamso si recibimos datos por POST

    $RFC=$_POST['input_rfc'];
    $nombre=$_POST['input_nombrecliente'];
    $telefono=$_POST['input_telefocliente'];
    $correo=$_POST['input_correocliente'];
    $estado=$_POST['input_clienteestado'];
    $calle=$_POST['input_callecliente'];
    $colonia=$_POST['input_clientecolonia'];
    $cp=$_POST['input_clientecp']; 

    // Variables de base de datos
    $hostDB = '127.0.0.1';
    $nombreDB = 'bd_puza';
    $usuarioDB = 'root';
    $contrasenyaDB = '';
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO clientes (RFC_cliente,NombreCliente, 
    TelefonoCliente, CorreoCliente, CalleCliente, ColoniaCliente, CodigopostalCliente,
    IDestado, EstadoCliente) 
    VALUES (:RFC_cliente,:NombreCliente,:TelefonoCliente,:CorreoCliente,
    :CalleCliente, :ColoniaCliente,:CodigopostalCliente,:IDestado,:EstadoCliente)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'RFC_cliente'=>$RFC,
            'NombreCliente' => $nombre,
            'TelefonoCliente' => $telefono,
            'CorreoCliente'=> $correo,
            'CalleCliente'=> $calle,
            'ColoniaCliente'=> $colonia,
            'CodigopostalCliente'=> $cp,
            'IDestado'=> $estado,
            'EstadoCliente' => 1,       
            
        )
    );
    // Redireccionamos a Leer
    header('Location: ../clienteR.php');
?>