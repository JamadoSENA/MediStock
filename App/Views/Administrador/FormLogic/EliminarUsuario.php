<?php 

require '../../../../Config/DataBase.php';

    $Id = $_GET['Id'];
    $sql = "DELETE FROM users WHERE idUser ='$Id'";

    $query = mysqli_query($conexion, $sql);
    if ($query === TRUE) {
        header("location:../AdministradorUsuarios.php");
      }                           
    

?>