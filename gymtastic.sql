-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2016 a las 06:02:14
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
  `creadaPor` int(11) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `nombre`, `descripcion`, `aula`, `aforo`, `plazasOcupadas`, `fechaAct`, `hora`, `creadaPor`, `imagen`) VALUES
(3, 'Spinning', 'Tipo de gimnasia que se practica sobre una bicicleta estatica y consiste en alternar la intensidad de la pedaleada en sucesivas secuencias de tiempo.', '2B', 30, 0, '2017-01-12', '20:00:00', 1, 0x7370696e6e696e672e6a7067),
(4, 'Yoga', 'Es una combinaciÃ³n de meditacion y ejercicios que mejoran la flexibilidad y la respiracion, ademas de reducir notablemente el estres gracias a la sensacion de paz interior que se consigue practicandolo.', '1A', 15, 0, '2016-11-30', '21:30:00', 1, 0x796f67612e6a7067),
(6, 'Running', 'Correr en grupo', 'Aire libre', 30, 0, '2016-11-30', '17:00:00', 1, 0x64657363617267612e6a7067),
(7, 'Zumba', 'Es una disciplina fitness creada a mediados de los aÃ±os 90 por el colombiano Alberto "Beto" Perez, enfocada por una parte a mantener un cuerpo saludable y por otra a desarrollar, fortalecer y dar flexibilidad al cuerpo mediante movimientos de baile combinados con una serie de rutinas aerobicas.', '2A', 50, 0, '2016-11-29', '21:00:00', 1, 0x7a756d62612e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_actividad`
--

CREATE TABLE `deportista_actividad` (
  `idDeportista` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `creadoPor` int(11) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `descripcion`, `tipo`, `repeticiones`, `carga`, `creadoPor`, `imagen`) VALUES
(30, 'Inclined Press', 'Sentado en un banco inclinado, sostenga una barra sobre usted enderezando sus brazos. Baje la barra hasta que quede unos 1 cm por encima del pecho. Empuje la barra hacia arriba a la posicion inicial. "Usar un banco inclinado le permite trabajar tanto los musculos del pecho como los de los hombros".', 'Pecho, hombros y triceps', '4 series de 10 repeticiones', 15, 2, 0x656a6572636963696f312e706e67),
(31, 'Overhead Squat', 'Sostenga una barra sobre su cabeza con sus codos trabados y los pies hombro-anchura aparte. Baje lentamente su cuerpo hasta que sus muslos esten paralelos al suelo. "Sujetar la barra sobre la cabeza fuerza a su cuerpo a la alineacion correcta para este ejercicio".', 'GlÃºteos, isquiotibiales, cuÃ¡driceps, mÃºscu', '4 series de 10 repeticiones', 10, 2, 0x656a6572636963696f322e706e67),
(32, 'Rear-Leg Extended Split Squat', 'Levante la barra en los hombros. Con una pierna apoyada en un banco, baje su cuerpo hacia adelante hasta que su rodilla este justo encima del suelo. "Es importante que mantenga la espalda alineada durante este ejercicio". Empuje hacia arriba a la posicion inicial. Despues de su conjunto, cambie de piernas y repita.', 'GlÃºteos, isquiotibiales y cuÃ¡driceps', '4 series de 10 repeticiones', 10, 2, 0x656a6572636963696f332e706e67),
(33, 'Barbell Rollout', 'Arrodillarse en el suelo en posicion vertical agarrando una barra. Lentamente gire la barra hacia afuera delante de usted hasta que sus brazos esten extendidos y su espalda este paralela al piso. "Es importante no arquear la espalda, y las caderas deben avanzar con los hombros". Vuelve lentamente a la posicion inicial y repite.', 'MÃºsculos centrales', '4 series de 10 repeticiones', 15, 2, 0x656a6572636963696f342e706e67),
(34, 'Straight-Legged Deadlift To Row', 'Sosteniendo una barra, de pie con los pies separados los hombros ancho, los hombros hacia atras y las caderas empujadas hacia atras. Apriete su abdomen y lentamente deslice la barra hacia abajo doblando la parte superior del cuerpo hacia adelante. A continuacion, tire de los codos hacia arriba hasta que la barra toca su seccion media. Baje la barra y vuelva a la posicion inicial.', 'GlÃºteos e isquiotibiales', '4 series de 10 repeticiones', 20, 2, 0x656a6572636963696f352e706e67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio_tablaejercicios`
--

CREATE TABLE `ejercicio_tablaejercicios` (
  `idTabla` int(11) NOT NULL,
  `idEjercicio` int(11) NOT NULL,
  `comentario` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`idSesion`, `fechaSesion`, `duracion`, `tabla`) VALUES
(1, '2016-11-01', '08:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_ejercicio`
--

CREATE TABLE `sesion_ejercicio` (
  `idDeportista` int(11) NOT NULL,
  `idEjercicio` int(11) NOT NULL,
  `idTablaEjercicios` int(11) NOT NULL,
  `idSesion` int(11) NOT NULL,
  `hecho` int(5) NOT NULL,
  `comentario` varchar(200) NOT NULL
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
(4, 'Juan', 'Ceballos Gimenez', 1, 'dino24', '2016-11-10', 'qpaza'),
(5, 'Pablo', 'Pluck', 1, 'pablo', '2016-11-03', 'pluck');

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
-- Indices de la tabla `sesion_ejercicio`
--
ALTER TABLE `sesion_ejercicio`
  ADD PRIMARY KEY (`idDeportista`,`idEjercicio`,`idTablaEjercicios`,`idSesion`),
  ADD KEY `sesion_ejercicio_idx` (`idSesion`),
  ADD KEY `sesionEjercicio` (`idEjercicio`),
  ADD KEY `sesiontabla` (`idTablaEjercicios`);

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
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idSesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  MODIFY `idTablaEjercicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- Filtros para la tabla `sesion_ejercicio`
--
ALTER TABLE `sesion_ejercicio`
  ADD CONSTRAINT `sesion` FOREIGN KEY (`idSesion`) REFERENCES `sesion` (`idSesion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sesionDeportista` FOREIGN KEY (`idDeportista`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sesionEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sesiontabla` FOREIGN KEY (`idTablaEjercicios`) REFERENCES `tablaejercicios` (`idTablaEjercicios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  ADD CONSTRAINT `tablaejercicios_ibfk_1` FOREIGN KEY (`creadaPor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
