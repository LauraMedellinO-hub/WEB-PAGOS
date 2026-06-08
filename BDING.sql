-- Base de datos MySQL --
CREATE DATABASE sistema_alumnos;
USE sistema_alumnos;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'superusuario') NOT NULL
);

-- Insertar usuarios con contraseña asignada directamente
INSERT INTO usuarios (usuario, contrasena, rol) VALUES 
('admin', 'admin123', 'administrador'),
('superuser', 'super123', 'superusuario');


CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100) NOT NULL,
    numero_control VARCHAR(20) UNIQUE NOT NULL,
    unidad_academica VARCHAR(100) NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    semestre INT NOT NULL,
    grupo VARCHAR(10) NOT NULL,
    modalidad VARCHAR(50) NOT NULL,
    modulo INT NOT NULL
);

CREATE TABLE calificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_control VARCHAR(20) NOT NULL,
    modulo INT NOT NULL,
    unidad1 DECIMAL(5,2),
    unidad2 DECIMAL(5,2),
    unidad3 DECIMAL(5,2),
    unidad4 DECIMAL(5,2) NULL,
    unidad5 DECIMAL(5,2) NULL,
    promedio DECIMAL(5,2) NOT NULL
);

 ALTER TABLE calificaciones ADD COLUMN pago ENUM('Pagado', 'Pendiente') DEFAULT 'Pendiente';

select * from alumnos;
select * from calificaciones;




