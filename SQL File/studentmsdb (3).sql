-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2023 at 09:12 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

DROP TABLE IF EXISTS `tblbook`;
CREATE TABLE IF NOT EXISTS `tblbook` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(255) DEFAULT NULL,
  `StudentClass` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `StuID` varchar(20) DEFAULT NULL,
  `StudentBranch` varchar(50) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `BookID` varchar(20) DEFAULT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `BookAuthorName` varchar(255) DEFAULT NULL,
  `BorrowDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DueDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `StudentName`, `StudentClass`, `Gender`, `StuID`, `StudentBranch`, `ContactNumber`, `BookID`, `BookName`, `BookAuthorName`, `BorrowDate`, `DueDate`) VALUES
(4, 'MADHU K S', '8 sem', 'Male', '4HG19CS018', 'CSE', '7483297683', '780', 'Elements of civil engineering and engineering mechanics', 'M.N Shesha Prakash', '2023-05-23 18:30:00', '2023-06-23'),
(5, 'MADHU K S', '8 sem', 'Male', '4HG19CS018', 'CSE', '7483297683', '717', 'Understanding oracle', 'James T . perry', '2023-05-23 18:30:00', '2023-06-23');

--
-- Triggers `tblbook`
--
DROP TRIGGER IF EXISTS `set_dates`;
DELIMITER $$
CREATE TRIGGER `set_dates` BEFORE INSERT ON `tblbook` FOR EACH ROW BEGIN
  SET NEW.BorrowDate = CURRENT_DATE();
  SET NEW.DueDate = DATE_ADD(NEW.BorrowDate, INTERVAL 30 DAY);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblbookdetails`
--

DROP TABLE IF EXISTS `tblbookdetails`;
CREATE TABLE IF NOT EXISTS `tblbookdetails` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `BookID` varchar(10) DEFAULT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `BookauthorName` varchar(255) DEFAULT NULL,
  `Numberofcopies` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblbookdetails`
--

INSERT INTO `tblbookdetails` (`ID`, `BookID`, `BookName`, `BookauthorName`, `Numberofcopies`) VALUES
(6, '719', 'Windos API bible', 'James L. Conger', 1),
(5, '718', 'Antennas and ware propagation', 'John d krous', 1),
(4, '717', 'Understanding oracle', 'James T . perry', 1),
(7, '720', 'Programmer\'s guide to foxpro 2.5', 'Howard dickler', 1),
(8, '721', 'Cobol programming', 'M K Roy', 1),
(9, '723', 'Understanding d base III plus', 'Alan Simpson', 1),
(10, '724', 'Sap netweaver for dummies', 'Dan woods', 1),
(11, '725', 'Theory and problems of programming with fortron', 'Seymour lipschuty', 1),
(12, '726', 'Theory and problems of programming with basic', 'Byron s.Gottfid', 1),
(13, '727', 'Mastering for pro 2', 'Charles Siegel', 1),
(14, '729', 'The UNIX Programming environment', 'Brian W kernigran', 1),
(15, '730', 'A user guide to the UNIX system', 'Rebecea Thomas', 1),
(16, '731', 'Clipper programming guide', 'Rick Spence', 1),
(17, '732', 'The ABC\'S of windows\' 3.1', 'Alan R Neibauer', 1),
(18, '733', 'Mostering 1-2-3', 'Carolyn Jorgensen', 1),
(19, '734', 'Engineering Electromagnetics', 'W H Hayt', 1),
(20, '735', 'Basic Electronics', 'M Nagabhushan', 1),
(21, '736', 'Digital communications', 'simon Haykin', 1),
(22, '737', 'Digital computer fundamentals', 'Thomas C Baatee', 1),
(23, '738', 'Electronic Devices and circuits', 'David A Bell', 1),
(24, '739', 'Basic Electronics', 'UB Mahadevaswamy', 1),
(25, '740', 'Electronic Devices and circuits theory', 'Robert L Boylestad', 1),
(26, '741', 'Microwave engineering', 'Dvid M Pozar', 1),
(27, '742', 'Digital Image Proassing', 'Rafael C Gonzalez', 1),
(28, '743', 'Digital principals & applications', 'Albert paul Malvino', 1),
(29, '744', 'Semiconductor Devices', 'kanaan kano', 1),
(30, '745', 'Signal and system', 'Alan v Oppenheim', 1),
(31, '746', 'Wireless communicatin', 'Theodore,s rappaport', 1),
(32, '747', 'Hughes Electrical and electonic technology', 'Revised by', 1),
(33, '748', 'Logic and computer design fundamentals', 'Morris Mano', 1),
(34, '749', 'Cryptography and network Secuerity', 'William stallings', 1),
(35, '750', 'Engineering circuit Analysis', 'willam H Hayt', 1),
(36, '751', 'analog communication', 'A P Godse', 1),
(37, '752', 'CMOS Digital interated circuits', 'Sung .Mo', 1),
(38, '753', 'Linear interated circuits', 'd Roy Choudhary', 1),
(39, '754', 'Information theory and coding', 'K. Giridhar', 1),
(40, '755', 'Surveying volume-1', 'S. K Duggal', 1),
(41, '756', 'Surveying volume-2', 'S. K Duggal', 1),
(42, '757', 'Advanced Engineering Mathematics', 'Erwing Kreyszig', 1),
(43, '758', 'Reactions, Rearrangements and reagents', 'S N Sanyal', 1),
(44, '759', 'Engineering chemistry', 'R V Gadag', 1),
(45, '760', 'Engineering chemistry', 'jain', 1),
(46, '761', 'A Text book of Strenght of materials', 'R. K Bansal', 1),
(47, '762', 'Text book of engineering physics', 'S .O Pillai', 1),
(48, '763', 'Elements of mechanical engineering', 'Kestoor Preveen', 1),
(49, '764', 'Plane trignometry engineering', 'S. L Loney', 1),
(50, '765', 'Higher Algebra', 'H .S hall & S .R Knignt', 1),
(51, '766', 'Basic Electrical engineering', 'V. N Mittle', 1),
(52, '767', 'Mathematical analysis', 'G.N Berman', 1),
(53, '768', 'Problem is calculus of one variable', 'I.A Maron', 1),
(54, '769', 'Strenth of Materials', 'B.S Basavarajaiah', 1),
(55, '770', 'Modren Approach to chemical calculation', 'Ramendra C Makerjee', 1),
(56, '771', 'A Text book of fluid mechanics and Hydraulic Machanic', 'R.K Bansal', 1),
(57, '772', 'University chemistry', 'Bruce M.Mahan', 1),
(58, '773', 'Coordinate geomistry', 'S.K Goyal', 1),
(59, '774', 'Organic Chamistry', 'Robert Thornton Morrison', 1),
(60, '775', 'Mechanical of Materials', 'J B K Das', 1),
(61, '776', 'Basic Elecrical engineering', 'U A Bakshi', 1),
(62, '777', 'Physics for scientists and engineering with modern pysics', 'John W.Jewett', 1),
(63, '778', 'Higher Engineering Mathematics', 'B.S Grewal', 1),
(64, '779', 'Engineering Physics', 'R.K Gaur', 1),
(65, '780', 'Elements of civil engineering and engineering mechanics', 'M.N Shesha Prakash', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

DROP TABLE IF EXISTS `tblclass`;
CREATE TABLE IF NOT EXISTS `tblclass` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(50) DEFAULT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `ClassName`, `Section`, `CreationDate`) VALUES
(1, '1 sem', NULL, '2022-01-13 10:42:14'),
(2, '2 sem', NULL, '2022-01-13 10:42:35'),
(3, '3 sem', NULL, '2022-01-13 10:42:41'),
(4, '4  sem', NULL, '2022-01-13 10:42:47'),
(5, '5 sem', NULL, '2022-01-13 10:42:52'),
(6, '6 sem', NULL, '2022-01-13 10:42:57'),
(7, '7 sem', NULL, '2022-01-13 10:43:04'),
(8, '8 sem', NULL, '2022-01-13 10:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

DROP TABLE IF EXISTS `tblfaculty`;
CREATE TABLE IF NOT EXISTS `tblfaculty` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FacultyName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FacultyEmail` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Gender` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `FacultyID` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ContactNumber` bigint DEFAULT NULL,
  `AlternateNumber` bigint DEFAULT NULL,
  `Address` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `UserName` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `Password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `Image` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `registrationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Branch` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`ID`, `FacultyName`, `FacultyEmail`, `Gender`, `DOB`, `FacultyID`, `ContactNumber`, `AlternateNumber`, `Address`, `UserName`, `Password`, `Image`, `registrationDate`, `Branch`) VALUES
(10, 'Harshitha H R', 'harshithahr056@gmail.com', 'Female', '1994-03-14', '4HG21CS112', 7483297683, 9874563214, 'Hassan', '4HG21CS112', '4b19b3f2d622f95aae2e0ea1c8b98816', 'c3836acf068a9b227834e0adda226ac21682853922.jpg', '2023-04-30 11:25:22', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `tblfacultybook`
--

DROP TABLE IF EXISTS `tblfacultybook`;
CREATE TABLE IF NOT EXISTS `tblfacultybook` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FacultyName` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `FacultyID` varchar(20) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `BookID` varchar(20) DEFAULT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `BookAuthorName` varchar(255) DEFAULT NULL,
  `BorrowDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DueDate` date DEFAULT ((curdate() + interval 30 day)),
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblfacultybook`
--

INSERT INTO `tblfacultybook` (`ID`, `FacultyName`, `Gender`, `FacultyID`, `Branch`, `ContactNumber`, `BookID`, `BookName`, `BookAuthorName`, `BorrowDate`, `DueDate`) VALUES
(2, 'Harshitha H R', 'Female', '4HG21CS112', 'CSE', '7483297683', '717', 'Understanding oracle', 'James T . perry', '2023-05-24 08:43:23', '2023-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

DROP TABLE IF EXISTS `tblnotice`;
CREATE TABLE IF NOT EXISTS `tblnotice` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NoticeTitle` mediumtext,
  `ClassId` int DEFAULT NULL,
  `NoticeMsg` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `NoticeTitle`, `ClassId`, `NoticeMsg`, `CreationDate`) VALUES
(2, 'Marks of Unit Test.', 3, 'Meet your class teacher for seeing copies of unit test', '2022-01-19 06:35:58'),
(3, 'Marks of Unit Test.', 2, 'Meet your class teacher for seeing copies of unit test', '2022-01-19 06:35:58'),
(4, 'Test', 3, 'This is for testing.', '2022-02-02 18:17:03'),
(5, 'Test Notice', 8, 'This is for Testing.', '2022-02-02 19:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblotp`
--

DROP TABLE IF EXISTS `tblotp`;
CREATE TABLE IF NOT EXISTS `tblotp` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `StuID` varchar(10) DEFAULT NULL,
  `ContactNumber` int DEFAULT NULL,
  `Otp` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: start;\"><font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, ????, ??, SimSun, STXihei, ????, serif\"><span style=\"font-size: 15px;\"><h3>Vision</h3>To Achieve Excellence in Technical Education Through Innovation, Research, Entrepreneurship and Professional Ethics.<br><h3>Mision</h3>1.To educate students professionally to enhance creativity and social responsibility.<br>\r\n2.To collaborate with premier educational institutes, R & D and industries to strengthen technical knowledge.<br>\r\n3.To create a common platform for students and faculties to take up Research activities to address technical problems faced by rural parts of our nation.<br>\r\n4.To inculcate entrepreneurial skills and values among students.</span></font><br></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'Government Engineering College Mosalehosalli,\r\n\r\n               Hassan - 573201,\r\n\r\n               Karnataka, India.', 'gecmh22@gmail.com', 8172200724, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnotice`
--

DROP TABLE IF EXISTS `tblpublicnotice`;
CREATE TABLE IF NOT EXISTS `tblpublicnotice` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NoticeTitle` varchar(200) DEFAULT NULL,
  `NoticeMessage` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpublicnotice`
--

INSERT INTO `tblpublicnotice` (`ID`, `NoticeTitle`, `NoticeMessage`, `CreationDate`) VALUES
(1, 'School will re-open', 'Consult your class teacher.', '2022-01-20 09:11:57'),
(2, 'Test Public Notice', 'This is for Testing\r\n', '2022-02-02 19:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
CREATE TABLE IF NOT EXISTS `tblstudent` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(200) DEFAULT NULL,
  `StudentEmail` varchar(200) DEFAULT NULL,
  `StudentClass` varchar(100) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint DEFAULT NULL,
  `AltenateNumber` bigint DEFAULT NULL,
  `Address` mediumtext,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `StudentBranch` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `StudentName`, `StudentEmail`, `StudentClass`, `Gender`, `DOB`, `StuID`, `ContactNumber`, `AltenateNumber`, `Address`, `UserName`, `Password`, `Image`, `DateofAdmission`, `StudentBranch`) VALUES
(6, 'MADHU K S', 'msm875990@gmail.com', '8 sem', 'Male', '2002-01-20', '4HG19CS018', 7483297683, 9019314105, 'BCM BOYS HOSTEL MOSALEHOSAHALLI HASSAN', '4hg19cs018', '50c048d1edefeaea11f3e110f7751b4c', '6158531b0de58c3d3a7fafe20e813da31681738619.jpg', '2023-04-17 13:36:59', 'CSE'),
(7, 'Bhaskar G', 'bhaskarg1758@gmail.com', '8', 'Male', '2001-05-01', '4HG19EE002', 8951436412, 8861283915, 'Chitradurga', '4HG19EE002', 'ea156c055ec258f485442b49eff2e021', '82aefb1bf5ef9fdc0a050091be02c3e61683475630.jpg', '2023-05-07 16:07:10', 'EEE'),
(10, 'Mahalakshmi M', 'mahalakshmi123hsn@gmail.com', '8', 'Female', '2003-03-26', '4HG19CS019', 8296173653, 9980232368, 'PWD COLONY HASSAN', '4HG19CS019', '7c4a45f14297ab9f4099db1edc917f59', '5defb925fd70feaff28182c2c88fb4561684909317.jpg', '2023-05-24 06:21:57', 'CSE'),
(11, 'Srikar Prasad S', 'srikarprasad22@gmail.com', '8', 'Male', '2001-06-29', '4HG19CS038', 8088184605, 9353673089, 'Basaveshwara nagar belur road Hassan', '4HG19CS038', '13f86899e7f649ffe8de5d2c2e8ef027', '4b3c046f34504810f2593727aae60f411684909507.jpg', '2023-05-24 06:25:07', 'CSE'),
(12, 'SUMATHI M N', 'sumathimn2002@gmail.com', '6 sem', 'Female', '2002-02-18', '4HG20CS027', 9353681413, 7483297683, 'Mittahalli village and post , chintamani taluk', '4HG20CS027', 'ae55224d98b237325d1bbb02ef290efd', 'c1672447a205f033128f0553c96d409e1684909849.jpg', '2023-05-24 06:30:49', 'CSE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
