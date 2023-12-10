<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["Nombre"];
    $descripcion = $_POST["Descripcion"];
    $indicaciones = $_POST["Indicaciones"];
    $fechaCaducidad = $_POST["FechaCaducidad"];
    $cantidad = $_POST["Cantidad"];
    $estado = $_POST["Estado"];
    $proveedor = $_POST["Proveedor"];

    $insert_producto = $conexion->prepare("CALL CrearProducto(?, ?, ?, ?, ?, ?, ?)");
    $insert_producto->bind_param("ssssisi", $nombre, $descripcion, $indicaciones, $fechaCaducidad,
    $cantidad, $estado, $proveedor);

        // Ejecutar la consulta de inserción
        if ($insert_producto->execute()) {
            header("location:../AdministradorProductos.php");
        } 
        // Cerrar la consulta de inserción
        $insert_producto->close();

} 

?>
