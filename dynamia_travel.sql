-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-12-2019 a las 00:56:21
-- Versión del servidor: 5.7.28-0ubuntu0.18.04.4
-- Versión de PHP: 5.6.40-14+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dynamia_travel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_12_204524_create_travels_table', 1),
(2, '2019_12_13_030554_create_passengers_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `travel_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `passengers`
--

INSERT INTO `passengers` (`id`, `ci`, `name`, `phone`, `email`, `travel_id`, `created_at`, `updated_at`) VALUES
(1, '86102324124', 'Yubisel Vega Alvarez', '093303307', 'yubiselv@gmail.com', 1, '2019-12-13 20:26:47', '2019-12-13 20:26:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `travel_date` date NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `travels`
--

INSERT INTO `travels` (`id`, `travel_date`, `origin`, `destination`, `cost`, `created_at`, `updated_at`) VALUES
(1, '2019-12-10', 'ecuador', 'nicaragua', 280, '2019-12-13 20:22:46', '2019-12-13 20:22:46'),
(2, '2019-12-10', 'mexico', 'honduras', 2045, '2019-12-13 20:23:07', '2019-12-13 20:23:07'),
(3, '2019-12-10', 'cuba', 'canada', 2855, '2019-12-13 20:23:23', '2019-12-13 20:23:23'),
(21, '2019-12-19', 'francia', 'inglaterra', 3405, '2019-12-15 14:17:44', '2019-12-15 20:16:43'),
(22, '2019-12-15', 'holanda', 'nicaragua', 345, '2019-12-15 17:34:33', '2019-12-15 20:16:28'),
(23, '2019-12-20', 'arabia', 'rusia', 4520, '2019-12-15 20:16:15', '2019-12-15 20:16:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passengers_email_unique` (`email`),
  ADD KEY `passengers_travel_id_foreign` (`travel_id`);

--
-- Indices de la tabla `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travels` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
