<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idPatient'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];    
    $correo = $_POST['Correo'];

    $sql = "UPDATE patients SET    phoneNumber='".$telefono."',
                                  addressP='".$direccion."',
                                  email='".$correo."',
                                  WHERE idPatient = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../PersonalMedicoPacientes.php");
      }                           
    

?>