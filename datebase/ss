-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2017 at 06:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_lo07`
--
CREATE DATABASE IF NOT EXISTS `projet_lo07` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet_lo07`;

-- --------------------------------------------------------

--
-- Table structure for table `cursus`
--

CREATE TABLE `cursus` (
  `label` varchar(10) NOT NULL,
  `etu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ele_formation`
--

CREATE TABLE `ele_formation` (
  `cursus_label` varchar(10) NOT NULL,
  `s_seq` int(11) NOT NULL,
  `s_label` varchar(10) NOT NULL,
  `sigle` varchar(10) NOT NULL,
  `categorie` varchar(10) NOT NULL,
  `affectation` varchar(10) NOT NULL,
  `utt` varchar(10) NOT NULL,
  `profil` varchar(10) NOT NULL,
  `credit` int(11) NOT NULL,
  `resultat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`label`),
  ADD KEY `fk_etu` (`etu`);

--
-- Indexes for table `ele_formation`
--
ALTER TABLE `ele_formation`
  ADD PRIMARY KEY (`sigle`),
  ADD KEY `cursus_label` (`cursus_label`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `fk_etu` FOREIGN KEY (`etu`) REFERENCES `etudiant` (`id`);

--
-- Constraints for table `ele_formation`
--
ALTER TABLE `ele_formation`
  ADD CONSTRAINT `fk` FOREIGN KEY (`cursus_label`) REFERENCES `cursus` (`label`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
