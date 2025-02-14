-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2025 at 02:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dict_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'dictaklan', '$2y$10$fLK8s7ZDnM.1lE7XMP.J6OuPbQ.DPUVKBo7rENnQY7gYq0xAzsKJy', 'DICT', 'AKLAN', 'logo-mini.svg', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `altavas`
--

CREATE TABLE `altavas` (
  `id` int(11) NOT NULL,
  `projectname_altavas` varchar(255) NOT NULL,
  `locality_altavas` varchar(255) NOT NULL,
  `address_project` varchar(255) NOT NULL,
  `aps_altavas` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `altavas`
--

INSERT INTO `altavas` (`id`, `projectname_altavas`, `locality_altavas`, `address_project`, `aps_altavas`, `priority`) VALUES
(16, 'IPTB', 'Balabag Elementary School', 'Malay', 0, 1),
(17, 'IPTB', 'Balabag National High School', 'Malay', 0, 2),
(18, 'IPTB', 'Bolabog: BeachFront 36', 'Malay', 0, 3),
(19, 'IPTB', 'Bolabog: BeachFront 37', 'Malay', 0, 4),
(20, 'IPTB', 'Bolabog: BeachFront 38', 'Malay', 0, 5),
(21, 'IPTB', 'Bolabog: BeachFront 79', 'Malay', 0, 6),
(22, 'IPTB', 'Boracay Island Municipal Disaster Risk Reduction Office', 'Malay', 0, 7),
(23, 'IPTB', 'Station 1: BeachFront 10', 'Malay', 0, 8),
(24, 'IPTB', 'Station 1: BeachFront 12', 'Malay', 0, 9),
(25, 'IPTB', 'Station 1: BeachFront 13', 'Malay', 0, 10),
(26, 'IPTB', 'Station 1: BeachFront 3', 'Malay', 0, 11),
(27, 'IPTB', 'Station 1: BeachFront 5', 'Malay', 0, 12),
(28, 'IPTB', 'Station 1: BeachFront 74', 'Malay', 0, 13),
(29, 'IPTB', 'Station 1: BeachFront 75', 'Malay', 0, 14),
(30, 'IPTB', 'Station 1: BeachFront 8', 'Malay', 0, 15),
(31, 'IPTB', 'Station 1: BeachFront 9', 'Malay', 0, 16),
(32, 'IPTB', 'Station 2: BeachFront 15 ', 'Malay', 0, 17),
(33, 'IPTB', 'Station 2: BeachFront 20', 'Malay', 0, 18),
(34, 'IPTB', 'Station 2: BeachFront 24', 'Malay', 0, 19),
(35, 'IPTB', 'Station 3: BeachFront 26', 'Malay', 0, 20),
(36, 'IPTB', 'Station 3: BeachFront 27', 'Malay', 0, 21),
(37, 'IPTB', 'Station 3: BeachFront 28', 'Malay', 0, 22),
(38, 'IPTB', 'Station 3: BeachFront 29', 'Malay', 0, 23),
(39, 'IPTB', 'Station 3: BeachFront 31', 'Malay', 0, 24),
(40, 'IPTB', 'Station 3: BeachFront 33', 'Malay', 0, 25),
(41, 'IPTB', 'Station 3: BeachFront 34', 'Malay', 0, 26),
(42, 'IPTB', 'Station 3: BeachFront 35', 'Malay', 0, 27),
(43, 'IPTB', 'Bureau of Immigration', 'Malay', 0, 28),
(44, 'IPTB', 'Cagban Jetty Port - AP 1', 'Malay', 0, 29),
(45, 'IPTB', 'Cagban Jetty Port - AP 10', 'Malay', 0, 30),
(46, 'IPTB', 'Cagban Jetty Port - AP 11', 'Malay', 0, 31),
(47, 'IPTB', 'Cagban Jetty Port - AP 12', 'Malay', 0, 32),
(48, 'IPTB', 'Cagban Jetty Port - AP 2', 'Malay', 0, 33),
(49, 'IPTB', 'Cagban Jetty Port - AP 3', 'Malay', 0, 34),
(50, 'IPTB', 'Cagban Jetty Port - AP 4', 'Malay', 0, 35),
(51, 'IPTB', 'Cagban Jetty Port - AP 5', 'Malay', 0, 36),
(52, 'IPTB', 'Cagban Jetty Port - AP 6', 'Malay', 0, 37),
(53, 'IPTB', 'Cagban Jetty Port - AP 7', 'Malay', 0, 38),
(54, 'IPTB', 'Cagban Jetty Port - AP 8', 'Malay', 0, 39),
(55, 'IPTB', 'Cagban Jetty Port - AP 9', 'Malay', 0, 40),
(56, 'IPTB', 'PNP Boracay Police Station', 'Malay', 0, 41),
(57, 'IPTB', 'Tulubhan / Capitan Martin ', 'Malay', 0, 42),
(58, 'IPTB', 'Yapak Barangay Plaza', 'Malay', 0, 43),
(59, 'IPTB', 'Yapak Elementary School', 'Malay', 0, 44),
(60, 'IPTB', 'Balabag Barangay Plaza', 'Malay', 0, 45),
(61, 'IPTB', 'Bureau of Fire Protection', 'Malay', 0, 46),
(62, 'IPTB', 'Manoc-Manoc Barangay Hall', 'Malay', 0, 47),
(63, 'IPTB', 'Manoc-Manoc Covered Court', 'Malay', 0, 48),
(64, 'IPTB', 'Manoc-Manoc Elementary School', 'Malay', 0, 49),
(65, 'IPTB', 'BIATF (BOSS) / DENR', 'Malay', 0, 50),
(66, 'IPTB', 'Boracay One Stop Shop', 'Malay', 0, 51),
(67, 'IPTB', 'Lamberto Tirol National High School', 'Malay', 0, 52),
(68, 'IPTB', 'Malay Action Center Mayor Office', 'Malay', 0, 53),
(69, 'IPTB', 'Malay Rural Health Unit - ANNEX', 'Malay', 0, 54),
(70, 'IPTB', 'Manoc-Manoc National High School', 'Malay', 0, 55),
(71, 'IPTB', 'Tambisaan Port', 'Malay', 0, 56),
(74, 'test', 'test', 'test', 1, 57),
(75, '1', '1', '1', 1, 58),
(77, 'fdfd', 'dstfgdsf', 'dfdf', 0, 59),
(78, 'tesss', 'tesss', 'tess', 11, 60),
(79, 'abc', 'abxc', 'abvc', 1, 61),
(80, 'IPTB', 'test', 'etest', 0, 62);

-- --------------------------------------------------------

--
-- Table structure for table `balete`
--

CREATE TABLE `balete` (
  `id` int(11) NOT NULL,
  `projectname_balete` varchar(255) NOT NULL,
  `locality_balete` varchar(255) NOT NULL,
  `address_project` varchar(255) NOT NULL,
  `aps_balete` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balete`
--

INSERT INTO `balete` (`id`, `projectname_balete`, `locality_balete`, `address_project`, `aps_balete`, `priority`) VALUES
(6, 'MIS Aklan', 'Altavas District Hospital', 'Altavas', 3, 1),
(7, 'MIS Aklan', 'Ibajay District  Hospital', 'Ibajay', 3, 2),
(8, 'MIS Aklan', 'Provincial Capitol of Aklan', 'Kalibo', 3, 3),
(9, 'MIS Aklan', 'Dr. Rafael S. Tumbokon Memorial Hospital', 'Kalibo', 3, 4),
(10, 'MIS Aklan', 'Libacao Municipal Infirmary ', 'Libacao', 3, 5),
(11, 'MIS Aklan', 'Libacao College of Science and Technology', 'Libacao', 3, 6),
(12, 'MIS Aklan', 'Don. Leovigildo N. Diapo Sr. Municipal Hospital', 'Madalag', 3, 7),
(13, 'MIS Aklan', 'Dr. Ramon B. Legaspi Sr. Memorial Hospital', 'Makato', 3, 8),
(14, 'MIS Aklan', 'Ciriaco S. Tirol Hospital ', 'Malay', 3, 9),
(15, 'MIS Aklan', 'Malay Municipal Hospital', 'Malay', 3, 10),
(19, 'TEST', 'E', 'E', 1, 11),
(21, 'test', 'test', 'test', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `banga`
--

CREATE TABLE `banga` (
  `id` int(11) NOT NULL,
  `projectname_banga` varchar(255) NOT NULL,
  `barangay_banga` varchar(255) NOT NULL,
  `project_3` varchar(255) NOT NULL,
  `aps_banga` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banga`
--

INSERT INTO `banga` (`id`, `projectname_banga`, `barangay_banga`, `project_3`, `aps_banga`, `priority`) VALUES
(4, 'PIALEOS', 'Habana Barangay Hall', 'Buruanga', 1, 1),
(5, 'PIALEOS', 'Aliputos Barangay Health Station', 'Numancia', 1, 2),
(6, 'PIALEOS', 'Panayakan Barangay Hall', 'Tangalan', 1, 3),
(7, 'test', 'test', 'test', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `batan`
--

CREATE TABLE `batan` (
  `id` int(11) NOT NULL,
  `projectname_batan` varchar(255) NOT NULL,
  `barangay_batan` varchar(255) NOT NULL,
  `project_2` varchar(255) NOT NULL,
  `aps_batan` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batan`
--

INSERT INTO `batan` (`id`, `projectname_batan`, `barangay_batan`, `project_2`, `aps_batan`, `priority`) VALUES
(4, 'MUNICIPAL', 'Bagto Barangay Hall', '', 3, 1),
(6, 'test', 'test', 'test', 0, 1),
(7, 'tyetete', 'tetet', '', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `buruanga`
--

CREATE TABLE `buruanga` (
  `id` int(11) NOT NULL,
  `projectname_buruanga` varchar(255) NOT NULL,
  `barangay_buruanga` varchar(255) NOT NULL,
  `project_4` varchar(255) NOT NULL,
  `aps_buruanga` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buruanga`
--

INSERT INTO `buruanga` (`id`, `projectname_buruanga`, `barangay_buruanga`, `project_4`, `aps_buruanga`, `priority`) VALUES
(3, 'PICS-PP', 'Aklan State University Banga Campus', 'Banga', 3, 1),
(4, 'PICS-PP', 'Aklan State University Ibajay Campus', 'Ibajay', 3, 2),
(5, 'PICS-PP', 'Aklan State University Kalibo Campus', 'Kalibo', 3, 3),
(6, 'PICS-PP', 'Aklan State University Makato Campus', 'Makato', 3, 4),
(7, 'PICS-PP', 'Aklan State University New Washington Campus', 'New Washington', 3, 5),
(9, 'test', 'test', 'test', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `electric_bill`
--

CREATE TABLE `electric_bill` (
  `id` int(12) NOT NULL,
  `month_2` varchar(255) NOT NULL,
  `month_1` varchar(30) NOT NULL,
  `date_2` date NOT NULL,
  `gtc` int(11) NOT NULL,
  `ur` int(255) NOT NULL,
  `dr` int(11) NOT NULL,
  `uc` int(11) NOT NULL,
  `evax` int(11) NOT NULL,
  `other_ca` int(11) NOT NULL,
  `e_photo` varchar(255) NOT NULL,
  `annex` int(11) NOT NULL,
  `total_amount_2` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electric_bill`
--

INSERT INTO `electric_bill` (`id`, `month_2`, `month_1`, `date_2`, `gtc`, `ur`, `dr`, `uc`, `evax`, `other_ca`, `e_photo`, `annex`, `total_amount_2`) VALUES
(18, 'July 20, 2024', 'Aug. 20, 2024', '2024-04-16', 9559, 1000, 700, 600, 872, 4000, '2603941101b9483bb0a005bf30bf0c0c.jpg', 0, 15731),
(19, '12/20/2022', '01/20/2023', '2023-01-20', 8202, 730, 633, 230, 777, 236, 'CW_lensChips_tk_A_002.png', 0, 10078),
(20, '01/20/2023', '02/21/2023', '2023-02-21', 3729, 350, 344, 244, 343, 114, '', 0, 4774),
(21, '02/21/2023', '03/20/2023', '2023-03-20', 1, 110, 182, 108, 120, 36, '', 0, 447),
(22, '03/20/2023', '04/20/2023', '2023-04-20', 1, 110, 162, 25, 115, 36, '', 0, 339),
(23, '04/20/2023', '05/20/2023', '2023-05-20', 1, 110, 162, -1, 112, 36, '', 0, 311),
(24, '05/20/2023', '06/20/2023', '2023-06-20', 1, 110, 162, 29, 111, 33, '', 0, 336),
(25, '06/20/2023', '07/20/2023', '2023-07-20', 1, 110, 162, 29, 97, 35, '', 0, 325),
(26, '07/20/2023', '08/20/2023', '2023-08-20', 3428, 450, 342, 100, 217, 9, '', 0, 4096),
(27, '08/20/2023', '09/20/2023', '2023-09-20', 833, 110, 84, 24, 52, 2, '', 0, 995),
(28, '09/20/2023', '10/18/2023', '2023-10-18', 4, 510, 387, 126, 249, 10, '', 0, 777),
(29, '10/18/2023', '11/18/2023', '2023-11-18', 12, 1250, 1, 365, 1, 395, '', 0, 774),
(30, '11/18/2023', '12/18/2023', '2023-12-18', 11, 1270, 1, 371, 1, 404, '', 0, 788),
(31, '12/18/2023', '01/18/2024', '2024-01-18', 8, 890, 755, 250, 745, 261, '', 0, 2019),
(32, '01/18/2024', '02/18/2024', '2024-02-18', 10, 1010, 846, 332, 872, 296, '', 0, 2356),
(33, '02/18/2024', '03/18/2024', '2024-03-18', 11, 1310, 1, 430, 974, 382, '', 0, 1798),
(34, '03/18/2024', '04/18/2024', '2024-04-18', 12, 1190, 983, 363, 1, 349, '', 0, 1707),
(35, 'March 18, 2024', 'April 18, 2024', '2024-04-20', 12320, 1190, 983, 363, 1035, 349, '', 0, 15049),
(36, 'April 18, 2024', 'May 18, 2024', '2024-05-20', 16543, 1430, 1165, 436, 1524, 419, '', 0, 20087),
(37, 'May 18, 2024', 'June 18, 2024', '2024-06-20', 16356, 1570, 1271, 553, 1539, 460, '', 0, 20180),
(38, 'June 18, 2024', 'July 18, 2024', '2024-07-18', 14174, 1390, 1135, 489, 1283, 405, '', 0, 17486),
(39, 'July 18, 2024', 'August 18, 2024', '2024-08-20', 14991, 1270, 1043, 392, 1345, 370, '', 0, 780),
(40, 'August 18, 2024', 'September 18, 2024', '2024-09-20', 11402, 1090, 907, 337, 1070, 318, '', 0, 1574),
(41, '09/18/2024', '10/18/2024', '2024-10-18', 13, 1390, 1055, 429, 1286, 406, '', 0, 850),
(42, '10/18/2024', '11/18/2024', '2024-11-18', 11, 1050, 876, 324, 1050, 306, '', 0, 1519),
(43, '11/18/2024', '12/18/2024', '2024-12-18', 9476, 950, 800, 293, 890, 277, '', 0, 2270),
(44, 'January', 'February', '2025-01-07', 213, 234, 5, 3242, 324, 3242, 'dhpC6B-D.jpg', 3242, 10268);

-- --------------------------------------------------------

--
-- Table structure for table `ibajay`
--

CREATE TABLE `ibajay` (
  `id` int(11) NOT NULL,
  `projectname_ibajay` varchar(255) NOT NULL,
  `barangay_ibajay` varchar(255) NOT NULL,
  `project_5` varchar(255) NOT NULL,
  `aps_ibajay` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ibajay`
--

INSERT INTO `ibajay` (`id`, `projectname_ibajay`, `barangay_ibajay`, `project_5`, `aps_ibajay`, `priority`) VALUES
(5, 'Region Initiated', 'Magsaysay Park', 'Kalibo', 1, 1),
(6, 'Region Initiated', 'Pastrana Park', 'Kalibo', 1, 2),
(10, 'test', 'TEST', 'TEST', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kalibo`
--

CREATE TABLE `kalibo` (
  `id` int(11) NOT NULL,
  `projectname_uisgida` varchar(255) NOT NULL,
  `barangay_uisgida` varchar(255) NOT NULL,
  `project_6` varchar(255) NOT NULL,
  `aps_uisgida` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kalibo`
--

INSERT INTO `kalibo` (`id`, `projectname_uisgida`, `barangay_uisgida`, `project_6`, `aps_uisgida`, `priority`) VALUES
(9, 'UISGIDA', 'Catmon Integrated School', 'Altavas', 1, 1),
(10, 'UISGIDA', 'Lumaynay  Barangay Hall', 'Altavas', 1, 2),
(11, 'UISGIDA', 'Cabangila Elementary School', 'Altavas', 3, 3),
(12, 'UISGIDA', 'Aranas Barangay Hall', 'Balete', 1, 4),
(13, 'UISGIDA', 'Bugasongan Barangay Hall', 'Lezo', 3, 5),
(14, 'UISGIDA', 'Mina Barangay Hall', 'Lezo', 3, 6),
(15, 'UISGIDA', 'Poblacion Barangay Hall', 'Lezo', 3, 7),
(16, 'UISGIDA', 'Sta. Cruz Barangay Hall', 'Lezo', 3, 8),
(17, 'UISGIDA', 'Santa Cruz Bigaa Barangay Hall', 'Lezo', 3, 9),
(18, 'UISGIDA', 'Santa Cruz Bigaa ES', 'Lezo', 3, 10),
(19, 'UISGIDA', 'Bugasongan ES', 'Lezo', 3, 11),
(20, 'UISGIDA', 'Lezo IS', 'Lezo', 3, 12),
(21, 'UISGIDA', 'Catabana Barangay Hall ', 'Madalag', 1, 13),
(22, 'UISGIDA', 'Alibagon Barangay Hall', 'Makato', 3, 14),
(23, 'UISGIDA', 'Kinalangay Viejo Integrated School', 'Malinao', 1, 15),
(24, 'UISGIDA', 'San Dimas Barangay Hall', 'Malinao', 1, 16),
(25, 'UISGIDA', 'San Dimas Elementary School', 'Malinao', 1, 17),
(26, 'UISGIDA', 'Buenafortuna Barangay Hall', 'Nabas', 1, 18),
(27, 'UISGIDA', 'Buenafortuna Elementary School', 'Nabas', 1, 19),
(28, 'UISGIDA', 'Gibon Elementary School', 'Nabas', 1, 20),
(29, 'UISGIDA', 'Habana Elementary School', 'Nabas', 1, 21),
(30, 'UISGIDA', 'Libertad Elementary School', 'Nabas', 1, 22),
(31, 'UISGIDA', 'Poblacion Barangay Hall', 'Nabas', 1, 23),
(32, 'UISGIDA', 'Rizal Elementary School', 'Nabas', 1, 24),
(33, 'UISGIDA', 'Solido Barangay Hall', 'Nabas', 1, 25),
(34, 'UISGIDA', 'Solido Elementary School', 'Nabas', 1, 26),
(35, 'UISGIDA', 'Toledo Elementary School', 'Nabas', 1, 27),
(36, 'UISGIDA', 'Toledo National High School', 'Nabas', 1, 28),
(37, 'UISGIDA', 'Unidos Elementary School', 'Nabas', 1, 29),
(38, 'UISGIDA', 'Unidos National High School', 'Nabas', 1, 30),
(39, 'UISGIDA', 'Lawa-an Barangay Hall', 'New Washington', 1, 31),
(41, 'test', 'test', 'tes', 22, 32);

-- --------------------------------------------------------

--
-- Table structure for table `lezo`
--

CREATE TABLE `lezo` (
  `id` int(11) NOT NULL,
  `projectname_vsat_undp_core` varchar(255) NOT NULL,
  `barangay_vsat_undp_core` varchar(255) NOT NULL,
  `project_7` varchar(255) NOT NULL,
  `aps_vsat_undp_core` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lezo`
--

INSERT INTO `lezo` (`id`, `projectname_vsat_undp_core`, `barangay_vsat_undp_core`, `project_7`, `aps_vsat_undp_core`, `priority`) VALUES
(11, 'VSAT UNDP CoRe', 'Ibajay MDRRMO', 'Ibajay', 1, 1),
(12, 'VSAT UNDP CoRe', 'Aklan PDRRMO', 'Kalibo', 1, 2),
(13, 'VSAT UNDP CoRe', 'New Washington MDRMMO', 'New Washington', 1, 3),
(17, 'test', 'test', 'test', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `libacao`
--

CREATE TABLE `libacao` (
  `id` int(11) NOT NULL,
  `projectname_wits` varchar(255) NOT NULL,
  `barangay_wits` varchar(255) NOT NULL,
  `project_8` varchar(255) NOT NULL,
  `aps_wits` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libacao`
--

INSERT INTO `libacao` (`id`, `projectname_wits`, `barangay_wits`, `project_8`, `aps_wits`, `priority`) VALUES
(4, 'WITS', 'Bolabog Beach', 'Malay', 5, 1),
(5, 'WITS', 'Boracay White Beach', 'Malay', 5, 2),
(6, 'WITS', 'Caticlan Jetty Port', 'Malay', 5, 3),
(7, 'WITS', 'Cagban Jetty Port', 'Malay', 5, 4),
(8, 'WITS', 'Nabaoy River', 'Malay', 5, 5),
(9, 'WITS', 'Tabon Port', 'Malay', 5, 6),
(14, 'test', 'test', 'test', 22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `madalag`
--

CREATE TABLE `madalag` (
  `id` int(11) NOT NULL,
  `projectname_madalag` varchar(255) NOT NULL,
  `barangay_madalag` varchar(255) NOT NULL,
  `aps_madalag` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `madalag`
--

INSERT INTO `madalag` (`id`, `projectname_madalag`, `barangay_madalag`, `aps_madalag`, `priority`) VALUES
(3, 'UISGIDA', 'Catabana Barangay Hall', 1, 1),
(4, 'MIS Aklan', 'Don Leviogildo N. DIapo Sr. Municioal Hospital', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `makato`
--

CREATE TABLE `makato` (
  `id` int(11) NOT NULL,
  `projectname_makato` varchar(255) NOT NULL,
  `barangay_makato` varchar(255) NOT NULL,
  `aps_makato` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makato`
--

INSERT INTO `makato` (`id`, `projectname_makato`, `barangay_makato`, `aps_makato`, `priority`) VALUES
(2, 'UISGIDA', 'Alibagon Barangay Hall', 3, 1),
(3, 'MIS Aklan', 'Dr. Ramon B. Legaspi Sr. Memorial Hospital', 3, 2),
(4, 'PICS-PP', 'Aklan State University - Makato Campus', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `malay`
--

CREATE TABLE `malay` (
  `id` int(11) NOT NULL,
  `projectname_malay` varchar(255) NOT NULL,
  `barangay_malay` varchar(255) NOT NULL,
  `aps_malay` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `malay`
--

INSERT INTO `malay` (`id`, `projectname_malay`, `barangay_malay`, `aps_malay`, `priority`) VALUES
(2, 'MIS Aklan', 'Ciriaco S. Tirol Hospital', 3, 1),
(3, 'MIS Aklan', 'Malay Municipal Hospoital', 3, 2),
(4, 'WITS', 'Bulabog Beach', 5, 3),
(5, 'WITS', 'Boracay White Beach', 5, 4),
(6, 'WITS', 'Caticlan Jetty Port', 5, 5),
(7, 'WITS', 'Cagban Port', 5, 6),
(8, 'WITS', 'Nabaoy RIver', 5, 7),
(9, 'WITS', 'Tabon Port', 5, 8),
(10, 'IPTB', 'Balabag Elementary School', 0, 9),
(11, 'IPTB', 'Balabag National High School', 0, 10),
(12, 'IPTB', 'Bolabog: BeachFront 36', 0, 11),
(13, 'IPTB', 'Bolabog: BeachFront 37', 0, 12),
(14, 'IPTB', 'Bolabog: BeachFront 38', 0, 13),
(15, 'IPTB', 'Bolabog: BeachFront 79', 0, 14),
(16, 'IPTB', 'Boracay Island Municipal Disaster Risk Reduction Office', 0, 15),
(17, 'IPTB', 'Station 1: BeachFront 10', 0, 16),
(18, 'IPTB', 'Station 1: BeachFront 12', 0, 17),
(19, 'IPTB', 'Station 1: BeachFront 13', 0, 18),
(20, 'IPTB', 'Station 1: BeachFront 3', 0, 19),
(21, 'IPTB', 'Station 1: BeachFront 5', 0, 20),
(22, 'IPTB', 'Station 1: BeachFront 74', 0, 21),
(23, 'IPTB', 'Station 1: BeachFront 75', 0, 22),
(24, 'IPTB', 'Station 1: BeachFront 8', 0, 23),
(25, 'IPTB', 'Station 1: BeachFront 9', 0, 24),
(26, 'IPTB', 'Station 1: BeachFront 15', 0, 25),
(27, 'IPTB', 'Station 1: BeachFront 20', 0, 26),
(28, 'IPTB', 'Station 1: BeachFront 24', 0, 27),
(29, 'IPTB', 'Station 1: BeachFront 26', 0, 28),
(30, 'IPTB', 'Station 1: BeachFront 27', 0, 29),
(31, 'IPTB', 'Station 1: BeachFront 28', 0, 30),
(32, 'IPTB', 'Station 1: BeachFront 29', 0, 31),
(33, 'IPTB', 'Station 1: BeachFront 31', 0, 32),
(34, 'IPTB', 'Station 1: BeachFront 33', 0, 33),
(35, 'IPTB', 'Station 1: BeachFront 34', 0, 34),
(36, 'IPTB', 'Station 1: BeachFront 35', 0, 35),
(37, 'IPTB', 'Bureau of Immigration', 0, 36),
(38, 'IPTB', 'Cagban Jetty Port - AP 1', 0, 37),
(39, 'IPTB', 'Cagban Jetty Port - AP 10', 0, 38),
(40, 'IPTB', 'Cagban Jetty Port - AP 11', 0, 39),
(41, 'IPTB', 'Cagban Jetty Port - AP 12', 0, 40),
(42, 'IPTB', 'Cagban Jetty Port - AP 2', 0, 41),
(43, 'IPTB', 'Cagban Jetty Port - AP 3', 0, 42),
(44, 'IPTB', 'Cagban Jetty Port - AP 4', 0, 43),
(45, 'IPTB', 'Cagban Jetty Port - AP 5', 0, 44),
(46, 'IPTB', 'Cagban Jetty Port - AP 6', 0, 45),
(47, 'IPTB', 'Cagban Jetty Port - AP 7', 0, 46),
(48, 'IPTB', 'Cagban Jetty Port - AP 8', 0, 47),
(49, 'IPTB', 'Cagban Jetty Port - AP 9', 0, 48),
(50, 'IPTB', 'PNP Boracay Police Station', 0, 49),
(51, 'IPTB', 'Tulubhan/Capitan Martin', 0, 50),
(52, 'IPTB', 'Yapak Barangay Plaza', 0, 51),
(53, 'IPTB', 'Yapak Elementary School', 0, 52),
(54, 'IPTB', 'Balabag Barangay Plaza', 0, 53),
(55, 'IPTB', 'Bureau of Fire Protection', 0, 54),
(56, 'IPTB', 'Manoc-Manoc Barangay Hall', 0, 55),
(57, 'IPTB', 'Manoc-Manoc Covered Court', 0, 56),
(58, 'IPTB', 'Manoc-Manoc Elementary School', 0, 57),
(59, 'IPTB', 'BIATF (BOSS)/DENR', 0, 58),
(60, 'IPTB', 'Boracay One Stop Shop', 0, 59),
(61, 'IPTB', 'Lamberto Tirol National High School', 0, 60),
(62, 'IPTB', 'Malay Action Center, Mayor Office', 0, 61),
(63, 'IPTB', 'Malay Rural Health Unit - Annex', 0, 62),
(64, 'IPTB', 'Manoc-Manoc National High School', 0, 63),
(65, 'IPTB', 'Tambisaan Port', 0, 64);

-- --------------------------------------------------------

--
-- Table structure for table `malinao`
--

CREATE TABLE `malinao` (
  `id` int(11) NOT NULL,
  `projectname_malinao` varchar(255) NOT NULL,
  `barangay_malinao` varchar(255) NOT NULL,
  `aps_malinao` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `malinao`
--

INSERT INTO `malinao` (`id`, `projectname_malinao`, `barangay_malinao`, `aps_malinao`, `priority`) VALUES
(3, 'UISGIDA', 'Kinalangay Viejo Integrated School', 1, 1),
(4, 'UISGIDA', 'San Dimas Barangay Hall', 1, 2),
(5, 'UISGIDA', 'San Dimas Elementary School', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nabas`
--

CREATE TABLE `nabas` (
  `id` int(11) NOT NULL,
  `projectname_nabas` varchar(255) NOT NULL,
  `barangay_nabas` varchar(255) NOT NULL,
  `aps_nabas` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nabas`
--

INSERT INTO `nabas` (`id`, `projectname_nabas`, `barangay_nabas`, `aps_nabas`, `priority`) VALUES
(2, 'UISGIDA', 'Buenafortuna Barangay Hall', 1, 1),
(3, 'UISGIDA', 'Buenafortuna Elementary School', 1, 2),
(4, 'UISGIDA', 'Gibon ELementary School', 1, 3),
(5, 'UISGIDA', 'Habana Elementary School', 1, 4),
(6, 'UISGIDA', 'Libertad Elementary School', 1, 5),
(7, 'UISGIDA', 'Poblacion Barangay Hall', 1, 6),
(8, 'UISGIDA', 'Rizal Elementary School', 1, 7),
(9, 'UISGIDA', 'Solido Barangay Hall ', 1, 8),
(10, 'UISGIDA', 'Solido Elementary School', 1, 9),
(11, 'UISGIDA', 'Toledo Elementary School', 1, 10),
(12, 'UISGIDA', 'Toledo National High School', 1, 11),
(13, 'UISGIDA', 'Unidos Elementary School', 1, 12),
(14, 'UISGIDA', 'Unidos National High School', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `new_washington`
--

CREATE TABLE `new_washington` (
  `id` int(11) NOT NULL,
  `projectname_wash` varchar(255) NOT NULL,
  `barangay_wash` varchar(255) NOT NULL,
  `aps_wash` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_washington`
--

INSERT INTO `new_washington` (`id`, `projectname_wash`, `barangay_wash`, `aps_wash`, `priority`) VALUES
(2, 'VSAT UNDP CoRe', 'New Washington MDRRMO', 1, 1),
(3, 'UISGIDA', 'Lawa-an Barangay Hall', 1, 2),
(4, 'PICS-PP', 'Aklan State University - New Washington Campus', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `numancia`
--

CREATE TABLE `numancia` (
  `id` int(11) NOT NULL,
  `projectname_numancia` varchar(255) NOT NULL,
  `barangay_numancia` varchar(255) NOT NULL,
  `aps_numancia` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `numancia`
--

INSERT INTO `numancia` (`id`, `projectname_numancia`, `barangay_numancia`, `aps_numancia`, `priority`) VALUES
(2, 'PIALEOS', 'Aliputos Barangay Health Station', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tangalan`
--

CREATE TABLE `tangalan` (
  `id` int(11) NOT NULL,
  `projectname_tangalan` varchar(255) NOT NULL,
  `barangay_tangalan` varchar(255) NOT NULL,
  `aps_tangalan` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tangalan`
--

INSERT INTO `tangalan` (`id`, `projectname_tangalan`, `barangay_tangalan`, `aps_tangalan`, `priority`) VALUES
(2, 'PIALEOS', 'Panayakan Barangay Hall', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tech4ed`
--

CREATE TABLE `tech4ed` (
  `id` int(11) NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `center_loc` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `district_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tech4ed`
--

INSERT INTO `tech4ed` (`id`, `center_name`, `center_loc`, `municipal`, `district_no`) VALUES
(1, 'TECH4ED MAIN CENTER', 'DICT VI - AKLAN PROVINCIAL FIELD OFFICE', 'KALIBO', 'DISTRICT 1'),
(2, 'TECH4ED BANGA CENTER', 'BANGA ELEMENTARY SCHOOL', 'BANGA', 'DISTRICT 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`) VALUES
(1, 'user12', 'pass', 'USER', '', '20240305085516_IMG_5735.JPG'),
(2, 'user2', 'pass', 'USER', '2', '147142.png');

-- --------------------------------------------------------

--
-- Table structure for table `water_bill`
--

CREATE TABLE `water_bill` (
  `id` int(11) NOT NULL,
  `month_wb` varchar(255) NOT NULL,
  `date_receive` date NOT NULL,
  `w_photo` varchar(255) NOT NULL,
  `total_amount_wb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_bill`
--

INSERT INTO `water_bill` (`id`, `month_wb`, `date_receive`, `w_photo`, `total_amount_wb`) VALUES
(15, 'February', '2024-03-12', '1426160-aurora-borealis-wallpaper-1920x1200-photos.jpg', 9000),
(16, 'may', '2024-06-30', '475956323_615198687892460_4387610642306317888_n.png', 5000),
(17, 'march', '2024-03-12', 'back1.png', 5000),
(18, 'june', '2024-08-21', '272619 (1).jpg', 80000),
(20, 'january', '2025-02-12', '', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `wifi_bill`
--

CREATE TABLE `wifi_bill` (
  `id` int(12) NOT NULL,
  `month_1` varchar(255) NOT NULL,
  `date_1` date NOT NULL,
  `wifi_photo` varchar(255) NOT NULL,
  `total_amount_1` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wifi_bill`
--

INSERT INTO `wifi_bill` (`id`, `month_1`, `date_1`, `wifi_photo`, `total_amount_1`) VALUES
(1, 'may', '2024-05-14', 'may-ebill.png', 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `altavas`
--
ALTER TABLE `altavas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balete`
--
ALTER TABLE `balete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banga`
--
ALTER TABLE `banga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batan`
--
ALTER TABLE `batan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buruanga`
--
ALTER TABLE `buruanga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electric_bill`
--
ALTER TABLE `electric_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibajay`
--
ALTER TABLE `ibajay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalibo`
--
ALTER TABLE `kalibo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lezo`
--
ALTER TABLE `lezo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libacao`
--
ALTER TABLE `libacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `madalag`
--
ALTER TABLE `madalag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makato`
--
ALTER TABLE `makato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `malay`
--
ALTER TABLE `malay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `malinao`
--
ALTER TABLE `malinao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nabas`
--
ALTER TABLE `nabas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_washington`
--
ALTER TABLE `new_washington`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numancia`
--
ALTER TABLE `numancia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tangalan`
--
ALTER TABLE `tangalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tech4ed`
--
ALTER TABLE `tech4ed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_bill`
--
ALTER TABLE `water_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wifi_bill`
--
ALTER TABLE `wifi_bill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `altavas`
--
ALTER TABLE `altavas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `balete`
--
ALTER TABLE `balete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `banga`
--
ALTER TABLE `banga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `batan`
--
ALTER TABLE `batan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buruanga`
--
ALTER TABLE `buruanga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `electric_bill`
--
ALTER TABLE `electric_bill`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ibajay`
--
ALTER TABLE `ibajay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kalibo`
--
ALTER TABLE `kalibo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `lezo`
--
ALTER TABLE `lezo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `libacao`
--
ALTER TABLE `libacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `madalag`
--
ALTER TABLE `madalag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `makato`
--
ALTER TABLE `makato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `malay`
--
ALTER TABLE `malay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `malinao`
--
ALTER TABLE `malinao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nabas`
--
ALTER TABLE `nabas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `new_washington`
--
ALTER TABLE `new_washington`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `numancia`
--
ALTER TABLE `numancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tangalan`
--
ALTER TABLE `tangalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tech4ed`
--
ALTER TABLE `tech4ed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `water_bill`
--
ALTER TABLE `water_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wifi_bill`
--
ALTER TABLE `wifi_bill`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
