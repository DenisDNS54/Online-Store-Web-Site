-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 01:16 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect`
--

-- --------------------------------------------------------

--
-- Table structure for table `cos`
--

CREATE TABLE `cos` (
  `id` int(11) NOT NULL,
  `denumire` varchar(255) DEFAULT NULL,
  `descriere` varchar(255) DEFAULT NULL,
  `culoare` varchar(255) DEFAULT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `pret` varchar(255) DEFAULT NULL,
  `stoc` int(11) NOT NULL,
  `imagine` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `electronice`
--

CREATE TABLE `electronice` (
  `ide` int(11) NOT NULL,
  `denumire` varchar(255) DEFAULT NULL,
  `descriere` varchar(255) DEFAULT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `pret` float NOT NULL,
  `stoc` int(11) NOT NULL,
  `imagine` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronice`
--

INSERT INTO `electronice` (`ide`, `denumire`, `descriere`, `firma`, `pret`, `stoc`, `imagine`) VALUES
(1, 'Procesor', 'i9 ghz', 'Intel', 9000, 2, 'images/procesor2.jpg'),
(2, 'Procesor', 'i5 ghz', 'Intel', 1200, 1, 'images/procesor.jpg'),
(3, 'Procesor', 'AMD Ryzen 9 5900X 3.7GHz box', 'AMD', 2100, 3, 'images/procesor1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `idg` int(11) NOT NULL,
  `denumire` varchar(255) NOT NULL,
  `descriere` varchar(255) NOT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `imagine` varchar(255) NOT NULL,
  `pret` float NOT NULL,
  `stoc` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`idg`, `denumire`, `descriere`, `firma`, `imagine`, `pret`, `stoc`) VALUES
(1, 'Gantere', '20KG', 'Geboland', 'images/gantere.jpg', 177, 2),
(2, 'Haltere', 'Set Haltera si Gantere', 'Emag', 'images/haltere.jpg', 489, 1),
(3, 'Gantere', 'Set gantere mici', 'Strike-sport', 'images/gantere1.jpg', 53, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `denumire` varchar(255) DEFAULT NULL,
  `culoare` varchar(255) DEFAULT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `pret` float NOT NULL,
  `stoc` int(11) NOT NULL,
  `marimea` varchar(255) DEFAULT NULL,
  `imagine` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `denumire`, `culoare`, `firma`, `pret`, `stoc`, `marimea`, `imagine`) VALUES
(1, 'Tricou', 'Negru', 'Bike', 30, 21, 'L', 'images/tricou.jpg'),
(2, 'Pantaloni', 'Negru', 'Nike', 80, 10, 'L', 'images/pantaloni.jpg'),
(3, 'Hanorac', 'Alb/Rosu', 'Mr.GUGU', 209.99, 15, 'XL', 'images/hanorac.jpg'),
(6, 'Hanorac', 'Negru/Rosu', 'Ryo RAW', 159.99, 3, 'XL', 'images/hanorac3.jpg'),
(5, 'Hanorac', 'Negru', 'Marchifsalon', 150, 5, 'XL', 'images/hanorac2.jpg'),
(7, 'Hanorac', 'Alb/Rosu', 'Ryo RAW', 159.99, 7, 'XL', 'images/hanorac4.jpg'),
(8, 'Pantaloni', 'Gri', 'TopSport', 69.9, 4, 'S', 'images/pantaloni2.jpg'),
(9, 'Pantaloni', 'Alb', 'H&M', 89.99, 7, 'L', 'images/pantaloni1.jpg'),
(10, 'Pantaloni', 'Albastru', 'H&M', 99.99, 4, 'S', 'images/pantaloni3.jpg'),
(11, 'Pantaloni', 'Negru', 'J.style', 79.99, 5, 'L', 'images/pantaloni4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilizator`
--

CREATE TABLE `utilizator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizator`
--

INSERT INTO `utilizator` (`id`, `username`, `email`, `parola`) VALUES
(3, 'Denis', 'popovicidenis54@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cos`
--
ALTER TABLE `cos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electronice`
--
ALTER TABLE `electronice`
  ADD PRIMARY KEY (`ide`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`idg`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cos`
--
ALTER TABLE `cos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `electronice`
--
ALTER TABLE `electronice`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
