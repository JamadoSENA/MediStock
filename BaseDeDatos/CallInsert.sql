CALL INSERTARUSUARIO(123456789, 'CC', 'Juan', 'Pérez', '1990-01-01', 34, 'M', '555-1234', 'Ingeniero', 'Calle 123', 'juan.perez@example.com', 'password123', 1);
CALL INSERTARUSUARIO(987654321, 'TI', 'Ana', 'García', '1985-05-05', 39, 'F', '555-5678', 'Médico', 'Calle 456', 'ana.garcia@example.com', 'password456', 2);
CALL INSERTARUSUARIO(112233445, 'CC', 'Carlos', 'Martínez', '1978-09-09', 45, 'M', '555-9101', 'Abogado', 'Calle 789', 'carlos.martinez@example.com', 'password789', 1);
CALL INSERTARUSUARIO(998877665, 'CC', 'Laura', 'Rodríguez', '1995-03-15', 29, 'F', '555-1122', 'Contadora', 'Calle 101', 'laura.rodriguez@example.com', 'password101', 2);
CALL INSERTARUSUARIO(445566778, 'CE', 'Pedro', 'López', '1982-07-07', 42, 'M', '555-3344', 'Arquitecto', 'Calle 202', 'pedro.lopez@example.com', 'password202', 1);

CALL INSERTARPACIENTE(223344556, 'CC', 'María', 'Fernández', '1992-08-12', 31, 'F', '555-2233', 'Enfermera', 'Calle 303', 'maria.fernandez@example.com');
CALL INSERTARPACIENTE(334455667, 'TI', 'José', 'Gómez', '1980-11-23', 43, 'M', '555-4455', 'Técnico', 'Calle 404', 'jose.gomez@example.com');
CALL INSERTARPACIENTE(445566778, 'CC', 'Luis', 'Ramírez', '1975-02-14', 49, 'M', '555-5566', 'Comerciante', 'Calle 505', 'luis.ramirez@example.com');
CALL INSERTARPACIENTE(556677889, 'CE', 'Sofía', 'Torres', '1988-04-18', 36, 'F', '555-6677', 'Doctora', 'Calle 606', 'sofia.torres@example.com');
CALL INSERTARPACIENTE(667788990, 'CC', 'Miguel', 'Díaz', '1994-06-30', 30, 'M', '555-7788', 'Estudiante', 'Calle 707', 'miguel.diaz@example.com');

CALL INSERTARCITA(1, 'Pendiente', '2024-07-21', '10:00', 223344556, 987654321);
CALL INSERTARCITA(2, 'Confirmada', '2024-07-22', '11:00', 334455667, 987654321);
CALL INSERTARCITA(3, 'Cancelada', '2024-07-23', '09:00', 445566778, 123456789);
CALL INSERTARCITA(4, 'Pendiente', '2024-07-24', '13:00', 556677889, 123456789);
CALL INSERTARCITA(5, 'Confirmada', '2024-07-25', '14:00', 667788990, 987654321);

CALL INSERTARPRESCRIPCION('Tomar una vez al día', 'Paracetamol', 'paracetamol.pdf', 1);
CALL INSERTARPRESCRIPCION('Aplicar en el área afectada', 'Crema antibiótica', 'crema_antibiotica.pdf', 2);
CALL INSERTARPRESCRIPCION('Tomar después de cada comida', 'Omeprazol', 'omeprazol.pdf', 3);
CALL INSERTARPRESCRIPCION('Inhalar cada 6 horas', 'Salbutamol', 'salbutamol.pdf', 4);
CALL INSERTARPRESCRIPCION('Administrar cada 8 horas', 'Amoxicilina', 'amoxicilina.pdf', 5);

CALL INSERTARPROVEEDOR(1001, 'Proveedor A', 'Calle Proveedor 1', 'proveedorA@example.com', '555-8888');
CALL INSERTARPROVEEDOR(1002, 'Proveedor B', 'Calle Proveedor 2', 'proveedorB@example.com', '555-9999');
CALL INSERTARPROVEEDOR(1003, 'Proveedor C', 'Calle Proveedor 3', 'proveedorC@example.com', '555-7777');
CALL INSERTARPROVEEDOR(1004, 'Proveedor D', 'Calle Proveedor 4', 'proveedorD@example.com', '555-6666');
CALL INSERTARPROVEEDOR(1005, 'Proveedor E', 'Calle Proveedor 5', 'proveedorE@example.com', '555-5555');

CALL INSERTARMEDICINA('Ibuprofeno', 'Tabletas', 200, 'Disponible', '2025-01-01', 'Analgésico', 1001);
CALL INSERTARMEDICINA('Paracetamol', 'Tabletas', 150, 'Disponible', '2024-12-31', 'Antipirético', 1002);
CALL INSERTARMEDICINA('Amoxicilina', 'Cápsulas', 100, 'Disponible', '2025-06-30', 'Antibiótico', 1003);
CALL INSERTARMEDICINA('Salbutamol', 'Inhalador', 50, 'Disponible', '2025-03-31', 'Broncodilatador', 1004);
CALL INSERTARMEDICINA('Loratadina', 'Jarabe', 80, 'Disponible', '2024-11-30', 'Antihistamínico', 1005);

CALL INSERTARMEDICINASPRESCRIPCION(30, 1, 1);
CALL INSERTARMEDICINASPRESCRIPCION(20, 2, 2);
CALL INSERTARMEDICINASPRESCRIPCION(10, 3, 3);
CALL INSERTARMEDICINASPRESCRIPCION(15, 4, 4);
CALL INSERTARMEDICINASPRESCRIPCION(25, 5, 5);
