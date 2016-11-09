-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 12:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_innotriple`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factura`
--

CREATE TABLE `tbl_factura` (
  `codigo_factura` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_pulsera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pulseras`
--

CREATE TABLE `tbl_pulseras` (
  `codigo_pulsera` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `disponibles` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pulseras`
--

INSERT INTO `tbl_pulseras` (`codigo_pulsera`, `imagen`, `disponibles`, `precio`) VALUES
(1, 'img/producto/img1.jpg', 10, 100),
(2, 'img/producto/img2.jpg', 6, 100),
(4, 'img/producto/img4.jpg', 8, 100),
(5, 'img/producto/img5.jpg', 9, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD PRIMARY KEY (`codigo_factura`),
  ADD KEY `fk_tbl_factura_tbl_usuarios1_idx` (`codigo_usuario`),
  ADD KEY `fk_tbl_factura_tbl_pulseras1_idx` (`codigo_pulsera`);

--
-- Indexes for table `tbl_pulseras`
--
ALTER TABLE `tbl_pulseras`
  ADD PRIMARY KEY (`codigo_pulsera`);

--
-- Indexes for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`codigo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_factura`
--
ALTER TABLE `tbl_factura`
  MODIFY `codigo_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pulseras`
--
ALTER TABLE `tbl_pulseras`
  MODIFY `codigo_pulsera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD CONSTRAINT `fk_tbl_factura_tbl_pulseras1` FOREIGN KEY (`codigo_pulsera`) REFERENCES `tbl_pulseras` (`codigo_pulsera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_factura_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
