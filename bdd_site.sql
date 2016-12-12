-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Décembre 2016 à 16:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_administrateur` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `login_administrateur` varchar(255) NOT NULL,
  `password_administrateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_administrateur`),
  UNIQUE KEY `login` (`login_administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE IF NOT EXISTS `appartement` (
  `id_appartement` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_client` int(10) unsigned zerofill DEFAULT NULL,
  `id_immeuble` int(10) unsigned zerofill DEFAULT NULL,
  `surface` int(10) unsigned NOT NULL COMMENT 'Surface de l''appartement',
  `etage` int(10) unsigned NOT NULL COMMENT 'Etage de l''appartement',
  `numero` int(10) unsigned NOT NULL COMMENT 'Numero de l''apartement',
  PRIMARY KEY (`id_appartement`),
  KEY `id_client` (`id_client`),
  KEY `id_immeuble` (`id_immeuble`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE IF NOT EXISTS `capteur` (
  `id_capteur` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `etat` int(10) unsigned NOT NULL COMMENT 'chiffre entre 0(bon) et 3(mauvais)',
  `id_piece` int(10) unsigned zerofill DEFAULT NULL,
  `id_client` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id_capteur`),
  KEY `id_piece` (`id_piece`,`id_client`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone_mobile` int(11) DEFAULT NULL,
  `telephone_fixe` int(11) DEFAULT NULL,
  `login_client` varchar(255) NOT NULL,
  `password_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `login` (`login_client`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telephone_mobile` (`telephone_mobile`),
  UNIQUE KEY `telephone_fixe` (`telephone_fixe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `donnee_capteur`
--

CREATE TABLE IF NOT EXISTS `donnee_capteur` (
  `id_donnee_capteur` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `donnee` text NOT NULL,
  `id_capteur` int(10) unsigned zerofill DEFAULT NULL,
  `id_client` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id_donnee_capteur`),
  KEY `id_capteur` (`id_capteur`,`id_client`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

CREATE TABLE IF NOT EXISTS `immeuble` (
  `id_immeuble` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `code_postal` int(10) unsigned NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse_1` varchar(255) NOT NULL,
  `adresse_2` varchar(255) NOT NULL,
  `id_client` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id_immeuble`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE IF NOT EXISTS `maison` (
  `id_maison` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `code_postal` int(10) unsigned NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse_1` varchar(255) NOT NULL,
  `adresse_2` varchar(255) NOT NULL,
  `id_client` int(10) unsigned zerofill DEFAULT NULL,
  `surface` int(11) NOT NULL COMMENT 'Surface de la maison',
  PRIMARY KEY (`id_maison`),
  KEY `id_client` (`id_client`),
  KEY `id_client_2` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nom_piece` varchar(255) NOT NULL,
  `id_appartement` int(10) unsigned zerofill DEFAULT NULL,
  `id_maison` int(10) unsigned zerofill DEFAULT NULL,
  `id_client` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id_piece`),
  KEY `id_client` (`id_client`,`id_appartement`),
  KEY `id_immeuble` (`id_appartement`),
  KEY `id_maison` (`id_maison`),
  KEY `id_appartement` (`id_appartement`),
  KEY `id_maison_2` (`id_maison`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `service_client`
--

CREATE TABLE IF NOT EXISTS `service_client` (
  `id_service_client` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `login_service_client` varchar(255) NOT NULL,
  `password_service_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_service_client`),
  UNIQUE KEY `login` (`login_service_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD CONSTRAINT `appartement_ibfk_2` FOREIGN KEY (`id_immeuble`) REFERENCES `immeuble` (`id_immeuble`),
  ADD CONSTRAINT `appartement_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id_piece`);

--
-- Contraintes pour la table `donnee_capteur`
--
ALTER TABLE `donnee_capteur`
  ADD CONSTRAINT `donnee_capteur_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `donnee_capteur_ibfk_1` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`id_capteur`);

--
-- Contraintes pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD CONSTRAINT `immeuble_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `maison_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_3` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`),
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `piece_ibfk_2` FOREIGN KEY (`id_appartement`) REFERENCES `appartement` (`id_appartement`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
