-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 08 avr. 2025 à 11:52
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `notezaa`
--

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `idfiliere` int(11) NOT NULL,
  `idmatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`idfiliere`, `idmatiere`) VALUES
(1, 10),
(1, 12),
(1, 16),
(1, 17),
(5, 11),
(5, 13),
(5, 14),
(5, 22),
(7, 19),
(7, 20),
(7, 21),
(7, 23);

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE `enseigne` (
  `iduser` int(11) NOT NULL,
  `idmatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `idfiliere` int(11) NOT NULL,
  `nomfiliere` char(255) DEFAULT NULL,
  `codefiliere` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idfiliere`, `nomfiliere`, `codefiliere`) VALUES
(1, 'CHAUDRONNERIE', 'CH'),
(5, 'COMPTABILITE DE GESTION D&#039;ENTREPRISE', 'CGE'),
(7, 'GENIE LOGICIEL', 'GL');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `idmatiere` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nommatiere` char(32) DEFAULT NULL,
  `nbrecreditmatiere` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`idmatiere`, `iduser`, `nommatiere`, `nbrecreditmatiere`) VALUES
(10, 6, 'Mathematique', '6'),
(11, 7, 'COMPTABILITE GENERAL', '4'),
(12, 6, 'physique', '4'),
(13, 7, 'COMPTABILITE ANALYTIQUE', '2'),
(14, 7, 'FISCALITE DES ENTREPRISES', '4'),
(16, 6, 'Traitement thermique', '7'),
(17, 13, 'Français', '2'),
(19, 14, 'Programmation web', '4'),
(20, 14, 'Programmation evenementiel', '4'),
(21, 14, 'outil bureautique', '3'),
(22, 9, 'ANGLAIS', '2'),
(23, 14, 'Gestion de projet', '4'),
(24, 7, 'gj', '2'),
(25, 6, 'MJEUMANI', '7'),
(26, 6, 'KANOU', '7'),
(27, 7, 'GL', '2'),
(28, 7, 'THERMIQ', '2'),
(29, 9, 'TER', '7'),
(30, 7, 'ther', '6'),
(31, 7, 'thermique', '12');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idnote` int(11) NOT NULL,
  `idmatiere` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `note` char(32) DEFAULT NULL,
  `notecredit` char(32) DEFAULT NULL,
  `type_examen` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `releve_note`
--

CREATE TABLE `releve_note` (
  `idreleve_note` int(11) NOT NULL,
  `idnote` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `idfiliere` int(11) DEFAULT NULL,
  `nom` char(32) DEFAULT NULL,
  `prenom` char(32) DEFAULT NULL,
  `matricule` char(32) DEFAULT NULL,
  `mail` char(32) DEFAULT NULL,
  `numero` char(32) DEFAULT NULL,
  `username` char(32) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `role` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `idfiliere`, `nom`, `prenom`, `matricule`, `mail`, `numero`, `username`, `password`, `role`) VALUES
(0, 7, 'FOAPAS', 'STYVES', '25GL0010', 'Foapastyve@gmail.com', '679776020', NULL, '@styve', 'student'),
(6, NULL, 'NGASSA', 'PAUL', '21S777', 'Ngassapaul@gmail.com', '680904050', NULL, '@paul', 'teacher'),
(7, NULL, 'MAFFO', 'ISABELLE', '22S670', 'Maffoisabelle@gmail.com', '650403020', NULL, '@isabelle', 'teacher'),
(8, 1, 'admin', 'admin', NULL, 'admin@admingmail.com', '699394959', '@admin', 'admin', 'admin'),
(9, NULL, 'TOUTCHA', 'CHANIS', '24S222', 'Toutchachanis@gmail.com', '677894939', NULL, '@chanis', 'teacher'),
(10, 1, 'CHANIS', 'FRANCK', '25GL1804', 'chanisfranck@gmail.com', '659298983', NULL, '@franck', 'student'),
(11, 5, 'DJUIDJIE', 'MANUELLA', '25CG156', 'djuidjie@gmail.com', '693968751', NULL, '@manue', 'student'),
(12, 7, 'NGUIEPET', 'LORRAINE', '25GL0853', 'Nguiepetlorraine@gmail.com', '683782424', NULL, '@lorrraine', 'student'),
(13, NULL, 'KANOU', 'IVAN', '22S0644', 'Kanouivan@gmail.com', '677346767', NULL, '@ivan', 'teacher'),
(14, NULL, 'SILENOU', 'LEATICIA', '24S0040', 'Silenouleaticia@gmail.com', '655493920', NULL, '@leaticia', 'teacher');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`idfiliere`,`idmatiere`),
  ADD KEY `fk_contient_matiere` (`idmatiere`);

--
-- Index pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD PRIMARY KEY (`iduser`,`idmatiere`),
  ADD KEY `fk_eenseigne_matiere` (`idmatiere`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`idfiliere`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`idmatiere`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idnote`),
  ADD KEY `fk_note_matiere` (`idmatiere`),
  ADD KEY `fk_note_user` (`iduser`);

--
-- Index pour la table `releve_note`
--
ALTER TABLE `releve_note`
  ADD PRIMARY KEY (`idreleve_note`),
  ADD KEY `fk_releve_note_note` (`idnote`),
  ADD KEY `fk_releve_note_user` (`iduser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fk_user_filiere` (`idfiliere`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `fk_contient_filiere` FOREIGN KEY (`idfiliere`) REFERENCES `filiere` (`idfiliere`),
  ADD CONSTRAINT `fk_contient_matiere` FOREIGN KEY (`idmatiere`) REFERENCES `matiere` (`idmatiere`);

--
-- Contraintes pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `fk_eenseigne_matiere` FOREIGN KEY (`idmatiere`) REFERENCES `matiere` (`idmatiere`),
  ADD CONSTRAINT `fk_eenseigne_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_note_matiere` FOREIGN KEY (`idmatiere`) REFERENCES `matiere` (`idmatiere`),
  ADD CONSTRAINT `fk_note_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `releve_note`
--
ALTER TABLE `releve_note`
  ADD CONSTRAINT `fk_releve_note_note` FOREIGN KEY (`idnote`) REFERENCES `note` (`idnote`),
  ADD CONSTRAINT `fk_releve_note_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_filiere` FOREIGN KEY (`idfiliere`) REFERENCES `filiere` (`idfiliere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
