-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 déc. 2021 à 11:23
-- Version du serveur :  5.7.31
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exam_pdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`id`, `name`, `age`) VALUES
(1, 'Bob Dylan', 85),
(2, 'Madonna', 63),
(3, 'Elvis Presley', 25),
(7, 'Bob Marley', 85),
(8, 'JUL', -99);

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

DROP TABLE IF EXISTS `song`;
CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `published_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_33EDEEA1B7970CF8` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `song`
--

INSERT INTO `song` (`id`, `artist_id`, `title`, `time`, `published_at`) VALUES
(1, 1, 'Blowin\' in the Wind', 356, '2021-12-08 12:10:33'),
(2, 1, 'End of the Line', 123, '2021-09-14 12:10:33'),
(3, 1, 'One more cup of coffee', 153, '2021-07-12 12:12:10'),
(4, 1, 'Must be Santa', 263, '2021-04-14 12:12:10'),
(5, 2, 'La Isla Bonita', 86, '2021-07-14 12:13:22'),
(6, 2, 'Papa Don\'t Preach', 47, '2021-01-15 12:13:22'),
(7, 2, 'Material Girl ', 86, '2021-12-31 12:13:22'),
(8, 2, '4 minutes', 95, '2020-08-12 12:13:22'),
(9, 3, 'Can\'t help Falling in love', 156, '2021-10-06 12:18:08'),
(10, 3, 'A little Less Conversation', 125, '2021-07-07 12:18:08'),
(11, 3, 'Don\'t Be Cruel', 125, '2021-12-23 12:18:08'),
(12, 3, 'All Shook Up', 456, '2021-12-14 12:18:08'),
(13, 7, 'No Wamoan, No Cry', 145, '2021-09-15 12:21:31'),
(14, 7, 'Get Up Stand Up', 175, '2021-05-20 12:21:31');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FK_33EDEEA1B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
