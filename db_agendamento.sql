-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Out-2024 às 01:54
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
-- Estrutura da tabela `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(11) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `agendado_por` varchar(100) DEFAULT NULL,
  `data_agendamento` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id`, `horario`, `status`, `agendado_por`, `data_agendamento`) VALUES
(1, '19:15', 1, 'Arthur', NULL),
(2, '20:00', 0, 'Arthur', NULL),
(3, '21:00', 0, 'Arthur', NULL),
(4, '21:45', 0, 'Arthur', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_1`
--

CREATE TABLE IF NOT EXISTS `sala_1` (
  `id` int(11) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `agendado_por` varchar(100) DEFAULT NULL,
  `id_dia` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala_1`
--

INSERT INTO `sala_1` (`id`, `horario`, `status`, `agendado_por`, `id_dia`) VALUES
(1, '19:15', 0, NULL, 1),
(2, '20:00', 0, NULL, 1),
(3, '21:00', 0, NULL, 1),
(4, '21:45', 0, NULL, 1),
(5, '19:15', 0, NULL, 2),
(6, '20:00', 0, NULL, 2),
(7, '21:00', 0, NULL, 2),
(8, '21:45', 0, NULL, 2),
(9, '19:15', 0, NULL, 3),
(10, '20:00', 0, NULL, 3),
(11, '21:00', 0, NULL, 3),
(12, '21:45', 0, NULL, 3),
(13, '19:15', 0, NULL, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `tipo_usuario`) VALUES
(1, 'Arthur', 'ar@gmail.com', '$2y$10$KdC8FNP8qNWGlD3kfzao6e5WEu8X6.73FTSSqrZqKBvJp3UB/KYyS', 'ADM'),
(2, 'Arielli', 'ari@gmail.com', '$2y$10$lpmGlX.DK8KjUW8PnGctxuWw3f/kif0arfo9FqdMkX3InbfZqypzq', 'Professor'),
(3, 'lucimara', 'lu@gmail.com', '$2y$10$C69yEjoV/eqp9S0w9RyQVeAlGuBadGspNETyOrYs7/LGTXhWzp9Z6', 'Professor'),
(4, 'Luan', 'luan@gmail.com', '$2y$10$bT3N.ewaKHpQOVLFz8yYJOcMX9QN9wSSS/w86iaJa/4art2uzHu8y', 'Professor'),
(5, 'Savio', 'Savio@gmail.com', '$2y$10$DtbIZhVw7Pz5STotbZCpeOLFEp7DrSMDjRKD16YRP330it18blzmO', 'Professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sala_1`
--
ALTER TABLE `sala_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dia` (`id_dia`);

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
-- AUTO_INCREMENT for table `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sala_1`
--
ALTER TABLE `sala_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `sala_1`
--
ALTER TABLE `sala_1`
  ADD CONSTRAINT `sala_1_ibfk_1` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
