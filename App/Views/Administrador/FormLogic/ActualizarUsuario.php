<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idUsuario'];
    $departamento = $_POST['Departamento'];
    $municipio = $_POST['Municipio'];
    $direccion = $_POST['Direccion'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $contrasenia = $_POST['Contrasenia'];

    $sql = "UPDATE usuario SET departamentoUsuario='".$departamento."',
                                  municipioUsuario='".$municipio."',
                                  direccionUsuario='".$direccion."',
                                  telefonoUsuario='".$telefono."',
                                  correoUsuario='".$correo."',
                                  contraseniaUsuario='".$contrasenia."'
                                  WHERE idUsuario = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorUsuarios.php");
      }                           
    

?>