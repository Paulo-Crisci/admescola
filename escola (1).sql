-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Maio-2020 às 16:48
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `nome` varchar(70) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `bairro` varchar(70) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(70) NOT NULL,
  `numero` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(70) NOT NULL,
  `disciplina` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbaluno`
--

INSERT INTO `tbaluno` (`nome`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`, `email`, `telefone`, `disciplina`) VALUES
('paulo', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '274', 'paulinho.crisci@gmail.com', '11942398937', ''),
('paulo teste', '', 'Avenida Vila Ema', 'Vila Ema', 'São Paulo', 'SP', '275', 'pasoias@hotmail.com', '11273849', ''),
('teste', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '9823623982', 'teste@teste', '92873623', ''),
('paulo', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '243', 'oauso@teste', '99827364', 'Disciplina'),
('paulo crisci', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '274', 'paulo@teste.com', '99827364', ''),
('teste', '', 'Avenida Vila Ema', 'Vila Ema', 'São Paulo', 'SP', '274', 'jsdhsd@gmail.com', '92736254672', ''),
('teste', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '274', 'teste@teste', '0997193993', ''),
('elaine', '', 'Avenida Vila Ema', 'Vila Ema', 'São Paulo', 'SP', '5446', 'elainedourado059@gmail.com', '11942398938', ''),
('teste', '', 'Avenida Vila Ema', 'Vila Ema', 'São Paulo', 'SP', '5446', 'yasmimcristina373@gmail.com', '11942398987', ''),
('paulozika', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '274', 'paulinho.crisci@gmail.com', '11942398932', ''),
('TESTES12', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '275', 'PAULI@GMAIL.COM', '01928374', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbalunos`
--

CREATE TABLE `tbalunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cep` varchar(14) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `bairro` varchar(70) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(70) NOT NULL,
  `numero` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(70) NOT NULL,
  `disciplina` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbalunos`
--

INSERT INTO `tbalunos` (`id`, `nome`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`, `email`, `telefone`, `disciplina`) VALUES
(1, 'Paulo teste', '', 'Rua Bijupira', 'Eldorado', 'Diadema', 'SP', '334', 'paulinho.crisci@gmail.com', '11942398938', ''),
(2, 'ana', '', 'Avenida Vila Ema', 'Vila Ema', 'São Paulo', 'SP', '275', 'teste@teste.com', '92376232', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmateria`
--

CREATE TABLE `tbmateria` (
  `id` int(11) NOT NULL,
  `disciplina` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmateria`
--

INSERT INTO `tbmateria` (`id`, `disciplina`) VALUES
(1, 'Matematica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnotas`
--

CREATE TABLE `tbnotas` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `disciplina` varchar(70) NOT NULL,
  `av1` varchar(3) NOT NULL,
  `av2` varchar(3) NOT NULL,
  `av3` varchar(3) NOT NULL,
  `media` varchar(3) NOT NULL,
  `conceito` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbnotas`
--

INSERT INTO `tbnotas` (`id`, `nome`, `disciplina`, `av1`, `av2`, `av3`, `media`, `conceito`) VALUES
(1, 'Paulo', 'Matematica', '7', '5', '10', '9', 'A'),
(2, '', '', '', '', '', '', ''),
(3, '', 'Disciplina', '', '', '', '', ''),
(4, '', '', '', '', '', '', ''),
(5, '', 'Disciplina', '4', '10', '10', '', ''),
(6, '', 'Disciplina', '4', '10', '10', '', ''),
(7, '', 'Disciplina', '4', '10', '10', '', ''),
(8, '', 'Disciplina', '4', '10', '10', '', ''),
(9, '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', ''),
(11, '', 'Disciplina', '4', '10', '10', '', ''),
(12, '', 'Disciplina', '4', '10', '10', '', ''),
(13, '', '', '', '', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbalunos`
--
ALTER TABLE `tbalunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbmateria`
--
ALTER TABLE `tbmateria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbnotas`
--
ALTER TABLE `tbnotas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbalunos`
--
ALTER TABLE `tbalunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbmateria`
--
ALTER TABLE `tbmateria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbnotas`
--
ALTER TABLE `tbnotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
