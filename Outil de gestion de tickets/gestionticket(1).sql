-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 23 avr. 2022 à 13:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id_t` int(11) NOT NULL AUTO_INCREMENT,
  `nom_t` varchar(255) NOT NULL,
  `etat` varchar(13) NOT NULL,
  `date_ajout` datetime NOT NULL,
  PRIMARY KEY (`id_t`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id_t`, `nom_t`, `etat`, `date_ajout`) VALUES
(1, 'mise à jour des pc sous windows 7', 'terminer', '2022-01-11 21:50:47'),
(2, 'Ajout de nouveau utilisateur à la base de donnée', 'en cours', '2022-01-11 21:50:47'),
(4, 'supprimer les cookies.', 'en attente', '2022-01-12 14:07:01'),
(5, 'installer ADblock sur tous les pc portables.', 'en cours', '2022-01-12 14:07:01'),
(6, 'Achat nouveaux matériaux Informatiques', 'en attente', '2022-01-13 11:28:00'),
(7, 'Installation des matériaux informatiques', 'terminer', '2022-01-13 11:28:00'),
(8, 'mise à jour des logiciels ', 'en attente', '2022-01-13 11:31:44'),
(9, 'nettoyage des unitées centrale', 'en cours', '2022-01-13 11:31:44');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `nom`, `prenom`, `login`, `mdp`) VALUES
(1, 'Mouse', 'Mickey', 'M.mickey', 'mdp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
