-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Maio-2021 às 07:28
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `idAluguel` int(11) NOT NULL,
  `diaPago` date NOT NULL,
  `Agua` float NOT NULL,
  `valor` float NOT NULL,
  `Total` float NOT NULL,
  `idCasa` int(11) NOT NULL,
  `CPF` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `casa`
--

CREATE TABLE `casa` (
  `idCasa` int(11) NOT NULL,
  `numeroCasa` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `idTerreno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casa`
--

INSERT INTO `casa` (`idCasa`, `numeroCasa`, `status`, `idTerreno`) VALUES
(50, 1, 'Desocupado', 14),
(51, 2, 'Desocupado', 14),
(52, 3, 'Desocupado', 14),
(53, 4, 'Desocupado', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `concerto`
--

CREATE TABLE `concerto` (
  `idConcerto` int(11) NOT NULL,
  `dataConcerto` date DEFAULT NULL,
  `statos` varchar(20) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `idCasa` int(11) DEFAULT NULL,
  `idTerreno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`idContrato`, `dataInicio`, `dataFim`) VALUES
(39, '2021-03-22', '2021-05-22'),
(41, '2021-01-01', '2022-01-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inquilino`
--

CREATE TABLE `inquilino` (
  `CPF` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataNascimento` date NOT NULL,
  `pedencia` float NOT NULL,
  `idContrato` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCasa` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Contato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `usuario`, `senha`, `Nome`, `Contato`) VALUES
(1, 'teste1', 'teste', 'Teste1 T. Teste', '(51)88888-8888'),
(2, 'teste2', 'teste', 'Teste2 T. Teste', '(51) 99999-9999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `terreno`
--

CREATE TABLE `terreno` (
  `idTerreno` int(11) NOT NULL,
  `Cidade` varchar(45) NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `NumeroTerreno` int(11) NOT NULL,
  `QuantidadeCasa` int(11) NOT NULL,
  `Valor` float NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `terreno`
--

INSERT INTO `terreno` (`idTerreno`, `Cidade`, `Bairro`, `Rua`, `NumeroTerreno`, `QuantidadeCasa`, `Valor`, `idUsuario`) VALUES
(14, 'Cidade Teste', 'Bairro Teste', 'Rua Teste', 123, 4, 500, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`idAluguel`),
  ADD KEY `fk_Aluguel_Casa1_idx` (`idCasa`),
  ADD KEY `fk_Aluguel_Inquilino1_idx` (`CPF`);

--
-- Índices para tabela `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`idCasa`),
  ADD KEY `fk_Casa_Terreno_idx` (`idTerreno`);

--
-- Índices para tabela `concerto`
--
ALTER TABLE `concerto`
  ADD PRIMARY KEY (`idConcerto`),
  ADD KEY `fk_Concerto_Casa1_idx` (`idCasa`),
  ADD KEY `fk_Concerto_Terreno1_idx` (`idTerreno`);

--
-- Índices para tabela `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`);

--
-- Índices para tabela `inquilino`
--
ALTER TABLE `inquilino`
  ADD PRIMARY KEY (`CPF`),
  ADD KEY `fk_Inquilino_Contrato1_idx` (`idContrato`),
  ADD KEY `fk_Inquilino_Login1_idx` (`idUsuario`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Índices para tabela `terreno`
--
ALTER TABLE `terreno`
  ADD PRIMARY KEY (`idTerreno`),
  ADD KEY `fk_Terreno_Login1_idx` (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `idAluguel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `casa`
--
ALTER TABLE `casa`
  MODIFY `idCasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `concerto`
--
ALTER TABLE `concerto`
  MODIFY `idConcerto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `terreno`
--
ALTER TABLE `terreno`
  MODIFY `idTerreno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `fk_Aluguel_Casa1` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`idCasa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Aluguel_Inquilino1` FOREIGN KEY (`CPF`) REFERENCES `inquilino` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `casa`
--
ALTER TABLE `casa`
  ADD CONSTRAINT `fk_CasaTerreno` FOREIGN KEY (`idTerreno`) REFERENCES `terreno` (`idTerreno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `concerto`
--
ALTER TABLE `concerto`
  ADD CONSTRAINT `fk_Concerto_Casa1` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`idCasa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Concerto_Terreno1` FOREIGN KEY (`idTerreno`) REFERENCES `terreno` (`idTerreno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inquilino`
--
ALTER TABLE `inquilino`
  ADD CONSTRAINT `fk_Inquilino_Contrato1` FOREIGN KEY (`idContrato`) REFERENCES `contrato` (`idContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Inquilino_Login1` FOREIGN KEY (`idUsuario`) REFERENCES `login` (`idLogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `terreno`
--
ALTER TABLE `terreno`
  ADD CONSTRAINT `fk_Terreno_Login1` FOREIGN KEY (`idUsuario`) REFERENCES `login` (`idLogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
