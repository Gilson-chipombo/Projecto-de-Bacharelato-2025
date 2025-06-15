-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/10/2024 às 14:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rota42luanda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwrd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadetes`
--

CREATE TABLE `cadetes` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `distrit` varchar(255) DEFAULT NULL,
  `passwrd` varchar(255) DEFAULT NULL,
  `phone` int(9) DEFAULT NULL,
  `stop_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadetes`
--

INSERT INTO `cadetes` (`id`, `full_name`, `username`, `email`, `city`, `distrit`, `passwrd`, `phone`, `stop_id`) VALUES
(2, 'Gilson Chipombo', 'gbravo-f', 'fernandochipombo@gmail.com', 'Luanda', 'Cacuaco', 'e10adc3949ba59abbe56e057f20f883e', 939285464, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `distrit` varchar(250) DEFAULT NULL,
  `passwrd` varchar(250) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` int(9) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `validate` date DEFAULT NULL,
  `license_number` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `exp_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `drivers`
--

INSERT INTO `drivers` (`id`, `full_name`, `username`, `city`, `distrit`, `passwrd`, `photo`, `phone`, `birthday`, `validate`, `license_number`, `category`, `exp_time`) VALUES
(2, 'Gilson Chipombo', 'gbravo-f', 'Luanda', 'Cacuaco', '827ccb0eea8a706c4c34a16891f84e7b', '', 939285464, '2001-07-11', '2025-07-20', 254847, 'Profissional', 5),
(3, 'Mauro Gunza da Silva', 'mgunza', 'Dangereux', 'Belas', 'e10adc3949ba59abbe56e057f20f883e', '', 939285465, '2024-10-20', '2024-10-20', 548763, 'Profissional', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `mini_bus`
--

CREATE TABLE `mini_bus` (
  `id` int(11) NOT NULL,
  `car_registration` varchar(20) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mini_bus`
--

INSERT INTO `mini_bus` (`id`, `car_registration`, `color`, `brand`, `driver_id`, `model`) VALUES
(2, 'LA45-43', 'Branco', 'TOYOTA', 2, 'VX');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mini_bus_stop`
--

CREATE TABLE `mini_bus_stop` (
  `id` int(11) NOT NULL,
  `stop_name` varchar(255) DEFAULT NULL,
  `distrit` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mini_bus_stop`
--

INSERT INTO `mini_bus_stop` (`id`, `stop_name`, `distrit`, `latitude`, `longitude`) VALUES
(1, 'Vila de Cacuaco', '', 999.999999, 999.999999),
(2, '2a da Comarca', '', 999.999999, 999.999999);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadetes`
--
ALTER TABLE `cadetes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `stop_id` (`stop_id`);

--
-- Índices de tabela `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mini_bus`
--
ALTER TABLE `mini_bus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Índices de tabela `mini_bus_stop`
--
ALTER TABLE `mini_bus_stop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadetes`
--
ALTER TABLE `cadetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mini_bus`
--
ALTER TABLE `mini_bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mini_bus_stop`
--
ALTER TABLE `mini_bus_stop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cadetes`
--
ALTER TABLE `cadetes`
  ADD CONSTRAINT `cadetes_ibfk_1` FOREIGN KEY (`stop_id`) REFERENCES `mini_bus_stop` (`id`);

--
-- Restrições para tabelas `mini_bus`
--
ALTER TABLE `mini_bus`
  ADD CONSTRAINT `mini_bus_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
