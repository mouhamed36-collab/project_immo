-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 juil. 2025 à 18:53
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
(4, 'maison a louer', 'maison situer dans l extrême ouest du Sénégal avec vu sur la mer et du fleuve dote d une piscine salle de gym et 5 chambre', 'photosBiens/img_686bd932a7709.jpeg', 'maison', 2500, 1500000, 'saint louis, route de khor', 'en visite', '2025-07-05 18:30:00'),
(6, 'Appartement F4 à louer', 'Nous vous proposons en location, à la cité Mourtada un appartement de type F4.Il est  composé d’une chambre parentale avec salle d’eau, deux chambres enfants avec une toilette commune, un salon avec balcon , une cuisine avec placard et espace familiale.\r\n\r\nDisponibilités :1er ,2e et 3e étage.', 'photosBiens/img_686bd69ebc331.jpeg', 'appartement', 50, 400000, 'Dakar, Cité Mourtada VDN', 'disponible', '2025-07-07 14:15:58'),
(7, 'terrain a vendre', 'A vendre  à Ngor un terrain d’angle  d’une superficie de 563 m2.\r\n\r\nPapier : Titre foncier', 'photosBiens/img_686bd7476ce93.jpg', 'terrain', 563, 650, 'Dakar, Ngor - Almadies', 'indisponible', '2025-07-07 14:18:47'),
(8, 'Villa en R+3 à vendre', 'A vendre à Ngor  une villa d’une  superficie de 288 m2.Elle est composée de quatre chambres avec chacune sa salle d’eau , un   grand salon, une cuisine équipée, une chambre avec toilette pour le personnel de maison, un  appartement de trois chambres salon au 2e étage et un studio sur la terrasse.', 'photosBiens/img_686bd85902954.jpeg', 'maison', 300, 350000000, 'Dakar, Ngor', 'en visite', '2025-07-07 14:23:21'),
(9, 'Villa à vendre', 'Nous vous proposons  une villa moderne de 500m2 avec vue sur mer à louer à Ndayanne.\r\navec une Large terrasse offrant un coucher de soleil unique sur l’océan.\r\nelle est composé d’un  Grand salon + trois  chambres + trois salles d’eau+ chambre à part pour domestique + WC.\r\nUne cuisine entièrement équipée de frigo side by side, lave vaisselle, four, micro onde et rangement.\r\ntoutes les chambres et  le salon sont climatisés.\r\n– Buanderie avec lave linge / sèche linge\r\n– Poste de garde pour gardien\r\n– Garage\r\n– Jardin avec espace vert et piscine\r\n– Sécurité: Poste de garde et Caméras de surveillance.', 'photosBiens/img_686bd8e89e956.jpeg', 'maison', 500, 200000000, 'Senegal, Ndayane', 'disponible', '2025-07-07 14:25:44');

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
(4, 'test de confirmation du formulaire d ajout de bien', '2025-07-05 16:43:38', 'test apres merge avec quelques soucis de crud avec gestion bien', 'lu', 1),
(5, 'je vous remercie', '2025-07-06 15:10:34', 'bonjour', 'lu', 1),
(6, 'test pour l envoi de notification du client a partir de la section contact', '2025-07-07 15:00:33', 'envoi notification client', 'non lu', 1),
(7, 'bonjour est ce que vous avez des logement disponible a Mbour ?', '2025-07-11 15:49:11', 'demande de renseignement', 'lu', 8);

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
(1, 'Agence immo', 771314146, 'mouhameddiop165@gmail.com', NULL, '$2y$10$pttGL.qV/oQNy9DANoxL6OZj9OA66DXAQmCKMh4EB7ualElClTHrq', 'admin', 1, '2025-06-21 16:41:02'),
(8, 'Mouhamed Diop', 761794087, 'mouhamed.diop36@unchk.edu.sn', 'images/img_686c04089032d.jpg', '$2y$10$XmgtWmKouVTaBy4xoFM.ouku11qvP5kqGgOS/SBRubVTvxGe0OG5y', 'client', 1, '2025-07-07 17:29:44'),
(11, 'majistic dev', 776543467, 'majisticdev@gmail.com', NULL, '$2y$10$lB2tynWHXqv/630TUo937eDcmxJVURaitYA9ECrhaiCFoJuL2CYTC', 'client', 0, '2025-07-08 16:45:18'),
(13, 'inno', 786543217, 'immo@gmail.com', NULL, '$2y$10$Jz331aWmrSLCRAKfGIb8BOjfhmC2KzDh3dCsmPaX0.Qv8SeItz4rW', 'client', 0, '2025-07-11 15:54:50');

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
(1, '2025-07-09 11:45:00', 'visiter', 'visite de location', '2025-07-02 14:48:53', 1, 1),
(10, '2025-07-02 07:00:00', 'visiter', 'Visite de renseignement', '2025-07-03 15:58:04', 1, 1),
(11, '2025-07-03 16:22:00', 'visiter', 'Visite de renseignement', '2025-07-03 16:22:13', 1, 1),
(12, '2025-07-05 16:44:00', 'visiter', 'Visite de renseignement', '2025-07-05 16:44:51', 1, 1),
(13, '2025-07-07 12:31:00', 'en visite', 'Visite de renseignement', '2025-07-05 18:31:09', 1, 4),
(14, '2025-07-12 08:45:00', 'planifier', 'Visite de renseignement', '2025-07-05 18:42:55', 1, 4),
(15, '2025-07-08 12:00:00', 'planifier', 'visite de renseignement pour maison a louer', '2025-07-07 16:53:00', 1, 4),
(16, '2025-07-12 12:26:00', 'planifier', 'visite de renseignement pour appartement a louer', '2025-07-11 15:30:23', 8, 1),
(17, '2025-07-12 15:46:00', 'planifier', 'visite de renseignement pour Villa en R+2 à vendre', '2025-07-11 15:46:59', 8, 8);

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
  MODIFY `idbien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `idnotif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `visite`
--
ALTER TABLE `visite`
  MODIFY `idvisite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
