-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 09:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sciedu-official`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

CREATE TABLE `contact_data` (
  `contact_id` int(11) NOT NULL,
  `contact_name` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_data`
--

INSERT INTO `contact_data` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`) VALUES
(1, 'รุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591,074-412215'),
(2, 'รุสนี อายีมะสาและ', 'rusnee.4815@gmail.com ', '093-6493591,074-412215'),
(3, 'ครูรุสนี อายีมะสาและ', 'rusnee.4815@gmail.com ', '093-6493591'),
(4, 'น.ส.อังคณา ล่าแหละหมัน', '', '084-8578798'),
(5, 'นายดนัยศักดิ์ ทองคำ', '', '091-8499697'),
(6, '', 'psschool14@gmail.com', '075-291444 '),
(7, 'ครูชะอ้อน เสือสิงห', '', '089-6773888/074-613165 '),
(8, 'ครูรุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591/073-412215'),
(9, 'ครูรุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591/073-412215'),
(10, 'ครูฮัสนีดา เจ๊ะอาหลี', '', '066-0072567'),
(11, 'ครูบดินทร์ภัทร เดี่ยววาณิชย์', 'badinpat5@gmail.com', '085-3516419/074-391017 ต่อ 114'),
(12, 'ฝ่ายวิชาการโรงเรียนภูเก็ตวิทยาลัย', 'pkw@pkw.ac.th', '076-212075 ต่อ 108'),
(13, 'ครูรุสนี  อายีมะสำและ', 'rusnee481@gmail.com', '093-6493591'),
(14, 'ครูรุสนี  อายีมะสำและ', 'rusnee481@gmail.com', '093-6493591');

-- --------------------------------------------------------

--
-- Table structure for table `project_data`
--

CREATE TABLE `project_data` (
  `project_id` int(11) NOT NULL,
  `project_name` text COLLATE utf8_unicode_ci NOT NULL,
  `class_type` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` text COLLATE utf8_unicode_ci NOT NULL,
  `branch` text COLLATE utf8_unicode_ci NOT NULL,
  `least_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `school_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `status_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_data`
--

INSERT INTO `project_data` (`project_id`, `project_name`, `class_type`, `subject_name`, `branch`, `least_date`, `school_id`, `contact_id`, `train_id`, `status_id`) VALUES
(1, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นด้านวิทยาศาสตร์ ม.5 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', '2020-01-31 12:39:25', 14, 1, 1, 4),
(2, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นด้านวิทยาศาสตร์ ม.4 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชี่นมัธยมศึกษาตอนปลาย', 'ฟิสิสิกส์,เคมี,ชีววิทยา', 'สงขลา', '2020-01-31 12:51:48', 14, 2, 2, 5),
(3, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นด้านวิทยาศาสตร์ ม.2 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัธยมศึกษาตอนต้น', 'ชีววิทยา,ดาราศาสตร์,เคมี', 'สงขลา', '2020-02-22 20:43:23', 14, 3, 3, 5),
(4, 'ค่ายเรียนรู้วิทยาศาสตร์เชิงปฏิบัติการ Science Training Program โรงเรียนสังคมอิสลามวิทยา จ.สงขลา  ', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'พัทลุง', '2020-02-22 20:43:24', 32, 4, 4, 5),
(5, 'ค่ายพัฒนาทักษะและกระบวนการทางวิทยาศาสตร์ โรงเรียนคันธพิทยาคาร จ.ตรัง \r\n', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', '', '2020-02-22 20:43:24', 33, 5, 5, 5),
(6, 'ค่ายพัฒนากระบวนการทางวิทยาศาสตร์และคณิตศาสตร์ โรงเรียนประเหลียนผดุงศิษย์ จ.ตรัง', 'ชั้นมัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', '2020-02-22 20:43:24', 35, 6, 6, 5),
(7, 'ค่ายวิทยาศาสตร์ รูปแบบ STEM โรงเรียนเทศบาลจุ่งฮั่ว จ.พัทลุง ', 'ชั้นมัธยมศึกษาตอนต้น', 'ชีววิทยา', 'พัทลุง', '2020-02-22 20:43:24', 34, 7, 7, 5),
(8, 'ค่ายปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.4 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัะญมศึกษาตอนปลาย', 'ชีววิทยา', 'สงขลา', '2020-02-22 20:43:24', 14, 8, 8, 5),
(9, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.2 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัธยมศึกษาตอนต้น', 'ชีววิทยา,เคมี,ฟิสิกส์', 'สงขลา', '2020-02-22 20:43:24', 14, 9, 9, 5),
(10, 'ค่ายส่งเสริมและพัฒนาอัจฉริยภาพด้านวิทยาศาสตร์ คณิตศาสตร์และคอมพิวเตอร์ สำหรับนักเรียนโครงการ MASTER PROGRAM (ม.2)', 'ชั้นมัธยมศึกษาตอนต้น', 'คอมพิวเตอร์,เคมี,ฟิสิกส์', 'พัทลุง', '2020-02-22 20:43:24', 2, 10, 10, 5),
(11, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.ต้น', 'ชั้นมัธยมศึกษาตอนต้น', 'ฟิสิกส์,เตมี,ชีววิทยา', 'สงขลา', '2020-02-22 20:43:24', 31, 11, 11, 5),
(12, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์  ม.ต้น', 'ชั้นมัธยมศึกษาตอนต้น', 'ฟิสิกส์,ชีววิทยา,เคมี', 'สงขลา', '2020-01-31 14:17:20', 30, 12, 12, 5),
(13, 'ค่ายปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.2 ', 'ชั้นมัธยมศึกษาตอนต้น', 'ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', '2020-02-22 20:43:24', 14, 13, 13, 5),
(14, 'ค่ายปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.4', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', '2020-02-22 20:43:24', 14, 14, 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `school_data`
--

CREATE TABLE `school_data` (
  `school_id` int(11) NOT NULL,
  `school_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school_data`
--

INSERT INTO `school_data` (`school_id`, `school_name`) VALUES
(1, 'โรงเรียนเบญมราชูทิศ นครศรีธรรมราช'),
(2, 'โรงเรียนสตรีทุ่งสง นครศรีธรรมราช'),
(3, 'โรงเรียนสภาราชินี ตรัง'),
(4, 'โรงเรียนรัษฎา ตรัง'),
(5, 'โรงเรียนปัญญาวิทย์ ตรัง'),
(6, 'โรงเรียนหาดใหญ่วิทยาลัย สงขลา'),
(7, 'โรงเรียนวังวิเศษ ตรัง'),
(8, 'โรงเรียนทุ่งหนองแห้งประชาสรรค์ ตรัง'),
(9, 'โรงเรียนหาดใหญ่วิทยาคาร สงขลา'),
(10, 'โรงเรียนเบญจมราชูทิศ ปัตตานี'),
(11, 'โรงเรียนจุฬาภาณราชวิทยาลัย นครศรีธรรมราช'),
(12, 'โรงเรียนจุฬาภรณราชวิทยาลัย ตรัง'),
(13, 'โรงเรียนอุบลรัตรราขกัญญาราชวิทยาลัย พัทลุง'),
(14, 'โรงเรียนดรุณศาสน์วิทยา ปัตตานี'),
(17, 'โรงเรียนเวียงสระ สุราษฎร์ธานี '),
(18, 'โรงเรียนราชประชานุเคราะห์ 41 ยะลา'),
(19, 'โรงเรียนป่าพะยอมพิทยาคม พัทลุง'),
(20, 'โรงเรียนสตรีพัทลุง พัทลุง'),
(21, 'โรงเรียนพัทลุง พัทลุง'),
(22, 'โรงเรียนปัญญาทิพย์ สุราษฎร์ธานี '),
(23, 'โรงเรียนขนอมพิทยา นครศรีธรรมราช'),
(25, 'โรงเรียนจุ๋งฮั่วโซะเซียว ตรัง '),
(26, 'โรงเรียนวิเชียรมาตุ ตรัง '),
(27, 'โรงเรียนจะนะชนูปถัมภ์ สงขลา '),
(28, 'โรงเรียนเมืองกระบี่ กระบี่ '),
(29, 'โรงเรียนวังวิเศษ ตรัง '),
(30, 'โรงเรียภูเก็ตวิทยาลัย ภูเก็ต'),
(31, 'โรงเรียนระโนดวิทยา สงขลา '),
(32, 'โรงเรียนสังคมอิสลามวิทยา สงขลา'),
(33, 'โรงเรียนคันธพิทยาคาร ตรัง '),
(34, 'โรงเรียนเทศบาลจุ่งฮั่ว พัทลุง '),
(35, 'โรงเรียนประเหลียนผดุงศิษย์ ตรัง '),
(40, 'โรงเรียนชะอวดวิทยาคาร นครศรีธรรมราช'),
(41, 'โรงเรียนแสงทองวิทยา สงขลา');

-- --------------------------------------------------------

--
-- Table structure for table `status_data`
--

CREATE TABLE `status_data` (
  `status_id` int(10) NOT NULL,
  `status_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_data`
--

INSERT INTO `status_data` (`status_id`, `status_name`) VALUES
(1, 'ร้องขอทำโครงการ'),
(2, 'ร้องขอเพิ่มโครงการใหม่'),
(3, 'ยอมรับทำโครงการ'),
(4, 'ดำเนินการอบรม'),
(5, 'โครงการเสร็จสิ้นเรียบร้อย');

-- --------------------------------------------------------

--
-- Table structure for table `train_data`
--

CREATE TABLE `train_data` (
  `train_id` int(11) NOT NULL,
  `count_teacher` int(11) NOT NULL,
  `count_student` int(11) NOT NULL,
  `start_daytrain` date NOT NULL,
  `end_daytrain` date NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `train_data`
--

INSERT INTO `train_data` (`train_id`, `count_teacher`, `count_student`, `start_daytrain`, `end_daytrain`, `project_id`) VALUES
(1, 5, 35, '2020-02-15', '2020-02-16', 1),
(2, 3, 69, '2020-01-18', '2020-01-19', 2),
(3, 0, 62, '2019-12-14', '2019-12-15', 3),
(4, 0, 58, '2019-11-09', '2019-11-10', 4),
(5, 0, 27, '2019-11-07', '2019-11-08', 5),
(6, 0, 51, '2019-08-30', '2019-08-31', 6),
(7, 0, 69, '2019-07-20', '2019-07-20', 7),
(8, 0, 74, '2019-07-20', '2019-07-21', 8),
(9, 0, 68, '2019-07-13', '2019-07-14', 9),
(10, 0, 64, '2019-06-27', '2019-06-29', 10),
(11, 0, 93, '2019-06-14', '2019-06-15', 11),
(12, 0, 73, '2019-05-18', '2019-05-19', 12),
(13, 0, 62, '2019-01-26', '2019-01-27', 13),
(14, 0, 40, '2019-01-18', '2019-01-19', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(32) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `least_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `user_password`, `display_name`, `user_type`, `least_login`) VALUES
(1, 'adminx1', 'admin1234', 'adminK', 'admin', '2020-01-12 19:25:41'),
(2, 'adminx2', 'admin0098', 'adminG', 'admin', '2020-01-12 19:25:41'),
(3, 'adminx3', 'admin0097', 'adminAlpha', 'admin', '2020-01-12 19:25:41'),
(4, 'adminx4', 'admin0035', 'adminBeta', 'admin', '2020-01-12 19:25:41'),
(5, 'staffa', 'sa1114', 'atcharawan', 'staff', '2020-01-22 04:17:42'),
(6, 'betatype', 'beta0098', 'BetaDev', 'staff', '2020-02-20 18:43:36'),
(7, 'alphatype', 'alpha0098', 'AlphaDev', 'staff', '2020-02-20 18:44:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_data`
--
ALTER TABLE `contact_data`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `project_data`
--
ALTER TABLE `project_data`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `train_id` (`train_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `school_data`
--
ALTER TABLE `school_data`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `status_data`
--
ALTER TABLE `status_data`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `train_data`
--
ALTER TABLE `train_data`
  ADD PRIMARY KEY (`train_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_data`
--
ALTER TABLE `contact_data`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_data`
--
ALTER TABLE `project_data`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `school_data`
--
ALTER TABLE `school_data`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `status_data`
--
ALTER TABLE `status_data`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `train_data`
--
ALTER TABLE `train_data`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
