-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2023 a las 10:10:00
-- Versión del servidor: 8.0.33-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supermarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--
DROP DATABASE supermarket;
CREATE DATABASE supermarket;

USE supermarket;

DROP TABLE `categoria`;
CREATE TABLE `categoria` (
  `Categoria_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Categoria_Nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Imagen` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--
INSERT INTO `categoria` (`Categoria_ID`, `Categoria_Nombre`, `Descripcion`, `Imagen`) VALUES
(1, 'Dulces', 'Dulces con mucha azucar', 0x747261696e65725665726d656e2e6a7067),
(2, 'VideoJuegos', 'Sexo 2: EL Juego y la Venganza', 0x6573746562616e2e6a706567),
(3, 'Vehiculos', 'Automoviles/Motos/Etc', 0x63616d696c6f432e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--
DROP TABLE `clientes`;
CREATE TABLE `clientes` (
  `Clientes_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Celular` bigint NOT NULL,
  `Compania` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Clientes_ID`, `Celular`, `Compania`) VALUES
(1, 3125902312, 'CampusLands'),
(2, 3028323257, '4-72'),
(3, 355252640, 'Felipe\'s Pizzeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--
DROP TABLE `empleados`;
CREATE TABLE `empleados` (
  `Empleados_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Celular` bigint NOT NULL,
  `Direccion` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Imagen` mediumblob NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Empleados_ID`, `Nombre`, `Celular`, `Direccion`, `Imagen`) VALUES
(1, 'Santiago Lopez Garcia', 3133550755, 'Cll 111 #45-56', 0x656d706c6561646f312e6a7067),
(2, 'Ana Maria Higaldo Figeroa', 987654321, 'Kr 40 #57-69A', 0x656d706c6561646f322e6a7067),
(3, 'Kevin Cordoba', 3404040, 'No se', 0x656d706c6561646f312e6a7067),
(4, 'Liney Lopez', 320214532, 'Santa Helena', 0x64656661756c742e6a7067);
-------------------------------------------------------------------------
DROP TABLE `facturas`;
CREATE TABLE `facturas` (
  `Facturas_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Empleados_ID` int NOT NULL,
  `Clientes_ID` int NOT NULL,
  `Fecha` date NOT NULL,
  FOREIGN KEY (`Empleados_ID`) REFERENCES `empleados`(`Empleados_ID`),
  FOREIGN KEY (`Clientes_ID`) REFERENCES `clientes`(`Clientes_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `facturas` (`Facturas_ID`, `Empleados_ID`, `Clientes_ID`, `Fecha`) VALUES
(1, 1, 1, '2023-05-26'),
(2, 4, 3, '2023-05-30');  
----------------------------------------------------------------------
DROP TABLE `facturasDetalle`;
CREATE TABLE `facturasDetalle` (
  `Detalles_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Facturas_ID` int NOT NULL,
  `Productos_ID` int NOT NULL,
  `Cantidad` int NOT NULL,
  `PrecioVenta` VARCHAR(60) NOT NULL,
  FOREIGN KEY (`Facturas_ID`) REFERENCES `facturas`(`Facturas_ID`),
  FOREIGN KEY (`Productos_ID`) REFERENCES `productos`(`Productos_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `facturasdetalle` (`Detalles_ID`, `Facturas_ID`, `Productos_ID`, `Cantidad`, `PrecioVenta`) VALUES
(1, 2, 1, 300, '$100.000'),
(2, 2, 2, 300, '$80.000');

DROP TABLE `productos`;
CREATE TABLE `productos` (
  `Productos_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Categoria_ID` int NOT NULL,
  `Proveedor_ID` int NOT NULL,
  `Productos_Nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Precio_Unitario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Stock` int NOT NULL,
  `UnidadesPedidas` int NOT NULL,
  `Descontinuado` VARCHAR(10) NOT NULL,
  FOREIGN KEY (`Categoria_ID`) REFERENCES `categoria`(`Categoria_ID`),
  FOREIGN KEY (`Proveedor_ID`) REFERENCES `proveedor`(`Proveedor_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `productos` (`Productos_ID`, `Categoria_ID`, `Proveedor_ID`, `Productos_Nombre`, `Precio_Unitario`, `Stock`, `UnidadesPedidas`, `Descontinuado`) VALUES
(1, 2, 2, 'Metal_Gear', '$50.000', 300, 200, 'No'),
(2, 1, 3, 'Chocolatina Jet', '$1.000', 1000, 100, 'No');
------------------------------------------------------------------------------
DROP TABLE `proveedor`;
CREATE TABLE `proveedor` (
  `Proveedor_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Proveedor_Nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Telefono` bigint NOT NULL,
  `Ciudad` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `proveedor` (`Proveedor_ID`, `Proveedor_Nombre`, `Telefono`, `Ciudad`) VALUES
(1, 'Kevin Santiago Lopez Cordoba', 3227571273, 'Bucaramanga, Santander'),
(2, 'Carlos David Florez', 123456789, 'Piedecuesta, Santander'),
(3, 'Juan Camilo Amargo Orduz', 3215262421, 'Floridablanca, Santander');
----------------------------------------------------------------------------

DROP TABLE `users`;
CREATE TABLE `users`(
  `Users_ID` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Empleados_ID` int NOT NULL,
  `Email` VARCHAR(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Username` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` VARCHAR(72) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo_Usuario` VARCHAR(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  FOREIGN KEY (`Empleados_ID`) REFERENCES `empleados`(`Empleados_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `users` (`Users_ID`, `Empleados_ID`, `Email`, `Username`, `password`, `Tipo_Usuario`) VALUES
(1, 1, 'Santiagolopezgarcia22@gmail.com', 'TotixT', '202cb962ac59075b964b07152d234b70', 'Administrativo'),
(2, 2, 'Anita@gmail.com', 'Anita1', '202cb962ac59075b964b07152d234b70', 'Administrativo'),
(3, 3, 'Kevin@gmail.com', 'Kevin_Wolf', '202cb962ac59075b964b07152d234b70', 'Estandar'),
(4, 4, 'LineyLopez@gmail.com', 'EsoTilin', '202cb962ac59075b964b07152d234b70', 'Estandar');

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Categoria_ID`);

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Clientes_ID`);

ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Empleados_ID`);

ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Facturas_ID`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`Productos_ID`);

ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Proveedor_ID`);

ALTER TABLE `categoria`
  MODIFY `Categoria_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `clientes`
  MODIFY `Clientes_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `empleados`
  MODIFY `Empleados_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `facturas`
  MODIFY `Facturas_ID` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
  MODIFY `Productos_ID` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `proveedor`
  MODIFY `Proveedor_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
