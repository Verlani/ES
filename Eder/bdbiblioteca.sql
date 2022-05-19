-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Abr-2022 às 01:17
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdbiblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` char(11) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbaluno`
--

INSERT INTO `tbaluno` (`matricula`, `nome`, `email`, `cpf`, `data_nasc`) VALUES
(1, 'Eder Z Seefeldt', 'eder@gmail.com', '04429164002', '2022-04-11'),
(2, 'Vinicius', 'vinicius@gmail.com', '33333333333', '2022-04-26'),
(3, 'andreia', 'andreia@gmail.com', '99999999999', '2022-04-17'),
(4, 'wesley', 'wesley@gmail.com', '888888888', '2022-04-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbarea`
--

CREATE TABLE `tbarea` (
  `id_area` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbarea`
--

INSERT INTO `tbarea` (`id_area`, `nome`) VALUES
(1, 'Engenharia'),
(2, 'MatemÃ¡tica'),
(3, 'ComputaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblivro`
--

INSERT INTO `tblivro` (`id_livro`, `titulo`, `autor`, `status`, `id_area`) VALUES
(27, 'java', 'eder', 1, 3),
(28, 'css', 'leo', 1, 3),
(29, 'soma', 'ari', 1, 2),
(30, 'construÃ§oes', 'jader', 1, 1),
(31, 'python', 'andreia', 1, 3),
(32, 'c++', 'jean', 1, 3),
(34, 'algebra', 'cesar', 1, 2),
(35, 'redes', 'eder', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreserva`
--

CREATE TABLE `tbreserva` (
  `id_reserva` int(11) NOT NULL,
  `id_res_matricula` int(11) DEFAULT NULL,
  `id_res_livro` int(11) DEFAULT NULL,
  `data_retirada` date NOT NULL,
  `data_entrega` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `tbarea`
--
ALTER TABLE `tbarea`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `tbreserva`
--
ALTER TABLE `tbreserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_res_matricula` (`id_res_matricula`),
  ADD KEY `id_res_livro` (`id_res_livro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbarea`
--
ALTER TABLE `tbarea`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbreserva`
--
ALTER TABLE `tbreserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `tblivro_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `tbarea` (`id_area`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbreserva`
--
ALTER TABLE `tbreserva`
  ADD CONSTRAINT `tbreserva_ibfk_1` FOREIGN KEY (`id_res_matricula`) REFERENCES `tbaluno` (`matricula`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbreserva_ibfk_2` FOREIGN KEY (`id_res_livro`) REFERENCES `tblivro` (`id_livro`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
