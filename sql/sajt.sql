-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 11:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobili`
--

CREATE TABLE `automobili` (
  `auto_id` int(11) NOT NULL,
  `marka` text NOT NULL,
  `model` text NOT NULL,
  `godiste` int(11) NOT NULL,
  `snaga` int(11) NOT NULL,
  `kilometri` int(11) NOT NULL,
  `pogon` text NOT NULL,
  `zapremina` int(11) NOT NULL,
  `slika` text NOT NULL,
  `cena` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `automobili`
--

INSERT INTO `automobili` (`auto_id`, `marka`, `model`, `godiste`, `snaga`, `kilometri`, `pogon`, `zapremina`, `slika`, `cena`, `userid`) VALUES
(9, '1', '2', 3, 4, 5, 'Dizel', 6, '8', 7, 2),
(10, '123', '4444', 4444, 444, 44444, 'Dizel', 444, '4444', 4444, 2),
(11, '123', '123', 123, 123, 123, 'Dizel', 123, '123', 123, 2),
(12, '33', '33', 3, 3, 3, 'Dizel', 3, '3', 3, 2),
(13, '123', '333', 333, 44, 333, 'Dizel', 33, '66', 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forma`
--

CREATE TABLE `forma` (
  `porukaid` int(11) NOT NULL,
  `Ime` text NOT NULL,
  `Naslov` text NOT NULL,
  `Broj_Telefona` text NOT NULL,
  `Opcija` text NOT NULL,
  `Poruka` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forma`
--

INSERT INTO `forma` (`porukaid`, `Ime`, `Naslov`, `Broj_Telefona`, `Opcija`, `Poruka`, `userid`) VALUES
(1, 'a', 'a', '+3816133306', 'Pitanje', 'asd', 0),
(2, 'd', 's', 'h', 'Prodaja', '1235', 0),
(3, '', '', '', 'Pitanje', '', 0),
(4, '', '', '', 'Pitanje', '', 0),
(5, '1', '2', '3', 'Pitanje', '4', 0),
(6, '1', '2', '312321', 'Pitanje', '123123', 0),
(7, '1', '2', '3', 'Pitanje', '4', 1),
(8, '123', '123', '123', 'Pitanje', '213', 1);

-- --------------------------------------------------------

--
-- Table structure for table `motori`
--

CREATE TABLE `motori` (
  `motor_id` int(11) NOT NULL,
  `model` text NOT NULL,
  `marka` text NOT NULL,
  `snaga` int(11) NOT NULL,
  `godiste` int(11) NOT NULL,
  `kilometri` int(11) NOT NULL,
  `zapremina` int(11) NOT NULL,
  `slika` text NOT NULL,
  `cena` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motori`
--

INSERT INTO `motori` (`motor_id`, `model`, `marka`, `snaga`, `godiste`, `kilometri`, `zapremina`, `slika`, `cena`, `userid`) VALUES
(1, 'zx200', 'gonda', 90, 2001, 25000, 450, 'data:image/jpeg;base64,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', 2500, 0),
(2, '123', '123', 123, 123, 123, 123, '123', 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transportna_vozila`
--

CREATE TABLE `transportna_vozila` (
  `model` text NOT NULL,
  `tvid` int(11) NOT NULL,
  `godiste` int(11) NOT NULL,
  `snaga` int(11) NOT NULL,
  `kilometri` int(11) NOT NULL,
  `pogon` text NOT NULL,
  `zapremina` int(11) NOT NULL,
  `slika` text NOT NULL,
  `cena` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `marka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transportna_vozila`
--

INSERT INTO `transportna_vozila` (`model`, `tvid`, `godiste`, `snaga`, `kilometri`, `pogon`, `zapremina`, `slika`, `cena`, `userid`, `marka`) VALUES
('2', 1, 3, 4, 5, '0', 6, '8', 7, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `ime`, `prezime`, `admin`) VALUES
(1, 'urkom12', 'b1b97ad393a73f2d330d25390b8ad0a2', 'Aleksa', 'Urkom', 1),
(2, '123', 'f5bb0c8de146c67b44babbf4e6584cc0', 'urkom', 'aleksa', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobili`
--
ALTER TABLE `automobili`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `forma`
--
ALTER TABLE `forma`
  ADD PRIMARY KEY (`porukaid`);

--
-- Indexes for table `motori`
--
ALTER TABLE `motori`
  ADD PRIMARY KEY (`motor_id`);

--
-- Indexes for table `transportna_vozila`
--
ALTER TABLE `transportna_vozila`
  ADD PRIMARY KEY (`tvid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automobili`
--
ALTER TABLE `automobili`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forma`
--
ALTER TABLE `forma`
  MODIFY `porukaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `motori`
--
ALTER TABLE `motori`
  MODIFY `motor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transportna_vozila`
--
ALTER TABLE `transportna_vozila`
  MODIFY `tvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
