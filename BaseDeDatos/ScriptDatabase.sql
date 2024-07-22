create database medistock;

use medistock;

-- Creación de la tabla roles
CREATE TABLE roles (
    idRole INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

-- Creación de la tabla users
CREATE TABLE users (
    idUser INT PRIMARY KEY,
    documentType VARCHAR(20) NOT NULL,
    nameU VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    birthdate Varchar (10) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    profession VARCHAR(50) NOT NULL,
    addressU VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    passwordU VARCHAR(100) NOT NULL,
    fkIdRole INT NOT NULL,
    FOREIGN KEY (fkIdRole) REFERENCES roles(idRole) ON DELETE CASCADE
);

-- Creación de la tabla patients
CREATE TABLE patients (
    idPatient INT PRIMARY KEY,
    documentType VARCHAR(20) NOT NULL,
    nameP VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    birthdate Varchar (10) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    profession VARCHAR(50) NOT NULL,
    addressP VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Creación de la tabla schedulings
CREATE TABLE schedulings (
    idScheduling INT PRIMARY KEY AUTO_INCREMENT,
    reason VARCHAR(100) NOT NULL,
    stateS VARCHAR(50) NOT NULL,
    dateS VARCHAR(10) NOT NULL,
    hourSS VARCHAR(5) NOT NULL,
    fkIdPatient INT NOT NULL,
	fkIdDoctor INT NOT NULL,
    FOREIGN KEY (fkIdPatient) REFERENCES patients(idPatient) ON DELETE CASCADE,
	FOREIGN KEY (fkIdDoctor) REFERENCES users(idUser) ON DELETE CASCADE
);

-- Creación de la tabla prescriptions
CREATE TABLE prescriptions (
    idPrescription INT PRIMARY KEY AUTO_INCREMENT,
    dateHour TIMESTAMP NOT NULL,
    descriptionP VARCHAR (500) NOT NULL,
    medicines VARCHAR (500) NOT NULL,
    formUrl VARCHAR (500) NOT NULL,
    fkIdScheduling INT NOT NULL,
    FOREIGN KEY (fkIdScheduling) REFERENCES schedulings(idScheduling) ON DELETE CASCADE
);

-- Creación de la tabla medicines
CREATE TABLE medicines (
    idMedicine INT PRIMARY KEY AUTO_INCREMENT,
    nameM VARCHAR(100) NOT NULL,
    formatM VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    stateM VARCHAR(20) NOT NULL,
    expirationDate VARCHAR(10) NOT NULL,
    category VARCHAR(20) NOT NULL
);

-- Creación de la tabla medicinesPrescriptions
CREATE TABLE medicinesPrescriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    amount INT NOT NULL,
    fkIdMedicine INT NOT NULL,
    fkIdPrescription INT NOT NULL,
    FOREIGN KEY (fkIdMedicine) REFERENCES medicines(idMedicine) ON DELETE CASCADE,
    FOREIGN KEY (fkIdPrescription) REFERENCES prescriptions(idPrescription) ON DELETE CASCADE
);

-- Creación de la tabla suppliers
CREATE TABLE suppliers (
    idSupplier INT PRIMARY KEY,
    nameSU VARCHAR(100) NOT NULL,
    addressSU VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL
);

-- Creación de la tabla medicinesSuppliers
CREATE TABLE medicinesSuppliers (
    fkIdMedicine INT NOT NULL,
    fkIdSupplier INT NOT NULL,
    FOREIGN KEY (fkIdMedicine) REFERENCES medicines(idMedicine) ON DELETE CASCADE,
    FOREIGN KEY (fkIdSupplier) REFERENCES suppliers(idSupplier) ON DELETE CASCADE
);