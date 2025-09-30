-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2025
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `proyecto_visas`;
USE `proyecto_visas`;

-- --------------------------------------------------------
-- Tabla: clientes
-- --------------------------------------------------------

CREATE TABLE `clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(100) NOT NULL,
  `estado` VARCHAR(50) NOT NULL,
  `observaciones` TEXT DEFAULT NULL,
  `activo` TINYINT(1) DEFAULT 1,
  `correo` VARCHAR(100) DEFAULT NULL,
  `telefono` VARCHAR(30) DEFAULT NULL,
  `tipo_visa` VARCHAR(100) DEFAULT NULL,
  `tipo_tramite` VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `clientes` (`id`, `nombre`, `estado`, `observaciones`, `activo`, `correo`, `telefono`, `tipo_visa`, `tipo_tramite`) VALUES
(1, 'Sebastián', 'Denegado', 'todo completo', 1, 'sebas@gmail.com', '882828', 'VISA1', 'Reagrupación'),
(2, 'Leslie', 'En proceso', 'ssssssss', 1, 'leslie@gmail.com', '12312312312', 'VISA2', 'Reagrupación');

-- --------------------------------------------------------
-- Tabla: cliente_requisitos
-- --------------------------------------------------------

CREATE TABLE `cliente_requisitos` (
  `cliente_id` INT(11) NOT NULL,
  `requisito_id` INT(11) NOT NULL,
  `cumplido` TINYINT(1) DEFAULT 0,
  PRIMARY KEY (`cliente_id`, `requisito_id`),
  KEY `requisito_id` (`requisito_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cliente_requisitos` (`cliente_id`, `requisito_id`, `cumplido`) VALUES
(1, 1, 0);

-- --------------------------------------------------------
-- Tabla: entrevistas
-- --------------------------------------------------------

CREATE TABLE `entrevistas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cliente_id` INT(11) NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `embajada` VARCHAR(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `entrevistas` (`id`, `cliente_id`, `fecha`, `hora`, `embajada`) VALUES
(1, 1, '2025-07-05', '16:32:00', 'Española'),
(4, 1, '2025-07-06', '21:15:00', 'Española');

-- --------------------------------------------------------
-- Tabla: pagos
-- --------------------------------------------------------

CREATE TABLE `pagos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cliente_id` INT(11) NOT NULL,
  `fecha_contrato` DATE NOT NULL,
  `fecha_pago` DATE DEFAULT NULL,
  `monto_total` DECIMAL(10,2) NOT NULL,
  `moneda` ENUM('BOB','USD','EUR') DEFAULT 'BOB',
  `usa_cuotas` TINYINT(1) DEFAULT 0,
  `cuota1` DECIMAL(10,2) DEFAULT NULL,
  `cuota2` DECIMAL(10,2) DEFAULT NULL,
  `cuota3` DECIMAL(10,2) DEFAULT NULL,
  `cuota4` DECIMAL(10,2) DEFAULT NULL,
  `cuota5` DECIMAL(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pagos` (`id`, `cliente_id`, `fecha_contrato`, `fecha_pago`, `monto_total`, `moneda`, `usa_cuotas`, `cuota1`, `cuota2`, `cuota3`, `cuota4`, `cuota5`) VALUES
(23, 1, '2025-07-19', '2025-07-25', 100.00, 'BOB', 1, 50.00, 50.00, NULL, NULL, NULL);

-- --------------------------------------------------------
-- Tabla: requisitos
-- --------------------------------------------------------

CREATE TABLE `requisitos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(100) NOT NULL,
  `tipo_documento` ENUM('Original','Copia') NOT NULL DEFAULT 'Original'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `requisitos` (`id`, `nombre`, `tipo_documento`) VALUES
(1, 'Requisito1', 'Original'),
(2, 'Requisito2.0', 'Original');

-- --------------------------------------------------------
-- Relaciones (Foreign Keys)
-- --------------------------------------------------------

ALTER TABLE `cliente_requisitos`
  ADD CONSTRAINT `cliente_requisitos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cliente_requisitos_ibfk_2` FOREIGN KEY (`requisito_id`) REFERENCES `requisitos` (`id`) ON DELETE CASCADE;

ALTER TABLE `entrevistas`
  ADD CONSTRAINT `entrevistas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

-- --------------------------------------------------------
-- AUTO_INCREMENT valores
-- --------------------------------------------------------

ALTER TABLE `clientes` AUTO_INCREMENT = 12;
ALTER TABLE `entrevistas` AUTO_INCREMENT = 5;
ALTER TABLE `pagos` AUTO_INCREMENT = 27;
ALTER TABLE `requisitos` AUTO_INCREMENT = 4;

COMMIT;
