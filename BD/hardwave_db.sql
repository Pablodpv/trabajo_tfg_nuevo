-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2026 a las 17:52:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hardwave_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@claradelrey.com', '[]', '$2y$13$QTQNG0cptTg9PIHyIjWqnurmkSn2v22tS5yWgisrshfvI6Q.K2mPO'),
(2, 'admin@claradelrey2.com', '[]', '$2y$13$gDRk6ikAhoNGHJ7/RTZLfOvIc9G7upUImW1GyIN32i6rqS71yIHti'),
(3, 'admin@claradelrey3.com', '[]', '$2y$13$1742eT/xYixvglX6ehLis.YbEBAilhfB8xQoyuopt2YHYEjjjQA4.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--ejemplos productos
INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `image`) VALUES

-- RATONES
(1, 'Logitech G502 Hero', 'Ratón gaming con sensor HERO 25K y peso ajustable', 59.99, 'raton', 'g502.webp'),
(2, 'Razer DeathAdder V2', 'Ratón ergonómico con sensor óptico de alta precisión', 69.99, 'raton', 'deathadderv2.webp'),
(3, 'SteelSeries Rival 3', 'Ratón ligero con iluminación RGB', 34.99, 'raton', 'rival3.webp'),
(4, 'Corsair M65 RGB Elite', 'Ratón gaming con estructura de aluminio', 64.99, 'raton', 'm65.webp'),
(5, 'Logitech G305 Lightspeed', 'Ratón inalámbrico con gran autonomía', 49.99, 'raton', 'g305.webp'),
(6, 'Razer Basilisk Essential', 'Ratón con botón multifunción y diseño ergonómico', 39.99, 'raton', 'basilisk.webp'),
(7, 'HP X500', 'Ratón óptico sencillo para uso diario', 14.99, 'raton', 'x500.webp'),
(8, 'Trust GXT 838 Azor', 'Ratón gaming económico con iluminación LED', 19.99, 'raton', 'azor.webp'),
(9, 'Microsoft Bluetooth Mouse', 'Ratón compacto inalámbrico', 24.99, 'raton', 'msmouse.webp'),
(10, 'Asus TUF M3', 'Ratón gaming resistente con sensor de 7000 DPI', 29.99, 'raton', 'tufm3.webp'),

-- TECLADOS
(11, 'Corsair K55 RGB Pro', 'Teclado gaming con iluminación RGB', 49.99, 'teclado', 'k55.webp'),
(12, 'Logitech K380', 'Teclado Bluetooth compacto multidispositivo', 39.99, 'teclado', 'k380.webp'),
(13, 'Razer Ornata V3', 'Teclado híbrido con reposamuñecas', 69.99, 'teclado', 'ornata.webp'),
(14, 'Redragon Kumara K552', 'Teclado mecánico compacto', 44.99, 'teclado', 'kumara.webp'),
(15, 'HyperX Alloy Core RGB', 'Teclado gaming resistente con iluminación', 59.99, 'teclado', 'alloycore.webp'),
(16, 'Microsoft Wired Keyboard 600', 'Teclado básico de oficina', 19.99, 'teclado', 'ms600.webp'),
(17, 'Logitech G213 Prodigy', 'Teclado gaming con retroiluminación', 54.99, 'teclado', 'g213.webp'),
(18, 'Trust Primo Keyboard', 'Teclado sencillo y económico', 12.99, 'teclado', 'primo.webp'),
(19, 'Apple Magic Keyboard', 'Teclado inalámbrico elegante', 99.99, 'teclado', 'magic.webp'),
(20, 'Asus TUF K1', 'Teclado gaming con iluminación RGB', 49.99, 'teclado', 'tufk1.webp'),

-- AURICULARES
(21, 'HyperX Cloud II', 'Auriculares gaming con sonido 7.1', 79.99, 'auricular', 'cloud2.webp'),
(22, 'Logitech G432', 'Auriculares gaming con micrófono', 59.99, 'auricular', 'g432.webp'),
(23, 'Razer Kraken X', 'Auriculares ligeros con sonido envolvente', 49.99, 'auricular', 'krakenx.webp'),
(24, 'Sony WH-CH520', 'Auriculares inalámbricos con gran batería', 49.99, 'auricular', 'sony520.webp'),
(25, 'JBL Tune 510BT', 'Auriculares Bluetooth con buen sonido', 39.99, 'auricular', 'jbl510.webp'),
(26, 'Corsair HS55 Stereo', 'Auriculares gaming cómodos', 69.99, 'auricular', 'hs55.webp'),
(27, 'SteelSeries Arctis 1', 'Auriculares gaming versátiles', 59.99, 'auricular', 'arctis1.webp'),
(28, 'Apple AirPods 2', 'Auriculares inalámbricos compactos', 129.99, 'auricular', 'airpods2.webp'),
(29, 'Xiaomi Redmi Buds 4', 'Auriculares inalámbricos económicos', 29.99, 'auricular', 'buds4.webp'),
(30, 'Trust GXT 415 Zirox', 'Auriculares gaming económicos', 24.99, 'auricular', 'zirox.webp'),

-- MONITORES
(31, 'Samsung Odyssey G5', 'Monitor QHD 27 pulgadas 144Hz curvo', 249.99, 'monitor', 'g5.webp'),
(32, 'LG UltraGear 24GN600', 'Monitor 24 pulgadas Full HD 144Hz', 179.99, 'monitor', 'lg24.webp'),
(33, 'AOC 24G2U', 'Monitor gaming IPS 144Hz', 199.99, 'monitor', 'aoc24.webp'),
(34, 'BenQ GW2480', 'Monitor 24 pulgadas para oficina', 129.99, 'monitor', 'benq.webp'),
(35, 'Dell S2721HGF', 'Monitor 27 pulgadas 144Hz curvo', 229.99, 'monitor', 'dell27.webp'),
(36, 'HP X24ih', 'Monitor gaming 144Hz IPS', 189.99, 'monitor', 'hpx24.webp'),
(37, 'Asus VG248QG', 'Monitor 165Hz para gaming competitivo', 209.99, 'monitor', 'asusvg.webp'),
(38, 'MSI Optix G241', 'Monitor gaming IPS 144Hz', 179.99, 'monitor', 'msi241.webp'),
(39, 'Philips 243V7QDSB', 'Monitor económico Full HD', 119.99, 'monitor', 'philips.webp'),
(40, 'Samsung Smart Monitor M5', 'Monitor inteligente con apps integradas', 269.99, 'monitor', 'm5.webp');