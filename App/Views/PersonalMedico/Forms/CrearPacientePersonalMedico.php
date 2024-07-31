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
        <h4 class="mb-3">Nuevo Paciente 
        <a href="../PersonalMedicoPacientes.php"><button class="btn btn-lg float-end custom-btn btn-secondary" type="submit"
            style="font-size: 15px; margin-right: 5px;">Cancelar</button></a>
        </h4>
      </div>
      <br>
      <div class="col-12 custom-form vh-80">
        <form id="RegistroPaciente" class="needs-validation" method="post" 
        action="../FormLogic/CrearPaciente.php" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label id="patientDocument" for="number" class="form-label">Cedula</label>
              <input name="Cedula" type="number" class="form-control" 
              value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una cedula válida.
            </div>
            <div class="col-sm-6">
            <label id="typeDocument" for="name" class="form-label">Tipo Documento</label>
              <input name="TipoDocumento" type="text" class="form-control" 
              value="" required>
            </div>
            </div>
            <div class="invalid-feedback">
                Se requiere un tipo válido.
            </div>
            <div class="col-sm-6">
            <label id="name" for="name" class="form-label">Nombre</label>
              <input name="Nombre" type="text" class="form-control" 
              value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un tipo válido.
            </div>
            <div class="col-sm-6">
            <label id="lastName" for="name" class="form-label">Apellido</label>
              <input name="Apellido" type="text" class="form-control" 
              value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un apellido válido.
            </div>
            <div class="col-sm-6">
            <label id="birthdate" for="date" class="form-label">Fecha de Nacimiento</label>
              <input name="FechaNacimiento" type="date" class="form-control" 
              value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una fecha válida.
            </div>
            <script>
                    const inputFechaNacimiento = document.getElementById('birthdate');
                    const inputEdad = document.getElementById('age');

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
            <div class="col-sm-6">
            <label id="age" for="name" class="form-label">Edad</label>
              <input name="Edad" type="text" class="form-control" 
              value="" required>
            </div>
            <div class="col-sm-6">
            <label id="gender" for="text" class="form-label">Genero</label>
            <input name="Genero" type="text" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un genero válido.
            </div>
            <div class="col-sm-6">
            <label id="phoneNumber" for="number" class="form-label">Telefono</label>
            <input name="Telefono" type="number" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un numero válido.
            </div>
            <div class="col-sm-6">
            <label id="profession" for="text" class="form-label">Profesion</label>
            <input name="Profesion" type="text" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una profesion válida.
            </div>
            <div class="col-md-6">
              <label id="address" for="text" class="form-label">Direccion</label>
              <input name="Direccion" type="text" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una direccion válida.
            </div>
            <div class="col-md-6">
              <label id="email" for="email" class="form-label">Correo</label>
              <input name="Correo" type="email" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una direccion de correo válida.
            </div>
            </div>
            <div class="py-4">
            <button class="btn btn-success float-end custom-btn" style="font-size: 15px;"
              type="submit">Registrar Paciente</button>
            </div>
          </form>
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
<script src="../../Recursos/js/Personal.js"></script>
</body>


</html>