<?php

require '../../../../Config/DataBase.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Obtener datos del formulario
    $documento = $_POST["documentoPaciente"];
    $nombre = $_POST["nombrePaciente"];
    $apellido = $_POST["apellidoPaciente"];
    $fechaNacimiento = $_POST["fechaNacimientoPaciente"];
    $edad = $_POST["edadPaciente"];
    $motivo = $_POST["motivoCita"];
    $tipo = $_POST["tipoCita"];
    $notas = $_POST["notasMedico"];
    $medico = $_POST["medico"];    

    $insert_cita = $conexion->prepare("CALL CrearCitaMedica (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insert_cita->bind_param("isssisssi", $documento, $nombre, $apellido, 
    $fechaNacimiento, $edad, $motivo, $tipo, $notas, $medico);

    // Después de insertar la cita correctamente
    if ($insert_cita->execute()) {
        $id_cita = $insert_cita->insert_id;
    
        if (isset($_POST["producto"]) && isset($_POST["cantidadProducto"])) {
            $cantidad = $_POST["cantidadProducto"];
            $producto = $_POST["producto"];
            
            if (isset($cantidad) && is_array($producto) && count($cantidad) === count($producto)) {
                foreach ($producto as $index => $id_producto) {
                    $cantidad_producto = $cantidad[$index];
                    $insert_intermedia = $conexion->prepare("CALL AñadirProductosCita (?, ?, ?)");
                    $insert_intermedia->bind_param("iii", $cantidad_producto, $id_cita, $id_producto);
                    $insert_intermedia->execute();
                }
            } else {
                echo "2"; // Error
            }
            header("location:../PersonalMedicoCitas.php"); // Éxito al agregar

        } else {

    echo "2"; // Error al agregar 

}

    $insert_cita->close();
} }

mysqli_close($conexion);

?>