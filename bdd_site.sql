-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Janvier 2017 à 21:20
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_administrateur` int(10) UNSIGNED ZEROFILL NOT NULL,
  `login_administrateur` varchar(255) NOT NULL,
  `password_administrateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `login_administrateur`, `password_administrateur`) VALUES
(0000000001, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE `appartement` (
  `id_appartement` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_client` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_immeuble` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `surface` int(10) UNSIGNED NOT NULL COMMENT 'Surface de l''appartement',
  `etage` int(10) UNSIGNED NOT NULL COMMENT 'Etage de l''appartement',
  `numero` int(10) UNSIGNED NOT NULL COMMENT 'Numero de l''apartement'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartement`
--

INSERT INTO `appartement` (`id_appartement`, `id_client`, `id_immeuble`, `surface`, `etage`, `numero`) VALUES
(0000000001, 0000000001, 0000000001, 30, 2, 24);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id_capteur` int(10) UNSIGNED ZEROFILL NOT NULL,
  `type` varchar(255) NOT NULL,
  `numero_serie_capteur` varchar(20) NOT NULL,
  `numero_capteur` int(10) UNSIGNED ZEROFILL NOT NULL,
  `etat` int(10) UNSIGNED NOT NULL COMMENT 'chiffre entre 0(bon) et 3(mauvais)',
  `id_piece` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_client` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `capteur`
--

INSERT INTO `capteur` (`id_capteur`, `type`, `numero_serie_capteur`, `numero_capteur`, `etat`, `id_piece`, `id_client`) VALUES
(0000000001, 'Temperature', 'T0000000001', 0000000001, 0, NULL, 0000000001);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

CREATE TABLE `cemac` (
  `numero_serie_ceMAC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone_mobile` int(11) DEFAULT NULL,
  `telephone_fixe` int(11) DEFAULT NULL,
  `numero_serie_ceMAC` varchar(20) NOT NULL,
  `password_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `date_de_naissance`, `email`, `telephone_mobile`, `telephone_fixe`, `numero_serie_ceMAC`, `password_client`) VALUES
(0000000001, 'LE BAIL', 'louis', '1996-10-31', 'louis@gmail.com', 629440180, 629440180, '', 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c'),
(0000000002, NULL, NULL, NULL, 'jean@gmail.com', NULL, NULL, '', '51f8b1fa9b424745378826727452997ee2a7c3d7');

-- --------------------------------------------------------

--
-- Structure de la table `donnee_capteur`
--

CREATE TABLE `donnee_capteur` (
  `id_donnee_capteur` int(10) UNSIGNED ZEROFILL NOT NULL,
  `date` datetime NOT NULL,
  `trame` text NOT NULL,
  `id_capteur` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_client` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

CREATE TABLE `immeuble` (
  `id_immeuble` int(10) UNSIGNED ZEROFILL NOT NULL,
  `code_postal` int(10) UNSIGNED NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse_1` varchar(255) NOT NULL,
  `adresse_2` varchar(255) NOT NULL,
  `id_client` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `immeuble`
--

INSERT INTO `immeuble` (`id_immeuble`, `code_postal`, `ville`, `adresse_1`, `adresse_2`, `id_client`) VALUES
(0000000001, 94100, 'St Maur', '18 bis av rene david', '', 0000000001);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(10) UNSIGNED ZEROFILL NOT NULL,
  `code_postal` int(10) UNSIGNED NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse_1` varchar(255) NOT NULL,
  `adresse_2` varchar(255) NOT NULL,
  `id_client` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `surface` int(11) NOT NULL COMMENT 'Surface de la maison'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `maison`
--

INSERT INTO `maison` (`id_maison`, `code_postal`, `ville`, `adresse_1`, `adresse_2`, `id_client`, `surface`) VALUES
(0000000001, 94100, 'St Maur', '18bis av rene david', '', 0000000001, 150),
(0000000002, 94100, 'St maur', '18bis av rene david', '', 0000000001, 150);

-- --------------------------------------------------------

--
-- Structure de la table `numero_serie_capteur`
--

CREATE TABLE `numero_serie_capteur` (
  `numero_serie_capteur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `numero_serie_capteur`
--

INSERT INTO `numero_serie_capteur` (`numero_serie_capteur`) VALUES
('F0000000001'),
('F0000000002'),
('F0000000003'),
('F0000000004'),
('I0000000001'),
('I0000000002'),
('I0000000003'),
('I0000000004'),
('L0000000001'),
('L0000000002'),
('L0000000003'),
('L0000000004'),
('T0000000001'),
('T0000000002'),
('T0000000003'),
('T0000000004');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nom_piece` varchar(255) NOT NULL,
  `id_appartement` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_maison` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_client` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `nom_piece`, `id_appartement`, `id_maison`, `id_client`) VALUES
(0000000001, 'Cuisine', 0000000001, 0000000001, 0000000001),
(0000000002, 'Salon', 0000000001, 0000000001, 0000000001);

-- --------------------------------------------------------

--
-- Structure de la table `service_client`
--

CREATE TABLE `service_client` (
  `id_service_client` int(10) UNSIGNED ZEROFILL NOT NULL,
  `login_service_client` varchar(255) NOT NULL,
  `password_service_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`),
  ADD UNIQUE KEY `login` (`login_administrateur`);

--
-- Index pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD PRIMARY KEY (`id_appartement`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_immeuble` (`id_immeuble`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id_capteur`),
  ADD KEY `id_piece` (`id_piece`,`id_client`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `numero_serie_capteur` (`numero_serie_capteur`);

--
-- Index pour la table `cemac`
--
ALTER TABLE `cemac`
  ADD PRIMARY KEY (`numero_serie_ceMAC`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telephone_mobile` (`telephone_mobile`),
  ADD UNIQUE KEY `telephone_fixe` (`telephone_fixe`),
  ADD KEY `numero_serie_ceMAC` (`numero_serie_ceMAC`),
  ADD KEY `numero_serie_ceMAC_2` (`numero_serie_ceMAC`);

--
-- Index pour la table `donnee_capteur`
--
ALTER TABLE `donnee_capteur`
  ADD PRIMARY KEY (`id_donnee_capteur`),
  ADD KEY `id_capteur` (`id_capteur`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD PRIMARY KEY (`id_immeuble`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_maison`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_client_2` (`id_client`);

--
-- Index pour la table `numero_serie_capteur`
--
ALTER TABLE `numero_serie_capteur`
  ADD PRIMARY KEY (`numero_serie_capteur`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `id_client` (`id_client`,`id_appartement`),
  ADD KEY `id_immeuble` (`id_appartement`),
  ADD KEY `id_maison` (`id_maison`),
  ADD KEY `id_appartement` (`id_appartement`),
  ADD KEY `id_maison_2` (`id_maison`);

--
-- Index pour la table `service_client`
--
ALTER TABLE `service_client`
  ADD PRIMARY KEY (`id_service_client`),
  ADD UNIQUE KEY `login` (`login_service_client`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_administrateur` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `appartement`
--
ALTER TABLE `appartement`
  MODIFY `id_appartement` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_capteur` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `donnee_capteur`
--
ALTER TABLE `donnee_capteur`
  MODIFY `id_donnee_capteur` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `immeuble`
--
ALTER TABLE `immeuble`
  MODIFY `id_immeuble` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `service_client`
--
ALTER TABLE `service_client`
  MODIFY `id_service_client` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD CONSTRAINT `appartement_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `appartement_ibfk_2` FOREIGN KEY (`id_immeuble`) REFERENCES `immeuble` (`id_immeuble`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id_piece`),
  ADD CONSTRAINT `capteur_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `capteur_ibfk_3` FOREIGN KEY (`numero_serie_capteur`) REFERENCES `numero_serie_capteur` (`numero_serie_capteur`);

--
-- Contraintes pour la table `donnee_capteur`
--
ALTER TABLE `donnee_capteur`
  ADD CONSTRAINT `donnee_capteur_ibfk_1` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`id_capteur`),
  ADD CONSTRAINT `donnee_capteur_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

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
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `piece_ibfk_2` FOREIGN KEY (`id_appartement`) REFERENCES `appartement` (`id_appartement`),
  ADD CONSTRAINT `piece_ibfk_3` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
