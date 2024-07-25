<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $nit = $_POST["NIT"];
    $nombre = $_POST["Nombre"];
    $direccion = $_POST["Direccion"];
    $telefono = $_POST["Telefono"];
    $correo = $_POST["Correo"];

    $insert_proveedor = $conexion->prepare("CALL INSERTARPROVEEDOR(?, ?, ?, ?, ?)");
    $insert_proveedor->bind_param("issss", $nit, $nombre, $direccion, $correo, $telefono);

        // Ejecutar la consulta de inserción
        if ($insert_proveedor->execute()) {
            header("location:../AdministradorProveedores.php");
        } 
        // Cerrar la consulta de inserción
        $insert_proveedor->close();

} 

?>
