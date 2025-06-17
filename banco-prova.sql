-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 10:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco-prova`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `data_agendamento` date NOT NULL,
  `hora_agendamento` time NOT NULL,
  `status` varchar(20) DEFAULT 'pendente',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `usuario_id`, `servico_id`, `data_agendamento`, `hora_agendamento`, `status`, `criado_em`) VALUES
(6, 11, 3, '0000-00-00', '11:11:00', 'pendente', '2025-06-17 05:55:12'),
(7, 11, 6, '3333-12-22', '11:01:00', 'pendente', '2025-06-17 15:35:02'),
(8, 11, 1, '0000-00-00', '13:13:00', 'pendente', '2025-06-17 15:58:21'),
(9, 6, 1, '3333-12-13', '11:11:00', 'pendente', '2025-06-17 17:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicos`
--

INSERT INTO `servicos` (`id`, `titulo`, `descricao`, `icone`, `ativo`) VALUES
(1, 'outro serviço', '22222222222211', 'https://blog.obramax.com.br/wp-content/uploads/2022/05/encanamento.jpg', 1),
(2, 'aadad', 'dadada', 'https://blog.obramax.com.br/wp-content/uploads/2022/05/encanamento.jpg', 1),
(3, 'aadad', 'dada', 'https://blog.obramax.com.br/wp-content/uploads/2022/05/encanamento.jpg', 1),
(4, 'aadad', 'dadad', 'https://blog.obramax.com.br/wp-content/uploads/2022/05/encanamento.jpg', 1),
(5, 'aadad', 'dadada', 'https://blog.obramax.com.br/wp-content/uploads/2022/05/encanamento.jpg', 1),
(6, 'algo comum', 'aaa', 'https://media.istockphoto.com/id/1364054930/pt/foto/crowd-of-unrecognisable-people-crossing-street-o', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nascimento` date NOT NULL,
  `eh_profissional` tinyint(1) DEFAULT 0,
  `telefone` varchar(20) DEFAULT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `eh_admin` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`, `eh_profissional`, `telefone`, `especialidade`, `descricao`, `cidade`, `eh_admin`) VALUES
(6, 'aadsdads', 'maria1@email.com', '$2y$10$CI2PGct4rc29jmwfZeNSkuhiqbOrRG9NT4I9KVr7GEh25Ms2milZ2', '123.234.234-30', '0001-01-01', 0, NULL, NULL, NULL, NULL, 0),
(8, 'gorila blue', 'maria123@email.co', '$2y$10$hgipTV.orrxQUyFgebMEaecSAfC/eXlIJmullqD4YqQGAtaa3ykQC', '125.532.429-51', '1111-11-11', 1, NULL, NULL, NULL, NULL, 0),
(9, 'gorila blue', 'maria12333@email.com', '$2y$10$cRnhOU/Q.MRF0DYmoB6rUOMVEaec5fH0S3RXkIN8.eHgmF0kntmVa', '125.532.429-52', '1111-11-11', 1, '41 995992299', 'eletricista', 'AAAAAAAAAAAAAAAAAA', 'Curitiba', 0),
(11, 'gorila blue111', 'maria12345@email.com', '$2y$10$fgSJVVdE8f.cCRqe03iUJ.uMUquONjEypz/IWMA1jPUnyyzKiaonW', '125.532.429-13', '1111-11-11', 1, '41 995992299', 'eletricista', '1313', 'Curitiba', 0),
(12, 'Luccas Nantes', 'admin@gmail.com', '$2y$10$iIMaRJUEik6BSl.xzu33Ue0MW6coRUi9dITSrFq01xpzvmux8hEUO', '123.234.234-78', '3333-11-22', 0, NULL, NULL, NULL, NULL, 0),
(13, 'Luccas Nantes', 'luccasnn@gmail.com', '$2y$10$AUi3r9674RWN064LocRLzeWhQ.pLZQGj7Sb03nqpdmivRgsoYI75.', '123.234.234-90', '3333-12-31', 0, NULL, NULL, NULL, NULL, 0),
(30, 'Luccas Nantes', 'atytytytytytyt@gmail.com', '$2y$10$vJ8hErnChzHok.QdELyNPORfnE2xXTU356OCV2n0vxJBkK9sfDbgu', '111.111.111-56', '2000-11-12', 0, NULL, NULL, NULL, NULL, 0),
(31, 'Luccas Nantes', 'luccasnnadadadada@gmail.com', '$2y$10$qvJlSgIxCtrfVWARWr5tseC2dsrcPGXdX.MAULKzHjfsQhoehkOi6', '123.234.234-32', '2222-12-31', 0, NULL, NULL, NULL, NULL, 0),
(32, 'Luccas Nantes', 'admin@123', '$2y$10$JkRx2Xt.MoYDVMRL.d/TeumetsvFknr4PaUaraxTrg7TweiYbhALu', '123.234.234-65', '1111-11-11', 0, NULL, NULL, NULL, NULL, 0),
(33, 'Luccas Nantes', 'admin@1234', '$2y$10$SaJ5973AK1KfLa2Wv4ppJOF9znLpUWw4Mm0IOoc78hxeWyXfMGTo.', '123.234.234-58', '1111-11-11', 0, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `servico_id` (`servico_id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
