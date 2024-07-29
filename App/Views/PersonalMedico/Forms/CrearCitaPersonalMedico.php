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
  <link rel="stylesheet" href="../../../Recursos/css/Personal.css">
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
        <a href="../PersonalMedicoUsuarios.php" class="nav-link text-dark">
          <svg class="bi bi-people me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Usuarios
        </a>
      </li>
      <li>
        <a href="../PersonalMedicoProductos.php" class="nav-link text-dark">
          <svg class="bi bi-card-checklist me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Productos
        </a>
      </li>
      <li>
        <a href="../PersonalMedicoCitas.php" class="nav-link text-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Citas Medicas
        </a>
      </li>
    </ul>
  </div>
  <div class="col-9 border-left custom-form">
      <br>
      <div>
        <h4 class="mb-3">Registrar Cita Medica<a href="../PersonalMedicoCitas.php"><button class="btn btn-lg float-end custom-btn btn-secondary" type="submit"
            style="font-size: 15px; margin-right: 5px;">Cancelar</button></a>
        </h4>
      </div>
      <div class="col-12 custom-form vh-80">
      <form id="RegistroCitaMedica" class="needs-validation" method="post" 
      action="../FormLogic/CrearCita.php" novalidate>
      <div class="row g-3">
      <h6>Registro Paciente</h6>
      <div class="col-sm-6">
      <label id="documentoPaciente" for="document" class="form-label">Documento</label>
      <input name="documentoPaciente" type="number" class="form-control" 
       value="" required>
      </div>
      <div class="col-sm-3">
      <label id="nombrePaciente" for="name" class="form-label">Nombre</label>
      <input name="nombrePaciente" type="text" class="form-control" 
       value="" required>
      </div>
      <div class="col-sm-3">
      <label id="apellidoPaciente" for="name" class="form-label">Apellido</label>
      <input name="apellidoPaciente" type="text" class="form-control" 
       value="" required>
      </div>
      <div class="col-6">
            <label for="Nacimiento" class="form-label">Fecha de nacimiento</label>
            <div class="input-group has-validation">
              <input name="fechaNacimientoPaciente" type="date" class="form-control" id="FechaNacimiento"
                placeholder="Fecha de nacimiento" required>
              <div class="invalid-feedback">
                Se requiere una fecha válida.
              </div>
            </div>
          </div>
          <div class="col-6">
            <label for="Edad" class="form-label">Edad</label>
            <div class="input-group has-validation">
              <input name="edadPaciente" type="number" class="form-control" id="Edad" readonly required>
              <div class="invalid-feedback">
                Se requiere una edad válida.
              </div>
            </div>
          </div>
          <script>
            const inputFechaNacimiento = document.getElementById('FechaNacimiento');
            const inputEdad = document.getElementById('Edad');

            inputFechaNacimiento.addEventListener('input', function () {
              const fechaNacimiento = new Date(this.value);
              const fechaActual = new Date();

              if (isNaN(fechaNacimiento.getTime())) {
                // La fecha ingresada no es válida
                this.setCustomValidity('Se requiere una fecha válida.');
                this.parentElement.classList.add('was-validated');
              } else if (fechaNacimiento > fechaActual) {
                // La fecha ingresada es en el futuro
                this.setCustomValidity('La fecha de nacimiento no puede ser en el futuro.');
                this.parentElement.classList.add('was-validated');
              } else {
                // La fecha ingresada es válida
                this.setCustomValidity('');
                this.parentElement.classList.remove('was-validated');

                // Calcular edad
                const diff = fechaActual - fechaNacimiento;
                const edad = Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));
                inputEdad.value = edad;
              }
            });

            inputEdad.addEventListener('input', function () {
              const edad = parseInt(this.value);
              const fechaNacimiento = new Date(inputFechaNacimiento.value);
              const fechaLimite = new Date(fechaNacimiento);
              fechaLimite.setFullYear(fechaNacimiento.getFullYear() + edad);

              const fechaActual = new Date();

              if (isNaN(edad) || edad < 0) {
                // La edad ingresada no es válida
                this.setCustomValidity('Se requiere una edad válida.');
                this.parentElement.classList.add('was-validated');
              } else if (fechaLimite > fechaActual) {
                // La edad ingresada resulta en una fecha de nacimiento en el futuro
                this.setCustomValidity('La fecha de nacimiento resultante con esta edad sería en el futuro.');
                this.parentElement.classList.add('was-validated');
              } else {
                // La edad ingresada es válida
                this.setCustomValidity('');
                this.parentElement.classList.remove('was-validated');
              }
            });
            </script>
      <h6>Informacion Cita Medica</h6>
      <div class="col-sm-6">
      <label id="motivoCita" for="text" class="form-label">Motivo de la Cita</label>
      <input name="motivoCita" type="text" class="form-control" 
       value="" required>
      </div>
      <div class="col-sm-6">
      <label id="tipoCita" for="text" class="form-label">Tipo de la Cita</label>
      <select name="tipoCita" class="form-select" id="Tipo" required>
          <option value="">Elegir...</option>
          <option value="">Presencial...</option>
          <option value="">Virtual...</option>
      </select>
      </div>
      <div class="col-sm-6">
      <label id="notasMedico" for="text" class="form-label">Notas del Medico</label>
      <input name="notasMedico" type="text" class="form-control" 
       value="" required>
      </div>
      <div class="col-sm-3">
        <label for="producto" class="form-label">Implemento utilizado</label>
        <select name="producto" class="form-select" id="producto" required>
          <option value="">Elegir...</option>
          <?php
          include ("../../../../Config/DataBase.php");

          $sql = $conexion->query("SELECT * FROM producto ORDER BY nombreProducto ASC");
          while ($resultado = $sql->fetch_assoc()) {

          echo "<option value='".$resultado['idProducto']."'>".$resultado
          ['nombreProducto']."</option>";

          }
          ?>
        </select>
      </div>
    <div class="col-sm-3">
        <label id="cantidadProducto" class="form-label">Cantidad</label>
        <input name="cantidadProducto" type="number" class="form-control" value="" required>
    </div>
    <div class="col-sm-3">
        <label for="medico" class="form-label">Medico encargado</label>
        <select name="medico" class="form-select" id="medico" required>
          <option value="">Elegir...</option>
          <?php
          include ("../../../../Config/DataBase.php");

          $sql = $conexion->query("SELECT idUsuario, CONCAT(nombreUsuario, ' ', apellidoUsuario) 
          AS nombre_completo FROM usuario ORDER BY nombre_completo ASC");
          while ($resultado = $sql->fetch_assoc()) {

          echo "<option value='".$resultado['idUsuario']."'>".$resultado
          ['nombre_completo']."</option>";

          }
          ?>
        </select>
      </div>
    </div>
      <div class="py-4">
        <button class="btn btn-success float-end custom-btn" style="font-size: 15px;"
        type="submit">Registrar Cita</button>
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
<script src="../../../Recursos/js/Personal.js"></script>
</body>


</html>