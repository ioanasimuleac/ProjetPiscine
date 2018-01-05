-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Janvier 2018 à 10:36
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'Enfant'),
(2, 'Adulte');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `nomContact` varchar(32) NOT NULL,
  `prenomContact` varchar(32) NOT NULL,
  `numTelContact` varchar(32) NOT NULL,
  `mailContact` varchar(32) NOT NULL,
  `estPrincipalContact` int(11) NOT NULL DEFAULT '0',
  `idEditeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`idContact`, `nomContact`, `prenomContact`, `numTelContact`, `mailContact`, `estPrincipalContact`, `idEditeur`) VALUES
(1, 'Plaisant', 'Pauline', '0612345678', 'pauline.plaisant@yopmail.com', 0, 1),
(2, 'Dupont', 'Jean', '0688888888', 'jeandupont@yopmail.com', 1, 15),
(3, 'Grandazzi', 'Stéphane', '0130051373', 'stephane.grandazzi@tactic.net', 0, 17),
(4, 'Calcavecchia', 'Céline', '01 30 05 13 70', 'celine.calcavecchia@tactic.net', 1, 17),
(5, 'Hémet ', 'Anne-Lise', '01 30 05 13 71', 'anne-lise.hemet@tactic.net', 0, 17),
(6, 'Roumagnac', 'Julien', '0611111111', 'test', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `idEditeur` int(11) NOT NULL,
  `nomEditeur` varchar(32) NOT NULL,
  `villeEditeur` varchar(32) NOT NULL,
  `rueEditeur` varchar(32) NOT NULL,
  `CPEditeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `editeur`
--

INSERT INTO `editeur` (`idEditeur`, `nomEditeur`, `villeEditeur`, `rueEditeur`, `CPEditeur`) VALUES
(1, 'Ankama', 'Roubaix', 'Boulevard d\'Armentières', 59100),
(15, 'Iello', 'Heillecourt', 'Avenue des Érables', 54180),
(16, 'Blam!', 'Sillingy', 'Route des crêts', 74330),
(17, 'Tactic', 'Coignières', '12 Rue marie Curie', 78310);

-- --------------------------------------------------------

--
-- Structure de la table `festival`
--

CREATE TABLE `festival` (
  `anneeFestival` int(11) NOT NULL,
  `dateDebutFestival` date NOT NULL,
  `dateFinFestival` date NOT NULL,
  `nbTablesFestival` int(11) NOT NULL,
  `prixPlaceFestival` int(11) NOT NULL,
  `estActifFestival` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `festival`
--

INSERT INTO `festival` (`anneeFestival`, `dateDebutFestival`, `dateFinFestival`, `nbTablesFestival`, `prixPlaceFestival`, `estActifFestival`) VALUES
(2018, '2018-05-12', '2018-05-14', 200, 50, 1),
(2020, '2020-05-01', '2020-05-04', 200, 50, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `idJeu` int(11) NOT NULL,
  `nomJeu` varchar(32) NOT NULL,
  `nbJoueursJeu` varchar(32) DEFAULT NULL,
  `dateSortieJeu` date DEFAULT NULL,
  `dureePartieJeu` varchar(32) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  `idEditeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`idJeu`, `nomJeu`, `nbJoueursJeu`, `dateSortieJeu`, `dureePartieJeu`, `idCategorie`, `idEditeur`) VALUES
(1, 'Krosmaster Quest', '2-4', NULL, '2-3h', 1, 1),
(2, 'Arena: For the Gods!', '2-6', '2017-06-02', '30mn', 1, 15),
(11, 'Stellium', '2-4', '2017-11-01', NULL, 2, 1),
(12, 'France Quiz', '3-6', NULL, '30mn-1h', 1, 17),
(13, 'Emojito', '2-4', NULL, 'moins de 30mn', 2, 17),
(14, 'Gold Armada', '2-5', '2014-05-07', '30mn-1h', 1, 17),
(15, 'Edenia', '2-4', NULL, '30mn-1h', 1, 16),
(16, 'Celestia', NULL, NULL, '1h', 1, 16),
(17, 'Dino Party', '2-6', '2017-08-16', '15mn', 1, 1),
(18, 'Gang Rush Breakout', NULL, NULL, NULL, 1, 1),
(19, 'Monopoly', '2-3', NULL, '1h', 1, 1),
(20, 'test', NULL, NULL, NULL, 2, 1),
(21, '', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `localiser`
--

CREATE TABLE `localiser` (
  `idZone` int(11) NOT NULL,
  `idReservation` int(11) NOT NULL,
  `nbPlaces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `localiser`
--

INSERT INTO `localiser` (`idZone`, `idReservation`, `nbPlaces`) VALUES
(1, 1, 15),
(3, 1, 5),
(2, 1, 0),
(3, 3, 1),
(3, 4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `nbLogementsReservation` int(11) NOT NULL DEFAULT '0',
  `dateReservation` date NOT NULL,
  `commentaireReservation` text,
  `prixNegoReservation` int(11) DEFAULT NULL,
  `statutReservation` int(11) NOT NULL DEFAULT '1',
  `etatFactureReservation` int(11) NOT NULL DEFAULT '0',
  `idEditeur` int(11) NOT NULL,
  `anneeFestival` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `nbLogementsReservation`, `dateReservation`, `commentaireReservation`, `prixNegoReservation`, `statutReservation`, `etatFactureReservation`, `idEditeur`, `anneeFestival`) VALUES
(1, 0, '2018-01-02', NULL, 48, 1, 1, 1, 2018),
(2, 3, '2018-01-03', NULL, NULL, 1, 2, 15, 2018),
(3, 3, '2018-01-03', NULL, NULL, 1, 0, 16, 2018),
(4, 5, '2018-01-01', NULL, NULL, 1, 0, 17, 2018);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` varchar(32) NOT NULL,
  `mdpUtilisateur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `mdpUtilisateur`) VALUES
('admin', '1db6aadff4efba2d68ef72b66732aa554f73eb32a8f0486e62fa006177c1c4d0'),
('ioana', '1db6aadff4efba2d68ef72b66732aa554f73eb32a8f0486e62fa006177c1c4d0');

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `idZone` int(11) NOT NULL,
  `nomZone` varchar(32) NOT NULL,
  `anneeFestival` int(11) NOT NULL,
  `idEditeur` int(11) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `zone`
--

INSERT INTO `zone` (`idZone`, `nomZone`, `anneeFestival`, `idEditeur`, `idCategorie`) VALUES
(1, 'Zone Ankama', 2018, 1, NULL),
(2, 'Zone Iello', 2018, 15, NULL),
(3, 'Zone Enfant', 2018, NULL, 1),
(4, 'Zone Ankama', 2020, 1, NULL),
(5, 'Zone Adulte', 2018, NULL, 2),
(6, 'test', 2018, 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idEditeur` (`idEditeur`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`idEditeur`);

--
-- Index pour la table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`anneeFestival`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`idJeu`),
  ADD KEY `idCategorie` (`idCategorie`),
  ADD KEY `idEditeur` (`idEditeur`);

--
-- Index pour la table `localiser`
--
ALTER TABLE `localiser`
  ADD KEY `idZone` (`idZone`),
  ADD KEY `idReservation` (`idReservation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `idEditeur` (`idEditeur`),
  ADD KEY `anneeFestival` (`anneeFestival`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`idZone`),
  ADD KEY `anneeFestival` (`anneeFestival`),
  ADD KEY `idEditeur` (`idEditeur`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `idEditeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `idZone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `idEditeurContact` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD CONSTRAINT `idCategorieJeu` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idEditeurJeu` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `localiser`
--
ALTER TABLE `localiser`
  ADD CONSTRAINT `idReservationLocaliser` FOREIGN KEY (`idReservation`) REFERENCES `reservation` (`idReservation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idZoneLocaliser` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `anneeFestivalReservation` FOREIGN KEY (`anneeFestival`) REFERENCES `festival` (`anneeFestival`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idEditeurReservation` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `anneeFestivalZone` FOREIGN KEY (`anneeFestival`) REFERENCES `festival` (`anneeFestival`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idEditeurZone` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
