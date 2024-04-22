<?php 
require 'consultacompra_select.php';

$idmateria = $mysqli->real_escape_string($_POST['IDmateriaprima']);
echo $idmateria;

$sql = "SELECT CostoMateria FROM materias_primas WHERE IDmateriaprima = $idmateria";
$resultado= $mysqli->query($sql);

$respuesta = "<option value=''></option>";

while($row=$resultado->fetch_assoc()){
    $respuesta.="<option value='" .$row['CostoMateria']. "'>" .$row['CostoMateria']. "</option>";
}

echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);