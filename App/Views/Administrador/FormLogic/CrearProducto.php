<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["Nombre"];
    $formato = $_POST["Formato"];
    $cantidad = $_POST["Cantidad"];
    $estado = $_POST["Estado"];
    $fechaCaducidad = $_POST["FechaCaducidad"];
    $categoria =  $_POST["Categoria"];
    $proveedor = $_POST["Proveedor"];

    $insert_producto = $conexion->prepare("CALL INSERTARMEDICINA(?, ?, ?, ?, ?, ?, ?)");
    $insert_producto->bind_param("ssssssi", $nombre, $formato, $cantidad, $estado,
    $fechaCaducidad, $categoria, $proveedor);

        // Ejecutar la consulta de inserción
        if ($insert_producto->execute()) {
            header("location:../AdministradorProductos.php");
        } 
        // Cerrar la consulta de inserción
        $insert_producto->close();

} 

?>
