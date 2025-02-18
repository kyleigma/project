-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2025 at 07:28 AM
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
(71, 'IPTB', 'Tambisaan Port', 'Malay', 0, 56);

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
(15, 'MIS Aklan', 'Malay Municipal Hospital', 'Malay', 3, 10);

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
(6, 'PIALEOS', 'Panayakan Barangay Hall', 'Tangalan', 1, 3);

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
(4, 'MUNICIPAL', 'Bagto Barangay Hall', '', 3, 1);

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
(7, 'PICS-PP', 'Aklan State University New Washington Campus', 'New Washington', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `electric_bill`
--

CREATE TABLE `electric_bill` (
  `id` int(12) NOT NULL,
  `month_2` date NOT NULL,
  `month_1` date NOT NULL,
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
(18, '2024-01-15', '2024-02-14', '2024-01-14', 9559, 1000, 700, 600, 872, 4000, '2603941101b9483bb0a005bf30bf0c0c.jpg', 1, 15732),
(19, '2023-12-19', '2024-01-19', '2023-01-20', 8202, 730, 633, 230, 777, 236, 'CW_lensChips_tk_A_002.png', 0, 10078),
(20, '2023-01-20', '2023-02-21', '2023-02-21', 3729, 350, 344, 244, 343, 114, '', 0, 4774),
(21, '2023-02-21', '2023-03-20', '2023-03-20', 1, 110, 182, 108, 120, 36, '', 0, 447),
(22, '2023-03-20', '2023-04-20', '2023-04-20', 1, 110, 162, 25, 115, 36, '', 0, 339),
(23, '2023-04-20', '2023-05-20', '2023-05-20', 1, 110, 162, 1, 112, 36, '', 0, 311),
(24, '2023-05-20', '2023-06-20', '2023-06-20', 1, 110, 162, 29, 111, 33, '', 0, 336),
(25, '2023-06-20', '2023-07-20', '2023-07-20', 1, 110, 162, 29, 97, 35, '', 0, 325),
(26, '2023-07-20', '2023-08-20', '2023-08-20', 3428, 450, 342, 100, 217, 9, '', 0, 4096),
(27, '2023-08-20', '2023-09-20', '2023-09-20', 833, 110, 84, 24, 52, 2, '', 0, 995),
(28, '2023-09-20', '2023-10-18', '2023-10-18', 4, 510, 387, 126, 249, 10, '', 0, 777),
(29, '2023-10-18', '2023-11-18', '2023-11-18', 12, 1250, 1, 365, 1, 395, '', 0, 774),
(30, '2023-11-18', '2023-12-18', '2023-12-18', 11, 1270, 1, 371, 1, 404, '', 0, 788),
(31, '2023-12-18', '2024-01-18', '2024-01-18', 8, 890, 755, 250, 745, 261, '', 0, 2019),
(32, '2024-01-18', '2024-02-18', '2024-02-18', 10, 1010, 846, 332, 872, 296, '', 0, 2356),
(33, '2024-02-18', '2024-03-18', '2024-03-18', 11, 1310, 1, 430, 974, 382, '', 0, 1798),
(34, '2024-03-18', '2024-04-18', '2024-04-18', 12, 1190, 983, 363, 1, 349, '', 0, 1707),
(35, '2024-06-03', '2024-07-03', '2024-07-03', 12320, 1190, 983, 363, 1035, 349, '', 0, 15049),
(36, '2024-04-18', '2024-05-18', '2024-05-20', 16543, 1430, 1165, 436, 1524, 419, '', 0, 20087),
(37, '2024-05-18', '2024-06-18', '2024-06-20', 16356, 1570, 1271, 553, 1539, 460, '', 0, 20180),
(38, '2024-06-18', '2024-07-18', '2024-07-18', 14174, 1390, 1135, 489, 1283, 405, '', 0, 17486),
(39, '2024-07-18', '2024-08-18', '2024-08-20', 14991, 1270, 1043, 392, 1345, 370, '', 0, 17800),
(40, '2024-08-18', '2024-09-18', '2024-09-20', 11402, 1090, 907, 337, 1070, 318, '', 0, 1574),
(41, '2024-09-18', '2024-10-18', '2024-10-18', 13, 1390, 1055, 429, 1286, 406, '', 0, 850),
(42, '2024-10-18', '2024-11-18', '2024-11-18', 11, 1050, 876, 324, 1050, 306, '', 0, 1519),
(43, '2024-11-18', '2024-12-18', '2024-12-18', 9476, 950, 800, 293, 890, 277, '', 0, 2270),
(44, '2025-01-07', '2025-02-07', '2025-01-07', 213, 234, 5, 3242, 324, 3242, 'dhpC6B-D.jpg', 3242, 10268);

-- --------------------------------------------------------

--
-- Table structure for table `free_wifi`
--

CREATE TABLE `free_wifi` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `municipality_id` int(11) NOT NULL,
  `access_point` int(11) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `free_wifi`
--

INSERT INTO `free_wifi` (`id`, `project_id`, `address`, `municipality_id`, `access_point`, `status`) VALUES
(1, 1, 'Balabag Elementary School', 12, 0, 'active'),
(2, 1, 'Balabag National High School', 12, 0, 'active'),
(3, 1, 'Bolabog: BeachFront 36', 12, 0, 'active'),
(4, 1, 'Bolabog: BeachFront 37', 12, 0, 'active'),
(5, 1, 'Bolabog: BeachFront 38', 12, 0, 'active'),
(6, 1, 'Bolabog: BeachFront 79', 12, 0, 'active'),
(7, 1, 'Boracay Island Municipal Disaster Risk Reduction Office', 12, 0, 'active'),
(8, 1, 'Station 1: BeachFront 10', 12, 0, 'active'),
(9, 1, 'Station 1: BeachFront 12', 12, 0, 'active'),
(10, 1, 'Station 1: BeachFront 13', 12, 0, 'active'),
(11, 1, 'Station 1: BeachFront 3', 12, 0, 'active'),
(12, 1, 'Station 1: BeachFront 5', 12, 0, 'active'),
(13, 1, 'Station 1: BeachFront 74', 12, 0, 'active'),
(14, 1, 'Station 1: BeachFront 75', 12, 0, 'active'),
(15, 1, 'Station 1: BeachFront 8', 12, 0, 'active'),
(16, 1, 'Station 1: BeachFront 9', 12, 0, 'active'),
(17, 1, 'Station 2: BeachFront 15 ', 12, 0, 'active'),
(18, 1, 'Station 2: BeachFront 20', 12, 0, 'active'),
(19, 1, 'Station 2: BeachFront 24', 12, 0, 'active'),
(20, 1, 'Station 3: BeachFront 26', 12, 0, 'active'),
(21, 1, 'Station 3: BeachFront 27', 12, 0, 'active'),
(22, 1, 'Station 3: BeachFront 28', 12, 0, 'active'),
(23, 1, 'Station 3: BeachFront 29', 12, 0, 'active'),
(24, 1, 'Station 3: BeachFront 31', 12, 0, 'active'),
(25, 1, 'Station 3: BeachFront 33', 12, 0, 'active'),
(26, 1, 'Station 3: BeachFront 34', 12, 0, 'active'),
(27, 1, 'Station 3: BeachFront 35', 12, 0, 'active'),
(28, 1, 'Bureau of Immigration', 12, 0, 'active'),
(29, 1, 'Cagban Jetty Port - AP 1', 12, 0, 'active'),
(30, 1, 'Cagban Jetty Port - AP 10', 12, 0, 'active'),
(31, 1, 'Cagban Jetty Port - AP 11', 12, 0, 'active'),
(32, 1, 'Cagban Jetty Port - AP 12', 12, 0, 'active'),
(33, 1, 'Cagban Jetty Port - AP 2', 12, 0, 'active'),
(34, 1, 'Cagban Jetty Port - AP 3', 12, 0, 'active'),
(35, 1, 'Cagban Jetty Port - AP 4', 12, 0, 'active'),
(36, 1, 'Cagban Jetty Port - AP 5', 12, 0, 'active'),
(37, 1, 'Cagban Jetty Port - AP 6', 12, 0, 'active'),
(38, 1, 'Cagban Jetty Port - AP 7', 12, 0, 'active'),
(39, 1, 'Cagban Jetty Port - AP 8', 12, 0, 'active'),
(40, 1, 'Cagban Jetty Port - AP 9', 12, 0, 'active'),
(41, 1, 'PNP Boracay Police Station', 12, 0, 'active'),
(42, 1, 'Tulubhan / Capitan Martin ', 12, 0, 'active'),
(43, 1, 'Yapak Barangay Plaza', 12, 0, 'active'),
(44, 1, 'Yapak Elementary School', 12, 0, 'active'),
(45, 1, 'Balabag Barangay Plaza', 12, 0, 'active'),
(46, 1, 'Bureau of Fire Protection', 12, 0, 'active'),
(47, 1, 'Manoc-Manoc Barangay Hall', 12, 0, 'active'),
(48, 1, 'Manoc-Manoc Covered Court', 12, 0, 'active'),
(49, 1, 'Manoc-Manoc Elementary School', 12, 0, 'active'),
(50, 1, 'BIATF (BOSS) / DENR', 12, 0, 'active'),
(51, 1, 'Boracay One Stop Shop', 12, 0, 'active'),
(52, 1, 'Lamberto Tirol National High School', 12, 0, 'active'),
(53, 1, 'Malay Action Center Mayor Office', 12, 0, 'active'),
(54, 1, 'Malay Rural Health Unit - ANNEX', 12, 0, 'active'),
(55, 1, 'Manoc-Manoc National High School', 12, 0, 'active'),
(56, 1, 'Tambisaan Port', 12, 0, 'active'),
(64, 2, 'Altavas District Hospital', 1, 3, 'inactive'),
(65, 2, 'Ibajay District  Hospital', 6, 3, 'active'),
(66, 2, 'Provincial Capitol of Aklan', 7, 3, 'active'),
(67, 2, 'Dr. Rafael S. Tumbokon Memorial Hospital', 7, 3, 'active'),
(68, 2, 'Libacao Municipal Infirmary ', 9, 3, 'active'),
(69, 2, 'Libacao College of Science and Technology', 9, 3, 'active'),
(70, 2, 'Don. Leovigildo N. Diapo Sr. Municipal Hospital', 10, 3, 'active'),
(71, 2, 'Dr. Ramon B. Legaspi Sr. Memorial Hospital', 11, 3, 'active'),
(72, 2, 'Ciriaco S. Tirol Hospital ', 12, 3, 'active'),
(73, 2, 'Malay Municipal Hospital', 12, 3, 'active'),
(79, 4, 'Habana Barangay Hall', 5, 1, 'active'),
(80, 4, 'Aliputos Barangay Health Station', 16, 1, 'active'),
(81, 4, 'Panayakan Barangay Hall', 17, 1, 'active'),
(82, 5, 'Aklan State University Banga Campus', 3, 3, 'active'),
(83, 5, 'Aklan State University Ibajay Campus', 6, 3, 'active'),
(84, 5, 'Aklan State University Kalibo Campus', 7, 3, 'active'),
(85, 5, 'Aklan State University Makato Campus', 11, 3, 'active'),
(86, 5, 'Aklan State University New Washington Campus', 15, 3, 'active'),
(89, 6, 'Magsaysay Park', 7, 1, 'active'),
(90, 6, 'Pastrana Park', 7, 1, 'active'),
(92, 7, 'Catmon Integrated School', 1, 1, 'active'),
(93, 7, 'Lumaynay  Barangay Hall', 1, 1, 'active'),
(94, 7, 'Cabangila Elementary School', 1, 3, 'active'),
(95, 7, 'Aranas Barangay Hall', 2, 1, 'active'),
(96, 7, 'Bugasongan Barangay Hall', 8, 3, 'active'),
(97, 7, 'Mina Barangay Hall', 8, 3, 'active'),
(98, 7, 'Poblacion Barangay Hall', 8, 3, 'active'),
(99, 7, 'Sta. Cruz Barangay Hall', 8, 3, 'active'),
(100, 7, 'Santa Cruz Bigaa Barangay Hall', 8, 3, 'active'),
(101, 7, 'Santa Cruz Bigaa ES', 8, 3, 'active'),
(102, 7, 'Bugasongan ES', 8, 3, 'active'),
(103, 7, 'Lezo IS', 8, 3, 'active'),
(104, 7, 'Catabana Barangay Hall ', 10, 1, 'active'),
(105, 7, 'Alibagon Barangay Hall', 11, 3, 'active'),
(106, 7, 'Kinalangay Viejo Integrated School', 13, 1, 'active'),
(107, 7, 'San Dimas Barangay Hall', 13, 1, 'active'),
(108, 7, 'San Dimas Elementary School', 13, 1, 'active'),
(109, 7, 'Buenafortuna Barangay Hall', 14, 1, 'active'),
(110, 7, 'Buenafortuna Elementary School', 14, 1, 'active'),
(111, 7, 'Gibon Elementary School', 14, 1, 'active'),
(112, 7, 'Habana Elementary School', 14, 1, 'active'),
(113, 7, 'Libertad Elementary School', 14, 1, 'active'),
(114, 7, 'Poblacion Barangay Hall', 14, 1, 'active'),
(115, 7, 'Rizal Elementary School', 14, 1, 'active'),
(116, 7, 'Solido Barangay Hall', 14, 1, 'active'),
(117, 7, 'Solido Elementary School', 14, 1, 'active'),
(118, 7, 'Toledo Elementary School', 14, 1, 'active'),
(119, 7, 'Toledo National High School', 14, 1, 'active'),
(120, 7, 'Unidos Elementary School', 14, 1, 'active'),
(121, 7, 'Unidos National High School', 14, 1, 'active'),
(122, 7, 'Lawa-an Barangay Hall', 15, 1, 'active'),
(123, 8, 'Ibajay MDRRMO', 6, 1, 'active'),
(124, 8, 'Aklan PDRRMO', 7, 1, 'active'),
(125, 8, 'New Washington MDRMMO', 15, 1, 'active'),
(126, 9, 'Bolabog Beach', 12, 5, 'active'),
(127, 9, 'Boracay White Beach', 12, 5, 'active'),
(128, 9, 'Caticlan Jetty Port', 12, 5, 'active'),
(129, 9, 'Cagban Jetty Port', 12, 5, 'active'),
(130, 9, 'Nabaoy River', 12, 5, 'active'),
(131, 9, 'Tabon Port', 12, 5, 'active'),
(133, 7, 'Catabana Barangay Hall', 10, 1, 'active'),
(134, 2, 'Don Leviogildo N. DIapo Sr. Municioal Hospital', 10, 3, 'active'),
(136, 7, 'Alibagon Barangay Hall', 11, 3, 'active'),
(137, 2, 'Dr. Ramon B. Legaspi Sr. Memorial Hospital', 11, 3, 'active'),
(138, 5, 'Aklan State University - Makato Campus', 11, 3, 'active'),
(139, 7, 'Kinalangay Viejo Integrated School', 13, 1, 'active'),
(140, 7, 'San Dimas Barangay Hall', 13, 1, 'active'),
(141, 7, 'San Dimas Elementary School', 13, 1, 'active'),
(142, 7, 'Buenafortuna Barangay Hall', 14, 1, 'active'),
(143, 7, 'Buenafortuna Elementary School', 14, 1, 'active'),
(144, 7, 'Gibon ELementary School', 14, 1, 'active'),
(145, 7, 'Habana Elementary School', 14, 1, 'active'),
(146, 7, 'Libertad Elementary School', 14, 1, 'active'),
(147, 7, 'Poblacion Barangay Hall', 14, 1, 'active'),
(148, 7, 'Rizal Elementary School', 14, 1, 'active'),
(149, 7, 'Solido Barangay Hall ', 14, 1, 'active'),
(150, 7, 'Solido Elementary School', 14, 1, 'active'),
(151, 7, 'Toledo Elementary School', 14, 1, 'active'),
(152, 7, 'Toledo National High School', 14, 1, 'active'),
(153, 7, 'Unidos Elementary School', 14, 1, 'active'),
(154, 7, 'Unidos National High School', 14, 1, 'active'),
(160, 8, 'New Washington MDRRMO', 15, 1, 'active'),
(161, 7, 'Lawa-an Barangay Hall', 15, 1, 'active'),
(162, 5, 'Aklan State University - New Washington Campus', 15, 1, 'active'),
(165, 4, 'Aliputos Barangay Health Station', 16, 1, 'active'),
(170, 4, 'Panayakan Barangay Hall', 17, 1, 'active'),
(177, 1, 'aa', 2, 2, 'inactive'),
(178, 2, 'testing edit', 3, 23, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `free_wifi_projects`
--

CREATE TABLE `free_wifi_projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `free_wifi_projects`
--

INSERT INTO `free_wifi_projects` (`id`, `name`) VALUES
(1, 'IPTB'),
(2, 'MIS Aklan'),
(3, 'Municipal'),
(4, 'PIALEOS'),
(5, 'PICS-PP'),
(6, 'Region Initiated'),
(7, 'UISGIDA'),
(8, 'VSAT UNDP CoRe'),
(9, 'WITS');

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
(6, 'Region Initiated', 'Pastrana Park', 'Kalibo', 1, 2);

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
(39, 'UISGIDA', 'Lawa-an Barangay Hall', 'New Washington', 1, 31);

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
(13, 'VSAT UNDP CoRe', 'New Washington MDRMMO', 'New Washington', 1, 3);

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
(9, 'WITS', 'Tabon Port', 'Malay', 5, 6);

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
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `name`) VALUES
(1, 'Altavas'),
(2, 'Balete'),
(3, 'Banga'),
(4, 'Batan'),
(5, 'Buruanga'),
(6, 'Ibajay'),
(7, 'Kalibo'),
(8, 'Lezo'),
(9, 'Libacao'),
(10, 'Madalag'),
(11, 'Makato'),
(12, 'Malay'),
(13, 'Malinao'),
(14, 'Nabas'),
(15, 'New Washington'),
(16, 'Numancia'),
(17, 'Tangalan');

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
  `month_wb` date NOT NULL,
  `date_receive` date NOT NULL,
  `w_photo` varchar(255) NOT NULL,
  `total_amount_wb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_bill`
--

INSERT INTO `water_bill` (`id`, `month_wb`, `date_receive`, `w_photo`, `total_amount_wb`) VALUES
(15, '2024-02-01', '2024-03-12', '1426160-aurora-borealis-wallpaper-1920x1200-photos.jpg', 9000),
(16, '2024-05-01', '2024-06-30', '475956323_615198687892460_4387610642306317888_n.png', 5000),
(17, '2024-03-01', '2024-03-12', 'back1.png', 5000),
(18, '2024-08-01', '2024-08-21', '272619 (1).jpg', 80000),
(20, '2025-01-01', '2025-02-12', '', 1000);

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
-- Indexes for table `free_wifi`
--
ALTER TABLE `free_wifi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipality_id` (`municipality_id`),
  ADD KEY `fk_project_id` (`project_id`);

--
-- Indexes for table `free_wifi_projects`
--
ALTER TABLE `free_wifi_projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `free_wifi`
--
ALTER TABLE `free_wifi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `free_wifi_projects`
--
ALTER TABLE `free_wifi_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `free_wifi`
--
ALTER TABLE `free_wifi`
  ADD CONSTRAINT `fk_municipality_id` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_project_id` FOREIGN KEY (`project_id`) REFERENCES `free_wifi_projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
