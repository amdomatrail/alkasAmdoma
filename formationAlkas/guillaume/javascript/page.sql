-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 06 jan. 2023 à 13:59
-- Version du serveur : 5.7.19
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alkas2023`
--

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  `menu` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `slug`, `titre`, `description`, `date_creation`, `date_modification`, `menu`, `content`) VALUES
(1, 'ma-page-de-test', 'ma page de test', 'rien à signalerrrrrr\r\n', '2023-01-05 11:06:53', '2023-01-05 11:06:53', 'test', 'ma page de test\r\nson contenu'),
(2, 'super_slug', 'Super Slug', 'info sur les slugs', '2023-01-05 12:32:50', '2023-01-05 12:32:50', 'slug', 'C\'est quoi un slug'),
(6, 'nouvelle-page', 'nouvelle page', 'de test', '2023-01-05 15:14:51', '0000-00-00 00:00:00', 'new', 'RAS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
