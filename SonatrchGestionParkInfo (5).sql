-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2024 at 12:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SonatrchGestionParkInfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `BonLivraison`
--

CREATE TABLE `BonLivraison` (
  `CodeBL` int(11) NOT NULL,
  `Date` date NOT NULL,
  `CodeCommande` varchar(8) NOT NULL,
  `CodeFacteur` int(11) NOT NULL,
  `codeetat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BonLivraison`
--

INSERT INTO `BonLivraison` (`CodeBL`, `Date`, `CodeCommande`, `CodeFacteur`, `codeetat`) VALUES
(333224, '2024-04-27', '2024/002', 1234, 1),
(22121333, '2024-04-26', '2024/002', 1234, 2),
(23143113, '2024-05-17', '2024/001', 1234, 2),
(123432423, '2024-05-04', '2024/001', 1234, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bonlivraison_v`
-- (See below for the actual view)
--
CREATE TABLE `bonlivraison_v` (
`CodeBL` int(11)
,`Date` date
,`CodeCommande` varchar(8)
,`CodeFacteur` int(11)
,`Designation` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `Caracteristiques`
--

CREATE TABLE `Caracteristiques` (
  `CodeCar` int(11) NOT NULL,
  `Designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Caracteristiques`
--

INSERT INTO `Caracteristiques` (`CodeCar`, `Designation`) VALUES
(1, 'RAM 16'),
(2, 'RAM 8'),
(3, 'Processur Intel i5'),
(4, 'Processur Intel i7'),
(5, 'SSD 256'),
(7, 'RAM: 32 GB DDR4'),
(8, 'Screen Size: 15.6 inches'),
(10, 'Processor: AMD Ryzen 9 5900X'),
(11, 'Screen Size: 27 inches'),
(12, 'Graphics Card: NVIDIA GeForce '),
(13, 'Resolution: 5120 x 2880 (5K)'),
(14, 'Printer Type: Laser Printer'),
(15, 'Print Speed: 30 pages per min');

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
--

CREATE TABLE `Commande` (
  `CodeCom` varchar(8) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `CodeFournisseur` int(11) NOT NULL,
  `CodeCommandeType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Commande`
--

INSERT INTO `Commande` (`CodeCom`, `Date`, `CodeFournisseur`, `CodeCommandeType`) VALUES
('2024/001', '2024-04-27', 7, 1),
('2024/002', '2024-05-18', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Commander`
--

CREATE TABLE `Commander` (
  `CodeCommande` varchar(8) NOT NULL,
  `CodeType` int(11) NOT NULL,
  `CodeMrq` int(11) NOT NULL,
  `Qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Commander`
--

INSERT INTO `Commander` (`CodeCommande`, `CodeType`, `CodeMrq`, `Qty`) VALUES
('2024/002', 1, 9, 90),
('2024/001', 4, 2, 10),
('2024/001', 4, 7, 10),
('2024/002', 13, 7, 78),
('2024/002', 13, 11, 100),
('2024/002', 14, 1, 89);

-- --------------------------------------------------------

--
-- Stand-in structure for view `commander_view`
-- (See below for the actual view)
--
CREATE TABLE `commander_view` (
`CodeCommande` varchar(8)
,`MatreilType` varchar(30)
,`MatreilMarque` varchar(30)
,`QTY` int(3)
);

-- --------------------------------------------------------

--
-- Table structure for table `CommandeType`
--

CREATE TABLE `CommandeType` (
  `CodeType` int(11) NOT NULL,
  `Designation` enum('Simple','Prevision') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CommandeType`
--

INSERT INTO `CommandeType` (`CodeType`, `Designation`) VALUES
(1, 'Simple'),
(2, 'Prevision');

-- --------------------------------------------------------

--
-- Stand-in structure for view `commnade`
-- (See below for the actual view)
--
CREATE TABLE `commnade` (
`CodeCom` varchar(8)
,`date` date
,`TypeCom` enum('Simple','Prevision')
,`fourNom` varchar(20)
,`fourPrenom` varchar(20)
,`fourEmail` varchar(100)
,`fourTel` varchar(21)
,`fourAddress` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `Decharge`
--

CREATE TABLE `Decharge` (
  `CodeDech` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Type` enum('Retour','Decharge') NOT NULL,
  `CodeUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Decharge`
--

INSERT INTO `Decharge` (`CodeDech`, `Date`, `Type`, `CodeUtilisateur`) VALUES
(28, '2024-04-27 14:07:22', 'Decharge', 3),
(29, '2024-05-01 21:22:52', 'Decharge', 3),
(30, '2024-05-18 11:05:46', 'Decharge', 10),
(31, '2024-05-18 11:07:04', 'Retour', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `decharge_v`
-- (See below for the actual view)
--
CREATE TABLE `decharge_v` (
`CodeDech` int(11)
,`Date` datetime
,`Dechtype` enum('Retour','Decharge')
,`CodeUtilisateur` int(11)
,`utNom` varchar(20)
,`utPrenom` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `etatBonLivraison`
--

CREATE TABLE `etatBonLivraison` (
  `CodeEtat` int(11) NOT NULL,
  `Designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etatBonLivraison`
--

INSERT INTO `etatBonLivraison` (`CodeEtat`, `Designation`) VALUES
(1, 'En Attend'),
(2, 'Livré'),
(3, 'Rejeté');

-- --------------------------------------------------------

--
-- Table structure for table `etatReparation`
--

CREATE TABLE `etatReparation` (
  `CodeEtat` int(11) NOT NULL,
  `Designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etatReparation`
--

INSERT INTO `etatReparation` (`CodeEtat`, `Designation`) VALUES
(1, 'En réparation'),
(2, 'Reparé'),
(3, 'Réparation échec');

-- --------------------------------------------------------

--
-- Table structure for table `Facture`
--

CREATE TABLE `Facture` (
  `CodeFact` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Facture`
--

INSERT INTO `Facture` (`CodeFact`, `Date`) VALUES
(1234, '2024-04-12'),
(131093, '2024-05-18'),
(2345566, '2024-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `Fournisseur`
--

CREATE TABLE `Fournisseur` (
  `CodeFour` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tel` varchar(21) NOT NULL,
  `Address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Fournisseur`
--

INSERT INTO `Fournisseur` (`CodeFour`, `Nom`, `Prenom`, `Email`, `Tel`, `Address`) VALUES
(7, 'Mohamed', 'Mebaki', 'MohamedMebaki@gmail.com', '0000000000', 'Oran '),
(10, 'Mohamed', 'Berkouk', 'MohamedBerkouk@gmail.com', '000000000', 'Alger'),
(11, 'Salhi', 'Hichem', 'SalhiHichem@gmail.com', '000000000', 'Alger'),
(12, 'moumen', 'Abdou', 'AbdouMoumen@gmail.com', '000000000', 'Alger'),
(13, 'faiçel', 'bentaleb', 'faicelbentaleb@gamil.com', '000000000', 'Alger');

-- --------------------------------------------------------

--
-- Table structure for table `Inventaire`
--

CREATE TABLE `Inventaire` (
  `CodeInv` int(11) NOT NULL,
  `DateDebut` datetime NOT NULL,
  `DateFin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Inventaire`
--

INSERT INTO `Inventaire` (`CodeInv`, `DateDebut`, `DateFin`) VALUES
(22, '2024-05-13 11:08:00', '2024-05-18 11:08:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `mareilcaractview`
-- (See below for the actual view)
--
CREATE TABLE `mareilcaractview` (
`SSH` int(11)
,`CodeCar` int(11)
,`Designation` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `Marque`
--

CREATE TABLE `Marque` (
  `CodeMrq` int(11) NOT NULL,
  `Designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Marque`
--

INSERT INTO `Marque` (`CodeMrq`, `Designation`) VALUES
(1, 'Apple'),
(2, 'HP'),
(7, 'Dell'),
(9, 'Intel'),
(10, 'AMD'),
(11, 'Nvidia'),
(12, 'Samsung'),
(13, 'Asus'),
(14, 'Lenovo'),
(15, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `Matreil`
--

CREATE TABLE `Matreil` (
  `SSH` int(11) NOT NULL,
  `Prix` decimal(7,2) NOT NULL,
  `DateGarantie` date NOT NULL,
  `DateRec` date NOT NULL,
  `DurreeVie` int(2) DEFAULT NULL,
  `CodeMarque` int(11) NOT NULL,
  `CodeType` int(11) NOT NULL,
  `CodeRef` int(11) DEFAULT NULL,
  `CodeBL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Matreil`
--

INSERT INTO `Matreil` (`SSH`, `Prix`, `DateGarantie`, `DateRec`, `DurreeVie`, `CodeMarque`, `CodeType`, `CodeRef`, `CodeBL`) VALUES
(2, 1000.00, '2024-05-03', '2024-05-01', 3, 1, 1, 18, 123432423),
(3, 2000.00, '2024-05-31', '2024-05-01', 3, 2, 4, NULL, 123432423),
(12312, 25000.00, '2024-04-27', '2024-04-27', 3, 7, 4, 17, 123432423),
(1282319, 20000.00, '2024-05-18', '2024-05-18', 3, 9, 1, NULL, 22121333),
(2112112, 90000.00, '2024-05-18', '2024-05-18', 3, 11, 13, NULL, 22121333),
(21312321, 50000.00, '2024-05-18', '2024-05-18', 3, 7, 4, NULL, 23143113);

-- --------------------------------------------------------

--
-- Table structure for table `MatreilADecharge`
--

CREATE TABLE `MatreilADecharge` (
  `CodeDech` int(11) NOT NULL,
  `SSH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MatreilADecharge`
--

INSERT INTO `MatreilADecharge` (`CodeDech`, `SSH`) VALUES
(28, 12312),
(29, 2),
(30, 1282319),
(30, 2112112),
(31, 1282319);

-- --------------------------------------------------------

--
-- Stand-in structure for view `matreiladecharge_v`
-- (See below for the actual view)
--
CREATE TABLE `matreiladecharge_v` (
`SSH` int(11)
,`TypeMat` varchar(30)
,`Marque` varchar(30)
,`DateGarantie` date
,`DateRec` date
,`DurreeVie` int(2)
,`CodeDech` int(11)
,`Dechtype` enum('Retour','Decharge')
);

-- --------------------------------------------------------

--
-- Table structure for table `MatreilAInventaire`
--

CREATE TABLE `MatreilAInventaire` (
  `CodeInv` int(11) NOT NULL,
  `SSH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MatreilAInventaire`
--

INSERT INTO `MatreilAInventaire` (`CodeInv`, `SSH`) VALUES
(22, 3),
(22, 1282319),
(22, 2112112);

-- --------------------------------------------------------

--
-- Stand-in structure for view `matreilainventaire_v`
-- (See below for the actual view)
--
CREATE TABLE `matreilainventaire_v` (
`SSH` int(11)
,`TypeMat` varchar(30)
,`Marque` varchar(30)
,`DateGarantie` date
,`DateRec` date
,`DurreeVie` int(2)
,`CodeInv` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `MatreilCaracteristiques`
--

CREATE TABLE `MatreilCaracteristiques` (
  `SSH` int(11) NOT NULL,
  `CodeCaracteristiques` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MatreilCaracteristiques`
--

INSERT INTO `MatreilCaracteristiques` (`SSH`, `CodeCaracteristiques`) VALUES
(2, 4),
(3, 2),
(3, 4),
(3, 5),
(12312, 1),
(12312, 4),
(12312, 5),
(1282319, 1),
(1282319, 4),
(1282319, 8),
(2112112, 8),
(2112112, 13),
(21312321, 14),
(21312321, 15);

-- --------------------------------------------------------

--
-- Table structure for table `MatreilType`
--

CREATE TABLE `MatreilType` (
  `CodeType` int(11) NOT NULL,
  `Designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MatreilType`
--

INSERT INTO `MatreilType` (`CodeType`, `Designation`) VALUES
(1, 'pc'),
(4, 'imprimante'),
(8, 'switch'),
(11, 'Serveurs'),
(12, 'Webcam'),
(13, 'Moniteur'),
(14, 'Routeur');

-- --------------------------------------------------------

--
-- Stand-in structure for view `matreil_view`
-- (See below for the actual view)
--
CREATE TABLE `matreil_view` (
`SSH` int(11)
,`CodeBL` int(11)
,`Type` varchar(30)
,`BonlivraisonStatue` varchar(30)
,`CodeCommande` varchar(8)
,`fourEmail` varchar(100)
,`CodeFacteur` int(11)
,`Marque` varchar(30)
,`Prix` decimal(7,2)
,`DateGarantie` date
,`DateRec` date
,`DurreeVie` int(2)
,`CodeRef` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `Piece`
--

CREATE TABLE `Piece` (
  `CodePc` int(11) NOT NULL,
  `Designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Piece`
--

INSERT INTO `Piece` (`CodePc`, `Designation`) VALUES
(1, 'RAM'),
(2, 'ecran'),
(3, 'la patte');

-- --------------------------------------------------------

--
-- Table structure for table `PieceReparation`
--

CREATE TABLE `PieceReparation` (
  `CodePiece` int(11) NOT NULL,
  `CodeReparation` int(11) NOT NULL,
  `Qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `piecereparation_v`
-- (See below for the actual view)
--
CREATE TABLE `piecereparation_v` (
`CodeReparation` int(11)
,`CodePiece` int(11)
,`Designation` varchar(30)
,`Qty` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `Reforme`
--

CREATE TABLE `Reforme` (
  `CodeRef` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reforme`
--

INSERT INTO `Reforme` (`CodeRef`, `Date`) VALUES
(17, '2024-05-01 20:30:00'),
(18, '2024-05-17 03:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `Reparation`
--

CREATE TABLE `Reparation` (
  `CodeRep` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Obs` varchar(200) NOT NULL,
  `SSH` int(11) NOT NULL,
  `CodeUtilisateur` int(11) DEFAULT NULL,
  `codeetat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reparation`
--

INSERT INTO `Reparation` (`CodeRep`, `Date`, `Obs`, `SSH`, `CodeUtilisateur`, `codeetat`) VALUES
(21, '2024-05-16 22:55:00', 'kkkk', 3, NULL, 2),
(23, '2024-05-16 23:05:00', 'kkkk', 2, 3, 1),
(24, '2024-05-17 02:48:00', 'test test test', 3, NULL, 2),
(25, '2024-05-17 03:21:00', 'test test test', 3, NULL, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reparation_v`
-- (See below for the actual view)
--
CREATE TABLE `reparation_v` (
`CodeRep` int(11)
,`Date` datetime
,`Obs` varchar(200)
,`SSH` int(11)
,`MatreilType` varchar(30)
,`MatreilMarque` varchar(30)
,`MatreilCodeRef` int(11)
,`CodeUt` varchar(100)
,`Nom` varchar(20)
,`Prenom` varchar(20)
,`Post` int(11)
,`StrCode` int(11)
,`StrDesignation` varchar(30)
,`RoleCode` int(11)
,`RollDesignation` varchar(20)
,`etatRepDesignation` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `CodeRole` int(11) NOT NULL,
  `Designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`CodeRole`, `Designation`) VALUES
(1, 'CHEF'),
(2, 'Directeur'),
(5, 'Technicien');

-- --------------------------------------------------------

--
-- Table structure for table `Structure`
--

CREATE TABLE `Structure` (
  `CodeStr` int(11) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `CodeStructure` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Structure`
--

INSERT INTO `Structure` (`CodeStr`, `Designation`, `CodeStructure`) VALUES
(1, 'DPR', NULL),
(2, 'Direction Informatique', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `CodeUt` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `DNN` date DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Mdp` varchar(100) DEFAULT NULL,
  `Tel` varchar(20) NOT NULL,
  `Post` int(2) NOT NULL,
  `CodeRole` int(11) NOT NULL,
  `CodeStructure` int(11) NOT NULL,
  `GenerateKey` varchar(100) DEFAULT NULL,
  `GenerateKeyExpiration` datetime DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`CodeUt`, `Nom`, `Prenom`, `DNN`, `Email`, `Mdp`, `Tel`, `Post`, `CodeRole`, `CodeStructure`, `GenerateKey`, `GenerateKeyExpiration`, `token`) VALUES
(3, 'souker', 'abdelkaderr', '2024-04-02', 'abdelsoukeur@yahoo.com', NULL, '000000000', 15, 5, 2, NULL, NULL, NULL),
(10, 'iskander', 'bentaleb', '2024-04-14', 'iskanderboss1999@gmail.com', '$2y$10$ThFVqCjV5uztaQX5uHhCt.3Fd..EHlk.zKHLoRlPs5YjGJZWlIw52', '0000000000', 12, 2, 2, '$2y$10$USDoW1u6Os9CXHFLsfW.HeXqqmunDHuWSxOIxkMPVlJuuB6iOwcmi', '2024-05-18 10:17:42', '$2y$10$CuiD./SG8OZmb.3ddQhLW.fnPjI.J5qj7XBOkDfspitxRNA0VhdTa'),
(12, 'Hamidi', 'Sihem', '2024-05-18', 'sihemhmd24@gmail.com', '$2y$10$zTqJRGe/.6McGheO5lzfIO8C0fkRz/AGMBfKME1cv1y8XetdQoTgG', '0000000000', 13, 1, 2, '$2y$10$5WNuiGXHUV9l4AKlMFZ5Tu3JF6E91Z2VwGfSsnJJ.s6UWSmekuCwi', '2024-05-18 11:14:56', '$2y$10$DnY6dW3zT8Wa.6cM.ntNQ.TZZ7kFwOhHPXZC680qfRCfwFi30AHjC'),
(13, 'Jamoui', 'Mouad', '2024-05-18', 'JamouiMouad@gmail.com', NULL, '0000000000', 49, 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `utilisateur_v`
-- (See below for the actual view)
--
CREATE TABLE `utilisateur_v` (
`CodeUt` int(11)
,`Nom` varchar(20)
,`Prenom` varchar(20)
,`DNN` date
,`Email` varchar(100)
,`Mdp` varchar(100)
,`Tel` varchar(20)
,`Post` int(2)
,`StrCode` int(11)
,`StrDesignation` varchar(30)
,`RoleCode` int(11)
,`RollDesignation` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `bonlivraison_v`
--
DROP TABLE IF EXISTS `bonlivraison_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`bonlivraison_v`  AS SELECT `bl`.`CodeBL` AS `CodeBL`, `bl`.`Date` AS `Date`, `bl`.`CodeCommande` AS `CodeCommande`, `bl`.`CodeFacteur` AS `CodeFacteur`, `etbl`.`Designation` AS `Designation` FROM (`sonatrchgestionparkinfo`.`bonlivraison` `bl` join `sonatrchgestionparkinfo`.`etatbonlivraison` `etbl`) WHERE `bl`.`codeetat` = `etbl`.`CodeEtat` ;

-- --------------------------------------------------------

--
-- Structure for view `commander_view`
--
DROP TABLE IF EXISTS `commander_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`commander_view`  AS SELECT `cmd`.`CodeCommande` AS `CodeCommande`, `mttype`.`Designation` AS `MatreilType`, `mrq`.`Designation` AS `MatreilMarque`, `cmd`.`Qty` AS `QTY` FROM ((`sonatrchgestionparkinfo`.`commander` `cmd` join `sonatrchgestionparkinfo`.`matreiltype` `mttype`) join `sonatrchgestionparkinfo`.`marque` `mrq`) WHERE `cmd`.`CodeType` = `mttype`.`CodeType` AND `cmd`.`CodeMrq` = `mrq`.`CodeMrq` ;

-- --------------------------------------------------------

--
-- Structure for view `commnade`
--
DROP TABLE IF EXISTS `commnade`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`commnade`  AS SELECT `cmd`.`CodeCom` AS `CodeCom`, `cmd`.`Date` AS `date`, `cmdtype`.`Designation` AS `TypeCom`, `fr`.`Nom` AS `fourNom`, `fr`.`Prenom` AS `fourPrenom`, `fr`.`Email` AS `fourEmail`, `fr`.`Tel` AS `fourTel`, `fr`.`Address` AS `fourAddress` FROM ((`sonatrchgestionparkinfo`.`commande` `cmd` join `sonatrchgestionparkinfo`.`commandetype` `cmdtype`) join `sonatrchgestionparkinfo`.`fournisseur` `fr`) WHERE `cmd`.`CodeCommandeType` = `cmdtype`.`CodeType` AND `fr`.`CodeFour` = `cmd`.`CodeFournisseur` ;

-- --------------------------------------------------------

--
-- Structure for view `decharge_v`
--
DROP TABLE IF EXISTS `decharge_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`decharge_v`  AS SELECT `dech`.`CodeDech` AS `CodeDech`, `dech`.`Date` AS `Date`, `dech`.`Type` AS `Dechtype`, `dech`.`CodeUtilisateur` AS `CodeUtilisateur`, `ut`.`Nom` AS `utNom`, `ut`.`Prenom` AS `utPrenom` FROM (`sonatrchgestionparkinfo`.`decharge` `dech` join `sonatrchgestionparkinfo`.`utilisateur` `ut`) WHERE `dech`.`CodeUtilisateur` = `ut`.`CodeUt` ;

-- --------------------------------------------------------

--
-- Structure for view `mareilcaractview`
--
DROP TABLE IF EXISTS `mareilcaractview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`mareilcaractview`  AS SELECT `sonatrchgestionparkinfo`.`matreilcaracteristiques`.`SSH` AS `SSH`, `sonatrchgestionparkinfo`.`caracteristiques`.`CodeCar` AS `CodeCar`, `sonatrchgestionparkinfo`.`caracteristiques`.`Designation` AS `Designation` FROM (`sonatrchgestionparkinfo`.`matreilcaracteristiques` join `sonatrchgestionparkinfo`.`caracteristiques`) WHERE `sonatrchgestionparkinfo`.`matreilcaracteristiques`.`CodeCaracteristiques` = `sonatrchgestionparkinfo`.`caracteristiques`.`CodeCar` ;

-- --------------------------------------------------------

--
-- Structure for view `matreiladecharge_v`
--
DROP TABLE IF EXISTS `matreiladecharge_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`matreiladecharge_v`  AS SELECT `mtv`.`SSH` AS `SSH`, `mtv`.`Type` AS `TypeMat`, `mtv`.`Marque` AS `Marque`, `mtv`.`DateGarantie` AS `DateGarantie`, `mtv`.`DateRec` AS `DateRec`, `mtv`.`DurreeVie` AS `DurreeVie`, `mad`.`CodeDech` AS `CodeDech`, `dech`.`Dechtype` AS `Dechtype` FROM ((`sonatrchgestionparkinfo`.`matreil_view` `mtv` join `sonatrchgestionparkinfo`.`matreiladecharge` `mad`) join `sonatrchgestionparkinfo`.`decharge_v` `dech`) WHERE `mtv`.`SSH` = `mad`.`SSH` AND `mad`.`CodeDech` = `dech`.`CodeDech` ;

-- --------------------------------------------------------

--
-- Structure for view `matreilainventaire_v`
--
DROP TABLE IF EXISTS `matreilainventaire_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`matreilainventaire_v`  AS SELECT `mtv`.`SSH` AS `SSH`, `mtv`.`Type` AS `TypeMat`, `mtv`.`Marque` AS `Marque`, `mtv`.`DateGarantie` AS `DateGarantie`, `mtv`.`DateRec` AS `DateRec`, `mtv`.`DurreeVie` AS `DurreeVie`, `mti`.`CodeInv` AS `CodeInv` FROM (`sonatrchgestionparkinfo`.`matreil_view` `mtv` join `sonatrchgestionparkinfo`.`matreilainventaire` `mti`) WHERE `mtv`.`SSH` = `mti`.`SSH` ;

-- --------------------------------------------------------

--
-- Structure for view `matreil_view`
--
DROP TABLE IF EXISTS `matreil_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`matreil_view`  AS SELECT `sonatrchgestionparkinfo`.`matreil`.`SSH` AS `SSH`, `sonatrchgestionparkinfo`.`matreil`.`CodeBL` AS `CodeBL`, `sonatrchgestionparkinfo`.`matreiltype`.`Designation` AS `Type`, `bonlivraison_v`.`Designation` AS `BonlivraisonStatue`, `bonlivraison_v`.`CodeCommande` AS `CodeCommande`, `commnade`.`fourEmail` AS `fourEmail`, `bonlivraison_v`.`CodeFacteur` AS `CodeFacteur`, `sonatrchgestionparkinfo`.`marque`.`Designation` AS `Marque`, `sonatrchgestionparkinfo`.`matreil`.`Prix` AS `Prix`, `sonatrchgestionparkinfo`.`matreil`.`DateGarantie` AS `DateGarantie`, `sonatrchgestionparkinfo`.`matreil`.`DateRec` AS `DateRec`, `sonatrchgestionparkinfo`.`matreil`.`DurreeVie` AS `DurreeVie`, `sonatrchgestionparkinfo`.`matreil`.`CodeRef` AS `CodeRef` FROM ((((`sonatrchgestionparkinfo`.`matreil` join `sonatrchgestionparkinfo`.`marque`) join `sonatrchgestionparkinfo`.`matreiltype`) join `sonatrchgestionparkinfo`.`bonlivraison_v`) join `sonatrchgestionparkinfo`.`commnade`) WHERE `sonatrchgestionparkinfo`.`matreil`.`CodeMarque` = `sonatrchgestionparkinfo`.`marque`.`CodeMrq` AND `sonatrchgestionparkinfo`.`matreil`.`CodeType` = `sonatrchgestionparkinfo`.`matreiltype`.`CodeType` AND `sonatrchgestionparkinfo`.`matreil`.`CodeBL` = `bonlivraison_v`.`CodeBL` AND `bonlivraison_v`.`CodeCommande` = `commnade`.`CodeCom` ;

-- --------------------------------------------------------

--
-- Structure for view `piecereparation_v`
--
DROP TABLE IF EXISTS `piecereparation_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`piecereparation_v`  AS SELECT `pcr`.`CodeReparation` AS `CodeReparation`, `pcr`.`CodePiece` AS `CodePiece`, `pcs`.`Designation` AS `Designation`, `pcr`.`Qty` AS `Qty` FROM (`sonatrchgestionparkinfo`.`piecereparation` `pcr` join `sonatrchgestionparkinfo`.`piece` `pcs`) WHERE `pcr`.`CodePiece` = `pcs`.`CodePc` ;

-- --------------------------------------------------------

--
-- Structure for view `reparation_v`
--
DROP TABLE IF EXISTS `reparation_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`reparation_v`  AS SELECT `rep`.`CodeRep` AS `CodeRep`, `rep`.`Date` AS `Date`, `rep`.`Obs` AS `Obs`, `mtv`.`SSH` AS `SSH`, `mtv`.`Type` AS `MatreilType`, `mtv`.`Marque` AS `MatreilMarque`, `mtv`.`CodeRef` AS `MatreilCodeRef`, ifnull(`utv`.`CodeUt`,`mtv`.`fourEmail`) AS `CodeUt`, ifnull(`utv`.`Nom`,NULL) AS `Nom`, ifnull(`utv`.`Prenom`,NULL) AS `Prenom`, ifnull(`utv`.`Post`,NULL) AS `Post`, ifnull(`utv`.`StrCode`,NULL) AS `StrCode`, ifnull(`utv`.`StrDesignation`,NULL) AS `StrDesignation`, ifnull(`utv`.`RoleCode`,NULL) AS `RoleCode`, ifnull(`utv`.`RollDesignation`,NULL) AS `RollDesignation`, `etr`.`Designation` AS `etatRepDesignation` FROM (((`sonatrchgestionparkinfo`.`reparation` `rep` join `sonatrchgestionparkinfo`.`matreil_view` `mtv` on(`rep`.`SSH` = `mtv`.`SSH`)) left join `sonatrchgestionparkinfo`.`utilisateur_v` `utv` on(`rep`.`CodeUtilisateur` = `utv`.`CodeUt`)) join `sonatrchgestionparkinfo`.`etatreparation` `etr` on(`etr`.`CodeEtat` = `rep`.`codeetat`)) WHERE `rep`.`SSH` = `mtv`.`SSH` AND (`rep`.`CodeUtilisateur` is null OR `rep`.`CodeUtilisateur` = `utv`.`CodeUt`) AND `etr`.`CodeEtat` = `rep`.`codeetat` ;

-- --------------------------------------------------------

--
-- Structure for view `utilisateur_v`
--
DROP TABLE IF EXISTS `utilisateur_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sonatrchgestionparkinfo`.`utilisateur_v`  AS SELECT `ur`.`CodeUt` AS `CodeUt`, `ur`.`Nom` AS `Nom`, `ur`.`Prenom` AS `Prenom`, `ur`.`DNN` AS `DNN`, `ur`.`Email` AS `Email`, `ur`.`Mdp` AS `Mdp`, `ur`.`Tel` AS `Tel`, `ur`.`Post` AS `Post`, `str`.`CodeStr` AS `StrCode`, `str`.`Designation` AS `StrDesignation`, `r`.`CodeRole` AS `RoleCode`, `r`.`Designation` AS `RollDesignation` FROM ((`sonatrchgestionparkinfo`.`utilisateur` `ur` join `sonatrchgestionparkinfo`.`structure` `str`) join `sonatrchgestionparkinfo`.`role` `r`) WHERE `ur`.`CodeStructure` = `str`.`CodeStr` AND `ur`.`CodeRole` = `r`.`CodeRole` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BonLivraison`
--
ALTER TABLE `BonLivraison`
  ADD PRIMARY KEY (`CodeBL`),
  ADD KEY `CodeFacteur` (`CodeFacteur`),
  ADD KEY `bonlivraison_ibfk_3` (`codeetat`),
  ADD KEY `bonlivraison_ibfk_1` (`CodeCommande`);

--
-- Indexes for table `Caracteristiques`
--
ALTER TABLE `Caracteristiques`
  ADD PRIMARY KEY (`CodeCar`);

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`CodeCom`),
  ADD KEY `CodeFournisseur` (`CodeFournisseur`),
  ADD KEY `CodeCommandeType` (`CodeCommandeType`);

--
-- Indexes for table `Commander`
--
ALTER TABLE `Commander`
  ADD PRIMARY KEY (`CodeType`,`CodeCommande`,`CodeMrq`),
  ADD KEY `CodeMrq` (`CodeMrq`),
  ADD KEY `commander_ibfk_2` (`CodeCommande`);

--
-- Indexes for table `CommandeType`
--
ALTER TABLE `CommandeType`
  ADD PRIMARY KEY (`CodeType`);

--
-- Indexes for table `Decharge`
--
ALTER TABLE `Decharge`
  ADD PRIMARY KEY (`CodeDech`),
  ADD KEY `CodeUtilisateur` (`CodeUtilisateur`);

--
-- Indexes for table `etatBonLivraison`
--
ALTER TABLE `etatBonLivraison`
  ADD PRIMARY KEY (`CodeEtat`);

--
-- Indexes for table `etatReparation`
--
ALTER TABLE `etatReparation`
  ADD PRIMARY KEY (`CodeEtat`);

--
-- Indexes for table `Facture`
--
ALTER TABLE `Facture`
  ADD PRIMARY KEY (`CodeFact`);

--
-- Indexes for table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  ADD PRIMARY KEY (`CodeFour`);

--
-- Indexes for table `Inventaire`
--
ALTER TABLE `Inventaire`
  ADD PRIMARY KEY (`CodeInv`);

--
-- Indexes for table `Marque`
--
ALTER TABLE `Marque`
  ADD PRIMARY KEY (`CodeMrq`);

--
-- Indexes for table `Matreil`
--
ALTER TABLE `Matreil`
  ADD PRIMARY KEY (`SSH`),
  ADD KEY `CodeMarque` (`CodeMarque`),
  ADD KEY `CodeType` (`CodeType`),
  ADD KEY `matreil_ibfk_3` (`CodeRef`),
  ADD KEY `matreil_ibfk_4` (`CodeBL`);

--
-- Indexes for table `MatreilADecharge`
--
ALTER TABLE `MatreilADecharge`
  ADD PRIMARY KEY (`CodeDech`,`SSH`),
  ADD KEY `SSH` (`SSH`);

--
-- Indexes for table `MatreilAInventaire`
--
ALTER TABLE `MatreilAInventaire`
  ADD PRIMARY KEY (`CodeInv`,`SSH`),
  ADD KEY `SSH` (`SSH`);

--
-- Indexes for table `MatreilCaracteristiques`
--
ALTER TABLE `MatreilCaracteristiques`
  ADD PRIMARY KEY (`SSH`,`CodeCaracteristiques`),
  ADD KEY `CodeCaracteristiques` (`CodeCaracteristiques`);

--
-- Indexes for table `MatreilType`
--
ALTER TABLE `MatreilType`
  ADD PRIMARY KEY (`CodeType`);

--
-- Indexes for table `Piece`
--
ALTER TABLE `Piece`
  ADD PRIMARY KEY (`CodePc`);

--
-- Indexes for table `PieceReparation`
--
ALTER TABLE `PieceReparation`
  ADD PRIMARY KEY (`CodePiece`,`CodeReparation`),
  ADD KEY `piecereparation_ibfk_2` (`CodeReparation`);

--
-- Indexes for table `Reforme`
--
ALTER TABLE `Reforme`
  ADD PRIMARY KEY (`CodeRef`);

--
-- Indexes for table `Reparation`
--
ALTER TABLE `Reparation`
  ADD PRIMARY KEY (`CodeRep`),
  ADD KEY `SSH` (`SSH`),
  ADD KEY `CodeUtilisateur` (`CodeUtilisateur`),
  ADD KEY `reparation_ibfk_3` (`codeetat`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`CodeRole`);

--
-- Indexes for table `Structure`
--
ALTER TABLE `Structure`
  ADD PRIMARY KEY (`CodeStr`),
  ADD KEY `CodeStructure` (`CodeStructure`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`CodeUt`),
  ADD UNIQUE KEY `UC_Email` (`Email`),
  ADD KEY `CodeRole` (`CodeRole`),
  ADD KEY `CodeStructure` (`CodeStructure`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Caracteristiques`
--
ALTER TABLE `Caracteristiques`
  MODIFY `CodeCar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `CommandeType`
--
ALTER TABLE `CommandeType`
  MODIFY `CodeType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Decharge`
--
ALTER TABLE `Decharge`
  MODIFY `CodeDech` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `etatBonLivraison`
--
ALTER TABLE `etatBonLivraison`
  MODIFY `CodeEtat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `etatReparation`
--
ALTER TABLE `etatReparation`
  MODIFY `CodeEtat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  MODIFY `CodeFour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Inventaire`
--
ALTER TABLE `Inventaire`
  MODIFY `CodeInv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Marque`
--
ALTER TABLE `Marque`
  MODIFY `CodeMrq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Matreil`
--
ALTER TABLE `Matreil`
  MODIFY `SSH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222294446;

--
-- AUTO_INCREMENT for table `MatreilType`
--
ALTER TABLE `MatreilType`
  MODIFY `CodeType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Piece`
--
ALTER TABLE `Piece`
  MODIFY `CodePc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Reforme`
--
ALTER TABLE `Reforme`
  MODIFY `CodeRef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Reparation`
--
ALTER TABLE `Reparation`
  MODIFY `CodeRep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `CodeRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Structure`
--
ALTER TABLE `Structure`
  MODIFY `CodeStr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `CodeUt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BonLivraison`
--
ALTER TABLE `BonLivraison`
  ADD CONSTRAINT `bonlivraison_ibfk_1` FOREIGN KEY (`CodeCommande`) REFERENCES `Commande` (`CodeCom`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bonlivraison_ibfk_2` FOREIGN KEY (`CodeFacteur`) REFERENCES `Facture` (`CodeFact`),
  ADD CONSTRAINT `bonlivraison_ibfk_3` FOREIGN KEY (`codeetat`) REFERENCES `etatBonLivraison` (`CodeEtat`);

--
-- Constraints for table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`CodeFournisseur`) REFERENCES `Fournisseur` (`CodeFour`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`CodeCommandeType`) REFERENCES `CommandeType` (`CodeType`);

--
-- Constraints for table `Commander`
--
ALTER TABLE `Commander`
  ADD CONSTRAINT `commander_ibfk_1` FOREIGN KEY (`CodeType`) REFERENCES `MatreilType` (`CodeType`),
  ADD CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`CodeCommande`) REFERENCES `Commande` (`CodeCom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commander_ibfk_3` FOREIGN KEY (`CodeMrq`) REFERENCES `Marque` (`CodeMrq`);

--
-- Constraints for table `Decharge`
--
ALTER TABLE `Decharge`
  ADD CONSTRAINT `decharge_ibfk_1` FOREIGN KEY (`CodeUtilisateur`) REFERENCES `Utilisateur` (`CodeUt`);

--
-- Constraints for table `Matreil`
--
ALTER TABLE `Matreil`
  ADD CONSTRAINT `matreil_ibfk_1` FOREIGN KEY (`CodeMarque`) REFERENCES `Marque` (`CodeMrq`),
  ADD CONSTRAINT `matreil_ibfk_2` FOREIGN KEY (`CodeType`) REFERENCES `MatreilType` (`CodeType`),
  ADD CONSTRAINT `matreil_ibfk_3` FOREIGN KEY (`CodeRef`) REFERENCES `Reforme` (`CodeRef`) ON DELETE SET NULL,
  ADD CONSTRAINT `matreil_ibfk_4` FOREIGN KEY (`CodeBL`) REFERENCES `BonLivraison` (`CodeBL`);

--
-- Constraints for table `MatreilADecharge`
--
ALTER TABLE `MatreilADecharge`
  ADD CONSTRAINT `matreiladecharge_ibfk_1` FOREIGN KEY (`CodeDech`) REFERENCES `Decharge` (`CodeDech`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matreiladecharge_ibfk_2` FOREIGN KEY (`SSH`) REFERENCES `Matreil` (`SSH`);

--
-- Constraints for table `MatreilAInventaire`
--
ALTER TABLE `MatreilAInventaire`
  ADD CONSTRAINT `matreilainventaire_ibfk_1` FOREIGN KEY (`CodeInv`) REFERENCES `Inventaire` (`CodeInv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matreilainventaire_ibfk_2` FOREIGN KEY (`SSH`) REFERENCES `Matreil` (`SSH`);

--
-- Constraints for table `MatreilCaracteristiques`
--
ALTER TABLE `MatreilCaracteristiques`
  ADD CONSTRAINT `matreilcaracteristiques_ibfk_1` FOREIGN KEY (`SSH`) REFERENCES `Matreil` (`SSH`) ON DELETE CASCADE,
  ADD CONSTRAINT `matreilcaracteristiques_ibfk_2` FOREIGN KEY (`CodeCaracteristiques`) REFERENCES `Caracteristiques` (`CodeCar`);

--
-- Constraints for table `PieceReparation`
--
ALTER TABLE `PieceReparation`
  ADD CONSTRAINT `piecereparation_ibfk_1` FOREIGN KEY (`CodePiece`) REFERENCES `Piece` (`CodePc`),
  ADD CONSTRAINT `piecereparation_ibfk_2` FOREIGN KEY (`CodeReparation`) REFERENCES `Reparation` (`CodeRep`) ON DELETE CASCADE;

--
-- Constraints for table `Reparation`
--
ALTER TABLE `Reparation`
  ADD CONSTRAINT `reparation_ibfk_1` FOREIGN KEY (`SSH`) REFERENCES `Matreil` (`SSH`),
  ADD CONSTRAINT `reparation_ibfk_2` FOREIGN KEY (`CodeUtilisateur`) REFERENCES `Utilisateur` (`CodeUt`),
  ADD CONSTRAINT `reparation_ibfk_3` FOREIGN KEY (`codeetat`) REFERENCES `etatReparation` (`CodeEtat`);

--
-- Constraints for table `Structure`
--
ALTER TABLE `Structure`
  ADD CONSTRAINT `structure_ibfk_1` FOREIGN KEY (`CodeStructure`) REFERENCES `Structure` (`CodeStr`);

--
-- Constraints for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`CodeRole`) REFERENCES `Role` (`CodeRole`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`CodeStructure`) REFERENCES `Structure` (`CodeStr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
