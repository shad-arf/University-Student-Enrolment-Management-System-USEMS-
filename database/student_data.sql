-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time:  %10, %2023 pm31 %0:%May +00:00May
-- Server version: 10.4.10-MariaDB
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmapplications`
--

DROP TABLE IF EXISTS `tbladmapplications`;
CREATE TABLE IF NOT EXISTS `tbladmapplications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` char(20) NOT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `kuFirstName` varchar(255) NOT NULL,
  `kuLastName` varchar(255) NOT NULL,
  `idCode` varchar(200) NOT NULL,
  `facultyId` int(255) NOT NULL,
  `departmentId` int(255) NOT NULL,
  `kuSecondName` varchar(255) NOT NULL,
  `secondName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `adminNote` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmapplications`
--

INSERT INTO `tbladmapplications` (`id`, `userId`, `gender`, `image`, `firstName`, `lastName`, `kuFirstName`, `kuLastName`, `idCode`, `facultyId`, `departmentId`, `kuSecondName`, `secondName`, `status`, `adminNote`) VALUES
(3, '5', 'Male', '1aaaa6ac2672929f6911a9b1a8cd8510.png', 'kawan', 'gfd', 'gdfgfd', 'Ø­Û•Ù…Û•', '3213123', 4, 2, 'gdfgfd', 'pshtiwan', 'selected', ''),
(5, '6', 'Male', 'fb5c81ed3a220004b71069645f112867.png', 'kawan', 'dsd1', 'Ø­Û•Ù…Û•', 'Ø¦Û•Ø­Ù…Û•Ø¯', '123', 4, 2, 'Ú©Û•Ø±ÛŒÙ…', 'karim', 'selected', ' layba'),
(6, '7', 'Female', 'f6055e5e148240f6ff1cc40fd610e82a.jpg', 'osdjvpoeibo', 'akcn', 'sodjvobdh', ',nsdobef', '4567890', 2, 2, 'nsoderbv', 'knsvon', 'rejected', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `type`, `AdminRegdate`) VALUES
(2, 'Coding Cush', 'codingcush', 1234567897, 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'super_admin', '2021-05-18 04:49:25'),
(4, 'hama', 'hama', 1221, 'mhamadjamal946@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2', '2023-04-26 03:06:21'),
(5, 'kawan', 'kawan', 750897444, 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2', '2023-04-30 18:15:18'),
(6, 'hama', 'hama', 750897444, 'mhamadjamal946@gmail.com', '25d55ad283aa400af464c76d713c07ad', '4', '2023-04-30 18:16:16'),
(7, 'dkcjdsb', 'dkcjdsb', 750897444, 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '4', '2023-04-30 18:17:36'),
(8, 'jvksdjbv1', 'jvksdjbv1', 750897444, 'kamyar@click.iq', '1c79b30dfabab901b42a9505b5e0a18d', '', '2023-04-30 18:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbldep`
--

DROP TABLE IF EXISTS `tbldep`;
CREATE TABLE IF NOT EXISTS `tbldep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldep`
--

INSERT INTO `tbldep` (`id`, `name`) VALUES
(2, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

DROP TABLE IF EXISTS `tbldocument`;
CREATE TABLE IF NOT EXISTS `tbldocument` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `TransferCertificate` varchar(120) DEFAULT NULL,
  `TenMarksheeet` varchar(120) DEFAULT NULL,
  `TwelveMarksheet` varchar(120) DEFAULT NULL,
  `GraduationCertificate` varchar(120) DEFAULT NULL,
  `PostgraduationCertificate` varchar(120) DEFAULT NULL,
  `UploadDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `elevnMarksheeet` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

DROP TABLE IF EXISTS `tblfaculty`;
CREATE TABLE IF NOT EXISTS `tblfaculty` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`id`, `name`) VALUES
(2, 'it'),
(4, 'db'),
(5, 'net');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

DROP TABLE IF EXISTS `tblnotice`;
CREATE TABLE IF NOT EXISTS `tblnotice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) DEFAULT NULL,
  `Decription` text DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `Title`, `Decription`, `CreationDate`) VALUES
(3, 'Admission Notice for BCA / MCA', 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '2021-10-26 06:36:07'),
(4, 'Test Notification for Demo', 'This is demo notification for demo project. Student Admission Management System....', '2021-10-26 07:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblsecondadmapplications`
--

DROP TABLE IF EXISTS `tblsecondadmapplications`;
CREATE TABLE IF NOT EXISTS `tblsecondadmapplications` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `dob` varchar(255) NOT NULL,
  `nationality` varchar(11) NOT NULL,
  `motherName` varchar(11) NOT NULL,
  `placeOfBreath` varchar(255) NOT NULL,
  `placeHeSheLive` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `governate` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `idCardNumber` int(255) NOT NULL,
  `nationaltyNumber` int(255) NOT NULL,
  `phoneNumberFirstPerson` varchar(255) NOT NULL,
  `studentPlace` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `idCardFile` varchar(255) NOT NULL,
  `nationaltyCardFile` varchar(255) NOT NULL,
  `certificate12File` varchar(255) NOT NULL,
  `bloodTestFile` varchar(255) NOT NULL,
  `eyeTestFile` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `userId` int(255) NOT NULL,
  `adminNote` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsecondadmapplications`
--

INSERT INTO `tblsecondadmapplications` (`id`, `dob`, `nationality`, `motherName`, `placeOfBreath`, `placeHeSheLive`, `country`, `governate`, `city`, `village`, `state`, `idCardNumber`, `nationaltyNumber`, `phoneNumberFirstPerson`, `studentPlace`, `religion`, `idCardFile`, `nationaltyCardFile`, `certificate12File`, `bloodTestFile`, `eyeTestFile`, `status`, `userId`, `adminNote`) VALUES
(3, '14/11/1997', 'iraqi', 'naada', 'suli', 'raparin', 'Iraq', 'suli', 'sulaymaniyah', 'nya', 'raparin', 123, 456, '789', 'home', 'islamm', 'c9baca3cda1c39194c04fe2170c3da65.png', 'c9baca3cda1c39194c04fe2170c3da65.png', 'c9baca3cda1c39194c04fe2170c3da65.png', 'c9baca3cda1c39194c04fe2170c3da65.png', 'c9baca3cda1c39194c04fe2170c3da65.png', 'selected', 5, 'rejected1'),
(4, '14/11/1997', 'iraqi', 'naada', 'suli', 'raparin', 'Iraq', 'suli', 'sulaymaniyah', 'dsad', 'raparin', 64564, 5546, '6456', 'gdgdgfd', 'gdfgd', 'fb5c81ed3a220004b71069645f112867.png', 'fb5c81ed3a220004b71069645f112867.png', 'fb5c81ed3a220004b71069645f112867.png', '4a47a0db6e60853dedfcfdf08a5ca249.png', 'fb5c81ed3a220004b71069645f112867.png', 'selected', 6, ' layba'),
(5, '12/4/2023', 'Kurdish', 'shahla', 'halabja', 'halabja', 'Iraq', 'halbaj', 'halanja', 'halabja', 'Diyala Governorate', 1214445, 3434322, '1234565', 'dormitory', 'islam', 'f6055e5e148240f6ff1cc40fd610e82a.jpg', 'f6055e5e148240f6ff1cc40fd610e82a.jpg', 'f6055e5e148240f6ff1cc40fd610e82a.jpg', 'f6055e5e148240f6ff1cc40fd610e82a.jpg', 'f6055e5e148240f6ff1cc40fd610e82a.jpg', 'selected', 7, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `PostingDate`) VALUES
(5, 'Coding', 'Cush', 9905860878, 'user@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-16 17:57:23'),
(6, 'kawan', 'pshtiwan', 12345678, 'pshtiwankawan@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2023-04-27 01:29:14'),
(7, 'mahamd', 'jamal', 7508974440, 'mhamadjamal946@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2023-05-06 21:41:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
