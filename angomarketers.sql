-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08-Jun-2026 às 05:37
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
-- Banco de dados: `angomarketers`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `body` longtext NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `reading_time` varchar(255) NOT NULL DEFAULT '5 min',
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `views_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `subtitle`, `body`, `image_path`, `author_id`, `category_id`, `reading_time`, `status`, `featured`, `views_count`, `meta_title`, `meta_description`, `og_image`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Startups Angolanas Captam Volume Recorde de Investimento de Capital de Risco no Primeiro Semestre de 2026', 'startups-angolanas-captam-volume-recorde-de-investimento-de-capital-de-risco-no-primeiro-semestre-de-2026', 'O ecossistema angolano de tecnologia demonstra amadurecimento acelerado com investimentos liderados por fundos regionais e internacionais.', 'O ecossistema tecnológico de Angola está a viver um momento histórico...', 'https://images.unsplash.com/photo-1556761175-b81465842c39?q=80&w=1200', 2, 5, '7 min', 'published', 1, 452, 'Startups Angolanas Captam Volume Recorde de Investimento de Capital de Risco no Primeiro Semestre de 2026', 'O ecossistema angolano de tecnologia demonstra amadurecimento acelerado com investimentos liderados por fundos regionais e internacionais.', 'https://images.unsplash.com/photo-1556761175-b81465842c39?q=80&w=1200', '2026-06-08 02:19:26', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Como a Inteligência Artificial está a Redefinir a Fraude Bancária em Luanda', 'como-a-inteligencia-artificial-esta-a-redefinir-a-fraude-bancaria-em-luanda', 'Análise do impacto de sistemas cognitivos e Machine Learning na proteção de transações financeiras nos bancos comerciais de Luanda.', 'Os bancos comerciais em Luanda estão a investir milhões em sistemas de proteção antifraude baseados em inteligência artificial...', 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=800', 1, 3, '5 min', 'published', 0, 1758, 'Como a Inteligência Artificial está a Redefinir a Fraude Bancária em Luanda', 'Análise do impacto de sistemas cognitivos e Machine Learning na proteção de transações financeiras nos bancos comerciais de Luanda.', 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=800', '2026-06-07 02:19:26', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, '5 Estratégias de Marketing de Conteúdo para PMEs Angolanas sem Orçamento', '5-estrategias-de-marketing-de-conteudo-para-pmes-angolanas-sem-orcamento', 'Como criar uma presença digital marcante, atrair clientes orgânicos e fidelizar o público local sem depender de anúncios pagos.', 'Para as pequenas e médias empresas em Angola, a publicidade digital paga pode representar um investimento incomportável...', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800', 3, 1, '4 min', 'published', 1, 635, '5 Estratégias de Marketing de Conteúdo para PMEs Angolanas sem Orçamento', 'Como criar uma presença digital marcante, atrair clientes orgânicos e fidelizar o público local sem depender de anúncios pagos.', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800', '2026-06-06 02:19:26', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `avatar_path` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `authors`
--

INSERT INTO `authors` (`id`, `name`, `slug`, `avatar_path`, `role`, `bio`, `facebook_url`, `twitter_url`, `linkedin_url`, `created_at`, `updated_at`) VALUES
(1, 'Sandra Neto', 'sandra-neto', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=150', 'Diretora Editorial & IA Lead', 'Sandra é jornalista e consultora de tecnologia com foco em Inteligência Artificial e ética de dados.', '#', '#', '#', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Mateus Cambando', 'mateus-cambando', 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=150', 'Editor de Startups & VC', 'Mateus acompanha o ecossistema empreendedor africano, analisando rondas de capital de risco e fintechs.', '#', '#', '#', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, 'Telma Bernardo', 'telma-bernardo', 'https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=150', 'Chefe de Redação & Marketing', 'Telma coordena a linha de marketing estratégico, tendências de branding e publicidade corporativa.', '#', '#', '#', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(4, 'Redação', 'redacao', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=150', 'Redação AngoMarketers', 'A equipa de redação da AngoMarketers produz reportagens especiais, coberturas de eventos e comunicados corporativos.', '#', '#', '#', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', 'marketing', 'Estratégias de marca, branding, publicidade e canais digitais.', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Tecnologia', 'tecnologia', 'Hardware, infraestrutura de rede, cibersegurança e telecomunicações.', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, 'IA', 'ia', 'Inteligência Artificial, aprendizado de máquina e automação inteligente.', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(4, 'Negócios', 'negocios', 'Macroeconomia, investimentos privados, turismo e banca nacional.', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(5, 'Startups', 'startups', 'Ecossistema empreendedor, venture capital e inovações financeiras.', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(6, 'Podcast', 'podcast', 'Conversas em áudio com especialistas sobre tendências do ecossistema.', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `author_name`, `author_email`, `content`, `parent_id`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 1, 'João Brandão', 'joao@example.com', 'Excelente artigo. O mercado angolano realmente precisa de mais foco em Venture Capital.', NULL, 1, '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `body` longtext NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `event_date` datetime NOT NULL,
  `event_end_date` datetime DEFAULT NULL,
  `ticket_price` decimal(10,2) DEFAULT NULL,
  `capacity` int(10) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `registration_link` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `views_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `organizer` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `description`, `body`, `image_path`, `event_date`, `event_end_date`, `ticket_price`, `capacity`, `meta_title`, `meta_description`, `og_image`, `location`, `registration_link`, `video_url`, `status`, `featured`, `views_count`, `organizer`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Angola Marketing Summit 2026', 'angola-marketing-summit-2026', 'O maior encontro anual de profissionais de marketing, publicidade e branding de Angola.', 'O Angola Marketing Summit regressa em 2026 para debater as novas fronteiras da comunicação de marca...', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=800', '2026-08-08 09:00:26', NULL, 25000.00, 300, NULL, NULL, NULL, 'Hotel Epic Sana, Luanda', 'https://angolamarketingsummit.com', NULL, 'published', 1, 152, 'AngoMarketers Eventos', '2026-06-08 02:19:26', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Fórum de Comunicação de Luanda 2025', 'forum-comunicacao-luanda-2025', 'O resumo do encontro histórico de marcas angolanas que decorreu no final de 2025.', 'O Fórum de Comunicação de Luanda de 2025 reuniu mais de 300 participantes...', 'https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800', '2025-12-08 14:00:26', NULL, 0.00, 500, NULL, NULL, NULL, 'Talatona Convention Centre, Luanda', NULL, 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'published', 0, 355, 'Luanda Comunica', '2025-12-08 02:19:26', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `event_photos`
--

CREATE TABLE `event_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
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
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `menu_items`
--

INSERT INTO `menu_items` (`id`, `title`, `url`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Início', '/', NULL, 1, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Notícias', '/noticias', NULL, 2, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, 'Eventos', '/eventos', NULL, 3, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(4, 'Formações', '/formacoes', NULL, 4, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(5, 'Marketing', '/noticias?categoria=marketing', 2, 1, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(6, 'Tecnologia', '/noticias?categoria=tecnologia', 2, 2, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(7, 'IA', '/noticias?categoria=ia', 2, 3, '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_04_151530_create_categories_table', 1),
(5, '2026_06_04_151531_create_authors_table', 1),
(6, '2026_06_04_151532_create_articles_table', 1),
(7, '2026_06_04_151533_create_comments_table', 1),
(8, '2026_06_04_151533_create_subscribers_table', 1),
(9, '2026_06_05_120000_create_events_tables', 1),
(10, '2026_06_07_000000_create_trainings_tables', 1),
(11, '2026_06_07_000001_create_tags_tables', 1),
(12, '2026_06_07_000002_add_seo_and_featured_to_articles_and_events', 1),
(13, '2026_06_07_000003_create_settings_table', 1),
(14, '2026_06_07_000004_create_partners_table', 1),
(15, '2026_06_07_000005_create_slider_items_table', 1),
(16, '2026_06_07_000006_create_menu_items_table', 1),
(17, '2026_06_07_000007_create_search_logs_table', 1),
(18, '2026_06_07_000008_create_visits_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo_path`, `url`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Unitel', 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=200', 'https://www.unitel.ao', 1, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'BFA', 'https://images.unsplash.com/photo-1618005198143-e52834643034?q=80&w=200', 'https://www.bfa.ao', 2, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, 'BAI', 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=200', 'https://www.bai.ao', 3, '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `search_logs`
--

CREATE TABLE `search_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `query` varchar(255) NOT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'homepage_video_url', 'https://youtu.be/GyxYCgc3jmM', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'homepage_video_show', '1', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, 'ad_super_billboard_image', 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1200', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(4, 'ad_super_billboard_url', 'https://angomarketers.com/publicidade', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(5, 'ad_super_billboard_show', '1', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(6, 'ad_slim_leaderboard_image', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(7, 'ad_slim_leaderboard_url', 'https://angomarketers.com/publicidade', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(8, 'ad_slim_leaderboard_show', '1', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(9, 'system_site_name', 'AngoMarketers', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(10, 'system_site_description', 'O maior portal de Marketing, Tecnologia e Negócios de Angola.', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(11, 'system_contact_email', 'contacto@angomarketers.com', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(12, 'system_contact_whatsapp', '+244923000000', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(13, 'system_facebook_url', 'https://facebook.com/angomarketers', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(14, 'system_instagram_url', 'https://instagram.com/angomarketers', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(15, 'system_linkedin_url', 'https://linkedin.com/company/angomarketers', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider_items`
--

CREATE TABLE `slider_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `badge_color` varchar(255) NOT NULL DEFAULT 'bg-primary',
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `slider_items`
--

INSERT INTO `slider_items` (`id`, `title`, `subtitle`, `image_path`, `url`, `badge`, `badge_color`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Liderando o Futuro Digital em Angola', 'Descubra as principais tendências de Marketing, Tecnologia, IA & Negócios.', 'https://images.unsplash.com/photo-1556761175-b81465842c39?q=80&w=1200', '/noticias', NULL, 'bg-primary', 1, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Angola Marketing Summit 2026', 'Inscreva-se no maior evento corporativo do ano em Luanda.', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1200', '/eventos/angola-marketing-summit-2026', NULL, 'bg-primary', 2, '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `subscribers`
--

INSERT INTO `subscribers` (`id`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, '+244923000000', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `taggables`
--

INSERT INTO `taggables` (`id`, `tag_id`, `taggable_type`, `taggable_id`, `created_at`, `updated_at`) VALUES
(1, 8, 'App\\Domain\\Articles\\Models\\Article', 1, NULL, NULL),
(2, 1, 'App\\Domain\\Articles\\Models\\Article', 1, NULL, NULL),
(3, 8, 'App\\Domain\\Articles\\Models\\Article', 2, NULL, NULL),
(4, 1, 'App\\Domain\\Articles\\Models\\Article', 2, NULL, NULL),
(5, 8, 'App\\Domain\\Articles\\Models\\Article', 3, NULL, NULL),
(6, 1, 'App\\Domain\\Articles\\Models\\Article', 3, NULL, NULL),
(7, 8, 'App\\Domain\\Events\\Models\\Event', 1, NULL, NULL),
(8, 5, 'App\\Domain\\Events\\Models\\Event', 1, NULL, NULL),
(9, 1, 'App\\Domain\\Events\\Models\\Event', 2, NULL, NULL),
(10, 2, 'App\\Domain\\Trainings\\Models\\Training', 1, NULL, NULL),
(11, 8, 'App\\Domain\\Trainings\\Models\\Training', 1, NULL, NULL),
(12, 6, 'App\\Domain\\Trainings\\Models\\Training', 2, NULL, NULL),
(13, 1, 'App\\Domain\\Trainings\\Models\\Training', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Luanda', 'luanda', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'SEO', 'seo', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, 'Startups', 'startups', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(4, 'Fintech', 'fintech', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(5, 'Branding', 'branding', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(6, 'IA', 'ia', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(7, 'Webinar', 'webinar', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(8, 'Angola', 'angola', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `description` longtext NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `institution` varchar(255) NOT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mode` varchar(255) NOT NULL DEFAULT 'online',
  `registration_link` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `views_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `slug`, `excerpt`, `description`, `cover_image`, `institution`, `instructor`, `duration`, `price`, `location`, `mode`, `registration_link`, `start_date`, `end_date`, `featured`, `status`, `views_count`, `meta_title`, `meta_description`, `og_image`, `created_at`, `updated_at`) VALUES
(1, 'Especialização em SEO Técnico e Performance Web', 'especializacao-seo-tecnico-performance-web', 'Domine técnicas avançadas de otimização nos motores de busca com foco em mercados de conectividade reduzida.', 'Este treinamento prático abordará os fundamentos técnicos de SEO, como Web Vitals, otimização de renderização no servidor, compressão de imagens inteligente, tags Open Graph estruturadas e auditoria de indexação em dispositivos móveis.', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800', 'AngoMarketers Academy', 'Telma Bernardo', '40 Horas', 45000.00, 'Online & Presencial (Híbrido)', 'híbrido', 'https://angomarketers.com/academy', '2026-07-06 03:19:26', '2026-08-03 03:19:26', 1, 'published', 483, 'Especialização em SEO Técnico | AngoMarketers Academy', 'Aprenda a otimizar sites para velocidade e motores de busca.', NULL, '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Introdução à Inteligência Artificial para Gestores de Marketing', 'introducao-ia-gestores-marketing', 'Aprenda a usar ferramentas generativas e prompts estruturados para acelerar a sua produtividade e campanhas.', 'Uma formação focada no uso prático do ChatGPT, Midjourney e ferramentas cognitivas aplicadas ao copywriting, automatização de relatórios de tráfego, design de campanhas e análise inteligente de audiência no mercado nacional.', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800', 'Cognitiva Angola', 'Sandra Neto', '12 Horas', 15000.00, 'Online', 'online', 'https://cognitiva.ao/marketing-ia', '2026-06-22 03:19:26', '2026-06-29 03:19:26', 1, 'published', 566, 'IA para Marketing | Cognitiva', 'Aprenda IA aplicada ao marketing estratégico.', NULL, '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `training_categories`
--

CREATE TABLE `training_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `training_categories`
--

INSERT INTO `training_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Marketing Digital', 'marketing-digital', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(2, 'Tecnologia & Programação', 'tecnologia-programacao', '2026-06-08 02:19:26', '2026-06-08 02:19:26'),
(3, 'Inteligência Artificial', 'inteligencia-artificial', '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `training_category`
--

CREATE TABLE `training_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `training_category`
--

INSERT INTO `training_category` (`id`, `training_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
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

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin AngoMarketers', 'admin@angomarketers.com', NULL, '$2y$12$.9EWgVs8vS7HDfnnfOCPnue9f/vIM4J36H7iDe3VfXHN.t4k0IeNy', NULL, '2026-06-08 02:19:26', '2026-06-08 02:19:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_author_id_foreign` (`author_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Índices para tabela `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_slug_unique` (`slug`);

--
-- Índices para tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_id_foreign` (`article_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Índices para tabela `event_photos`
--
ALTER TABLE `event_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_photos_event_id_foreign` (`event_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices para tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_parent_id_foreign` (`parent_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `search_logs`
--
ALTER TABLE `search_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `search_logs_query_unique` (`query`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Índices para tabela `slider_items`
--
ALTER TABLE `slider_items`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_whatsapp_unique` (`whatsapp`);

--
-- Índices para tabela `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Índices para tabela `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Índices para tabela `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainings_slug_unique` (`slug`);

--
-- Índices para tabela `training_categories`
--
ALTER TABLE `training_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `training_categories_slug_unique` (`slug`);

--
-- Índices para tabela `training_category`
--
ALTER TABLE `training_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_category_training_id_foreign` (`training_id`),
  ADD KEY `training_category_category_id_foreign` (`category_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `event_photos`
--
ALTER TABLE `event_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `search_logs`
--
ALTER TABLE `search_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `slider_items`
--
ALTER TABLE `slider_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `training_categories`
--
ALTER TABLE `training_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `training_category`
--
ALTER TABLE `training_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `event_photos`
--
ALTER TABLE `event_photos`
  ADD CONSTRAINT `event_photos_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `training_category`
--
ALTER TABLE `training_category`
  ADD CONSTRAINT `training_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `training_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `training_category_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
