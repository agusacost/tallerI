-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2024 a las 00:49:49
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_acosta_agustin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `descripcion`) VALUES
(1, 'Frutos secos'),
(2, 'Suplementos'),
(3, 'Cereales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `fullname`, `email`, `message`) VALUES
(2, 'Agustin Acosta', 'agustin@test.com', 'Necesito comprar con urgencia!'),
(3, 'jon snow', 'jon@snow.com', 'hola'),
(4, 'Martin pescador', 'martin@test.com', 'Tengo dudas sobre mi envio. Como puedo hacer un reembolso?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Envio_detalle`
--

CREATE TABLE `Envio_detalle` (
  `id_envio` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `codigo_postal` varchar(20) NOT NULL,
  `metodo_envio` varchar(100) NOT NULL,
  `costo_envio` decimal(10,2) NOT NULL,
  `fecha_envio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Envio_detalle`
--

INSERT INTO `Envio_detalle` (`id_envio`, `venta_id`, `direccion`, `ciudad`, `provincia`, `codigo_postal`, `metodo_envio`, `costo_envio`, `fecha_envio`) VALUES
(16, 19, 'Moreno 445', 'Corrientes', 'Corrientes', '3400', '1', '1750.00', '2024-06-15 20:42:11'),
(17, 20, 'Entre rios 446', 'Corrientes', 'Corrientes', 'w3400', '1', '1750.00', '2024-06-15 21:45:17'),
(18, 21, 'Santiago del estero 822', 'Corrientes', 'Corrientes', '3400', '1', '1750.00', '2024-06-15 21:47:52'),
(19, 22, 'Moreno 445', 'Corrientes', 'Corrientes', '3400', '1', '1750.00', '2024-06-15 22:43:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfiles` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfiles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `activo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `nombre`, `descripcion`, `imagen`, `id_categoria`, `cantidad`, `precio`, `activo`) VALUES
(8, 'Almendras', '200gr', '1716413284_c9bed0a80e601146ec71.jpeg', 1, 99, '1250.00', 'SI'),
(9, 'Almohaditas', '100gr', '1716416400_85336797a6fbf8a0d67c.jpg', 3, 100, '600.00', 'SI'),
(10, 'Arroz Integral', '500gr', '1717623544_0ee233cdd189d85db335.jpg', 3, 100, '2006.99', 'SI'),
(12, 'Calcio-magnesio-zinc', '60 pastillas', '1717623865_31724fff2357624e143f.png', 2, 48, '12483.00', 'SI'),
(13, 'Multi-Collagen', '30 tabletas', '1717623929_9bc37d28596a5b7887d6.png', 2, 47, '15547.06', 'SI'),
(14, 'ONE Multiple Vitamins', '30 tabletas', '1717624028_d84749f1a0ae54aecf80.png', 2, 48, '13340.00', 'SI'),
(15, 'Vitamina-d3', '6522', '1717624056_85cbc767314a57b57f61.png', 2, 100, '6522.00', 'SI'),
(16, 'Keto Diet', '30 tabletas', '1717624109_5aac2655c3090d8651da.png', 2, 49, '16402.00', 'SI'),
(17, 'Natural Life Move', '30 tabletas', '1717624166_b5bc2cc1be3c2a19543b.png', 2, 48, '15219.00', 'SI'),
(18, 'Nueces ', '200gr', '1718232527_cec24dc858244d46d058.png', 1, 98, '2626.00', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_Pago`
--

CREATE TABLE `Tipo_Pago` (
  `id_tipoPago` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Tipo_Pago`
--

INSERT INTO `Tipo_Pago` (`id_tipoPago`, `descripcion`) VALUES
(1, 'Tarjeta de Credito'),
(2, 'Tarjeta de Debito'),
(3, 'Transferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `baja` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `id_perfil`, `baja`) VALUES
(21, 'Agustin', 'Acosta', 'admin@test.com', '$2y$10$xrRPltjZHk28zJBib3kZwe3qaaXYsx9QC./3ZMOOlrS75rZVmAEtC', 1, 'NO'),
(22, 'Susana', 'Benitez', 'su@test.com', '$2y$10$8sX9cj0m0AjmJQjbWvyqiOrzpoToH0wpcib/qrYLI30Z80B4FwHii', 2, 'NO'),
(23, 'aldo', 'Agazzani', 'aldo@test.com', '$2y$10$IJ2WFr0e5yX7TzzwYHjVTO27qIkldz4uSGZ4ab3mkVoKCxxkMkay.', 2, 'SI'),
(24, 'Agustin', 'Acosta', 'agustin@test.com', '$2y$10$DKaB7As4nCYphD3o06u74OBQHze8EmfWIM0UReksI4LYqLyuGZx02', 2, 'SI'),
(25, 'Jorge', 'Ramos', 'jorge@test.com', '$2y$10$drgbUU4V8vWJbgOch/T38etjv4w0xMq/MW/eEk892ZKaPnJ7UQ1sq', 2, 'NO'),
(26, 'Colo', 'Lagarto', 'lagarto@test.com', '$2y$10$AG0Buw0DEe3hkWgcVgd9r.NoLjfygP9xE5Xthwl658RzfBOPX9X2q', 2, 'NO'),
(27, 'Javier', 'Milei', 'milei@lla.com', '$2y$10$uEIdihL2rD.PyYXoG7INCuzQkycXWd2cXXacPS9d2e80UiA3fpdxW', 2, 'NO'),
(28, 'Victoria', 'Villarruel', 'vickyvillarruel@test.com', '$2y$10$p6lgj8LWmZqUR1x.s7v.o.srnS0ozbrJ6JdJ8TW1sxrhvLqlxF.a2', 2, 'NO'),
(29, 'Jhon', 'Snow', 'jhonnieve@test.com', '$2y$10$IW1RGxPoxtRvRTpi6OcSCuAT2rrtxwR2QS.tt650zXBLdfKX6GATa', 2, 'NO'),
(30, 'Flavio', 'Mendoza', 'flavio@test.com', '$2y$10$EZNr7HEVhhRmYOliVq4eLObyo04dWNvw3dihSEpts7pEMCEI.KQXi', 2, 'NO'),
(31, 'Anibal', 'Pachano', 'pachano@test.com', '$2y$10$XmqmZsMijO3Cv7eD7lr9puyzEbP9Tnpf.R6k0G.FUDPt1TZpMZwLK', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventas_cabecera`
--

CREATE TABLE `Ventas_cabecera` (
  `id_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total_venta` decimal(10,2) NOT NULL,
  `tipoPago_id` int(11) DEFAULT NULL,
  `tarjeta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Ventas_cabecera`
--

INSERT INTO `Ventas_cabecera` (`id_venta`, `fecha`, `usuario_id`, `total_venta`, `tipoPago_id`, `tarjeta`) VALUES
(19, '2024-06-15', 23, '5252.00', 1, '450987654021'),
(20, '2024-06-15', 31, '30766.06', 1, '31231312312312'),
(21, '2024-06-15', 23, '27702.00', 1, '25098128381231'),
(22, '2024-06-15', 22, '1250.00', 1, '459120312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventas_detalle`
--

CREATE TABLE `Ventas_detalle` (
  `id_detalle` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Ventas_detalle`
--

INSERT INTO `Ventas_detalle` (`id_detalle`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(20, 19, 18, 2, '2626.00'),
(21, 20, 13, 1, '15547.06'),
(22, 20, 17, 1, '15219.00'),
(23, 21, 12, 1, '12483.00'),
(24, 21, 17, 1, '15219.00'),
(25, 22, 8, 1, '1250.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `Envio_detalle`
--
ALTER TABLE `Envio_detalle`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `venta_id` (`venta_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Tipo_Pago`
--
ALTER TABLE `Tipo_Pago`
  ADD PRIMARY KEY (`id_tipoPago`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `Ventas_cabecera`
--
ALTER TABLE `Ventas_cabecera`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `fk_tipoPago` (`tipoPago_id`);

--
-- Indices de la tabla `Ventas_detalle`
--
ALTER TABLE `Ventas_detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Envio_detalle`
--
ALTER TABLE `Envio_detalle`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `Tipo_Pago`
--
ALTER TABLE `Tipo_Pago`
  MODIFY `id_tipoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `Ventas_cabecera`
--
ALTER TABLE `Ventas_cabecera`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `Ventas_detalle`
--
ALTER TABLE `Ventas_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Envio_detalle`
--
ALTER TABLE `Envio_detalle`
  ADD CONSTRAINT `Envio_detalle_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `Ventas_cabecera` (`id_venta`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfiles`);

--
-- Filtros para la tabla `Ventas_cabecera`
--
ALTER TABLE `Ventas_cabecera`
  ADD CONSTRAINT `Ventas_cabecera_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_tipoPago` FOREIGN KEY (`tipoPago_id`) REFERENCES `Tipo_Pago` (`id_tipoPago`);

--
-- Filtros para la tabla `Ventas_detalle`
--
ALTER TABLE `Ventas_detalle`
  ADD CONSTRAINT `Ventas_detalle_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `Ventas_cabecera` (`id_venta`),
  ADD CONSTRAINT `Ventas_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
