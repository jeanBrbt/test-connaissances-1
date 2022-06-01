-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 02 mai 2022 à 16:58
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test_ivs_jean`
--

-- --------------------------------------------------------

--
-- Structure de la table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `id_organisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `building`
--

INSERT INTO `building` (`id`, `nom`, `zipcode`, `id_organisation`) VALUES
(1, 'Building_A_2', 15, 0),
(2, 'Building_A_3', 25, 0),
(3, 'Building_B_1', 30, 1),
(4, 'Building_B_2', 35, 1),
(5, 'Building_B_3', 40, 1),
(6, 'Building_C_1', 45, 2),
(7, 'Building_C_2', 50, 2),
(8, 'Building_C_3', 55, 2),
(10, 'Building_A_1', 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `organisation`
--

INSERT INTO `organisation` (`id`, `nom`) VALUES
(0, 'Organisation_A'),
(1, 'Organisation_B'),
(2, 'Organisation_C');

-- --------------------------------------------------------

--
-- Structure de la table `piéces`
--

CREATE TABLE `piéces` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `NbPersonnesPresente` int(11) NOT NULL,
  `id_building` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piéces`
--

INSERT INTO `piéces` (`id`, `nom`, `NbPersonnesPresente`, `id_building`) VALUES
(1, 'A_1_1', 15, 10),
(2, 'A_1_2', 1, 10),
(3, 'A_1_3', 30, 10),
(4, 'A_2_1', 50, 1),
(5, 'A_2_2', 100, 1),
(6, 'A_2_3', 1, 1),
(7, 'A_3_1', 5, 2),
(8, 'A_3_2', 6, 2),
(9, 'A_3_3', 8, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lien_orga` (`id_organisation`);

--
-- Index pour la table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `piéces`
--
ALTER TABLE `piéces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lien_building` (`id_building`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `piéces`
--
ALTER TABLE `piéces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `lien_orga` FOREIGN KEY (`id_organisation`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `piéces`
--
ALTER TABLE `piéces`
  ADD CONSTRAINT `lien_building` FOREIGN KEY (`id_building`) REFERENCES `building` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
