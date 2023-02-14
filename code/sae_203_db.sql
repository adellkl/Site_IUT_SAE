-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 17 juin 2022 à 21:31
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_203_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chapo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `date_derniere_mise_a_jour` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `lien_yt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `auteur_id`, `titre`, `chapo`, `contenu`, `image`, `date_creation`, `date_derniere_mise_a_jour`, `lien_yt`) VALUES
(31, NULL, 'un bureau moderne ', 'Bureau tout nouveau ', 'Non hoc illo aliis numquam vel iussisse aliquando hoc elogio ob de in quod cohorte poenae poenae adulatorum illo aliis inexorabiles factitarunt poenae de fertur neminem factitarunt neminem addictum illo quod fertur in quod more effervescebat quod quoque poenae iussisse progressu ob aetatis haec factitarunt fertur propositum iussisse oblato quod obstinatum inexorabiles eius haec effervescebat principes adulatorum cohorte intepescit similia haec quoque in hoc cohorte de vel obstinatum in quoque accendente numquam principes eius accendente quod elogio oblato inexorabiles intepescit inexorabiles progressu similia similia oblato aetatis adulatorum aetatis progressu more propositum cohorte addictum quod vitium accendente illo iussisse principes quod.', 'https://cache.marieclaire.fr/data/photo/w1000_ci/5i/petit-bureau-en-bois.jpg', '2022-06-12 18:26:02', '2022-06-12 18:26:02', '');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lien_twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lien_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `lien_twitter`, `lien_avatar`) VALUES
(17, 'Orius', 'Kuerten', '', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2QFaQyezndgniERWn-5S9oNrdXzK9yALQCj_V384ErrrH7il5bou3nGTREZCPMsoCjGY&usqp=CAU'),
(18, 'Soukamisu', 'Eliot', '', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl6JPaMyl7e0oZfSdBa84_MTOUWwR50niJlLF79QPOlAIEYlSwWcWLG35W3EFI0iGzWFc&usqp=CAU'),
(19, 'loukal', 'adel', '', 'https://us.123rf.com/450wm/yupiramos/yupiramos1804/yupiramos180402323/98584341-jeune-homme-avec-la-barbe-hippie-style-avatar-t%C3%AAte-vecteur-de-caract%C3%A8re-illustration.jpg?ver=6'),
(20, 'loukal', 'adel', '', 'https://us.123rf.com/450wm/yupiramos/yupiramos1804/yupiramos180402323/98584341-jeune-homme-avec-la-barbe-hippie-style-avatar-t%C3%AAte-vecteur-de-caract%C3%A8re-illustration.jpg?ver=6');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `email`, `contenu`, `type`, `date_creation`) VALUES
(5, 'Labatte', 'Kevin', 'kevin.labatte0@gmail.com', 'vdvdsfqss', 'parent', '2022-06-08 09:40:05'),
(6, 'Labatte', 'Kevin', 'kevin.labatte0@gmail.com', 'ngvfgh', 'parent', '2022-06-13 11:49:14'),
(7, 'adel', 'fsfsf', 'adelloukal2@gmail.com', 'zeffzf', 'etudiant', '2022-06-13 11:49:46'),
(8, 'Labatte', 'Kevin', 'kevin.labatte0@gmail.com', 'fdhdfdhf', 'etudiant', '2022-06-13 11:49:48'),
(9, 'Labatte', 'Kevin', 'kevin.labatte0@gmail.com', 'vccvbgfc', 'etudiant', '2022-06-13 11:51:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E6660BB6FE6` (`auteur_id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6660BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
