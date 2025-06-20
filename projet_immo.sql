-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 juin 2025 à 16:40
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.3.20
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de données : `projet_immo`
--
CREATE DATABASE IF NOT EXISTS `projet_immo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projet_immo`;
-- --------------------------------------------------------
--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `idbien` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `surface` double NOT NULL,
  `prix` double NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- RELATIONS POUR LA TABLE `bien`:
--

-- --------------------------------------------------------
--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `idnotif` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date_envoi` datetime NOT NULL,
  `typenotif` varchar(20) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `idbien` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- RELATIONS POUR LA TABLE `notifications`:
--   `idbien`
--       `bien` -> `idbien`
--   `idutilisateur`
--       `utilisateur` -> `idutilisateur`
--

-- --------------------------------------------------------
--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- RELATIONS POUR LA TABLE `utilisateur`:
--

-- --------------------------------------------------------
--
-- Structure de la table `visite`
--

CREATE TABLE `visite` (
  `idvisite` int(11) NOT NULL,
  `Date_visite` datetime NOT NULL,
  `statut` varchar(100) NOT NULL,
  `motif_visite` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `idbien` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- RELATIONS POUR LA TABLE `visite`:
--   `idbien`
--       `bien` -> `idbien`
--   `idutilisateur`
--       `utilisateur` -> `idutilisateur`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
ADD PRIMARY KEY (`idbien`);
--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
ADD PRIMARY KEY (`idnotif`),
  ADD KEY `idbien` (`idbien`),
  ADD KEY `idutilisateur` (`idutilisateur`);
--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
ADD PRIMARY KEY (`idutilisateur`);
--
-- Index pour la table `visite`
--
ALTER TABLE `visite`
ADD PRIMARY KEY (`idvisite`),
  ADD KEY `idbien` (`idbien`),
  ADD KEY `idutilisateur` (`idutilisateur`);
--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bien`
--
ALTER TABLE `bien`
MODIFY `idbien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
MODIFY `idnotif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`idbien`) REFERENCES `bien` (`idbien`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);
--
-- Contraintes pour la table `visite`
--
ALTER TABLE `visite`
ADD CONSTRAINT `visite_ibfk_1` FOREIGN KEY (`idbien`) REFERENCES `bien` (`idbien`),
  ADD CONSTRAINT `visite_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;