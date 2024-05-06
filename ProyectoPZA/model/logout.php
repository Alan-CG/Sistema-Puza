<?php 

session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir a la página de inicio o a otra página
header("Location: ../index.php");