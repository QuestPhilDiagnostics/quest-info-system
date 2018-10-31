-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 08:54 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbqis`
--

-- --------------------------------------------------------

--
-- Table structure for table `qpd_class`
--

CREATE TABLE `qpd_class` (
  `ClassID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `MedicalClass` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `QC` varchar(255) NOT NULL,
  `QCLicense` int(22) NOT NULL,
  `CreationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_class`
--

INSERT INTO `qpd_class` (`ClassID`, `TransactionID`, `PatientID`, `MedicalClass`, `Notes`, `QC`, `QCLicense`, `CreationDate`) VALUES
(1, 0000000000001, 1, 'CLASS A - Physically Fit', '', 'Edward S. Agustin', 0, '2018-10-19'),
(2, 0000000000002, 2, 'CLASS A - Physically Fit', '', 'Edward S. Agustin, RN', 0, '2018-10-19'),
(3, 0000000000003, 3, 'CLASS A - Physically Fit', '', 'Edward S. Agustin', 0, '2018-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_items`
--

CREATE TABLE `qpd_items` (
  `ItemID` int(13) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemPrice` decimal(19,2) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemType` varchar(50) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_items`
--

INSERT INTO `qpd_items` (`ItemID`, `ItemName`, `ItemPrice`, `ItemDescription`, `ItemType`, `CreationDate`, `DateUpdate`) VALUES
(1, 'Complete Urinalysis', '75.00', '11 Parameters', 'CashLab', '2018-10-19 15:53:56', '0000-00-00 00:00:00'),
(2, 'Routine Fecalysis', '65.00', ' ', 'CashLab', '2018-10-19 15:54:09', '0000-00-00 00:00:00'),
(3, 'CBC', '125.00', 'Complete Blood Count', 'CashLab', '2018-10-19 15:54:27', '0000-00-00 00:00:00'),
(5, 'Chest XRAY', '200.00', '14x14', 'CashImaging', '2018-10-19 15:55:03', '0000-00-00 00:00:00'),
(6, 'HAU SBA FEMALE', '700.00', 'CBC, U/A, F/A, PT, DT, PE, CXR', 'CashIndustrial', '2018-10-19 16:09:02', '0000-00-00 00:00:00'),
(8, 'Alorica Basic 5', '350.00', 'CBC, U/A, F/A, X-RAY, ChestPA, PE', 'AccountIndustrial', '2018-10-20 09:13:26', '0000-00-00 00:00:00'),
(9, 'HMO Basic Blood Chemistry ', '2000.00', 'FBS, BUA, BUN, CREA, LipidProfile, Sodium, Potassium, Chloride, SGPT, SGOT', 'AccountHMO', '2018-10-20 09:29:37', '0000-00-00 00:00:00'),
(12, 'HAU SBA MALE', '600.00', 'CBC, U/A, F/A, DT, PE, CXR', 'CashIndustrial', '2018-10-20 11:02:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_labresult`
--

CREATE TABLE `qpd_labresult` (
  `LabID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `WhiteBlood` varchar(255) NOT NULL,
  `Hemoglobin` varchar(255) NOT NULL,
  `HemoNR` varchar(255) NOT NULL,
  `Hematocrit` varchar(255) NOT NULL,
  `HemaNR` varchar(255) NOT NULL,
  `Neutrophils` varchar(255) NOT NULL,
  `Lymphocytes` varchar(255) NOT NULL,
  `Monocytes` varchar(255) NOT NULL,
  `CBCOt` varchar(255) NOT NULL,
  `EOS` varchar(10) NOT NULL,
  `BAS` varchar(10) NOT NULL,
  `CBCRBC` varchar(10) NOT NULL,
  `PLT` varchar(10) NOT NULL,
  `FBS` varchar(10) NOT NULL,
  `FBScon` varchar(10) NOT NULL,
  `BUA` varchar(10) NOT NULL,
  `BUAcon` varchar(10) NOT NULL,
  `BUN` varchar(10) NOT NULL,
  `BUNcon` varchar(10) NOT NULL,
  `CREA` varchar(10) NOT NULL,
  `CREAcon` varchar(10) NOT NULL,
  `CHOL` varchar(10) NOT NULL,
  `CHOLcon` varchar(10) NOT NULL,
  `TRIG` varchar(10) NOT NULL,
  `TRIGcon` varchar(10) NOT NULL,
  `HDL` varchar(10) NOT NULL,
  `HDLcon` varchar(10) NOT NULL,
  `LDL` varchar(10) NOT NULL,
  `LDLcon` varchar(10) NOT NULL,
  `CH` varchar(10) NOT NULL,
  `VLDL` varchar(10) NOT NULL,
  `Na` varchar(10) NOT NULL,
  `K` varchar(10) NOT NULL,
  `Cl` varchar(10) NOT NULL,
  `ALT` varchar(10) NOT NULL,
  `AST` varchar(10) NOT NULL,
  `HB` varchar(10) NOT NULL,
  `Meth` varchar(255) NOT NULL,
  `Tetra` varchar(255) NOT NULL,
  `DT` varchar(255) NOT NULL,
  `HBsAg` varchar(255) NOT NULL,
  `PregTest` varchar(255) NOT NULL,
  `SeroOt` varchar(255) NOT NULL,
  `FecColor` varchar(255) NOT NULL,
  `FecCon` varchar(255) NOT NULL,
  `FecMicro` varchar(255) NOT NULL,
  `FecOt` varchar(255) NOT NULL,
  `UriColor` varchar(255) NOT NULL,
  `UriTrans` varchar(255) NOT NULL,
  `UriPh` varchar(255) NOT NULL,
  `UriSp` varchar(255) NOT NULL,
  `UriPro` varchar(255) NOT NULL,
  `UriGlu` varchar(255) NOT NULL,
  `RBC` varchar(255) NOT NULL,
  `WBC` varchar(255) NOT NULL,
  `Bac` varchar(255) NOT NULL,
  `MThreads` varchar(255) NOT NULL,
  `ECells` varchar(255) NOT NULL,
  `Amorph` varchar(255) NOT NULL,
  `CoAx` varchar(255) NOT NULL,
  `UriOt` varchar(255) NOT NULL DEFAULT 'N/A',
  `LE` varchar(10) NOT NULL,
  `NIT` varchar(10) NOT NULL,
  `URO` varchar(10) NOT NULL,
  `BLD` varchar(10) NOT NULL,
  `KET` varchar(10) NOT NULL,
  `BIL` varchar(10) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Printed` varchar(255) NOT NULL,
  `Clinician` varchar(60) NOT NULL,
  `RMTLIC` varchar(10) NOT NULL,
  `PATHLIC` varchar(10) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_labresult`
--

INSERT INTO `qpd_labresult` (`LabID`, `TransactionID`, `PatientID`, `WhiteBlood`, `Hemoglobin`, `HemoNR`, `Hematocrit`, `HemaNR`, `Neutrophils`, `Lymphocytes`, `Monocytes`, `CBCOt`, `EOS`, `BAS`, `CBCRBC`, `PLT`, `FBS`, `FBScon`, `BUA`, `BUAcon`, `BUN`, `BUNcon`, `CREA`, `CREAcon`, `CHOL`, `CHOLcon`, `TRIG`, `TRIGcon`, `HDL`, `HDLcon`, `LDL`, `LDLcon`, `CH`, `VLDL`, `Na`, `K`, `Cl`, `ALT`, `AST`, `HB`, `Meth`, `Tetra`, `DT`, `HBsAg`, `PregTest`, `SeroOt`, `FecColor`, `FecCon`, `FecMicro`, `FecOt`, `UriColor`, `UriTrans`, `UriPh`, `UriSp`, `UriPro`, `UriGlu`, `RBC`, `WBC`, `Bac`, `MThreads`, `ECells`, `Amorph`, `CoAx`, `UriOt`, `LE`, `NIT`, `URO`, `BLD`, `KET`, `BIL`, `Received`, `Printed`, `Clinician`, `RMTLIC`, `PATHLIC`, `CreationDate`, `DateUpdate`) VALUES
(1, 0000000000001, 1, '5.21', '136', 'F:112-157', '0.42', 'F:0.34-0.45', '56', '22', '12', 'NORMAL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NEGATIVE', 'NEGATIVE', 'NEGATIVE', 'N/A', 'NEGATIVE', 'N/A', 'BROWN', 'FORMED', 'NO INTESTINAL PARASITE SEEN', '', 'LIGHT YELLOW', 'HAZY', '6.5', '1.010', 'Negative', 'Negative', '0-2', '0-2', 'NONE', 'NONE', 'Few', 'NONE', 'NONE', 'NORMAL', '', '', '', '', '', '', 'Adelbert D. Gonzales,RMT', 'Emiliano Dela Cruz,MD', '', '', '', '2018-10-19 16:12:54', '0000-00-00 00:00:00'),
(2, 0000000000002, 2, '109', '12', 'N/A', '12', 'N/A', '34-74', '32-53', '5-12', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NEGATIVE', 'POSITIVE', 'NEGATIVE', 'REACTIVE', 'NEGATIVE', '', 'LIGHT BROWN', 'SEMI-FORMED', 'NO INTESTINAL PARASITE SEEN', '', 'LIGHT YELLOW', 'HAZY', '6.0', '1.000', 'Negative', 'Trace', '2-3', '5-5', 'Few', 'Rare', 'Few', 'Few', 'Few', 'N/A', '', '', '', '', '', '', 'Adelbert D. Gonzales,RMT', 'Emiliano Dela Cruz,MD', '', '', '', '2018-10-19 16:46:47', '0000-00-00 00:00:00'),
(3, 0000000000003, 3, '4.23', '142', 'M:137-175', '0.42', 'M:0.40-0.51', '34', '22', '12', 'NORMAL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NEGATIVE', 'NEGATIVE', 'NEGATIVE', 'N/A', 'N/A', 'N/A', 'DARK BROWN', 'FORMED', 'NO INTESTINAL PARASITE SEEN', 'NONE', 'STRAW', 'CLEAR', '6.0', '1.010', 'Negative', 'Negative', '0-2', '0-2', 'NONE', 'Rare', 'Rare', 'NONE', 'NONE', 'NORMAL', '', '', '', '', '', '', 'Adelbert D. Gonzales,RMT', 'Emiliano Dela Cruz,MD', '', '', '', '2018-10-20 13:49:23', '2018-10-20 13:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_medhis`
--

CREATE TABLE `qpd_medhis` (
  `MedHisID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `asth` varchar(5) NOT NULL DEFAULT 'NO',
  `tb` varchar(5) NOT NULL DEFAULT 'NO',
  `dia` varchar(5) NOT NULL DEFAULT 'NO',
  `hb` varchar(5) NOT NULL DEFAULT 'NO',
  `hp` varchar(5) NOT NULL DEFAULT 'NO',
  `kp` varchar(5) NOT NULL DEFAULT 'NO',
  `ab` varchar(5) NOT NULL DEFAULT 'NO',
  `jbs` varchar(5) NOT NULL DEFAULT 'NO',
  `pp` varchar(5) NOT NULL DEFAULT 'NO',
  `mh` varchar(5) NOT NULL DEFAULT 'NO',
  `fs` varchar(5) NOT NULL DEFAULT 'NO',
  `alle` varchar(5) NOT NULL DEFAULT 'NO',
  `ct` varchar(5) NOT NULL DEFAULT 'NO',
  `hep` varchar(5) NOT NULL DEFAULT 'NO',
  `std` varchar(5) NOT NULL DEFAULT 'NO',
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_medhis`
--

INSERT INTO `qpd_medhis` (`MedHisID`, `TransactionID`, `PatientID`, `asth`, `tb`, `dia`, `hb`, `hp`, `kp`, `ab`, `jbs`, `pp`, `mh`, `fs`, `alle`, `ct`, `hep`, `std`, `CreationDate`, `DateUpdate`) VALUES
(1, 0000000000001, 1, 'YES', 'NO', 'NO', 'YES', 'NO', 'NO', 'NO', 'NO', 'NO', 'YES', 'NO', 'NO', 'NO', 'NO', 'NO', '2018-10-19 16:11:08', '2018-10-20 13:40:25'),
(2, 0000000000002, 2, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'YES', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '2018-10-19 16:43:55', '0000-00-00 00:00:00'),
(3, 0000000000003, 3, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '2018-10-20 13:42:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_patient`
--

CREATE TABLE `qpd_patient` (
  `PatientID` int(13) NOT NULL,
  `PatientRef` varchar(50) NOT NULL,
  `PatientType` varchar(50) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Position` varchar(75) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `MiddleName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthdate` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_patient`
--

INSERT INTO `qpd_patient` (`PatientID`, `PatientRef`, `PatientType`, `CompanyName`, `Position`, `FirstName`, `MiddleName`, `LastName`, `Address`, `Birthdate`, `Email`, `Age`, `Gender`, `ContactNo`, `Notes`, `SID`, `CreationDate`, `DateUpdate`) VALUES
(1, '26937854', 'CASH', 'HAU SBA', 'OJT', 'ANNA MARIE', 'SANTOS', 'CANLAS', 'ANGELES, PAMPANGA', '12-12-96', '-', 21, 'FEMALE', '09056023234', '', '', '2018-10-19 16:10:01', '0000-00-00 00:00:00'),
(2, '94563017', 'CASH', 'HAU', 'OJT', 'JUAN ', 'MARQUEZ', 'DELA CRUZ', 'ANGELES CITY', '08-19-1999', 'JUANDELACRUZ@GMAIL.COM', 19, 'MALE', '096584712', '', '', '2018-10-19 16:40:42', '0000-00-00 00:00:00'),
(3, '93052148', 'CASH', 'HAU ICT', 'OJT', 'DAVE ANGELO', 'PAGUIO', 'MANALILI', 'PORAC, PAMPANGA', '07-10-96', 'dapmanalili@gmail.com', 22, 'MALE', '09179631526', '', '', '2018-10-20 08:33:10', '2018-10-20 13:43:23'),
(4, '21035876', 'CASH', 'HAU ICT', 'OJT', 'ANGELA MAE', 'PANGILINAN', 'SEMBRANO', 'ANGELES PAMPANGA', '01-01-1996', 'angelmae101@gmail.com', 22, 'FEMALE', '09174563256', '', '', '2018-10-20 08:35:11', '0000-00-00 00:00:00'),
(5, '41835792', '', 'ALORICA TMO', 'CSR', 'MARK IVAN', 'DE JESUS', 'PINEDA', 'PANDAN, ANGELES CITY', '03-20-1990', '', 28, 'MALE', '09152362365', '', '', '2018-10-20 09:16:23', '0000-00-00 00:00:00'),
(6, '47813956', '', 'SUPPORT NINJA', 'DEPENDENT', 'AMALIA', 'FLORES', 'PINEDA', 'MAGALANG PAMPANGA', '06-12-1952', '', 66, 'FEMALE', '09056232456', '', '', '2018-10-20 09:31:32', '2018-10-20 09:31:32'),
(7, '43571682', 'CASH', 'WALK-IN', '-', 'ANNALYN', 'SAMUEL', 'SAMSON', 'BALIBAGO, ANGELES CITY', '02-02-1990', '', 28, 'FEMALE', '09163254562', '', '', '2018-10-20 11:07:10', '0000-00-00 00:00:00'),
(8, '16589273', 'CASH', 'DIVINE GRACE', '-', 'SHARMAINE', 'AMURILLO', 'SAN JOSE', 'MALABANIAS, ANGELES CITY, PAMPANGA', '08-08-1990', '', 28, 'FEMALE', '09456223654', '', '', '2018-10-20 11:52:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_pe`
--

CREATE TABLE `qpd_pe` (
  `PExamID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `skin` varchar(255) NOT NULL,
  `hn` varchar(255) NOT NULL,
  `cbl` varchar(255) NOT NULL,
  `ch` varchar(255) NOT NULL,
  `abdo` varchar(255) NOT NULL,
  `extre` varchar(255) NOT NULL,
  `ot` varchar(255) NOT NULL,
  `find` varchar(255) NOT NULL,
  `Doctor` varchar(255) NOT NULL,
  `License` int(22) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_pe`
--

INSERT INTO `qpd_pe` (`PExamID`, `TransactionID`, `PatientID`, `skin`, `hn`, `cbl`, `ch`, `abdo`, `extre`, `ot`, `find`, `Doctor`, `License`, `CreationDate`, `DateUpdate`) VALUES
(1, 0000000000001, 1, 'YES', 'YES', 'YES', 'NO', 'YES', 'YES', '', '', 'FROILAN A. CANLAS, M.D.', 82498, '2018-10-19 16:11:08', '2018-10-20 07:40:55'),
(2, 0000000000002, 2, 'NO', 'NO', 'NO', 'YES', 'NO', 'NO', '', 'NORMAL', 'FROILAN A. CANLAS, M.D.', 82498, '2018-10-19 16:43:55', '0000-00-00 00:00:00'),
(3, 0000000000003, 3, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', '', 'TATOO (L) ARM', 'FROILAN A. CANLAS, M.D.', 82498, '2018-10-20 13:42:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_trans`
--

CREATE TABLE `qpd_trans` (
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `TransactionRef` varchar(50) NOT NULL,
  `PatientID` int(13) NOT NULL,
  `TransactionType` varchar(50) NOT NULL,
  `Cashier` varchar(50) NOT NULL,
  `ItemID` varchar(100) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemQTY` varchar(50) NOT NULL,
  `ItemPrice` varchar(255) NOT NULL,
  `Biller` varchar(50) NOT NULL,
  `LOE` int(13) NOT NULL,
  `AN` varchar(50) NOT NULL,
  `AC` varchar(50) NOT NULL,
  `Referral` varchar(50) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `TotalPrice` varchar(50) NOT NULL,
  `PaidIn` varchar(50) NOT NULL,
  `Discount` varchar(50) NOT NULL,
  `PaidOut` varchar(50) NOT NULL,
  `GrandTotal` varchar(50) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_trans`
--

INSERT INTO `qpd_trans` (`TransactionID`, `TransactionRef`, `PatientID`, `TransactionType`, `Cashier`, `ItemID`, `ItemName`, `ItemDescription`, `ItemQTY`, `ItemPrice`, `Biller`, `LOE`, `AN`, `AC`, `Referral`, `Notes`, `SID`, `TotalPrice`, `PaidIn`, `Discount`, `PaidOut`, `GrandTotal`, `TransactionDate`) VALUES
(0000000000001, '26937854', 1, 'CASH', 'CashCashier', '6', 'HAU SBA FEMALE', 'CBC, U/A, F/A, PT, DT, PE, CXR', '1', '700.00', '', 0, '', '', '', '', '', '700', '700.00', '0.00', '0.00', '700.00', '2018-10-19 16:10:01'),
(0000000000002, '94563017', 2, 'CASH', 'CashCashier', '6', 'HAU SBA FEMALE', 'CBC, U/A, F/A, PT, DT, PE, CXR', '1', '700.00', '', 0, '', '', '', '', '', '700', '800.00', '0.00', '100.00', '700.00', '2018-10-19 16:40:41'),
(0000000000003, '93052148', 3, 'CASH', 'CashCashier', '6', 'HAU SBA FEMALE', 'CBC, U/A, F/A, PT, DT, PE, CXR', '1', '700.00', '', 0, '', '', '', '', '', '700', '1000.00', '0.00', '300.00', '700.00', '2018-10-20 08:33:10'),
(0000000000004, '21035876', 4, 'CASH', 'CashCashier', '6', 'HAU SBA FEMALE', 'CBC, U/A, F/A, PT, DT, PE, CXR', '1', '700.00', '', 0, '', '', '', '', '', '700', '700.00', '0.00', '0.00', '700.00', '2018-10-20 08:35:11'),
(0000000000005, '41835792', 5, 'ACCOUNT', 'AccountCashier', '8', 'Alorica Basic 5', 'CBC, U/A, F/A, X-RAY, ChestPA, PE', '1', '350.00', 'ALORICA TMO', 0, '', '', 'ALORICA TMO', '', '', '350.00', '', '', '', '350.00', '2018-10-20 09:16:23'),
(0000000000006, '47813956', 6, 'ACCOUNT', 'AccountCashier', '9', 'HMO Basic Blood Chemistry ', 'FBS, BUA, BUN, CREA, LipidProfile, Sodium, Potassium, Chloride, SGPT, SGOT', '1', '2500.00', 'INTELLICARE', 123456789, '08-02012-2013-00', '-', 'SUPPORT NINJA', '', '123456789', '2500.00', '', '', '', '2500.00', '2018-10-20 09:31:32'),
(0000000000007, '43571682', 7, 'CASH', 'CashCashier, CashCashier, CashCashier', '5, 1, 2', 'Chest XRAY, Complete Urinalysis, Routine Fecalysis', '14x14, 11 Parameters,  ', '3', '200.00,  75.00,  65.00', '', 0, '', '', '', '', '', '340', '500.00, 500.00, 500.00', '0.00, 0.00, 0.00', '160.00, 160.00, 160.00', '200.00, 75.00, 65.00', '2018-10-20 11:07:10'),
(0000000000008, '16589273', 8, 'CASH', 'CashCashier, CashCashier', '1, 3', 'Complete Urinalysis, CBC', '11 Parameters, Complete Blood Count', '2', '75.00,  125.00', '', 0, '', '', '', '', '', '200', '500.00, 500.00', '0.00, 0.00', '300.00, 300.00', '75.00, 125.00', '2018-10-20 11:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_vital`
--

CREATE TABLE `qpd_vital` (
  `VitalsID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `bmi` varchar(255) NOT NULL,
  `bp` varchar(255) NOT NULL,
  `pr` varchar(255) NOT NULL,
  `rr` varchar(255) NOT NULL,
  `uod` varchar(255) NOT NULL,
  `uos` varchar(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `cos` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `hearing` varchar(255) NOT NULL,
  `hosp` varchar(255) NOT NULL,
  `opr` varchar(255) NOT NULL,
  `pm` varchar(255) NOT NULL,
  `smoker` varchar(255) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `lmp` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_vital`
--

INSERT INTO `qpd_vital` (`VitalsID`, `TransactionID`, `PatientID`, `height`, `weight`, `bmi`, `bp`, `pr`, `rr`, `uod`, `uos`, `cod`, `cos`, `cv`, `hearing`, `hosp`, `opr`, `pm`, `smoker`, `ad`, `lmp`, `Notes`, `CreationDate`, `DateUpdate`) VALUES
(1, 0000000000001, 1, '5ft', '48kg', '20/N', '120/80', '71', '21', '', '', '20/20', '20/20', '15/15', 'Normal', '-', '-', '-', '-', '-', '10/01/2018', '', '2018-10-19 16:11:08', '2018-10-20 13:40:38'),
(2, 0000000000002, 2, '79FT', '58KG', '20/N', '120/90', '12', '11', '12', '12', '12', '12', '123', '123', '123', '123', '123', '123', '123', '123', '123', '2018-10-19 16:43:55', '0000-00-00 00:00:00'),
(3, 0000000000003, 3, '6ft', '68kg', '', '120/80', '79', '18', '20/20', '20/20', '', '', '15/15', 'Normal', '-', '-', '-', '-', '-', '-', '', '2018-10-20 13:42:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_xray`
--

CREATE TABLE `qpd_xray` (
  `XrayID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `Comment` text NOT NULL,
  `Impression` varchar(255) NOT NULL,
  `Radiologist` varchar(255) NOT NULL,
  `QA` varchar(255) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_xray`
--

INSERT INTO `qpd_xray` (`XrayID`, `TransactionID`, `PatientID`, `Comment`, `Impression`, `Radiologist`, `QA`, `CreationDate`, `DateUpdate`) VALUES
(1, 0000000000001, 1, 'Lung fields are clear. Heart is not enlarged. Diaphragm, its sulci visualized bone are intact.         		', 'NORMAL CHEST FINDINGS            		', 'Salvador Ramirez,MD.DPBR', '', '2018-10-19 16:13:18', '2018-10-20 07:53:00'),
(2, 0000000000002, 2, 'Lung fields are clear. Heart is not enlarged. Diaphragm, its sulci visualized bone are intact.        		', 'NORMAL CHEST FINDINGS            		', 'Salvador Ramirez,MD.DPBR', '', '2018-10-19 16:48:22', '2018-10-20 07:53:31'),
(3, 0000000000003, 3, 'No abnormal densities seen in both lung parenchyma. The heart is normal in size and configuration. Aorta is unremarkable. The diaphragms, costrophrenic sulci and bony thorax are intact.', 'NORMAL CHEST FINDINGS', 'Salvador Ramirez,MD.DPBR', '', '2018-10-20 13:54:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `class` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `class`) VALUES
(2, 'HCAVillegas', 'questphil.it@gmail.com', 'fc964f6a31b852efce2086f2cf1c22f4', 'Y', '043667ec0b15bc6cfd95a99952195a3f', 'Doctor'),
(3, 'AccountCashier', 'questphil.info@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', 'e8f0686061140ad8d2fcb3f0332a3975', 'CashierACCOUNT'),
(4, 'CashCashier', 'questphil.billing@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', 'c06692ac60a67a5de3b9ad6150f79e91', 'CashierCASH'),
(5, 'RecepMain', 'questphil.recep@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', '8738ae11525f8bb95fdc41f8dbec9ed6', 'Medical Services'),
(6, 'LabMain', 'questphil.lab@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', '0687572fe80c920600e417b8aa9f4454', 'Laboratory'),
(7, 'Imaging', 'questphil.imaging@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', '5072b2507e9857083567d2f8d49d8a31', 'Imaging');

-- --------------------------------------------------------

--
-- Table structure for table `temp_patient`
--

CREATE TABLE `temp_patient` (
  `PatientID` int(13) NOT NULL,
  `PatientRef` varchar(50) NOT NULL,
  `PatientType` varchar(50) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Position` varchar(75) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `MiddleName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthdate` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `TransactionRef` varchar(50) NOT NULL,
  `PatientID` int(13) NOT NULL,
  `TransactionType` varchar(50) NOT NULL,
  `Cashier` varchar(255) NOT NULL,
  `ItemID` varchar(255) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemQTY` varchar(255) NOT NULL,
  `ItemPrice` varchar(255) NOT NULL,
  `Biller` varchar(50) NOT NULL,
  `LOE` int(13) NOT NULL,
  `AN` varchar(50) NOT NULL,
  `AC` varchar(50) NOT NULL,
  `Referral` varchar(50) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `TotalPrice` decimal(19,2) NOT NULL,
  `GrandTotal` decimal(19,2) NOT NULL,
  `PaidIn` decimal(19,2) NOT NULL,
  `Discount` decimal(19,2) NOT NULL,
  `DiscountPer` int(11) NOT NULL,
  `PaidOut` decimal(19,2) NOT NULL,
  `PatientRef` varchar(50) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Position` varchar(75) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `MiddleName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthdate` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qpd_class`
--
ALTER TABLE `qpd_class`
  ADD PRIMARY KEY (`ClassID`),
  ADD UNIQUE KEY `ClassRef_2` (`TransactionID`),
  ADD KEY `ClassRef` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_items`
--
ALTER TABLE `qpd_items`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `qpd_labresult`
--
ALTER TABLE `qpd_labresult`
  ADD PRIMARY KEY (`LabID`),
  ADD UNIQUE KEY `LabRef_2` (`TransactionID`),
  ADD KEY `LabRef` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_medhis`
--
ALTER TABLE `qpd_medhis`
  ADD PRIMARY KEY (`MedHisID`),
  ADD UNIQUE KEY `MedHisRef` (`TransactionID`),
  ADD KEY `MedHisRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_patient`
--
ALTER TABLE `qpd_patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD UNIQUE KEY `id` (`PatientID`),
  ADD UNIQUE KEY `PatientRef` (`PatientRef`),
  ADD KEY `id_2` (`PatientID`),
  ADD KEY `id_3` (`PatientID`);

--
-- Indexes for table `qpd_pe`
--
ALTER TABLE `qpd_pe`
  ADD PRIMARY KEY (`PExamID`),
  ADD UNIQUE KEY `PExamRef` (`TransactionID`),
  ADD KEY `PExamRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_trans`
--
ALTER TABLE `qpd_trans`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `TransactionRef` (`TransactionRef`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `qpd_vital`
--
ALTER TABLE `qpd_vital`
  ADD PRIMARY KEY (`VitalsID`),
  ADD UNIQUE KEY `VitalsRef` (`TransactionID`),
  ADD KEY `VitalsRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_xray`
--
ALTER TABLE `qpd_xray`
  ADD PRIMARY KEY (`XrayID`),
  ADD UNIQUE KEY `XrayRef` (`TransactionID`),
  ADD KEY `XrayRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `temp_patient`
--
ALTER TABLE `temp_patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD UNIQUE KEY `id` (`PatientID`),
  ADD KEY `id_2` (`PatientID`),
  ADD KEY `id_3` (`PatientID`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`TransactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qpd_class`
--
ALTER TABLE `qpd_class`
  MODIFY `ClassID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qpd_items`
--
ALTER TABLE `qpd_items`
  MODIFY `ItemID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `qpd_labresult`
--
ALTER TABLE `qpd_labresult`
  MODIFY `LabID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qpd_medhis`
--
ALTER TABLE `qpd_medhis`
  MODIFY `MedHisID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qpd_patient`
--
ALTER TABLE `qpd_patient`
  MODIFY `PatientID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `qpd_pe`
--
ALTER TABLE `qpd_pe`
  MODIFY `PExamID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qpd_trans`
--
ALTER TABLE `qpd_trans`
  MODIFY `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `qpd_vital`
--
ALTER TABLE `qpd_vital`
  MODIFY `VitalsID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qpd_xray`
--
ALTER TABLE `qpd_xray`
  MODIFY `XrayID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_patient`
--
ALTER TABLE `temp_patient`
  MODIFY `PatientID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
