DELIMITER //

CREATE PROCEDURE INSERTARUSUARIO (
    IN numeroDocumento int (11),
    IN tipoDocumento VARCHAR (20),
    IN nombre VARCHAR (50),
    IN apellido VARCHAR (50),
    IN fechaNacimiento VARCHAR (10),
    IN edad INT,
    IN genero VARCHAR (10),
    IN numeroTelefono VARCHAR (20),
    IN profesion VARCHAR (50),
    IN direccion VARCHAR (100),
    IN correo VARCHAR (100),
    IN contraseña VARCHAR (100),
    IN rol INT (11))

BEGIN

    INSERT INTO users (idUser, documentType, nameU, lastname, birthdate, age,
    gender, phoneNumber, profession, addressU, email, passwordU, fkIdRole)
    VALUES (numeroDocumento, tipoDocumento, nombre, apellido, fechaNacimiento,
    edad, genero, numeroTelefono, profesion, direccion, correo, contraseña, rol);
    
    COMMIT;

END//

CREATE PROCEDURE INSERTARPACIENTE (
    IN numeroDocumento int (11),
    IN tipoDocumento VARCHAR (20),
    IN nombre VARCHAR (50),
    IN apellido VARCHAR (50),
    IN fechaNacimiento VARCHAR (10),
    IN edad INT,
    IN genero VARCHAR (10),
    IN numeroTelefono VARCHAR (20),
    IN profesion VARCHAR (50),
    IN direccion VARCHAR (100),
    IN correo VARCHAR (100))

BEGIN

    INSERT INTO patients (idPatient, documentType, nameP, lastname, birthdate, age,
    gender, phoneNumber, profession, addressP, email)
    VALUES (numeroDocumento, tipoDocumento, nombre, apellido, fechaNacimiento,
    edad, genero, numeroTelefono, profesion, direccion, correo);
    
    COMMIT;

END//

CREATE PROCEDURE INSERTARCITA (
    IN razon VARCHAR (100),
    IN estado VARCHAR (50),
    IN fecha VARCHAR (10),
    IN hora VARCHAR (5),
    IN paciente INT (11),
    IN doctor INT (11))

BEGIN

    INSERT INTO schedulings (reason, stateS, dateS, hourSS, fkIdPatient, fkIdDoctor)
    VALUES (razon, estado, fecha, hora, paciente, doctor);
    
    COMMIT;

END//

CREATE PROCEDURE INSERTARPRESCRIPCION (
    IN descripcion VARCHAR (500),
    IN medicamentos VARCHAR (500),
    IN formulario VARCHAR (500),
    IN agendamientoId INT (11))

BEGIN

    INSERT INTO prescriptions (descriptionP, medicines, formUrl, fkIdScheduling)
    VALUES (descripcion, medicamentos, formulario, agendamientoId);
    
    COMMIT;

END//

CREATE PROCEDURE INSERTARPROVEEDOR (
    IN nit INT (11),
    IN nombre VARCHAR (100),
    IN direccion VARCHAR (100),
    IN correo VARCHAR (100),
    IN numeroTelefono VARCHAR (20))

BEGIN

    INSERT INTO suppliers (idSupplier, nameSU, addressSU, email, phoneNumber)
    VALUES (nit, nombre, direccion, correo, numeroTelefono);
    
    COMMIT;

END//

CREATE PROCEDURE INSERTARMEDICINA (
    IN nombre VARCHAR(100),
    IN formato VARCHAR(50),
    IN cantidad INT,
    IN estado VARCHAR(20),
    IN fechaExp VARCHAR(10),
    IN categoria VARCHAR(20),
    IN proveedorNit INT)
BEGIN
    DECLARE medicamentoId INT;

    INSERT INTO medicines (nameM, formatM, stock, stateM, expirationDate, category)
    VALUES (nombre, formato, cantidad, estado, fechaExp, categoria);

    SET medicamentoId = LAST_INSERT_ID();
    
    INSERT INTO medicinesSuppliers (fkIdMedicine, fkIdSupplier)
    VALUES (medicamentoId, proveedorNit);

END//

CREATE PROCEDURE INSERTARMEDICINASPRESCRIPCION (
    IN cantidad INT (11),
    IN medicamento INT (11),
    IN prescripcion INT (11))

BEGIN 

    INSERT INTO medicinesPrescriptions (amount, fkIdMedicine, fkIdPrescription)
    VALUES (cantidad, medicamento, prescripcion);

    COMMIT;

END//

DELIMITER ;