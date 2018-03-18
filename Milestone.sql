-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 08:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skywalker_family_tree`
--

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE `milestone` (
  `year` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `era` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `alignment` varchar(128) NOT NULL,
  `familyMemberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`year`, `title`, `era`, `description`, `alignment`, `familyMemberId`) VALUES
(41, 'Born', 'BBY', 'Anakin was born into slavery on the planet Tatooine', 'Neutral', 1),
(32, 'Became a Padawan', 'BBY', 'Qui-Gon Jinn asked his apprentice Obi-Wan Kenobi to train Anakin with his dying wish.', 'Good', 1),
(22, 'Married Padme', 'BBY', 'Anakin married Senator Padme Amidala in secret, as romance is forbidden among the Jedi.', 'Neutral', 1),
(19, 'Turned to Dark Side', 'BBY', 'Darth Sidious convinced Anakin that the Dark Side of the Force could help him save his wife, leading him to kill in the Siths\' name.', 'Evil', 1),
(0, 'Killed Obi-Wan Kenobi', 'BBY', 'As Darth Vader, Anakin slayed his old master on the Death Star.', 'Evil', 1),
(4, 'Died', 'ABY', 'Anakin died saving his son, Luke, from the Emperor\'s wrath, but suffered mortal wounds in the process.', 'Good', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
