-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2019 at 12:37 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(45) NOT NULL,
  `cat_detalle` varchar(100) DEFAULT NULL,
  `cat_condicion` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nom`, `cat_detalle`, `cat_condicion`) VALUES
(1, 'Moda Mujer', 'Es la categoría de Mujeres', 1),
(2, 'Moda Hombre', 'Es la categoría de Hombres', 1),
(3, 'Moda Niños', 'Es la categoría de niños', 1),
(4, 'Moda Niñas', 'Es la categoría de niñas', 1),
(5, 'Moda Bebes Varones', 'Es la categoría de bebes', 1),
(6, 'Moda de Bebes Mujeres', 'Es la categoría de Bebes', 1),
(7, 'Ropas Usadas', 'Ropas Usadas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categoriadetalle`
--

CREATE TABLE `categoriadetalle` (
  `det_id` int(11) NOT NULL,
  `det_nom` varchar(45) NOT NULL,
  `subcategoria_sub_id` int(11) NOT NULL,
  `categoria_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoriadetalle`
--

INSERT INTO `categoriadetalle` (`det_id`, `det_nom`, `subcategoria_sub_id`, `categoria_cat_id`) VALUES
(8, 'Abrigos y Chaquetas', 12, 1),
(9, 'Jersey', 12, 1),
(10, 'Camisetas', 12, 1),
(11, 'Ropa deportiva', 12, 1),
(12, 'Pantalones', 12, 1),
(13, 'Faldas', 12, 1),
(14, 'Vestidos de fiesta', 12, 1),
(15, 'Vestidos de novia', 12, 1),
(16, 'Vestidos', 12, 1),
(17, 'Premamá', 12, 1),
(18, 'Tops', 12, 1),
(19, 'Lencería y bikinis', 12, 1),
(20, 'Otros', 12, 1),
(21, 'Zapatillas', 13, 1),
(22, 'Zapatos', 13, 1),
(23, 'Sandalias', 13, 1),
(24, 'Botas', 13, 1),
(25, 'Botines', 13, 1),
(26, 'Otros', 13, 1),
(27, 'Bolsos', 14, 1),
(28, 'Cinturones', 14, 1),
(29, 'Accesorios', 14, 1),
(30, 'Gafas', 14, 1),
(31, 'Relojes', 14, 1),
(32, 'Perfumes', 14, 1),
(33, 'Cosméticos', 14, 1),
(34, 'Disfraces', 14, 1),
(35, 'Anillos', 15, 1),
(36, 'Collares y colgantes', 15, 1),
(37, 'Pendientes', 15, 1),
(38, 'Pulseras', 15, 1),
(39, 'Joyerías', 15, 1),
(40, 'Otros', 15, 1),
(41, 'Abrigos y Chaquetas', 16, 2),
(42, 'Camisas', 16, 2),
(43, 'Polos', 16, 2),
(44, 'Camisetas', 16, 2),
(45, 'Pantalones', 16, 2),
(46, 'Trajes de Novio', 16, 2),
(47, 'Otros', 16, 2),
(48, 'Zapatillas', 17, 2),
(49, 'Zapatos', 17, 2),
(50, 'Botas y botines', 17, 2),
(51, 'Otros', 17, 2),
(52, 'Cinturones', 18, 2),
(53, 'Gafas', 18, 2),
(54, 'Relojes', 18, 2),
(55, 'Accesorios', 18, 2),
(56, 'Joyas', 18, 2),
(57, 'Perfumes y colonias', 18, 2),
(58, 'Disfraces', 18, 2),
(59, 'Remeras', 19, 3),
(60, 'Pantalones', 25, 5),
(61, 'Conjuntos', 19, 3),
(62, 'Zapatillas', 17, 2),
(63, 'Zapatos', 20, 3),
(64, 'Botines y Botas', 20, 3),
(65, 'Deportivo', 20, 3),
(66, 'Perfumes y colonias', 21, 3),
(67, 'Joyas', 21, 3),
(68, 'Otros', 21, 3),
(71, 'Abrigos y Chaquetas', 22, 4),
(72, 'Pantalones', 22, 4),
(73, 'Blusas, camisettas y jerseys', 22, 4),
(74, 'Vestidos, ceremonia y uniformes', 22, 4),
(75, 'Otros', 22, 4),
(76, 'Trajes, ceremonia y uniformes', 19, 3),
(77, 'Conjuntos', 25, 5),
(78, 'Abrigos y buzos', 25, 5),
(79, 'Pantalones', 25, 5),
(80, 'Camisas, camisetas y jersey', 25, 5),
(81, 'Trajes de ceremonia', 25, 5),
(82, 'Otros', 25, 5),
(83, 'Calzados', 26, 5),
(84, 'Coches de bebe y sillas de paseo', 27, 5),
(85, 'Bañeras y caminadores', 27, 5),
(86, 'Otros', 27, 5),
(87, 'Ropas Usadas', 31, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `ciu_id` int(11) NOT NULL,
  `ciu_nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_nom`) VALUES
(2, 'Caacupé'),
(3, 'Piribebuy');

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `men_id` int(11) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `leido` int(1) NOT NULL,
  `producto_pro_id` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mensaje`
--

INSERT INTO `mensaje` (`men_id`, `celular`, `mensaje`, `nombre`, `ciudad`, `leido`, `producto_pro_id`, `users_id`) VALUES
(1, '4567', 'ghjkl', 'rtju', 'Caacupe', 1, 22, 9),
(2, '4567', 'trgyhujk', 'rtyu', 'Piribebuy', 1, 21, 9),
(3, '0971770152', 'jghjkfdhgkdjfhk', 'Ricado', 'Caacupe', 0, 21, 9);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `pro_id` int(11) NOT NULL,
  `pro_nom` varchar(45) NOT NULL,
  `pro_info` varchar(200) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_oferta` int(11) DEFAULT NULL,
  `pro_ofer_active` int(1) NOT NULL,
  `pro_foto` varchar(150) NOT NULL,
  `pro_nomegusta` int(7) NOT NULL,
  `pro_megusta` int(7) NOT NULL,
  `pro_denuncia` int(1) NOT NULL,
  `categoria_cat_id` int(11) NOT NULL,
  `subcategoria_sub_id` int(11) NOT NULL,
  `categoriadetalle_det_id` int(11) NOT NULL,
  `ciudad_ciu_id` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`pro_id`, `pro_nom`, `pro_info`, `pro_precio`, `pro_oferta`, `pro_ofer_active`, `pro_foto`, `pro_nomegusta`, `pro_megusta`, `pro_denuncia`, `categoria_cat_id`, `subcategoria_sub_id`, `categoriadetalle_det_id`, `ciudad_ciu_id`, `users_id`) VALUES
(13, 'Vestido', 'Es un vestido rosa con detalles mágicos que te harán resaltar entre las demas', 200000, 190000, 1, '26230684_392398474516186_627800368819931027_n.jpg', 0, 0, 0, 1, 12, 16, 2, 7),
(14, 'Blusa Floreada', 'Un espectacular vestido para lucir el verano de la mejor manera', 80000, 79000, 1, '26239119_392398231182877_4791430382161367322_n.jpg', 0, 0, 0, 1, 12, 10, 2, 7),
(15, 'Conjunto negro', 'El mejor conjunto para vestir una onda atrevida y a la moda, el verano en tus manos.', 200000, 185000, 1, '26731477_392398107849556_4779224854617960068_n.jpg', 0, 0, 0, 1, 12, 16, 2, 7),
(16, 'Vestido floreado', 'La mejor prenda para el verano, no te podes perder este hermoso vestido de verano, para ser vos misma', 100000, NULL, 0, '26731520_392398334516200_6955646771239292946_n.jpg', 0, 0, 0, 1, 12, 16, 2, 7),
(17, 'Body & short', 'El mejor conjunto para el verano no te podes perder la oportunidad de vestirte bien este verano las mejores prendas de Alba para ti', 280000, 260000, 1, '26231683_1996910833887040_7621720115970298068_n.jpg', 0, 5, 0, 1, 12, 11, 2, 8),
(18, 'Short & Blusas', 'Son las mejores prendas para sentirte a la moda este verano no lo dejes pasar', 80000, 85000, 1, '26239721_1996910883887035_325570492515114650_n.jpg', 0, 0, 0, 1, 12, 18, 2, 8),
(19, 'Body & Short', 'Las mejor prenda para vestir a la moda todo aquí en alba accesorios', 200000, 180000, 1, '26730783_1996910853887038_652814870556370707_n.jpg', 3, 2, 0, 1, 12, 14, 2, 8),
(20, 'Conjunto de playa', 'Un hermoso conjunto de playa para criatura para que tu hija vista a la moda del verano', 90000, 85000, 1, '26166255_1599962703426100_1129817365808119294_n.jpg', 1, 1, 0, 4, 22, 73, 2, 9),
(21, 'Championes', 'Hermosos championes para vestir a la moda y sentirte comoda', 120000, NULL, 0, '22728723_1529201280502243_5406998362299530611_n.jpg', 0, 0, 0, 1, 13, 21, 2, 9),
(22, 'Camisas & Pantalones', 'Hermosas Camisas y Pantalones para caballeros a elegir y vestir a la moda', 150000, NULL, 0, '26168705_1593082527447451_9058029825584733596_n.jpg', 1, 0, 0, 2, 16, 42, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subcategoria`
--

CREATE TABLE `subcategoria` (
  `sub_id` int(11) NOT NULL,
  `sub_nom` varchar(45) NOT NULL,
  `categoria_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategoria`
--

INSERT INTO `subcategoria` (`sub_id`, `sub_nom`, `categoria_cat_id`) VALUES
(12, 'Ropa', 1),
(13, 'Calzado', 1),
(14, 'Complementos', 1),
(15, 'Joyas y bisutería', 1),
(16, 'Ropa', 2),
(17, 'Calzado', 2),
(18, 'Complementos', 2),
(19, 'Ropa', 3),
(20, 'Calzados', 3),
(21, 'Accesorios', 3),
(22, 'Ropa', 4),
(23, 'Calzados', 4),
(24, 'Accesorios', 4),
(25, 'Ropa', 5),
(26, 'Calzado', 5),
(27, 'Accesorios', 5),
(28, 'Ropa', 6),
(29, 'Calzado', 6),
(30, 'Accesorios', 6),
(31, 'Ropas Usadas', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `cel` int(15) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` int(1) NOT NULL,
  `ciudad_ciu_id` int(11) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `direccion`, `cel`, `foto`, `descripcion`, `activo`, `ciudad_ciu_id`, `admin`) VALUES
(1, 'Ricardo Saucedo', 'richar.saucedo@gmail.com', '$2y$10$PJBMgpOTh44izwPxsyaXuumzW9Yuok8q2opXE0cOzfFxY8OiZfXCK', 'v8D87bxHB4Hc7OBEcC0OyfrPX7HeI8xPs4q4NJslHFsJIKj8omoGrF48tuH6', '2017-12-29 17:45:39', '2018-01-15 13:09:33', 'Bº Santa María Caacupé', 971770152, '2131234.jpg', 'Administrador y desarrollador de la Página', 0, 2, 1),
(7, 'La Tienda De Raquel', 'raquel@tienda.com', '$2y$10$iRCyH7bfKYosrVtu449O7e8jD.7HpPaU7rELkJarcvFibyuOcRw5.', '2y7UfakpqkIG1zXCrKvdlpGpjdBe0SrQaanCDPzctPMxgHc9VsLROUUzOw6N', '2018-01-15 13:18:24', '2018-01-15 13:18:24', 'Enrique Bravar 2138 c/ Piribebuy ( A media cuadra de la Plaza Antonio Parquet)', 981747206, '14992066_221993318223370_556732902358766210_n.jpg', 'Prendas masculinas y femeninas, calzados, accesorios, bazar', 1, 2, 0),
(8, 'ALBA Accesorios', 'alba@tienda.com', '$2y$10$qORiYjk9.nL5oskd4zD7KOAbxjmlM4ka2cXsTPm0qk9ChAenrbgVu', 'IKhVVBcYR0dbDFN5UKV2KB0vdKGGNtwOk5BZhqmpHSrJFo4oxmiiAOVcZbTc', '2018-01-15 13:55:11', '2018-01-15 13:55:11', 'Alberdi 903 casi variante ruta 2 Ciudad de Caacupé', 982100530, '22279609_1953850371526420_5877224312311308371_n.jpg', 'Dirección: Alberdi 903 casi variante ruta 2 Ciudad de Caacupé\r\nLunes a Sábado de 9 a 18hs\r\nWsp 0982100530', 1, 2, 0),
(9, 'Malú Boutique', 'malu@tienda.com', '$2y$10$t45glMaEWvanW4i4KTs8oOOg8G3HfOvEXW.yjSyrInRSPlaH2JDKi', 'AqM6WKXQxzm5OOQvRdrnCamyBIFpJwPNLTGPc7oAO4uFixxRW9IAiZPwxq8p', '2018-01-15 14:14:34', '2018-01-15 14:46:20', 'av. del Agricultor y 8 de Diciembre. sucursal 1 Ruta Mcal Estigarribia/ Juan E Oleary', 511244340, 'malu.jpg', 'Malú Boutique ahora en Moda Cordillera. Estamos trabajando para que en esta página puedas encontrar toda la variedad en prendas y calzados que necesitas.', 1, 2, 0),
(10, 'El Baratisimo de Brenes', 'baratisimo@tienda.com', '$2y$10$.JZ4y8fVpSbx3lic6EiPzewHxPG/gDLVKTZ0P5X14bhXsDETcZM6G', 'GSy4bICtDYns3MZERRb1K83Vd7bJKpWoACKVHB1RKwnsqLwAAuCCc8IOLZwc', '2018-01-15 14:44:30', '2018-05-29 22:37:48', 'el agricultor entre 8 de diciembre y concepcion', 971909236, '563276_421205801301802_148231193_n.jpg', 'Tienda de calzados, ropas, lencerias, bazar regalos y mucho mas', 0, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `categoriadetalle`
--
ALTER TABLE `categoriadetalle`
  ADD PRIMARY KEY (`det_id`),
  ADD KEY `fk_categoriadetalle_subcategoria1_idx` (`subcategoria_sub_id`),
  ADD KEY `fk_categoriadetalle_categoria1_idx` (`categoria_cat_id`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciu_id`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`men_id`),
  ADD KEY `fk_mensaje_producto_idx` (`producto_pro_id`),
  ADD KEY `fk_mensaje_users1_idx` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_producto_categoria1_idx` (`categoria_cat_id`),
  ADD KEY `fk_producto_subcategoria1_idx` (`subcategoria_sub_id`),
  ADD KEY `fk_producto_categoriadetalle1_idx` (`categoriadetalle_det_id`),
  ADD KEY `fk_producto_ciudad1_idx` (`ciudad_ciu_id`),
  ADD KEY `fk_producto_users1_idx` (`users_id`);

--
-- Indexes for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `fk_subcategoria_categoria1_idx` (`categoria_cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_ciudad1_idx` (`ciudad_ciu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categoriadetalle`
--
ALTER TABLE `categoriadetalle`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `men_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoriadetalle`
--
ALTER TABLE `categoriadetalle`
  ADD CONSTRAINT `fk_categoriadetalle_categoria1` FOREIGN KEY (`categoria_cat_id`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categoriadetalle_subcategoria1` FOREIGN KEY (`subcategoria_sub_id`) REFERENCES `subcategoria` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_mensaje_producto` FOREIGN KEY (`producto_pro_id`) REFERENCES `producto` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensaje_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_cat_id`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_categoriadetalle1` FOREIGN KEY (`categoriadetalle_det_id`) REFERENCES `categoriadetalle` (`det_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_ciudad1` FOREIGN KEY (`ciudad_ciu_id`) REFERENCES `ciudad` (`ciu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_subcategoria1` FOREIGN KEY (`subcategoria_sub_id`) REFERENCES `subcategoria` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_subcategoria_categoria1` FOREIGN KEY (`categoria_cat_id`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_ciudad1` FOREIGN KEY (`ciudad_ciu_id`) REFERENCES `ciudad` (`ciu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
