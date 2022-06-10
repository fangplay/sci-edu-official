-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 09:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sciedu_official`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_data`
--

CREATE TABLE `project_data` (
  `project_id` int(11) NOT NULL,
  `project_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `count_teacher` int(11) NOT NULL,
  `count_student` int(11) NOT NULL,
  `start_day` date NOT NULL,
  `end_day` date NOT NULL,
  `c_name` varchar(300) NOT NULL,
  `c_email` varchar(300) NOT NULL,
  `c_phone` varchar(50) NOT NULL,
  `least_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `school_id` int(11) NOT NULL,
  `status_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_data`
--

INSERT INTO `project_data` (`project_id`, `project_name`, `class`, `subject`, `branch`, `count_teacher`, `count_student`, `start_day`, `end_day`, `c_name`, `c_email`, `c_phone`, `least_date`, `school_id`, `status_id`) VALUES
(1, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นด้านวิทยาศาสตร์ ม.5 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', 5, 35, '2020-02-15', '2020-02-16', 'รุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591,074-412215', '2020-06-09 04:44:06', 14, 5),
(2, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นด้านวิทยาศาสตร์ ม.4 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิสิกส์,เคมี,ชีววิทยา', 'สงขลา', 3, 69, '2020-01-18', '2020-01-19', 'รุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591,074-412215', '2020-06-09 04:44:06', 14, 5),
(3, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นด้านวิทยาศาสตร์ ม.2 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัธยมศึกษาตอนต้น', 'ชีววิทยา,ดาราศาสตร์,เคมี', 'สงขลา', 0, 62, '2019-12-14', '2019-12-15', 'ครูรุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591', '2020-06-09 04:44:06', 14, 5),
(4, 'ค่ายเรียนรู้วิทยาศาสตร์เชิงปฏิบัติการ Science Training Program โรงเรียนสังคมอิสลามวิทยา จ.สงขลา  ', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'พัทลุง', 0, 58, '2019-11-09', '2019-11-10', 'น.ส.อังคณา ล่าแหละหมัน', '', '084-8578798', '2020-06-09 04:44:06', 32, 5),
(5, 'ค่ายพัฒนาทักษะและกระบวนการทางวิทยาศาสตร์ โรงเรียนคันธพิทยาคาร จ.ตรัง \r\n', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', 27, 55, '2019-11-07', '2019-11-08', 'นายดนัยศักดิ์ ทองคำ', '', '091-8499697', '2020-07-04 04:13:56', 33, 5),
(6, 'ค่ายพัฒนากระบวนการทางวิทยาศาสตร์และคณิตศาสตร์ โรงเรียนประเหลียนผดุงศิษย์ จ.ตรัง', 'ชั้นมัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', 0, 51, '2019-08-30', '2019-08-31', '', 'psschool14@gmail.com', '075-291444', '2020-06-09 04:44:06', 35, 5),
(7, 'ค่ายวิทยาศาสตร์ รูปแบบ STEM โรงเรียนเทศบาลจุ่งฮั่ว จ.พัทลุง ', 'ชั้นมัธยมศึกษาตอนต้น', 'ชีววิทยา', 'พัทลุง', 0, 69, '2019-07-20', '2019-07-20', 'ครูชะอ้อน เสือสิงห', '', '089-6773888,074-613165', '2020-06-09 04:44:06', 34, 5),
(8, 'ค่ายปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.4 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัะญมศึกษาตอนปลาย', 'ชีววิทยา', 'สงขลา', 0, 74, '2019-07-20', '2019-07-21', 'ครูรุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591,074-412215', '2020-06-09 04:44:06', 14, 5),
(9, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.2 โรงเรียนดรุณศาสน์วิทยา จ.ปัตตานี ', 'ชั้นมัธยมศึกษาตอนต้น', 'ชีววิทยา,เคมี,ฟิสิกส์', 'สงขลา', 0, 68, '2019-07-13', '2019-07-14', 'ครูรุสนี อายีมะสาและ', 'rusnee.4815@gmail.com', '093-6493591,074-412215', '2020-06-09 04:44:06', 14, 5),
(10, 'ค่ายส่งเสริมและพัฒนาอัจฉริยภาพด้านวิทยาศาสตร์ คณิตศาสตร์และคอมพิวเตอร์ สำหรับนักเรียนโครงการ MASTER PROGRAM (ม.2)', 'ชั้นมัธยมศึกษาตอนต้น', 'คอมพิวเตอร์,ฟิสิกส์,เคมี', 'พัทลุง', 10, 64, '2019-06-27', '2019-06-29', 'ครูฮัสนีดา เจ๊ะอาหลี', 'husda.330@gmail.com', '066-0072567', '2020-06-09 04:44:06', 2, 5),
(11, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.ต้น', 'ชั้นมัธยมศึกษาตอนต้น', 'ฟิสิกส์,เตมี,ชีววิทยา', 'สงขลา', 0, 93, '2019-06-14', '2019-06-15', 'ครูบดินทร์ภัทร เดี่ยววาณิชย์', 'badinpat5@gmail.com', '085-3516419,074-391017 ต่อ 114', '2020-06-09 04:44:06', 31, 5),
(12, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์  ม.ต้น', 'ชั้นมัธยมศึกษาตอนต้น', 'ฟิสิกส์,ชีววิทยา,เคมี', 'สงขลา', 0, 73, '2019-05-18', '2019-05-19', 'ฝ่ายวิชาการโรงเรียนภูเก็ตวิทยาลัย', 'pkw@pkw.ac.th', '076-212075 ต่อ 108', '2020-06-09 04:44:06', 30, 5),
(13, 'ค่ายปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.2 ', 'ชั้นมัธยมศึกษาตอนต้น', 'ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', 0, 62, '2019-01-26', '2019-01-27', 'ครูรุสนี  อายีมะสำและ', 'rusnee481@gmail.com', '093-6493591', '2020-06-09 04:44:06', 14, 5),
(14, 'ค่ายปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ ม.4', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'สงขลา', 0, 40, '2019-01-18', '2019-01-19', 'ครูรุสนี  อายีมะสำและ', 'rusnee481@gmail.com', '093-6493591', '2020-06-09 04:44:06', 14, 5),
(15, 'ค่ายเทคนิคปฏิบัติการเบื้องต้นทางด้านวิทยาศาสตร์ โรงเรียนสตรีพัทลุง จ.พัทลุง ', 'ชั้นมัธยมศึกษาตอนต้น,ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี', 'พัทลุง', 10, 124, '2018-12-08', '2018-12-09', 'ครูจันทิรา', 'janjira.002@hotmail.com', '086-6935971', '2020-06-30 07:56:09', 20, 5),
(46, 'การอบรมการเรียนการสอนในด้านคอมพิวเตอร์', 'ชั้นมัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'พัทลุง', 14, 60, '2020-08-13', '2020-08-14', 'อาภัพ รันทด', 'failing.001@hotmail.com', '0946652314', '2020-07-05 06:31:06', 1, 3),
(103, 'การเรียนการสอนสำหรับนักคอมพิวเตอร์', 'มัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'พัทลุง', 7, 35, '2020-07-23', '2020-07-24', 'นัยยะ', 'naiya.0076@hotmail.com', '0963365214', '2020-07-06 02:21:05', 100, 2),
(104, 'การเรียนการสอนสำหรับนักคอมพิวเตอร์', 'มัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'พัทลุง', 7, 35, '2020-07-23', '2020-07-24', 'นัยยะ', 'naiya.0076@hotmail.com', '0963365214', '2020-07-11 18:40:09', 100, 3),
(106, 'การเรียนการสอนสำหรับนักคอมพิวเตอร์', 'มัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'พัทลุง', 9, 44, '2020-07-24', '2020-07-25', 'นัยยะ', 'naiya.0076@hotmail.com', '0963365214', '2020-07-06 03:22:18', 102, 2),
(107, 'การเรียนการสอนสำหรับนักคอมพิวเตอร์', 'มัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'พัทลุง', 10, 45, '2020-07-24', '2020-07-25', 'นัยยะ', 'naiya.0076@hotmail.com', '0963365214', '2020-07-10 09:38:07', 103, 2),
(108, 'การอบรมการเรียนการสอนในด้านคอมพิวเตอร์', 'ชั้นมัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'สงขลา', 8, 35, '2020-08-24', '2020-08-25', 'อาภัพ รันทด', 'failing.001@hotmail.com', '0946652314', '2020-07-11 06:58:30', 6, 1),
(109, 'การเรียนการสอนสำหรับนักคอมพิวเตอร์', 'มัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'สงขลา', 4, 30, '2020-07-30', '2020-07-31', 'นัยยะ', 'naiya.0076@hotmail.com', '0963365214', '2020-07-18 05:01:35', 100, 2),
(110, 'การอบรมสำหรับนักคอมพิวเตอร์ ระดับชั้นมัธยมศึกษาตอนปลาย', 'ชั้นมัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์', 'สงขลา', 7, 42, '2020-08-26', '2020-08-27', 'นัยยะ', 'naiya.0076@hotmail.com', '0963365214', '2020-08-05 12:27:32', 104, 2),
(111, 'อมรมIOT สำหรับนักเรียนระดับชั้นมัธยมศึกษาตอนปลาย', 'ชั้นมัธยมศึกษาตอนปลาย', 'คอมพิวเตอร์', 'พัทลุง', 6, 30, '2020-08-29', '2020-08-31', 'นัยยะ', 'naiya.0076@hotmail.com', '0963365214', '2020-08-05 12:28:34', 102, 2),
(112, 'ค่ายเรียนรู้วิทยาศาสตร์เชิงปฏิบัติการ Science Trianing Program', 'ชั้นมัธยมศึกษาตอนปลาย', 'ฟิสิกส์,เคมี,ชีววิทยา', 'พัทลุง', 0, 55, '2018-11-10', '2018-11-11', 'ครูอังคณา  ล่าแหละหมัน', '', '084-8578798', '2020-08-09 12:34:11', 32, 5);

-- --------------------------------------------------------

--
-- Table structure for table `school_data`
--

CREATE TABLE `school_data` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(41, 'โรงเรียนแสงทองวิทยา สงขลา'),
(100, 'โรงเรียนชะอวดวิทยาคม จ.นครศรีธรรมราช'),
(102, 'โรงเรียนกัลยาณีศรีธรรมราช จ.นครศรีธรรมราช'),
(103, 'โรงเรียนปากพนัง จ.นครศรีธรรมราช'),
(104, 'โรงเรียนสุหัวหร้าวิทยา จ.นราธิวาส');

-- --------------------------------------------------------

--
-- Table structure for table `staff_project`
--

CREATE TABLE `staff_project` (
  `s_p_id` int(11) NOT NULL,
  `s_p_name` varchar(1000) NOT NULL,
  `s_p_class` varchar(1000) NOT NULL,
  `s_p_subject` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_project`
--

INSERT INTO `staff_project` (`s_p_id`, `s_p_name`, `s_p_class`, `s_p_subject`) VALUES
(1, 'การอบรมสำหรับนักคอมพิวเตอร์ ระดับชั้นมัธยมศึกษาตอนปลาย', 'ชั้นมัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,คอมพิวเตอร์'),
(2, 'การอบรมสำหรับนักฟิสิกส์ในระดับชั้นมัธยมศึกษาตอนปลาย', 'ชั้นมัธยมศึกษาตอนปลาย', 'คณิตศาสตร์,ฟิสิกส์,เคมี'),
(3, 'อมรมIOT สำหรับนักเรียนระดับชั้นมัธยมศึกษาตอนปลาย', 'ชั้นมัธยมศึกษาตอนปลาย', 'คอมพิวเตอร์');

-- --------------------------------------------------------

--
-- Table structure for table `status_data`
--

CREATE TABLE `status_data` (
  `status_id` int(10) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_data`
--

INSERT INTO `status_data` (`status_id`, `status_name`) VALUES
(1, 'ทำโครงการการเรียนการสอน'),
(2, 'ร้องขอโครงการการเรียนการสอน'),
(3, 'ยอมรับโครงการแล้ว'),
(4, 'กำลังดำเนินการโครงการ'),
(5, 'โครงการเสร็จเรียบร้อย');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `u_id` mediumint(32) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `least_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `least_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`u_id`, `username`, `user_password`, `display_name`, `user_type`, `least_login`, `least_update`) VALUES
(1, 'adminx1', 'admin1234', 'adminMaster', 'admin', '2020-08-06 16:37:07', '2020-07-11 09:25:44'),
(2, 'adminx2', 'admin0098', 'adminG', 'admin', '2020-07-18 05:24:20', '2020-07-18 05:24:20'),
(3, 'adminx3', 'admin0088', 'adminA', 'admin', '2020-07-11 18:07:47', '2020-07-11 18:07:47'),
(4, 'adminx4', 'admin0035', 'adminB', 'admin', '2020-07-11 18:17:55', '2020-07-11 18:17:55'),
(5, 'staffa', 'sa1114', 'atcharawan', 'staff', '2020-08-12 18:58:48', '2020-07-03 03:46:31'),
(6, 'betatype', 'beta0098', 'BetaDev', 'staff', '2020-07-02 04:43:27', '2020-07-03 03:46:31'),
(7, 'alphatype', 'alpha0098', 'AlphaDev', 'staff', '2020-07-02 04:43:27', '2020-07-03 03:46:31'),
(8, 'adminx5', 'admin9833', 'adminB', 'admin', '2020-07-02 04:43:27', '2020-07-03 03:46:31'),
(9, 'gammatype', 'staff0096', 'GammaDev', 'staff', '2020-07-02 04:43:27', '2020-07-03 03:46:31'),
(15, 'adminx6', 'admin0098', 'AdminZX', 'admin', '2020-07-03 04:01:13', '2020-07-03 04:01:13'),
(16, 'adminx6', 'admin0099', 'adminN', 'admin', '2020-07-11 18:35:06', '2020-07-11 18:35:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_data`
--
ALTER TABLE `project_data`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `school_data`
--
ALTER TABLE `school_data`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `staff_project`
--
ALTER TABLE `staff_project`
  ADD PRIMARY KEY (`s_p_id`);

--
-- Indexes for table `status_data`
--
ALTER TABLE `status_data`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_data`
--
ALTER TABLE `project_data`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `school_data`
--
ALTER TABLE `school_data`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `staff_project`
--
ALTER TABLE `staff_project`
  MODIFY `s_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_data`
--
ALTER TABLE `status_data`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `u_id` mediumint(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_data`
--
ALTER TABLE `project_data`
  ADD CONSTRAINT `project_data_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status_data` (`status_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `project_data_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school_data` (`school_id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
