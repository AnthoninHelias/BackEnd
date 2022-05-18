-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 02 mai 2022 à 12:58
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddqcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `idEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `motDePasse` varchar(15) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`idEtudiant`),
  UNIQUE KEY `idEtudiant` (`idEtudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`idEtudiant`, `login`, `motDePasse`, `nom`, `prenom`, `email`) VALUES
(1, 'ben', '1234', 'Alison', 'Benjamin', 'alison.benjamin@hotmail.fr'),
(5, 'tof', '1234', 'Gand', 'Christophe', 'gand.christophe@free.fr'),
(6, 'lulu', '1234', 'Gand', 'Lucile', 'gand.lucile@bbox.fr'),
(7, 'Shidac', '1234', 'Elbaz', 'Avi', 'avielbaz2204@gmail.com'),
(8, 'a', '1', 'a', 'a', 'a'),
(9, 'azert', 'a', 'zaer', 'azer', 'eza'),
(10, 'azertaaa', 'zzz', 'aaaaaa', 'aaaaa', 'zzzz'),
(11, 'bfoujols', '123AB', 'benoit', 'benoit', 'benoit@mail');

-- --------------------------------------------------------

--
-- Structure de la table `qcmfait`
--

DROP TABLE IF EXISTS `qcmfait`;
CREATE TABLE IF NOT EXISTS `qcmfait` (
  `idEtudiant` int(11) NOT NULL,
  `idQuestionnaire` int(11) NOT NULL,
  `dateFait` varchar(10) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`idEtudiant`,`idQuestionnaire`),
  KEY `idQuestionnaire` (`idQuestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `qcmfait`
--

INSERT INTO `qcmfait` (`idEtudiant`, `idQuestionnaire`, `dateFait`, `point`) VALUES
(1, 1, '06-01-2018', 0),
(1, 2, '07-01-2018', 0),
(5, 1, '07-04-2017', 0),
(5, 2, '07-01-2018', 0),
(5, 3, '2017-03-29', 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `idQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `libelleQuestion` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `nbReponse` int(11) NOT NULL,
  `nbBonneReponse` int(11) NOT NULL,
  PRIMARY KEY (`idQuestion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`idQuestion`, `libelleQuestion`, `type`, `nbReponse`, `nbBonneReponse`) VALUES
(1, 'Quel compositeur a créé la chanson \"World is mine\"?', 1, 4, 1),
(2, 'Complétez cette phrase \"I\'m singing Miku...\"', 1, 4, 1),
(3, 'Combien de vocaloid y a-t-il dans le jeu Project Diva Arcade ?', 1, 4, 1),
(4, 'Quel compositeur a créé la chanson \"Two Faced Lover\"?', 1, 4, 1),
(5, 'Qui pilote Goldorak ?', 1, 4, 1),
(6, 'Qui cherche Sarah Connor ?', 1, 4, 1),
(7, 'Qui est le meilleur amis de R2-D2 ?', 1, 4, 1),
(8, 'Quel est nom du robot géant dans powerrangers ?', 1, 4, 1),
(9, 'Sous quel autre nom est connue Natah ?', 1, 4, 1),
(10, 'Une warframe peut être dite ...', 1, 4, 1),
(11, 'A quelle catégorie appartient le Kubrow ?', 1, 4, 1),
(12, 'Quelle est la seule warframe dites umbra ?', 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `idQuestionnaire` int(11) NOT NULL,
  `libelleQuestionnaire` varchar(100) NOT NULL,
  PRIMARY KEY (`idQuestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`idQuestionnaire`, `libelleQuestionnaire`) VALUES
(1, 'Miku'),
(2, 'Robots'),
(3, 'Warframe');

-- --------------------------------------------------------

--
-- Structure de la table `questionquestionnaire`
--

DROP TABLE IF EXISTS `questionquestionnaire`;
CREATE TABLE IF NOT EXISTS `questionquestionnaire` (
  `idQuestionnaire` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  PRIMARY KEY (`idQuestionnaire`,`idQuestion`),
  KEY `idQuestion` (`idQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionquestionnaire`
--

INSERT INTO `questionquestionnaire` (`idQuestionnaire`, `idQuestion`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `questionreponse`
--

DROP TABLE IF EXISTS `questionreponse`;
CREATE TABLE IF NOT EXISTS `questionreponse` (
  `idQuestion` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `bonne` int(11) NOT NULL,
  PRIMARY KEY (`idQuestion`,`idReponse`),
  KEY `idReponse` (`idReponse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionreponse`
--

INSERT INTO `questionreponse` (`idQuestion`, `idReponse`, `ordre`, `bonne`) VALUES
(1, 1, 1, 0),
(1, 2, 2, 1),
(1, 3, 3, 0),
(1, 4, 4, 0),
(2, 5, 1, 0),
(2, 6, 2, 1),
(2, 7, 3, 0),
(2, 8, 4, 0),
(3, 9, 1, 1),
(3, 10, 2, 0),
(3, 11, 3, 0),
(3, 12, 4, 0),
(4, 13, 1, 0),
(4, 14, 2, 0),
(4, 15, 3, 0),
(4, 16, 4, 1),
(5, 17, 1, 1),
(5, 18, 2, 0),
(5, 19, 3, 0),
(5, 20, 4, 0),
(6, 21, 1, 0),
(6, 22, 2, 0),
(6, 23, 3, 0),
(6, 24, 4, 1),
(7, 25, 1, 0),
(7, 26, 2, 1),
(7, 27, 3, 0),
(7, 28, 4, 0),
(8, 29, 1, 0),
(8, 30, 2, 1),
(8, 31, 3, 0),
(8, 32, 4, 0),
(9, 33, 1, 1),
(9, 34, 2, 0),
(9, 35, 3, 0),
(9, 36, 4, 0),
(10, 37, 1, 0),
(10, 38, 2, 1),
(10, 39, 3, 0),
(10, 40, 4, 0),
(11, 41, 1, 0),
(11, 42, 2, 0),
(11, 43, 3, 0),
(11, 44, 4, 1),
(12, 45, 1, 0),
(12, 46, 2, 0),
(12, 47, 3, 1),
(12, 48, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `idReponse` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` text NOT NULL,
  `cheminImage` varchar(1000) NOT NULL,
  PRIMARY KEY (`idReponse`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `valeur`, `cheminImage`) VALUES
(1, 'Deco*27', ''),
(2, 'SuperCell', ''),
(3, 'Mitchie M', ''),
(4, 'Wowaka', ''),
(5, 'AWAWA', ''),
(6, 'OUWIOU', ''),
(7, 'Miku OUWIOU', ''),
(8, 'Miku AWAWA', ''),
(9, '6', ''),
(10, '3', ''),
(11, '10', ''),
(12, '7', ''),
(13, 'Deco*27', ''),
(14, 'SuperCell', ''),
(15, 'Mitchie M', ''),
(16, 'Wowaka', ''),
(17, 'Actarus', ''),
(18, 'Vénusia', ''),
(19, 'Goldorak', ''),
(20, 'Professeur Procyon', ''),
(21, 'Robots_tueur.exe', ''),
(22, 'Terminatosr', ''),
(23, 'R2-D2', ''),
(24, 'Terminator', ''),
(25, 'C3-P00', ''),
(26, 'C3-PO', ''),
(27, 'Alaking Skywalkar', ''),
(28, 'Dark Vador', ''),
(29, 'Le Megamecha', ''),
(30, 'Le Megazord ', ''),
(31, 'Le Gros Robot', ''),
(32, 'Le Megazorg', ''),
(33, 'Le Lotus', ''),
(34, 'Margoulis', ''),
(35, 'Maire', ''),
(36, 'Fleur de lotus', ''),
(37, 'Primeded', ''),
(38, 'Prime', ''),
(39, 'Sumbra', ''),
(40, 'Machined', ''),
(41, 'Arme de mélée', ''),
(42, 'Fulsis', ''),
(43, 'Sentinelles', ''),
(44, 'Compagnion', ''),
(45, 'Warframe', ''),
(46, 'Excalibour', ''),
(47, 'Excalibur', ''),
(48, 'Margulis', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qcmfait`
--
ALTER TABLE `qcmfait`
  ADD CONSTRAINT `qcmfait_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`),
  ADD CONSTRAINT `qcmfait_ibfk_2` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiants` (`idEtudiant`);

--
-- Contraintes pour la table `questionquestionnaire`
--
ALTER TABLE `questionquestionnaire`
  ADD CONSTRAINT `questionquestionnaire_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`),
  ADD CONSTRAINT `questionquestionnaire_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`);

--
-- Contraintes pour la table `questionreponse`
--
ALTER TABLE `questionreponse`
  ADD CONSTRAINT `questionreponse_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`),
  ADD CONSTRAINT `questionreponse_ibfk_2` FOREIGN KEY (`idReponse`) REFERENCES `reponse` (`idReponse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
