-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2021 a las 06:49:53
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expenseapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`) VALUES
(1, 'comida', '#DE1F59'),
(2, 'hogar', '#DE1FAA'),
(3, 'ropa', '#B01FDE'),
(4, 'Juegos', '#681FDE'),
(5, 'Viajes', '#1FAADE'),
(6, 'prueba', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses`
--

CREATE TABLE `expenses` (
  `id` int(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `category_id` int(5) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `category_id`, `amount`, `date`, `id_user`) VALUES
(1, 'prueba', 3, 12.40, '2020-03-21', 5),
(2, 'starbucks', 1, 60.00, '2020-03-21', 5),
(4, 'Regalo de cumpleaños mamá', 2, 1200.00, '2020-03-22', 5),
(5, 'Nintendo Switch', 4, 4600.00, '2020-03-26', 5),
(6, 'Viaje a Nueva York', 5, 20000.00, '2020-01-25', 5),
(7, 'Chocolates Ferrero', 1, 140.00, '2020-03-27', 5),
(10, 'sdsdsd', 1, 2323.00, '2020-04-03', 5),
(11, 'sadas', 1, 232.00, '2020-04-03', 5),
(12, 'sadas', 3, 11.00, '2020-04-03', 5),
(13, 'sdsd', 5, 23.00, '2020-04-03', 5),
(14, 'sdsd', 5, 23.00, '2020-04-03', 5),
(19, 'Chilis', 1, 300.00, '2020-01-01', 5),
(20, 'juego de Halo', 4, 1100.00, '2020-04-04', 5),
(21, 'Uñas', 3, 200.00, '2020-04-09', 6),
(23, 'pastillas para la tos', 2, 21.00, '2020-06-06', 5),
(24, 'Ropa nueva', 3, 300.00, '2020-06-04', 5),
(25, 'juego Nintendo', 2, 200.00, '2020-07-12', 5),
(27, 'pruebas', 5, 150.00, '2021-02-02', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `budget` float(10,2) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `budget`, `photo`, `name`) VALUES
(5, 'marcos', '$2y$10$0aOmd1LTFHtBLCEtDrJgy.xxs7FArnOlzHXLrviwP85LWS.XbxsNO', 'user', 100.00, 'd8eb8c58160f13143d4c6ef11c34b57a.png', 'Marcos Rivas'),
(6, 'lena', '$2y$10$C/MX.IRvzrNuMyo4pk5uU.bCD20hSWChoCM1bp4n3kEzO2TYamSI.', 'user', 16000.00, '', 'Lenis'),
(7, 'omar', '$2y$10$2YzZ9yzk2rSLbcbfBGkcIuWZ1HzjcNT8lTcgeidTiYbq2yzcNVxuq', 'user', 20000.00, '', 'El Pozos'),
(8, 'admin', '$2y$10$yrJzrG1tpFJTeRs0MuMFLutDj0gjq1zzsMnMqT1yLeYuZweA/6uuy', 'admin', 0.00, '', ''),
(9, 'clarita', '$2y$10$PtuuA249JM.Covcu58KlJ.sfHmTVRqab9zQI6BBBFwbptW9kHY1L6', 'user', 0.00, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_expense` (`id_user`),
  ADD KEY `id_category_expense` (`category_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `id_category_expense` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `id_user_expense` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
