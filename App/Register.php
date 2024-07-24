<title>Sign Up</title>
<link rel="shortcut icon" href="Recursos/img/LogoHeadMediStock.png" type="image/x-icon">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" id="RegistroUsuario" class="needs-validation" method="post" 
        action="RegisterUser.php" novalidate>
			<h2>Registro de usuario</h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="number" name="Cedula" id="document" class="form-control input-lg" placeholder="Numero de cedula" tabindex="1" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                <input type="text" name="TipoDocumento" id="document_type" class="form-control input-lg" placeholder="Tipo de documento (CC/CE)" tabindex="2" required>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="Nombre" id="name" class="form-control input-lg" placeholder="Nombres" tabindex="3" required>
			</div>
			<div class="form-group">
				<input type="text" name="Apellido" id="last_name" class="form-control input-lg" placeholder="Apellidos" tabindex="4" required>
			</div>
            <div class="form-group">
                <label for="">Fecha de Nacimiento</label>
				<input type="date" name="FechaNacimiento" id="birthdate" class="form-control input-lg" placeholder="Fecha de Nacimiento" tabindex="5" required>
			</div>
            <div class="form-group">
                <label for="">Edad</label>
				<input name="Edad" type="number" class="form-control" id="age" readonly tabindex="6" required>
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

			<div class="form-group">
				<input type="text" name="Genero" id="gender" class="form-control input-lg" placeholder="Genero (F/M)" tabindex="7" required>
			</div>
            <div class="form-group">
				<input type="number" name="Telefono" id="phone_number" class="form-control input-lg" placeholder="Numero Telefonico" tabindex="8" required>
			</div>
            <div class="form-group">
				<input type="text" name="Profesion" id="profession" class="form-control input-lg" placeholder="Profesion" tabindex="9" required>
			</div>
            <div class="form-group">
				<input type="text" name="Direccion" id="address" class="form-control input-lg" placeholder="Direccion" tabindex="10" required>
			</div>
            <div class="form-group">
				<input type="email" name="Correo" id="email" class="form-control input-lg" placeholder="Correo Electronico" tabindex="11" required>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="Contrasenia" id="password" class="form-control input-lg" placeholder="Contraseña" tabindex="12" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="select" name="Rol" id="password_confirmation" class="form-control input-lg" placeholder="Rol" tabindex="13" required>
					</div>
				</div>
			</div>
            <hr>
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-success btn-block btn-lg" tabindex="13" required></div>
				<div class="col-xs-12 col-md-6"><a href="LogIn.php" class="btn btn-success btn-block btn-lg">Iniciar Sesion</a></div>
			</div>
		</form>
	</div>
</div>