create database MediStock;
use MediStock;
create table rol(
idRol int (10) primary key not null,
nombreRol varchar (20) not null);
create table usuario (
idUsuario int (10) primary key not null,
nombreUsuario varchar (100) not null,
apellidoUsuario varchar (100) not null,
fechaNacimientoUsuario DATE not null,
edadUsuario int (10) not null,
departamentoUsuario varchar (50) not null,
municipioUsuario varchar (50) not null,
direccionUsuario varchar (100) not null,
profesionUsuario varchar (50) not null,
telefonoUsuario varchar (10) not null,
correoUsuario varchar (60) not null,
contraseniaUsuario varchar (45) not null,
fk_id_rol int (10) not null,
foreign key (fk_id_rol) references rol (idRol)
ON DELETE CASCADE ON UPDATE CASCADE);
create table proveedor (
idProveedor int (10) primary key not null,
nombreProveedor varchar (100) not null,
departamentoProveedor varchar (50) not null,
municipioProveedor varchar (50) not null,
direccionProveedor varchar (100) not null,
telefonoProveedor varchar (10) not null,
correoProveedor varchar (60) not null);
create table producto (
idProducto int (10) primary key auto_increment not null,
nombreProducto varchar (100) not null,
descripcionProducto varchar (500) not null,
indicacionesProducto varchar (500) not null,
fechaCaducidadProducto DATE null,
cantidadProducto int (20) not null,
estadoProducto varchar (20) not null,
fechaRegistroProducto DATETIME DEFAULT CURRENT_TIMESTAMP,
fk_id_proveedor int (10) not null,
foreign key (fk_id_proveedor) references proveedor (idProveedor)
ON DELETE CASCADE ON UPDATE CASCADE);
create table cita_medica (
idCita int (10) primary key auto_increment,
fechaCita DATETIME DEFAULT CURRENT_TIMESTAMP,
documentoPaciente int (10) not null,
nombrePaciente varchar (100) not null,
apellidoPaciente varchar (100) not null,
fechaNacimientoPaciente DATE not null,
edadPaciente int (10) not null,
motivoCita varchar (500) not null,
tipoCita varchar (100) not null,
notasMedico varchar (500) not null,
fk_id_usuario int (10) NOT NULL,
FOREIGN KEY (fk_id_usuario) REFERENCES usuario(idUsuario) 
ON DELETE CASCADE ON UPDATE CASCADE);
create table cita_productos (
fk_id_cita int (10) not null,
fk_id_producto int (10) not null,
FOREIGN KEY (fk_id_cita) REFERENCES cita_medica (idCita),
FOREIGN KEY (fk_id_producto) REFERENCES producto (idProducto) 
ON DELETE CASCADE ON UPDATE CASCADE);