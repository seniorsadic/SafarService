-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 06 Janvier 2018 à 12:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `safar`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE IF NOT EXISTS `agence` (
  `idAgence` int(11) NOT NULL AUTO_INCREMENT,
  `idVille` int(11) DEFAULT NULL,
  `designation` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idAgence`),
  KEY `FK_Association_8` (`idVille`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `agence`
--

INSERT INTO `agence` (`idAgence`, `idVille`, `designation`) VALUES
(1, 1, 'Safar Dakar'),
(2, 2, 'Safar Touba'),
(3, 1, 'agence Thiaroye');

-- --------------------------------------------------------

--
-- Structure de la table `agenceota`
--

CREATE TABLE IF NOT EXISTS `agenceota` (
  `idAgenceOta` int(11) NOT NULL AUTO_INCREMENT,
  `idOperateur` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  PRIMARY KEY (`idAgenceOta`),
  KEY `FK_Association_1` (`idAgence`),
  KEY `FK_Association_20` (`idOperateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `agenceota`
--

INSERT INTO `agenceota` (`idAgenceOta`, `idOperateur`, `idAgence`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `designation`) VALUES
(2, 'Electronique'),
(3, 'Menuiserie'),
(4, 'Sports');

-- --------------------------------------------------------

--
-- Structure de la table `detailvente`
--

CREATE TABLE IF NOT EXISTS `detailvente` (
  `idDetailVente` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(11) NOT NULL,
  `idVente` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prixUnitaire` decimal(10,0) DEFAULT NULL,
  `remise` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idDetailVente`),
  KEY `FK_DetailVente` (`idProduit`),
  KEY `FK_DetailVente1` (`idVente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `detailvente`
--

INSERT INTO `detailvente` (`idDetailVente`, `idProduit`, `idVente`, `quantite`, `prixUnitaire`, `remise`) VALUES
(1, 1, 1, 2, '15000', '0'),
(2, 2, 1, 2, '15000', '0'),
(3, 1, 2, 2, '150000', '0'),
(4, 2, 3, 1, '65000', '0'),
(5, 4, 4, 1, '15000', '0'),
(6, 1, 4, 2, '150000', '0');

-- --------------------------------------------------------

--
-- Structure de la table `guichet`
--

CREATE TABLE IF NOT EXISTS `guichet` (
  `idGuichet` int(11) NOT NULL AUTO_INCREMENT,
  `idAgence` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`idGuichet`),
  KEY `FK_Association_9` (`idAgence`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `guichet`
--

INSERT INTO `guichet` (`idGuichet`, `idAgence`, `numero`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `idOperation` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `service` varchar(254) DEFAULT NULL,
  `reference` varchar(254) DEFAULT NULL,
  `statut` varchar(254) DEFAULT NULL,
  `montant` decimal(8,0) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idOperation`),
  KEY `FK_Association_11` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `operation`
--

INSERT INTO `operation` (`idOperation`, `idUser`, `service`, `reference`, `statut`, `montant`, `date`) VALUES
(1, 1, 'Vente', 'VENTE0001', 'Payé', NULL, '2017-11-25 00:00:00'),
(2, 1, 'Vente', 'VENTE002', 'Payé', '330000', '2017-12-08 00:00:00'),
(3, 1, 'Vente', 'VENTE002', 'Payé', '145000', '2017-12-08 00:00:00'),
(4, 1, 'Vente', 'VENTE002', 'Payé', '380000', '2017-12-08 00:00:00'),
(15, 1, 'Cash Out', 'CO170817.1035.A03589', 'Echec', '15000', '2018-01-05 00:00:00'),
(16, 1, 'Cash Out', 'CO170817.1036.A03678', 'Echec', '14000', '2018-01-05 00:00:00'),
(17, 1, 'Cash Out', 'CO170817.1029.A02897', 'Echec', '4500', '2018-01-05 00:00:00'),
(18, 1, 'Cash Out For Non Register', 'CN170817.1113.B51547', 'Echec', '2000', '2018-01-05 00:00:00'),
(19, 1, 'Cash Out', 'CO170817.1122.A08309', 'Echec', '2400', '2018-01-05 00:00:00'),
(20, 1, 'Cash in', 'CI170817.1632.B43417', 'Echec', '63000', '2018-01-05 00:00:00'),
(21, 1, 'Cash Out', 'CO170817.1805.A43100', 'Succès', '5000', '2018-01-05 00:00:00'),
(22, 1, 'Cash in', 'CI170817.0832.A15287', 'Succès', '5350', '2018-01-05 00:00:00'),
(23, 1, 'Cash in', 'CI170817.0837.B13245', 'Succès', '48000', '2018-01-05 00:00:00'),
(24, 1, 'Cash Out For Non Register', 'CN170817.0848.B50750', 'Succès', '10000', '2018-01-05 00:00:00'),
(25, 1, 'Cash in', 'CI170817.0853.B13583', 'Succès', '2500', '2018-01-05 00:00:00'),
(26, 1, 'Cash Out', 'CO170817.0852.B00896', 'Succès', '5000', '2018-01-05 00:00:00'),
(27, 1, 'Cash Out', 'CO170817.0906.A96714', 'Succès', '2500', '2018-01-05 00:00:00'),
(28, 1, 'C2C Transfer', 'PP170817.0922.B47585', 'Succès', '100000', '2018-01-05 00:00:00'),
(29, 1, 'Cash in', 'CI170817.0923.A16688', 'Succès', '113500', '2018-01-05 00:00:00'),
(31, 1, 'Cash Out', 'CO170817.1035.A03589', 'Echec', '15000', '2018-01-04 00:00:00'),
(32, 1, 'Cash Out', 'CO170817.1036.A03678', 'Echec', '14000', '2018-01-04 00:00:00'),
(33, 1, 'Cash Out', 'CO170817.1029.A02897', 'Echec', '4500', '2018-01-04 00:00:00'),
(34, 1, 'Cash Out For Non Register', 'CN170817.1113.B51547', 'Echec', '4500', '2018-01-04 00:00:00'),
(35, 1, 'Cash Out', 'CO170817.1122.A08309', 'Echec', '2400', '2018-01-04 00:00:00'),
(36, 1, 'Cash in', 'CI170817.1632.B43417', 'Echec', '63000', '2018-01-04 00:00:00'),
(37, 1, 'Cash Out', 'CO170817.1805.A43100', 'Succès', '5000', '2018-01-04 00:00:00'),
(38, 1, 'Cash in', 'CI170817.0832.A15287', 'Succès', '5350', '2018-01-04 00:00:00'),
(39, 1, 'Cash in', 'CI170817.0837.B13245', 'Succès', '48000', '2018-01-04 00:00:00'),
(40, 1, 'Cash Out For Non Register', 'CN170817.0848.B50750', 'Succès', '10000', '2018-01-04 00:00:00'),
(41, 1, 'Cash in', 'CI170817.0853.B13583', 'Succès', '2500', '2018-01-04 00:00:00'),
(42, 1, 'Cash Out', 'CO170817.0852.B00896', 'Succès', '5000', '2018-01-04 00:00:00'),
(43, 1, 'Cash Out', 'CO170817.0906.A96714', 'Succès', '2500', '2018-01-04 00:00:00'),
(44, 1, 'C2C Transfer', 'PP170817.0922.B47585', 'Succès', '100000', '2018-01-04 00:00:00'),
(45, 1, 'Cash in', 'CI170817.0923.A16688', 'Succès', '113500', '2018-01-04 00:00:00'),
(46, 1, 'OP', 'FR135861766', 'Paid', '15000', '2018-01-05 00:00:00'),
(47, 1, 'OP', 'IT133121766', 'Paid', '62510', '2018-01-05 00:00:00'),
(48, 1, 'OP', 'FR134578366', 'Paid', '25000', '2018-01-05 00:00:00'),
(49, 1, 'OP', 'US903377382', 'Paid', '416585', '2018-01-05 00:00:00'),
(50, 1, 'OP', 'IT132068366', 'Paid', '23680', '2018-01-05 00:00:00'),
(51, 1, 'OP', 'FR135861766', 'Paid', '15000', '2018-01-04 00:00:00'),
(52, 1, 'OP', 'IT133121766', 'Paid', '62510', '2018-01-04 00:00:00'),
(53, 1, 'OP', 'FR134578366', 'Paid', '25000', '2018-01-04 00:00:00'),
(54, 1, 'OP', 'US903377382', 'Paid', '416585', '2018-01-04 00:00:00'),
(55, 1, 'OP', 'IT132068366', 'Paid', '23680', '2018-01-04 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `operationclassic`
--

CREATE TABLE IF NOT EXISTS `operationclassic` (
  `idOperationClassic` int(11) NOT NULL AUTO_INCREMENT,
  `idOperation` int(11) NOT NULL,
  `idTypeOperation` int(11) DEFAULT NULL,
  `idOperateur` int(11) NOT NULL,
  `commission` decimal(8,3) DEFAULT NULL,
  `correspondant` varchar(254) DEFAULT NULL,
  `position` varchar(254) DEFAULT NULL,
  `paysEnvoi` varchar(254) DEFAULT NULL,
  `paysBeneficiaire` varchar(254) DEFAULT NULL,
  `deviseEnvoi` varchar(254) DEFAULT NULL,
  `deviseReception` varchar(254) DEFAULT NULL,
  `pin` varchar(254) DEFAULT NULL,
  `rate` decimal(8,0) DEFAULT NULL,
  `action` varchar(254) DEFAULT NULL,
  `paiement` varchar(254) DEFAULT NULL,
  `mode` varchar(254) DEFAULT NULL,
  `pseudo` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOperationClassic`),
  KEY `FK_Association_14` (`idTypeOperation`),
  KEY `FK_Association_6` (`idOperateur`),
  KEY `FK_Generalisation_3` (`idOperation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `operationclassic`
--

INSERT INTO `operationclassic` (`idOperationClassic`, `idOperation`, `idTypeOperation`, `idOperateur`, `commission`, `correspondant`, `position`, `paysEnvoi`, `paysBeneficiaire`, `deviseEnvoi`, `deviseReception`, `pin`, `rate`, `action`, `paiement`, `mode`, `pseudo`) VALUES
(1, 15, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 16, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 17, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 18, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 19, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 20, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 21, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 22, NULL, 3, '100.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 23, NULL, 3, '340.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 24, NULL, 3, '200.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 25, NULL, 3, '36.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 26, NULL, 3, '140.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 27, NULL, 3, '59.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 28, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 29, NULL, 3, '700.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 31, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 32, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 33, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 34, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 35, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 36, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 37, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 38, NULL, 3, '100.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 39, NULL, 3, '340.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 40, NULL, 3, '200.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 41, NULL, 3, '36.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 42, NULL, 3, '140.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 43, NULL, 3, '59.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 44, NULL, 3, '0.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 45, NULL, 3, '700.000', '771889387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 46, NULL, 4, '0.000', 'asdiouf', NULL, 'France', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL),
(32, 47, NULL, 4, '0.000', 'asdiouf', NULL, 'Italy', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL),
(33, 48, NULL, 4, '0.000', 'asdiouf', NULL, 'France', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL),
(34, 49, NULL, 4, '0.000', 'asdiouf', NULL, 'United States', 'Senegal', 'XOF', 'XOF', NULL, '557', NULL, NULL, NULL, NULL),
(35, 50, NULL, 4, '0.000', 'asdiouf', NULL, 'Italy', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL),
(36, 51, NULL, 4, '0.000', 'asdiouf', NULL, 'France', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL),
(37, 52, NULL, 4, '0.000', 'asdiouf', NULL, 'Italy', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL),
(38, 53, NULL, 4, '0.000', 'asdiouf', NULL, 'France', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL),
(39, 54, NULL, 4, '0.000', 'asdiouf', NULL, 'United States', 'Senegal', 'XOF', 'XOF', NULL, '557', NULL, NULL, NULL, NULL),
(40, 55, NULL, 4, '0.000', 'asdiouf', NULL, 'Italy', 'Senegal', 'XOF', 'XOF', NULL, '655', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ota`
--

CREATE TABLE IF NOT EXISTS `ota` (
  `idOperateur` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(254) DEFAULT NULL,
  `code` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOperateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ota`
--

INSERT INTO `ota` (`idOperateur`, `designation`, `code`) VALUES
(1, 'Wari', 'WARI001'),
(2, 'Joni Joni', 'JONI001'),
(3, 'Orange Money', 'ORANGE001'),
(4, 'Rapid Transfert', 'RAPID001');

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `idPrivilege` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idPrivilege`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `idAgence` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `designation` varchar(254) DEFAULT NULL,
  `quantite` varchar(254) DEFAULT NULL,
  `prix` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `FK_Association_3` (`idCategorie`),
  KEY `FK_Association_5` (`idAgence`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `idAgence`, `idCategorie`, `designation`, `quantite`, `prix`) VALUES
(1, 1, 2, 'Ordinateur', '29', '150000'),
(2, 1, 2, 'Portable Nokia', '12', '65000'),
(3, 2, 2, 'Portable Nokia', '15', '65000'),
(4, 1, 4, 'Chausures', '9', '15000');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `roleprivilege`
--

CREATE TABLE IF NOT EXISTS `roleprivilege` (
  `idPrivilegeRole` int(11) NOT NULL AUTO_INCREMENT,
  `idPrivilege` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idPrivilegeRole`),
  KEY `FK_Association_13` (`idPrivilege`),
  KEY `FK_Association_123` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `roleutilisateur`
--

CREATE TABLE IF NOT EXISTS `roleutilisateur` (
  `idRoleUser` int(11) NOT NULL AUTO_INCREMENT,
  `idRole` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idRoleUser`),
  KEY `FK_Association_12` (`idRole`),
  KEY `FK_Association_112` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `typeoperation`
--

CREATE TABLE IF NOT EXISTS `typeoperation` (
  `idTypeOperation` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idTypeOperation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idAgence` int(11) NOT NULL,
  `numero` varchar(254) DEFAULT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenoms` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `FK_Association_2` (`idAgence`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `idAgence`, `numero`, `nom`, `prenoms`) VALUES
(1, 1, 'USER001', 'Hann', 'Mbaye'),
(2, 1, 'USER002', 'Kane', 'Mody');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `idVente` int(11) NOT NULL AUTO_INCREMENT,
  `idOperation` int(11) NOT NULL,
  PRIMARY KEY (`idVente`),
  KEY `FK_Generalisation_2` (`idOperation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `vente`
--

INSERT INTO `vente` (`idVente`, `idOperation`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`idVille`, `designation`) VALUES
(1, 'Dakar'),
(2, 'Touba'),
(3, 'Ziguinchor');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `FK_Association_8` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `agenceota`
--
ALTER TABLE `agenceota`
  ADD CONSTRAINT `FK_Association_1` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`idAgence`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Association_20` FOREIGN KEY (`idOperateur`) REFERENCES `ota` (`idOperateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detailvente`
--
ALTER TABLE `detailvente`
  ADD CONSTRAINT `FK_DetailVente` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DetailVente1` FOREIGN KEY (`idVente`) REFERENCES `vente` (`idVente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `guichet`
--
ALTER TABLE `guichet`
  ADD CONSTRAINT `FK_Association_9` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`idAgence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `FK_Association_11` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `operationclassic`
--
ALTER TABLE `operationclassic`
  ADD CONSTRAINT `FK_Association_14` FOREIGN KEY (`idTypeOperation`) REFERENCES `typeoperation` (`idTypeOperation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Association_6` FOREIGN KEY (`idOperateur`) REFERENCES `ota` (`idOperateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Generalisation_3` FOREIGN KEY (`idOperation`) REFERENCES `operation` (`idOperation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_Association_3` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Association_5` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`idAgence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `roleprivilege`
--
ALTER TABLE `roleprivilege`
  ADD CONSTRAINT `FK_Association_123` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Association_13` FOREIGN KEY (`idPrivilege`) REFERENCES `privilege` (`idPrivilege`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `roleutilisateur`
--
ALTER TABLE `roleutilisateur`
  ADD CONSTRAINT `FK_Association_112` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Association_12` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_Association_2` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`idAgence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `FK_Generalisation_2` FOREIGN KEY (`idOperation`) REFERENCES `operation` (`idOperation`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
