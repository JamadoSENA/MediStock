<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idProveedor'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];
    $correo = $_POST['Correo'];

    $sql = "UPDATE proveedor SET  direccionProveedor='".$direccion."',
                                  telefonoProveedor='".$telefono."',
                                  correoProveedor='".$correo."'
                                  WHERE idSupplier = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorProveedores.php");
      }                           
    

?>