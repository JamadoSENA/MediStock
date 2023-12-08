DELIMITER //

CREATE PROCEDURE CrearProveedor (
    IN Id int (10),
    IN nombre VARCHAR(100),
    IN departamento VARCHAR(50),
    IN municipio VARCHAR(50),
    IN direccion VARCHAR(100),
    IN telefono INT(10),
    IN correo VARCHAR(60))

BEGIN

    INSERT INTO proveedor (idProveedor, nombreProveedor, departamentoProveedor, 
    municipioProveedor, direccionProveedor, telefonoProveedor, correoProveedor)
    VALUES (Id, nombre, departamento, municipio, direccion, telefono, correo);
    
    COMMIT;

END//

CREATE PROCEDURE CrearUsuario (
    IN Id int (10),
    IN nombre VARCHAR(100),
    IN apellido VARCHAR(100),
    IN fechaNacimiento DATE,
    IN edad int(10),
    IN departamento varchar (50),
    IN municipio VARCHAR(50),
    IN direccion VARCHAR(100),
    IN profesion VARCHAR(50),
    IN telefono VARCHAR(10),
    IN correo VARCHAR(60),
    IN contrasenia VARCHAR(45),
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


DELIMITER ;