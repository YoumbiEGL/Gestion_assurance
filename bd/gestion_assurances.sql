-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 27 mars 2025 à 18:03
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_assurances`
--

-- --------------------------------------------------------

--
-- Structure de la table `assurances`
--

CREATE TABLE `assurances` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `montant` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `assurances`
--

INSERT INTO `assurances` (`id`, `client_id`, `type`, `date_debut`, `date_fin`, `montant`) VALUES
(21, 2, 'Santé', '2023-06-10', '2024-06-10', 800.00),
(22, 3, 'Habitation', '2024-03-05', '2025-03-05', 1500.75),
(23, 4, 'Vie', '2022-12-20', '2025-12-20', 3000.25),
(24, 5, 'Auto', '2024-07-01', '2025-07-01', 1100.30),
(26, 7, 'Habitation', '2024-02-28', '2025-02-28', 1700.99),
(27, 8, 'Vie', '2023-11-15', '2026-11-15', 3200.00),
(28, 9, 'Auto', '2024-05-20', '2025-05-20', 1300.75),
(29, 10, 'Santé', '2024-08-10', '2025-08-10', 780.50),
(31, 2, 'Santé', '2025-03-23', '2025-04-30', 100.00);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `password`, `is_admin`) VALUES
(2, 'Dupont', 'Jean', 'jean.dupont@example.com', '690123456', '12 Rue des Fleurs, Paris', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(3, 'Martin', 'Sophie', 'sophie.martin@example.com', '677987654', '34 Avenue Victor Hugo, Lyon', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(4, 'Durand', 'Paul', 'paul.durand@example.com', '655876543', '78 Boulevard Haussmann, Marseille', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(5, 'Bernard', 'Alice', 'alice.bernard@example.com', '699654321', '5 Place Bellecour, Lyon', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(6, 'Lemoine', 'David', 'david.lemoine@example.com', '674112233', '23 Rue Lafayette, Lille', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 1),
(7, 'Roche', 'Camille', 'camille.roche@example.com', '622334455', '56 Quai de la Seine, Paris', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(8, 'Moreau', 'Luc', 'luc.moreau@example.com', '633221144', '41 Avenue de l\'Europe, Toulouse', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(9, 'Faure', 'Emilie', 'emilie.faure@example.com', '611443322', '89 Rue du Commerce, Bordeaux', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 1),
(10, 'Giraud', 'Hugo', 'hugo.giraud@example.com', '655998877', '12 Rue des Lilas, Nice', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(11, 'Simon', 'Julie', 'julie.simon@example.com', '677665544', '99 Avenue du Général Leclerc, Montpellier', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 0),
(12, 'YOUMBI ESSOUMA', 'GUY LANDRY', 'guy.youmbi@gmail.com', '565566', 'kaka', '$2y$10$Qw0/DiGCwsQawX7o0v9U8ezP7KKbmC3tGDoQkKNk/kazmg7E3gAC2', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assurances`
--
ALTER TABLE `assurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `assurances`
--
ALTER TABLE `assurances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assurances`
--
ALTER TABLE `assurances`
  ADD CONSTRAINT `assurances_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
