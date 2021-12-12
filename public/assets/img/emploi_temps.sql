-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 13 sep. 2021 à 10:37
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecoltechnifure`
--

-- --------------------------------------------------------

--
-- Structure de la table `emploi_temps`
--

CREATE TABLE `emploi_temps` (
  `Id_Emploi` int(10) UNSIGNED NOT NULL,
  `HeurDebut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HeurFin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Id_Matiere` int(10) UNSIGNED DEFAULT NULL,
  `Id_Classe` int(10) UNSIGNED DEFAULT NULL,
  `annees_Scolaire` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Jours` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emploi_temps`
--

INSERT INTO `emploi_temps` (`Id_Emploi`, `HeurDebut`, `HeurFin`, `Id_Matiere`, `Id_Classe`, `annees_Scolaire`, `created_at`, `updated_at`, `Jours`) VALUES
(1, '08h-09h', NULL, NULL, NULL, '1', '2021-09-06 09:28:55', '2021-09-06 09:28:55', ''),
(2, '08', '09', 1, 2, '2019', '2021-09-06 15:56:04', '2021-09-06 15:56:04', 'Mardi'),
(3, '11', '12', 1, 2, '2019', '2021-09-06 18:57:03', '2021-09-06 18:57:03', 'Jeudi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emploi_temps`
--
ALTER TABLE `emploi_temps`
  ADD PRIMARY KEY (`Id_Emploi`),
  ADD KEY `emploi_temps_id_matiere_foreign` (`Id_Matiere`),
  ADD KEY `emploi_temps_id_classe_foreign` (`Id_Classe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emploi_temps`
--
ALTER TABLE `emploi_temps`
  MODIFY `Id_Emploi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emploi_temps`
--
ALTER TABLE `emploi_temps`
  ADD CONSTRAINT `emploi_temps_id_classe_foreign` FOREIGN KEY (`Id_Classe`) REFERENCES `classes` (`Id_Classe`),
  ADD CONSTRAINT `emploi_temps_id_matiere_foreign` FOREIGN KEY (`Id_Matiere`) REFERENCES `cours` (`Id_Cours`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
