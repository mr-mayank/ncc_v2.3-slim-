-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 06:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncc_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `aceddemicdetails`
--

CREATE TABLE `aceddemicdetails` (
  `acID` int(200) NOT NULL,
  `qualify` varchar(100) NOT NULL DEFAULT '10th',
  `marks` varchar(50) DEFAULT NULL,
  `idMarks` varchar(200) DEFAULT NULL,
  `isCrime` varchar(50) NOT NULL DEFAULT 'No',
  `circumCrime` varchar(255) DEFAULT NULL,
  `schoolType` varchar(100) NOT NULL DEFAULT 'College',
  `stream` varchar(100) NOT NULL DEFAULT 'Science',
  `schoolName` varchar(200) DEFAULT NULL,
  `userID` int(200) DEFAULT NULL,
  `future1` varchar(255) DEFAULT NULL,
  `future2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aceddemicdetails`
--

INSERT INTO `aceddemicdetails` (`acID`, `qualify`, `marks`, `idMarks`, `isCrime`, `circumCrime`, `schoolType`, `stream`, `schoolName`, `userID`, `future1`, `future2`) VALUES
(8, '10', '78', 'NA', 'No', '', 'School', 'Science', '', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `id` int(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `future1` varchar(255) DEFAULT NULL,
  `future2` varchar(255) DEFAULT NULL,
  `future3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`id`, `username`, `email`, `password`, `future1`, `future2`, `future3`) VALUES
(1, 'Dhaval J Variya', 'dhavalj1234@gmail.com', '7f76b85e970d85d39c11f94d559a6a48', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `bankID` int(200) NOT NULL,
  `ifscCode` varchar(100) DEFAULT NULL,
  `accountNo` varchar(100) DEFAULT NULL,
  `adharNo` varchar(50) DEFAULT NULL,
  `panNo` varchar(50) DEFAULT NULL,
  `userID` int(200) DEFAULT NULL,
  `future1` varchar(255) DEFAULT NULL,
  `future2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`bankID`, `ifscCode`, `accountNo`, `adharNo`, `panNo`, `userID`, `future1`, `future2`) VALUES
(5, '7894561230', '789456123456', '987654321654', '456789123456', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_handle`
--

CREATE TABLE `event_handle` (
  `id` int(255) NOT NULL,
  `evName` varchar(100) NOT NULL,
  `evDetails` varchar(255) NOT NULL,
  `startDate` varchar(200) NOT NULL,
  `endDate` varchar(200) NOT NULL,
  `participant` varchar(255) DEFAULT NULL,
  `notInterested` varchar(255) DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `typeOfEvent` int(10) NOT NULL DEFAULT 0,
  `campPhoto` varchar(200) DEFAULT NULL,
  `anoId` int(200) DEFAULT NULL,
  `future1` varchar(255) DEFAULT NULL,
  `future2` varchar(255) DEFAULT NULL,
  `future3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_handle`
--

INSERT INTO `event_handle` (`id`, `evName`, `evDetails`, `startDate`, `endDate`, `participant`, `notInterested`, `place`, `typeOfEvent`, `campPhoto`, `anoId`, `future1`, `future2`, `future3`) VALUES
(1, 'Summer Camp', 'We have to decided to held a camp in this summer vacation . I know you have waited for this long time so this is it. We are finally going to camp. In this camp we are gonna do all the activities like, tracking, cycling, camping, etc.', '2022-11-30', '2022-11-29', NULL, '', 'Maharashtra', 0, 'uploads/1669807346Gnu.png', NULL, NULL, NULL, NULL),
(2, 'Winter Camp', 'winter camp ooohoooooo', '2022-12-01', '2022-12-04', NULL, NULL, 'Jammu Kashmir', 1, NULL, 1, NULL, NULL, NULL),
(3, 'Republic Parade', 'paradeeee', '2022-11-28', '2022-11-29', NULL, NULL, 'Jammu Kashmir', 0, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nccinterest`
--

CREATE TABLE `nccinterest` (
  `inId` int(200) NOT NULL,
  `nccWill` varchar(50) NOT NULL DEFAULT 'Yes',
  `nccUnit` varchar(200) NOT NULL DEFAULT '1 GUJ CTC NCC AHMEDABAD',
  `enrollNcc` varchar(50) NOT NULL DEFAULT 'No',
  `enrollment` varchar(100) DEFAULT NULL,
  `dissmissed` varchar(50) NOT NULL DEFAULT 'No',
  `dissmissedDetails` varchar(255) DEFAULT NULL,
  `nameKin` varchar(200) DEFAULT NULL,
  `telephoneKin` varchar(50) DEFAULT NULL,
  `relationKin` varchar(100) DEFAULT NULL,
  `userID` int(200) DEFAULT NULL,
  `future1` varchar(255) DEFAULT NULL,
  `future2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nccinterest`
--

INSERT INTO `nccinterest` (`inId`, `nccWill`, `nccUnit`, `enrollNcc`, `enrollment`, `dissmissed`, `dissmissedDetails`, `nameKin`, `telephoneKin`, `relationKin`, `userID`, `future1`, `future2`) VALUES
(5, '', '', 'No', '', 'Yes', '', 'mayank', '9313268918', 'mayank', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `pid` int(100) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `birthDate` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) NOT NULL DEFAULT 'INDIAN',
  `fatherFname` varchar(100) DEFAULT NULL,
  `fatherLname` varchar(100) DEFAULT NULL,
  `fatherMname` varchar(100) DEFAULT NULL,
  `motherFname` varchar(100) DEFAULT NULL,
  `motherLname` varchar(100) DEFAULT NULL,
  `motherMname` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contactNo` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) DEFAULT 'Male',
  `blood` varchar(100) DEFAULT 'A+',
  `nrRailway` varchar(200) DEFAULT NULL,
  `nrPolice` varchar(200) DEFAULT NULL,
  `userID` int(200) DEFAULT NULL,
  `future1` varchar(255) DEFAULT NULL,
  `future2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`pid`, `fname`, `lname`, `mname`, `birthDate`, `nationality`, `fatherFname`, `fatherLname`, `fatherMname`, `motherFname`, `motherLname`, `motherMname`, `address`, `contactNo`, `email`, `gender`, `blood`, `nrRailway`, `nrPolice`, `userID`, `future1`, `future2`) VALUES
(18, 'mayank', 'dilipbhai', 'patel', '2022-11-26', '', 'mayhank', 'amnksh', 'mayahnk', 'mayank', 'mayank', 'jmayahnk', 'ukai ukai ', '9313268612', 'mrmayank6877@gmail.com', 'Male', 'A+', 'ahmedabad', '', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentdocument`
--

CREATE TABLE `studentdocument` (
  `docID` int(200) NOT NULL,
  `userPhoto` varchar(255) DEFAULT NULL,
  `signPhoto` varchar(255) DEFAULT NULL,
  `passPhoto` varchar(255) DEFAULT NULL,
  `userID` int(200) DEFAULT NULL,
  `future1` varchar(255) DEFAULT NULL,
  `future2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdocument`
--

INSERT INTO `studentdocument` (`docID`, `userPhoto`, `signPhoto`, `passPhoto`, `userID`, `future1`, `future2`) VALUES
(2, 'uploads/1669805119one piece nico robin pirates roronoa zoro chopper brook anime manga franky tony tony chopper monkey_www.wallpaperhi.com_2.jpg', 'uploads/1669805119identiCard.jpg', 'uploads/1669805119identiCard.jpg', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_credentials`
--

CREATE TABLE `student_credentials` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `anoID` int(200) NOT NULL,
  `regNo` varchar(200) DEFAULT NULL,
  `rank` int(10) DEFAULT 5,
  `future2` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_credentials`
--

INSERT INTO `student_credentials` (`id`, `email`, `password`, `anoID`, `regNo`, `rank`, `future2`, `active_status`) VALUES
(4, 'mrmayank6877@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 'GJ/20/SDA/110132', 0, NULL, 1),
(5, 'sannin6877@gmail.com', 'e99a18c428cb38d5f260853678922e03', 1, NULL, 3, NULL, 1),
(6, 'govind@duck.com', '9165ba72edd3216eace6efa743fece99', 0, NULL, 2, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aceddemicdetails`
--
ALTER TABLE `aceddemicdetails`
  ADD PRIMARY KEY (`acID`);

--
-- Indexes for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `event_handle`
--
ALTER TABLE `event_handle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nccinterest`
--
ALTER TABLE `nccinterest`
  ADD PRIMARY KEY (`inId`);

--
-- Indexes for table `personaldetails`
--
ALTER TABLE `personaldetails`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `studentdocument`
--
ALTER TABLE `studentdocument`
  ADD PRIMARY KEY (`docID`);

--
-- Indexes for table `student_credentials`
--
ALTER TABLE `student_credentials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aceddemicdetails`
--
ALTER TABLE `aceddemicdetails`
  MODIFY `acID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `bankID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_handle`
--
ALTER TABLE `event_handle`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nccinterest`
--
ALTER TABLE `nccinterest`
  MODIFY `inId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personaldetails`
--
ALTER TABLE `personaldetails`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `studentdocument`
--
ALTER TABLE `studentdocument`
  MODIFY `docID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_credentials`
--
ALTER TABLE `student_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
