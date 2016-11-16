-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2016 a las 21:48:50
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gymtastic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idActividad` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `aula` varchar(20) NOT NULL,
  `aforo` int(11) NOT NULL,
  `plazasOcupadas` int(11) NOT NULL,
  `fechaAct` date NOT NULL,
  `hora` time NOT NULL,
  `creadaPor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `nombre`, `descripcion`, `aula`, `aforo`, `plazasOcupadas`, `fechaAct`, `hora`, `creadaPor`) VALUES
(4, 'Pilates', ' recalca el uso de la mente para controlar el cuerpo, pero buscando el equilibrio y la unidad entre ambos. El mÃ©todo se centra en el desarrollo de los mÃºsculos internos para mantener el equilibrio corporal y dar estabilidad y firmeza a la columna vertebral, por lo que es muy usado como terapia en rehabilitaciÃ³n1 y para, por ejemplo, prevenir y curar el dolor de espalda.', '3A', 50, 0, '2016-11-17', '14:00:00', 1),
(5, 'Spinning', 'Tipo de gimnasia que se practica sobre una bicicleta estÃƒÂ¡tica y consiste en alternar la intensidad de la pedaleada en sucesivas secuencias de tiempo.', '2A', 25, 0, '2016-11-15', '20:00:00', 1),
(6, 'Zumba', 'Es una disciplina  enfocada por una parte a mantener un cuerpo saludable y por otra a desarrollar, fortalecer y dar flexibilidad al cuerpo mediante movimientos de baile.', '2B', 20, 0, '2016-11-16', '18:00:00', 1),
(7, 'Aerobic', 'El aeróbico ó la aeróbica es un tipo de deporte aeróbico que se realiza al son de la música. El aeróbic reúne todos los beneficios del ejercicio aeróbico, además de ejercitar capacidades físicas como la flexibilidad, coordinación, orientación, ritmo, etc.', '3B', 30, 0, '2016-11-19', '15:00:00', 1),
(8, 'Fitness', 'Fitness (en español buena forma) hace referencia regularmente a una actividad física de movimientos repetidos que se planifica y se sigue regularmente con el propósito de mejorar o mantener el cuerpo en buenas condiciones. Esto pone énfasis en que la salud física es el resultado de la actividad física regular, de una dieta y nutrición apropiados, además de un descanso apropiado para la recuperación física dentro de los parámetros individuales.', '1A', 40, 0, '2016-11-26', '13:00:00', 1),
(9, 'Judo', 'El judo es un arte marcial y deporte de combate de origen japonés.', '1B', 15, 0, '2016-12-08', '18:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_actividad`
--

CREATE TABLE `deportista_actividad` (
  `idDeportista` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deportista_actividad`
--

INSERT INTO `deportista_actividad` (`idDeportista`, `idActividad`) VALUES
(3, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_tablaejercicios`
--

CREATE TABLE `deportista_tablaejercicios` (
  `idDeportista` int(11) NOT NULL,
  `idTablaEjercicios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(455) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `repeticiones` varchar(45) NOT NULL,
  `carga` int(11) DEFAULT NULL,
  `creadoPor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `descripcion`, `tipo`, `repeticiones`, `carga`, `creadoPor`) VALUES
(1, 'Soloq', 'llevar a tu equipo hacia la victoria', 'espalda', '4 series de 8 repeticiones', 15, 2),
(2, 'flexiones', 'ya sabes :D', 'pecho', '4 series de 10 repeticiones', 20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio_tablaejercicios`
--

CREATE TABLE `ejercicio_tablaejercicios` (
  `idTabla` int(11) NOT NULL,
  `idEjercicio` int(11) NOT NULL,
  `comentario` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejercicio_tablaejercicios`
--

INSERT INTO `ejercicio_tablaejercicios` (`idTabla`, `idEjercicio`, `comentario`) VALUES
(1, 1, 'pues un comentario'),
(1, 2, 'en ocasiones creo comentarios para la BD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idNotificacion` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fechaCad` datetime DEFAULT NULL,
  `creadPor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idNotificacion`, `descripcion`, `fechaCad`, `creadPor`) VALUES
(1, 'Mañana se acaba el mundo, asi que pa que ir al gimnasio', '2016-11-28 12:00:00', 1),
(2, 'Hoy viene Rafa Mora a dar una lección de humildad, No os la perdais!!!', '2016-11-18 13:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `idSesion` int(11) NOT NULL,
  `fechaSesion` date NOT NULL,
  `duracion` time(6) DEFAULT NULL,
  `tabla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaejercicios`
--

CREATE TABLE `tablaejercicios` (
  `idTablaEjercicios` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `creadaPor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaejercicios`
--

INSERT INTO `tablaejercicios` (`idTablaEjercicios`, `nombre`, `creadaPor`) VALUES
(1, 'Lunes', 2),
(2, 'Martes', 2),
(3, 'Miercoles', 2),
(4, 'Jueves', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `fechaNac` date NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellidos`, `tipo`, `username`, `fechaNac`, `password`) VALUES
(1, 'Xose', 'Silva GonzÃ¡lez', 0, 'admin', '1994-04-19', '12345'),
(2, 'mister', 'entrenador', 1, 'entrenador', '2016-11-16', '54321'),
(3, 'Pepe', 'Dos Santos', 2, 'deportista', '2016-11-24', 'arribapepe'),
(4, 'Juan', 'Ceballos Gimenez', 1, 'dino24', '2016-11-10', 'qpaza');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`),
  ADD KEY `creadaPor` (`creadaPor`);

--
-- Indices de la tabla `deportista_actividad`
--
ALTER TABLE `deportista_actividad`
  ADD PRIMARY KEY (`idDeportista`,`idActividad`),
  ADD KEY `actividad_idx` (`idActividad`);

--
-- Indices de la tabla `deportista_tablaejercicios`
--
ALTER TABLE `deportista_tablaejercicios`
  ADD PRIMARY KEY (`idDeportista`,`idTablaEjercicios`),
  ADD KEY `tabla_idx` (`idTablaEjercicios`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`idEjercicio`),
  ADD KEY `creadoPor` (`creadoPor`);

--
-- Indices de la tabla `ejercicio_tablaejercicios`
--
ALTER TABLE `ejercicio_tablaejercicios`
  ADD PRIMARY KEY (`idTabla`,`idEjercicio`),
  ADD KEY `ejercicio_idx` (`idEjercicio`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD KEY `creadPor` (`creadPor`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idSesion`),
  ADD KEY `tabla_idx` (`tabla`);

--
-- Indices de la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  ADD PRIMARY KEY (`idTablaEjercicios`),
  ADD KEY `creadaPor` (`creadaPor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idSesion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  MODIFY `idTablaEjercicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `creadaPor` FOREIGN KEY (`creadaPor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deportista_actividad`
--
ALTER TABLE `deportista_actividad`
  ADD CONSTRAINT `actividadDeportista` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deportistaActividad` FOREIGN KEY (`idDeportista`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deportista_tablaejercicios`
--
ALTER TABLE `deportista_tablaejercicios`
  ADD CONSTRAINT `deportistaTabla` FOREIGN KEY (`idDeportista`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tablaDeportista` FOREIGN KEY (`idTablaEjercicios`) REFERENCES `tablaejercicios` (`idTablaEjercicios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `creadoPor` FOREIGN KEY (`creadoPor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ejercicio_tablaejercicios`
--
ALTER TABLE `ejercicio_tablaejercicios`
  ADD CONSTRAINT `ejercicioTabla` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tablaEjercicio` FOREIGN KEY (`idTabla`) REFERENCES `tablaejercicios` (`idTablaEjercicios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `creadPor` FOREIGN KEY (`creadPor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `tablaSesion` FOREIGN KEY (`tabla`) REFERENCES `tablaejercicios` (`idTablaEjercicios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  ADD CONSTRAINT `tablaejercicios_ibfk_1` FOREIGN KEY (`creadaPor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
