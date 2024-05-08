<?php
// Variables de base de datos
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

$nombre=$_POST['input_nombre'];
$nombre_usuario=$_POST['input_nombre_usuario'];
$password=$_POST['input_password'];
$tipo_usuario=$_POST['input_tipo'];


$miInsert=$miPDO->prepare('INSERT INTO usuario (IDtipousuario,Nombre,Nombre_usuario,Contraseña)
VALUES (:tipo,:nombre,:nombre_usuario,:pass)');

$miInsert->execute(
    array(
        'tipo'=>$tipo_usuario,
        'nombre'=>$nombre,
        'nombre_usuario' => $nombre_usuario,
        'pass' => $password,
    )
);
header('Location: ../usuariosR.php');

