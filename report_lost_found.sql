-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 05:15 AM
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
-- Database: `report_lost_found`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(20) NOT NULL,
  `receiver_id` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `message`, `sent_at`, `is_read`) VALUES
(1, '201450289', '', 'hi', '2026-04-11 12:24:17', 0),
(2, '201457289', 'ADMIN', 'kl', '2026-04-11 12:25:42', 0),
(3, '201450289', '', 'jk', '2026-04-11 12:26:34', 0),
(4, '201450289', 'ADMIN', 'n', '2026-04-11 12:26:45', 0),
(5, '201450289', '', 'zxc', '2026-04-11 12:32:09', 0),
(6, '201457289', 'ADMIN', 'hello', '2026-04-11 12:32:54', 1),
(7, '201457289', 'Admin', 'lllllllllllllllllllll', '2026-04-11 15:45:37', 0),
(8, '201450289', '', 'mn', '2026-04-12 15:53:41', 0),
(9, '201457289', 'Admin', 'hg', '2026-04-12 15:54:20', 0),
(10, '201457289', 'Admin', 'hjkj', '2026-04-12 15:54:30', 0),
(11, '201450289', '', 'gh', '2026-04-13 17:25:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `student_no` text NOT NULL,
  `salute` text NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_at` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_reply` text NOT NULL,
  `replied_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `student_no`, `salute`, `comment`, `comment_at`, `admin_reply`, `replied_at`) VALUES
(14, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '0000-00-00 00:00:00', 'ASCAscASdLncsmmm', '2026-04-10 10:00:33'),
(16, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '0000-00-00 00:00:00', 'reply', '2026-04-13 23:50:58'),
(17, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '0000-00-00 00:00:00', '', '2024-04-15 17:54:38'),
(18, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '0000-00-00 00:00:00', '', '2024-04-15 17:54:43'),
(19, '201457289', 'gf', 'fghj', '0000-00-00 00:00:00', '', '2024-04-16 18:10:03'),
(20, '201455289', 'hi', 'copyright | all rights reserved | designed by nkanyiso consulting pty ltd ......', '0000-00-00 00:00:00', '', '2024-04-17 14:29:08'),
(23, '201457289', 'google', 'please reset my google account password', '0000-00-00 00:00:00', 'mjknmkjlklkjsaX', '2026-04-08 22:05:29'),
(25, '201457289', 'aaaa', 'aaaaa', '0000-00-00 00:00:00', 'gggggggggggggggggggggggg', '2026-04-09 19:33:50'),
(26, '201457289', 'jhh', 'kn', '0000-00-00 00:00:00', '', '2026-04-10 00:43:06'),
(27, '201457289', 'jhh', 'kn', '0000-00-00 00:00:00', '', '2026-04-10 00:45:08'),
(28, '201459289', 'apple', 'assist me with password', '0000-00-00 00:00:00', 'Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and Smart Art graphics change to match your new theme. When you apply styles, your headings change to match the new theme.\r\nSave time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.\r\nReading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.', '2026-04-10 13:34:37'),
(29, '201457289', 'n', 'b', '2026-04-10 00:00:00', 'Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.\r\n\r\nSave time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.', '2026-04-11 10:01:05'),
(30, '201457289', 'nnnn', 'nmn', '2026-04-10 00:00:00', '', NULL),
(31, '201457289', 'ghjh', 'mnb ', '2026-04-10 00:00:00', '', NULL),
(32, '201457289', 'jj', 'hvbv ', '2026-04-11 11:40:24', '', NULL),
(33, '201457289', 'icons', ' b n bnv gbn', '2026-04-11 11:40:47', '', NULL),
(34, '201457289', 'dsf', 'sadfsda', '2026-04-11 13:07:56', '', NULL),
(35, '201457289', 'abc', 'league', '2026-04-11 13:09:35', '', NULL),
(36, '201457289', 'molo', 'm', '2026-04-11 13:11:47', 'jo', '2026-04-13 04:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `doc_type`
--

CREATE TABLE `doc_type` (
  `document_id` int(11) NOT NULL,
  `document_no` varchar(20) DEFAULT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`document_id`, `document_no`, `document_name`, `document_status`) VALUES
(54, 'DOC_TY1564', 'Smart Card ID', 1),
(55, 'DOC_TY8240', 'NSC', 1),
(57, 'DOC_TY8975', 'Higher Cert', 0),
(81, 'DOC_TY2452', 'Degree', 0),
(82, 'DOC_TY5853', 'Diploma', 1),
(83, 'DOC_TY8410', 'Birth Cert', 1),
(84, 'DOC_TY5047', 'Drivers Licence', 1),
(88, 'DOC_TY8142', 'Car Logbook', 1),
(89, 'DOC_TY3122', 'Green book ID', 1),
(90, 'DOC_TY4048', 'xcbz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_no` text NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_no`, `location_name`, `location_status`) VALUES
(81, 'LOC_202615393', 'Unizulu Library', 1),
(82, 'LOC_202659629', 'Main Gate Entrance', 1),
(83, 'LOC_202645193', 'HP Lab Helpdesk', 1),
(84, 'LOC_202604523', 'Student Centre', 0),
(86, 'LOC_202617588', 'East Student Res', 0),
(87, 'LOC_202688186', 'West Student Res', 0),
(88, 'LOC_202634541', 'B Lab Helpdesk', 1),
(89, 'LOC_202642290', 'King Bhekuzulu Hall', 0),
(90, 'LOC_202670305', 'PSD Office 204', 1),
(93, 'LOC_202648307', 'vxcv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lost_found`
--

CREATE TABLE `lost_found` (
  `doc_id` int(4) NOT NULL,
  `student_no` int(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `fullnames` varchar(50) NOT NULL,
  `type_of_doc` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `reported_by` varchar(12) NOT NULL,
  `date_reported` datetime NOT NULL DEFAULT current_timestamp(),
  `collecting_status` text NOT NULL DEFAULT 'Un-Collected'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lost_found`
--

INSERT INTO `lost_found` (`doc_id`, `student_no`, `surname`, `fullnames`, `type_of_doc`, `location`, `reported_by`, `date_reported`, `collecting_status`) VALUES
(1, 201451289, 'Homee', 'MINA', 'Identity Document', 'Admin Building', '201450289', '2024-01-28 22:50:35', 'Un-Collected'),
(3, 201451289, 'Homee', 'MINA', 'Edu-Loan Card', 'Admin Building', '201450289', '2024-01-28 22:53:51', 'Un-Collected'),
(5, 201452289, 'THINA', 'Mina', 'Matric Certificate', 'Main Gate', '201450289', '2024-02-25 21:02:11', 'Un-Collected'),
(6, 201452289, 'Yeka', 'Aquele', 'Student Card', 'Admin Building', '201450289', '2024-03-17 21:26:13', 'Collected'),
(49, 201450289, 'Mkhize N', 'Nkanyiso', 'Identity Document', 'Main Gate', '201450289', '2026-04-05 19:58:46', 'Collected'),
(53, 201450289, 'Mkhize N', 'Nkanyiso', 'Identity Document', 'Main Gate', '201450289', '2026-04-05 20:07:17', 'Un-Collected'),
(54, 201450289, 'Mkhize N', 'Nkanyiso', 'Identity Document', 'Admin Building', '201450289', '2026-04-05 22:10:54', 'Un-Collected'),
(55, 201450289, 'Mkhize N', 'Nkanyiso', 'Identity Document', 'Student Centre', '201450289', '2026-04-06 01:29:03', 'Un-Collected'),
(56, 201450289, 'Mkhize N', 'Nkanyiso', 'Matric Certificate', 'Main Gate', '201450289', '2026-04-06 01:36:42', 'Collected'),
(57, 201450289, 'Mkhize N', 'Nkanyiso', 'Edu-Loan Card', 'Library', '201450289', '2026-04-06 06:34:55', 'Un-Collected'),
(58, 201450289, 'Mkhize N', 'Nkanyiso', 'Edu-Loan Card', 'Library', '201450289', '2026-04-06 12:55:31', 'Collected'),
(59, 201450289, 'Mkhize N', 'Nkanyiso', 'Edu-Loan Card', 'Student Centre', '201450289', '2026-04-06 15:35:28', 'Un-Collected'),
(63, 201450289, 'Mkhize N', 'Nkanyiso', 'Drivers License', 'HP Lab ', '201450289', '2026-04-07 03:03:19', 'Un-Collected'),
(70, 201457289, 'Seven', 'Ninety-two', 'Degree', 'HP Lab', '201450289', '2026-04-09 19:36:19', 'Collected'),
(71, 201450289, 'Mkhize N', 'Nkanyiso', 'Birth Cert', 'B Lab Helpdesk', '201450289', '2026-04-09 22:16:40', 'Collected'),
(72, 201450289, 'Mkhize N', 'Nkanyiso', 'ID Card', 'PSD Office', '201450289', '2026-04-10 00:05:52', 'Un-Collected'),
(73, 201457289, 'Seven', 'Ninety-two', 'ID Card', 'Unizulu Library', '201450289', '2026-04-10 00:10:28', 'Un-Collected'),
(74, 201457289, 'Seven', 'Ninety-two', 'ID Card', 'PSD Office', '201450289', '2026-04-10 00:37:59', 'Collected'),
(77, 201457289, 'Seven', 'Ninety-two', 'ID Card', 'PSD Office', '201457289', '2026-04-10 00:45:53', 'Collected'),
(78, 201350289, 'Ngunezi', 'Nqubeko', 'Smart Card ID', 'HP Lab Helpdesk', '201457289', '2026-04-11 02:45:58', 'Un-Collected');

-- --------------------------------------------------------

--
-- Table structure for table `student_inf`
--

CREATE TABLE `student_inf` (
  `stu_inf_id` int(4) NOT NULL,
  `stu_reg_id` int(4) NOT NULL,
  `identity_no` varchar(18) NOT NULL,
  `email_addr` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `biography` varchar(1500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_inf`
--

INSERT INTO `student_inf` (`stu_inf_id`, `stu_reg_id`, `identity_no`, `email_addr`, `date_of_birth`, `contact_no`, `biography`, `date`) VALUES
(4, 61, '124565 6555 55 5', 'asibonge@gmail.com', '2024-05-22', '076 855 3894', 'Helloooooooooooow N', '2024-01-27 21:50:31'),
(30, 88, '256652 2225 25 ', '201456289@lost_found.com', '2025-10-30', '076 854 5955', 'Yellowwwwwwwwwww', '2024-04-08 09:10:53'),
(33, 91, '245568 8975 65 6', '201457289@stu-uz.ac.za', '1970-02-27', '076 855 9595', 'I am Ninety-two, a student at University of ...', '2024-04-08 16:15:42'),
(34, 92, '794653 2326 66 2', '201459289@gmail.com', '0000-00-00', '076 854 5825', '', '2024-04-13 15:58:49'),
(42, 100, '', '', '0000-00-00', '', '', '2024-05-30 19:57:09'),
(43, 101, '800808 7774 44 4', 'nqubeko@lost_found.com', '1980-08-08', '075 245 6666', '', '2024-05-30 20:02:41'),
(47, 105, '', '', '0000-00-00', '', '', '2026-04-12 14:07:35'),
(48, 106, '', '', '0000-00-00', '', '', '2026-04-12 15:00:45'),
(49, 107, '', '', '0000-00-00', '', '', '2026-04-12 15:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `stu_reg_id` int(4) NOT NULL,
  `student_no` varchar(10) NOT NULL,
  `surname` varchar(10) NOT NULL,
  `fullnames` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `verified` enum('No','Yes') NOT NULL,
  `role` enum('Student','Admin') NOT NULL,
  `removed` enum('No','Yes') NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`stu_reg_id`, `student_no`, `surname`, `fullnames`, `password`, `gender`, `date_of_birth`, `verified`, `role`, `removed`, `date_registered`) VALUES
(61, '201450289', 'Mkhize N', 'Nkanyiso', '$2y$10$KczC7UAONf8Dm1avdLIds.ObzxhsAsUDKQyRFyhcKiFMccEk6fg1u', 'Male', '2024-01-02', 'Yes', 'Admin', 'No', '2024-01-27 21:50:31'),
(88, '201456289', 'Sona', 'Mina', '$2y$10$KAco1xvx3N0J1WZzt7W4vObTozuonOArmrV8xBsEioGeD3ICUOUim', 'Male', '1970-01-01', 'No', 'Admin', 'No', '2024-04-08 09:10:52'),
(91, '201457289', 'Seven', 'Ninety-two  ', '$2y$10$RLjMX/IAk9Ah/UnnEna94.7vrYNblGjmVv4hIQNaN2DTUmb.fx9pe', 'Male', '1970-01-01', 'Yes', 'Student', 'No', '2024-04-08 16:15:42'),
(92, '201459289', 'Liswa', 'Nip', '$2y$10$SEbM4pDrfLw9K663Ghj8oOZhHOuvqFGzP5DyO8H2UZ.O70JM1MZnK', 'Female', '1970-01-01', 'No', 'Student', 'Yes', '2024-04-13 15:58:49'),
(100, '201450282', 'Mkhize', 'Nkanyiso', '$2y$10$EZCr73rjlAvWLHJidq4q5.goCl/fRB8k1/IF9kkrOEMULd2oVWUn2', 'Male', '1970-01-01', 'Yes', 'Student', 'No', '2024-05-30 19:57:08'),
(101, '201350289', 'Ngunezi', 'Nqubeko', '$2y$10$iCpl8EQVaLtERvLCbujs8OodKIRZC.FBN1qQRTiXkZZ8X9Cc/mSPe', 'Male', '1970-01-01', 'Yes', 'Student', 'No', '2024-05-30 20:02:40'),
(105, '201250289', 'Mkhize', 'Asibonge', '$2y$10$f1rjvdGLEgQ/npNhicGfIuOBQXlb/iSCDbOaOH/BOMcCb.veqXWHW', 'Male', '1970-01-01', 'No', 'Student', 'No', '2026-04-12 14:07:33'),
(106, '201357289', 'Gcwabe', 'Mina', '$2y$10$Og6nS7zW5Xdet4scQ90AHOZvJKrIvz091WZSZQEkjG0PZVgbHJAp6', 'Female', '1970-01-01', 'No', 'Student', 'No', '2026-04-12 15:00:45'),
(107, '201426589', 'ADFA', 'SDAFG', '$2y$10$7RNGZivSB7w1OllTboh0buU2Qm6PcYEwPbP7Ed8YkXwOo19o9LfcW', 'Female', '1970-01-01', 'Yes', 'Student', 'No', '2026-04-12 15:19:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Indexes for table `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `lost_found`
--
ALTER TABLE `lost_found`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `stu_lf_id` (`doc_id`);

--
-- Indexes for table `student_inf`
--
ALTER TABLE `student_inf`
  ADD PRIMARY KEY (`stu_inf_id`),
  ADD UNIQUE KEY `stu_inf_id` (`stu_inf_id`),
  ADD KEY `stu_reg_id` (`stu_reg_id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`stu_reg_id`),
  ADD UNIQUE KEY `stu_reg_id` (`stu_reg_id`),
  ADD UNIQUE KEY `student_no` (`student_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `doc_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `student_inf`
--
ALTER TABLE `student_inf`
  MODIFY `stu_inf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `stu_reg_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_inf`
--
ALTER TABLE `student_inf`
  ADD CONSTRAINT `student_inf_ibfk_1` FOREIGN KEY (`stu_reg_id`) REFERENCES `student_reg` (`stu_reg_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
