-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 02:30 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `qpd_form`
--

CREATE TABLE `qpd_form` (
  `id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `pos` varchar(100) NOT NULL,
  `fn` varchar(25) NOT NULL,
  `mn` varchar(25) NOT NULL,
  `ln` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bd` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bill` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `package` varchar(200) NOT NULL,
  `packprice` int(25) NOT NULL,
  `packlist` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `packid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_form`
--

INSERT INTO `qpd_form` (`id`, `company`, `pos`, `fn`, `mn`, `ln`, `address`, `bd`, `age`, `gender`, `contact`, `email`, `bill`, `ref`, `sid`, `package`, `packprice`, `packlist`, `comment`, `status`, `packid`) VALUES
(6, 'asd', 'asd', 'asd', 'asd', 'asd', 'as', 'as', 2, 'male', 12312, 'sdas', 'dasdas', 'dasdasda', 0, '', 0, '', 'sdasdad', 0, '3'),
(7, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '123', 23, 'male', 0, 'asd', 'asd', 'asda', 0, '', 0, '', 'sdasd', 0, '7'),
(8, 'zxc', 'zxc', 'zxc', 'zx', 'czxc', 'zxc', '123', 23, 'male', 0, 'zxc', 'zxc', 'zxc', 0, '', 0, '', 'zxc', 0, '0'),
(9, 'z', 'z', 'z', 'z', 'z', 'z', 'z', 1, 'male', 1, 'z', 'z', 'z', 0, '', 0, '', 'z', 0, '4'),
(10, 'a', 'a', 'a', 'a', 'a', 'a', '2', 2, 'male', 0, 'a', 'a', 'a', 0, '', 0, '', 'a', 0, '4'),
(11, 'q', 'q', 'q', 'q', 'q', 'q', '3', 3, 'male', 3, 'q', 'q', 'q', 0, '', 0, '', 'q', 0, '4'),
(12, 'g', 'g', 'g', 'g', 'g', 'g', 'g', 1, 'male', 0, 'g', 'g', 'g', 0, 'Sample3', 1234, 'PT, , CREA, Sodium, Potassium', 'g', 0, '4'),
(13, 'z', 'z', 'z', 'z', 'z', 'z', '12', 2, 'male', 0, 'z', 'z', 'z', 0, 'Urinalysis', 123, 'U/A, ', 'z', 0, '4'),
(14, 's', 's', 's', 's', 's', 's', 's', 3, 'male', 0, 's', 's', 's', 0, 'Urinalysis', 123, 'U/A, ', 's', 0, ' 4 7');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_package`
--

CREATE TABLE `qpd_package` (
  `id` int(11) NOT NULL,
  `packName` varchar(50) NOT NULL,
  `packPrice` int(11) NOT NULL,
  `packList` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_package`
--

INSERT INTO `qpd_package` (`id`, `packName`, `packPrice`, `packList`, `date`, `status`) VALUES
(3, 'Sample 2', 21222, 'CBC, , Sodium, Potassium', '2017-12-11 11:45:42', 0),
(4, 'Xray', 123, 'CBC, X-RAY, ', '2017-12-11 14:00:08', 0),
(5, 'Sample3', 1234, 'PT, , CREA, Sodium, Potassium', '2017-12-11 14:01:22', 0),
(6, 'Sample Sample', 1000, 'U/A, anti-HAV, X-RAY, , HBA1C', '2017-12-12 13:45:20', 0),
(7, 'Urinalysis', 123, 'U/A, ', '2017-12-14 09:20:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qpd_trans`
--

CREATE TABLE `qpd_trans` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `trans_type` varchar(20) NOT NULL,
  `cashier` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `pos` varchar(20) NOT NULL,
  `fn` varchar(20) NOT NULL,
  `mn` varchar(20) NOT NULL,
  `ln` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bd` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bill` varchar(25) NOT NULL,
  `ref` varchar(25) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `package` varchar(100) NOT NULL,
  `packprice` int(20) NOT NULL,
  `packlist` varchar(100) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `totalprice` int(20) NOT NULL,
  `cash` int(20) NOT NULL,
  `chnge` int(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_trans`
--

INSERT INTO `qpd_trans` (`id`, `trans_type`, `cashier`, `company`, `pos`, `fn`, `mn`, `ln`, `address`, `bd`, `age`, `gender`, `contact`, `email`, `bill`, `ref`, `sid`, `package`, `packprice`, `packlist`, `comment`, `totalprice`, `cash`, `chnge`, `date`, `status`) VALUES
(0000000001, 'CASH', 'NA', 'asd', 'sad', 'asd', 'asd', 'asd', 'asd', 'asd', 12, 'male', '0', 'sa', 'as', 'as', '0', 'Xray', 123, 'CBC, X-RAY, ', 'as', 123, 125, 2, '2017-12-14 21:40:33', 0),
(0000000002, 'ACCOUNT', 'NA', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, '2017-12-14 21:52:25', 0),
(0000000003, 'CASH', 'NA', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, '2017-12-14 21:52:30', 0),
(0000000004, 'CASH', 'NA', 'zxc', 'zxc', 'zxc', 'zx', 'czxc', 'zxc', '123', 23, 'male', '0', 'zxc', 'zxc', 'zxc', '0', '', 0, '', 'zxc', 0, 0, 0, '2017-12-14 21:54:49', 0),
(0000000005, 'ACCOUNT', 'NA', 'zxc', 'zxc', 'zxc', 'zx', 'czxc', 'zxc', '123', 23, 'male', '0', 'zxc', 'zxc', 'zxc', '0', '', 0, '', 'zxc', 0, 0, 0, '2017-12-14 21:55:24', 0),
(0000000006, 'CASH', 'NA', 'zxc', 'zxc', 'zxc', 'zx', 'czxc', 'zxc', '123', 23, 'male', '0', 'zxc', 'zxc', 'zxc', '0', '', 0, '', 'zxc', 0, 2, 2, '2017-12-14 21:56:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qpd_users`
--

CREATE TABLE `qpd_users` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `class` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_users`
--

INSERT INTO `qpd_users` (`id`, `fn`, `ln`, `user`, `pass`, `class`) VALUES
(13, 'David John', 'Puri', 'david', '8d6364ea252f75981935368cbf8578c90cce0482', 'Admin'),
(14, 'Sample', 'Sample', 'cashier', '601f1889667efaebb33b8c12572835da3f027f78', 'Cashier'),
(15, 'Admin', 'admin', 'admin', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `packid` int(20) NOT NULL,
  `packName` varchar(30) NOT NULL,
  `packPrice` int(20) NOT NULL,
  `packList` varchar(50) NOT NULL,
  `cashier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `packid`, `packName`, `packPrice`, `packList`, `cashier`) VALUES
(14, 4, 'Xray', 123, 'CBC, X-RAY, ', 'cashier'),
(15, 7, 'Urinalysis', 123, 'U/A, ', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qpd_form`
--
ALTER TABLE `qpd_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qpd_package`
--
ALTER TABLE `qpd_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qpd_trans`
--
ALTER TABLE `qpd_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qpd_users`
--
ALTER TABLE `qpd_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qpd_form`
--
ALTER TABLE `qpd_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `qpd_package`
--
ALTER TABLE `qpd_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `qpd_trans`
--
ALTER TABLE `qpd_trans`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qpd_users`
--
ALTER TABLE `qpd_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
