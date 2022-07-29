-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 02:30:41
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desarrollo_web_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta`
--

CREATE TABLE `acta` (
  `ID` int(11) NOT NULL,
  `ASUNTO` varchar(250) NOT NULL,
  `FECHA` date NOT NULL,
  `DESCRIPCION` varchar(500) NOT NULL,
  `RESPONSABLE` varchar(255) NOT NULL,
  `PROGRAMA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acta`
--

INSERT INTO `acta` (`ID`, `ASUNTO`, `FECHA`, `DESCRIPCION`, `RESPONSABLE`, `PROGRAMA_ID`) VALUES
(7, 'ACTA 1', '2022-07-01', 'REUNION PROFESORES', 'JUAN PEREZ', 1),
(22, 'nueva acta', '2022-07-28', 'REUNION DE PROFESORES', 'MIGUEL MONTES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromisos`
--

CREATE TABLE `compromisos` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `FECHA_INIC` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `RESPONSABLE` varchar(255) NOT NULL,
  `ID_ACTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compromisos`
--

INSERT INTO `compromisos` (`ID`, `DESCRIPCION`, `FECHA_INIC`, `FECHA_FIN`, `RESPONSABLE`, `ID_ACTA`) VALUES
(2, 'REVISION DE ACTIVIDADES', '2022-07-01', '2022-07-03', 'RODOLFO RODRIGUEZ', 7),
(7, 'MODIFICAR CALENDARIA ACADEMICO', '2022-07-28', '2022-07-30', 'miguel solano', 7),
(8, 'otro compromiso', '2022-07-28', '2022-07-29', 'miguel solano', 7),
(9, 'otro mas', '2022-07-27', '2022-07-30', 'larry perez', 7),
(15, 'MODIFICAR CALENDARIA ACADEMICO', '2022-07-28', '2022-07-30', 'larry perez', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depencias`
--

CREATE TABLE `depencias` (
  `ID` int(11) NOT NULL,
  `PROGRAMAS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `depencias`
--

INSERT INTO `depencias` (`ID`, `PROGRAMAS`) VALUES
(1, 'ING DE SISTEMAS'),
(2, 'ADMI EN SALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `ID` int(11) NOT NULL,
  `PROGRAMA` varchar(255) NOT NULL,
  `FACULTAD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`ID`, `PROGRAMA`, `FACULTAD`) VALUES
(1, 'INGENIERIA DE SOFTWARE', 'FACULTAD DE INGENIERIA'),
(2, 'ADMINISTRACION EN SALUD', 'FACULTAD DE SALUD Y MEDICINA'),
(3, 'BACTERIOLOGIA', 'FACULTAD DE SALUD Y MEDICINA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `TIPO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID_TIPO_USUARIO`, `TIPO`) VALUES
(1, 'PROFESOR'),
(2, 'ADMINISTRATIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOMBRES` varchar(100) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `CORREO` varchar(150) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(535) NOT NULL,
  `TIPO_USUARIO_PK` int(11) NOT NULL,
  `DEPENDENCIA_PK` int(11) NOT NULL,
  `IDENTIFICACION` int(20) NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRES`, `APELLIDOS`, `CORREO`, `USERNAME`, `PASSWORD`, `TIPO_USUARIO_PK`, `DEPENDENCIA_PK`, `IDENTIFICACION`, `ACTIVO`) VALUES
(33, 'jorge', 'montes', 'jooge199813@gmail.com', 'tomm1998', '$2y$10$i0pwvRA.A.m9TeIzdAcy3eCOq5G/1iZgfi6a.Y97bh/E7QhZcSpKa', 1, 1, 102, 1),
(45, 'dina', 'gomez', 'digoes2003@gmail.com', 'dina', '$2y$10$CS/02iPNDnmWUVO9yjqFIORHtQUbv.uMRb0e5WLTz6b4GFuy6L9xW', 2, 1, 21312312, 1),
(50, 'jorge', 'MONTES GOMEZ', 'jooge1998@gmail.com', 'jorge', '$2y$10$qYW90.VKmtZx1cO5uu90t.YMVcrQikrZ6OvDwcStmO3IuL7TwuD8e', 1, 1, 1003405445, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta`
--
ALTER TABLE `acta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PROGRAMA_ID` (`PROGRAMA_ID`);

--
-- Indices de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ACTA` (`ID_ACTA`);

--
-- Indices de la tabla `depencias`
--
ALTER TABLE `depencias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_TIPO_USUARIO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TIPO_USUARIO_PK` (`TIPO_USUARIO_PK`),
  ADD KEY `DEPENDENCIA_PK` (`DEPENDENCIA_PK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta`
--
ALTER TABLE `acta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `depencias`
--
ALTER TABLE `depencias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_TIPO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta`
--
ALTER TABLE `acta`
  ADD CONSTRAINT `acta_ibfk_2` FOREIGN KEY (`PROGRAMA_ID`) REFERENCES `programa` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD CONSTRAINT `compromisos_ibfk_1` FOREIGN KEY (`ID_ACTA`) REFERENCES `acta` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`DEPENDENCIA_PK`) REFERENCES `depencias` (`ID`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`TIPO_USUARIO_PK`) REFERENCES `tipo_usuario` (`ID_TIPO_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
