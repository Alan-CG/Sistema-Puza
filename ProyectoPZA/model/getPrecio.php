<?php 
require 'consultacotiza.php';

$idproducto = $mysqli->real_escape_string($_POST['IDproducto']);

$sql = "SELECT PrecioProducto FROM productos WHERE IDproducto = $idproducto";
$resultado= $mysqli->query($sql);

$respuesta = "<input value=''>";

while($row=$resultado->fetch_assoc()){
    //$respuesta.="<option value='" .$row['PrecioProducto']. "'>" .$row['PrecioProducto']. "</option>";
    $respuesta.="<input value='" .$row['PrecioProducto']. "'>";
}

echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);