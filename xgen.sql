-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jan-2015 às 20:34
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xgen`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_cormus_publishing_house`
--

CREATE TABLE IF NOT EXISTS `lara_cormus_publishing_house` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_link` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `history` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_groups`
--

CREATE TABLE IF NOT EXISTS `lara_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `lara_groups`
--

INSERT INTO `lara_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admins', '{"admin":1,"users":1}', '2013-08-15 00:33:49', '2013-08-15 00:33:49'),
(2, 'Users', '{"users":1}', '2013-08-15 00:33:49', '2013-08-15 00:33:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_migrations`
--

CREATE TABLE IF NOT EXISTS `lara_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `lara_migrations`
--

INSERT INTO `lara_migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_throttle`
--

CREATE TABLE IF NOT EXISTS `lara_throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `lara_throttle`
--

INSERT INTO `lara_throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`) VALUES
(1, 1, '192.168.254.132', 2, 0, 0, '2013-08-15 00:14:54', NULL),
(2, 4, '192.168.254.132', 1, 0, 0, '2013-08-10 02:58:51', NULL),
(3, 2, NULL, 0, 0, 0, NULL, NULL),
(4, 3, NULL, 0, 0, 0, NULL, NULL),
(5, 5, NULL, 0, 0, 0, NULL, NULL),
(6, 6, NULL, 1, 0, 0, '2013-08-15 00:33:34', NULL),
(7, 7, NULL, 0, 0, 0, NULL, NULL),
(8, 8, NULL, 0, 0, 0, NULL, NULL),
(9, 9, NULL, 5, 1, 0, NULL, NULL),
(10, 10, NULL, 3, 0, 0, '2015-01-12 13:49:10', NULL),
(11, 11, NULL, 0, 0, 0, NULL, NULL),
(12, 13, NULL, 0, 0, 0, NULL, NULL),
(13, 14, NULL, 0, 0, 0, NULL, NULL),
(14, 15, NULL, 0, 0, 0, NULL, NULL),
(15, 16, NULL, 0, 0, 0, NULL, NULL),
(16, 19, NULL, 0, 0, 0, NULL, NULL),
(17, 20, NULL, 0, 0, 0, NULL, NULL),
(18, 21, NULL, 0, 0, 0, NULL, NULL),
(19, 22, NULL, 0, 0, 0, NULL, NULL),
(20, 23, NULL, 0, 0, 0, NULL, NULL),
(21, 24, NULL, 0, 0, 0, NULL, NULL),
(22, 25, NULL, 0, 0, 0, NULL, NULL),
(23, 26, NULL, 0, 0, 0, NULL, NULL),
(24, 27, NULL, 0, 0, 0, NULL, NULL),
(25, 28, NULL, 0, 0, 0, NULL, NULL),
(26, 29, NULL, 0, 0, 0, NULL, NULL),
(27, 30, NULL, 0, 0, 0, NULL, NULL),
(28, 31, NULL, 1, 0, 0, '2013-12-26 10:52:57', NULL),
(29, 32, NULL, 0, 0, 0, NULL, NULL),
(30, 33, NULL, 0, 0, 0, NULL, NULL),
(31, 34, NULL, 0, 0, 0, NULL, NULL),
(32, 35, NULL, 0, 0, 0, NULL, NULL),
(33, 36, NULL, 0, 0, 0, NULL, NULL),
(34, 37, NULL, 0, 0, 0, NULL, NULL),
(35, 38, NULL, 0, 0, 0, NULL, NULL),
(36, 39, NULL, 0, 0, 0, NULL, NULL),
(37, 40, NULL, 0, 0, 0, NULL, NULL),
(38, 48, NULL, 0, 0, 0, NULL, NULL),
(39, 49, NULL, 0, 0, 0, NULL, NULL),
(40, 50, '127.0.0.1', 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_users`
--

CREATE TABLE IF NOT EXISTS `lara_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `month_limit` int(11) NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `lara_users`
--

INSERT INTO `lara_users` (`id`, `login`, `email`, `password`, `month_limit`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(50, '', 'teste@teste.com', 'ObW0ksjnJJYmFMe0d7c8d929813cbd5208ddfcdbd6d361d6a70068208d0c16f92d61d771675e79e1', 0, NULL, 1, NULL, NULL, '2015-01-12 13:50:25', 'lUhD5oGrw4axu4vS35616a451478ddd6649b6c14357c9495afc89e271bef7c90e9ef070538cb6dec', NULL, NULL, NULL, '2015-01-12 13:49:36', '2015-01-12 13:50:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_users_groups`
--

CREATE TABLE IF NOT EXISTS `lara_users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `lara_users_groups`
--

INSERT INTO `lara_users_groups` (`user_id`, `group_id`) VALUES
(50, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_users_historic`
--

CREATE TABLE IF NOT EXISTS `lara_users_historic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(160) NOT NULL,
  `amount_sent` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
