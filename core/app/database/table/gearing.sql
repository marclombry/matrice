-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 19 oct. 2018 à 13:02
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gearing`
--

-- --------------------------------------------------------

--
-- Structure de la table `authentify`
--

DROP TABLE IF EXISTS `authentify`;
CREATE TABLE IF NOT EXISTS `authentify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `administator` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `authentify`
--

INSERT INTO `authentify` (`id`, `pseudo`, `email`, `password`, `secret`, `token`, `administator`) VALUES
(1, 'tests', 'tet@tt.com', '$2y$10$.ZE5cJ.AmJ.cZJ6AHKstZ.05EAF6.e58.PPxclwDZIIAJ2Sk93kYS', 'a', 'a', 'powa'),
(2, 'kkk', 'ff', 'ff', 'ff', NULL, NULL),
(3, 'jeanvalg', 'condeprmi@pep1@goml.co', '88d55dd5d5d', 'ducmoltm', NULL, NULL),
(4, 'pseudo', 'email', 'password', 'secret', NULL, NULL),
(5, 'jenesma', 'clacl@go.fr', 'dsfsdfsd', 'sssdfsdfdfsdf', NULL, NULL),
(6, 'jenesma', 'clacl@go.fr', 'dsfsdfsd', 'sssdfsdfdfsdf', NULL, NULL),
(7, 'marc', 'marc@marc.fr', 'azertyu', 'pomme', NULL, NULL),
(8, 'azertyu', 'ff@ff.fr', '$2y$10$WeTP3GrU1gWTAJlw8i124u2HbbmAPXYlIpk0YovH7khe1KyXwgyDS', 'azertyu', NULL, NULL),
(9, '', '', '$2y$10$h25c7rA3bVwR6F4WNYswbOd9nhO5c791Qw.5WXyftspuOARcNlTTK', '', NULL, NULL),
(10, 'poiuytr', 'p@p.fr', '$2y$10$7anbAQRfZ1fDpuVnBhkuw.4grz0EV9v1qmmLsTj0jZBBFPUBiFX.m', 'poiuytr', NULL, NULL),
(11, 'poiuytr', 'p@p.fr', '$2y$10$l7SiLJVjbK69ya8oIODvqOod0H4bUY2TtF9q4TL9AOEq/FVqoGJ7O', 'poiuytr', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `picture`, `adresse`, `cp`, `city`, `phone`, `id_user`) VALUES
(1, 'profil.npg', '38 rue du pres', 45450, 'montargis', '02.06.08.32.25', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
