-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 04 mai 2019 à 00:25
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `blogpost`
--

DROP TABLE IF EXISTS `blogpost`;
CREATE TABLE IF NOT EXISTS `blogpost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `lead_in` text COLLATE utf8_bin,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `extern_link` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `archive` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `blogpost`
--

INSERT INTO `blogpost` (`id`, `title`, `date_created`, `last_update`, `lead_in`, `content`, `extern_link`, `archive`, `category_id`, `user_id`) VALUES
(17, 'Site agence immobili&egrave;re', '2019-04-10 19:02:34', '2019-05-02 15:52:52', 'Voici le premier projet r&eacute;alis&eacute; lors de ma formation. Il s&#039;agit d&#039;un site web que j&#039;ai cr&eacute;&eacute; avec Wordpress. Ici, je vous pr&eacute;sente le contexte dans lequel a &eacute;t&eacute; men&eacute; le projet ainsi qu&#039;un lien qui vous redirigera sur le site. ', 'Projet &quot;Chalets et caviar&quot;\r\n\r\nMon premier projet r&eacute;alis&eacute; durant ma formation &agrave; &eacute;t&eacute; la cr&eacute;ation d&rsquo;un site web pour une agence immobili&egrave;re. J&rsquo;ai cr&eacute;&eacute; ce site en utilisant le CMS Wordpress. Ce projet fut office de simulation professionnelle et avait comme objectif de d&eacute;velopper mes capacit&eacute;s d&rsquo;analyse afin de r&eacute;pondre aux exigences d&rsquo;un client.\r\nPuisque l&#039;agence immobili&egrave;re se sp&eacute;cialise dans la location de chalets de luxe, j&rsquo;ai d&ucirc; cr&eacute;er un th&egrave;me et un design adapt&eacute;s &agrave; sa client&egrave;le.&lt;/p&gt;\r\n&lt;p&gt;J&rsquo;ai &eacute;galement d&eacute;velopp&eacute; une partie administrative pour mon client afin qu&#039;il puisse ajouter du contenu sans avoir &agrave; toucher au HTML ou au CSS.\r\nEnfin, j&#039;ai pr&eacute;par&eacute; et r&eacute;dig&eacute; une documentation d&eacute;taill&eacute;e pour mon client et ses employ&eacute;s. Cette derni&egrave;re comprend des directives leur expliquant comment proc&eacute;der pour qu&#039;ils puissent eux-m&ecirc;me g&eacute;rer leurs propres annonces immobili&egrave;res.\r\n\r\n&lt;p&gt;Vous pouvez jeter un coup d&#039;&oelig;il au site en cliquant sur l&#039;image ci-dessous:&lt;/p&gt;\r\n', 'http://chalet.v-signoret-projets.fr/', NULL, 2, 77),
(18, 'Blog Route-in', '2019-04-10 21:09:47', '2019-05-01 01:38:11', 'Voici un petit projet personnel que j&#039;ai d&eacute;marr&eacute; avant d&#039;entamer ma formation en d&eacute;veloppement web.', 'Blog Route-in\r\n\r\n&lt;p&gt;Voici le premier site que j&rsquo;ai r&eacute;alis&eacute; avec l&rsquo;aide du CMS Squarespace. Il s&rsquo;agit d&rsquo;un blog de voyage qui &agrave; &eacute;t&eacute; r&eacute;alis&eacute; quand j&rsquo;explorais l&rsquo;Australie et la Nouvelle Z&eacute;lande. Ce blog &agrave; &eacute;t&eacute; un &eacute;l&eacute;ment d&eacute;clencheur dans ma reconversion en tant que d&eacute;veloppeur web. J&rsquo;ai pris beaucoup de plaisir lors de sa r&eacute;alisation et cela m&rsquo;a donn&eacute; envie d&rsquo;en apprendre plus sur ce domaine.&lt;/p&gt;\r\n&lt;p&gt;Vous pouvez jeter un coup d&#039;&oelig;il &agrave; ce site en cliquant sur l&#039;image ci-dessous.&lt;/p&gt;', 'https://www.route-in.net/', NULL, 12, 77),
(20, 'Test article archiv&eacute;', '2019-05-02 16:30:49', '2019-05-02 16:42:33', 'Test article archiv&eacute;', 'Test article archiv&eacute;', NULL, '2019-05-02 17:17:21', 1, 77);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'PHP'),
(2, 'Wordpress'),
(12, 'Squarespace'),
(16, 'test 1');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_bin NOT NULL,
  `date_created` datetime NOT NULL,
  `status` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blogpost_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogpost_id` (`blogpost_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `date_created`, `status`, `user_id`, `blogpost_id`) VALUES
(72, 'Tr&egrave;s jolies photos, cela m&#039;a donn&eacute; envie d&#039;aller voyager.', '2019-04-25 00:30:07', '2019-04-25 00:30:34', 77, 18),
(73, 'Les chalets sont splendides mais un peu ch&egrave;re...', '2019-04-25 00:50:26', '2019-04-25 00:50:53', 77, 17);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  `image_dir` varchar(255) COLLATE utf8_bin NOT NULL,
  `blogpost_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blogpost_id` (`blogpost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `tag`, `image_dir`, `blogpost_id`) VALUES
(3, 'logo', 'img\\blogpost\\article_18\\logo_route_in.png', 18),
(4, 'logo', 'img\\blogpost\\article_17\\logo.png', 17),
(5, 'preview', 'img\\blogpost\\article_17\\preview_1.png', 17),
(6, 'preview', 'img\\blogpost\\article_18\\preview_1.png', 18),
(7, 'preview', 'img\\blogpost\\article_18\\preview_2.png', 18);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `confirmation_token` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `role_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `role_id`) VALUES
(77, 'admin', '$2y$10$WFC3fOwasLvotSg719gWT.dYTd4TwpRnW8SePkUWbvzQQKk52W5/q', 'your_email@mail.com', NULL, '2019-04-24 08:00:25', '', NULL, '1'),
(78, 'vincent', '$2y$10$AM1ciOKorJPF6pUYY6ImTOXfzuWkTMO0rJusKHe9ShfHh.wmwaX8y', 'vincent.signoret.mail@gmail.com', NULL, '2019-04-26 12:25:30', NULL, NULL, '1'),
(82, 'user', '$2y$10$UwJu0wf.mR2hhOsmmTX1qumLCf82q1NNlhcFEobPNDtMJUKgk2lHe', 'your_email@gmail.com', NULL, '2019-05-01 10:44:43', NULL, NULL, '2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`blogpost_id`) REFERENCES `blogpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`blogpost_id`) REFERENCES `blogpost` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
