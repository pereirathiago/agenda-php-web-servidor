-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2024 às 22:50
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `compromisso`
--

CREATE TABLE `compromisso` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `data_hora_inicio` datetime NOT NULL,
  `data_hora_termino` datetime NOT NULL,
  `id_local` int(11) NOT NULL,
  `id_compromisso_organizador` int(11) NOT NULL,
  `status_compromisso` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidado`
--

CREATE TABLE `convidado` (
  `id` int(11) NOT NULL,
  `id_usuario_convidado` int(11) NOT NULL,
  `status_convite` tinyint(1) NOT NULL,
  `id_compromisso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id` int(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `sem_numero` tinyint(1) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `genero` varchar(20) NOT NULL,
  `foto_perfil` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `compromisso`
--
ALTER TABLE `compromisso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compromisso_local` (`id_local`),
  ADD KEY `fk_compromisso_usuario` (`id_compromisso_organizador`);

--
-- Índices para tabela `convidado`
--
ALTER TABLE `convidado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_convidado_usuario` (`id_usuario_convidado`),
  ADD KEY `fk_convidado_compromisso` (`id_compromisso`);

--
-- Índices para tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_local_usuario` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_usuario_unique` (`nome_usuario`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `compromisso`
--
ALTER TABLE `compromisso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `convidado`
--
ALTER TABLE `convidado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `local`
--
ALTER TABLE `local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compromisso`
--
ALTER TABLE `compromisso`
  ADD CONSTRAINT `fk_compromisso_local` FOREIGN KEY (`id_local`) REFERENCES `local` (`id`),
  ADD CONSTRAINT `fk_compromisso_usuario` FOREIGN KEY (`id_compromisso_organizador`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `convidado`
--
ALTER TABLE `convidado`
  ADD CONSTRAINT `fk_convidado_compromisso` FOREIGN KEY (`id_compromisso`) REFERENCES `compromisso` (`id`),
  ADD CONSTRAINT `fk_convidado_usuario` FOREIGN KEY (`id_usuario_convidado`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_local_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
