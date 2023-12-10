<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST (para AJAX)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $cedula = $_POST["Cedula"];
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["Apellido"];
    $fechaNacimiento = $_POST["FechaNacimiento"];
    $edad = $_POST["Edad"];
    $departamento = $_POST["Departamento"];
    $municipio = $_POST["Municipio"];
    $direccion = $_POST["Direccion"];
    $profesion = $_POST["Profesion"];
    $telefono = $_POST["Telefono"];
    $correo = $_POST["Correo"];
    $contrasenia = $_POST["Contrasenia"];
    $rol = $_POST["Rol"];

    // Consulta para verificar si el usuario ya existe
    $consulta_usuario = $conexion->prepare("SELECT idUsuario FROM usuario WHERE idUsuario = ?");
    $consulta_usuario->bind_param("i", $cedula);
    $consulta_usuario->execute();
    $resultado = $consulta_usuario->get_result();

    if ($resultado->num_rows > 0) {
        echo "2"; // El usuario ya existe
    } else {
        // Preparar la consulta de inserción
        $insert_usuario = $conexion->prepare("CALL CrearUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_usuario->bind_param("isssisssssssi", $cedula, $nombre, $apellido, $fechaNacimiento, $edad, $departamento, 
            $municipio, $direccion, $profesion, $telefono, $correo, $contrasenia, $rol);

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
