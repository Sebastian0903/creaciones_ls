-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2019 a las 09:07:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `cc` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `total` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cc`, `nombre`, `apellido`, `telefono`, `fecha_entrega`, `total`) VALUES
(1000000000, 'Maleta aa', 'dsfsdvsd', '3242342345', '2019-10-31', '$ 74,000.00'),
(2147483647, 'Maleta aa', 'fsdfsef', '3242342342', '2019-10-25', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproduct`
--

CREATE TABLE `tbproduct` (
  `id` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproduct`
--

INSERT INTO `tbproduct` (`id`, `name`, `img`, `precio`) VALUES
('1', 'Tula blanca', '6.jpg', '12000'),
('2', 'Maleta vinotinto', '2.jpg', '45000'),
('32', 'Cachucha roja y blanco', '32.jpg', '6000'),
('4', 'Chaqueta gris', '7b.jpg', '38000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombre`, `apellido`, `tipo_usr`, `correo`, `usuario`, `contrasena`, `tipo_id`, `identificacion`) VALUES
('Sebastian', 'Jiménez ', 'value1', 'admin@gmail.com', 'black', 'qwer', 'C.C', '19124927'),
('Alberto', 'Arvelaez', 'value1', 'manuel@gmail.com', 'manolo', 'mnbv', 'C.C', '19124927'),
('raul', 'Montaña', 'value1', 'nancy@gmail.com', 'greere', 'pñlo', 'C.C', '9876543211'),
('kevin', 'Rios', 'value4', 'kevin@gmail.com', 'kevin09', 'rios25', 'C.C', '675849321'),
('Sebastian', 'Rios', 'value4', 'seb@gmail.com', 'donpa', 'qwer', 'C.I', '435235646'),
('Arturo', 'Montaña', 'value2', 'raz@gmail.com', 'TatianaJimenez', 'poiu', 'C.E', '10908797'),
('bruno', 'diaz', '#', 'diaz@gmail.com', 'agul', 'zxcv', 'C.C', '111111111'),
('hercules', 'anfitrion', 'value3', 'herc@gmail.com', 'Matahidra', '12345', 'C.E', '32423433'),
('Standford', 'Pains', 'D.E', 'stan@gmail.com', 'Cipher1', '123456', 'C.E', '91827364'),
('Genifer', 'Beltran', 'D.E', 'geniferbeltran@gmail.com', 'Tin', 'asdfg', 'C.C', '1003710209');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cc`);

--
-- Indices de la tabla `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
