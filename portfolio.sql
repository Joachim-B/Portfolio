-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 mars 2022 à 11:24
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences_projet`
--

CREATE TABLE `competences_projet` (
  `id_outil` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `outil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competences_projet`
--

INSERT INTO `competences_projet` (`id_outil`, `id_projet`, `outil`) VALUES
(3, 1, 'HTML'),
(4, 1, 'CSS'),
(6, 2, 'HTML'),
(7, 2, 'CSS'),
(8, 2, 'Javascript'),
(9, 3, 'HTML'),
(10, 3, 'CSS'),
(11, 3, 'Javascript'),
(12, 1, 'Javascript');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `nom`, `prenom`, `mail`, `message`) VALUES
(10, 'Vraiment quelqu\'un', 'Ca marche ?', 'dedeede@d.f', 'Les apostrophes et guillemets sont pris en compte maintenant, chouette ! \'\"\'\"');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(511) NOT NULL,
  `image` varchar(511) NOT NULL,
  `date` varchar(50) NOT NULL COMMENT 'Forme JJ/MM/AAAA',
  `more_info` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `name`, `description`, `link`, `image`, `date`, `more_info`, `github`) VALUES
(1, 'Bataille navale', 'Bataille navale commencée après 3 jours de cours sur JavaScript. Temps passé dessus : entre 20h et 30h.', 'https://bataille-navale.joachim-b.repl.co', 'bataille_navale.png', '25/01/2022', 'https://github.com/Joachim-B/Bataille-navale#bataille-navale', 'https://github.com/Joachim-B/Bataille-navale'),
(2, 'Mastermind', 'Le but du mastermind est de trouver la combinaison de 4 couleurs générée par l\'ordinateur avec un nombre d\'essais limité.', 'https://mastermind-1.joachim-b.repl.co/', 'mastermind.png', '14/01/2022', 'https://github.com/Joachim-B/Mastermind#mastermind', 'https://github.com/Joachim-B/Mastermind'),
(3, 'Memory', 'Premier jeu réalisé en autodidacte en utilisant JavaScript. Le but du memory est de retrouver les paires de cartes de même couleur et de même valeur.', 'https://memory.joachim-b.repl.co/', 'memory.png', '11/01/2022', 'https://github.com/Joachim-B/Memory#memory', 'https://github.com/Joachim-B/Memory');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences_projet`
--
ALTER TABLE `competences_projet`
  ADD PRIMARY KEY (`id_outil`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences_projet`
--
ALTER TABLE `competences_projet`
  MODIFY `id_outil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
