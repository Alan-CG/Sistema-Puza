<?php 
require 'consultacompra_select.php';

$idproveedor = $mysqli->real_escape_string($_GET['select1']);

$sql = "SELECT IDmateriaprima,NombreMateria FROM materias_primas WHERE IDproveedor = $idproveedor";
$resultado= $mysqli->query($sql);

$opciones = [];
while ($row = $resultado->fetch_assoc()) {
    $opciones[] = $row;
}

echo json_encode($opciones,JSON_UNESCAPED_UNICODE);