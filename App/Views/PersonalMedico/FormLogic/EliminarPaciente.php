<?php 

require '../../../../Config/DataBase.php';

    $Id = $_GET['Id'];
    $sql = "DELETE FROM patients WHERE idPatient ='$Id'";

    $query = mysqli_query($conexion, $sql);
    if ($query === TRUE) {
        header("location:../PersonalMedicoPacientes.php");
      }                           
    

?>