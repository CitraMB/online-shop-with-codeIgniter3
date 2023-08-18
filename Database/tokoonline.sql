-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 09:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangtoko`
--

CREATE TABLE `barangtoko` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STOK` int(11) NOT NULL,
  `HARGA` int(11) NOT NULL,
  `FOTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangtoko`
--

INSERT INTO `barangtoko` (`ID`, `NAMA`, `STOK`, `HARGA`, `FOTO`) VALUES
(1, 'Bunga Tulip', 12, 12000, 'bunga.jpg'),
(2, 'Spring Flower', 8, 15000, 'spring.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_TRANSAKSI` int(11) NOT NULL,
  `STOK` int(11) NOT NULL,
  `HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`ID_BARANG`, `ID_TRANSAKSI`, `STOK`, `HARGA`) VALUES
(1, 2, 1, 12000),
(1, 4, 1, 12000),
(1, 5, 1, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `ID` int(11) NOT NULL,
  `TANGGAL` date NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `KECAMATAN` varchar(30) NOT NULL,
  `KOTA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`ID`, `TANGGAL`, `NAMA`, `ALAMAT`, `KECAMATAN`, `KOTA`) VALUES
(2, '2023-08-17', 'Nana', 'Jambudipa', 'Cisarua', 'Bandung'),
(4, '2023-08-18', 'Citra', 'Jl. Suka Duka', 'Cicalengka', 'Bandung Barat'),
(5, '2023-08-18', 'Edo', 'Muril', 'Cisarua', 'Bandung Barat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangtoko`
--
ALTER TABLE `barangtoko`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD KEY `ID_BARANG` (`ID_BARANG`),
  ADD KEY `ID_TRANSAKSI` (`ID_TRANSAKSI`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangtoko`
--
ALTER TABLE `barangtoko`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`ID_BARANG`) REFERENCES `barangtoko` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jual_ibfk_2` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi_penjualan` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
