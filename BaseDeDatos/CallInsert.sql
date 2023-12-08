CALL CrearProveedor(1, 'Proveedor 1', 'Departamento 1', 'Municipio 1', 'Dirección 1', 1234567890, 'proveedor1@example.com');
CALL CrearProveedor(2, 'Proveedor 2', 'Departamento 2', 'Municipio 2', 'Dirección 2', 9876543210, 'proveedor2@example.com');
CALL CrearProveedor(3, 'Proveedor 3', 'Departamento 3', 'Municipio 3', 'Dirección 3', 5678901234, 'proveedor3@example.com');
CALL CrearProveedor(4, 'Proveedor 4', 'Departamento 4', 'Municipio 4', 'Dirección 4', 1122334455, 'proveedor4@example.com');
CALL CrearProveedor(5, 'Proveedor 5', 'Departamento 5', 'Municipio 5', 'Dirección 5', 9988776655, 'proveedor5@example.com');

CALL CrearUsuario(1, 'Usuario 1', 'Apellido 1', '1990-01-01', 30, 'Departamento 1', 'Municipio 1', 'Dirección 1', 'Profesión 1', '1234567890', 'usuario1@example.com', 'contraseña1', 1);
CALL CrearUsuario(2, 'Usuario 2', 'Apellido 2', '1995-02-02', 27, 'Departamento 2', 'Municipio 2', 'Dirección 2', 'Profesión 2', '9876543210', 'usuario2@example.com', 'contraseña2', 2);
CALL CrearUsuario(3, 'Usuario 3', 'Apellido 3', '1985-03-03', 36, 'Departamento 3', 'Municipio 3', 'Dirección 3', 'Profesión 3', '5678901234', 'usuario3@example.com', 'contraseña3', 1);
CALL CrearUsuario(4, 'Usuario 4', 'Apellido 4', '1980-04-04', 41, 'Departamento 4', 'Municipio 4', 'Dirección 4', 'Profesión 4', '1122334455', 'usuario4@example.com', 'contraseña4', 2);
CALL CrearUsuario(5, 'Usuario 5', 'Apellido 5', '1992-05-05', 29, 'Departamento 5', 'Municipio 5', 'Dirección 5', 'Profesión 5', '9988776655', 'usuario5@example.com', 'contraseña5', 1);

CALL CrearProducto('Producto 1', 'Descripción 1', 'Indicaciones 1', '2024-01-01', 50, 'Disponible', 1);
CALL CrearProducto('Producto 2', 'Descripción 2', 'Indicaciones 2', '2023-02-02', 100, 'Disponible', 2);
CALL CrearProducto('Producto 3', 'Descripción 3', 'Indicaciones 3', '2025-03-03', 75, 'En stock', 3);
CALL CrearProducto('Producto 4', 'Descripción 4', 'Indicaciones 4', '2022-04-04', 30, 'En stock', 4);
CALL CrearProducto('Producto 5', 'Descripción 5', 'Indicaciones 5', '2023-05-05', 200, 'Disponible', 5);

CALL CrearCitaMedica(1234567890, 'Paciente 1', 'ApellidoP 1', '1990-01-01', 30, 'Consulta general', 'Presencial', 'Notas 1', 1);
CALL CrearCitaMedica(9876543210, 'Paciente 2', 'ApellidoP 2', '1995-02-02', 27, 'Control de rutina', 'Virtual', 'Notas 2', 2);
CALL CrearCitaMedica(5678901234, 'Paciente 3', 'ApellidoP 3', '1985-03-03', 36, 'Evaluación especializada', 'Presencial', 'Notas 3', 1);
CALL CrearCitaMedica(1122334455, 'Paciente 4', 'ApellidoP 4', '1980-04-04', 41, 'Seguimiento postoperatorio', 'Presencial', 'Notas 4', 2);
CALL CrearCitaMedica(9988776655, 'Paciente 5', 'ApellidoP 5', '1992-05-05', 29, 'Consulta pediátrica', 'Presencial', 'Notas 5', 1);

CALL AñadirProductosCita(5, 1, 1);
CALL AñadirProductosCita(10, 2, 2);
CALL AñadirProductosCita(3, 3, 3);
CALL AñadirProductosCita(8, 4, 4);
CALL AñadirProductosCita(15, 5, 5);
