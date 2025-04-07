-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2025 a las 03:21:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_de_celulares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Gmail` varchar(100) NOT NULL,
  `Productos` text DEFAULT NULL,
  `Mensajes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Field_name`, `Min_value`, `Max_value`, `Min_length`, `Max_length`, `Empties_or_zeros`, `Nulls`, `Avg_value_or_avg_length`, `Std`, `Optimal_fieldtype`) VALUES
(0x7469656e64615f64655f63656c756c617265732e726567697374726f2e6964, NULL, NULL, 0, 0, 0, 0, 0x302e30, 0x302e30, 0x43484152283029204e4f54204e554c4c),
(0x7469656e64615f64655f63656c756c617265732e726567697374726f2e5573756172696f, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c),
(0x7469656e64615f64655f63656c756c617265732e726567697374726f2e54656c65666f6e6f, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c),
(0x7469656e64615f64655f63656c756c617265732e726567697374726f2e476d61696c, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c),
(0x7469656e64615f64655f63656c756c617265732e726567697374726f2e50726f647563746f73, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c),
(0x7469656e64615f64655f63656c756c617265732e726567697374726f2e4d656e73616a6573, NULL, NULL, 0, 0, 0, 0, 0x302e30, NULL, 0x43484152283029204e4f54204e554c4c);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Gmail` (`Gmail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
