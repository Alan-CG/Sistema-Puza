<?php 
if (!empty($_POST["btnlogin"])) {
    if (empty($_POST["input_usuario"]) and empty($_POST["input_password"])) {
        echo '<div class="alert alert-danger" >Los campos están vacíos</div>';
    } else {
       $usuario=$_POST["input_usuario"];
       $pass=$_POST["input_password"];
       $sql = $conexion->query("SELECT * FROM usuario WHERE Nombre_usuario='$usuario' AND Contraseña='$pass' AND EstadoUsuario=1");
       if ($datos=$sql->fetch_object()) {
        $variable_usuario=$conexion->query("SELECT IDtipousuario FROM usuario WHERE Nombre_usuario='$usuario' AND Contraseña='$pass'");
        $variable_usuario_valor=$variable_usuario->fetch_column();
        session_start();
        $_SESSION['rol_usuario']=$variable_usuario_valor;
        header("location:menu.php");
       } else {
        echo '<div class="alert alert-danger">Acceso Denegado</div>';
       }
       
    }
    
}



?>