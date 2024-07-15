<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST (para AJAX)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $cedula = $_POST["Cedula"];
    $tipoDocumento = $_POST["TipoDocumento"];
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["Apellido"];
    $fechaNacimiento = $_POST["FechaNacimiento"];
    $edad = $_POST["Edad"];
    $genero = $_POST["Genero"];
    $telefono = $_POST["Telefono"];
    $profesion = $_POST["Profesion"];
    $direccion = $_POST["Direccion"];    
    $correo = $_POST["Correo"];
    $contrasenia = $_POST["Contrasenia"];
    $rol = $_POST["Rol"];

    // Consulta para verificar si el usuario ya existe
    $consulta_usuario = $conexion->prepare("SELECT idUser FROM users WHERE idUser = ?");
    $consulta_usuario->bind_param("i", $cedula);
    $consulta_usuario->execute();
    $resultado = $consulta_usuario->get_result();

    if ($resultado->num_rows > 0) {
        echo "2"; // El usuario ya existe
    } else {
        // Preparar la consulta de inserción
        $insert_usuario = $conexion->prepare("CALL CrearUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_usuario->bind_param("isssssssssssi", $cedula, $tipoDocumento, $nombre, $apellido,
        $fechaNacimiento, $edad, $genero, $telefono, $profesion, $direccion, 
        $correo, $contrasenia, $rol);

        // Ejecutar la consulta de inserción
        if ($insert_usuario->execute()) {
            echo 1;
            header("location:../AdministradorUsuarios.php");
        } else {
            echo "0"; // Error al crear el usuario
        }

        // Cerrar la consulta de inserción
        $insert_usuario->close();
    }

    // Cerrar la consulta de verificación de usuario
    $consulta_usuario->close();
} else {
    // Si los datos del formulario están incompletos o se accede directamente al archivo PHP, puedes manejarlo aquí.
    echo "Error: Acceso inválido.";
}
?>
