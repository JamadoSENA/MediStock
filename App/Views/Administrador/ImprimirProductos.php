<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

  header("Location: ../../LogIn.php");
  die();
  
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MediStock</title>
  <link rel="shortcut icon" href="../../Recursos/img/LogoHeadMediStock.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../Recursos/css/Administrador.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
</head>



<body style="height: 100vh; display: flex; flex-direction: column; overflow: hidden;">
<div class="row justify-content-center">
  <div class="col-9 border-left custom-form">
    <br>
    <div>
      <h4 class="mb-3">Dashboard de Productos
        <a href="AdministradorProductos.php">
          <button class="btn btn-lg float-end custom-btn btn-secondary" type="submit" style="font-size: 15px; margin-right: 5px;">Regresar</button>
        </a>
        <a href="AdministradorProductos.php" onclick="window.print()">
          <button class="btn btn-lg float-end custom-btn btn-success" type="submit" style="font-size: 15px; margin-right: 5px;">Imprimir</button>
        </a>
      </h4>
      <br>
      <div class="table-container">
        <table id="tablaProductos" class="table table-striped table-hover sticky-header">
          <caption>Esta tabla muestra los productos registrados.</caption>
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Fecha Caducidad</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Estado</th>
              <th scope="col">Proveedor</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("../../../Config/DataBase.php");
            $sql = $conexion->query("SELECT * from producto
            INNER JOIN proveedor ON producto.fk_id_proveedor = proveedor.idProveedor 
            ORDER BY fechaRegistroProducto DESC");
            while ($resultado = $sql->fetch_assoc()){
            ?>
            <tr>
              <td scope="row"><?php echo $resultado ['nombreProducto']?></td>
              <td scope="row"><?php echo $resultado ['fechaCaducidadProducto']?></td>
              <td scope="row"><?php echo $resultado ['cantidadProducto']?></td>
              <td scope="row"><?php echo $resultado ['estadoProducto']?></td>
              <td scope="row"><?php echo $resultado ['nombreProveedor']?></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<style>
  .table-container {
    margin: 1px; /* Centra el contenedor horizontalmente */
  }
</style>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="../../Recursos/js/Administrador.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var tabla = $('#tablaProductos').DataTable({
      "language": {
        "search": "Buscar:",
        "lengthMenu": "Mostrar _MENU_ entradas por página",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de _MAX_ entradas totales)",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    });

    $('#tablaProductos thead th').each(function() {
      var titulo = $(this).text();
      $(this).html('<input type="text" placeholder="Buscar ' + titulo + '" />');
    });

    tabla.columns().every(function() {
      var that = this;

      $('input', this.header()).on('keyup change', function() {
        if (that.search() !== this.value) {
          that
            .search(this.value)
            .draw();
        }
      });
    });
  });
</script>

</body>


</html>