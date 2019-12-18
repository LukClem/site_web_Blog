-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 18 déc. 2019 à 14:28
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monblogs`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `publie` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `texte`, `date`, `publie`) VALUES
(1, 'Titre', 'Ceci est un texte', '2019-11-19', 1),
(2, 'titreddsfsd', 'textedfdf', '2019-11-06', 1),
(4, 'titre', 'texte', '2019-11-19', 1),
(6, 'erezrze', 'ezrze', '2019-10-15', 1),
(8, 'sdqsdqs', 'qsfsdfsd', '2019-10-15', 1),
(39, 'TITRE1', 'texte1', '2019-11-19', 1),
(46, 'Ceciestuntitre2', 'dssfdsfsd', '2019-11-06', 1),
(50, '656464654654', '64654654654', '2019-11-06', 1),
(59, '7', '7', '2019-11-19', 1),
(62, '99', '99', '2019-11-19', 1),
(63, 'dfdss', 'dgfgg', '2019-11-19', 1),
(64, 'ezfeez', 'fezezfze', '2019-11-19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_article`, `pseudo`, `email`, `message`) VALUES
(1, 1, 'test', 'test@gmail.com', 'Ceci est un message de test'),
(2, 1, 'test2', 'test2@gmail.com', 'Ceci est un message de test'),
(3, 2, 'pseudo', 'pseudo@gmail.com', 'message'),
(4, 4, 'pseudo1', 'email@gmail.com', 'message'),
(5, 6, 'pseudo2', 'email@gmail.com', 'message'),
(6, 8, 'pseudo', 'email@gmail.com', 'message'),
(7, 39, 'pseudo', 'email@gmail.com', 'message'),
(8, 46, 'pseudo', 'email@gmail.com', 'message'),
(9, 50, 'pseudo', 'email@gmail.com', 'message'),
(11, 59, 'pseudo', 'email@gmail.com', 'message'),
(13, 62, 'pseudo', 'email@gmail.com', 'message'),
(14, 63, 'pseudo', 'email@gmail.com', 'message'),
(15, 64, 'pseudo', 'email@gmail.com', 'message'),
(28, 1, 'pseudo', 'admin@gmail.com', 'Message'),
(32, 2, 'pseudo2', 'admin@gmail.com', 'message');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `mdp` text CHARACTER SET utf8 NOT NULL,
  `sid` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mdp`, `sid`) VALUES
(3, 'clement', 'lucas', 'admin@gmail.com', 'pass', '405a8eb29dd13a59a8b2b091e1e8ce6b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `contrainte1` (`id_article`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `contrainte1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
