<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idProducto'];
    $nombre = $_POST['nombreProducto'];
    $descripcion = $_POST['descripcionProducto'];
    $indicaciones = $_POST['indicacionesProducto'];
    $fechaCaducidad = $_POST['fechaCaducidadProducto'];
    $cantidad = $_POST['cantidadProducto'];
    $estado = $_POST['estadoProducto'];

    $sql = "UPDATE producto SET nombreProducto='".$nombre."',
                                  descripcionProducto='".$descripcion."',
                                  indicacionesProducto='".$indicaciones."',
                                  fechaCaducidadProducto='".$fechaCaducidad."',
                                  cantidadProducto='".$cantidad."',
                                  estadoProducto='".$estado."'
                                  WHERE idProducto = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorProductos.php");
      }                           
    

?>