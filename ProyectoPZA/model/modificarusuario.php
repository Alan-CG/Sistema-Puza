<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'bd_puza';
$usuarioDB = 'root';
$contrasenyaDB = '';

$codigo = isset($_REQUEST['IDusuario']) ? $_REQUEST['IDusuario'] : null;
$nombre = isset($_REQUEST['input_nombre']) ? $_REQUEST['input_nombre'] : null;
$nombre_usuario = isset($_REQUEST['input_nombre_usuario']) ? $_REQUEST['input_nombre_usuario'] : null;
$password = isset($_REQUEST['input_password']) ? $_REQUEST['input_password'] : null;
$rol_usuario = isset($_REQUEST['input_tipo']) ? $_REQUEST['input_tipo'] : null;


// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE usuario 
    SET IDtipousuario=:rol_usuario,Nombre = :Nombre, Nombre_usuario = :Nombre_usuario, 
    Contraseña = :pass WHERE IDusuario = :idusuario');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'rol_usuario' => $rol_usuario,
            'Nombre'=>$nombre,
            'Nombre_usuario' => $nombre_usuario,
            'pass' => $password,
            'idusuario'=>$codigo
        ]
    );
    // Redireccionamos a Leer
    header('Location: ../usuariosR.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM usuario WHERE IDusuario = :IDusuario;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            'IDusuario' => $codigo
        ]
    );
}





// Obtiene un resultado
$usuario = $miConsulta->fetch();

?>