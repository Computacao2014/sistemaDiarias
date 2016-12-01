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

--
-- Fazendo dump de dados para tabela `cargo`
--

INSERT INTO `cargo` VALUES
(1, 'SECRETÁRIOS', 1),
(2, 'PROCURADOR GERAL', 1),
(3, 'DEFENSOR GERAL', 1),
(4, 'CONTROLADOR GERAL', 1),
(5, 'DIRETOR GERAL', 1),
(6, 'CONTROLADOR GERAL', 1),
(7, 'DIRETOR GERAL', 1),
(8, 'PRESIDENTE', 1),
(9, 'SUPERINTENDENTES', 1),
(10, 'COORDENADORES GERAIS', 1),
(11, 'DIREÇÃO E ASSESSORAMENTO SUPERIOR - DAS', 2),
(12, 'PILOTOS', 2),
(13, 'VICE-PRESIDENTE', 2),
(14, 'SECRETÁRIO GERAL', 2),
(15, 'DELEGADO GERAL', 2),
(16, 'DIRETOR DE GESTÃO INTERNA', 2),
(17, 'TÉCNICOS DE NIVEL SUPERIOR', 2),
(18, 'DEMAIS DIRENTES', 2),
(19, 'OUTRAS FUNÇÕES', 3),
(20, 'MILITAR - COMANDANTE E SUBCOMANDANTE', 1),
(21, 'MILITAR - OFICIAIS', 2),
(22, 'MILITAR - PRAÇAS', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `diaria_viagem`
--

CREATE TABLE `diaria_viagem` (
  `id_diaria` bigint(20) NOT NULL,
  `quant_dias` int(11) DEFAULT NULL,
  `objeto_viagem` varchar(500) NOT NULL,
  `data_inicial` varchar(10) NOT NULL,
  `data_final` varchar(10) NOT NULL,
  `relato` varchar(2000) NOT NULL,
  `id_projeto` bigint(20) NOT NULL,
  `id_trajeto` bigint(20) NOT NULL,
  `id_modalidade` bigint(20) NOT NULL,
  `id_servidor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` bigint(20) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidade_transporte`
--

CREATE TABLE `modalidade_transporte` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `categoria` varchar(1) NOT NULL DEFAULT 'B',
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `pais`
--

INSERT INTO `pais` VALUES
(1, 'A', 'Afeganistão'),
(2, 'A', 'Albânia'),
(3, 'A', 'Argélia'),
(4, 'A', 'Armênia'),
(5, 'A', 'Bangladesh'),
(6, 'A', 'Belize'),
(7, 'A', 'Benin'),
(8, 'A', 'Bolívia'),
(9, 'A', 'Botsuana'),
(10, 'A', 'Burkina-Fasso'),
(11, 'A', 'Burundi'),
(12, 'A', 'Butão'),
(13, 'A', 'Cabo Verde'),
(14, 'A', 'Camarões'),
(15, 'A', 'Chade'),
(16, 'A', 'Comores'),
(17, 'A', 'Congo '),
(18, 'A', 'Costa do Marfim'),
(19, 'A', 'El Salvador'),
(20, 'A', 'Equador'),
(21, 'A', 'Eritreia'),
(22, 'A', 'Etiópia'),
(23, 'A', 'Fiji'),
(24, 'A', 'Filipinas'),
(25, 'A', 'Gâmbia'),
(26, 'A', 'Granada'),
(27, 'A', 'Guatemala'),
(28, 'A', 'Guiana'),
(29, 'A', 'Guiné'),
(30, 'A', 'Haiti'),
(31, 'A', 'Honduras'),
(32, 'A', 'Ilhas Marshall'),
(33, 'A', 'Irã'),
(34, 'A', 'Laos'),
(35, 'A', 'Lesoto'),
(36, 'A', 'Líbano'),
(37, 'A', 'Libéria'),
(38, 'A', 'Madagascar'),
(39, 'A', 'Malauí'),
(40, 'A', 'Mali'),
(41, 'A', 'Malta'),
(42, 'A', 'Mauritânia'),
(43, 'A', 'Micronésia'),
(44, 'A', 'Moldávia'),
(45, 'A', 'Mongólia'),
(46, 'A', 'Mianmar'),
(47, 'A', 'Nauru'),
(48, 'A', 'Nepal'),
(49, 'A', 'Nicarágua'),
(50, 'A', 'Níger'),
(51, 'A', 'Palau Papua Nova Guiné'),
(52, 'A', 'Paquistão'),
(53, 'A', 'Paraguai'),
(54, 'A', 'Rep.Centro Africana'),
(55, 'A', 'Salomão'),
(56, 'A', 'Samoa'),
(57, 'A', 'São Cristovão e Névis'),
(58, 'A', 'São Tomé e Príncipe'),
(59, 'A', 'São Vicente e Granadinas'),
(60, 'A', 'Serra Leoa'),
(61, 'A', 'Sri Lanka'),
(62, 'A', 'Suazilândia'),
(63, 'A', 'Suriname'),
(64, 'A', 'Tadjiquistão'),
(65, 'A', 'Tanzânia'),
(66, 'A', 'Tonga'),
(67, 'A', 'Trinidad e Tobago'),
(68, 'A', 'Tunísia'),
(69, 'A', 'Tuvalu'),
(70, 'A', 'Uganda'),
(71, 'A', 'Zâmbia'),
(72, 'A', 'Zimbábue'),
(73, 'B', 'África do Sul'),
(74, 'B', 'Angola'),
(75, 'B', 'Antígua e Barbuda'),
(76, 'B', 'Argentina'),
(77, 'B', 'Austrália'),
(78, 'B', 'Azerbaidjão'),
(79, 'B', 'Barbados'),
(80, 'B', 'Bósnia-Herzegóvina'),
(81, 'B', 'Bulgária'),
(82, 'B', 'Camboja'),
(83, 'B', 'Catar'),
(84, 'B', 'Chile'),
(85, 'B', 'Chipre'),
(86, 'B', 'Colômbia'),
(87, 'B', 'Coréia do Norte'),
(88, 'B', 'Costa Rica'),
(89, 'B', 'Croácia'),
(90, 'B', 'Cuba'),
(91, 'B', 'Djibuti'),
(92, 'B', 'Egito');

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

--
-- Fazendo dump de dados para tabela `perfil_diaria`
--

INSERT INTO `perfil_diaria` VALUES
(1, 'Classe I', 172.5, 345, 200, 280, 330, 420),
(2, 'Classe II', 120, 240, 190, 270, 320, 420),
(3, 'Classe III', 75, 150, 180, 260, 310, 370);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servidor`
--

CREATE TABLE `servidor` (
  `matricula` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `id_cargo` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `trajeto`
--

CREATE TABLE `trajeto` (
  `id` bigint(20) NOT NULL,
  `saida` bigint(20) NOT NULL,
  `chegada` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Índices de tabela `diaria_viagem`
--
ALTER TABLE `diaria_viagem`
  ADD PRIMARY KEY (`id_diaria`),
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_trajeto` (`id_trajeto`),
  ADD KEY `id_modalidade` (`id_modalidade`),
  ADD KEY `id_servidor` (`id_servidor`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `modalidade_transporte`
--
ALTER TABLE `modalidade_transporte`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Índices de tabela `perfil_diaria`
--
ALTER TABLE `perfil_diaria`
  ADD PRIMARY KEY (`id_perfil_diaria`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Índices de tabela `trajeto`
--
ALTER TABLE `trajeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saida` (`saida`),
  ADD KEY `chegada` (`chegada`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de tabela `diaria_viagem`
--
ALTER TABLE `diaria_viagem`
  MODIFY `id_diaria` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `modalidade_transporte`
--
ALTER TABLE `modalidade_transporte`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT de tabela `perfil_diaria`
--
ALTER TABLE `perfil_diaria`
  MODIFY `id_perfil_diaria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `trajeto`
--
ALTER TABLE `trajeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`id_perfil_diaria`) REFERENCES `perfil_diaria` (`id_perfil_diaria`);

--
-- Restrições para tabelas `diaria_viagem`
--
ALTER TABLE `diaria_viagem`
  ADD CONSTRAINT `diaria_viagem_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id`),
  ADD CONSTRAINT `diaria_viagem_ibfk_2` FOREIGN KEY (`id_trajeto`) REFERENCES `trajeto` (`id`),
  ADD CONSTRAINT `diaria_viagem_ibfk_3` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade_transporte` (`id`),
  ADD CONSTRAINT `diaria_viagem_ibfk_4` FOREIGN KEY (`id_servidor`) REFERENCES `servidor` (`matricula`);

--
-- Restrições para tabelas `servidor`
--
ALTER TABLE `servidor`
  ADD CONSTRAINT `servidor_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;