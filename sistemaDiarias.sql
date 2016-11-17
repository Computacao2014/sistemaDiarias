
CREATE TABLE `cargo` 
(
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `classe` int(11) NOT NULL,
  `id_perfil_diaria` bigint(20) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `endereco` 
(
  `id` bigint(20) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(255) NOT NULL
)
 ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `modalidade_transporte` 
(
  `id` bigint(20) NOT NULL,
  `nome` varchar(200) NOT NULL
)
 ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `perfil_diaria` 
(
  `id` bigint(20) NOT NULL,
  `valor_no_estado` double NOT NULL,
  `valor_fora_estado` double NOT NULL,
  `classe` varchar(255) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `projeto` 
(
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `servidor` 
(
  `matricula` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `id_cargo` bigint(20) DEFAULT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `trajeto` 
(
  `id` bigint(20) NOT NULL,
  `saida` bigint(20) NOT NULL,
  `chegada` bigint(20) NOT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `diaria_viagem`
(
	`id` bigint(20) NOT NULL,
	`quant_dias` int(11) DEFAULT NULL,
	`objeto_viagem` VARCHAR(500) NOT NULL,
	`data_inicial` VARCHAR(10) NOT NULL,
	`data_final` VARCHAR(10) NOT NULL,
	`relato` VARCHAR(2000) NOT NULL,
	`id_projeto` bigint(20) NOT NULL,
	`id_trajeto` bigint(20) NOT NULL,
	`id_modalidade` bigint(20) NOT NULL,
	`id_servidor` varchar(15) NOT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil_diaria` (`id_perfil_diaria`);

ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `modalidade_transporte`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `perfil_diaria`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `servidor`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_cargo` (`id_cargo`);

ALTER TABLE `trajeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saida` (`saida`),
  ADD KEY `chegada` (`chegada`);

ALTER TABLE `diaria_viagem`
  ADD PRIMARY KEY(`id`),
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_trajeto` (`id_trajeto`),
  ADD KEY `id_modalidade` (`id_modalidade`),
  ADD KEY `id_servidor` (`id_servidor`);

ALTER TABLE `cargo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `endereco`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `modalidade_transporte`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `perfil_diaria`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `projeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `trajeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `diaria_viagem`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`id_perfil_diaria`) REFERENCES `perfil_diaria` (`id`);

ALTER TABLE `servidor`
  ADD CONSTRAINT `servidor_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`);

ALTER TABLE `trajeto`
  ADD CONSTRAINT `trajeto_ibfk_1` FOREIGN KEY (`saida`) REFERENCES `endereco` (`id`),
  ADD CONSTRAINT `trajeto_ibfk_2` FOREIGN KEY (`chegada`) REFERENCES `endereco` (`id`);

ALTER TABLE `diaria_viagem`
  ADD CONSTRAINT `viagem_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id`),
  ADD CONSTRAINT `viagem_ibfk_2` FOREIGN KEY (`id_trajeto`) REFERENCES `trajeto` (`id`),
  ADD CONSTRAINT `viagem_ibfk_3` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade_transporte` (`id`),
  ADD CONSTRAINT `viagem_ibfk_4` FOREIGN KEY (`id_servidor`) REFERENCES `servidor`(`matricula`);
