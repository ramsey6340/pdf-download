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
-- Base de données : `eniac`
--

-- --------------------------------------------------------

--
-- Structure de la table `nom_matiere_gc`
--

CREATE TABLE `nom_matiere_gc` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(50) NOT NULL,
  `licence2` varchar(50) NOT NULL,
  `licence3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `nom_matiere_geea`
--

CREATE TABLE `nom_matiere_geea` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(55) NOT NULL,
  `licence2` varchar(55) NOT NULL,
  `licence3` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nom_matiere_geea`
--

INSERT INTO `nom_matiere_geea` (`ID`, `licence1`, `licence2`, `licence3`) VALUES
(1, 'Algorithmique et structures de données', 'Acquisition et traitement de données1', 'Acquisition des Données'),
(2, 'Dessin Technique', 'Asservissement Numérique1', 'Acquisition et Traitement de Données2'),
(3, 'Electronique', 'Capteurs / Instrumentation1', 'Asservissement Numérique2'),
(4, 'Informatique', 'Electronique analogique1', 'Capteurs / Instrumentation2'),
(5, 'Initiation aux algorithmes', 'Electronique de puissance1', 'Commandes Électriques'),
(6, 'Logique Mathématique', 'Electronique numérique1', 'Electronique de Puissance2'),
(7, 'Matériaux de construction rationnelle', 'Installations Electriques', 'Electronique Numérique2'),
(8, 'Mesures électriques', 'Logique Automatique', 'Electronique Analogique2'),
(9, 'TEC : circuit électriques AC', 'Machines Electriques', 'Eoliennes'),
(10, 'Théories des Circuits Electriques à Courant Continu', 'Programmation2', 'Informatique Industrielle'),
(11, '', 'Schémas Électriques', 'Logique Spécialisée'),
(12, '', 'Technologie Electrique', 'Maintenance Industrielle'),
(13, '', 'Théorie des Circuits Electriques', 'Micro Machines'),
(14, '', '', 'Photovoltaïque'),
(15, '', '', 'Réseaux Electriques');

-- --------------------------------------------------------

--
-- Structure de la table `nom_matiere_geo`
--

CREATE TABLE `nom_matiere_geo` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(50) NOT NULL,
  `licence2` varchar(50) NOT NULL,
  `licence3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `nom_matiere_git`
--

CREATE TABLE `nom_matiere_git` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(50) NOT NULL,
  `licence2` varchar(50) NOT NULL,
  `licence3` varchar(50) NOT NULL,
  `master1` varchar(60) NOT NULL,
  `master2` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nom_matiere_git`
--

INSERT INTO `nom_matiere_git` (`ID`, `licence1`, `licence2`, `licence3`, `master1`, `master2`) VALUES
(1, 'Codage de l\'information', 'Système d\'exploitation1', 'Transmission par fibre optique', 'Discrète optimisation', 'Gouvernance des SI'),
(2, 'Algebre de Boole', 'Théorie des langages', 'Transmission par satellites', 'Intelligence artificielle', 'Gestion des projets SI'),
(3, 'Logique Mathematique', 'Algorithme et structures de données2', 'Transmission par faisceaux hertziens', 'Traitement de signaux de communication', 'Management par les processus'),
(4, 'Algorithme et structure de données1', 'Programmation C', 'Téléphonie mobile 2', 'Spécification et traduction des langages', 'Audit et gestion de la sécurité des systèmes d\'information'),
(5, 'Signaux et Systèmes', 'Traitement du signal', 'Technologies xDSL et Téléphonie sur IP', 'Conception et programmation Parallèle et Orientée Objet', 'Ingénierie des systèmes d\'information à base de composant'),
(6, 'Système d\'information', 'Fonction Electronique 1', 'Télégraphie', 'Systèmes multi media : des médias à leurs manipulations', 'Entrepôts de données et Business Intelligence'),
(7, 'Modulations', 'Fonction électronique 2', 'Emetteurs radio', 'Services mobiles et réseau intelligent', 'Analyse des systèmes d\'information d\'entreprise'),
(8, 'Support de transmission', 'Opto-électronique', 'Emetteurs TV', 'GSM, GPRS/EDGE, UMTS, HSPA, LTE, LTE advanced, 4G/5G', 'Qualité logicielle: outils et méthodes'),
(9, 'Multiplexages', 'Antennes et propagation', 'Modélisation Objet et UML', '', 'Spécification logicielle'),
(10, 'Architecture des Ordinateurs', 'Téléphonie fixe', 'Théorie des graphes', '', 'Conception logicielle'),
(11, 'Théorie des circuit électriques', 'Téléphonie mobile 1', 'Algorithme et optimisation', '', 'Architecture logicielle JEE'),
(12, 'Système Logiques', 'Base de données', 'Recherche Opérationnel', '', 'Technologies du Web et Web 2.0'),
(13, '', 'Système d\'exploitation 2', 'Compilation', '', 'XML avancé'),
(14, '', 'Programmation Orientée Objet(C++)', 'Génie logiciel', '', 'Classification et fusion d\'information'),
(15, '', '', 'Réseau informatiques', '', 'Ondelettes'),
(16, '', '', 'Administration des systèmes d\'exploitation', '', 'Systèmes de communication numérique'),
(17, '', '', '', '', 'Techniques de compression'),
(18, '', '', '', '', 'Techniques multimédia'),
(19, '', '', '', '', 'Traitement et transmission d\'images'),
(20, '', '', '', '', 'Régulation des télécoms et Politique de tarification internationale'),
(21, '', '', '', '', 'Systèmes de communication sans fil'),
(22, '', '', '', '', 'Maintenance et optimisation des réseaux'),
(23, '', '', '', '', 'Réseaux optique'),
(24, '', '', '', '', 'Electronique embarquée');

-- --------------------------------------------------------

--
-- Structure de la table `nom_matiere_gme`
--

CREATE TABLE `nom_matiere_gme` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(50) NOT NULL,
  `licence2` varchar(50) NOT NULL,
  `licence3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `nom_matiere_topo`
--

CREATE TABLE `nom_matiere_topo` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(50) NOT NULL,
  `licence2` varchar(50) NOT NULL,
  `licence3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `variable_matiere_gc`
--

CREATE TABLE `variable_matiere_gc` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(20) NOT NULL,
  `licence2` varchar(20) NOT NULL,
  `licence3` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `variable_matiere_geea`
--

CREATE TABLE `variable_matiere_geea` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(20) NOT NULL,
  `licence2` varchar(20) NOT NULL,
  `licence3` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `variable_matiere_geea`
--

INSERT INTO `variable_matiere_geea` (`ID`, `licence1`, `licence2`, `licence3`) VALUES
(1, 'algo', 'acq_trait1', 'acq_don'),
(2, 'dessin_tech', 'asser_num1', 'acq_trait'),
(3, 'elec', 'cap_inst1', 'asser_num2'),
(4, 'info', 'elec_anal1', 'cap_inst2'),
(5, 'init_algo', 'elec_puis1', 'com_elec'),
(6, 'log_math', 'elec_num1', 'elec_puis2'),
(7, 'mat_cons', 'inst_elec', 'elec_num2'),
(8, 'mes_elec', 'log_aut', 'elec_anal2'),
(9, 'tec', 'mach_elec', 'eolienne'),
(10, 'theo_circuit_courant', 'prog2', 'info_indus'),
(11, '', 'shemas_elec', 'log_spe'),
(12, '', 'tech_elec', 'maint_indus'),
(13, '', 'theo_circuit', 'micro_mach'),
(14, '', '', 'photo'),
(15, '', '', 'reseau_elec');

-- --------------------------------------------------------

--
-- Structure de la table `variable_matiere_geo`
--

CREATE TABLE `variable_matiere_geo` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(20) NOT NULL,
  `licence2` varchar(20) NOT NULL,
  `licence3` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `variable_matiere_git`
--

CREATE TABLE `variable_matiere_git` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(20) NOT NULL,
  `licence2` varchar(20) NOT NULL,
  `licence3` varchar(20) NOT NULL,
  `master1` varchar(20) NOT NULL,
  `master2` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `variable_matiere_git`
--

INSERT INTO `variable_matiere_git` (`ID`, `licence1`, `licence2`, `licence3`, `master1`, `master2`) VALUES
(1, 'codage', 'sys_exploi1', 'fibre_opt', 'disc_opt', 'gouv_si'),
(2, 'boole', 'theo_lang', 'satellie', 'int_art', 'gest_proj_si'),
(3, 'log_math', 'algo2', 'hert', 'trait_sign_com', 'man_proc'),
(4, 'algo1', 'progc', 'tel_mob2', 'spec_trad_lang', 'aud_ges'),
(5, 'sig_sys', 'trait_sig', 'xdsl', 'con_prog', 'ing_sys'),
(6, 'sys_info', 'fonc_elec1', 'telegraphie', 'sys_mul', 'ent_bus'),
(7, 'modulation', 'fonc_elec2', 'radio', 'serv_mob', 'anal_sys'),
(8, 'sup_trans', 'opto', 'tv', 'tech_mob', 'qual_log'),
(9, 'multiplexage', 'ant_prop', 'uml', '', 'spec_log'),
(10, 'arch_ordi', 'tel_fix', 'theo_graf', '', 'conc_log'),
(11, 'theo_circuit', 'tel_mob1', 'algo_opt', '', 'jee'),
(12, 'sys_log', 'bdd', 'rech_ope', '', 'tech_web'),
(13, '', 'sys_exploi2', 'compilation', '', 'xml_avan'),
(14, '', 'cpp', 'genie_log', '', 'class_fus'),
(15, '', '', 'reseau', '', 'ond'),
(16, '', '', 'admin_sys', '', 'sys_com'),
(17, '', '', '', '', 'tech_comp'),
(18, '', '', '', '', 'tech_mul'),
(19, '', '', '', '', 'trait_trans'),
(20, '', '', '', '', 'reg_tel'),
(21, '', '', '', '', 'sys_san'),
(22, '', '', '', '', 'maint_opt'),
(23, '', '', '', '', 'res_opt'),
(24, '', '', '', '', 'elec_emb');

-- --------------------------------------------------------

--
-- Structure de la table `variable_matiere_gme`
--

CREATE TABLE `variable_matiere_gme` (
  `ID` int(11) NOT NULL,
  `licence1` varchar(20) NOT NULL,
  `licence2` varchar(20) NOT NULL,
  `licence3` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `nom_matiere_gc`
--
ALTER TABLE `nom_matiere_gc`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `nom_matiere_geea`
--
ALTER TABLE `nom_matiere_geea`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `nom_matiere_geo`
--
ALTER TABLE `nom_matiere_geo`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `nom_matiere_git`
--
ALTER TABLE `nom_matiere_git`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `nom_matiere_gme`
--
ALTER TABLE `nom_matiere_gme`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `nom_matiere_topo`
--
ALTER TABLE `nom_matiere_topo`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `variable_matiere_gc`
--
ALTER TABLE `variable_matiere_gc`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `variable_matiere_geea`
--
ALTER TABLE `variable_matiere_geea`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `variable_matiere_geo`
--
ALTER TABLE `variable_matiere_geo`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `variable_matiere_git`
--
ALTER TABLE `variable_matiere_git`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `variable_matiere_gme`
--
ALTER TABLE `variable_matiere_gme`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `nom_matiere_gc`
--
ALTER TABLE `nom_matiere_gc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `nom_matiere_geea`
--
ALTER TABLE `nom_matiere_geea`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `nom_matiere_geo`
--
ALTER TABLE `nom_matiere_geo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `nom_matiere_git`
--
ALTER TABLE `nom_matiere_git`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `nom_matiere_gme`
--
ALTER TABLE `nom_matiere_gme`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `nom_matiere_topo`
--
ALTER TABLE `nom_matiere_topo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `variable_matiere_gc`
--
ALTER TABLE `variable_matiere_gc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `variable_matiere_geea`
--
ALTER TABLE `variable_matiere_geea`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `variable_matiere_geo`
--
ALTER TABLE `variable_matiere_geo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `variable_matiere_git`
--
ALTER TABLE `variable_matiere_git`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `variable_matiere_gme`
--
ALTER TABLE `variable_matiere_gme`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
