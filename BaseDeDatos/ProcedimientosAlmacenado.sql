DELIMITER //

CREATE PROCEDURE CrearProveedor (
    IN Id int (10),
    IN nombre varchar (100),
    IN departamento varchar (50),
    IN municipio varchar (50),
    IN direccion varchar (100),
    IN telefono int (10),
    IN correo varchar (60))

BEGIN

    INSERT INTO proveedor (idProveedor, nombreProveedor, departamentoProveedor, 
    municipioProveedor, direccionProveedor, telefonoProveedor, correoProveedor)
    VALUES (Id, nombre, departamento, municipio, direccion, telefono, correo);
    
    COMMIT;

END//

CREATE PROCEDURE CrearUsuario (
    IN Id int (10),
    IN nombre varchar (100),
    IN apellido varchar (100),
    IN fechaNacimiento DATE,
    IN edad int (10),
    IN departamento varchar (50),
    IN municipio varchar (50),
    IN direccion varchar (100),
    IN profesion varchar (50),
    IN telefono varchar (10),
    IN correo varchar (60),
    IN contrasenia varchar (45),
    IN IdRol int (10)
)
BEGIN
    INSERT INTO usuario (idUsuario, nombreUsuario, apellidoUsuario, fechaNacimientoUsuario, 
    edadUsuario, departamentoUsuario, municipioUsuario, direccionUsuario, profesionUsuario, 
    telefonoUsuario, correoUsuario, contraseniaUsuario, fk_id_rol)
    VALUES (Id, nombre, apellido, fechaNacimiento, edad, departamento, municipio, 
    direccion, profesion, telefono, correo, contrasenia, IdRol);
    
    COMMIT;
END//

CREATE PROCEDURE CrearProducto (
    IN nombre varchar (100),
    IN descripcion varchar (500),
    IN indicaciones varchar (500),
    IN fechaCaducidad date,
    IN cantidad int (20),
    IN estado varchar (20),
    IN proveedor int (10))

BEGIN

    INSERT INTO producto (nombreProducto, descripcionProducto, indicacionesProducto,
    fechaCaducidadProducto, cantidadProducto, estadoProducto, fk_id_proveedor)
    VALUES (nombre, descripcion, indicaciones, fechaCaducidad, cantidad, estado, proveedor);
    
    COMMIT;

END//

CREATE PROCEDURE CrearCitaMedica (
    IN documento int (10),
    IN nombre varchar (100),
    IN apellido varchar (100),
    IN fechaNacimiento date,
    IN edad int (10),
    IN motivo varchar (5000),
    IN tipo varchar (100),
    IN notas varchar (5000),
    IN medico int (10))

BEGIN

    INSERT INTO cita_medica (documentoPaciente, nombrePaciente,
    apellidoPaciente, fechaNacimientoPaciente, edadPaciente, motivoCita,
    tipoCita, notasMedico, fk_id_usuario)
    VALUES (documento, nombre, apellido, fechaNacimiento, edad, motivo, 
    tipo, notas, medico);
    
    COMMIT;

END//

CREATE PROCEDURE AñadirProductosCita (
    IN cantidad int (10),
    IN cita int (10),
    IN producto int (10))

BEGIN

    INSERT INTO cita_productos (cantidad_producto, fk_id_cita, fk_id_producto)
    VALUES (cantidad, cita, producto);
    
    COMMIT;

END//

 
DELIMITER ;