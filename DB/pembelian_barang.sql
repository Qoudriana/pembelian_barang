-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 06:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembelian_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga_satuan`, `id_supplier`) VALUES
(1, 'Spion', 5, 340000, 1),
(2, 'Aki', 8, 560000, 3),
(3, 'Ban', 12, 500000, 2),
(4, 'AC', 3, 1200000, 1),
(5, 'kursi', 1, 2000000, 2),
(6, 'Oli', 20, 40000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `no_pembelian` varchar(15) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`no_pembelian`, `id_barang`, `qty`, `harga`) VALUES
('2904210001', 1, 3, 340000),
('2904210001', 4, 4, 1200000),
('2904210002', 6, 12, 40000),
('2904210002', 5, 2, 2000000),
('2904210003', 2, 20, 560000),
('3004210002', 2, 3, 560000);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `no_pembelian` varchar(15) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`no_pembelian`, `id_supplier`, `tgl`, `id_user`) VALUES
('2904210001', 1, '2021-04-29', 1),
('2904210002', 2, '2021-04-29', 1),
('2904210003', 3, '2021-04-29', 1),
('3004210001', 1, '2021-04-30', 1),
('3004210002', 3, '2021-04-30', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_pembelian`
-- (See below for the actual view)
--
CREATE TABLE `laporan_pembelian` (
`no_pembelian` varchar(15)
,`tgl` date
,`supplier` varchar(50)
,`user` varchar(50)
,`barang` varchar(50)
,`qty` int(11)
,`harga` int(11)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `supplier`, `telp`, `alamat`) VALUES
(1, 'Bengkel Bus', '087885466702', 'Jl. Cipondoh'),
(2, 'Mulyono', '0897761231', 'Jl. Pejaten'),
(3, 'Adriani', '0218862532', 'Jl. KH Hasyim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('Admin','Gudang','','') NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `email`, `role`, `password`, `created_at`, `status`, `foto`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', 'Admin', '$2y$10$w6bke0EqgB2lOLz3DK69tuygJmJHFbYU315Yr4OsaWDZRKkm8tRGq', '2021-04-22 15:20:52', 1, 'default.jpg'),
(4, 'Yuni', 'Yuni', 'yuni@gmail.com', 'Gudang', '$2y$10$nSPm5gD3KazZ5A/fWHANGeNLKgwfdXvrrnnbS/r1gbafyZZFkpy7q', '2021-04-26 18:58:41', 1, 'default.jpg'),
(5, 'Purnamasari', 'Purnamasari', 'purnamasari@gmail.com', 'Gudang', '$2y$10$NGNpDnDdUCumWIWCKrR4cu9U3m6gNfXNLhL/4C8osAzGZQK.Iyyei', '2021-04-29 07:05:21', 1, ''),
(6, 'Qoudriana Yuni', 'Qoudriana', 'qoudrianayuni92@gmail.com', 'Gudang', '$2y$10$roVCUtknrkXu2vq7ic0riu5tmK110EAItZFZJuyIScz5hKTnCW9by', '2021-04-29 07:05:22', 1, ''),
(7, 'Jannah', 'Jannah', 'jannah@gmail.com', 'Admin', '$2y$10$bnLW60TN3emXzAu6gj6FbegOhBs7P0Hnm6qFLC3rW5BYIoykq9iL2', '2021-04-29 07:05:24', 1, ''),
(8, 'wef', 'www', 'www@gmail.com', 'Gudang', '$2y$10$iM/prqMjX.2aM604FJZ4CehSr1eS9hHYf1c6jVQvvg4/Cr.tNNrwG', '2021-04-29 07:11:40', 0, 'default.jpg');

-- --------------------------------------------------------

--
-- Structure for view `laporan_pembelian`
--
DROP TABLE IF EXISTS `laporan_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_pembelian`  AS  select `header`.`no_pembelian` AS `no_pembelian`,`header`.`tgl` AS `tgl`,`supplier`.`supplier` AS `supplier`,`user`.`name` AS `user`,`barang`.`nama_barang` AS `barang`,`detail`.`qty` AS `qty`,`detail`.`harga` AS `harga`,`detail`.`qty` * `detail`.`harga` AS `total` from ((((`header` join `supplier` on(`supplier`.`id_supplier` = `header`.`id_supplier`)) join `user` on(`user`.`id_user` = `header`.`id_user`)) join `detail` on(`detail`.`no_pembelian` = `header`.`no_pembelian`)) join `barang` on(`barang`.`id_barang` = `detail`.`id_barang`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_pembelian` (`no_pembelian`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`no_pembelian`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `header`
--
ALTER TABLE `header`
  ADD CONSTRAINT `header_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE,
  ADD CONSTRAINT `header_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
