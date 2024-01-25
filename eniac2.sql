-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 sep. 2021 à 14:37
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eniac2`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `power`, `etat`, `statut`) VALUES
(4, '@dm1n', '$2y$10$Rw9ym6ZyuQsqrdzSP9rvK.dbE3gd9DozKQpusaZ7nMr7hYDcxuDva', 'little', 1, 1),
(3, 'ramsey', '$2y$10$tB8jHXo7DylQ7RjjzYDumu065gZ4uQsG56plUyWt7X/ANxJCuSdqq', 'all', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `document_chi`
--

CREATE TABLE `document_chi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `classe` varchar(10) NOT NULL DEFAULT 'chimie',
  `var_matiere` varchar(6) NOT NULL DEFAULT 'chimie',
  `filiere` varchar(4) NOT NULL DEFAULT 'SF-C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_chi`
--

INSERT INTO `document_chi` (`id`, `name`, `path_doc`, `size`, `type`, `classe`, `var_matiere`, `filiere`) VALUES
(2, 'EMANTIC_JOB.pdf', 'admin/upload/chimie/EMANTIC_JOB.pdf', 0.522037, 'admin', 'licence1', 'Inconn', 'SF-M'),
(3, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/chimie/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'licence1', 'Inconn', 'chim'),
(4, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/chimie/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'licence1', 'Inconn', 'chim');

-- --------------------------------------------------------

--
-- Structure de la table `document_gc`
--

CREATE TABLE `document_gc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `nom_matiere` varchar(55) NOT NULL,
  `var_matiere` varchar(20) NOT NULL,
  `filiere` varchar(4) NOT NULL DEFAULT 'gc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_gc`
--

INSERT INTO `document_gc` (`id`, `name`, `path_doc`, `size`, `type`, `nom_matiere`, `var_matiere`, `filiere`) VALUES
(1, 'EMANTIC_JOB.pdf', 'admin/upload/gc/EMANTIC_JOB.pdf', 0.522037, 'admin', 'test', 'Inconnue', 'gc'),
(2, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/gc/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'test', 'Inconnue', 'gc'),
(3, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/gc/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'test', 'Inconnue', 'gc');

-- --------------------------------------------------------

--
-- Structure de la table `document_geea`
--

CREATE TABLE `document_geea` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `nom_matiere` varchar(55) NOT NULL,
  `var_matiere` varchar(20) NOT NULL,
  `filiere` varchar(4) NOT NULL DEFAULT 'geea'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_geea`
--

INSERT INTO `document_geea` (`id`, `name`, `path_doc`, `size`, `type`, `nom_matiere`, `var_matiere`, `filiere`) VALUES
(3, 'EMANTIC_JOB.pdf', 'admin/upload/geea/EMANTIC_JOB.pdf', 0.522037, 'admin', 'Acquisition des Données', 'Inconnue', 'geea'),
(4, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/geea/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'Acquisition des Données', 'Inconnue', 'geea'),
(5, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/geea/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'Acquisition des Données', 'Inconnue', 'geea');

-- --------------------------------------------------------

--
-- Structure de la table `document_geo`
--

CREATE TABLE `document_geo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom_matiere` varchar(55) NOT NULL,
  `var_matiere` varchar(20) NOT NULL,
  `filiere` varchar(3) NOT NULL DEFAULT 'geo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_geo`
--

INSERT INTO `document_geo` (`id`, `name`, `path_doc`, `size`, `type`, `nom_matiere`, `var_matiere`, `filiere`) VALUES
(1, 'EMANTIC_JOB.pdf', 'admin/upload/geo/EMANTIC_JOB.pdf', 0.522037, 'admin', 'test', 'Inconnue', 'geo'),
(2, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/geo/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'test', 'Inconnue', 'geo'),
(3, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/geo/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'test', 'Inconnue', 'geo');

-- --------------------------------------------------------

--
-- Structure de la table `document_git`
--

CREATE TABLE `document_git` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `nom_matiere` varchar(55) NOT NULL,
  `var_matiere` varchar(20) NOT NULL,
  `filiere` varchar(3) NOT NULL DEFAULT 'git'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `document_git`
--

INSERT INTO `document_git` (`id`, `name`, `path_doc`, `size`, `type`, `nom_matiere`, `var_matiere`, `filiere`) VALUES
(1, 'EMANTIC_JOB.pdf', 'admin/upload/git/EMANTIC_JOB.pdf', 0.522037, 'admin', 'Codage de l\'information', 'Inconnue', 'git'),
(2, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/git/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'Codage de l\'information', 'Inconnue', 'git'),
(3, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/git/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'Codage de l\'information', 'Inconnue', 'git');

-- --------------------------------------------------------

--
-- Structure de la table `document_gme`
--

CREATE TABLE `document_gme` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `nom_matiere` varchar(55) NOT NULL,
  `var_matiere` varchar(20) NOT NULL,
  `filiere` varchar(3) NOT NULL DEFAULT 'gme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_gme`
--

INSERT INTO `document_gme` (`id`, `name`, `path_doc`, `size`, `type`, `nom_matiere`, `var_matiere`, `filiere`) VALUES
(1, 'EMANTIC_JOB.pdf', 'admin/upload/gme/EMANTIC_JOB.pdf', 0.522037, 'admin', 'test', 'Inconnue', 'gme'),
(2, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/gme/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'test', 'Inconnue', 'gme'),
(3, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/gme/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'test', 'Inconnue', 'gme');

-- --------------------------------------------------------

--
-- Structure de la table `document_math`
--

CREATE TABLE `document_math` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `var_matiere` varchar(12) NOT NULL DEFAULT 'mathematique',
  `filiere` varchar(4) NOT NULL DEFAULT 'SF-M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_math`
--

INSERT INTO `document_math` (`id`, `name`, `path_doc`, `size`, `type`, `classe`, `var_matiere`, `filiere`) VALUES
(2, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/math/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'licence1', 'Inconnue', 'SF-M'),
(3, 'eau.docx', 'admin/upload/math/eau.docx', 0.016397, 'admin', 'licence1', 'Inconnue', 'SF-M'),
(4, 'EMANTIC_JOB.pdf', 'admin/upload/math/EMANTIC_JOB.pdf', 0.522037, 'admin', 'licence1', 'Inconnue', 'math'),
(5, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/math/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'licence1', 'Inconnue', 'math');

-- --------------------------------------------------------

--
-- Structure de la table `document_phy`
--

CREATE TABLE `document_phy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `var_matiere` varchar(8) NOT NULL DEFAULT 'physique',
  `filiere` varchar(4) NOT NULL DEFAULT 'SF-P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_phy`
--

INSERT INTO `document_phy` (`id`, `name`, `path_doc`, `size`, `type`, `classe`, `var_matiere`, `filiere`) VALUES
(1, 'EMANTIC_JOB.pdf', 'admin/upload/physique/EMANTIC_JOB.pdf', 0.522037, 'admin', 'licence1', 'Inconnue', 'phys'),
(2, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/physique/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'licence1', 'Inconnue', 'phys'),
(3, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/physique/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'licence1', 'Inconnue', 'phys');

-- --------------------------------------------------------

--
-- Structure de la table `document_topo`
--

CREATE TABLE `document_topo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `nom_matiere` varchar(55) NOT NULL,
  `var_matiere` varchar(20) NOT NULL,
  `filiere` varchar(4) NOT NULL DEFAULT 'topo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document_topo`
--

INSERT INTO `document_topo` (`id`, `name`, `path_doc`, `size`, `type`, `nom_matiere`, `var_matiere`, `filiere`) VALUES
(1, 'EMANTIC_JOB.pdf', 'admin/upload/topo/EMANTIC_JOB.pdf', 0.522037, 'admin', 'test', 'Inconnue', 'topo'),
(2, 'PROGRAMME_EMANTIC_-_2021.pdf', 'admin/upload/topo/PROGRAMME_EMANTIC_-_2021.pdf', 0.422464, 'admin', 'test', 'Inconnue', 'topo'),
(3, 'REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 'admin/upload/topo/REGLEMENT_INTERIEUR_EMANTIC_-_2021.pdf', 0.418654, 'admin', 'test', 'Inconnue', 'topo');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `filiere` varchar(4) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date_inscription` date NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `nom`, `prenom`, `email`, `date_naissance`, `password`, `filiere`, `etat`, `date_inscription`, `statut`) VALUES
(2, 'Traore', 'Drissa Sidiki', 'idy@gmail.com', '2001-01-05', '$2y$10$u.V5p30WQnHM6WG9m4ev6unyUO6ZbJRREtou8UtANKoR5FRDA9Fgi', 'git', 1, '2021-08-15', 1),
(4, 'Sanogo', 'Ousmane', 'oussou@gmail.com', '1997-10-21', '$2y$10$IFOsNc.8Hw71L570XiFA5uF1RLVxTaI.5XgKtorL4zTWHJqHQqgWO', 'gme', 1, '2021-08-16', 0),
(5, 'Dembele', 'Idrissa', 'idrissa@gmail.com', '1999-02-12', '$2y$10$xgp6NRuY0E8uCxOJ8YXUPeM5C3ghqPKC6Jr9W69jbIARbu/C6souC', 'geea', 1, '2021-08-16', 0),
(6, 'Diarra', 'Boubacar', 'boubacar@gmail.com', '1999-05-02', '$2y$10$WczBK2mfti3cqWQvu92gCe.4WykHmJTQdKSt93zBfscaDLpSymlbW', 'gc', 1, '2021-08-16', 0),
(7, 'Sylla', 'Sekou', 'sekou@gmail.com', '1997-10-10', '$2y$10$dO1zQpit2gyJT.SwA3ha6.jwxFchI1BsyXc0UxygaBb2SVUBf/RkC', 'geo', 1, '2021-08-16', 0),
(8, 'Stalker', 'Luce', 'luce@icloud.com', '1995-11-04', '$2y$10$vfpEtaIwFL1i6zgysxBJBuW1V1rAdAV1XKxPbgAzFBc3PrEPCMgWe', 'topo', 1, '2021-08-16', 1),
(9, 'test', 'test', 'test@gmail.com', '2021-07-29', '$2y$10$ZxVN4Uy2VuQqLNXkmOA/cu6ydaJXG7LVKqNs7PbqlF/H8rhzW7IzG', 'git', 1, '2021-08-17', 0);

-- --------------------------------------------------------

--
-- Structure de la table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_doc` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `type` varchar(5) NOT NULL,
  `nom_matiere` varchar(55) NOT NULL,
  `var_matiere` varchar(20) NOT NULL,
  `filiere` varchar(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_chi`
--
ALTER TABLE `document_chi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_gc`
--
ALTER TABLE `document_gc`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_geea`
--
ALTER TABLE `document_geea`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_geo`
--
ALTER TABLE `document_geo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_git`
--
ALTER TABLE `document_git`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_gme`
--
ALTER TABLE `document_gme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_math`
--
ALTER TABLE `document_math`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_phy`
--
ALTER TABLE `document_phy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_topo`
--
ALTER TABLE `document_topo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `document_chi`
--
ALTER TABLE `document_chi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `document_gc`
--
ALTER TABLE `document_gc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document_geea`
--
ALTER TABLE `document_geea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `document_geo`
--
ALTER TABLE `document_geo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document_git`
--
ALTER TABLE `document_git`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document_gme`
--
ALTER TABLE `document_gme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document_math`
--
ALTER TABLE `document_math`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `document_phy`
--
ALTER TABLE `document_phy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document_topo`
--
ALTER TABLE `document_topo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
