<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $nit = $_POST["NIT"];
    $nombre = $_POST["Nombre"];
    $direccion = $_POST["Direccion"];
    $correo = $_POST["Correo"];
    $telefono = $_POST["Telefono"];
    $producto = $_POST["Producto"];

    $insert_proveedor = $conexion->prepare("CALL CrearProveedor(?, ?, ?, ?, ?, ?)");
    $insert_proveedor->bind_param("issssi", $nit, $nombre, $direccion, $telefono, $correo, $producto);

        // Ejecutar la consulta de inserción
        if ($insert_proveedor->execute()) {
            header("location:../AdministradorProveedores.php");
        } 
        // Cerrar la consulta de inserción
        $insert_proveedor->close();

} 

?>
