<?php 

require '../../../../Config/DataBase.php';

    $Id = $_GET['Id'];
    $sql = "DELETE FROM schedulings WHERE idScheduling ='$Id'";

    $query = mysqli_query($conexion, $sql);
    if ($query === TRUE) {
        header("location:../PersonalMedicoCitas.php");
      }                           
    

?>