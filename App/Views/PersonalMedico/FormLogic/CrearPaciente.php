<?php

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

    // Consulta para verificar si el usuario ya existe
    $consulta_paciente = $conexion->prepare("SELECT idPatient FROM patients WHERE idPatient = ?");
    $consulta_paciente->bind_param("i", $cedula);
    $consulta_paciente->execute();
    $resultado = $consulta_paciente->get_result();

    if ($resultado->num_rows > 0) {
        echo "2"; // El usuario ya existe
    } else {
        // Preparar la consulta de inserción
        $insert_paciente = $conexion->prepare("CALL INSERTARPACIENTE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_paciente->bind_param("issssssssss", $cedula, $tipoDocumento, $nombre, $apellido,
        $fechaNacimiento, $edad, $genero, $telefono, $profesion, $direccion, 
        $correo);

        // Ejecutar la consulta de inserción
        if ($insert_paciente->execute()) {
            echo 1;
            header("location:PersonalMedicoPacientes.php");
        } else {
            echo "0"; // Error al crear el usuario
        }

        // Cerrar la consulta de inserción
        $insert_paciente->close();
    }

    // Cerrar la consulta de verificación de usuario
    $consulta_usuario->close();
} else {
    // Si los datos del formulario están incompletos o se accede directamente al archivo PHP, puedes manejarlo aquí.
    echo "Error: Acceso inválido.";
}
?>
