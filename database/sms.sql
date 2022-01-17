-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 06:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserId` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserId`, `Password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `AttendanceDate` date NOT NULL,
  `Attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `StudentId`, `SubjectId`, `ClassId`, `AttendanceDate`, `Attendance`) VALUES
(90, 15, 1, 1, '2021-06-30', 1),
(91, 19, 1, 1, '2021-06-30', 1),
(92, 15, 3, 1, '2021-06-30', 1),
(93, 19, 3, 1, '2021-06-30', 1),
(94, 16, 33, 5, '2021-11-13', 1),
(95, 17, 33, 5, '2021-11-13', 1),
(96, 16, 36, 5, '2021-11-13', 1),
(97, 17, 36, 5, '2021-11-13', 1),
(98, 16, 35, 5, '2021-11-13', 1),
(99, 17, 35, 5, '2021-11-13', 1),
(100, 16, 33, 5, '2021-11-13', 0),
(101, 17, 33, 5, '2021-11-13', 0),
(102, 16, 33, 5, '2021-11-13', 0),
(103, 17, 33, 5, '2021-11-13', 1),
(104, 16, 32, 5, '2021-11-13', 1),
(105, 17, 32, 5, '2021-11-13', 1),
(106, 16, 32, 5, '2021-11-13', 1),
(107, 17, 32, 5, '2021-11-13', 1),
(108, 16, 32, 5, '2021-11-13', 1),
(109, 17, 32, 5, '2021-11-13', 1),
(110, 16, 32, 5, '2021-11-14', 1),
(111, 17, 32, 5, '2021-11-14', 1),
(112, 16, 32, 5, '2021-11-14', 0),
(113, 17, 32, 5, '2021-11-14', 1),
(114, 16, 32, 5, '2021-11-18', 0),
(115, 17, 32, 5, '2021-11-18', 0),
(116, 16, 34, 5, '2021-11-12', 1),
(117, 17, 34, 5, '2021-11-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(50) NOT NULL,
  `ClassNameNumeric` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `ClassName`, `ClassNameNumeric`) VALUES
(1, 'First', 1),
(2, 'Second', 2),
(3, 'Third', 3),
(4, 'Fourth', 4),
(5, 'Fifth', 5);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(2, 'Meeting', '2021-05-01 00:00:00', '2021-05-02 00:00:00'),
(4, 'Meeting', '2021-07-01 00:00:00', '2021-07-02 00:00:00'),
(5, 'break', '2021-07-02 00:00:00', '2021-07-02 02:30:00'),
(6, 'no class', '2021-07-03 00:00:00', '2021-07-03 00:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

DROP TABLE IF EXISTS `parents`;
CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `ParentName` varchar(200) NOT NULL,
  `StudentName` varchar(200) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Age` int(4) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Phone` varchar(55) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `ParentName`, `StudentName`, `DOB`, `Address`, `Age`, `Email`, `Gender`, `Phone`, `Photo`) VALUES
(6, 'Rajesh Jain', '15', '1973-06-05', 'h.n. 12,near mali market,phulo ki magri', 51, 'rajesh123@gmail.com', 'Male', '123456789', 'Picture1.png');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

DROP TABLE IF EXISTS `query`;
CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Query` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `Name`, `Contact`, `Query`) VALUES
(1, 'naveet', 23423423, 'make classs');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `TotalObtainedHYE` int(11) NOT NULL,
  `TotalObtainedYE` int(11) NOT NULL,
  `TotalObtained` int(10) NOT NULL,
  `TotalMaximum` int(11) NOT NULL,
  `MarksAll` text NOT NULL,
  `Percent` decimal(5,2) NOT NULL,
  `Result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `StudentId`, `ClassId`, `TotalObtainedHYE`, `TotalObtainedYE`, `TotalObtained`, `TotalMaximum`, `MarksAll`, `Percent`, `Result`) VALUES
(2, 16, 5, 250, 250, 500, 1000, 'a:4:{i:0;a:5:{i:0;s:2:\"32\";i:1;s:2:\"33\";i:2;s:2:\"34\";i:3;s:2:\"35\";i:4;s:2:\"36\";}i:1;a:2:{i:0;a:5:{i:0;s:2:\"50\";i:1;s:2:\"50\";i:2;s:2:\"50\";i:3;s:2:\"50\";i:4;s:2:\"50\";}i:1;a:5:{i:0;s:1:\"C\";i:1;s:1:\"C\";i:2;s:1:\"C\";i:3;s:1:\"C\";i:4;s:1:\"C\";}}i:2;a:2:{i:0;a:5:{i:0;s:2:\"50\";i:1;s:2:\"50\";i:2;s:2:\"50\";i:3;s:2:\"50\";i:4;s:2:\"50\";}i:1;a:5:{i:0;s:1:\"C\";i:1;s:1:\"C\";i:2;s:1:\"C\";i:3;s:1:\"C\";i:4;s:1:\"C\";}}i:3;a:5:{i:0;i:100;i:1;i:100;i:2;i:100;i:3;i:100;i:4;i:100;}}', '50.00', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `RollNumber` int(11) NOT NULL,
  `EnrollmentNumber` int(50) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `FatherName` varchar(200) NOT NULL,
  `MotherName` varchar(200) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `DOB` date NOT NULL,
  `Age` int(4) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ParentPhoneNumber` varchar(20) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `RollNumber`, `EnrollmentNumber`, `Name`, `FatherName`, `MotherName`, `Address`, `Email`, `DOB`, `Age`, `PhoneNumber`, `ParentPhoneNumber`, `ClassId`, `Photo`, `Gender`, `Password`) VALUES
(15, 202, 1202, 'Kunal Jain', 'Rajesh Jain', 'Leena jain', '2/190 Jai Shree Colony, Udaipur', 'kunal0705@gmail.com', '2000-05-18', 20, '8440010584', '9602016942', 2, 'Kunal Jain.jpeg', 'Male', '123'),
(16, 503, 1503, 'Priya Soni', 'Ganesh Soni', 'Lalita Devi', '1/150 Bapu Bazar, Udaipur', 'priya@gmail.com', '2001-12-19', 20, '9823948593', '9414703254', 5, 'Priya Soni.jpeg', 'Female', '123'),
(17, 504, 1504, 'Abhilasha Sharma', 'Shekhar Sharma', 'Neha Sharma', '1/59 Hari Krishana Colony, udaipur', 'abhilasha@gmail.com', '2001-10-12', 19, '6375031022', '9999999999', 5, 'Abhilasha Sharma.jpeg', 'Female', '123'),
(18, 401, 1401, 'Aditya Ranawat', 'Udai Lal Ranawat', 'Manu Ranawat', '1/149 pratap nagar, udaipur', 'aditya@gmail.com', '2000-03-29', 21, '9854394583', '8754532345', 4, 'Aditya Ranawat.jpeg', 'Male', '123'),
(19, 101, 1101, 'Manisha Bagwan', 'Kailash Bagwan', 'Lalita Bagwan', '1/250 meera nagar, Udaipur', 'manisha@gmail.com', '2001-04-12', 19, '9843535968', '8794848378', 1, 'Manisha Bagwan.jpg', 'Female', '123'),
(20, 201, 1201, 'Navneet Sharma', 'Jignesh Sharma', 'Aasha Sharma', '2/130 meera nagar, Udaipur', 'naveet@gmail.com', '2000-12-20', 22, '9823968583', '8794648379', 2, 'Navneet Sharma.jpeg', 'Male', '123'),
(21, 301, 1301, 'Pooja Mali', 'Pappu mali', 'Sunita Devi', '2/130 Panch Vihar Colony, Udaipur', 'pooja123@gmail.com', '2001-10-25', 20, '8435458834', '8534357453', 3, 'Pooja Mali.jpg', 'Female', '123');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `SubjectCode` varchar(50) NOT NULL,
  `SubjectName` varchar(150) NOT NULL,
  `ClassId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `SubjectCode`, `SubjectName`, `ClassId`) VALUES
(1, 'HI01', 'Hindi', 1),
(2, 'MT01', 'Mathematics', 1),
(3, 'E01', 'English', 1),
(4, 'HI02', 'Hindi', 2),
(5, 'MT02', 'Mathematics', 2),
(6, 'E02', 'English', 2),
(7, 'HI03', 'Hindi', 3),
(8, 'MT03', 'Mathematics', 3),
(25, 'E03', 'English', 3),
(26, 'SC03', 'Science', 3),
(27, 'HI04', 'Hindi', 4),
(28, 'MT04', 'Mathematics', 4),
(29, 'E04', 'English', 4),
(30, 'SC04', 'Science', 4),
(31, 'SS04', 'Social Science', 4),
(32, 'HI05', 'Hindi', 5),
(33, 'MT05', 'Mathematics', 5),
(34, 'E05', 'English', 5),
(35, 'SC05', 'Science', 5),
(36, 'SS05', 'Social Science', 5);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `AadhaarNumber` int(11) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `FatherName` varchar(200) NOT NULL,
  `MotherName` varchar(200) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `DOB` date NOT NULL,
  `Age` int(4) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ParentPhoneNumber` varchar(20) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `AadhaarNumber`, `AccountNumber`, `Name`, `FatherName`, `MotherName`, `Address`, `Email`, `DOB`, `Age`, `PhoneNumber`, `ParentPhoneNumber`, `ClassId`, `Photo`, `Gender`, `Password`) VALUES
(1, 2147483647, '123213213232323', 'Sahil Kumar', 'Ashok Kumar', 'Meena Kumari', '675-E Type-1', 'remoke7486@sc2hub.com', '2000-09-14', 20, '9814740274', '7986770527', 5, 'sahilkumar.jpg', 'Male', '2CcExu');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `TimeTable` varchar(256) NOT NULL,
  `PublishDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `ClassId`, `TimeTable`, `PublishDate`) VALUES
(9, 3, 'a:4:{i:7;s:10:\"2021-06-27\";i:8;s:10:\"2021-06-30\";i:25;s:10:\"2021-07-02\";i:26;s:10:\"2021-06-27\";}', '2021-06-26 11:56:09'),
(10, 2, 'a:3:{i:4;s:10:\"2021-06-27\";i:5;s:10:\"2021-06-28\";i:6;s:10:\"2021-06-29\";}', '2021-06-26 13:34:27'),
(11, 1, 'a:3:{i:1;s:10:\"2021-06-30\";i:2;s:10:\"2021-07-01\";i:3;s:10:\"2021-07-01\";}', '2021-06-30 11:18:22'),
(12, 5, 'a:5:{i:32;s:10:\"2021-07-02\";i:33;s:10:\"2021-07-03\";i:34;s:10:\"2021-07-03\";i:35;s:10:\"2021-07-04\";i:36;s:10:\"2021-07-05\";}', '2021-06-30 11:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ClassId` (`ClassId`),
  ADD KEY `SubjectId` (`SubjectId`),
  ADD KEY `StudentId` (`StudentId`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_ibfk_2` (`ClassId`),
  ADD KEY `results_ibfk_3` (`StudentId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_ibfk_1` (`ClassId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_ibfk_1` (`ClassId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ClassId` (`ClassId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`ClassId`) REFERENCES `classes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`StudentId`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `classes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `classes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
