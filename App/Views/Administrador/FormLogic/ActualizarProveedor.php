<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idProveedor'];
    $direccion = $_POST['Direccion'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Telefono'];

    $sql = "UPDATE suppliers SET  addressSU='".$direccion."',
                                  email='".$correo."',
                                  phoneNumber='".$telefono."'
                                  WHERE idSupplier = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorProveedores.php");
      }                           
    

?>