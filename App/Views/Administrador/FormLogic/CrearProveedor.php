<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $nit = $_POST["NIT"];
    $nombre = $_POST["Nombre"];
    $departamento = $_POST["Departamento"];
    $municipio = $_POST["Municipio"];
    $direccion = $_POST["Direccion"];
    $telefono = $_POST["Telefono"];
    $correo = $_POST["Correo"];

    $insert_proveedor = $conexion->prepare("CALL CrearProveedor(?, ?, ?, ?, ?, ?, ?)");
    $insert_proveedor->bind_param("issssss", $nit, $nombre, $departamento, $municipio,
    $direccion, $telefono, $correo);

        // Ejecutar la consulta de inserción
        if ($insert_proveedor->execute()) {
            header("location:../AdministradorProveedores.php");
        } 
        // Cerrar la consulta de inserción
        $insert_proveedor->close();

} 

?>
