<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idMedicine'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];

    $sql = "UPDATE medicines SET   stock='".$cantidad."',
                                  state='".$estado."'
                                  WHERE idMedicine = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorProductos.php");
      }                           
    

?>