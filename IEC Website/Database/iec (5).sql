-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 04:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iec`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `aID` int(11) NOT NULL,
  `aFirstName` varchar(25) NOT NULL,
  `aSurname` varchar(30) NOT NULL,
  `aEmail` varchar(25) NOT NULL,
  `aPassword` varchar(15) NOT NULL,
  `aCountry` varchar(30) NOT NULL,
  `aTelephone` varchar(15) NOT NULL,
  `aMobile` varchar(16) NOT NULL,
  `aAddress1` varchar(35) NOT NULL,
  `aAddress2` varchar(30) NOT NULL,
  `aCity` varchar(25) NOT NULL,
  `aRegion` varchar(25) NOT NULL,
  `aPostCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`aID`, `aFirstName`, `aSurname`, `aEmail`, `aPassword`, `aCountry`, `aTelephone`, `aMobile`, `aAddress1`, `aAddress2`, `aCity`, `aRegion`, `aPostCode`) VALUES
(1, 'Nader', 'Golestani', 'ngolestani@hotmail.com', 'password', 'UK', '', '0744276666', '10 London Road', 'Bedfont', 'Feltham', 'Middx', 'TW14 8BE');

-- --------------------------------------------------------

--
-- Table structure for table `agentstudent`
--

CREATE TABLE `agentstudent` (
  `agentstudentID` int(11) NOT NULL,
  `aID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `contract` mediumblob NOT NULL,
  `authorizationLetter` blob NOT NULL,
  `contractDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coursetype`
--

CREATE TABLE `coursetype` (
  `ctID` int(11) NOT NULL,
  `ctName` enum('primary','secondary','further','higher','language','professional') NOT NULL,
  `ctAge` varchar(12) NOT NULL,
  `ctComment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetype`
--

INSERT INTO `coursetype` (`ctID`, `ctName`, `ctAge`, `ctComment`) VALUES
(1, 'primary', '6-11', 'Compulsory education'),
(2, 'secondary', '12-15', 'Compulsory Education'),
(3, 'further', '16-19', 'Pre-University;Pathways; A Levels; BTEC;'),
(4, 'higher', '19 Plus', 'All University Courses. Levels 4-9'),
(5, 'language', '10 Plus', 'Short Visit Visa'),
(6, 'professional', '19 Plus', 'Short Visit Visa');

-- --------------------------------------------------------

--
-- Table structure for table `iecoffice`
--

CREATE TABLE `iecoffice` (
  `officeID` int(11) NOT NULL,
  `officeAddress1` varchar(30) NOT NULL,
  `officeAddress2` varchar(20) NOT NULL,
  `officeCity` varchar(25) NOT NULL,
  `officeRegion` varchar(30) NOT NULL,
  `officePostCode` varchar(15) NOT NULL,
  `officeCountry` varchar(30) NOT NULL,
  `officeTel` varchar(15) NOT NULL,
  `officeMovile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `iID` int(11) NOT NULL,
  `iName` varchar(50) NOT NULL,
  `iType` enum('Private academic','public academic','private non-academic','Public School','Public College','Public University','Private School','Private Language School','Public Language School') NOT NULL,
  `iEnrolmentRequirement` mediumtext NOT NULL,
  `iRefundPolicy` mediumtext NOT NULL,
  `iAge` varchar(12) NOT NULL,
  `iAdress1` varchar(25) NOT NULL,
  `iAddress2` varchar(25) NOT NULL,
  `iCity` varchar(25) NOT NULL,
  `iRegion` varchar(30) NOT NULL,
  `iPostCode` varchar(10) NOT NULL,
  `iCountry` varchar(30) NOT NULL,
  `iWebsite` varchar(30) NOT NULL,
  `iTel` varchar(13) NOT NULL,
  `iEmail` varchar(30) NOT NULL,
  `iCommission` decimal(10,0) NOT NULL,
  `iComment` varchar(255) NOT NULL,
  `image` varchar(20) NOT NULL,
  `ivideos` varchar(25) NOT NULL,
  `iHowToApply` longtext NOT NULL,
  `iPaymentMethod` mediumtext NOT NULL,
  `iCourses` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`iID`, `iName`, `iType`, `iEnrolmentRequirement`, `iRefundPolicy`, `iAge`, `iAdress1`, `iAddress2`, `iCity`, `iRegion`, `iPostCode`, `iCountry`, `iWebsite`, `iTel`, `iEmail`, `iCommission`, `iComment`, `image`, `ivideos`, `iHowToApply`, `iPaymentMethod`, `iCourses`) VALUES
(1, 'Able Manchester', '', 'Fill the Application. Pay the fees in Full.\r\n', 'If the visa is rejected, send them the embassy proof and the student would get refunded.', '12 Plus', '20 Swan Street', '', 'Manchester', '', 'M4 5JW', 'UK', 'www.able-manchester.co.uk', '+441616373062', 'able-manchester.co.uk/contact/', '20', 'Located in Central Manchester; Run by Family', 'ablemanchester.jpg', '', 'Fill application. make the full payment.', 'Full payment in advance', '');

-- --------------------------------------------------------

--
-- Table structure for table `institute-contact`
--

CREATE TABLE `institute-contact` (
  `icID` int(11) NOT NULL,
  `iID` int(11) NOT NULL,
  `icFirstName` varchar(20) NOT NULL,
  `icLastName` varchar(30) NOT NULL,
  `icTel` varchar(13) NOT NULL,
  `icMobile` varchar(13) NOT NULL,
  `icTitle` enum('Mr','MRS','Ms','Dr') NOT NULL,
  `icMail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institute-subject-coursetype`
--

CREATE TABLE `institute-subject-coursetype` (
  `iscID` int(11) NOT NULL,
  `subjectName` varchar(40) NOT NULL,
  `iID` int(11) NOT NULL,
  `ctID` int(11) NOT NULL,
  `subjectboard` varchar(15) NOT NULL,
  `duration` tinyint(4) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loghistory`
--

CREATE TABLE `loghistory` (
  `lhID` int(11) NOT NULL,
  `lhUserType` enum('student','agent','admin') NOT NULL,
  `lhUserID` int(11) NOT NULL,
  `lhLoginDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `lhLogoutDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sdestination`
--

CREATE TABLE `sdestination` (
  `dID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `dCountry` varchar(30) NOT NULL,
  `dStudyLevel` enum('Primary','Secondary','Further','Graduate','Post Graduate','Language','Professional Short Course') NOT NULL,
  `dStudyField` enum('School','College','Engineering','Art','Humanity','Medicine','Hospitality','Language','Industrial') NOT NULL,
  `dProgramName` varchar(30) NOT NULL,
  `dComment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `slanguagelevel`
--

CREATE TABLE `slanguagelevel` (
  `lanID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `examType` enum('IELTS','TOEFL') NOT NULL,
  `listening` tinyint(4) NOT NULL,
  `reading` tinyint(4) NOT NULL,
  `writing` tinyint(4) NOT NULL,
  `speaking` tinyint(4) NOT NULL,
  `oband` tinyint(4) NOT NULL,
  `certificateDate` date NOT NULL,
  `sLanguageDoc` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `slegalguardian`
--

CREATE TABLE `slegalguardian` (
  `slgID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `flAddress` varchar(30) NOT NULL,
  `slAddress` varchar(30) NOT NULL,
  `town` varchar(30) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `relationship` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `squalifications`
--

CREATE TABLE `squalifications` (
  `qID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `qName` enum('Primary','Secondary','Diploma','Bachelor','Masters') NOT NULL,
  `qLanguage` enum('English','French','German','Spanish','Italian','Farsi') NOT NULL,
  `qCountry` varchar(30) NOT NULL,
  `GPA` decimal(10,0) NOT NULL,
  `qInstitute` varchar(30) NOT NULL,
  `qComment` varchar(255) NOT NULL,
  `qDoc` blob NOT NULL,
  `qDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sID` int(11) NOT NULL,
  `sFname` varchar(20) NOT NULL,
  `sSurname` varchar(30) NOT NULL,
  `sNationality` varchar(30) NOT NULL,
  `sCountryOFResidence` varchar(30) NOT NULL,
  `sDOB` date NOT NULL,
  `sGender` enum('M','F') NOT NULL,
  `sMaritalStatus` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `sDependentChildren` tinyint(4) NOT NULL,
  `sTelNumber` varchar(13) NOT NULL,
  `sMobileNumber` varchar(13) NOT NULL,
  `sEmail` varchar(40) NOT NULL,
  `aFirstLine` varchar(30) NOT NULL,
  `aSecondLine` varchar(30) NOT NULL,
  `aTown` varchar(30) NOT NULL,
  `aRegion` varchar(30) NOT NULL,
  `aPostCode` varchar(14) NOT NULL,
  `aCountry` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sID`, `sFname`, `sSurname`, `sNationality`, `sCountryOFResidence`, `sDOB`, `sGender`, `sMaritalStatus`, `sDependentChildren`, `sTelNumber`, `sMobileNumber`, `sEmail`, `aFirstLine`, `aSecondLine`, `aTown`, `aRegion`, `aPostCode`, `aCountry`, `password`) VALUES
(1, 'Reza', 'Parsa', 'Iranian', 'Iran', '2001-08-18', 'M', 'Single', 0, '+982143655445', '+989121054566', 'rparsa@gmail.com', '10 Tehran Road', 'Narmak', 'Tehran', 'Narmak', '96548732', 'Iran', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `svisaprofile`
--

CREATE TABLE `svisaprofile` (
  `vID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `lodgedVisaBefore` tinyint(1) NOT NULL,
  `grantedVisaBefore` tinyint(1) NOT NULL,
  `rejectedVisaBefore` tinyint(1) NOT NULL,
  `deportedBefore` tinyint(1) NOT NULL,
  `sponsor` enum('Myself','Spouse','Parents','Family Members','Friends&Relatives','Others') NOT NULL,
  `financialSupportSource` enum('Support from home country','Support from intended country of study','Support from both') NOT NULL,
  `annualStudyBudget` enum('15k-25k £','25k-35k £','more than 35K £') NOT NULL,
  `additionalInfo` varchar(255) NOT NULL,
  `sPassportNo` varchar(12) NOT NULL,
  `SPassportExpiry` date NOT NULL,
  `SPassportCountry` varchar(15) NOT NULL,
  `SPassportDoc` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `testuser`
--

CREATE TABLE `testuser` (
  `email` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(11) NOT NULL,
  `uFirstName` varchar(25) NOT NULL,
  `uSurname` varchar(30) NOT NULL,
  `uEmail` varchar(25) NOT NULL,
  `uPassword` varchar(15) NOT NULL,
  `Role` enum('Admin','Super Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `agentstudent`
--
ALTER TABLE `agentstudent`
  ADD PRIMARY KEY (`agentstudentID`);

--
-- Indexes for table `coursetype`
--
ALTER TABLE `coursetype`
  ADD PRIMARY KEY (`ctID`);

--
-- Indexes for table `iecoffice`
--
ALTER TABLE `iecoffice`
  ADD PRIMARY KEY (`officeID`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`iID`);

--
-- Indexes for table `institute-contact`
--
ALTER TABLE `institute-contact`
  ADD PRIMARY KEY (`icID`),
  ADD KEY `iID` (`iID`);

--
-- Indexes for table `institute-subject-coursetype`
--
ALTER TABLE `institute-subject-coursetype`
  ADD PRIMARY KEY (`iscID`),
  ADD KEY `iID` (`iID`),
  ADD KEY `ctID` (`ctID`);

--
-- Indexes for table `loghistory`
--
ALTER TABLE `loghistory`
  ADD PRIMARY KEY (`lhID`);

--
-- Indexes for table `sdestination`
--
ALTER TABLE `sdestination`
  ADD PRIMARY KEY (`dID`);

--
-- Indexes for table `slanguagelevel`
--
ALTER TABLE `slanguagelevel`
  ADD PRIMARY KEY (`lanID`);

--
-- Indexes for table `slegalguardian`
--
ALTER TABLE `slegalguardian`
  ADD PRIMARY KEY (`slgID`);

--
-- Indexes for table `squalifications`
--
ALTER TABLE `squalifications`
  ADD PRIMARY KEY (`qID`),
  ADD KEY `sID` (`sID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sID`);

--
-- Indexes for table `svisaprofile`
--
ALTER TABLE `svisaprofile`
  ADD PRIMARY KEY (`vID`),
  ADD KEY `sID` (`sID`);

--
-- Indexes for table `testuser`
--
ALTER TABLE `testuser`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agentstudent`
--
ALTER TABLE `agentstudent`
  MODIFY `agentstudentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coursetype`
--
ALTER TABLE `coursetype`
  MODIFY `ctID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `iecoffice`
--
ALTER TABLE `iecoffice`
  MODIFY `officeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `iID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `institute-contact`
--
ALTER TABLE `institute-contact`
  MODIFY `icID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institute-subject-coursetype`
--
ALTER TABLE `institute-subject-coursetype`
  MODIFY `iscID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loghistory`
--
ALTER TABLE `loghistory`
  MODIFY `lhID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sdestination`
--
ALTER TABLE `sdestination`
  MODIFY `dID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slanguagelevel`
--
ALTER TABLE `slanguagelevel`
  MODIFY `lanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slegalguardian`
--
ALTER TABLE `slegalguardian`
  MODIFY `slgID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `squalifications`
--
ALTER TABLE `squalifications`
  MODIFY `qID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `svisaprofile`
--
ALTER TABLE `svisaprofile`
  MODIFY `vID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `institute-contact`
--
ALTER TABLE `institute-contact`
  ADD CONSTRAINT `iID` FOREIGN KEY (`iID`) REFERENCES `institute` (`iID`) ON UPDATE CASCADE;

--
-- Constraints for table `institute-subject-coursetype`
--
ALTER TABLE `institute-subject-coursetype`
  ADD CONSTRAINT `ctID` FOREIGN KEY (`ctID`) REFERENCES `coursetype` (`ctID`) ON UPDATE CASCADE;

--
-- Constraints for table `squalifications`
--
ALTER TABLE `squalifications`
  ADD CONSTRAINT `sID` FOREIGN KEY (`sID`) REFERENCES `students` (`sID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
