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
        <a href="../AdministradorUsuarios.php" class="nav-link text-dark">
          <svg class="bi bi-people me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Usuarios
        </a>
      </li>
      <li>
        <a href="../AdministradorProveedores.php" class="nav-link text-dark">
          <svg class="bi bi-card-checklist me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Proveedores
        </a>
      </li>
      <li>
        <a href="../AdministradorProductos.php" class="nav-link text-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Productos
        </a>
      </li>
      <li>
        <a href="../AdministradorCitas.php" class="nav-link text-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Citas Medicas
        </a>
      </li>
    </ul>
  </div>
  <div class="col-9 border-left custom-form">
      <br>
      <div>
        <h4 class="mb-3">Nuevo Usuario 
        <a href="../AdministradorUsuarios.php"><button class="btn btn-lg float-end custom-btn btn-secondary" type="submit"
            style="font-size: 15px; margin-right: 5px;">Cancelar</button></a>
        </h4>
      </div>
      <br>
      <div class="col-12 custom-form vh-80">
      <form id="RegistroUsuario" class="needs-validation" method="post" 
      action="../FormLogic/CrearUsuario.php" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label id="cedulaUsuario" for="number" class="form-label">Cedula</label>
              <input name="Cedula" type="number" class="form-control" 
              value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una cedula válida.
            </div>
            <div class="col-sm-6">
            <label id="nombreUsuario" for="name" class="form-label">Nombre</label>
              <input name="Nombre" type="text" class="form-control" 
              value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un nombre válido.
            </div>
            <div class="col-sm-6">
            <label id="apellidoUsuario" for="name" class="form-label">Apellido</label>
              <input name="Apellido" type="text" class="form-control" 
              value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un apellido válido.
            </div>
            <div class="col-6">
            <label for="Nacimiento" class="form-label">Fecha de nacimiento</label>
            <div class="input-group has-validation">
              <input name="FechaNacimiento" type="date" class="form-control" id="FechaNacimiento"
                placeholder="Fecha de nacimiento" required>
              <div class="invalid-feedback">
                Se requiere una fecha válida.
              </div>
            </div>
          </div>
          <div class="col-6">
            <label for="Edad" class="form-label">Edad</label>
            <div class="input-group has-validation">
              <input name="Edad" type="number" class="form-control" id="Edad" readonly required>
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
            <div class="col-md-6">
            <label for="departamento" class="form-label">Departamento</label>
            <select name="Departamento" class="form-select" id="Departamento" required>
              <option value="">Elegir...</option>
              <option value="Amazonas">Amazonas</option>
              <option value="Antioquia">Antioquia</option>
              <option value="Arauca">Arauca</option>
              <option value="Archipiélago de San Andrés">Archipiélago de San Andrés</option>
              <option value="Atlántico">Atlántico</option>
              <option value="Bogotá, D.C.">Bogotá, D.C.</option>
              <option value="Bolívar">Bolívar</option>
              <option value="Boyacá">Boyacá</option>
              <option value="Caldas">Caldas</option>
              <option value="Caquetá">Caquetá</option>
              <option value="Casanare">Casanare</option>
              <option value="Cauca">Cauca</option>
              <option value="Cesar">Cesar</option>
              <option value="Chocó">Chocó</option>
              <option value="Córdoba">Córdoba</option>
              <option value="Cundinamarca">Cundinamarca</option>
              <option value="Guainía">Guainía</option>
              <option value="Guaviare">Guaviare</option>
              <option value="Guajira">Guajira</option>
              <option value="Huila">Huila</option>
              <option value="Magdalena">Magdalena</option>
              <option value="Meta">Meta</option>
              <option value="Nariño">Nariño</option>
              <option value="Norte de Santander">Norte de Santander</option>
              <option value="Putumayo">Putumayo</option>
              <option value="Quindío">Quindío</option>
              <option value="Risaralda">Risaralda</option>
              <option value="Santander">Santander</option>
              <option value="Sucre">Sucre</option>
              <option value="Tolima">Tolima</option>
              <option value="Valle del Cauca">Valle del Cauca</option>
              <option value="Vaupés">Vaupés</option>
              <option value="Vichada">Vichada</option>
            </select>
            <div class="invalid-feedback">
              Se requiere un departamento válido.
            </div>
          </div>
          <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
              const municipiosPorDepartamento = {
                "Amazonas": ['Leticia', 'Puerto Nariño', 'El Encanto', 'La Chorrera',
                  'La Pedrera', 'La Victoria (Pacoa)', 'Mirití - Paraná (Campoamor)',
                  'Puerto Alegría', 'Puerto Arica', 'Santander (Araracuara)',
                  'Tarapacá'
                ],
                "Antioquia": ['Medellín', 'Bello', 'Caldas', 'Envigado', 'Girardota',
                  'Itagüí', 'Abejorral', 'Amalfi', 'Andes', 'Bolívar', 'Cañasgordas',
                  'Dabeiba', 'Apartadó', 'Fredonia', 'Frontino', 'Girardota',
                  'Ituango', 'Jericó', 'Caucasia', 'La Ceja', 'Marinilla',
                  'Puerto Berrío', 'Rionegro', 'Santa Bárbara', 'Santa Rosa de Osos',
                  'Santo Domingo', 'Segovia', 'Sonsón', 'Sopetrán', 'Támesis',
                  'Titiribí', 'Turbo', 'Urrao', 'Yarumal', 'Yolombó'
                ],
                "Arauca": ['Arauca', 'Arauquita', 'Cravo Norte', 'Fortul', 'Puerto Rondón',
                  'Saravena', 'Tame'
                ],
                "Archipiélago de San Andrés": ['Providencia (Santa Isabel)', 'San Andrés'],
                "Atlántico": ["Barranquilla", "Baranoa", "Campo de La Cruz", "Candelaria",
                  "Galapa", "Juan de Acosta", "Luruaco", "Malambo", "Manatí",
                  "Palmar de Varela", "Piojó", "Polonuevo", "Ponedera",
                  "Puerto Colombia", "Repelón", "Sabanagrande", "Sabanalarga",
                  "Santa Lucía", "Santo Tomás", "Soledad", "Suan", "Tubará",
                  "Usiacurí"
                ],
                "Bogotá, D.C.": ["Bogotá"],
                "Bolívar": ['Cartagena de Indias', 'Achí', 'Altos del Rosario', 'Arenal',
                  'Arjona', 'Arroyohondo', 'Barranco de Loba', 'Calamar',
                  'Cantagallo', 'Cicuco', 'Clemencia', 'Córdoba',
                  'El Carmen de Bolívar', 'El Guamo', 'El Peñón', 'Hatillo de Loba',
                  'Magangué', 'Mahates', 'Margarita', 'María La Baja', 'Montecristo',
                  'Morales', 'Norosí', 'Pinillos', 'Regidor', 'Río Viejo',
                  'San Cristóbal', 'San Estanislao', 'San Fernando', 'San Jacinto',
                  'San Jacinto del Cauca', 'San Juan Nepomuceno',
                  'San Martín de Loba', 'San Pablo', 'Santa Catalina',
                  'Santa Cruz de Mompox', 'Santa Rosa', 'Santa Rosa del Sur',
                  'Simití', 'Soplaviento', 'Talaigua Nuevo', 'Tiquisio', 'Turbaco',
                  'Turbaná', 'Villanueva', 'Zambrano'
                ],
                "Boyacá": ['Tunja', 'Almeida', 'Aquitania', 'Arcabuco', 'Belén', 'Berbeo',
                  'Betéitiva', 'Boavita', 'Boyacá', 'Briceño', 'Buenavista',
                  'Busbanzá', 'Caldas', 'Campohermoso', 'Cerinza', 'Chinavita',
                  'Chiquinquirá', 'Chíquiza', 'Chiscas', 'Chita', 'Chitaraque',
                  'Chivatá', 'Chivor', 'Ciénega', 'Cómbita', 'Coper', 'Corrales',
                  'Covarachía', 'Cubará', 'Cucaita', 'Cuítiva', 'Duitama', 'El Cocuy',
                  'El Espino', 'Firavitoba', 'Floresta', 'Gachantivá', 'Gameza',
                  'Garagoa', 'Guacamayas', 'Guateque', 'Guayatá', 'Güicán', 'Iza',
                  'Jenesano', 'Jericó', 'La Capilla', 'La Uvita', 'La Victoria',
                  'Labranzagrande', 'Macanal', 'Maripí', 'Miraflores', 'Mongua',
                  'Monguí', 'Moniquirá', 'Motavita', 'Muzo', 'Nobsa', 'Nuevo Colón',
                  'Oicatá', 'Otanche', 'Pachavita', 'Páez', 'Paipa', 'Pajarito',
                  'Panqueba', 'Pauna', 'Paya', 'Paz de Río', 'Pesca', 'Pisba',
                  'Puerto Boyacá', 'Quípama', 'Ramiriquí', 'Ráquira', 'Rondón',
                  'Saboyá', 'Sáchica', 'Samacá', 'San Eduardo', 'San José de Pare',
                  'San Luis de Gaceno', 'San Mateo', 'San Miguel de Sema',
                  'San Pablo de Borbur', 'Santa María', 'Santa Rosa de Viterbo',
                  'Santa Sofía', 'Santana', 'Sativanorte', 'Sativasur', 'Siachoque',
                  'Soatá', 'Socha', 'Socotá', 'Sogamoso', 'Somondoco', 'Sora',
                  'Soracá', 'Sotaquirá', 'Susacón', 'Sutamarchán', 'Sutatenza',
                  'Tasco', 'Tenza', 'Tibaná', 'Tibasosa', 'Tinjacá', 'Tipacoque',
                  'Toca', 'Togüí', 'Tópaga', 'Tota', 'Tununguá', 'Turmequé', 'Tuta',
                  'Tutazá', 'Umbita', 'Ventaquemada', 'Villa de Leyva', 'Viracachá',
                  'Zetaquira'
                ],
                "Caldas": ['Aguadas', 'Anserma', 'Aranzazu', 'Belalcázar', 'Chinchiná',
                  'Filadelfia', 'La Dorada', 'La Merced', 'Manizales', 'Manzanares',
                  'Marmato', 'Marquetalia', 'Marulanda', 'Neira', 'Norcasia',
                  'Pácora', 'Palestina', 'Pensilvania', 'Riosucio', 'Risaralda',
                  'Salamina', 'Samaná', 'San José', 'Supía', 'Victoria', 'Villamaría',
                  'Viterbo'
                ],
                "Caquetá": ["Florencia", "Albania", "Belén de Los Andaquies",
                  "Cartagena del Chairá", "Curillo", "El Doncello", "El Paujil",
                  "La Montañita", "Milán", "Morelia", "Puerto Rico",
                  "San José del Fragua", "San Vicente del Caguán", "Solano", "Solita",
                  "Valparaíso"
                ],
                "Casanare": ["Yopal", "Aguazul", "Chámeza", "Hato Corozal", "La Salina",
                  "Maní", "Monterrey", "Nunchía", "Orocué", "Paz de Ariporo", "Pore",
                  "Recetor", "Sabanalarga", "Sácama", "San Luis de Palenque",
                  "Támara", "Tauramena", "Trinidad", "Villanueva"
                ],
                "Cauca": ["Popayán", "Almaguer", "Argelia", "Balboa", "Bolívar",
                  "Buenos Aires", "Cajibío", "Caldono", "Caloto", "Corinto",
                  "El Tambo", "Florencia", "Guachené", "Guapí", "Inzá", "Jambaló",
                  "La Sierra", "La Vega", "López de Micay", "Mercaderes", "Miranda",
                  "Morales", "Padilla", "Páez", "Patía", "Piamonte", "Piendamó",
                  "Puerto Tejada", "Puracé", "Rosas", "San Sebastián",
                  "Santander de Quilichao", "Santa Rosa", "Silvia", "Sotará",
                  "Suárez", "Sucre", "Timbío", "Timbiquí", "Toribío", "Totoró",
                  "Villa Rica"
                ],
                "Cesar": ["Valledupar", "Aguachica", "Agustín Codazzi", "Astrea",
                  "Becerril", "Bosconia", "Chimichagua", "Chiriguaná", "Curumaní",
                  "El Copey", "El Paso", "Gamarra", "González", "La Gloria",
                  "La Jagua de Ibirico", "La Paz", "Manaure Balcón del Cesar",
                  "Pailitas", "Pelaya", "Pueblo Bello", "Río de Oro", "San Alberto",
                  "San Diego", "San Martín", "Tamalameque"
                ],
                "Chocó": ["Quibdó", "Acandí", "Alto Baudó", "Atrato", "Bagadó",
                  "Bahía Solano", "Bajo Baudó", "Bojayá", "Cértegui", "Condoto",
                  "El Cantón de San Pablo", "El Carmen de Atrato",
                  "El Carmen del Darién", "El Litoral de San Juan", "Istmina",
                  "Juradó", "Lloró", "Medio Atrato", "Medio Baudó", "Medio San Juan",
                  "Nóvita", "Nuquí", "Río Iró", "Río Quito", "Riosucio",
                  "San José del Palmar", "Sipí", "Tadó", "Unguía",
                  "Unión Panamericana"
                ],
                "Córdoba": ["Montería", "Ayapel", "Buenavista", "Canalete", "Cereté",
                  "Chimá", "Chinú", "Ciénaga de Oro", "Cotorra", "La Apartada",
                  "Los Córdobas", "Momil", "Montelíbano", "Moñitos", "Planeta Rica",
                  "Pueblo Nuevo", "Puerto Escondido", "Puerto Libertador", "Purísima",
                  "Sahagún", "San Andrés de Sotavento", "San Antero",
                  "San Bernardo del Viento", "San Carlos", "San José de Uré",
                  "San Pelayo", "Santa Cruz de Lorica", "Tierralta", "Tuchín",
                  "Valencia"
                ],
                "Cundinamarca": ["Agua de Dios", "Albán", "Anapoima", "Anolaima", "Apulo",
                  "Arbeláez", "Beltrán", "Bituima", "Bojacá", "Cabrera", "Cachipay",
                  "Cajicá", "Caparrapí", "Cáqueza", "Carmen de Carupa", "Chaguaní",
                  "Chía", "Chipaque", "Choachí", "Chocontá", "Cogua", "Cota",
                  "Cucunubá", "El Colegio", "El Peñón", "El Rosal", "Facatativá",
                  "Fómeque", "Fosca", "Funza", "Fúquene", "Fusagasugá", "Gachalá",
                  "Gachancipá", "Gachetá", "Gama", "Girardot", "Granada", "Guachetá",
                  "Guaduas", "Guasca", "Guataquí", "Guatavita", "Guayabal de Síquima",
                  "Guayabetal", "Gutiérrez", "Jerusalén", "Junín", "La Calera",
                  "La Mesa", "La Palma", "La Peña", "La Vega", "Lenguazaque",
                  "Machetá", "Madrid", "Manta", "Medina", "Mosquera", "Nariño",
                  "Nemocón", "Nilo", "Nimaima", "Nocaima", "Pacho", "Paime", "Pandi",
                  "Paratebueno", "Pasca", "Puerto Salgar", "Pulí", "Quebradanegra",
                  "Quetame", "Quipile", "Ricaurte", "San Antonio del Tequendama",
                  "San Bernardo", "San Cayetano", "San Francisco",
                  "San Juan de Rioseco", "Sasaima", "Sesquilé", "Sibaté", "Silvania",
                  "Simijaca", "Soacha", "Sopó", "Subachoque", "Suesca", "Supatá",
                  "Susa", "Sutatausa", "Tabio", "Tausa", "Tena", "Tenjo", "Tibacuy",
                  "Tibirita", "Tocaima", "Tocancipá", "Topaipí", "Ubalá", "Ubaque",
                  "Ubaté", "Une", "Útica", "Venecia", "Vergara", "Vianí",
                  "Villagómez", "Villapinzón", "Villeta", "Viotá", "Yacopí",
                  "Zipacón", "Zipaquirá"
                ],
                "Guainía": ["Inírida", "Barranco Minas (CD)", "Mapiripana (CD)",
                  "San Felipe (CD)", "Puerto Colombia (CD)", "La Guadalupe (CD)",
                  "Cacahual (CD)", "Pana Pana (CD)", "Morichal (CD)"
                ],
                "Guaviare": ["San José del Guaviare", "Calamar", "El Retorno",
                  "Miraflores"],
                "Guajira": ["Riohacha", "Albania", "Barrancas", "Dibulla", "Distracción",
                  "El Molino", "Fonseca", "Hatonuevo", "La Jagua del Pilar", "Maicao",
                  "Manaure", "San Juan del Cesar", "Uribia", "Urumita", "Villanueva"
                ],
                "Huila": ["Neiva", "Acevedo", "Agrado", "Aipe", "Algeciras", "Altamira",
                  "Baraya", "Campoalegre", "Colombia", "Elías", "Garzón", "Gigante",
                  "Guadalupe", "Hobo", "Íquira", "Isnos", "La Argentina", "La Plata",
                  "Nátaga", "Oporapa", "Paicol", "Palermo", "Palestina", "Pital",
                  "Pitalito", "Rivera", "Saladoblanco", "San Agustín", "Santa María",
                  "Suaza", "Tarqui", "Tello", "Teruel", "Tesalia", "Timaná",
                  "Villavieja", "Yaguará"
                ],
                "Magdalena": ["Santa Marta", "Algarrobo", "Aracataca", "Ariguaní",
                  "Cerro San Antonio", "Chivolo", "Ciénaga", "Concordia", "El Banco",
                  "El Piñon", "El Retén", "Fundación", "Guamal", "Nueva Granada",
                  "Pedraza", "Pijiño del Carmen", "Pivijay", "Plato", "Puebloviejo",
                  "Remolino", "Sabanas de San Angel", "Salamina",
                  "San Sebastián de Buenavista", "San Zenón", "Santa Ana",
                  "Santa Bárbara de Pinto", "Sitionuevo", "Tenerife", "Zapayán",
                  "Zona Bananera"
                ],
                "Meta": ["Villavicencio", "Acacías", "Barranca de Upía", "Cabuyaro",
                  "Castilla La Nueva", "Cubarral", "Cumaral", "El Calvario",
                  "El Castillo", "El Dorado", "Fuente de Oro", "Granada", "Guamal",
                  "La Macarena", "Lejanías", "Mapiripán", "Mesetas",
                  "Puerto Concordia", "Puerto Gaitán", "Puerto Lleras",
                  "Puerto López", "Puerto Rico", "Restrepo", "San Carlos de Guaroa",
                  "San Juan de Arama", "San Juanito", "San Martín", "Uribe",
                  "Vista Hermosa"
                ],
                "Nariño": ["Pasto", "Albán", "Aldana", "Ancuya", "Arboleda", "Barbacoas",
                  "Belén", "Buesaco", "Chachagüí", "Colón", "Consacá", "Contadero",
                  "Córdoba", "Cuaspud", "Cumbal", "Cumbitara", "El Charco",
                  "El Peñol", "El Rosario", "El Tablón de Gómez", "El Tambo",
                  "Francisco Pizarro", "Funes", "Guachucal", "Guaitarilla",
                  "Gualmatán", "Iles", "Imués", "Ipiales", "La Cruz", "La Florida",
                  "La Llanada", "La Tola", "La Unión", "Leiva", "Linares",
                  "Los Andes", "Magüí Payán", "Mallama", "Mosquera", "Nariño",
                  "Olaya Herrera", "Ospina", "Policarpa", "Potosí", "Providencia",
                  "Puerres", "Pupiales", "Ricaurte", "Roberto Payán", "Samaniego",
                  "San Bernardo", "San Lorenzo", "San Pablo", "San Pedro de Cartago",
                  "Sandoná", "Santa Bárbara", "Santacruz", "Sapuyes", "Taminango",
                  "Tangua", "Tumaco", "Túquerres", "Yacuanquer"
                ],
                "Norte de Santander": ["Cúcuta", "Ábrego", "Arboledas", "Bochalema",
                  "Bucarasica", "Cáchira", "Cácota", "Chinácota", "Chitagá",
                  "Convención", "Cucutilla", "Durania", "El Carmen", "El Tarra",
                  "El Zulia", "Gramalote", "Hacarí", "Herrán", "La Esperanza",
                  "La Playa de Belén", "Labateca", "Los Patios", "Lourdes",
                  "Mutiscua", "Ocaña", "Pamplona", "Pamplonita", "Puerto Santander",
                  "Ragonvalia", "Salazar de Las Palmas", "San Calixto",
                  "San Cayetano", "Santiago", "Santo Domingo de Silos", "Sardinata",
                  "Teorama", "Tibú", "Toledo", "Villa Caro", "Villa del Rosario"
                ],
                "Putumayo": ["Mocoa", "Colón", "Orito", "Puerto Asís", "Puerto Caicedo",
                  "Puerto Guzmán", "Puerto Leguízamo", "San Francisco", "San Miguel",
                  "Santiago", "Sibundoy", "Valle del Guamuez", "Villagarzón"
                ],
                "Quindío": ["Armenia", "Buenavista", "Calarca", "Circasia", "Córdoba",
                  "Filandia", "Génova", "La Tebaida", "Montenegro", "Pijao",
                  "Quimbaya", "Salento"
                ],
                "Risaralda": ["Pereira", "Apía", "Balboa", "Belén de Umbría",
                  "Dosquebradas", "Guática", "La Celia", "La Virginia", "Marsella",
                  "Mistrató", "Pueblo Rico", "Quinchía", "Santa Rosa de Cabal",
                  "Santuario"
                ],
                "Santander": ["Bucaramanga", "Aguada", "Albania", "Aratoca", "Barbosa",
                  "Barichara", "Barrancabermeja", "Betulia", "Bolívar", "Cabrera",
                  "California", "Capitanejo", "Carcasí", "Cepitá", "Cerrito",
                  "Charalá", "Charta", "Chima", "Chipatá", "Cimitarra", "Concepción",
                  "Confines", "Contratación", "Coromoro", "Curití",
                  "El Carmen de Chucurí", "El Guacamayo", "El Peñón", "El Playón",
                  "Encino", "Enciso", "Florián", "Floridablanca", "Galán", "Gámbita",
                  "Girón", "Guaca", "Guadalupe", "Guapotá", "Guavatá", "Güepsa",
                  "Hato", "Jesús María", "Jordán", "La Belleza", "La Paz",
                  "Landázuri", "Lebrija", "Los Santos", "Macaravita", "Málaga",
                  "Matanza", "Mogotes", "Molagavita", "Ocamonte", "Oiba", "Onzaga",
                  "Palmar", "Palmas del Socorro", "Páramo", "Piedecuesta", "Pinchote",
                  "Puente Nacional", "Puerto Parra", "Puerto Wilches", "Rionegro",
                  "Sabana de Torres", "San Andrés", "San Benito", "San Gil",
                  "San Joaquín", "San José de Miranda", "San Miguel",
                  "San Vicente de Chucurí", "Santa Bárbara", "Santa Helena del Opón",
                  "Simacota", "Socorro", "Suaita", "Sucre", "Suratá", "Tona",
                  "Valle de San José", "Vélez", "Vetas", "Villanueva", "Zapatoca",
                  "Armenia", "Buenavista", "Calarca", "Circasia", "Córdoba",
                  "Filandia", "Génova", "La Tebaida", "Montenegro", "Pijao",
                  "Quimbaya", "Salento", "Pereira", "Apía", "Balboa",
                  "Belén de Umbría", "Dosquebradas", "Guática", "La Celia",
                  "La Virginia", "Marsella", "Mistrató", "Pueblo Rico", "Quinchía",
                  "Santa Rosa de Cabal", "Santuario", "Mocoa", "Colón", "Orito",
                  "Puerto Asís", "Puerto Caicedo", "Puerto Guzmán",
                  "Puerto Leguízamo", "San Francisco", "San Miguel", "Santiago",
                  "Sibundoy", "Valle del Guamuez", "Villagarzón", "Cúcuta", "Ábrego",
                  "Arboledas", "Bochalema", "Bucarasica", "Cáchira", "Cácota",
                  "Chinácota", "Chitagá", "Convención", "Cucutilla", "Durania",
                  "El Carmen", "El Tarra", "El Zulia", "Gramalote", "Hacarí",
                  "Herrán", "La Esperanza", "La Playa de Belén", "Labateca",
                  "Los Patios", "Lourdes", "Mutiscua", "Ocaña", "Pamplona",
                  "Pamplonita", "Puerto Santander", "Ragonvalia",
                  "Salazar de Las Palmas", "San Calixto", "San Cayetano", "Santiago",
                  "Santo Domingo de Silos", "Sardinata", "Teorama", "Tibú", "Toledo",
                  "Villa Caro", "Villa del Rosario"
                ],
                "Sucre": ['Sincelejo', 'Buenavista', 'Caimito', 'Chalán', 'Colosó',
                  'Corozal', 'Coveñas', 'El Roble', 'Galeras', 'Guaranda', 'La Unión',
                  'Los Palmitos', 'Majagual', 'Morroa', 'Ovejas', 'Palmito',
                  'Sampués', 'San Benito Abad', 'San Juan de Betulia', 'San Marcos',
                  'San Onofre', 'San Pedro', 'Santiago de Tolú', 'Sincé', 'Sucre',
                  'Tolúviejo'
                ],
                "Tolima": ["Ibagué", "Alpujarra", "Alvarado", "Ambalema", "Anzoátegui",
                  "Armero", "Ataco", "Cajamarca", "Carmen de Apicalá", "Casabianca",
                  "Chaparral", "Coello", "Coyaima", "Cunday", "Dolores", "Espinal",
                  "Falan", "Flandes", "Fresno", "Guamo", "Herveo", "Honda",
                  "Icononzo", "Lérida", "Líbano", "Mariquita", "Melgar", "Murillo",
                  "Natagaima", "Ortega", "Palocabildo", "Piedras", "Planadas",
                  "Prado", "Purificación", "Rioblanco", "Roncesvalles", "Rovira",
                  "Saldaña", "San Antonio", "San Luis", "Santa Isabel", "Suárez",
                  "Valle de San Juan", "Venadillo", "Villahermosa", "Villarrica"
                ],
                "Valle del Cauca": ['Cali', 'Alcalá', 'Andalucía', 'Ansermanuevo',
                  'Argelia', 'Bolívar', 'Buenaventura', 'Buga', 'Bugalagrande',
                  'Caicedonia', 'Calima - El Darién', 'Candelaria', 'Cartago',
                  'Dagua', 'El Águila', 'El Cairo', 'El Cerrito', 'El Dovio',
                  'Florida', 'Ginebra', 'Guacarí', 'Jamundí', 'La Cumbre', 'La Unión',
                  'La Victoria', 'Obando', 'Palmira', 'Pradera', 'Restrepo',
                  'Riofrío', 'Roldanillo', 'San Pedro', 'Sevilla', 'Toro', 'Trujillo',
                  'Tuluá', 'Ulloa', 'Versalles', 'Vijes', 'Yotoco', 'Yumbo', 'Zarzal'
                ],
                "Vaupés": ['Mitú', 'Caruru', 'Pacoa (CD)', 'Taraira', 'Papunaua (CD)',
                  'Yavaraté (CD)'
                ],
                "Vichada": ['Puerto Carreño', 'Cumaribo', 'La Primavera', 'Santa Rosalía']
              };

              const departamentoSelect = document.getElementById("Departamento");
              const municipioSelect = document.getElementById("Municipio");

              // Función para cargar municipios según el departamento seleccionado
              function actualizarMunicipios() {
                const selectedDepartamento = departamentoSelect.value;
                municipioSelect.innerHTML = ""; // Limpiar opciones

                // Si se selecciona un departamento válido, cargar los municipios correspondientes
                if (municipiosPorDepartamento.hasOwnProperty(selectedDepartamento)) {
                  const municipios = municipiosPorDepartamento[selectedDepartamento];
                  municipios.forEach(municipio => {
                    const option = document.createElement("option");
                    option.text = municipio;
                    option.value = municipio;
                    municipioSelect.appendChild(option);
                  });
                } else {
                  const option = document.createElement("option");
                  option.text = "Selecciona un departamento válido";
                  municipioSelect.appendChild(option);
                }
              }

              // Escuchar cambios en el select de departamento para actualizar los municipios
              departamentoSelect.addEventListener("change", actualizarMunicipios);
            });
          </script>
          <div class="col-md-6">
            <label for="municipio" class="form-label">Municipio</label>
            <select name="Municipio" class="form-select" id="Municipio" required>
              <option value="">Elegir...</option>
            </select>
            <div class="invalid-feedback">
              Se requiere un municipio válido.
            </div>
          </div>
            <div class="col-sm-6">
            <label id="direccionUsuario" for="text" class="form-label">Direccion</label>
            <input name="Direccion" type="text" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una direccion válida.
            </div>
            <div class="col-sm-6">
            <label id="profesionUsuario" for="text" class="form-label">Profesion`</label>
            <input name="Profesion" type="text" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una profesion válida.
            </div>
            <div class="col-sm-6">
            <label id="telefonoUsuario" for="number" class="form-label">Telefono</label>
            <input name="Telefono" type="number" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un numero válido.
            </div>
            <div class="col-md-6">
              <label id="correoUsuario" for="email" class="form-label">Correo</label>
              <input name="Correo" type="email" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere un correo válido.
            </div>
            <div class="col-sm-6">
            <label id="contraseniaUsuario" for="password" class="form-label">Contraseña</label>
            <input name="Contrasenia" type="password" class="form-control"
                value="" required>
            </div>
            <div class="invalid-feedback">
                Se requiere una contraseña válido.
            </div>
            <div class="col-md-6">
              <label for="rol" class="form-label">Rol</label>
              <select name="Rol" class="form-select" id="rol" required>
                <option value="">Elegir...</option>
                <?php
                include ("../../../../Config/DataBase.php");

                $sql = $conexion->query("SELECT * FROM rol");
                while ($resultado = $sql->fetch_assoc()) {

                echo "<option value='".$resultado['idRol']."'>".$resultado
                ['nombreRol']."</option>";

                }
                ?>
              </select>
              <div class="invalid-feedback">
                Se requiere un rol válido.
              </div>
            </div>
            </div>
            <div class="py-4">
            <button class="btn btn-success float-end custom-btn" style="font-size: 15px;"
              type="submit">Registrar Usuario</button>
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