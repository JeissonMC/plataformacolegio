-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2019 a las 01:11:37
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID` int(11) NOT NULL,
  `Codigo` varchar(255) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Edad` varchar(255) DEFAULT NULL,
  `Curso` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID`, `Codigo`, `Nombre`, `Apellido`, `Edad`, `Curso`, `Telefono`, `Direccion`) VALUES
(17, '1088355850', 'Andres', 'Arango ', '14', '10A', '232132', ' cra 4 837_092'),
(18, '1088463542', 'Hector', 'Valencia', '16', '10A', '232132', ' cra 4 837_092'),
(23, '1088355888', 'Maribel', 'moscoso', '15', '10A', '13133', 'M5 cs 7'),
(40, '1088355850', 'Jhon', 'Sneyder', '15', '6A', '13133', 'M5 cs 7'),
(41, '1088355850', 'Jeisson', 'Moscoso', '15', '6A', '3125643', ' cra 4 837_092'),
(42, '1088355888', 'jeisson', 'Sneyder', '34', '9B', '3125643', ' cra 4 837_092'),
(44, '1088463542', 'Cristian', 'Gomez', '15', '6A', '3125643', ' cra 4 837_092'),
(45, '1225389410', 'Miguel', 'Angel', '16', '10A', '6588586', 'MZ 5 cs 9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `Fecha` varchar(255) DEFAULT NULL,
  `Materia` varchar(255) DEFAULT NULL,
  `Cedula` int(11) DEFAULT NULL,
  `Grado` varchar(255) DEFAULT NULL,
  `nombrecompleto` varchar(255) DEFAULT NULL,
  `Asistio` int(11) DEFAULT NULL,
  `Jornada` int(11) NOT NULL,
  `Obervacion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`Fecha`, `Materia`, `Cedula`, `Grado`, `nombrecompleto`, `Asistio`, `Jornada`, `Obervacion`) VALUES
('2019-05-15', 'Ingles', 40, ' 6A', ' Jhon Sneyder', 1, 1, ' iasgfkjash kfhkjh'),
('2019-05-15', 'Ingles', 41, ' 6A', ' Jeisson Moscoso', 0, 0, ' 0987654'),
('2019-05-15', 'Ingles', 44, ' 6A', ' Cristian Gomez', 1, 1, ' balbablablablab'),
('2019-05-14', 'Biologia', 0, ' 10A', ' Andres Arango ', 1, 1, ' yuqwyn ynfofasdy fo'),
('2019-05-14', 'Biologia', 0, ' 10A', ' Maribel moscoso', 0, 0, ' -0as-df0-asd-f0-as0df-0'),
('2019-05-14', 'Biologia', 0, ' 10A', ' Miguel Angel', 1, 1, ' =a-sd=f-as=d-f=as-df='),
('2019-05-16', 'Ingles', 234567890, ' 6A', ' Jhon Sneyder', 1, 0, ' asdfasdf'),
('2019-05-16', 'Ingles', 234567890, ' 6A', ' Jeisson Moscoso', 0, 0, ' asdfasdfasdfasdf'),
('2019-05-16', 'Ingles', 234567890, ' 6A', ' Cristian Gomez', 1, 0, ' sadfasdfasdfasdfasdfasdfasdfasdf'),
('2019-05-15', 'Biologia', 546576789, ' 10A', ' Hector Valencia', 0, 0, ' '),
('2019-05-15', 'Biologia', 546576789, ' 10A', ' Andres Arango ', 0, 0, ' '),
('2019-05-15', 'Biologia', 546576789, ' 10A', ' Maribel moscoso', 0, 0, ' '),
('2019-05-15', 'Biologia', 546576789, ' 10A', ' Miguel Angel', 0, 0, ' '),
('2019-05-16', 'Biologia', 987897987, ' 6A', ' Cristian Gomez', 1, 1, ' '),
('2019-05-16', 'Biologia', 987897987, ' 6A', ' Jhon Sneyder', 1, 1, ' '),
('2019-05-16', 'Biologia', 987897987, ' 6A', ' Jeisson Moscoso', 0, 0, ' ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `Cedula` varchar(255) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Profesion` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Materias` varchar(255) NOT NULL,
  `Cursos` varchar(255) NOT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `Clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `Cedula`, `Nombre`, `Apellido`, `Profesion`, `Direccion`, `Telefono`, `Materias`, `Cursos`, `Usuario`, `Clave`) VALUES
(1, '1088345218', 'Carlos', ' Giraldo', ' Ingeniero de  sistemas', ' Mz 1 cs 8', 2147483647, ' Espanol', ' 9A', ' Carlos1 ', ' Carlos1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `Nombre`) VALUES
(1, 'Ingles'),
(2, 'Biologia'),
(3, 'Matematicas'),
(4, 'Espanol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroexterno`
--

CREATE TABLE `registroexterno` (
  `id` int(11) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Fecha` varchar(255) DEFAULT NULL,
  `Moivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registroexterno`
--

INSERT INTO `registroexterno` (`id`, `Cedula`, `Nombre`, `Apellido`, `Telefono`, `Fecha`, `Moivo`) VALUES
(1, 1088345275, 'Leyder', 'GaÃ±an', 3125643, '2019-04-22', 'Visitar al hijo ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registroexterno`
--
ALTER TABLE `registroexterno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registroexterno`
--
ALTER TABLE `registroexterno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
