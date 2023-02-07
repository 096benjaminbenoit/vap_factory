-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 07 fév. 2023 à 09:52
-- Version du serveur : 8.0.32-0ubuntu0.22.04.2
-- Version de PHP : 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Vap_Factory`
--

-- --------------------------------------------------------

--
-- Structure de la table `Cigarette_electronique`
--

CREATE TABLE `Cigarette_electronique` (
  `Id` int NOT NULL,
  `reference` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix_achat_unitaire` float(10,2) NOT NULL,
  `prix_vente_unitaire` float(10,2) NOT NULL,
  `quantite` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Cigarette_electronique`
--
ALTER TABLE `Cigarette_electronique`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `ref` (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Cigarette_electronique`
--
ALTER TABLE `Cigarette_electronique`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
