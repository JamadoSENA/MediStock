<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

  header("Location: ../../../LogIn.php");
  die();
  
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MediStock</title>
  <link rel="shortcut icon" href="../../../Recursos/img/LogoHeadMediStock.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../Recursos/css/Administrador.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
</head>

<header class="p-3" style="background-color: #000000; height: 150px; overflow-y: hidden;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
      <div class="col-6 col-lg-6 d-flex justify-content-lg-start mt-3 mt-lg-0">
        <img src="../../../Recursos/img/LogoHeaderMediStock.png" alt="Logo MediStock" width="auto" height="80"
          style="margin-top: 4%; margin-bottom: 20%;" />
      </div>
      <div class="col-6 col-lg-6 d-flex justify-content-end mt-3 mt-lg-0">
        <a type="button" class="btn btn-dark" href="../../../LogIn.php"
        style="margin-top: 4%; margin-bottom: 20%; margin-right:20px;">Perfil</a>
        <a type="button" class="btn btn-secondary" href="../../../../Config/SignOut.php"
        style="margin-top: 4%; margin-bottom: 20%;">Cerrar sesion</a>
      </div>
    </div>
  </div>
</header>

<body style="height: 100vh; display: flex; flex-direction: column; overflow: hidden;">
  <div class="row flex-grow-1">
  <div class="col-lg-2 d-flex flex-column flex-shrink-0 p-3 text-bg-white" style="width: 280px;">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" viewBox="0 0 24 24">
    </svg>
    <span class="fs-4">Administrador</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="PersonalMedicoCitas.php" class="nav-link text-dark">
          <svg class="bi bi-people me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Citas Medicas
        </a>
      </li>
      <li>
        <a href="PersonalMedicoPacientes.php" class="nav-link text-dark">
          <svg class="bi bi-card-checklist me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Pacientes
        </a>
      </li>
      <li>
        <a href="PersonalMedicoPrescripciones.php" class="nav-link text-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Prescripciones
        </a>
      </li>
    </ul>
  </div>
  <div class="col-9 border-left custom-form">
      <br>
      <div>
        <h4 class="mb-3">Detalles Paciente
        </h4>
      </div>
      <div class="col-12 custom-form vh-80">
      <?php
            
            include ('../../../../Config/DataBase.php');
            
            $sql = "SELECT * FROM schedulings WHERE idScheduling=".$_GET['idScheduling'];
            $resultado = $conexion->query($sql);
            $row = $resultado->fetch_assoc();
            
      ?>
      <input type="hidden" class="form-control" name="idScheduling" value="<?php echo $row['idScheduling'] ?>">
      <div class="row g-3">
      <div class="col-sm-6">
      <label id="documentoUsuario" for="document" class="form-label">Numero de Cita</label>
      <input name="documentoUsuario" type="number" class="form-control" 
       value="<?php echo $row['idScheduling']?>" disabled readonly>
      </div>
      <div class="col-sm-6">
      <label id="tipoDocumentoUsuario" for="text" class="form-label">Razon</label>
      <input name="tipoDocumentoUsuario" type="text" class="form-control" 
       value="<?php echo $row['reason']?>" disabled readonly>
      </div>
      <div class="col-sm-6">
      <label id="nombreUsuario" for="name" class="form-label">Estado</label>
      <input name="nombreUsuario" type="text" class="form-control" 
       value="<?php echo $row['stateS']?>" disabled readonly>
      </div>
      <div class="col-sm-6">
      <label id="apellidoUsuario" for="text" class="form-label">Fecha</label>
      <input name="apellidoUsuario" type="text" class="form-control" 
       value="<?php echo $row['dateS']?>" disabled readonly>
      </div>
      
      <div class="col-sm-6">
      <label id="fechaNacimientoUsuario" for="text" class="form-label">Hora</label>
      <input name="fechaNacimientoUsuario" type="text" class="form-control" 
       value="<?php echo $row['hourSS']?>" disabled readonly>
      </div>
      <?php
       require("../../../../Config/DataBase.php");

       $idScheduling = $_GET['idScheduling'];

       $sql = "SELECT u.nameU
       FROM users u
       INNER JOIN schedulings s ON u.idUser = s.fkIdDoctor
       WHERE s.idScheduling = $idScheduling";

       $resultado = $conexion->query($sql);

       if ($resultado->num_rows > 0) {
       $row = $resultado->fetch_assoc();
       $nombreMedico = $row['nameU'];

       ?>
       <div class="col-sm-3">
       <label id="correo" class="form-label">Medico</label>
       <input name="" type="text" class="form-control" value="<?php echo $nombreMedico ?>" 
       disabled readonly>
       </div>
       <?php
       } else {
           echo "No se encontró el medico para esta cita.";
       }
       ?>
       <?php
       require("../../../../Config/DataBase.php");

       $idPatient = $_GET['idPatient'];

       $sql = "SELECT p.nameP
       FROM patients p
       INNER JOIN schedulings s ON p.idPatient = s.fkIdPatient
       WHERE s.idScheduling = $idScheduling";

       $resultado = $conexion->query($sql);

       if ($resultado->num_rows > 0) {
       $row = $resultado->fetch_assoc();
       $nombrePaciente = $row['nameP'];
       ?>
       <div class="col-sm-3">
       <label id="correo" class="form-label">Paciente</label>
       <input name="" type="text" class="form-control" value="<?php echo $nombrePaciente ?>" 
       disabled readonly>
       </div>
       <?php
       } else {
           echo "No se encontró el paciente para esta cita.";
       }
       ?>
      <div class="py-4">
        <a class="btn btn-secondary float-end custom-btn" style="font-size: 15px;"
        href="../PersonalMedicoCitas.php">Volver</a>
      </div>
      </div>
      </div>
      </div>
      </div>
    </div>
  </div>
  </div>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="../../../Recursos/js/Administrador.js"></script>
</body>


</html>