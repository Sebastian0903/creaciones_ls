-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2020 a las 22:20:17
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacion1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_compra`
--

CREATE TABLE `carro_compra` (
  `id_carro` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `id cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carro_compra`
--

INSERT INTO `carro_compra` (`id_carro`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `id cliente`) VALUES
(10001, 301, 10, 18000.00, 103),
(10001, 302, 150, 6000.00, 103),
(100002, 302, 300, 6000.00, 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `telefono_cliente` int(10) NOT NULL,
  `email_cliente` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_cliente` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cliente` tinyint(4) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `estado_cliente`, `fecha_registro`) VALUES
(101, 'Juan Carlos', 717987451, 'JuanC@gmail.com', 'Cra 75 Norte 2-15', 1, '2019-04-16'),
(102, 'AlVA Martínez', 713587451, 'Alva@gmail.com', 'Cra 2-15', 2, '2018-02-11'),
(103, 'Raul Díaz', 712568451, 'RaulD@gmail.com', 'Kr No e 2-15', 1, '2018-07-16'),
(104, 'Martín González', 717910451, 'MartínG@gmail.com', 'Cra 75 Sur 2-15', 1, '2017-10-06'),
(105, 'Hilda Cortéz', 765667451, 'HildaC@gmail.com', 'TV 12 Norte 2-15', 1, '2019-01-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `IVA` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`numero_factura`, `id_producto`, `cantidad`, `precio_venta`, `IVA`) VALUES
(1, 301, 10, 180000, '34200'),
(2, 302, 300, 1800000, '342000'),
(1, 302, 150, 900000, '171000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones_insu`
--

CREATE TABLE `dimensiones_insu` (
  `id_producto` int(11) NOT NULL,
  `riata_triango` int(11) DEFAULT NULL,
  `riata_cargadera` int(11) DEFAULT NULL,
  `riata_puntillera` int(11) DEFAULT NULL,
  `riata_demas` int(11) DEFAULT NULL,
  `id_insumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dimensiones_insu`
--

INSERT INTO `dimensiones_insu` (`id_producto`, `riata_triango`, `riata_cargadera`, `riata_puntillera`, `riata_demas`, `id_insumo`) VALUES
(301, 35, 11, 18, NULL, 2007),
(304, 35, 11, 18, NULL, 2007);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones_pro`
--

CREATE TABLE `dimensiones_pro` (
  `id_producto` int(11) NOT NULL,
  `alto` int(11) DEFAULT NULL,
  `ancho` int(11) DEFAULT NULL,
  `base_largo` int(11) DEFAULT NULL,
  `base_ancho` int(11) DEFAULT NULL,
  `falso` int(11) DEFAULT NULL,
  `talla_chaqueta` int(11) DEFAULT NULL,
  `talla_chaqueta1` text COLLATE utf8_spanish_ci,
  `extra` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dimensiones_pro`
--

INSERT INTO `dimensiones_pro` (`id_producto`, `alto`, `ancho`, `base_largo`, `base_ancho`, `falso`, `talla_chaqueta`, `talla_chaqueta1`, `extra`) VALUES
(304, 35, 28, NULL, NULL, 14, NULL, NULL, NULL),
(303, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL),
(305, NULL, NULL, NULL, NULL, NULL, NULL, 'L', NULL),
(302, 40, 35, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  `IVA_total` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`, `estado_factura`, `IVA_total`) VALUES
(2, '2020-04-08', 0, 0, 'Efectivo', '2142000', 1, '342000'),
(1, '2020-08-22', 0, 0, 'Cheque', '1285200', 2, '205200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `id_insumo` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `color` text COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Tamanio` decimal(2,1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`id_insumo`, `nombre`, `color`, `detalle`, `Tamanio`) VALUES
(2001, 'Chapas', 'Negro', '', '2.0'),
(2002, 'Eslaider', 'Blanco', 'Simbolo musical en el tirador', '2.0'),
(2003, 'Riata ribete', 'Gris', '200 metros', '1.5'),
(2004, 'Morralera', 'Negro', '', '2.0'),
(2005, 'Broches', 'Azúl', '', '1.5'),
(2006, 'Cremallera', 'Negro', '100 metros', '1.5'),
(2007, 'Riata', 'Negro', '100 metros', '1.0'),
(2008, 'Cordon', 'Negro', '500 metros', '0.5'),
(2009, 'riata ribete', 'negro', '100 metros', '0.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_insumo`
--

CREATE TABLE `inventario_insumo` (
  `id_insumo` int(11) NOT NULL,
  `entradas` int(11) NOT NULL,
  `salidas` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario_insumo`
--

INSERT INTO `inventario_insumo` (`id_insumo`, `entradas`, `salidas`, `saldo`) VALUES
(2001, 1, 0, 2000),
(2002, 1, 0, 1000),
(2003, 1, 0, 10),
(2004, 1, 0, 1000),
(2005, 1, 0, 2000),
(2006, 1, 0, 1),
(2007, 1, 0, 1),
(2008, 1, 0, 1),
(2009, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_mat`
--

CREATE TABLE `inventario_mat` (
  `id_material` int(11) NOT NULL,
  `entradas` int(11) NOT NULL,
  `salidas` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario_mat`
--

INSERT INTO `inventario_mat` (`id_material`, `entradas`, `salidas`, `saldo`) VALUES
(1001, 1, 0, 1),
(1002, 1, 0, 1),
(1003, 1, 0, 1),
(1004, 1, 0, 1),
(1005, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_pro`
--

CREATE TABLE `inventario_pro` (
  `id_producto` int(11) NOT NULL,
  `entradas` int(11) NOT NULL,
  `salidas` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario_pro`
--

INSERT INTO `inventario_pro` (`id_producto`, `entradas`, `salidas`, `saldo`) VALUES
(301, 50, 10, 40),
(302, 2000, 150, 1850),
(302, 0, 300, 1550);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `color` text COLLATE utf8_spanish_ci NOT NULL,
  `detalle` text COLLATE utf8_spanish_ci,
  `ancho_rollo` decimal(5,1) NOT NULL,
  `metros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `nombre`, `tipo`, `color`, `detalle`, `ancho_rollo`, `metros`) VALUES
(1001, 'Lona', 'A', 'Negro', 'Rollo', '1.5', 200),
(1002, 'Codra', 'B', 'Naranja', 'Rollo', '1.6', 400),
(1003, 'Tafeta', 'A', 'Azul', 'Rollo', '1.5', 400),
(1004, 'Cambrel', 'B', 'Blanco', 'Rollo', '1.4', 300),
(1005, 'Yumbolón', 'A', 'Gris', 'Rollo', '1.6', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_insumo`
--

CREATE TABLE `mov_insumo` (
  `id_insumo` int(11) NOT NULL,
  `fecha_mov` date NOT NULL,
  `movimiento` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mov_insumo`
--

INSERT INTO `mov_insumo` (`id_insumo`, `fecha_mov`, `movimiento`, `cantidad`) VALUES
(2001, '2020-05-11', 'E', 2000),
(2002, '2020-08-03', 'E', 1000),
(2003, '2020-05-19', 'E', 10),
(2004, '2020-07-22', 'E', 1000),
(2005, '2020-08-04', 'E', 2000),
(2006, '2020-08-06', 'E', 5),
(2007, '2020-08-06', 'E', 8),
(2008, '2020-07-06', 'E', 10),
(2009, '2020-07-07', 'E', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_mat`
--

CREATE TABLE `mov_mat` (
  `id_material` int(11) NOT NULL,
  `fecha_mov` date NOT NULL,
  `movimiento` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mov_mat`
--

INSERT INTO `mov_mat` (`id_material`, `fecha_mov`, `movimiento`, `cantidad`) VALUES
(1001, '2020-03-17', 'E', 5),
(1002, '2020-05-11', 'E', 6),
(1003, '2020-08-11', 'E', 40),
(1004, '2020-07-08', 'E', 8),
(1005, '2020-06-30', 'E', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_pro`
--

CREATE TABLE `mov_pro` (
  `id_producto` int(11) NOT NULL,
  `fecha_mov` date NOT NULL,
  `movimiento` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mov_pro`
--

INSERT INTO `mov_pro` (`id_producto`, `fecha_mov`, `movimiento`, `cantidad`) VALUES
(301, '2020-08-20', 'E', 50),
(301, '2020-08-22', 'S', 10),
(302, '2020-08-18', 'E', 2000),
(302, '2020-08-21', 'S', 150),
(302, '2020-08-22', 'S', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `img` varchar(15) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `estado_producto` text NOT NULL,
  `fecha_registro` date NOT NULL,
  `precio_producto` double NOT NULL,
  `descripcion` text NOT NULL,
  `unidades_dispo` int(11) NOT NULL,
  `IVA` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `img`, `nombre_producto`, `estado_producto`, `fecha_registro`, `precio_producto`, `descripcion`, `unidades_dispo`, `IVA`) VALUES
(1, '1.jpg', 'Maleta negra', 'Inactivo', '2020-10-30', 28000, 'Negra con cremallera fea jfjsjfjdjsdf', 15, '10'),
(2, '3.png', 'Maleta roja', 'Activo', '2020-10-08', 28000, 'cremallera negra', 15, '10'),
(6, '22.jpg', 'Maleta oscura', 'Inactivo', '2020-10-14', 25000, 'Es oscuro', 30, '19'),
(3, '4.jpg', 'Maleta roja', 'Activo', '2020-10-12', 12000, 'Negra con cremallera fea', 15, '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_product`
--

CREATE TABLE `tipo_product` (
  `id_producto` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_producto` text COLLATE utf8_spanish_ci NOT NULL,
  `genero` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `id_insumo` int(11) DEFAULT NULL,
  `material_usado` int(11) DEFAULT NULL,
  `insumo_usado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_product`
--

INSERT INTO `tipo_product` (`id_producto`, `tipo_producto`, `genero`, `id_material`, `id_insumo`, `material_usado`, `insumo_usado`) VALUES
('1', 'Maletas', NULL, NULL, NULL, NULL, NULL),
('2', 'Maletas', NULL, NULL, NULL, NULL, NULL),
('3', 'Maletas', NULL, NULL, NULL, NULL, NULL),
('4', 'Maletas', NULL, NULL, NULL, NULL, NULL),
('5', 'Maletas', NULL, NULL, NULL, NULL, NULL),
('6', 'Maletas', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `tipo_usr` int(11) NOT NULL,
  `cargo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_empleado` int(11) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `apellido` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usr` int(11) NOT NULL,
  `correo` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario_n` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `telefono` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_empleado`, `nombre`, `apellido`, `tipo_usr`, `correo`, `usuario_n`, `contrasena`, `fecha_ingreso`, `telefono`) VALUES
(1003710209, 'juan', 'gjhgng', 3, 'genifer@gmail.com', 'tin', '1999', '2020-09-04', 1224422854),
(1003710210, 'seb', 'Beltran', 1, 'duvanfbeltran@gmail.com', 'admin09', '123456', '2020-09-17', 1595159515),
(1111111111, 'Duvan', 'reyes', 1, 'donpa987@gmail.com', '12fdfdf', '12345', '2020-09-11', 1111111111),
(1111111117, 'pedro', 'reyes', 1, 'Petro@gmail.com', 'admin', 'admin', '2020-10-22', 2147483647),
(1111111119, 'pedro', 'reyes', 1, 'Petro1@gmail.com', 'admin', 'admin', '2020-10-22', 2147483647),
(1444444444, 'juan', 'gjhgng', 1, 'raul@gmail.com', '', 'admin', '2020-09-16', 1111111123),
(1478523654, 'juan', 'Perez', 1, 'juan@gmail.com', 'admin', '1478', '2020-09-11', 1112223333),
(1478523696, 'pedro', 'reyes', 4, 'cliente@gmail.com', 'admin', 'admin', '2020-10-15', 1111111111);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `numero_cotizacion` (`numero_factura`,`id_producto`);

--
-- Indices de la tabla `dimensiones_insu`
--
ALTER TABLE `dimensiones_insu`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `dimensiones_pro`
--
ALTER TABLE `dimensiones_pro`
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`numero_factura`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `inventario_insumo`
--
ALTER TABLE `inventario_insumo`
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `inventario_mat`
--
ALTER TABLE `inventario_mat`
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `inventario_pro`
--
ALTER TABLE `inventario_pro`
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `mov_insumo`
--
ALTER TABLE `mov_insumo`
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `mov_mat`
--
ALTER TABLE `mov_mat`
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `mov_pro`
--
ALTER TABLE `mov_pro`
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tipo_product`
--
ALTER TABLE `tipo_product`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tipo_usr`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `user_email` (`correo`),
  ADD KEY `tipo_usr` (`tipo_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dimensiones_insu`
--
ALTER TABLE `dimensiones_insu`
  ADD CONSTRAINT `dimensiones_insu_ibfk_1` FOREIGN KEY (`id_insumo`) REFERENCES `insumo` (`id_insumo`);

--
-- Filtros para la tabla `inventario_insumo`
--
ALTER TABLE `inventario_insumo`
  ADD CONSTRAINT `inventario_insumo_ibfk_1` FOREIGN KEY (`id_insumo`) REFERENCES `insumo` (`id_insumo`);

--
-- Filtros para la tabla `inventario_mat`
--
ALTER TABLE `inventario_mat`
  ADD CONSTRAINT `inventario_mat_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`);

--
-- Filtros para la tabla `mov_insumo`
--
ALTER TABLE `mov_insumo`
  ADD CONSTRAINT `mov_insumo_ibfk_1` FOREIGN KEY (`id_insumo`) REFERENCES `inventario_insumo` (`id_insumo`);

--
-- Filtros para la tabla `mov_mat`
--
ALTER TABLE `mov_mat`
  ADD CONSTRAINT `mov_mat_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `inventario_mat` (`id_material`);

--
-- Filtros para la tabla `mov_pro`
--
ALTER TABLE `mov_pro`
  ADD CONSTRAINT `mov_pro_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `inventario_pro` (`id_producto`);

--
-- Filtros para la tabla `tipo_product`
--
ALTER TABLE `tipo_product`
  ADD CONSTRAINT `tipo_product_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `tipo_product_ibfk_2` FOREIGN KEY (`id_insumo`) REFERENCES `insumo` (`id_insumo`);

--
-- Filtros para la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD CONSTRAINT `tipo_usuario_ibfk_1` FOREIGN KEY (`tipo_usr`) REFERENCES `usuario` (`tipo_usr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
