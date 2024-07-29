<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idScheduling'];
    $estado = $_POST['Estado'];
    $fecha = $_POST['Fecha'];    
    $hora = $_POST['Hora'];

    $sql = "UPDATE schedulings SET  stateS='".$estado."',
                                  dateS='".$fecha."',
                                  hourS='".$hora."',
                                  WHERE idScheduling = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../PersonalMedicoCitas.php");
      }                           
    

?>