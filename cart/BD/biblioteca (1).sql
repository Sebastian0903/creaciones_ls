-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2019 a las 12:54:12
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliardb`
--

CREATE TABLE `auxiliardb` (
  `identidadda` int(100) NOT NULL,
  `tipoida` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipousr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreda` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correoda` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenada` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `auxiliardb`
--

INSERT INTO `auxiliardb` (`identidadda`, `tipoida`, `tipousr`, `nombreda`, `correoda`, `contrasenada`, `passa`) VALUES
(19124927, 'ce', 'secundary', 'Jose Triana', 'josemanuel@outlook.com', 'e978d28d1ae5f02a531780d215093ca04ea05a4b', 'manolo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliotecario`
--

CREATE TABLE `bibliotecario` (
  `identificaciondb` int(100) NOT NULL,
  `tipoid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipousrb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombredb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correodb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenadb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bibliotecario`
--

INSERT INTO `bibliotecario` (`identificaciondb`, `tipoid`, `tipousrb`, `nombredb`, `correodb`, `contrasenadb`, `pass`) VALUES
(1000787255, 'cc', 'primary', 'Samuel Triana', 'samueltriana159@gmail.com', 'e978d28d1ae5f02a531780d215093ca04ea05a4b', 'samuel159');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `tipoidd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iddd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombredd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `areadd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `celulardd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correodd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`tipoidd`, `iddd`, `nombredd`, `areadd`, `celulardd`, `correodd`) VALUES
('cc', '1212121212', 'Juan Pablo Prieto', 'Sistemas', '3204516668', 'jp69@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo de computo`
--

CREATE TABLE `equipo de computo` (
  `seriales` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad de computadores` int(25) NOT NULL,
  `código de los computadores` int(25) NOT NULL,
  `cantidad de tablets` int(25) NOT NULL,
  `código de tablets` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `tipidde` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idde` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombrede` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cursode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celularde` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`tipidde`, `idde`, `nombrede`, `cursode`, `celularde`, `correode`) VALUES
('cc', '10908797', 'Samuel Triana', '1201', '3219806433', 'samueltriana@gmail.com'),
('ti', '1208907', 'Lesly  Rodriguez ', '1104', '321234556', 'leslo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genero` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `nombre`, `autor`, `genero`, `cantidad`) VALUES
('A-MN', 'La odisea', 'Homero', 'Novela', 7),
('A-STV', 'La iliada', 'Homero', 'Novela', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio social`
--

CREATE TABLE `servicio social` (
  `identificación del estudiante de servicio social` int(25) NOT NULL,
  `nombre del estudiante de servicio social` text COLLATE utf8_spanish_ci NOT NULL,
  `curso del estudiante de servicio social` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `edad del estudiante de servicio social` int(25) NOT NULL,
  `horas realizadas` time(6) NOT NULL,
  `codigo del libro` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Identidad` int(200) NOT NULL,
  `Tipo_user` varchar(200) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Usuario` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `crypted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombre`, `Apellido`, `Identidad`, `Tipo_user`, `Correo`, `Usuario`, `contrasena`, `crypted`) VALUES
('deivid', 'Correa', 0, 'primary', 'djcorrea@misena.edu.co', 'feyenord', '123', '61e4db242b097b5ca873b26c2f244c41a66048f8'),
('juancho', 'pulido', 23456, 'primary', 'admin@gmail.com', 'jasu', '123', '61e4db242b097b5ca873b26c2f244c41a66048f8'),
('Diana ', 'Toledo', 1123467, 'secundary', 'dmtr2001@gmail.com', 'dimatoru', 'qqwery', '61e4db242b097b5ca873b26c2f244c41a66048f8'),
('Manuel', 'Triana', 19124927, 'primary', 'josemanuel@outlook.com', 'manolo', '123', '61e4db242b097b5ca873b26c2f244c41a66048f8'),
('Yamile', 'Peláez ferreira', 52177964, 'primary', 'yamilepelaezf@hotmail.com', 'Yamile', 'camila', '61e4db242b097b5ca873b26c2f244c41a66048f8'),
('Tatiana', 'Jiménez ', 1000726874, 'primary', 'tatajm123@gmail.com', 'TatianaJimenez', 'tatianajimenez', '61e4db242b097b5ca873b26c2f244c41a66048f8'),
('Samuel Alonso', 'Triana Rincon', 1000787255, 'primary', 'samueltriana159@gmail.com', 'Admin', 'samuel159', '61e4db242b097b5ca873b26c2f244c41a66048f8'),
('Joan Sebastian', 'Triana mora ', 1000831197, 'primary', 'striana893@gmail.com', 'Triana', 'triana', '61e4db242b097b5ca873b26c2f244c41a66048f8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auxiliardb`
--
ALTER TABLE `auxiliardb`
  ADD PRIMARY KEY (`identidadda`);

--
-- Indices de la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD PRIMARY KEY (`identificaciondb`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddd`);

--
-- Indices de la tabla `equipo de computo`
--
ALTER TABLE `equipo de computo`
  ADD PRIMARY KEY (`seriales`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idde`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `servicio social`
--
ALTER TABLE `servicio social`
  ADD PRIMARY KEY (`identificación del estudiante de servicio social`),
  ADD KEY `codigo del libro` (`codigo del libro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Identidad`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicio social`
--
ALTER TABLE `servicio social`
  ADD CONSTRAINT `Conexion libros` FOREIGN KEY (`codigo del libro`) REFERENCES `libros` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
