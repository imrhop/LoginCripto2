-- Crear base de datos
CREATE DATABASE IF NOT EXISTS cryptoLogin;
USE cryptoLogin;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    correo VARCHAR(100) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    ap_paterno VARCHAR(100) NOT NULL,
    ap_materno VARCHAR(100) NOT NULL
);

-- Tabla de credenciales
CREATE TABLE credenciales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL UNIQUE,
    contrasena_hash VARCHAR(255) NOT NULL,
    codigo_verificacion VARCHAR(10),
    fecha_envio_codigo DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Relación usuario-estado actual
CREATE TABLE estado_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL UNIQUE,
    estado INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE tokens_recuperacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    expiracion DATETIME NOT NULL,
    usado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
