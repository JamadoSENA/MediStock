<?php 

require '../../../../Config/DataBase.php';

    $Id = $_GET['Id'];
    $sql = "DELETE FROM prescriptions WHERE idPrescription ='$Id'";

    $query = mysqli_query($conexion, $sql);
    if ($query === TRUE) {
        header("location:../PersonalMedicoPrescripciones.php");
      }                           
    

?>