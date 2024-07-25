<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idUser'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];    
    $correo = $_POST['Correo'];
    $contrasenia = $_POST['Contrasenia'];

    $sql = "UPDATE users SET      phoneNumber='".$telefono."',
                                  addressU='".$direccion."',
                                  email='".$correo."',
                                  passwordU='".$contrasenia."'
                                  WHERE idUser = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorUsuarios.php");
      }                           
    

?>