-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/05/2026 às 22:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(1, 'administrador1', 'admintarefas@gmail.com', 'adm123', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_03_10_023902_create_usuario_table', 1),
(6, '2026_03_10_024742_create_tarefa_table', 1),
(7, '2026_03_10_032542_create_adm_table', 1),
(8, '2026_03_10_033213_create_tarefa_grupo_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `status` enum('Pendente','Em Progresso','Concluída') NOT NULL,
  `prioridade` enum('Baixa','Média','Alta') NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `titulo`, `descricao`, `dataInicio`, `dataTermino`, `status`, `prioridade`, `categoria`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Estudar Laravel', 'Aprender rotas, controllers e models no Laravel', '2026-03-23', '2026-03-30', 'Em Progresso', 'Alta', 'Estudos', 1, '2026-03-24 02:26:04', '2026-03-24 02:26:04'),
(2, 'Aula de violão', 'Estudar os acordes de A, B e F para a nova música', '2026-03-23', '2026-03-30', 'Em Progresso', 'Alta', 'Lazer', 1, '2026-03-24 03:03:16', '2026-03-24 03:03:16'),
(3, 'Lavar louça', 'pratos, copos e garrafas', '2026-03-23', '2026-03-30', 'Concluída', 'Baixa', 'Casa', 1, '2026-03-24 03:05:16', '2026-03-24 03:05:16'),
(4, 'Relatório Mensal', 'Preparar o relatório financeiro de maio', '2026-05-01', '2026-05-05', 'Concluída', 'Alta', 'Financeiro', 1, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(5, 'Check-up Equipe', 'Reunião de alinhamento semanal', '2026-05-02', '2026-05-02', 'Em Progresso', 'Média', 'Gestão', 1, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(6, 'Limpeza de E-mails', 'Organizar caixa de entrada', '2026-05-03', '2026-05-03', 'Pendente', 'Baixa', 'Organização', 1, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(7, 'Desenvolver API', 'Criar endpoints de autenticação', '2026-05-01', '2026-05-10', 'Em Progresso', 'Alta', 'Desenvolvimento', 2, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(8, 'Documentação', 'Escrever docs do sistema', '2026-05-11', '2026-05-12', 'Pendente', 'Média', 'Documentação', 2, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(9, 'Fix Bug #404', 'Corrigir erro de navegação no mobile', '2026-05-02', '2026-05-02', 'Concluída', 'Alta', 'Suporte', 2, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(10, 'Campanha Social', 'Postagens para o Instagram', '2026-05-01', '2026-05-07', 'Em Progresso', 'Média', 'Marketing', 3, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(11, 'Análise de SEO', 'Otimizar palavras-chave do blog', '2026-05-05', '2026-05-06', 'Pendente', 'Baixa', 'Marketing', 3, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(12, 'Briefing Cliente X', 'Reunião comercial via Meet', '2026-05-03', '2026-05-03', 'Concluída', 'Alta', 'Vendas', 3, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(13, 'Manutenção Servidor', 'Atualizar pacotes de segurança', '2026-05-02', '2026-05-02', 'Concluída', 'Alta', 'TI', 4, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(14, 'Backup Semanal', 'Verificar integridade dos backups', '2026-05-04', '2026-05-04', 'Pendente', 'Média', 'TI', 4, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(15, 'Suporte Interno', 'Resolver problema de conexão impressora', '2026-05-03', '2026-05-03', 'Em Progresso', 'Baixa', 'Suporte', 4, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(16, 'Treinamento RH', 'Workshop sobre feedback', '2026-05-10', '2026-05-10', 'Pendente', 'Média', 'RH', 7, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(17, 'Triagem Currículos', 'Vaga para Desenvolvedor Fullstack', '2026-05-01', '2026-05-05', 'Em Progresso', 'Alta', 'RH', 7, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(18, 'Atualizar Benefícios', 'Revisar plano de saúde anual', '2026-05-08', '2026-05-15', 'Pendente', 'Baixa', 'Administrativo', 7, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(19, 'Design Interface', 'Prototipar nova tela de login', '2026-05-02', '2026-05-05', 'Em Progresso', 'Alta', 'Design', 13, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(20, 'Logo Refactoring', 'Ajustar cores da marca secundária', '2026-05-06', '2026-05-07', 'Pendente', 'Média', 'Design', 13, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(21, 'Aprovação Mockups', 'Enviar artes para o cliente Y', '2026-05-01', '2026-05-01', 'Concluída', 'Baixa', 'Design', 13, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(22, 'Prospecção Ativa', 'Ligar para 10 novos leads', '2026-05-02', '2026-05-02', 'Em Progresso', 'Alta', 'Vendas', 14, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(23, 'Follow-up Propostas', 'Verificar status das propostas enviadas', '2026-05-03', '2026-05-04', 'Pendente', 'Média', 'Vendas', 14, '2026-05-02 20:51:09', '2026-05-02 20:51:09'),
(24, 'Planilha de Gastos', 'Lançar notas fiscais de viagem', '2026-05-05', '2026-05-05', 'Pendente', 'Baixa', 'Financeiro', 14, '2026-05-02 20:51:09', '2026-05-02 20:51:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefa_grupo`
--

CREATE TABLE `tarefa_grupo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `tarefa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(1, 'Giovanna', 'giovanna@email.com', '$2y$10$e0NRq7xYpQW0FQkFzF1k1uGz0eQJpY8rK9K9uQeQeQeQeQeQeQeQe', '2026-03-24 02:24:16', '2026-04-23 02:24:16'),
(2, 'Anna Baptista', 'aninhazl@email.com', 'zzz1234', '2026-03-24 02:46:37', '2026-03-24 02:46:37'),
(3, 'Joaquim Araújo de Lima', 'jojolimone@email.com', 'quinzinho#15', '2026-03-24 02:47:36', '2026-03-24 02:47:36'),
(4, 'Ronaldo da Costa Aranha', 'ronaldinhoPaulista@gmail.com', 'roro123', '2026-04-04 03:27:01', '2026-04-04 03:27:01'),
(7, 'Rogério Cordeiro', 'rogerinhodev@gmail.com', '$2y$10$hWGnFuVfeRjvkyMKYJG3V.WMUBq.rmZvOHmmQHtgOiLLDGAKddbfe', '2026-04-04 05:24:30', '2026-04-04 05:24:30'),
(13, 'Felipe Castanhari', 'felipinhocastanhari@gmail.com', '$2y$10$iZZVUC0yM5pBD42mi/0wnOOBrNvNjoJ872dEIEUOjQr9KJM59mcpK', NULL, NULL),
(14, 'Pepino Gentille Silva', 'leguminoso67@gmail.com', '$2y$10$fhU9hhki1jjzjvTwc2eCFeyMQ5Paibp1fWVpUCwcaXXkhEBj8oDNG', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarefa_usuario_id_foreign` (`usuario_id`);

--
-- Índices de tabela `tarefa_grupo`
--
ALTER TABLE `tarefa_grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarefa_grupo_tarefa_id_foreign` (`tarefa_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tarefa_grupo`
--
ALTER TABLE `tarefa_grupo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `tarefa_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tarefa_grupo`
--
ALTER TABLE `tarefa_grupo`
  ADD CONSTRAINT `tarefa_grupo_tarefa_id_foreign` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
