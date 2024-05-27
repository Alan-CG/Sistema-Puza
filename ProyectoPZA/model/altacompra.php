<?php
// Variables Conexión BD
$hostDB = 'localhost';
$nombreDB = 'id22222611_bd_puza';
$usuarioDB = 'id22222611_codebreaker';
$contrasenyaDB = 'PmW00Bn61Auy@';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));

//Variables para la tabla registro_compra
$folio_compra=$_POST['input_folio'];
$idproveedor=$_POST['input_proveedor'];
$fecha=$_POST['input_Fecha'];
$total_compra=0;
$estado_compra=0;

//variables para la tabla compras_materias
$idmateria=$_POST['input_matprim'];
$cantidad=$_POST['input_cantidad'];


$miInsert = $miPDO->prepare('INSERT INTO registro_compra (Folio,ID_proveedor,Fecha_Entrada,Total_compra,Estado_Compra) 
VALUES (:folio,:idproveedor,:fecha,:total,:estadocompra)');

// Ejecuta INSERT con los datos
$miInsert->execute(
    array(
        'folio' => $folio_compra,
        'idproveedor' => $idproveedor,
        'fecha'=>$fecha,
        'total'=>$total_compra,
        'estadocompra'=>$estado_compra,
    )
);

//Recupero el ID del ultimo insert
$idcompra=$miPDO->lastInsertId();

//Se convierte el array de id materias en String
$materiales_string = implode(",", $idmateria);

//Preparo el insert para la lista de materias compradas
$lista_query = "INSERT INTO compras_materias (IDregistro_compra,ID_Materia,Cantidad_Compra) VALUES (:idregistro,:idmateria,:cantidad)";
$miInsertLista = $miPDO->prepare($lista_query);

try {
    foreach ($_POST['input_matprim'] as $index => $materia_prima_id) {
        $cantidad_comprada = $_POST['input_cantidad'][$index];
        
        // Ejecuta INSERT para cada materia prima con su respectiva cantidad
        $miInsertLista->execute([
            'idregistro' => $idcompra,
            'idmateria' => $materia_prima_id,
            'cantidad' => $cantidad_comprada,
        ]);

        //A partir de aquí empieza la parte de calculo del total

        //Esta primer Query se encarga de consultar el costo de la materia prima teniendo en cuenta el ID de la materia prima

        $costo_materia = $miPDO->prepare('SELECT CostoMateria FROM materias_primas 
        WHERE IDmateriaprima = :idmateriaprima');
        $costo_materia->execute([
            'idmateriaprima'=>$materia_prima_id
        ]);
        
        //La siguiente línea transforma la consulta $costomateria en tipo número para poder hacer despues la operación
        $costo_materia_valor = $costo_materia->fetchColumn();

        //En esta línea se crea una variable para hacer la operación
        $total_parcial= $costo_materia_valor * $cantidad_comprada;
        //La siguiente variable va sumando los resultados de cada operación para ir actualizando en la base de datos el dato
        $total_final=$total_final+$total_parcial;


        //La siguiente consulta se encarga de actualizar el campo de PrecioCosto con el resultado de la variable anterior $costo_final
        $miupdate=$miPDO->prepare('UPDATE registro_compra SET Total_compra = :calculocompra 
        WHERE IDRegistro_compra = :idcompra');
        $miupdate->execute([
            'calculocompra'=>$total_final,
            'idcompra'=>$idcompra
        ]);


        
    }

} catch (PDOException $e) {
    echo "Error al insertar en la formula: " . $e->getMessage();
}
































header('Location: ../comprasR.php');