<?php
// Requerir el archivo de conexión
require '../../../../Config/DataBase.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $descripcion = $_POST["Descripcion"];
    $medicamentos = $_POST["Medicamentos"];
    $formulario = $_POST["Formulario"];
    $citaId = $_POST["CitaID"];

    $insert_prescripcion = $conexion->prepare("CALL INSERTARPRESCRIPCION(?, ?, ?, ?)");
    $insert_prescripcion->bind_param("sssi", $descripcion, $medicamentos, $formulario, $citaId);

        // Ejecutar la consulta de inserción
        if ($insert_prescripcion->execute()) {
            header("location:../PersonalMedicoPrescripciones.php");
        } 
        // Cerrar la consulta de inserción
        $insert_prescripcion->close();

} 

?>
