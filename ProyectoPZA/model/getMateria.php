<?php 
require 'consultacompra_select.php';

$idproveedor = $mysqli->real_escape_string($_POST['IDproveedor']);

$sql = "SELECT IDmateriaprima,NombreMateria FROM materias_primas WHERE IDproveedor = $idproveedor";
$resultado= $mysqli->query($sql);

$respuesta = "<option value=''></option>";

while($row=$resultado->fetch_assoc()){
    $respuesta.="<option value='" .$row['IDmateriaprima']. "'>" .$row['NombreMateria']. "</option>";
}

echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);