<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idUsuario'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];    
    $correo = $_POST['Correo'];
    $contrasenia = $_POST['Contrasenia'];
    $rol = $_POST['Rol'];

    $sql = "UPDATE users SET      phoneNumber='".$telefono."',
                                  address='".$direccion."',
                                  email='".$correo."',
                                  password='".$contrasenia."',
                                  fkIdRole='".$rol."'
                                  WHERE idUser = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorUsuarios.php");
      }                           
    

?>