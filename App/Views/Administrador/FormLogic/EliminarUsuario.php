<?php 

require '../../../../Config/DataBase.php';

    $Id = $_GET['Id'];
    $sql = "DELETE FROM usuario WHERE idUsuario ='$Id'";

    $query = mysqli_query($conexion, $sql);
    if ($query === TRUE) {
        header("location:../AdministradorUsuarios.php");
      }                           
    

?>