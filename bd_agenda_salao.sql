-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Dez-2021 às 12:39
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_agenda_salao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `associar_servicos_salao`
--

CREATE TABLE `associar_servicos_salao` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_salao` int(11) NOT NULL,
  `id_servicos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_salao`
--

CREATE TABLE `servicos_salao` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_servico` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `preco_servicos` int(11) NOT NULL,
  `data_criar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicos_salao`
--

INSERT INTO `servicos_salao` (`id`, `id_usuario`, `nome_servico`, `preco_servicos`, `data_criar`) VALUES
(7, 13, 'wertyui3456789', 333, '2021-12-22 22:02:25'),
(8, 4, '', 0, '2021-12-23 16:05:45'),
(9, 3, '', 0, '2021-12-23 16:05:55'),
(10, 2, '', 0, '2021-12-23 16:06:44'),
(11, 3, '', 0, '2021-12-23 16:07:21'),
(12, 2, '', 0, '2021-12-23 16:12:05'),
(13, 2, '', 0, '2021-12-23 16:13:04'),
(14, 2, '', 0, '2021-12-23 16:14:49'),
(18, 12, 'Garson', 10000, '2021-12-29 11:19:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_salao_usuario`
--

CREATE TABLE `tb_salao_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_salao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `localizacao_sl` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade_de_lugar` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `discricao` text COLLATE utf8_unicode_ci NOT NULL,
  `preco_padrao` int(11) NOT NULL,
  `valor_cada_lugar` int(11) DEFAULT NULL,
  `foto1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `foto2` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `foto3` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_salao_usuario`
--

INSERT INTO `tb_salao_usuario` (`id`, `id_usuario`, `nome_salao`, `localizacao_sl`, `quantidade_de_lugar`, `discricao`, `preco_padrao`, `valor_cada_lugar`, `foto1`, `foto2`, `foto3`, `telefone`) VALUES
(2, 12, 'ccc', 'bjhjhkjkuif', '535', '33edfcvcv', 33, 33, '', '', '', '923898842'),
(3, 12, 'ccc', 'bjhjhkjkuif', '535', '33edfcvcv', 33, 33, '', '', '', '923898842'),
(4, 12, 'Meus', 't78tbe08cy9cvbwnjbrjdf', '222', 'ejfikgçlfmlk rt', 443, 55, '', '', '', '923898842'),
(5, 13, 'Meus', 'bjhjhkjkuif', '33', 'gghd', 33, 343, '', '', '', '927438072'),
(6, 12, 'goooo', 'Lojas ', '400', 'garg feio', 30000, 1000, '', '', '', '923898842');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servicos_salao_usuarios`
--

CREATE TABLE `tb_servicos_salao_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_salao_usuario` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `nome_servico` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_solicitacoes_sl_usuario`
--

CREATE TABLE `tb_solicitacoes_sl_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_salao` int(11) NOT NULL,
  `nome_salao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `qtd_lugar` int(11) NOT NULL,
  `telefone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `estado_do_processo` int(11) NOT NULL DEFAULT 0,
  `dia_actoa_actocao` int(11) NOT NULL,
  `data_registrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dia_termino_acto` int(11) NOT NULL,
  `valor_pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_solicitacoes_sl_usuario`
--

INSERT INTO `tb_solicitacoes_sl_usuario` (`id`, `id_usuario`, `id_salao`, `nome_salao`, `qtd_lugar`, `telefone`, `estado_do_processo`, `dia_actoa_actocao`, `data_registrada`, `dia_termino_acto`, `valor_pago`) VALUES
(1, 2, 2, 'ccc', 11, '923898842', 0, 10, '2021-12-29 10:16:42', 1, 22),
(2, 3, 3, 'ccc', 0, '923898842', 1, 0, '2021-12-29 10:07:07', 1, 22),
(3, 2, 2, 'ccc', 4567, '923898842', 1, 11, '2021-12-29 10:07:07', 1, 22),
(4, 5, 5, 'Meus', 34, '927438072', 0, 10, '2021-12-29 10:16:46', 1, 22),
(5, 5, 5, 'Meus', 0, '927438072', 0, 0, '2021-12-29 10:16:50', 1, 22),
(6, 5, 5, 'Meus', 100, '927438072', 1, 3, '2021-12-29 10:07:07', 1, 22),
(7, 5, 5, 'Meus', 12, '927438072', 1, 10, '2021-12-29 10:07:07', 1, 22),
(8, 5, 5, 'Meus', 222, '927438072', 1, 9, '2021-12-29 10:07:07', 1, 22),
(9, 5, 5, 'Meus', 12, '927438072', 0, 0, '2021-12-29 10:16:53', 1, 22),
(10, 13, 5, 'Meus', 33, '927438072', 0, 10, '2021-12-29 10:16:58', 1, 22),
(11, 12, 5, 'Meus', 12, '927438072', 1, 13, '2021-12-29 10:16:21', 1, 200),
(12, 12, 5, 'Meus', 200, '927438072', 1, 13, '2021-12-29 10:20:51', 1, 12),
(13, 12, 5, 'Meus', 90, '927438072', 1, 0, '2021-12-29 10:24:46', 1, 89),
(14, 12, 5, 'Meus', 123, '927438072', 1, 11, '2021-12-29 11:15:02', 1, 45),
(15, 12, 5, 'Meus', 12, '927438072', 1, 13, '2021-12-29 10:25:02', 1, 600),
(16, 12, 5, 'Meus', 100, '927438072', 1, 9, '2021-12-29 11:15:37', 1, 2000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `senha` text COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `nif` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_acesso` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `nif`, `bi`, `tipo_acesso`) VALUES
(12, 'Larval stage', 'mechackantonio@gmail.com', 'dddd', '+55923898842', '345678956dfghjk', '2345789fghjcvbnm', 'Admin'),
(13, 'Mateus Cobo', '1234@gmail.com', 'dddd', '+55923898842', '345678956dfghjk', '2345789fghjcvbnm', 'Admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `associar_servicos_salao`
--
ALTER TABLE `associar_servicos_salao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos_salao`
--
ALTER TABLE `servicos_salao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_salao_usuario`
--
ALTER TABLE `tb_salao_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_servicos_salao_usuarios`
--
ALTER TABLE `tb_servicos_salao_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_solicitacoes_sl_usuario`
--
ALTER TABLE `tb_solicitacoes_sl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `associar_servicos_salao`
--
ALTER TABLE `associar_servicos_salao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos_salao`
--
ALTER TABLE `servicos_salao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_salao_usuario`
--
ALTER TABLE `tb_salao_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_servicos_salao_usuarios`
--
ALTER TABLE `tb_servicos_salao_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_solicitacoes_sl_usuario`
--
ALTER TABLE `tb_solicitacoes_sl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
