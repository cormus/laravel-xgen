-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Mar-2014 às 17:58
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_cormus_consoles`
--

CREATE TABLE IF NOT EXISTS `lara_cormus_consoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Extraindo dados da tabela `lara_cormus_consoles`
--

INSERT INTO `lara_cormus_consoles` (`id`, `title`, `description`, `date_create`) VALUES
(1, 'a', 'b', '2014-03-26 20:50:02'),
(2, 'a', 'b', '2014-03-26 20:50:23'),
(3, 'a', 'b', '2014-03-26 20:50:23'),
(4, 'a', 'b', '2014-03-26 20:50:23'),
(5, 'a', 'b', '2014-03-26 20:50:23'),
(6, 'a', 'b', '2014-03-26 20:50:23'),
(7, 'a', 'b', '2014-03-26 20:50:23'),
(8, 'a', 'b', '2014-03-26 20:50:23'),
(9, 'a', 'b', '2014-03-26 20:50:23'),
(10, 'a', 'b', '2014-03-26 20:50:23'),
(11, 'a', 'b', '2014-03-26 20:50:23'),
(12, 'a', 'b', '2014-03-26 20:50:23'),
(13, 'a', 'b', '2014-03-26 20:50:23'),
(14, 'a', 'b', '2014-03-26 20:50:23'),
(15, 'a', 'b', '2014-03-26 20:50:23'),
(16, 'a', 'b', '2014-03-26 20:50:27'),
(17, 'a', 'b', '2014-03-26 20:50:27'),
(18, 'a', 'b', '2014-03-26 20:50:27'),
(19, 'a', 'b', '2014-03-26 20:50:27'),
(20, 'a', 'b', '2014-03-26 20:50:27'),
(21, 'a', 'b', '2014-03-26 20:50:27'),
(22, 'a', 'b', '2014-03-26 20:50:27'),
(23, 'a', 'b', '2014-03-26 20:50:27'),
(24, 'a', 'b', '2014-03-26 20:50:27'),
(25, 'a', 'b', '2014-03-26 20:50:27'),
(26, 'a', 'b', '2014-03-26 20:50:27'),
(27, 'a', 'b', '2014-03-26 20:50:27'),
(28, 'a', 'b', '2014-03-26 20:50:27'),
(29, 'a', 'b', '2014-03-26 20:50:27'),
(30, 'a', 'b', '2014-03-26 20:50:30'),
(31, 'a', 'b', '2014-03-26 20:50:30'),
(32, 'a', 'b', '2014-03-26 20:50:30'),
(33, 'a', 'b', '2014-03-26 20:50:30'),
(34, 'a', 'b', '2014-03-26 20:50:30'),
(35, 'a', 'b', '2014-03-26 20:50:30'),
(36, 'a', 'b', '2014-03-26 20:50:30'),
(37, 'a', 'b', '2014-03-26 20:50:30'),
(38, 'a', 'b', '2014-03-26 20:50:30'),
(39, 'a', 'b', '2014-03-26 20:50:30'),
(40, 'a', 'b', '2014-03-26 20:50:30'),
(41, 'a', 'b', '2014-03-26 20:50:30'),
(42, 'a', 'b', '2014-03-26 20:50:30'),
(43, 'a', 'b', '2014-03-26 20:50:30'),
(44, 'a', 'b', '2014-03-26 20:50:33'),
(45, 'a', 'b', '2014-03-26 20:50:33'),
(46, 'a', 'b', '2014-03-26 20:50:33'),
(47, 'a', 'b', '2014-03-26 20:50:33'),
(48, 'a', 'b', '2014-03-26 20:50:33'),
(49, 'a', 'b', '2014-03-26 20:50:33'),
(50, 'a', 'b', '2014-03-26 20:50:33'),
(51, 'a', 'b', '2014-03-26 20:50:33'),
(52, 'a', 'b', '2014-03-26 20:50:33'),
(53, 'a', 'b', '2014-03-26 20:50:33'),
(54, 'a', 'b', '2014-03-26 20:50:33'),
(55, 'a', 'b', '2014-03-26 20:50:33'),
(56, 'a', 'b', '2014-03-26 20:50:33'),
(57, 'a', 'b', '2014-03-26 20:50:33'),
(58, 'a', 'b', '2014-03-26 20:50:36'),
(59, 'a', 'b', '2014-03-26 20:50:36'),
(60, 'a', 'b', '2014-03-26 20:50:36'),
(61, 'a', 'b', '2014-03-26 20:50:36'),
(62, 'a', 'b', '2014-03-26 20:50:36'),
(63, 'a', 'b', '2014-03-26 20:50:36'),
(64, 'a', 'b', '2014-03-26 20:50:36'),
(65, 'a', 'b', '2014-03-26 20:50:36'),
(66, 'a', 'b', '2014-03-26 20:50:36'),
(67, 'a', 'b', '2014-03-26 20:50:36'),
(68, 'a', 'b', '2014-03-26 20:50:36'),
(69, 'a', 'b', '2014-03-26 20:50:36'),
(70, 'a', 'b', '2014-03-26 20:50:36'),
(71, 'a', 'b', '2014-03-26 20:50:36'),
(72, 'a', 'b', '2014-03-26 20:50:39'),
(73, 'a', 'b', '2014-03-26 20:50:39'),
(74, 'a', 'b', '2014-03-26 20:50:39'),
(75, 'a', 'b', '2014-03-26 20:50:39'),
(76, 'a', 'b', '2014-03-26 20:50:39'),
(77, 'a', 'b', '2014-03-26 20:50:39'),
(78, 'a', 'b', '2014-03-26 20:50:39'),
(79, 'a', 'b', '2014-03-26 20:50:39'),
(80, 'a', 'b', '2014-03-26 20:50:39'),
(81, 'a', 'b', '2014-03-26 20:50:39'),
(82, 'a', 'b', '2014-03-26 20:50:39'),
(83, 'a', 'b', '2014-03-26 20:50:39'),
(84, 'a', 'b', '2014-03-26 20:50:39'),
(85, 'a', 'b', '2014-03-26 20:50:39'),
(86, 'a', 'b', '2014-03-26 20:50:41'),
(87, 'a', 'b', '2014-03-26 20:50:41'),
(88, 'a', 'b', '2014-03-26 20:50:41'),
(89, 'a', 'b', '2014-03-26 20:50:41'),
(90, 'a', 'b', '2014-03-26 20:50:41'),
(91, 'a', 'b', '2014-03-26 20:50:41'),
(92, 'a', 'b', '2014-03-26 20:50:41'),
(93, 'a', 'b', '2014-03-26 20:50:41'),
(94, 'a', 'b', '2014-03-26 20:50:41'),
(95, 'a', 'b', '2014-03-26 20:50:41'),
(96, 'a', 'b', '2014-03-26 20:50:41'),
(97, 'a', 'b', '2014-03-26 20:50:41'),
(98, 'a', 'b', '2014-03-26 20:50:41'),
(99, 'a', 'b', '2014-03-26 20:50:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lara_cormus_games`
--

CREATE TABLE IF NOT EXISTS `lara_cormus_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Extraindo dados da tabela `lara_cormus_games`
--

INSERT INTO `lara_cormus_games` (`id`, `title`, `description`, `date_create`) VALUES
(1, 'a', 'b', '2014-03-26 20:50:02'),
(2, 'a', 'b', '2014-03-26 20:50:23'),
(3, 'a', 'b', '2014-03-26 20:50:23'),
(4, 'a', 'b', '2014-03-26 20:50:23'),
(5, 'a', 'b', '2014-03-26 20:50:23'),
(6, 'a', 'b', '2014-03-26 20:50:23'),
(7, 'a', 'b', '2014-03-26 20:50:23'),
(8, 'a', 'b', '2014-03-26 20:50:23'),
(9, 'a', 'b', '2014-03-26 20:50:23'),
(10, 'a', 'b', '2014-03-26 20:50:23'),
(11, 'a', 'b', '2014-03-26 20:50:23'),
(12, 'a', 'b', '2014-03-26 20:50:23'),
(13, 'a', 'b', '2014-03-26 20:50:23'),
(14, 'a', 'b', '2014-03-26 20:50:23'),
(15, 'a', 'b', '2014-03-26 20:50:23'),
(16, 'a', 'b', '2014-03-26 20:50:27'),
(17, 'a', 'b', '2014-03-26 20:50:27'),
(18, 'a', 'b', '2014-03-26 20:50:27'),
(19, 'a', 'b', '2014-03-26 20:50:27'),
(20, 'a', 'b', '2014-03-26 20:50:27'),
(21, 'a', 'b', '2014-03-26 20:50:27'),
(22, 'a', 'b', '2014-03-26 20:50:27'),
(23, 'a', 'b', '2014-03-26 20:50:27'),
(24, 'a', 'b', '2014-03-26 20:50:27'),
(25, 'a', 'b', '2014-03-26 20:50:27'),
(26, 'a', 'b', '2014-03-26 20:50:27'),
(27, 'a', 'b', '2014-03-26 20:50:27'),
(28, 'a', 'b', '2014-03-26 20:50:27'),
(29, 'a', 'b', '2014-03-26 20:50:27'),
(30, 'a', 'b', '2014-03-26 20:50:30'),
(31, 'a', 'b', '2014-03-26 20:50:30'),
(32, 'a', 'b', '2014-03-26 20:50:30'),
(33, 'a', 'b', '2014-03-26 20:50:30'),
(34, 'a', 'b', '2014-03-26 20:50:30'),
(35, 'a', 'b', '2014-03-26 20:50:30'),
(36, 'a', 'b', '2014-03-26 20:50:30'),
(37, 'a', 'b', '2014-03-26 20:50:30'),
(38, 'a', 'b', '2014-03-26 20:50:30'),
(39, 'a', 'b', '2014-03-26 20:50:30'),
(40, 'a', 'b', '2014-03-26 20:50:30'),
(41, 'a', 'b', '2014-03-26 20:50:30'),
(42, 'a', 'b', '2014-03-26 20:50:30'),
(43, 'a', 'b', '2014-03-26 20:50:30'),
(44, 'a', 'b', '2014-03-26 20:50:33'),
(45, 'a', 'b', '2014-03-26 20:50:33'),
(46, 'a', 'b', '2014-03-26 20:50:33'),
(47, 'a', 'b', '2014-03-26 20:50:33'),
(48, 'a', 'b', '2014-03-26 20:50:33'),
(49, 'a', 'b', '2014-03-26 20:50:33'),
(50, 'a', 'b', '2014-03-26 20:50:33'),
(51, 'a', 'b', '2014-03-26 20:50:33'),
(52, 'a', 'b', '2014-03-26 20:50:33'),
(53, 'a', 'b', '2014-03-26 20:50:33'),
(54, 'a', 'b', '2014-03-26 20:50:33'),
(55, 'a', 'b', '2014-03-26 20:50:33'),
(56, 'a', 'b', '2014-03-26 20:50:33'),
(57, 'a', 'b', '2014-03-26 20:50:33'),
(58, 'a', 'b', '2014-03-26 20:50:36'),
(59, 'a', 'b', '2014-03-26 20:50:36'),
(60, 'a', 'b', '2014-03-26 20:50:36'),
(61, 'a', 'b', '2014-03-26 20:50:36'),
(62, 'a', 'b', '2014-03-26 20:50:36'),
(63, 'a', 'b', '2014-03-26 20:50:36'),
(64, 'a', 'b', '2014-03-26 20:50:36'),
(65, 'a', 'b', '2014-03-26 20:50:36'),
(66, 'a', 'b', '2014-03-26 20:50:36'),
(67, 'a', 'b', '2014-03-26 20:50:36'),
(68, 'a', 'b', '2014-03-26 20:50:36'),
(69, 'a', 'b', '2014-03-26 20:50:36'),
(70, 'a', 'b', '2014-03-26 20:50:36'),
(71, 'a', 'b', '2014-03-26 20:50:36'),
(72, 'a', 'b', '2014-03-26 20:50:39'),
(73, 'a', 'b', '2014-03-26 20:50:39'),
(74, 'a', 'b', '2014-03-26 20:50:39'),
(75, 'a', 'b', '2014-03-26 20:50:39'),
(76, 'a', 'b', '2014-03-26 20:50:39'),
(77, 'a', 'b', '2014-03-26 20:50:39'),
(78, 'a', 'b', '2014-03-26 20:50:39'),
(79, 'a', 'b', '2014-03-26 20:50:39'),
(80, 'a', 'b', '2014-03-26 20:50:39'),
(81, 'a', 'b', '2014-03-26 20:50:39'),
(82, 'a', 'b', '2014-03-26 20:50:39'),
(83, 'a', 'b', '2014-03-26 20:50:39'),
(84, 'a', 'b', '2014-03-26 20:50:39'),
(85, 'a', 'b', '2014-03-26 20:50:39'),
(86, 'a', 'b', '2014-03-26 20:50:41'),
(87, 'a', 'b', '2014-03-26 20:50:41'),
(88, 'a', 'b', '2014-03-26 20:50:41'),
(89, 'a', 'b', '2014-03-26 20:50:41'),
(90, 'a', 'b', '2014-03-26 20:50:41'),
(91, 'a', 'b', '2014-03-26 20:50:41'),
(92, 'a', 'b', '2014-03-26 20:50:41'),
(93, 'a', 'b', '2014-03-26 20:50:41'),
(94, 'a', 'b', '2014-03-26 20:50:41'),
(95, 'a', 'b', '2014-03-26 20:50:41'),
(96, 'a', 'b', '2014-03-26 20:50:41'),
(97, 'a', 'b', '2014-03-26 20:50:41'),
(98, 'a', 'b', '2014-03-26 20:50:41'),
(99, 'a', 'b', '2014-03-26 20:50:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

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
(10, 10, NULL, 0, 0, 0, NULL, NULL),
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
(39, 49, NULL, 0, 0, 0, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Extraindo dados da tabela `lara_users`
--

INSERT INTO `lara_users` (`id`, `login`, `email`, `password`, `month_limit`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(9, 'stoledo3', 'saulo@stoledo.com.br', '$2y$10$JeEZDaj90ySKCDHJGwnxBOVJwXNj4gDoKF4y.l/JBBCcn4TXA.mby', 0, NULL, 1, NULL, '2014-01-16 17:56:24', '2014-02-05 20:00:33', '$2y$10$uhGkiZvCHzz0neEoFQai1u7cyoOGA/KkdH6X3sL1Rf12kDJFRXqwS', NULL, NULL, NULL, '2013-08-15 00:33:50', '2014-02-05 20:00:33'),
(10, 'stoledo', 'cliente@stoledo.com.br', '$2y$10$I1j8W6vyK7gw/Tk999wTAObk3j3PCL/5b/RBDvdiZXdo7xhItEMVe', 0, NULL, 1, NULL, NULL, '2013-09-26 20:46:59', '$2y$10$i/fKr7OjLyU/msCr2bYhJug9qjI4d1/U.BENuuPmVSVyFT6efOYKO', NULL, NULL, NULL, '2013-08-15 00:33:50', '2013-09-26 20:46:59'),
(49, 'alexprodutor@hotmail.com', 'alexprodutor@hotmail.com', '$2y$10$WGv5eCz1M1hZVEGnr2Sj4uFHhQC3QXcxY0cLIXPawpK5V1jBbbEBi', 0, NULL, 1, NULL, NULL, '2014-01-17 10:56:21', '$2y$10$EDKfw7zZ8iU/jwuBDslem.J0sfEo1vx7tvtR8K8tQPjUOpcUId7EK', NULL, NULL, NULL, '2014-01-16 20:43:35', '2014-01-17 10:56:21');

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
(9, 1),
(10, 2),
(31, 2),
(39, 2),
(40, 2),
(48, 2),
(49, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `lara_users_historic`
--

INSERT INTO `lara_users_historic` (`id`, `id_user`, `title`, `amount_sent`, `created_at`, `updated_at`) VALUES
(1, 9, 'teste', 1, '2013-10-03 21:00:51', '2013-10-03 21:00:51'),
(2, 9, 'teste', 1, '2013-10-03 21:34:53', '2013-10-03 21:34:53'),
(3, 9, 'Seu investimento em publicidade tá valendo a pena?', 4, '2014-02-05 20:01:45', '2014-02-05 20:01:45'),
(4, 9, 'Seu investimento em publicidade tá valendo a pena?', 4, '2014-02-05 20:14:01', '2014-02-05 20:14:01'),
(5, 9, 'Seu investimento em publicidade tá valendo a pena?', 4, '2014-02-05 20:21:36', '2014-02-05 20:21:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
