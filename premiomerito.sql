-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2021 a las 21:06:20
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `premiomerito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `codigo_administrador` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `numero_documento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`codigo_administrador`, `nombre`, `apellido`, `celular`, `email`, `contrasena`, `numero_documento`) VALUES
(1151707, 'adrian camilo', 'rodriguez franco', '3137623509', 'adrean130320@gmail.com', '1234', '1007321243');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `administrador_codigo_administrador` int(11) DEFAULT NULL,
  `convocatoria_id_convocatoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE `convocatoria` (
  `id_convocatoria` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `administrador_codigo_administrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacion`
--

CREATE TABLE `postulacion` (
  `usuario_codigo_usuario` int(11) DEFAULT NULL,
  `categoria_id_categoria` int(11) DEFAULT NULL,
  `id_postulante` int(11) NOT NULL,
  `fecha_postulacion` date NOT NULL,
  `calificacion` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `tipoDocumento` varchar(20) NOT NULL,
  `numero_documento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo_usuario`, `nombre`, `apellidos`, `email`, `contrasena`, `tipoDocumento`, `numero_documento`) VALUES
(1151732, 'danna deily', 'duque conde', 'dannadeilydc@ufps.edu.co', '1234', '1', '1010075720');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`codigo_administrador`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `categoria_administrador_FK` (`administrador_codigo_administrador`),
  ADD KEY `categoria_convocatoria_FK` (`convocatoria_id_convocatoria`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`id_convocatoria`),
  ADD KEY `convocatoria_administrador_FK` (`administrador_codigo_administrador`);

--
-- Indices de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`id_postulante`),
  ADD KEY `postulacion_categoria_FK` (`categoria_id_categoria`),
  ADD KEY `postulacion_usuario_FK` (`usuario_codigo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_administrador_FK` FOREIGN KEY (`administrador_codigo_administrador`) REFERENCES `administrador` (`codigo_administrador`),
  ADD CONSTRAINT `categoria_convocatoria_FK` FOREIGN KEY (`convocatoria_id_convocatoria`) REFERENCES `convocatoria` (`id_convocatoria`);

--
-- Filtros para la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD CONSTRAINT `convocatoria_administrador_FK` FOREIGN KEY (`administrador_codigo_administrador`) REFERENCES `administrador` (`codigo_administrador`);

--
-- Filtros para la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD CONSTRAINT `postulacion_categoria_FK` FOREIGN KEY (`categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `postulacion_usuario_FK` FOREIGN KEY (`usuario_codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
