-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2021 at 03:54 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_to_do`
--

-- --------------------------------------------------------

--
-- Table structure for table `liste`
--

DROP TABLE IF EXISTS `liste`;
CREATE TABLE IF NOT EXISTS `liste` (
  `idliste` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `privee` enum('OUI','NON') COLLATE utf8mb4_bin NOT NULL,
  `idauteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idliste`),
  UNIQUE KEY `titre` (`titre`),
  KEY `fkey_auteur` (`idauteur`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `liste`
--

INSERT INTO `liste` (`idliste`, `titre`, `privee`, `idauteur`) VALUES
(16, 'autre liste', 'NON', NULL),
(18, 'liste', 'NON', NULL),
(20, 'la liste de lulu', 'OUI', 1),
(22, 'nouvelle liste', 'NON', NULL),
(23, 'liste de courses', 'NON', NULL),
(24, 'rÃ©visions', 'NON', NULL),
(25, 'fonctionnalitÃ©s TO-DO', 'NON', NULL),
(26, 'cadeaux de noÃ«l', 'NON', NULL),
(27, 'la liste de clara', 'OUI', 2),
(28, 'mes courses de noÃ«l', 'OUI', 2),
(29, 'liste de course 30.12', 'OUI', 2),
(30, 'une autre liste', 'OUI', 2),
(31, 'to-do des vacances', 'OUI', 2),
(32, 'bagages', 'OUI', 2),
(33, 'patrons de conception', 'OUI', 2),
(34, 'une derniÃ¨re liste', 'OUI', 2),
(35, 'une liste de plus', 'NON', NULL),
(36, 'projets P2', 'NON', NULL),
(37, 'projets P3', 'NON', NULL),
(39, 'finitions', 'NON', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `idtache` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `effectuee` enum('VRAI','FAUX') COLLATE utf8mb4_bin NOT NULL,
  `idliste` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtache`),
  KEY `fkey_liste` (`idliste`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tache`
--

INSERT INTO `tache` (`idtache`, `intitule`, `effectuee`, `idliste`) VALUES
(8, 'faire le php', 'FAUX', 16),
(10, 'faire le projet tut', 'VRAI', 16),
(13, 'donner son cadeau Ã  clara', 'FAUX', 20),
(15, 'projet IA', 'FAUX', 36),
(16, 'projet PHP', 'VRAI', 36),
(17, 'projet JAVAFX', 'FAUX', 36),
(18, 'projet Tut', 'FAUX', 36),
(19, 'projet Tut', 'FAUX', 37),
(20, 'tache 1', 'VRAI', 35),
(21, 'tache 2', 'FAUX', 35),
(22, 'Maman', 'VRAI', 26),
(23, 'Papa', 'VRAI', 26),
(24, 'Lucile', 'VRAI', 26),
(25, 'connexion', 'VRAI', 25),
(26, 'dÃ©connexion', 'VRAI', 25),
(27, 'inscription', 'VRAI', 25),
(28, 'pagination', 'VRAI', 25),
(29, 'web cÃ´tÃ© serveur', 'FAUX', 24),
(30, 'conception objet', 'FAUX', 24),
(31, 'progsys', 'FAUX', 24),
(32, 'brocoli', 'FAUX', 23),
(33, 'riz', 'FAUX', 23),
(34, 'nouilles', 'FAUX', 23),
(36, 'sauce soja', 'FAUX', 23),
(37, 'orange', 'FAUX', 23),
(39, 'ceci', 'FAUX', 22),
(40, 'est', 'VRAI', 22),
(41, 'une', 'FAUX', 22),
(42, 'liste', 'FAUX', 22),
(43, 'rÃ©viser SI', 'VRAI', 16),
(44, 'lait d\'amande', 'FAUX', 23),
(45, 'amÃ©liorer apparence pagination', 'VRAI', 39),
(46, 'faire un readme', 'VRAI', 39),
(47, 'exporter la BD', 'FAUX', 39);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `mdp` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`idutilisateur`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `mdp`) VALUES
(1, 'lucile', '$2y$10$nSUXg158K4JsSPaG0qh4OetDX7FE9af6ggj2/JjCk6HUcHrNCDiHi'),
(2, 'clara', '$2y$10$o2u7y7U0Kane/dCX9v0/IOlZ.TonkRwBVBQRekrCim10c3U3ufm72');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `fkey_auteur` FOREIGN KEY (`idauteur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE CASCADE;

--
-- Constraints for table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `fkey_liste` FOREIGN KEY (`idliste`) REFERENCES `liste` (`idliste`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
