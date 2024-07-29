<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $razon = $_POST["Razon"];
    $estado = $_POST["Estado"];
    $fecha = $_POST["Fecha"];
    $hora = $_POST["Hora"];
    $paciente = $_POST["Paciente"];
    $medico = $_POST["Medico"];

    $insert_cita = $conexion->prepare("CALL INSERTARCITA(?, ?, ?, ?, ?, ?)");
    $insert_cita->bind_param("ssssii", $razon, $estado, $fecha, $hora, $paciente, $medico);

        // Ejecutar la consulta de inserción
        if ($insert_cita->execute()) {
            header("location:../PersonalMedicoCitas.php");
        } 
        // Cerrar la consulta de inserción
        $insert_cita->close();

} 

?>
