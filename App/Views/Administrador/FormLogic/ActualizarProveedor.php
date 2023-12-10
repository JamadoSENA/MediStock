<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idProveedor'];
    $nombre = $_POST['nombreProveedor'];
    $departamento = $_POST['departamentoProveedor'];
    $municipio = $_POST['municipioProveedor'];
    $direccion = $_POST['direccionProveedor'];
    $telefono = $_POST['telefonoProveedor'];
    $correo = $_POST['correoProveedor'];

    $sql = "UPDATE proveedor SET nombreProveedor='".$nombre."',
                                  departamentoProveedor='".$departamento."',
                                  municipioProveedor='".$municipio."',
                                  direccionProveedor='".$direccion."',
                                  telefonoProveedor='".$telefono."',
                                  correoProveedor='".$correo."'
                                  WHERE idProveedor = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorProveedores.php");
      }                           
    

?>