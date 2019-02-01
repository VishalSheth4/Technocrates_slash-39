-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 11:26 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `deans`
--

CREATE TABLE `deans` (
  `DeanId` int(10) NOT NULL,
  `DeanName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InstCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeanEmail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DeanAadharNo` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deans`
--

INSERT INTO `deans` (`DeanId`, `DeanName`, `InstCode`, `DeanEmail`, `DeanAadharNo`, `ExamCode`, `Role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vishal', '101', 'vishal@gmail.com', '556655656556', '201', 'Supervisor', '$2y$10$tAzhEI38PgZVrOcZiv9RMub2r0fKfriOVy73jsoyfQyX2seKdFNku', NULL, '2017-03-25 08:00:19', '2017-03-25 08:00:19'),
(2, 'Mayank', '101', 'mayank@gmail.com', '212132556366', '202', 'External', '$2y$10$DqtUomgQCFfwvMS8WkBOy.WmcMqcUUzlerMYlV8za4uD69GScM30K', NULL, '2017-03-25 08:23:20', '2017-03-25 08:23:20'),
(3, 'Vimal Gajera', '101', 'vimal@gmail.com', '853236678545', '201', 'OSDS', '$2y$10$qqgRdMS/9yoDXjTX0SJmE.6/Pd5Gr3eCNuJ.77br5xplnbYMKxpL.', NULL, '2017-04-01 10:40:25', '2017-04-01 10:40:25'),
(4, 'Ameen Shah', '102', 'ameen@gmail.com', '873236678545', '202', 'Supervisor', '$2y$10$xxzC79ewRbIEUBIz31GyZOmmzszCBI3k.053KGH53aqerJhZ21Fne', NULL, '2017-04-01 10:42:15', '2017-04-01 10:42:15'),
(5, 'Amir Khan', '102', 'amir@gmail.com', '873236678580', '202', 'OSDS', '$2y$10$AXX4P2QDIE09NsJiSxeCzOikuSEWyiEkfbicLPDrAp8ydaKPAXUrG', NULL, '2017-04-01 10:43:13', '2017-04-01 10:43:13'),
(6, 'Jayant Bhatt', '102', 'jayant@gmail.com', '873236678587', '202', 'External', '$2y$10$aqM.vUDPS4pwRAhUwafaReqts2RzmAhXw.o41xxlXi5QBOAqJxRgS', NULL, '2017-04-01 10:44:13', '2017-04-01 10:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `dean_allocations`
--

CREATE TABLE `dean_allocations` (
  `DeanAllocateId` int(10) NOT NULL,
  `DeanEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InstCode` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Facultry Exam Center',
  `DeanAuthorization` tinyint(1) NOT NULL DEFAULT '0',
  `PaymentStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Done',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dean_allocations`
--

INSERT INTO `dean_allocations` (`DeanAllocateId`, `DeanEmail`, `ExamCode`, `Role`, `InstCode`, `DeanAuthorization`, `PaymentStatus`, `created_at`, `updated_at`) VALUES
(1, 'vishal@gmail.com', '201', 'Supervisor', '110', 1, 'Pending', '2017-04-02 04:24:58', '2017-04-02 04:24:58'),
(2, 'vimal@gmail.com', '201', 'OSDS', '110', 1, 'Pending', '2017-04-02 04:24:58', '2017-04-02 05:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `dean_location_statuses`
--

CREATE TABLE `dean_location_statuses` (
  `DeanLocationStatusId` int(10) NOT NULL,
  `DeanAllocateId` int(10) NOT NULL,
  `imageName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dean_location_statuses`
--

INSERT INTO `dean_location_statuses` (`DeanLocationStatusId`, `DeanAllocateId`, `imageName`, `Status`, `created_at`, `updated_at`) VALUES
(1, 1, '20170402_100719_.jpg', 1, '2017-04-01 23:12:31', '2017-04-01 23:12:31'),
(2, 1, '20170402_100719_.jpg', 1, '2017-04-01 23:12:49', '2017-04-01 23:12:49'),
(3, 1, '20170402_100854_.jpg', 0, '2017-04-01 23:13:44', '2017-04-01 23:13:44'),
(4, 1, '20170402_110929_.jpg', 1, '2017-04-02 00:14:10', '2017-04-02 00:14:10'),
(5, 1, '20170402_124113_.jpg', 1, '2017-04-02 01:45:59', '2017-04-02 01:45:59'),
(6, 1, '20170402_152912_.jpg', 1, '2017-04-02 04:34:06', '2017-04-02 04:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `ExamId` int(10) NOT NULL,
  `ExamCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamDate` date NOT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `ExamAuthority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ExamId`, `ExamCode`, `ExamName`, `ExamDate`, `starttime`, `endtime`, `ExamAuthority`, `created_at`, `updated_at`) VALUES
(1, '201', 'SSC', '2017-03-15', '11:00:00', '14:00:00', 'CBSE', NULL, NULL),
(2, '202', 'JEE Mains', '2017-03-18', '10:00:00', '13:00:00', 'CBSE', NULL, NULL),
(3, '203', 'GATE', '2017-04-28', '11:00:00', '01:00:00', 'CBSE', '2017-04-02 00:23:40', '2017-04-02 00:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `InstId` int(10) NOT NULL,
  `InstCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InstPincode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `InstCity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`InstId`, `InstCode`, `InstName`, `InstPincode`, `ExamCode`, `InstCity`, `username`, `password`) VALUES
(1, '101', 'Raj Kumar Goel Institute of technology', '395007', '201', 'surat', 'rajkumar', 'rajkumar'),
(2, '102', 'S. D. Jain Modern School', '395007', '201', 'surat', '', ''),
(3, '103', 'G. D. Goenka International School', '395007', '202', 'surat', '', ''),
(4, '104', 'Shardayatan School', '395007', '202', 'surat', '', ''),
(5, '105', 'Dhirubhai Ambani International School', '400051', '201', 'mumbai', '', ''),
(6, '106', 'Cardinal Gracias High School', '400051', '201', 'mumbai', '', ''),
(7, '107', 'Arya Vidya Mandir', '400050', '202', 'mumbai', '', ''),
(8, '108', 'Sheila Raheja School of Business Management & Research (SRBS)', '400051', '202', 'mumbai', '', ''),
(9, '109', 'Delhi Public School, R. K. Puram', '110022', '201', 'delhi', '', ''),
(10, '110', 'The British School, New Delhi', '110021', '201', 'delhi', 'british', 'british'),
(11, '111', 'Manav Sthali School', '110060', '202', 'delhi', '', ''),
(12, '112', 'Sanskriti School', '110021', '202', 'delhi', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `institute_distance`
--

CREATE TABLE `institute_distance` (
  `distance_id` int(10) NOT NULL,
  `Institute1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Institute2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Distance` varchar(255) NOT NULL COMMENT 'In Km',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_distance`
--

INSERT INTO `institute_distance` (`distance_id`, `Institute1`, `Institute2`, `Distance`, `created_at`, `updated_at`) VALUES
(1, '101', '102', '56.84', '2017-04-01 05:28:14', '2017-04-01 05:28:14'),
(2, '101', '103', '9.26', '2017-04-01 05:28:15', '2017-04-01 05:28:15'),
(3, '101', '104', '8.5', '2017-04-01 05:28:15', '2017-04-01 05:28:15'),
(4, '102', '101', '7.54', '2017-04-01 05:28:16', '2017-04-01 05:28:16'),
(5, '102', '103', '2.76', '2017-04-01 05:28:18', '2017-04-01 05:28:18'),
(6, '102', '104', '4.02', '2017-04-01 05:28:18', '2017-04-01 05:28:18'),
(7, '103', '101', '10.07', '2017-04-01 05:28:19', '2017-04-01 05:28:19'),
(8, '103', '102', '3.47', '2017-04-01 05:28:20', '2017-04-01 05:28:20'),
(9, '103', '104', '6.55', '2017-04-01 05:28:21', '2017-04-01 05:28:21'),
(10, '104', '101', '9.94', '2017-04-01 05:28:23', '2017-04-01 05:28:23'),
(11, '104', '102', '3.65', '2017-04-01 05:28:23', '2017-04-01 05:28:23'),
(12, '104', '103', '4.6', '2017-04-01 05:28:24', '2017-04-01 05:28:24'),
(13, '105', '106', '2.97', '2017-04-01 05:28:25', '2017-04-01 05:28:25'),
(14, '105', '107', '7.39', '2017-04-01 05:28:26', '2017-04-01 05:28:26'),
(15, '105', '108', '3.93', '2017-04-01 05:28:29', '2017-04-01 05:28:29'),
(16, '106', '105', '2.96', '2017-04-01 05:28:31', '2017-04-01 05:28:31'),
(17, '106', '107', '5.54', '2017-04-01 05:28:33', '2017-04-01 05:28:33'),
(18, '106', '108', '1.4', '2017-04-01 05:28:34', '2017-04-01 05:28:34'),
(19, '107', '105', '6.64', '2017-04-01 05:28:35', '2017-04-01 05:28:35'),
(20, '107', '106', '4.76', '2017-04-01 05:28:37', '2017-04-01 05:28:37'),
(21, '107', '108', '4.28', '2017-04-01 05:28:40', '2017-04-01 05:28:40'),
(22, '108', '105', '3.89', '2017-04-01 05:28:42', '2017-04-01 05:28:42'),
(23, '108', '106', '1.4', '2017-04-01 05:28:50', '2017-04-01 05:28:50'),
(24, '108', '107', '4.67', '2017-04-01 05:28:51', '2017-04-01 05:28:51'),
(25, '109', '110', '4.41', '2017-04-01 05:28:54', '2017-04-01 05:28:54'),
(26, '109', '111', '10.18', '2017-04-01 05:28:55', '2017-04-01 05:28:55'),
(27, '109', '112', '4.12', '2017-04-01 05:28:56', '2017-04-01 05:28:56'),
(28, '110', '109', '4.05', '2017-04-01 05:28:57', '2017-04-01 05:28:57'),
(29, '110', '111', '6.3', '2017-04-01 05:28:57', '2017-04-01 05:28:57'),
(30, '110', '112', '1.04', '2017-04-01 05:28:58', '2017-04-01 05:28:58'),
(31, '111', '109', '10.19', '2017-04-01 05:29:00', '2017-04-01 05:29:00'),
(32, '111', '110', '5.72', '2017-04-01 05:29:02', '2017-04-01 05:29:02'),
(33, '111', '112', '7.09', '2017-04-01 05:29:03', '2017-04-01 05:29:03'),
(34, '112', '109', '3.84', '2017-04-01 05:29:03', '2017-04-01 05:29:03'),
(35, '112', '110', '1.46', '2017-04-01 05:29:05', '2017-04-01 05:29:05'),
(36, '112', '111', '7.67', '2017-04-01 05:29:07', '2017-04-01 05:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `location_detects`
--

CREATE TABLE `location_detects` (
  `mapping_id` int(10) UNSIGNED NOT NULL,
  `InstCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `centerPoint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_detects`
--

INSERT INTO `location_detects` (`mapping_id`, `InstCode`, `Latitude`, `Longitude`, `centerPoint`) VALUES
(1, '112', '21.135021,21.134300,21.131198,21.132379', '72.710338,72.717479,72.716028,72.712908', '21.133293,72.718129'),
(2, '101', '28.703067,28.699434,28.697571,28.700658,28.703104', '77.440610,77.438614,77.443678,77.446811,77.440631', '28.697571,77.443678');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2017_03_20_104304_create_students_table', 1),
(5, '2017_03_20_104707_create_institutes_table', 1),
(6, '2017_03_20_105203_create_faculties_table', 1),
(7, '2017_03_20_111402_create_student_allocations_table', 2),
(8, '2017_03_20_111410_create_faculty_allocations_table', 3),
(9, '2017_03_20_113546_create_exams_table', 4),
(10, '2017_03_25_060533_create_university_datas_table', 5),
(11, '2017_03_25_104719_create_location_detects_table', 6),
(12, '2017_03_25_132453_create_deans_table', 7),
(13, '2017_03_27_094144_create_dean_location_statuses_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RollNo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InstCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Stud_Inst_Code',
  `ExamCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentCity` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentId`, `Name`, `RollNo`, `InstCode`, `ExamCode`, `studentCity`) VALUES
(1, 'meet shah', '123451', '101', '201', 'surat'),
(2, 'smit shah', '123452', '101', '201', 'surat'),
(3, 'Ritesh Jain', '123453', '101', '201', 'surat'),
(4, 'harish jain', '123454', '101', '201', 'surat'),
(5, 'mayank jariwala', '123455', '101', '201', 'surat'),
(6, 'deep patel', '123456', '102', '202', 'surat'),
(7, 'atesh shah', '123457', '102', '202', 'surat'),
(8, 'upen mehta', '123458', '102', '202', 'surat'),
(9, 'het barot', '123459', '102', '202', 'surat'),
(10, 'Chirag desai', '123460', '102', '202', 'surat'),
(11, 'devesh pachhigar', '123461', '103', '201', 'surat'),
(12, 'Vishal sheth', '123462', '103', '201', 'surat'),
(13, 'Kishan sharma', '123463', '103', '201', 'surat'),
(14, 'meet joshi', '123464', '103', '201', 'surat'),
(15, 'hiren bhatt', '123465', '103', '201', 'surat'),
(16, 'rohan patel', '123466', '104', '202', 'surat'),
(17, 'viren mehra', '123467', '104', '202', 'surat'),
(18, 'akshay khatri', '123468', '104', '202', 'surat'),
(19, 'charan sharma', '123469', '104', '202', 'surat'),
(20, 'shreya patel', '123470', '104', '202', 'surat'),
(21, 'jani divyang', '123471', '105', '201', 'mumbai'),
(22, 'rashmi patel', '123472', '105', '201', 'mumbai'),
(23, 'jolly patel', '123473', '105', '201', 'mumbai'),
(24, 'komal kotak', '123474', '105', '201', 'mumbai'),
(25, 'hill modi', '123475', '105', '201', 'mumbai'),
(26, 'harin sheth', '123476', '106', '202', 'mumbai'),
(27, 'zeel patel', '123477', '106', '202', 'mumbai'),
(28, 'atif khan', '123478', '106', '202', 'mumbai'),
(29, 'kishan sharma', '123479', '106', '202', 'mumbai'),
(30, 'disha patani', '123480', '106', '202', 'mumbai'),
(31, 'Kavi Patel', '123481', '107', '201', 'mumbai'),
(32, 'Shreyash Patel', '123482', '107', '201', 'mumbai'),
(33, 'Harshal Kheradiya', '123483', '107', '201', 'mumbai'),
(34, 'Karan Shah', '123484', '107', '201', 'mumbai'),
(35, 'Kavyesh Dalal', '123485', '107', '201', 'mumbai'),
(36, 'vimal sharma', '123486', '108', '202', 'mumbai'),
(37, 'virendra sehwag', '123487', '108', '202', 'mumbai'),
(38, 'sachin shah', '123488', '108', '202', 'mumbai'),
(39, 'sourav mehta', '123489', '108', '202', 'mumbai'),
(40, 'chinmay gandhi', '123490', '108', '202', 'mumbai'),
(41, 'BHIKADIYA NILKNATH\r\n', '123491', '109', '201', 'delhi'),
(42, 'BAKHAL KRUNAL', '123492', '109', '201', 'delhi'),
(43, 'KRUNAL PRAJAPATI\r\n', '123493', '109', '201', 'delhi'),
(44, 'JENISH PRAJAPATI\r\n', '123494', '109', '201', 'delhi'),
(45, 'MENISH PRAJAPATI\r\n', '123495', '109', '201', 'delhi'),
(46, 'TAPAN PRESHWALA\r\n', '123496', '110', '202', 'delhi'),
(47, 'NIKUNG DODARIYA\r\n', '123497', '110', '202', 'delhi'),
(48, 'DHAVAN GADIWALA\r\n', '123498', '110', '202', 'delhi'),
(49, 'SURAJ CHAUHAN\r\n', '123499', '110', '202', 'delhi'),
(50, 'MEHUL LEKAVARE\r\n', '123500', '110', '202', 'delhi'),
(51, 'JAVED MANSURI\r\n', '123501', '111', '201', 'delhi'),
(52, 'SURESH THUMMA\r\n', '123502', '111', '201', 'delhi'),
(53, 'PAYASH SINGH\r\n', '123503', '111', '201', 'delhi'),
(54, 'HARSHEETA MOHILE\r\n', '123504', '111', '201', 'delhi'),
(55, 'CHARMY PATEL\r\n', '123505', '111', '201', 'delhi'),
(56, 'DIVYA DAVE\r\n', '123506', '112', '202', 'delhi'),
(57, 'KRATIKA JAIN\r\n', '123507', '112', '202', 'delhi'),
(58, 'SAHIL PRAJAPATI\r\n', '123508', '112', '202', 'delhi'),
(59, 'JAY VATULIYA\r\n', '123509', '112', '202', 'delhi'),
(60, 'AKSHAR DEVGANIYA\r\n', '123510', '112', '202', 'delhi');

-- --------------------------------------------------------

--
-- Table structure for table `student_allocations`
--

CREATE TABLE `student_allocations` (
  `SAllocateId` int(10) UNSIGNED NOT NULL,
  `ExamCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RollNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SeatNo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `InstCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_allocations`
--

INSERT INTO `student_allocations` (`SAllocateId`, `ExamCode`, `RollNo`, `SeatNo`, `InstCode`, `created_at`, `updated_at`) VALUES
(1, '202', '123456', 'SN_6', '104', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(2, '202', '123457', 'SN_7', '104', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(3, '202', '123458', 'SN_8', '104', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(4, '202', '123459', 'SN_9', '104', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(5, '202', '123460', 'SN_10', '104', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(6, '202', '123466', 'SN_1', '103', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(7, '202', '123467', 'SN_2', '103', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(8, '202', '123468', 'SN_3', '103', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(9, '202', '123469', 'SN_4', '103', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(10, '202', '123470', 'SN_5', '103', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(11, '202', '123476', 'SN_21', '108', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(12, '202', '123477', 'SN_22', '108', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(13, '202', '123478', 'SN_23', '108', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(14, '202', '123479', 'SN_24', '108', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(15, '202', '123480', 'SN_25', '108', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(16, '202', '123486', 'SN_16', '107', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(17, '202', '123487', 'SN_17', '107', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(18, '202', '123488', 'SN_18', '107', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(19, '202', '123489', 'SN_19', '107', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(20, '202', '123490', 'SN_20', '107', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(21, '202', '123496', 'SN_36', '112', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(22, '202', '123497', 'SN_37', '112', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(23, '202', '123498', 'SN_38', '112', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(24, '202', '123499', 'SN_39', '112', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(25, '202', '123500', 'SN_40', '112', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(26, '202', '123506', 'SN_31', '111', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(27, '202', '123507', 'SN_32', '111', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(28, '202', '123508', 'SN_33', '111', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(29, '202', '123509', 'SN_34', '111', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(30, '202', '123510', 'SN_35', '111', '2017-04-02 00:04:17', '2017-04-02 00:04:18'),
(31, '201', '123451', 'SN_39', '104', '2017-04-02 04:22:11', '2017-04-02 04:22:13'),
(32, '201', '123452', 'SN_43', '104', '2017-04-02 04:22:11', '2017-04-02 04:22:13'),
(33, '201', '123453', 'SN_47', '104', '2017-04-02 04:22:11', '2017-04-02 04:22:13'),
(34, '201', '123454', 'SN_51', '104', '2017-04-02 04:22:11', '2017-04-02 04:22:13'),
(35, '201', '123455', 'SN_55', '104', '2017-04-02 04:22:11', '2017-04-02 04:22:14'),
(36, '201', '123461', 'SN_1', '102', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(37, '201', '123462', 'SN_2', '102', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(38, '201', '123463', 'SN_3', '102', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(39, '201', '123464', 'SN_4', '102', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(40, '201', '123465', 'SN_5', '102', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(41, '201', '123471', 'SN_11', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(42, '201', '123472', 'SN_12', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(43, '201', '123473', 'SN_13', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(44, '201', '123474', 'SN_14', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(45, '201', '123475', 'SN_15', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(46, '201', '123481', 'SN_16', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(47, '201', '123482', 'SN_17', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(48, '201', '123483', 'SN_18', '106', '2017-04-02 04:22:11', '2017-04-02 04:22:12'),
(49, '201', '123484', 'SN_19', '106', '2017-04-02 04:22:12', '2017-04-02 04:22:12'),
(50, '201', '123485', 'SN_20', '106', '2017-04-02 04:22:12', '2017-04-02 04:22:12'),
(51, '201', '123491', 'SN_26', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(52, '201', '123492', 'SN_27', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(53, '201', '123493', 'SN_28', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(54, '201', '123494', 'SN_29', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(55, '201', '123495', 'SN_30', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(56, '201', '123501', 'SN_31', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(57, '201', '123502', 'SN_32', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(58, '201', '123503', 'SN_33', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(59, '201', '123504', 'SN_34', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13'),
(60, '201', '123505', 'SN_35', '110', '2017-04-02 04:22:12', '2017-04-02 04:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `university_datas`
--

CREATE TABLE `university_datas` (
  `data_id` int(10) UNSIGNED NOT NULL,
  `InstCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MinCapacity` bigint(20) NOT NULL,
  `NoClasses` bigint(20) NOT NULL,
  `TotalCapacity` bigint(20) NOT NULL,
  `InstCity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_datas`
--

INSERT INTO `university_datas` (`data_id`, `InstCode`, `MinCapacity`, `NoClasses`, `TotalCapacity`, `InstCity`) VALUES
(1, '101', 10, 1, 10, 'surat'),
(2, '102', 10, 1, 10, 'surat'),
(3, '103', 10, 1, 10, 'surat'),
(4, '104', 10, 1, 10, 'surat'),
(5, '105', 10, 1, 10, 'mumbai'),
(6, '106', 10, 1, 10, 'mumbai'),
(7, '107', 10, 1, 10, 'mumbai'),
(8, '108', 10, 1, 10, 'mumbai'),
(9, '109', 10, 1, 10, 'delhi'),
(10, '110', 10, 1, 10, 'delhi'),
(11, '111', 10, 1, 10, 'delhi'),
(12, '112', 10, 1, 10, 'delhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deans`
--
ALTER TABLE `deans`
  ADD PRIMARY KEY (`DeanEmail`),
  ADD UNIQUE KEY `DeanAadharNo` (`DeanAadharNo`),
  ADD KEY `DeanId` (`DeanId`);

--
-- Indexes for table `dean_allocations`
--
ALTER TABLE `dean_allocations`
  ADD PRIMARY KEY (`DeanAllocateId`),
  ADD KEY `DeanAllocateId` (`DeanAllocateId`);

--
-- Indexes for table `dean_location_statuses`
--
ALTER TABLE `dean_location_statuses`
  ADD PRIMARY KEY (`DeanLocationStatusId`),
  ADD KEY `DeanAllocateId` (`DeanAllocateId`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`ExamCode`),
  ADD KEY `ExamId` (`ExamId`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`InstCode`),
  ADD KEY `InstPincode` (`InstPincode`),
  ADD KEY `InstId` (`InstId`),
  ADD KEY `ExamCode` (`ExamCode`);

--
-- Indexes for table `institute_distance`
--
ALTER TABLE `institute_distance`
  ADD PRIMARY KEY (`distance_id`);

--
-- Indexes for table `location_detects`
--
ALTER TABLE `location_detects`
  ADD PRIMARY KEY (`mapping_id`),
  ADD UNIQUE KEY `InstCode` (`InstCode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`RollNo`);

--
-- Indexes for table `student_allocations`
--
ALTER TABLE `student_allocations`
  ADD PRIMARY KEY (`SAllocateId`),
  ADD UNIQUE KEY `RollNo` (`RollNo`),
  ADD KEY `ExamCode` (`ExamCode`),
  ADD KEY `InstCode` (`InstCode`);

--
-- Indexes for table `university_datas`
--
ALTER TABLE `university_datas`
  ADD PRIMARY KEY (`data_id`),
  ADD UNIQUE KEY `InstCode` (`InstCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deans`
--
ALTER TABLE `deans`
  MODIFY `DeanId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dean_allocations`
--
ALTER TABLE `dean_allocations`
  MODIFY `DeanAllocateId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dean_location_statuses`
--
ALTER TABLE `dean_location_statuses`
  MODIFY `DeanLocationStatusId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `ExamId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `InstId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `institute_distance`
--
ALTER TABLE `institute_distance`
  MODIFY `distance_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `location_detects`
--
ALTER TABLE `location_detects`
  MODIFY `mapping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `student_allocations`
--
ALTER TABLE `student_allocations`
  MODIFY `SAllocateId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `university_datas`
--
ALTER TABLE `university_datas`
  MODIFY `data_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
