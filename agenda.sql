-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/12/2024 às 21:23
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `compromisso`
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

--
-- Despejando dados para a tabela `compromisso`
--

INSERT INTO `compromisso` (`id`, `titulo`, `descricao`, `data_hora_inicio`, `data_hora_termino`, `id_local`, `id_compromisso_organizador`, `status_compromisso`) VALUES
(23, 'Reunião', 'Descrição da reunião', '2024-12-08 14:00:00', '2024-12-08 16:00:00', 1, 3, 1),
(25, 'boa tarde2 ', 'adsfdasf', '2024-12-10 06:15:00', '2024-12-11 22:15:00', 1, 2, 0),
(27, 'aasdasd', 'sdafadsf', '2024-12-11 00:08:00', '2024-12-25 00:08:00', 1, 2, 0),
(28, 'deu boa', 'sadasdf', '2024-12-10 23:11:00', '2024-12-11 19:11:00', 1, 2, 1),
(29, 'dfgdsfg', 'asdsadf', '2024-12-09 23:13:00', '2024-12-11 19:13:00', 1, 2, 0),
(30, 'dsafads', 'dsfaadsf', '2024-12-09 19:17:00', '2024-12-10 19:16:00', 1, 2, 0),
(31, 'agdsdfg', 'adsfdas', '2024-12-09 20:20:00', '2024-12-11 19:20:00', 1, 2, 0),
(32, 'deu boa 3', 'asdasdf', '2024-12-09 19:22:00', '2024-12-09 20:21:00', 1, 2, 0),
(33, 'Aula da oshikava', 'Aula da oshikava', '2024-12-09 20:20:00', '2024-12-09 22:00:00', 1, 2, 1),
(34, 'Aula', 'dsafadsf', '2024-12-10 21:11:00', '2024-12-19 21:11:00', 2, 2, 0),
(38, 'deu boa', 'dsafadsf', '2024-12-10 21:38:00', '2024-12-12 21:38:00', 1, 4, 1),
(40, 'adfsdasf', 'sadasdf', '2024-12-11 21:39:00', '2024-12-18 21:39:00', 2, 4, 0),
(41, 'aula123', 'adsfasdfdasf', '2024-12-11 16:57:00', '2024-12-13 16:57:00', 1, 2, 0),
(42, 'compromisso com convidado', 'aopa', '2024-12-12 16:57:00', '2024-12-19 16:57:00', 1, 2, 1),
(43, 'boa tarde', 'aoba', '2024-12-10 17:03:00', '2024-12-10 17:07:00', 3, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `convidado`
--

CREATE TABLE `convidado` (
  `id` int(11) NOT NULL,
  `id_usuario_convidado` int(11) NOT NULL,
  `status_convite` tinyint(1) NOT NULL,
  `id_compromisso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `convidado`
--

INSERT INTO `convidado` (`id`, `id_usuario_convidado`, `status_convite`, `id_compromisso`) VALUES
(1, 2, 3, 25),
(2, 1, 0, 34),
(3, 3, 0, 34),
(4, 1, 0, 40),
(5, 2, 2, 40),
(7, 3, 0, 25),
(8, 3, 0, 25),
(9, 4, 0, 34),
(10, 4, 0, 34),
(11, 4, 0, 25),
(12, 1, 0, 25),
(13, 3, 0, 27),
(14, 1, 0, 27),
(15, 1, 0, 29),
(16, 3, 0, 29),
(17, 1, 0, 32),
(18, 4, 0, 32),
(19, 3, 0, 32),
(20, 1, 0, 30),
(21, 3, 0, 30),
(22, 4, 0, 30),
(23, 4, 0, 27),
(24, 4, 0, 29),
(25, 4, 0, 41),
(26, 1, 3, 42),
(27, 4, 3, 42),
(28, 3, 3, 42),
(30, 4, 3, 43),
(31, 3, 3, 43);

-- --------------------------------------------------------

--
-- Estrutura para tabela `local`
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

--
-- Despejando dados para a tabela `local`
--

INSERT INTO `local` (`id`, `endereco`, `numero`, `sem_numero`, `bairro`, `cidade`, `estado`, `cep`, `id_usuario`) VALUES
(1, 'Rua Professor Carrel', 666, 0, 'Colonia ', 'PG', 'PR', '12345678', 2),
(2, 'adsdafs', 1234, 0, 'Colonia ', 'sad', 'as', '21212121', 2),
(3, 'Rua Professor Carrel', 1231212, 0, 'dsadsafdfsa', 'sad', 'dsafdas', '12345678', 2),
(4, 'Rua Emiliano Perneta213', 123, 0, 'Uvaranas', 'Ponta Grossa', 'PR', '84025410', 5),
(5, 'Rua Emiliano Perneta', 312, 0, 'Uvaranas', 'Ponta Grossa', 'PR', '84025410', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
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
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome_completo`, `data_nascimento`, `genero`, `foto_perfil`, `email`, `nome_usuario`, `senha`) VALUES
(1, 'Giovanne Ribeiro Mika', '2005-05-11', 'on', 'https://upload.wikimedia.org/wikipedia/commons/3/3c/StalinCropped1943%28b%29.jpg', 'giovanne@gmail.com', 'Givas123', '$2y$10$qFQDhcRU7q7mf3gnw3lB8Om/guUDXD06Ah2Zi9dTTs9sED67Kk2qq'),
(2, 'Giovanne Ribeiro Mika', '2005-05-11', 'Masculino', 'https://upload.wikimedia.org/wikipedia/commons/3/3c/StalinCropped1943%28b%29.jpg', 'giovanne123@gmail.com', 'Givas1234', '$2y$10$BpgnGNuLZzlb.7ujASgz/.tHX9fG3qb4H8FyYjUGBPsrvoIrSWF.y'),
(3, 'Matheus', '2024-12-04', 'Masculino', 'https://upload.wikimedia.org/wikipedia/commons/3/3c/StalinCropped1943%28b%29.jpg', 'matheusandreiczuk01@gmail.com', 'matias', '123'),
(4, 'Thiago123', '1002-02-01', 'Masculino', 'https://images.squarespace-cdn.com/content/v1/54822a56e4b0b30bd821480c/45ed8ecf-0bb2-4e34-8fcf-624db47c43c8/Golden+Retrievers+dans+pet+care.jpeg', 'matheusandre21iczuk01@gmail.com', 'thigas', '$2y$10$MiKHIaBzR6TQR5um.pyLbuZ5KALdi3eIRNhUDLAJaTUp6mvmM5cH.'),
(5, 'Danilo', '2002-09-11', 'Masculino', 'https://upload.wikimedia.org/wikipedia/commons/3/3c/StalinCropped1943%28b%29.jpg', 'matheusandrdsafeiczuk01@gmail.com', 'danas', '$2y$10$j/OsFLE0p58hahDmYR2zyeZa41UPNolTUvnl55U5lqbz1ly4i5hzq');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `compromisso`
--
ALTER TABLE `compromisso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compromisso_local` (`id_local`),
  ADD KEY `fk_compromisso_usuario` (`id_compromisso_organizador`);

--
-- Índices de tabela `convidado`
--
ALTER TABLE `convidado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_convidado_usuario` (`id_usuario_convidado`),
  ADD KEY `fk_convidado_compromisso` (`id_compromisso`);

--
-- Índices de tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_local_usuario` (`id_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_usuario_unique` (`nome_usuario`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `compromisso`
--
ALTER TABLE `compromisso`
  ADD CONSTRAINT `fk_compromisso_local` FOREIGN KEY (`id_local`) REFERENCES `local` (`id`),
  ADD CONSTRAINT `fk_compromisso_usuario` FOREIGN KEY (`id_compromisso_organizador`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `convidado`
--
ALTER TABLE `convidado`
  ADD CONSTRAINT `fk_convidado_compromisso` FOREIGN KEY (`id_compromisso`) REFERENCES `compromisso` (`id`),
  ADD CONSTRAINT `fk_convidado_usuario` FOREIGN KEY (`id_usuario_convidado`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_local_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
