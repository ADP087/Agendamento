-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2024 às 23:55
-- Versão do servidor: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` int(11) NOT NULL,
  `id_dia` int(11) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_dia`, `horario`, `status`, `id_usuario`, `id_sala`) VALUES
(1, 1, '19:15:00', 0, NULL, 1),
(2, 1, '20:00:00', 0, NULL, 1),
(3, 1, '21:00:00', 0, NULL, 1),
(4, 1, '21:45:00', 0, NULL, 1),
(5, 2, '19:15:00', 0, NULL, 1),
(6, 2, '20:00:00', 0, NULL, 1),
(7, 2, '21:00:00', 0, NULL, 1),
(8, 2, '21:45:00', 0, NULL, 1),
(9, 3, '19:15:00', 0, NULL, 1),
(10, 3, '20:00:00', 0, NULL, 1),
(11, 3, '21:00:00', 0, NULL, 1),
(12, 3, '21:45:00', 0, NULL, 1),
(13, 4, '19:15:00', 0, NULL, 1),
(14, 4, '20:00:00', 0, NULL, 1),
(15, 4, '21:00:00', 0, NULL, 1),
(16, 4, '21:45:00', 0, NULL, 1),
(17, 5, '19:15:00', 0, NULL, 1),
(18, 5, '20:00:00', 0, NULL, 1),
(19, 5, '21:00:00', 0, NULL, 1),
(20, 5, '21:45:00', 0, NULL, 1),
(21, 1, '19:15:00', 0, NULL, 2),
(22, 1, '20:00:00', 0, NULL, 2),
(23, 1, '21:00:00', 0, NULL, 2),
(24, 1, '21:45:00', 0, NULL, 2),
(25, 2, '19:15:00', 0, NULL, 2),
(26, 2, '20:00:00', 0, NULL, 2),
(27, 2, '21:00:00', 0, NULL, 2),
(28, 2, '21:45:00', 0, NULL, 2),
(29, 3, '19:15:00', 0, NULL, 2),
(30, 3, '20:00:00', 0, NULL, 2),
(31, 3, '21:00:00', 0, NULL, 2),
(32, 3, '21:45:00', 0, NULL, 2),
(33, 4, '19:15:00', 0, NULL, 2),
(34, 4, '20:00:00', 0, NULL, 2),
(35, 4, '21:00:00', 0, NULL, 2),
(36, 4, '21:45:00', 0, NULL, 2),
(37, 5, '19:15:00', 0, NULL, 2),
(38, 5, '20:00:00', 0, NULL, 2),
(39, 5, '21:00:00', 0, NULL, 2),
(40, 5, '21:45:00', 0, NULL, 2),
(41, 1, '19:15:00', 0, NULL, 3),
(42, 1, '20:00:00', 0, NULL, 3),
(43, 1, '21:00:00', 0, NULL, 3),
(44, 1, '21:45:00', 0, NULL, 3),
(45, 2, '19:15:00', 0, NULL, 3),
(46, 2, '20:00:00', 0, NULL, 3),
(47, 2, '21:00:00', 0, NULL, 3),
(48, 2, '21:45:00', 0, NULL, 3),
(49, 3, '19:15:00', 0, NULL, 3),
(50, 3, '20:00:00', 0, NULL, 3),
(51, 3, '21:00:00', 0, NULL, 3),
(52, 3, '21:45:00', 0, NULL, 3),
(53, 4, '19:15:00', 0, NULL, 3),
(54, 4, '20:00:00', 0, NULL, 3),
(55, 4, '21:00:00', 0, NULL, 3),
(56, 4, '21:45:00', 0, NULL, 3),
(57, 5, '19:15:00', 0, NULL, 3),
(58, 5, '20:00:00', 0, NULL, 3),
(59, 5, '21:00:00', 0, NULL, 3),
(60, 5, '21:45:00', 0, NULL, 3),
(61, 1, '19:15:00', 0, NULL, 4),
(62, 1, '20:00:00', 0, NULL, 4),
(63, 1, '21:00:00', 0, NULL, 4),
(64, 1, '21:45:00', 0, NULL, 4),
(65, 2, '19:15:00', 0, NULL, 4),
(66, 2, '20:00:00', 0, NULL, 4),
(67, 2, '21:00:00', 0, NULL, 4),
(68, 2, '21:45:00', 0, NULL, 4),
(69, 3, '19:15:00', 0, NULL, 4),
(70, 3, '20:00:00', 0, NULL, 4),
(71, 3, '21:00:00', 0, NULL, 4),
(72, 3, '21:45:00', 0, NULL, 4),
(73, 4, '19:15:00', 0, NULL, 4),
(74, 4, '20:00:00', 0, NULL, 4),
(75, 4, '21:00:00', 0, NULL, 4),
(76, 4, '21:45:00', 0, NULL, 4),
(77, 5, '19:15:00', 0, NULL, 4),
(78, 5, '20:00:00', 0, NULL, 4),
(79, 5, '21:00:00', 0, NULL, 4),
(80, 5, '21:45:00', 0, NULL, 4),
(81, 1, '19:15:00', 0, NULL, 5),
(82, 1, '20:00:00', 0, NULL, 5),
(83, 1, '21:00:00', 0, NULL, 5),
(84, 1, '21:45:00', 0, NULL, 5),
(85, 2, '19:15:00', 0, NULL, 5),
(86, 2, '20:00:00', 0, NULL, 5),
(87, 2, '21:00:00', 0, NULL, 5),
(88, 2, '21:45:00', 0, NULL, 5),
(89, 3, '19:15:00', 0, NULL, 5),
(90, 3, '20:00:00', 0, NULL, 5),
(91, 3, '21:00:00', 0, NULL, 5),
(92, 3, '21:45:00', 0, NULL, 5),
(93, 4, '19:15:00', 0, NULL, 5),
(94, 4, '20:00:00', 0, NULL, 5),
(95, 4, '21:00:00', 0, NULL, 5),
(96, 4, '21:45:00', 0, NULL, 5),
(97, 5, '19:15:00', 0, NULL, 5),
(98, 5, '20:00:00', 0, NULL, 5),
(99, 5, '21:00:00', 0, NULL, 5),
(100, 5, '21:45:00', 0, NULL, 5),
(101, 1, '19:15:00', 0, NULL, 6),
(102, 1, '20:00:00', 0, NULL, 6),
(103, 1, '21:00:00', 0, NULL, 6),
(104, 1, '21:45:00', 0, NULL, 6),
(105, 2, '19:15:00', 0, NULL, 6),
(106, 2, '20:00:00', 0, NULL, 6),
(107, 2, '21:00:00', 0, NULL, 6),
(108, 2, '21:45:00', 0, NULL, 6),
(109, 3, '19:15:00', 0, NULL, 6),
(110, 3, '20:00:00', 0, NULL, 6),
(111, 3, '21:00:00', 0, NULL, 6),
(112, 3, '21:45:00', 0, NULL, 6),
(113, 4, '19:15:00', 0, NULL, 6),
(114, 4, '20:00:00', 0, NULL, 6),
(115, 4, '21:00:00', 0, NULL, 6),
(116, 4, '21:45:00', 0, NULL, 6),
(117, 5, '19:15:00', 0, NULL, 6),
(118, 5, '20:00:00', 0, NULL, 6),
(119, 5, '21:00:00', 0, NULL, 6),
(120, 5, '21:45:00', 0, NULL, 6),
(121, 1, '19:15:00', 0, NULL, 7),
(122, 1, '20:00:00', 0, NULL, 7),
(123, 1, '21:00:00', 0, NULL, 7),
(124, 1, '21:45:00', 0, NULL, 7),
(125, 2, '19:15:00', 0, NULL, 7),
(126, 2, '20:00:00', 0, NULL, 7),
(127, 2, '21:00:00', 0, NULL, 7),
(128, 2, '21:45:00', 0, NULL, 7),
(129, 3, '19:15:00', 0, NULL, 7),
(130, 3, '20:00:00', 0, NULL, 7),
(131, 3, '21:00:00', 0, NULL, 7),
(132, 3, '21:45:00', 0, NULL, 7),
(133, 4, '19:15:00', 0, NULL, 7),
(134, 4, '20:00:00', 0, NULL, 7),
(135, 4, '21:00:00', 0, NULL, 7),
(136, 4, '21:45:00', 0, NULL, 7),
(137, 5, '19:15:00', 0, NULL, 7),
(138, 5, '20:00:00', 0, NULL, 7),
(139, 5, '21:00:00', 0, NULL, 7),
(140, 5, '21:45:00', 0, NULL, 7),
(141, 1, '19:15:00', 0, NULL, 8),
(142, 1, '20:00:00', 0, NULL, 8),
(143, 1, '21:00:00', 0, NULL, 8),
(144, 1, '21:45:00', 0, NULL, 8),
(145, 2, '19:15:00', 1, 4, 8),
(146, 2, '20:00:00', 1, 4, 8),
(147, 2, '21:00:00', 0, NULL, 8),
(148, 2, '21:45:00', 0, NULL, 8),
(149, 3, '19:15:00', 0, NULL, 8),
(150, 3, '20:00:00', 0, NULL, 8),
(151, 3, '21:00:00', 0, NULL, 8),
(152, 3, '21:45:00', 0, NULL, 8),
(153, 4, '19:15:00', 0, NULL, 8),
(154, 4, '20:00:00', 0, NULL, 8),
(155, 4, '21:00:00', 0, NULL, 8),
(156, 4, '21:45:00', 0, NULL, 8),
(157, 5, '19:15:00', 1, 4, 8),
(158, 5, '20:00:00', 1, 4, 8),
(159, 5, '21:00:00', 0, NULL, 8),
(160, 5, '21:45:00', 0, NULL, 8),
(161, 1, '19:15:00', 0, NULL, 9),
(162, 1, '20:00:00', 0, NULL, 9),
(163, 1, '21:00:00', 0, NULL, 9),
(164, 1, '21:45:00', 0, NULL, 9),
(165, 2, '19:15:00', 0, NULL, 9),
(166, 2, '20:00:00', 0, NULL, 9),
(167, 2, '21:00:00', 0, NULL, 9),
(168, 2, '21:45:00', 0, NULL, 9),
(169, 3, '19:15:00', 0, NULL, 9),
(170, 3, '20:00:00', 0, NULL, 9),
(171, 3, '21:00:00', 0, NULL, 9),
(172, 3, '21:45:00', 0, NULL, 9),
(173, 4, '19:15:00', 0, NULL, 9),
(174, 4, '20:00:00', 0, NULL, 9),
(175, 4, '21:00:00', 0, NULL, 9),
(176, 4, '21:45:00', 0, NULL, 9),
(177, 5, '19:15:00', 0, NULL, 9),
(178, 5, '20:00:00', 0, NULL, 9),
(179, 5, '21:00:00', 0, NULL, 9),
(180, 5, '21:45:00', 0, NULL, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias`
--

CREATE TABLE IF NOT EXISTS `dias` (
  `id_dia` int(11) NOT NULL,
  `nome_dia` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dias`
--

INSERT INTO `dias` (`id_dia`, `nome_dia`) VALUES
(1, 'Segunda'),
(2, 'Terca'),
(3, 'Quarta'),
(4, 'Quinta'),
(5, 'Sexta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `id_sala` int(11) NOT NULL,
  `nome_sala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id_sala`, `nome_sala`) VALUES
(1, 'Sala 1'),
(2, 'Sala 2'),
(3, 'Sala 3'),
(4, 'Sala 4'),
(5, 'Sala 5'),
(6, 'Sala 6'),
(7, 'Sala 7'),
(8, 'Sala 8'),
(9, 'Sala 9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `tipo_usuario`) VALUES
(1, 'Arthur', 'ar@gmail.com', '$2y$10$KdC8FNP8qNWGlD3kfzao6e5WEu8X6.73FTSSqrZqKBvJp3UB/KYyS', 'ADM'),
(2, 'Andre', 'Andre@gmail.com', '$2y$10$9k10uXdfjOXaZ7f/3C5ECOxATPgu3tgG4PpqsoPQAbsHY4oY8kHBy', 'Professor'),
(3, 'lucimara', 'lu@gmail.com', '$2y$10$KnCsNAiM8nqqUGwItZ6g/ulxQ0rGEHNLPJmaZzApOW4lsjLavIPva', 'Professor'),
(4, 'Luan', 'luan@gmail.com', '$2y$10$bT3N.ewaKHpQOVLFz8yYJOcMX9QN9wSSS/w86iaJa/4art2uzHu8y', 'Professor'),
(5, 'Savio', 'Savio@gmail.com', '$2y$10$DtbIZhVw7Pz5STotbZCpeOLFEp7DrSMDjRKD16YRP330it18blzmO', 'Professor'),
(7, 'Daniela', 'Daniela@gmail.com', '$2y$10$jYOOeWNIpmZMjvFc5So9HujfxMM.v4Wl.e0s/.kOglAGiCK7cQjUW', 'Professor'),
(10, 'tesdt', 'test@gmail.com', '$2y$10$OM3RTPPvlDPaQXyaJJTmI.OMBFjJm8oH0.aSRWYH0.N2jjr0py822', 'Professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_dia` (`id_dia`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`),
  ADD CONSTRAINT `agendamentos_ibfk_3` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
