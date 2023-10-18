-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2023 at 09:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raid_ckc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CATEGORIE` int NOT NULL,
  `LIBELLE_CATEGORIE` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID_CATEGORIE`, `LIBELLE_CATEGORIE`) VALUES
(2, 'Femme'),
(1, 'Homme'),
(3, 'Mixte'),
(4, 'VAE');

-- --------------------------------------------------------

--
-- Table structure for table `circuit`
--

CREATE TABLE `circuit` (
  `ID_CIRCUIT` int NOT NULL,
  `LIBELLE_CIRCUIT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ID_RAID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `circuit`
--

INSERT INTO `circuit` (`ID_CIRCUIT`, `LIBELLE_CIRCUIT`, `ID_RAID`) VALUES
(1, 'Bol d\'air', 1),
(2, 'Mini Bol d\'air', 1);

-- --------------------------------------------------------

--
-- Table structure for table `epreuve`
--

CREATE TABLE `epreuve` (
  `ID_EPREUVE` int NOT NULL,
  `LIBELLE_EPREUVE` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ID_CIRCUIT` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `epreuve`
--

INSERT INTO `epreuve` (`ID_EPREUVE`, `LIBELLE_EPREUVE`, `ID_CIRCUIT`) VALUES
(1, 'Course a pied', 1),
(2, 'Canoe', 1),
(3, 'Vtt', 1),
(4, 'Course a pied', 2),
(5, 'Canoe', 2),
(6, 'Vtt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
  `ID_EQUIPE` int NOT NULL,
  `NUM_DOSSARD_EQUIPE` int NOT NULL,
  `ID_CIRCUIT` int NOT NULL,
  `ID_CATEGORIE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `ID_PARTICIPANT` int NOT NULL,
  `NOM_PARTICIPANT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PRENOM_PARTICIPANT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `DATE_NAISSANCE_PARTICIPANT` date NOT NULL,
  `ADRESSE_PARTICIPANT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `CODE_POSTAL_PARTICIPANT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `VILLE_PARTICIPANT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `TELEPHONE_PARTICIPANT` int NOT NULL,
  `CERTIFICAT_VALIDER_PARTICIPANT` tinyint(1) NOT NULL,
  `CLUB_PARTICIPANT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ID_RFID` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EMAIL_PARTICIPANT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ID_EQUIPE` int NOT NULL,
  `ID_UTILISATEUR` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raid`
--

CREATE TABLE `raid` (
  `ID_RAID` int NOT NULL,
  `LIBELLE_RAID` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raid`
--

INSERT INTO `raid` (`ID_RAID`, `LIBELLE_RAID`) VALUES
(1, 'Bol d\'air');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int NOT NULL,
  `LIBELLE_ROLE` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `LIBELLE_ROLE`) VALUES
(1, 'admin'),
(3, 'pointeur'),
(2, 'secretaire');

-- --------------------------------------------------------

--
-- Table structure for table `temps`
--

CREATE TABLE `temps` (
  `ID_TEMPS` int NOT NULL,
  `DUREE_TEMPS` time NOT NULL,
  `ID_PARTICIPANT` int NOT NULL,
  `ID_EPREUVE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_UTILISATEUR` int NOT NULL,
  `LOGIN_UTILISATEUR` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `MOT_DE_PASSE_UTILISATEUR` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ID_ROLE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_CATEGORIE`),
  ADD UNIQUE KEY `LIBELLE_CATEGORIE` (`LIBELLE_CATEGORIE`);

--
-- Indexes for table `circuit`
--
ALTER TABLE `circuit`
  ADD PRIMARY KEY (`ID_CIRCUIT`),
  ADD UNIQUE KEY `LIBELLE_CIRCUIT` (`LIBELLE_CIRCUIT`),
  ADD KEY `ID_RAID` (`ID_RAID`);

--
-- Indexes for table `epreuve`
--
ALTER TABLE `epreuve`
  ADD PRIMARY KEY (`ID_EPREUVE`),
  ADD KEY `ID_CIRCUIT` (`ID_CIRCUIT`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`ID_EQUIPE`),
  ADD KEY `ID_CIRCUIT` (`ID_CIRCUIT`),
  ADD KEY `ID_CATEGORIE` (`ID_CATEGORIE`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ID_PARTICIPANT`),
  ADD UNIQUE KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`),
  ADD KEY `ID_EQUIPE` (`ID_EQUIPE`);

--
-- Indexes for table `raid`
--
ALTER TABLE `raid`
  ADD PRIMARY KEY (`ID_RAID`),
  ADD UNIQUE KEY `LIBELLE_RAID` (`LIBELLE_RAID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`),
  ADD UNIQUE KEY `LIBELLE_ROLE` (`LIBELLE_ROLE`);

--
-- Indexes for table `temps`
--
ALTER TABLE `temps`
  ADD PRIMARY KEY (`ID_TEMPS`),
  ADD KEY `ID_PARTICIPANT` (`ID_PARTICIPANT`),
  ADD KEY `ID_EPREUVE` (`ID_EPREUVE`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_UTILISATEUR`),
  ADD KEY `ID_ROLE` (`ID_ROLE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_CATEGORIE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `circuit`
--
ALTER TABLE `circuit`
  MODIFY `ID_CIRCUIT` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `epreuve`
--
ALTER TABLE `epreuve`
  MODIFY `ID_EPREUVE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `ID_EQUIPE` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `ID_PARTICIPANT` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raid`
--
ALTER TABLE `raid`
  MODIFY `ID_RAID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temps`
--
ALTER TABLE `temps`
  MODIFY `ID_TEMPS` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_UTILISATEUR` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `circuit`
--
ALTER TABLE `circuit`
  ADD CONSTRAINT `circuit_ibfk_1` FOREIGN KEY (`ID_RAID`) REFERENCES `raid` (`ID_RAID`);

--
-- Constraints for table `epreuve`
--
ALTER TABLE `epreuve`
  ADD CONSTRAINT `epreuve_ibfk_1` FOREIGN KEY (`ID_CIRCUIT`) REFERENCES `circuit` (`ID_CIRCUIT`);

--
-- Constraints for table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`ID_CIRCUIT`) REFERENCES `circuit` (`ID_CIRCUIT`),
  ADD CONSTRAINT `equipe_ibfk_2` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`);

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`ID_EQUIPE`) REFERENCES `equipe` (`ID_EQUIPE`),
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`);

--
-- Constraints for table `temps`
--
ALTER TABLE `temps`
  ADD CONSTRAINT `temps_ibfk_1` FOREIGN KEY (`ID_PARTICIPANT`) REFERENCES `participant` (`ID_PARTICIPANT`),
  ADD CONSTRAINT `temps_ibfk_2` FOREIGN KEY (`ID_EPREUVE`) REFERENCES `epreuve` (`ID_EPREUVE`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
