<?php 

require '../../../../Config/DataBase.php';

    $id = $_POST['idMedicine'];
    $nombre = $_POST['nombre'];
    $formato = $_POST['formato'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE medicines SET  nameM='".$nombre."',
                                  formatM='".$formato."',
                                  stock='".$cantidad."',  
                                  stateM='".$estado."',
                                  category='".$categoria."'
                                  WHERE idMedicine = ".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../AdministradorProductos.php");
      }                           
    

?>