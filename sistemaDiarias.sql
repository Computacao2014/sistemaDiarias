-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 26/01/2017 às 21:30
-- Versão do servidor: 10.1.16-MariaDB
-- Versão do PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemadiarias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_perfil_diaria` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta_bancaria`
--

CREATE TABLE `conta_bancaria` (
  `conta` varchar(15) NOT NULL,
  `agencia` varchar(15) NOT NULL,
  `banco` varchar(15) NOT NULL,
  `id_usuario` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `diaria`
--

CREATE TABLE `diaria` (
  `id_diaria` bigint(20) NOT NULL,
  `id_viagem` bigint(20) NOT NULL,
  `id_evento` bigint(20) NOT NULL,
  `id_trabalho` bigint(20) NOT NULL,
  `id_historico` bigint(20) NOT NULL,
  `id_producao` bigint(20) NOT NULL,
  `id_perfil_diaria` bigint(20) NOT NULL,
  `id_usuario` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `abrangencia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_auxilio`
--

CREATE TABLE `historico_auxilio` (
  `id_historico` bigint(20) NOT NULL,
  `auxilio_anterior` tinyint(1) NOT NULL,
  `anos` varchar(200) NOT NULL,
  `tipo_auxilio` varchar(200) NOT NULL,
  `matricula_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil_diaria`
--

CREATE TABLE `perfil_diaria` (
  `id_perfil_diaria` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor_no_estado` double NOT NULL,
  `valor_fora_estado` double NOT NULL,
  `valor_regiao_a` double NOT NULL,
  `valor_regiao_b` double NOT NULL,
  `valor_regiao_c` double NOT NULL,
  `valor_regiao_d` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `producoes_academicas`
--

CREATE TABLE `producoes_academicas` (
  `id_producao` bigint(20) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `importancia` varchar(500) NOT NULL,
  `arquivo` blob NOT NULL,
  `matricula_usuario` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servidor`
--

CREATE TABLE `servidor` (
  `matricula` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `id_cargo` bigint(20) DEFAULT NULL,
  `id_titulacao` bigint(20) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `servidor`
--

INSERT INTO `servidor` (`matricula`, `cpf`, `email`, `nome`, `senha`, `id_cargo`, `id_titulacao`, `admin`) VALUES
('1050627', '05361380369', 'kenadwanderson@gmail.com', 'Kenad Araújo', 'kenad', 1, 2, 1),
('1053253', '056651', 'matheusnumb1000@gmail.com', 'Matheus Araújo', '2104', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `titulacao`
--

CREATE TABLE `titulacao` (
  `id_titulacao` bigint(20) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `titulacao`
--

INSERT INTO `titulacao` (`id_titulacao`, `nome`) VALUES
(1, 'Graduação'),
(2, 'Mestrado'),
(3, 'Doutorado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `id_trabalho` bigint(20) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `titulo_prop` varchar(500) NOT NULL,
  `matricula_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `viagem`
--

CREATE TABLE `viagem` (
  `id_viagem` bigint(20) NOT NULL,
  `quantidade_dias` int(11) NOT NULL,
  `partida` date NOT NULL,
  `chegada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil_diaria` (`id_perfil_diaria`);

--
-- Índices de tabela `conta_bancaria`
--
ALTER TABLE `conta_bancaria`
  ADD PRIMARY KEY (`conta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `diaria`
--
ALTER TABLE `diaria`
  ADD PRIMARY KEY (`id_diaria`),
  ADD KEY `id_viagem` (`id_viagem`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_trabalho` (`id_trabalho`),
  ADD KEY `id_historico` (`id_historico`),
  ADD KEY `id_producao` (`id_producao`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_perfil_diaria` (`id_perfil_diaria`);

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Índices de tabela `historico_auxilio`
--
ALTER TABLE `historico_auxilio`
  ADD PRIMARY KEY (`id_historico`);

--
-- Índices de tabela `perfil_diaria`
--
ALTER TABLE `perfil_diaria`
  ADD PRIMARY KEY (`id_perfil_diaria`);

--
-- Índices de tabela `producoes_academicas`
--
ALTER TABLE `producoes_academicas`
  ADD PRIMARY KEY (`id_producao`),
  ADD KEY `matricula_usuario` (`matricula_usuario`);

--
-- Índices de tabela `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `id_titulacao` (`id_titulacao`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Índices de tabela `titulacao`
--
ALTER TABLE `titulacao`
  ADD PRIMARY KEY (`id_titulacao`);

--
-- Índices de tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`id_trabalho`),
  ADD UNIQUE KEY `matricula_usuario` (`matricula_usuario`);

--
-- Índices de tabela `viagem`
--
ALTER TABLE `viagem`
  ADD PRIMARY KEY (`id_viagem`),
  ADD KEY `id_viagem` (`id_viagem`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `perfil_diaria`
--
ALTER TABLE `perfil_diaria`
  MODIFY `id_perfil_diaria` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `titulacao`
--
ALTER TABLE `titulacao`
  MODIFY `id_titulacao` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `id_trabalho` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `viagem`
--
ALTER TABLE `viagem`
  MODIFY `id_viagem` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`id_perfil_diaria`) REFERENCES `perfil_diaria` (`id_perfil_diaria`);

--
-- Restrições para tabelas `conta_bancaria`
--
ALTER TABLE `conta_bancaria`
  ADD CONSTRAINT `conta_bancaria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `servidor` (`matricula`);

--
-- Restrições para tabelas `diaria`
--
ALTER TABLE `diaria`
  ADD CONSTRAINT `diaria_ibfk_1` FOREIGN KEY (`id_viagem`) REFERENCES `viagem` (`id_viagem`),
  ADD CONSTRAINT `diaria_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`),
  ADD CONSTRAINT `diaria_ibfk_3` FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id_trabalho`),
  ADD CONSTRAINT `diaria_ibfk_4` FOREIGN KEY (`id_historico`) REFERENCES `historico_auxilio` (`id_historico`),
  ADD CONSTRAINT `diaria_ibfk_5` FOREIGN KEY (`id_producao`) REFERENCES `producoes_academicas` (`id_producao`),
  ADD CONSTRAINT `diaria_ibfk_6` FOREIGN KEY (`id_usuario`) REFERENCES `servidor` (`matricula`),
  ADD CONSTRAINT `diaria_ibfk_7` FOREIGN KEY (`id_perfil_diaria`) REFERENCES `perfil_diaria` (`id_perfil_diaria`);

--
-- Restrições para tabelas `producoes_academicas`
--
ALTER TABLE `producoes_academicas`
  ADD CONSTRAINT `producoes_academicas_ibfk_1` FOREIGN KEY (`matricula_usuario`) REFERENCES `servidor` (`matricula`);

--
-- Restrições para tabelas `servidor`
--
ALTER TABLE `servidor`
  ADD CONSTRAINT `servidor_ibfk_2` FOREIGN KEY (`id_titulacao`) REFERENCES `titulacao` (`id_titulacao`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;