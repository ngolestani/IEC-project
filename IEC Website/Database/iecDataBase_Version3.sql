-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 06:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iectest`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` char(30) NOT NULL,
  `city` char(40) NOT NULL,
  `region` char(40) NOT NULL,
  `address1` text NOT NULL,
  `address2` text,
  `telephone` char(35) NOT NULL,
  `mobile` char(35) NOT NULL,
  `post_code` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('primary','secondary','further','higher','pre_university') NOT NULL,
  `age` enum('6-11','12-15','16-19','19+') NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_institute`
--

CREATE TABLE `course_institute` (
  `course_id` bigint(20) NOT NULL DEFAULT '0',
  `institute_id` bigint(20) NOT NULL DEFAULT '0',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('Private academic','public academic','private non-academic','Public School','Public College','Public University','Private School','Private Language School','Public Language School') NOT NULL,
  `enrolment_requirement` mediumtext NOT NULL,
  `refund_policy` mediumtext NOT NULL,
  `age` varchar(12) NOT NULL,
  `adress1` text NOT NULL,
  `address2` text,
  `city` char(40) NOT NULL,
  `region` char(40) NOT NULL,
  `post_code` char(30) NOT NULL,
  `country` char(40) NOT NULL,
  `website` varchar(130) NOT NULL,
  `telephone` char(20) NOT NULL,
  `email` char(140) NOT NULL,
  `commission` decimal(10,0) DEFAULT NULL,
  `comment` text,
  `how_to_apply` longtext,
  `payment_method` mediumtext,
  `courses` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentacademic`
--

CREATE TABLE `studentacademic` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `student_id` bigint(20) NOT NULL DEFAULT '0',
  `qualification_name` enum('Primary','Secondary','Diploma','Bachelor','Masters') NOT NULL,
  `qualification_language` enum('Farsi','Arabic','French','Russian','Spanish','Portoguese','Italian','German','English','Other') NOT NULL,
  `qualification_country` varchar(100) NOT NULL,
  `GPA` int(11) NOT NULL,
  `qualification_institute` varchar(40) NOT NULL,
  `qualification_comment` text NOT NULL,
  `qualification_date` date NOT NULL,
  `qualification_doc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentlanguage`
--

CREATE TABLE `studentlanguage` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `student_id` bigint(20) NOT NULL DEFAULT '0',
  `exam_type` enum('IELTS','TOEFL','CAMBRIDGE FCE','CAMBRIDGE CAE','CAMBRIDGE CPE') NOT NULL,
  `Listening` int(11) NOT NULL,
  `Reading` int(11) NOT NULL,
  `writing` int(11) NOT NULL,
  `speaking` int(11) NOT NULL,
  `overal_band` int(11) NOT NULL,
  `certificate_date` date NOT NULL,
  `language_doc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `country_of_residence` varchar(130) DEFAULT NULL,
  `nationality` varchar(130) DEFAULT NULL,
  `marrital_status` enum('Single','Married','Divorced','Widowed') DEFAULT NULL,
  `dependent_children` int(11) DEFAULT NULL,
  `country` char(30) DEFAULT NULL,
  `city` char(40) DEFAULT NULL,
  `region` char(40) DEFAULT NULL,
  `address1` text,
  `address2` text,
  `telephone` char(35) DEFAULT NULL,
  `mobile` char(35) DEFAULT NULL,
  `post_code` char(30) DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentvisa`
--

CREATE TABLE `studentvisa` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `student_id` bigint(20) NOT NULL DEFAULT '0',
  `applied_visa` tinyint(1) NOT NULL,
  `granted_visa` tinyint(1) NOT NULL,
  `rejected_visa` tinyint(1) NOT NULL,
  `sponsor` enum('Myself','Spouse','Parents','Family Member','Friends and Relatives','Others') NOT NULL,
  `financial_support_source` enum('Home','Destination','both') NOT NULL,
  `annual_study_budget` enum('15K-25K','25K-35K','35K Plus') NOT NULL,
  `additional_info` text NOT NULL,
  `student_passport_number` char(16) NOT NULL,
  `passport_expiry_date` date NOT NULL,
  `student_passport_country` varchar(100) NOT NULL,
  `student_passport_doc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `profile_id` bigint(20) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_institute`
--
ALTER TABLE `course_institute`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentacademic`
--
ALTER TABLE `studentacademic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `studentlanguage`
--
ALTER TABLE `studentlanguage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `studentvisa`
--
ALTER TABLE `studentvisa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentacademic`
--
ALTER TABLE `studentacademic`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentlanguage`
--
ALTER TABLE `studentlanguage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `studentvisa`
--
ALTER TABLE `studentvisa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_institute`
--
ALTER TABLE `course_institute`
  ADD CONSTRAINT `course_institute_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_institute_ibfk_2` FOREIGN KEY (`institute_id`) REFERENCES `institute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentacademic`
--
ALTER TABLE `studentacademic`
  ADD CONSTRAINT `studentacademic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentacademic_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `studentlanguage`
--
ALTER TABLE `studentlanguage`
  ADD CONSTRAINT `studentlanguage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentlanguage_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentvisa`
--
ALTER TABLE `studentvisa`
  ADD CONSTRAINT `studentvisa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentvisa_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
