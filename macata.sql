-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mars 2019 à 13:18
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `macata`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `language` int(11) NOT NULL,
  `gamme` varchar(255) NOT NULL,
  `formulation` varchar(255) NOT NULL,
  `contenence` varchar(255) NOT NULL,
  `volume` varchar(80) NOT NULL,
  `density` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `reference`, `designation`, `code`, `language`, `gamme`, `formulation`, `contenence`, `volume`, `density`) VALUES
(9, 'zzzz', '52dgf413', '4df1463gd3', 55, '5s1fsd3', '11111', 'f3ff', '3f', 'f55gd'),
(8, '5645', '65466', '54645', 6546, '54654', '6546', '45645', '54656', '465456'),
(10, 'fgf', 'moi', 'tgfvhf', 555, 'cvbcvb', 'gghfgh', 'bvnvbn', 'bvnv', 'ghgjvbnv'),
(11, 'pee5c8f2fd', 'dfg852dfgf', 'dfg4646dgf', 54131, 'dfgd464dfg', '15dfg6fdg', 'dfgdg854r3', '51dfg', '51gd'),
(12, '84125dfg5', 'fg8g42f1gd', '843df', 6, '4184d6g41', 'df14g6d5g', 'f5d1d', 'f416g5d1f', '84df31fdg'),
(19, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(16, 'yt', 'tyuty', 'ytu', 1, 'dfgdf', 'dfg', 'fdgdfg\n	', 'dfdfg', 'dgfg'),
(18, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(20, 'fdgdf', 'aaa', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf	', 'ghdffdh', 'hfdhdf'),
(21, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(22, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(23, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(24, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(26, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(27, 'fdgdf', 'gfdgdfg', 'fdgdfgdfg', 1, 'fdgfdg', 'dfg', 'fdgfgdf\n	', 'ghdffdh', 'hfdhdf'),
(28, 'ref', 'des', 'code', 1, 'gam', 'form', 'conten\n	', 'col', 'den');

-- --------------------------------------------------------

--
-- Structure de la table `authentify`
--

DROP TABLE IF EXISTS `authentify`;
CREATE TABLE IF NOT EXISTS `authentify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `id_profil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `authentify`
--

INSERT INTO `authentify` (`id`, `email`, `password`, `id_group`, `id_profil`) VALUES
(1, 'webmaster@resinence.fr', '$2y$10$yQaqkZUMq43Empceay62lOS8nbVT9mQud7Thj9SyRH6u4SRIsVZ.2', 5, 1),
(2, 'test@tt.com', '$2y$10$FIN0M6oSVHOc7U5M378aw.Qkq5zqVCkqK9EiYPWJhREs/YWWwTz5u', 2, NULL),
(3, 'jeanjean', '$2y$10$im3wreNA.rtmeyz34tEInuhns3aulbK2wR2sXiukX1qxXAuHNc10O', 3, NULL),
(7, 'a@a.fr', '$2y$10$kOGSq2aUTQ7UnFKL3Ssct.ooDISw7CIX0joCZzc3Kmlu21ZZvSzya', 1, NULL),
(8, 'b@b.fr', '$2y$10$.n2s.3GcmWGyPCOsG4jR1uj3PCWPJ.IjBZlh/5dMsFzTmzWkY7rc.', 4, NULL),
(9, 'edward@newgate.com', '$2y$10$VdapTIcIkdepKaVzbWaSY.pHjP2v2VKchvjKxx8L33ZatJRaq.fOm', 1, NULL),
(10, 'edward@newgate.com', '$2y$10$VsAgUjxHGrbKKH.ajietu.Lc9V/4ECZtBMtYrPiSGElXVOJaE/SVq', 1, NULL),
(11, 'barbe@noir.com', '$2y$10$m.NwGyWSjVRk3AY479VGJuqchXJi8XBbX9lWTo5o9uCX.NjhnGeNi', 1, NULL),
(12, 'duncan@leod.fr', '$2y$10$4ifY43ewK2FRkPIkfxHO1OeCjZNlDpCjhjXSeWB7k.L3mZ4VvVXjK', 2, NULL),
(20, 'azerty@t.com', '$2y$10$dh5CRb0KFqWFUkPcYKihZuSI7fP5wZWnpWqZJAhmvgCXTL0lApMpa', 1, NULL),
(13, 'w@w.fr', '$2y$10$s085IDEl9b1bFHqmDL0nHeT30E25UMxqLSa25pfWH6fTQmDI5uID.', 1, NULL),
(14, 'bob@gmail.com', '$2y$10$45FXSNQFVGQ7y70RCv5gh.L05BUHj5Raye/uhUFghSR0dM5nttNcC', 1, NULL),
(15, 'bob@gmail.com', '$2y$10$cdYeSClgKm3.LQLRySnlhefSJ9tJU27cVrbOJF6hJW40Fa7lIQcK6', 1, NULL),
(16, 'bob@gmail.com', '$2y$10$fL/VSPwqERySruw92O58sOnJoFUpEd3GelD3jhciyFCV6IWQIp1VK', 1, NULL),
(17, 'josi@et.com', '$2y$10$yJYoTT.3WmknoaJgA9ShJOpSsh2sbTBnFXndMoNXzQUAaZHbXXFJe', 1, NULL),
(19, 'portugas@dace.fr', '$2y$10$Fc6PHvTM4XO8Gen3Lb.rmufYfva1rKz3fpSWZxxao0I85Ktk2Eggm', 1, NULL),
(21, 'mongo@db.net', '$2y$10$sFYt2uhV249QvtcpHrpPJOTq3skofOiIQyZvytwMrxkJWhrLKhUEO', 3, NULL),
(22, 'react@js.com', '$2y$10$BKhUM7We.N8kyzu0ga8Gi.sp9ivuUVpgZQochHtwvCNYtwW4/O8D.', 1, NULL),
(23, 'jean@luc.com', '$2y$10$dLz81OxB6UL8U6cdkFLmFOOt8Axh1jAb5Ii31Cd3aU4LO3SPsnrXi', 1, NULL),
(24, 'jean@luc.fr', '$2y$10$5HPZhInH4c.iE6OoMtcyhev1zhC8eRLddWwdhexz5fAlyVGLqnYXa', 1, NULL),
(25, 'samsam@s.fr', '$2y$10$6sR8ZDKb6gnJewIkw8jtdObrH5JdaXROfTP9k0gozbU3n84yIzJd.', 1, NULL),
(26, 'samssam@s.fr', '$2y$10$TdKqpvcRI6OhjmiZ30h43OGLYBtQF.iuk/UmYe.wAhtwAatO4Bviq', 1, NULL),
(27, 'aqwzsx@e.fr', '$2y$10$/mnz0TBA7QpYNSGS3E2JCuBj62oMPmsXHRBzvjJwKINpgwdevj5dy', 1, NULL),
(28, 'aaaaaaaaa@aaa.fr', '$2y$10$FXgB1seOhpN5qL2Fl18tqeg86U4ftQg4MK0axRTpby629kQdqkMfa', 1, NULL),
(29, 'zerg@lin.fr', '$2y$10$UTw7N86qrn5tbIi1DFGiA.liHMNuss9KcI3PO4cpCb4spbXIdPOvC', 1, NULL),
(30, 'lazar@rest.fr', '$2y$10$8OQdD/RmHs0aHbYy//Na9..p79U1.0czQIDVvOIi/IQfw4tdDJvKS', 1, NULL),
(31, 'marc@atk.com', '$2y$10$5E16GOtQdAF9GMe0jROXE.33MFRIrOmOQqRmkH48WslyTRAOqfmki', 1, NULL),
(32, 'jan@jan.fr', '$2y$10$tRgNTHv4MXI7.ueXVPqRyuq8YkCLjtYjoEKy5P01yqUChsPt48bDK', 1, NULL),
(33, 'super@sup.com', '$2y$10$w79WpPYBS9txWuzdDcNIx.bLHArJD6xJ8HfXXDrBOecrGnTk/Fcie', 1, NULL),
(34, 'mal@efice.fr', '$2y$10$.SwwL8A2Pwf0.A4SCOuNFuFCYi.TCGQP5vXnbIIzh4J.MRTjRnMuu', 1, NULL),
(35, 'o@oo.com', '$2y$10$gOPW4rzMT8L0h7bghFsetOOEXhhU7kevHteMtIfIzSxoySztVWk8u', 1, NULL),
(39, 'sqsqsqs@jjs.com', '$2y$10$t02QtYysidV6K3am1xb8aOd4I7547VOA7O5riseSMZT9Qbys7jcMu', 1, NULL),
(38, 'pp@pp.com', '$2y$10$5K0jc06fmMzaWIMM8jCKvevZ7MRdyvsCihnCqjEhL92SeZ9m8GSh.', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bred`
--

DROP TABLE IF EXISTS `bred`;
CREATE TABLE IF NOT EXISTS `bred` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hourlyCost` varchar(80) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quantity` varchar(60) NOT NULL,
  `mixed` varchar(60) NOT NULL,
  `specificPreparation` varchar(60) NOT NULL,
  `filtering` varchar(60) NOT NULL,
  `washingFilter` varchar(60) NOT NULL,
  `washingTank` varchar(80) NOT NULL,
  `startingTank` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

DROP TABLE IF EXISTS `formule`;
CREATE TABLE IF NOT EXISTS `formule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `statut` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formule`
--

INSERT INTO `formule` (`id`, `code`, `name`, `statut`) VALUES
(3, 'azd20z5d', 'formu', 'actif'),
(2, 'qsdsdf555ds4fsd4', 'formule 2', 'GAPI'),
(5, 'dfff', 'jesdis', 'djejjdsf'),
(24, 'fdhf', 'gfdgdf', 'gfdgg'),
(9, 'dsds', 'ff', 'ffff'),
(10, 'dsds', 'ff', 'ffff'),
(11, 'gfgh', 'hh', 'hhh'),
(12, 'gfgh', 'hh', 'hhhgfghfg'),
(19, 'fdhf', 'gfdgdf', 'gfdgg'),
(20, 'fdhf', 'gfdgdf', 'gfdgg'),
(21, 'fdhf', 'gfdgdf', 'gfdgg'),
(22, 'fdhf', 'gfdgdf', 'gfdgg'),
(25, 'fgfdg', 'fdgfdg', 'gfdgdf'),
(31, 'code', 'name', 'statut');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `libelle`) VALUES
(1, 'utilisateur'),
(2, 'achat'),
(3, 'chimiste'),
(4, 'modérateur'),
(5, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `moduleauthorized`
--

DROP TABLE IF EXISTS `moduleauthorized`;
CREATE TABLE IF NOT EXISTS `moduleauthorized` (
  `groups_id` int(11) NOT NULL,
  `modules_id` int(11) NOT NULL,
  `read_module` tinyint(1) DEFAULT '0',
  `write_module` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `moduleauthorized`
--

INSERT INTO `moduleauthorized` (`groups_id`, `modules_id`, `read_module`, `write_module`) VALUES
(1, 1, 0, 0),
(1, 2, 1, 0),
(1, 3, 1, 0),
(1, 4, 1, 1),
(1, 5, 0, 0),
(2, 1, 1, 0),
(2, 2, 1, 0),
(2, 3, 1, 0),
(2, 4, 1, 0),
(2, 5, 1, 1),
(3, 1, 1, 1),
(3, 2, 1, 1),
(3, 3, 1, 0),
(3, 4, 1, 0),
(3, 5, 0, 0),
(4, 1, 1, 0),
(4, 2, 1, 0),
(4, 3, 1, 0),
(4, 4, 1, 0),
(4, 5, 1, 1),
(5, 1, 1, 1),
(5, 2, 1, 1),
(5, 3, 1, 1),
(5, 4, 1, 1),
(5, 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `bgcolor` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `name`, `icon`, `bgcolor`, `color`) VALUES
(1, 'Matières premières', 'glyphicon glyphicon-grain', 'bg-tomato-red', 'squash-blossom'),
(2, 'Formules', 'glyphicon glyphicon-filter', 'bg-dark-sapphire', 'aurora-green'),
(3, 'Articles', 'glyphicon glyphicon-list-alt', 'bg-carrot-orange', 'tomato-red'),
(4, 'Packagings', 'glyphicon glyphicon-gift', 'bg-paradise-green', 'jalapeno-red'),
(5, 'Paramètres', 'glyphicon glyphicon-cog', 'bg-hollyhock', 'dupain');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

DROP TABLE IF EXISTS `operation`;
CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `packaging`
--

DROP TABLE IF EXISTS `packaging`;
CREATE TABLE IF NOT EXISTS `packaging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `visuel` varchar(255) NOT NULL,
  `cost` varchar(80) NOT NULL,
  `transportcost` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `packaging`
--

INSERT INTO `packaging` (`id`, `reference`, `visuel`, `cost`, `transportcost`) VALUES
(2, 'peoefef', 'effdsfdsfs', '23', '66'),
(3, 'dsjkghj', 'hrdjfgf', '55', '239'),
(4, 'kirplot', 'cople', '5', '10'),
(5, 'dem', 'loelf', '1', '1'),
(6, 'dprjfd', '52fdgdfgd', '555', '10'),
(12, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(9, 'dfgdfg', 'fdgfdg', 'dgfgdf', 'dfgdfgdf'),
(11, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(13, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(14, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(15, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(16, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(17, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(18, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(20, 'dfgdf', 'fgdgdfddddddddddd', 'gfgfdg', 'fhhfhfh'),
(22, 'dfgdf', 'fgdgdf', 'gfgfdg', 'fhhfhfh'),
(23, 'reference', 'visuel', 'cost', 'transport');

-- --------------------------------------------------------

--
-- Structure de la table `parameter`
--

DROP TABLE IF EXISTS `parameter`;
CREATE TABLE IF NOT EXISTS `parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hourlyCost` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parameter`
--

INSERT INTO `parameter` (`id`, `hourlyCost`) VALUES
(1, '34'),
(3, '22'),
(4, '63'),
(5, '340'),
(6, '26'),
(7, '54645'),
(8, '23'),
(10, '8532'),
(29, '250'),
(12, '36'),
(13, '77'),
(14, '654645'),
(15, '65'),
(16, '6564'),
(17, '868'),
(18, '555555'),
(50, '55'),
(20, 'dfgdf'),
(21, 'dfgdf'),
(22, 'dfgdf'),
(23, 'dfgdf'),
(49, 'popop'),
(48, 'cost'),
(44, 'hg'),
(45, '26'),
(46, '34'),
(41, '26'),
(40, 'xcvcv'),
(38, '23');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` varchar(40) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `firstname`, `lastname`, `picture`, `adresse`, `cp`, `city`, `phone`) VALUES
(1, 'Marc', 'Lombry', 'gohan.png', 'Rue du ponsdsqdqsdq', 'dqdqs', 'qsdqsdqsd', '06 51 03 98 09');

-- --------------------------------------------------------

--
-- Structure de la table `rawmaterial`
--

DROP TABLE IF EXISTS `rawmaterial`;
CREATE TABLE IF NOT EXISTS `rawmaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `unitprice` varchar(255) NOT NULL,
  `datemodification` date NOT NULL,
  `datecreation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rawmaterial`
--

INSERT INTO `rawmaterial` (`id`, `designation`, `unitprice`, `datemodification`, `datecreation`) VALUES
(205, 'ACQUA', '00.2', '2019-01-28', '2019-01-28'),
(206, 'DISPERBYK 190', '10.00', '2019-01-28', '2019-01-28'),
(207, 'TITANIO BIOSSIDO', '2.70', '2019-01-28', '2019-01-28'),
(208, 'BYK 347', '26.17', '2019-01-28', '2019-01-28'),
(209, 'BARITE', '0.45', '2019-01-28', '2019-01-28'),
(210, 'TALCO', '0.80', '2019-01-28', '2019-01-28'),
(211, 'KATHON LXE', '3.50', '2019-01-28', '2019-01-28'),
(212, 'CHARTWEL', '13.70', '2019-01-28', '2019-01-28'),
(213, 'PRIMAL TX 100', '2.30', '2019-01-28', '2019-01-28'),
(214, 'TEGO FOAMEX 822', '10.80', '2019-01-28', '2019-01-28'),
(215, 'ACRISOL RM 5000', '5.62', '2019-01-28', '2019-01-28'),
(216, 'ACRISOL RM 8', '9.05', '2019-01-28', '2019-01-28'),
(217, 'TEGO GLIDE 482', '24.80', '2019-01-28', '2019-01-28'),
(231, 'foreach', '24', '2019-01-30', '2019-01-30'),
(232, 'dsfds', 'fsdf', '2019-01-30', '2019-01-30'),
(234, 'raw', 'material', '2019-01-30', '2019-01-30');

-- --------------------------------------------------------

--
-- Structure de la table `traceability`
--

DROP TABLE IF EXISTS `traceability`;
CREATE TABLE IF NOT EXISTS `traceability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `oldValue` varchar(255) NOT NULL,
  `newValue` varchar(255) NOT NULL,
  `dateTraceability` date NOT NULL,
  `action` varchar(150) NOT NULL,
  `module` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `traceability`
--

INSERT INTO `traceability` (`id`, `username`, `oldValue`, `newValue`, `dateTraceability`, `action`, `module`) VALUES
(1, 'test', 'cost', 'popop', '2019-01-09', 'cre', ''),
(2, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(3, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(4, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(5, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(6, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(7, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(8, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(9, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(10, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(11, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(12, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', ''),
(15, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(14, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-29', 'create', 'rawmaterial'),
(16, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(17, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(18, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(19, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(20, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(21, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(22, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(23, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(24, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(25, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(26, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(27, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(28, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(29, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(30, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(31, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(32, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(33, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'formule'),
(34, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'formule'),
(35, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'formule'),
(36, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'formule'),
(37, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(38, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(39, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(40, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(41, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(42, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(43, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(44, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'rawmaterial'),
(45, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'formule'),
(46, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'formule'),
(47, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'formule'),
(48, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(49, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'parameter'),
(50, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'packaging'),
(51, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'packaging'),
(52, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'packaging'),
(53, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'packaging'),
(54, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(55, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(56, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(57, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(58, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(59, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(60, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(61, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(62, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'create', 'article'),
(63, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'supprimer', 'formule'),
(64, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'supprimer', 'rawmaterial'),
(65, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'supprimer', 'article'),
(66, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'supprimer', 'packaging'),
(67, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-30', 'supprimer', 'parameter'),
(68, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'create', 'parameter'),
(69, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'create', 'parameter'),
(70, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'create', 'parameter'),
(71, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', ''),
(72, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', ''),
(73, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', ''),
(74, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(75, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(76, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(77, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(78, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(79, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(80, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(81, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(82, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(83, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(84, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(85, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(86, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(87, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(88, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(89, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(90, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(91, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(92, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(93, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(94, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(95, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(96, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(97, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(98, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(99, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(100, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(101, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(102, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(103, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(104, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(105, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(106, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(107, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(108, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(109, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(110, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(111, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(112, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(113, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(114, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(115, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(116, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(117, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(118, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(119, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(120, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(121, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(122, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(123, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(124, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(125, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(126, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(127, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(128, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(129, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(130, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(131, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(132, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(133, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(134, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(135, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(136, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(137, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(138, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(139, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(140, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(141, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(142, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(143, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(144, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(145, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(146, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(147, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(148, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(149, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(150, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(151, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(152, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(153, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(154, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(155, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(156, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(157, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(158, 'webmaster@resinence.fr', 'cost', 'popop', '2019-01-31', 'modifier', 'parameter'),
(159, 'webmaster@resinence.fr', '49', '49', '2019-02-05', 'modifier', 'parameter'),
(160, 'webmaster@resinence.fr', 'popop', 'popop', '2019-02-05', 'modifier', 'parameter'),
(161, 'webmaster@resinence.fr', '49', '49', '2019-02-05', 'modifier', 'parameter'),
(162, 'webmaster@resinence.fr', 'popop', 'popop', '2019-02-05', 'modifier', 'parameter'),
(163, 'webmaster@resinence.fr', '12', '12', '2019-02-05', 'modifier', 'parameter'),
(164, 'webmaster@resinence.fr', '3363', '3363', '2019-02-05', 'modifier', 'parameter'),
(165, 'webmaster@resinence.fr', '1', '1', '2019-02-05', 'modifier', 'parameter'),
(166, 'webmaster@resinence.fr', '34', '34', '2019-02-05', 'modifier', 'parameter'),
(167, 'webmaster@resinence.fr', '3', '3', '2019-02-05', 'modifier', 'parameter'),
(168, 'webmaster@resinence.fr', '55', '55', '2019-02-05', 'modifier', 'parameter'),
(169, 'webmaster@resinence.fr', '3', '3', '2019-02-05', 'modifier', 'parameter'),
(170, 'webmaster@resinence.fr', '55', '55', '2019-02-05', 'modifier', 'parameter'),
(171, 'webmaster@resinence.fr', '4', '4', '2019-02-05', 'modifier', 'parameter'),
(172, 'webmaster@resinence.fr', '55', '55', '2019-02-05', 'modifier', 'parameter'),
(173, 'webmaster@resinence.fr', '10', '10', '2019-02-05', 'modifier', 'parameter'),
(174, 'webmaster@resinence.fr', 'ppppppppp', 'ppppppppp', '2019-02-05', 'modifier', 'parameter'),
(175, 'webmaster@resinence.fr', '4', '4', '2019-02-05', 'modifier', 'parameter'),
(176, 'webmaster@resinence.fr', 'wxcwxc', 'wxcwxc', '2019-02-05', 'modifier', 'parameter'),
(177, 'webmaster@resinence.fr', '19', '19', '2019-02-05', 'supprimer', 'parameter'),
(178, 'webmaster@resinence.fr', '1', '1', '2019-02-05', 'modifier', 'parameter'),
(179, 'webmaster@resinence.fr', '34', '34', '2019-02-05', 'modifier', 'parameter'),
(180, 'webmaster@resinence.fr', '3', '3', '2019-02-05', 'modifier', 'parameter'),
(181, 'webmaster@resinence.fr', '22', '22', '2019-02-05', 'modifier', 'parameter'),
(182, 'webmaster@resinence.fr', '4', '4', '2019-02-05', 'modifier', 'parameter'),
(183, 'webmaster@resinence.fr', '63', '63', '2019-02-05', 'modifier', 'parameter'),
(184, 'webmaster@resinence.fr', '55', '55', '2019-02-06', 'create', 'parameter'),
(185, 'webmaster@resinence.fr', '46', '46', '2019-02-06', 'modifier', 'parameter'),
(186, 'webmaster@resinence.fr', '34', '34', '2019-02-06', 'modifier', 'parameter');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
