<?php

require '../../../../Config/DataBase.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Obtener datos del formulario
    $nombre = $_POST["ProyectoNombre"];
    $municipio = $_POST["ProyectoMunicipio"];
    $direccion = $_POST["ProyectoDireccion"];
    $descripcion = $_POST["ProyectoDescripcion"];
    $cliente = $_POST["ProyectoCliente"];

    $insert_cita = $conectar->prepare("INSERT INTO ga_proyecto (proNombre, proMunicipio, proDireccion, proDescripcion, fk_id_cliente) 
    VALUES (?, ?, ?, ?, ?)");
    $insert_proyecto->bind_param("ssssi", $nombre, $municipio, $direccion, $descripcion, $cliente);

    // Después de insertar el proyecto principal correctamente
if ($insert_proyecto->execute()) {
    $id_proyecto = $insert_proyecto->insert_id;

    // Insertar usuarios seleccionados en la tabla intermedia
    if (isset($_POST["usuarios_proyecto"]) && is_array($_POST["usuarios_proyecto"])) {
        $usuarios_asignados = $_POST["usuarios_proyecto"];
        foreach ($usuarios_asignados as $id_usuario) {
            $insert_intermedia = $conectar->prepare("INSERT INTO usuarios_proyectos (fk_id_usuario, fk_id_proyecto) VALUES (?, ?)");
            $insert_intermedia->bind_param("ii", $id_usuario, $id_proyecto);
            $insert_intermedia->execute();
        }
    }

    echo "1"; // Éxito al agregar el proyecto
} else {
    echo "2"; // Error al agregar el proyecto
}

    $insert_proyecto->close();
} else {
    echo "Error: Datos de formulario incompletos.";
}

mysqli_close($conectar);

?>