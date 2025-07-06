-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 05 juil. 2025 à 20:45
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_immo`
--

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
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`idbien`, `titre`, `description`, `photo`, `type`, `surface`, `prix`, `localisation`, `status`, `date_creation`) VALUES
(1, 'appartement a louer', 'appartement a louer a la cite keur guorgui derriere la sonatel avec acces au balcon et la vu sur la vdn', 'photosBiens/img_6868188859b18.png', 'appartement', 120, 250000, 'cite keur guorgui', 'disponible', '2025-07-02 14:45:09'),
(4, 'maison a louer', 'maison situer dans l extrême ouest du Sénégal avec vu sur la mer et du fleuve dote d une piscine salle de gym et 5 chambre', 'photosBiens/img_68696f2877944.png', 'maison', 2500, 1000000, 'saint louis, route de khor', 'disponible', '2025-07-05 18:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `idnotif` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date_envoi` datetime NOT NULL DEFAULT current_timestamp(),
  `typenotif` varchar(100) NOT NULL,
  `statut` varchar(7) NOT NULL DEFAULT 'non lu',
  `idutilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`idnotif`, `contenu`, `date_envoi`, `typenotif`, `statut`, `idutilisateur`) VALUES
(1, 'je voudrais avoir un rendez vous au sein de votre agence pour vous parler de mes biens', '2025-07-03 15:16:09', 'suggestionde partena', 'lu', 1),
(2, 'test numero 1 apres implementation du formulaire d\'ajout cote admin merci', '2025-07-04 17:08:15', 'test 1', 'lu', 1),
(3, 'nous serons ravis de vous accueillir chez nous pour en discuter plus en detail. vous pouvez planifier un rendez vous au niveau de la plateforme ou nous partager vos disponibilites.', '2025-07-04 17:31:10', 'reponse pour la sugg', 'lu', 1),
(4, 'test de confirmation du formulaire d ajout de bien', '2025-07-05 16:43:38', 'test apres merge avec quelques soucis de crud avec gestion bien', 'non lu', 1);

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
  `role` varchar(6) NOT NULL DEFAULT 'client',
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `telephone`, `email`, `photo`, `mot_de_passe`, `role`, `actif`, `date_inscription`) VALUES
(1, 'Mouhamed Diop', 771314146, 'mouhameddiop165@gmail.com', 'images/img_6856e09e2a878.jpg', '$2y$10$pttGL.qV/oQNy9DANoxL6OZj9OA66DXAQmCKMh4EB7ualElClTHrq', 'client', 1, '2025-06-21 16:41:02'),
(7, '', 0, '', NULL, '$2y$10$Yg/WMFu/vEwC9nG2bYwgZuMwBU9nFgV5LSQK6yL.al/uTB6LKcsa.', 'client', 1, '2025-07-05 18:15:27');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE `visite` (
  `idvisite` int(11) NOT NULL,
  `Date_visite` datetime NOT NULL,
  `statut` varchar(100) NOT NULL,
  `motif_visite` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `idutilisateur` int(11) NOT NULL,
  `idbien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`idvisite`, `Date_visite`, `statut`, `motif_visite`, `date_creation`, `idutilisateur`, `idbien`) VALUES
(1, '2025-07-10 11:47:09', 'planifier', 'visite de location', '2025-07-02 14:48:53', 1, 1),
(10, '2025-07-02 07:00:00', 'visiter', 'Visite de renseignement', '2025-07-03 15:58:04', 1, 1),
(11, '2025-07-03 16:22:00', 'visiter', 'Visite de renseignement', '2025-07-03 16:22:13', 1, 1),
(12, '2025-07-05 16:44:00', 'en visite', 'Visite de renseignement', '2025-07-05 16:44:51', 1, 1),
(13, '2025-07-07 12:31:00', 'planifier', 'Visite de renseignement', '2025-07-05 18:31:09', 1, 4),
(14, '2025-07-12 08:45:00', 'planifier', 'Visite de renseignement', '2025-07-05 18:42:55', 1, 4);

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
  MODIFY `idbien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `idnotif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `visite`
--
ALTER TABLE `visite`
  MODIFY `idvisite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `visite`
--
ALTER TABLE `visite`
  MODIFY `idvisite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `visite_ibfk_1` FOREIGN KEY (`idbien`) REFERENCES `bien` (`idbien`),
  ADD CONSTRAINT `visite_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
