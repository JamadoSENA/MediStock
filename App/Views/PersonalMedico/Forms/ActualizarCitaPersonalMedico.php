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
    <span class="fs-4">Personal Medico</span>
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
        <h4 class="mb-3">Actualizacion de Cita 
        <a href="../PersonalMedicoCitas.php"><button class="btn btn-lg float-end custom-btn btn-secondary" type="submit"
            style="font-size: 15px; margin-right: 5px;">Cancelar</button></a>
        </h4>
      </div>
      <br>
      <?php
            
            include ('../../../../Config/DataBase.php');
            
            $sql = "SELECT * FROM schedulings WHERE idScheduling=".$_GET['idScheduling'];
            $resultado = $conexion->query($sql);
            $row = $resultado->fetch_assoc();
            
      ?>
      <div class="col-12 custom-form vh-80">
      <form id="ActualizacionCita" class="needs-validation" method="post" 
      action="../FormLogic/ActualizarCita.php" novalidate>
      <input type="hidden" class="form-control" name="idScheduling" value="<?php echo $row['idScheduling'] ?>">
          <div class="row g-3">
            <div class="col-sm-6">
            <label id="nombreProveedor" for="text" class="form-label">Estado</label>
              <input name="Estado" type="text" class="form-control" 
              value="<?php echo $row['stateS']?>" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un estado válido.
            </div>
            <div class="col-sm-6">
            <label id="direccionProveedor" for="date" class="form-label">Fecha</label>
            <input name="Fecha" type="date" class="form-control"
            value="<?php echo $row['dateS']?>" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una fecha válida.
            </div>
            <div class="col-sm-6">
            <label id="telefonoProveedor" for="text" class="form-label">Hora</label>
            <input name="Hora" type="text" class="form-control"
            value="<?php echo $row['hourSS']?>" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una hora válida.
            </div>
            </div>
            <div class="py-4">
            <button class="btn btn-success float-end custom-btn" style="font-size: 15px;"
              type="submit">Actualizar Cita</button>
            </div>
            </div>
            </form>
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
<script src="../../Recursos/js/Administrador.js"></script>
</body>


</html>