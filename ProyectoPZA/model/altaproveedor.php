<?php
// Comprobamso si recibimos datos por POST
    // Recogemos variables
    //$RFC = isset($_REQUEST['input_RFCproveedor']) ? $_REQUEST['input_RFCproveedor'] : null;
    //$nombre = isset($_REQUEST['input_nombreproveedor']) ? $_REQUEST['input_nombreproveedor'] : null;
    //$nombre_represent = isset($_REQUEST['input_representprove']) ? $_REQUEST['input_representprove'] : null;
    //$telefono = isset($_REQUEST['input_telefonoprove']) ? $_REQUEST['input_telefonoprove'] : null;
    //$correo = isset($_REQUEST['input_correoprove']) ? $_REQUEST['input_correoprove'] : null;
    //$estado = isset($_REQUEST['input_proveestado']) ? $_REQUEST['input_proveestado'] : null;
    //$calle = isset($_REQUEST['input_provecalle']) ? $_REQUEST['input_provecalle'] : null;
    //$colonia = isset($_REQUEST['input_provecolonia']) ? $_REQUEST['input_provecolonia'] : null;
    //$codigopostal = isset($_REQUEST['input_provecp']) ? $_REQUEST['input_provecp'] : null;

    $RFC12=$_POST['input_rfc12'];
    $RFC13=$_POST['input_rfc13'];
    $razon_social=$_POST['input_razonsocial'];
    $nombre=$_POST['input_nombreproveedor'];
    $representante=$_POST['input_representprove'];
    $telefono=$_POST['input_telefonoprove'];
    $correo=$_POST['input_correoprove'];
    $estado=$_POST['input_proveestado'];
    $municipio=$_POST['input_ciudad'];
    $calle=$_POST['input_provecalle'];
    $num_ext=$_POST['input_provenumex'];
    $colonia=$_POST['input_provecolonia'];
    $cp=$_POST['input_provecp'];
    

    // Variables de base de datos
    $hostDB = 'localhost';
    $nombreDB = 'id22222611_bd_puza';
    $usuarioDB = 'id22222611_codebreaker';
    $contrasenyaDB = 'PmW00Bn61Auy@';
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

    if($RFC12!='000000000000'){
         // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO proveedores (RFC_proveedor,Razon_social_nombre,Nombre_representante, 
    TelefonoProveedor, CorreoProveedor, CalleProveedor, Num_exterior,ColoniaProveedor, CodigopostalProveedor,
    IDestado,EstadoProveedor,Municipio) 
    VALUES (:RFC_proveedor,:Razon_social_nombre,:Nombre_representante,:TelefonoProveedor,:CorreoProveedor,
    :CalleProveedor,:Num_exterior,:ColoniaProveedor,:CodigopostalProveedor,:IDestado,:EstadoProveedor,:Municipio)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'RFC_proveedor'=>$RFC12,
            'Razon_social_nombre'=>$razon_social,
            'Nombre_representante' => $representante,
            'TelefonoProveedor' => $telefono,
            'CorreoProveedor'=> $correo,
            'CalleProveedor'=> $calle,
            'Num_exterior'=>$num_ext,
            'ColoniaProveedor'=> $colonia,
            'CodigopostalProveedor'=> $cp,
            'IDestado'=> $estado,
            'EstadoProveedor' => 1,
            'Municipio'=>$municipio
        )
    );
    }else{
        $miInsert = $miPDO->prepare('INSERT INTO proveedores (RFC_proveedor,Razon_social_nombre,Nombre_representante, 
    TelefonoProveedor, CorreoProveedor, CalleProveedor, Num_exterior,ColoniaProveedor, CodigopostalProveedor,
    IDestado,EstadoProveedor,Municipio) 
    VALUES (:RFC_proveedor,:Razon_social_nombre,:Nombre_representante,:TelefonoProveedor,:CorreoProveedor,
    :CalleProveedor,:Num_exterior,:ColoniaProveedor,:CodigopostalProveedor,:IDestado,:EstadoProveedor,:Municipio)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'RFC_proveedor'=>$RFC13,
            'Razon_social_nombre'=>$nombre,
            'Nombre_representante' => $representante,
            'TelefonoProveedor' => $telefono,
            'CorreoProveedor'=> $correo,
            'CalleProveedor'=> $calle,
            'Num_exterior'=>$num_ext,
            'ColoniaProveedor'=> $colonia,
            'CodigopostalProveedor'=> $cp,
            'IDestado'=> $estado,
            'EstadoProveedor' => 1,
            'Municipio'=>$municipio
        )
    );
    }





   
    


    // Redireccionamos a Leer
    header('Location: ../proveedoresR.php');
?>