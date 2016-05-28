-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2016 at 04:23 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kafala`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'أبي حامد', 'a', 'b4b147bc522828731f1a016bfa72c073', 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `qualifier_name` varchar(500) NOT NULL,
  `organizaton` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preacherID` varchar(100) NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`),
  KEY `preacherID` (`preacherID`),
  KEY `preacherID_2` (`preacherID`),
  KEY `preacherID_3` (`preacherID`),
  KEY `preacherID_4` (`preacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`qualifier_name`, `organizaton`, `date`, `id`, `preacherID`) VALUES
('خريج علوم الحاسوب', 'جامعة السودان', '2016-09-17', 1, '4'),
('خريج علوم الحاسوب', 'جامعة السودان', '2016-09-17', 2, '4'),
('خريج علوم الحاسوب', 'جامعة السودان', '2016-09-17', 3, '4'),
('خريج علوم الحاسوب', 'جامعة السودان', '2016-09-17', 4, '4'),
('خريج علوم الحاسوب', 'جامعة السودان', '2016-09-17', 5, '4'),
('خريج علوم الحاسوب', 'جامعة السودان', '2016-09-17', 6, '4');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `family_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `father_first_name` varchar(50) NOT NULL,
  `father_middle_name` varchar(50) NOT NULL,
  `father_last_name` varchar(50) NOT NULL,
  `father_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `social_state` int(50) NOT NULL,
  `father_dead_date` date NOT NULL,
  `father_dead_cause` varchar(50) NOT NULL,
  `father_work` varchar(50) NOT NULL,
  `supporter_first_name` varchar(50) NOT NULL,
  `supporter_meddle_name` varchar(50) NOT NULL,
  `supporter_last_name` varchar(50) NOT NULL,
  `supporter_4th_name` varchar(50) NOT NULL,
  `supporter_birth_date` date NOT NULL,
  `supporter_sex` varchar(6) NOT NULL,
  `supporter_state` varchar(50) NOT NULL,
  `supporter_relation` varchar(50) NOT NULL,
  `supporter_work` varchar(50) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `section` int(11) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  UNIQUE KEY `family_id` (`family_id`),
  KEY `id` (`family_id`),
  KEY `warranty_organization` (`warranty_organization`),
  KEY `residence_state` (`residence_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `family`
--


-- --------------------------------------------------------

--
-- Table structure for table `finalfamily`
--

CREATE TABLE IF NOT EXISTS `finalfamily` (
  `family_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `father_first_name` varchar(50) NOT NULL,
  `father_middle_name` varchar(50) NOT NULL,
  `father_last_name` varchar(50) NOT NULL,
  `father_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `social_state` int(50) NOT NULL,
  `father_dead_date` date NOT NULL,
  `father_dead_cause` varchar(50) NOT NULL,
  `father_work` varchar(50) NOT NULL,
  `supporter_first_name` varchar(50) NOT NULL,
  `supporter_meddle_name` varchar(50) NOT NULL,
  `supporter_last_name` varchar(50) NOT NULL,
  `supporter_4th_name` varchar(50) NOT NULL,
  `supporter_birth_date` date NOT NULL,
  `supporter_sex` varchar(6) NOT NULL,
  `supporter_state` varchar(50) NOT NULL,
  `supporter_relation` varchar(50) NOT NULL,
  `supporter_work` varchar(50) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `section` int(11) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  `head_dep_name` varchar(100) NOT NULL,
  `head_dep_date` date NOT NULL,
  UNIQUE KEY `family_id` (`family_id`),
  KEY `id` (`family_id`),
  KEY `warranty_organization` (`warranty_organization`),
  KEY `residence_state` (`residence_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `finalfamily`
--


-- --------------------------------------------------------

--
-- Table structure for table `finalorphan`
--

CREATE TABLE IF NOT EXISTS `finalorphan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `meddle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `mother_first_name` varchar(50) NOT NULL,
  `mother_middle_name` varchar(50) NOT NULL,
  `mother_last_name` varchar(50) NOT NULL,
  `mother_4th_name` varchar(50) NOT NULL,
  `mother_Birth_date` date NOT NULL,
  `mother_state` varchar(100) NOT NULL,
  `father_dead_date` date NOT NULL,
  `father_dead_cause` varchar(100) NOT NULL,
  `father_work` varchar(100) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `section` int(10) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `studing_state` varchar(50) NOT NULL,
  `nonstuding_cause` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `level` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `quran_parts` int(10) NOT NULL,
  `health_state` varchar(50) NOT NULL,
  `ill_cause` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  `head_dep_name` varchar(100) NOT NULL,
  `head_dep_date` date NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `warranty_organization` (`warranty_organization`),
  KEY `residence_state` (`residence_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `finalorphan`
--

INSERT INTO `finalorphan` (`id`, `state`, `warranty_organization`, `saving`, `last_sponsorship_date`, `first_name`, `meddle_name`, `last_name`, `last_4th_name`, `birth_date`, `sex`, `mother_first_name`, `mother_middle_name`, `mother_last_name`, `mother_4th_name`, `mother_Birth_date`, `mother_state`, `father_dead_date`, `father_dead_cause`, `father_work`, `residence_state`, `city`, `District`, `section`, `house_no`, `phone1`, `phone2`, `studing_state`, `nonstuding_cause`, `school_name`, `level`, `year`, `quran_parts`, `health_state`, `ill_cause`, `data_entery_name`, `data_entery_date`, `head_dep_name`, `head_dep_date`) VALUES
(1, '1', 1, 90, '2016-05-22', 'أحمد', '', '', '', '1990-01-01', '', '', '', '', '', '1960-01-01', '1', '1995-01-01', '', '', 1, '', '', 0, '0', '0999999999', '99', '1', 'لا يوجد', '', '', '', 0, '1', 'لا يوجد', 'أبي حامد', '2016-05-21', 'أبي حامد', '2016-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `finalpreacher`
--

CREATE TABLE IF NOT EXISTS `finalpreacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `state` int(10) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `meddle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `male_members_no` int(10) NOT NULL,
  `female_members_no` int(10) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `section` int(10) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `qualify_name` varchar(50) NOT NULL,
  `qualify_date` varchar(50) NOT NULL,
  `qualify_rating` varchar(50) NOT NULL,
  `quran_parts` int(11) NOT NULL,
  `Issuer` varchar(50) NOT NULL,
  `current_work` varchar(50) NOT NULL,
  `Joining_Date` date NOT NULL,
  `health_state` varchar(50) NOT NULL,
  `ill_cause` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  `head_dep_name` varchar(100) NOT NULL,
  `head_dep_date` date NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `residence_state` (`residence_state`),
  KEY `warranty_organization` (`warranty_organization`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `finalpreacher`
--

INSERT INTO `finalpreacher` (`id`, `type`, `state`, `warranty_organization`, `saving`, `last_sponsorship_date`, `first_name`, `meddle_name`, `last_name`, `last_4th_name`, `birth_date`, `sex`, `male_members_no`, `female_members_no`, `residence_state`, `city`, `District`, `section`, `house_no`, `phone1`, `phone2`, `qualify_name`, `qualify_date`, `qualify_rating`, `quran_parts`, `Issuer`, `current_work`, `Joining_Date`, `health_state`, `ill_cause`, `data_entery_name`, `data_entery_date`, `head_dep_name`, `head_dep_date`) VALUES
(1, 1, 1, 1, 0, '0000-00-00', 'أبي', 'حامد', 'ادريس', 'ادم', '1990-01-01', '1', 0, 0, 1, '', '', 0, '', '0917815544', '0119343435', '', '1985-01-01', '', 0, '', '', '1985-01-01', '0', 'الحمد لله', 'user', '2016-05-27', 'admin', '2016-05-27'),
(3, 1, 1, 1, 0, '0000-00-00', 'خالد', '', '', '', '1990-01-01', '0', 0, 0, 1, '', '', 0, '', '09999999999', '09999', '', '1985-01-01', '', 0, '', '', '1985-01-01', '1', 'لا يوجد', 'user', '2016-05-28', 'admin', '2016-05-28'),
(4, 4, 1, 1, 0, '0000-00-00', 'أبي', 'حامد', 'ادريس', 'ادم', '1990-01-01', '1', 0, 0, 1, '', '', 0, '', '0917815544', '0119343435', '', '1985-01-01', '', 0, '', '', '1985-01-01', '0', 'الحمد لله', 'user', '2016-05-28', 'admin', '2016-05-28'),
(5, 4, 1, 1, 0, '0000-00-00', 'أبي', 'حامد', 'ادريس', 'ادم', '1990-01-01', '1', 0, 0, 1, '', '', 0, '', '0917815544', '0119343435', '', '1985-01-01', '', 0, '', '', '1985-01-01', '0', 'الحمد لله', 'user', '2016-05-28', 'admin', '2016-05-28'),
(6, 4, 1, 1, 0, '0000-00-00', 'أبي', 'حامد', 'ادريس', 'ادم', '1990-01-01', '1', 0, 0, 1, '', '', 0, '', '0917815544', '0119343435', '', '1985-01-01', '', 0, '', '', '1985-01-01', '0', 'الحمد لله', 'user', '2016-05-28', 'admin', '2016-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `finalstudent`
--

CREATE TABLE IF NOT EXISTS `finalstudent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `meddle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `father_dead_date` date NOT NULL,
  `father_dead_cause` varchar(100) NOT NULL,
  `father_work` varchar(100) NOT NULL,
  `sisters_no` int(20) NOT NULL,
  `brothers_no` int(20) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `section` int(20) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `path` varchar(500) NOT NULL,
  `major` varchar(500) NOT NULL,
  `level` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `last_result` varchar(100) NOT NULL,
  `quran_parts` int(20) NOT NULL,
  `study_year_no` int(20) NOT NULL,
  `study_date_start` date NOT NULL,
  `expected_grad` date NOT NULL,
  `health_state` varchar(50) NOT NULL,
  `ill_cause` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  `head_dep_name` varchar(500) NOT NULL,
  `head_dep_date` date NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`),
  KEY `warranty_organization` (`warranty_organization`),
  KEY `residence_state` (`residence_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `finalstudent`
--

INSERT INTO `finalstudent` (`id`, `state`, `warranty_organization`, `saving`, `last_sponsorship_date`, `first_name`, `meddle_name`, `last_name`, `last_4th_name`, `birth_date`, `sex`, `father_dead_date`, `father_dead_cause`, `father_work`, `sisters_no`, `brothers_no`, `residence_state`, `city`, `District`, `section`, `house_no`, `phone1`, `phone2`, `school_name`, `path`, `major`, `level`, `year`, `last_result`, `quran_parts`, `study_year_no`, `study_date_start`, `expected_grad`, `health_state`, `ill_cause`, `data_entery_name`, `data_entery_date`, `head_dep_name`, `head_dep_date`) VALUES
(6, '1', 1, 70, '2016-05-22', 'أحمد', '', '', '', '1990-01-01', '', '1995-01-01', '', '', 0, 0, 1, '', '', 0, '', '01192911955', '09', '', '', '', '', '', '', 0, 2, '2010-01-01', '2010-01-01', '1', 'لا يوجد', 'user', '2016-05-21', 'admin', '2016-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `f_member`
--

CREATE TABLE IF NOT EXISTS `f_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `study_level` varchar(50) NOT NULL,
  `health_state` varchar(50) NOT NULL,
  `familyID` int(11) NOT NULL,
  KEY `id` (`member_id`),
  KEY `familyID` (`familyID`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `f_member`
--


-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) NOT NULL,
  `ufrom` varchar(100) NOT NULL,
  `uto` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uto` (`uto`),
  KEY `uto_2` (`uto`),
  KEY `uto_3` (`uto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `text`, `ufrom`, `uto`, `type`) VALUES
(1, 'تم اعتماد بيانات  n1 n2 التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(2, 'تم اعتماد بيانات  أحمد محمد التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(3, 'تم اعتماد بيانات  أحمد محمد التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(4, 'تم اعتماد بيانات  أحمد  التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(5, 'تم اعتماد بيانات  أحمد  التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(6, 'تم اعتماد بيانات  أحمد  التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(7, 'تم اعتماد بيانات  أحمد  التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(8, 'تم اعتماد بيانات  أحمد  التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(9, 'تم اعتماد بيانات  أبي حامد التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(10, 'تم اعتماد بيانات  أبي حامد التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(11, 'تم اعتماد بيانات  خالد  التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(12, 'تم اعتماد بيانات  أبي حامد التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(13, 'تم اعتماد بيانات  أبي حامد التابع لأيتام قطر الخيرية', 'admin', 'user', 1),
(14, 'تم اعتماد بيانات  أبي حامد التابع لأيتام قطر الخيرية', 'admin', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orphan`
--

CREATE TABLE IF NOT EXISTS `orphan` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `meddle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `mother_first_name` varchar(50) NOT NULL,
  `mother_middle_name` varchar(50) NOT NULL,
  `mother_last_name` varchar(50) NOT NULL,
  `mother_4th_name` varchar(50) NOT NULL,
  `mother_Birth_date` date NOT NULL,
  `mother_state` varchar(100) NOT NULL,
  `father_dead_date` date NOT NULL,
  `father_dead_cause` varchar(100) NOT NULL,
  `father_work` varchar(100) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `section` int(10) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `studing_state` varchar(50) NOT NULL,
  `nonstuding_cause` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `level` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `quran_parts` int(10) NOT NULL,
  `health_state` varchar(50) NOT NULL,
  `ill_cause` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `warranty_organization` (`warranty_organization`),
  KEY `residence_state` (`residence_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orphan`
--

INSERT INTO `orphan` (`id`, `state`, `warranty_organization`, `saving`, `last_sponsorship_date`, `first_name`, `meddle_name`, `last_name`, `last_4th_name`, `birth_date`, `sex`, `mother_first_name`, `mother_middle_name`, `mother_last_name`, `mother_4th_name`, `mother_Birth_date`, `mother_state`, `father_dead_date`, `father_dead_cause`, `father_work`, `residence_state`, `city`, `District`, `section`, `house_no`, `phone1`, `phone2`, `studing_state`, `nonstuding_cause`, `school_name`, `level`, `year`, `quran_parts`, `health_state`, `ill_cause`, `data_entery_name`, `data_entery_date`) VALUES
(0, '1', 1, 0, '0000-00-00', 'أحمد', '', '', '', '1990-01-01', '0', '', '', '', '', '1960-01-01', '1', '1995-01-01', '', '', 1, '', '', 0, '', '09999999999', '09999999999', '1', 'لا يوجد', '', '', '', 0, '1', 'لا يوجد', '', '2016-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `preacher`
--

CREATE TABLE IF NOT EXISTS `preacher` (
  `id` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `meddle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `male_members_no` int(10) NOT NULL,
  `female_members_no` int(10) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `section` int(10) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `qualify_name` varchar(50) NOT NULL,
  `qualify_date` date NOT NULL,
  `qualify_rating` varchar(50) NOT NULL,
  `quran_parts` int(11) NOT NULL,
  `Issuer` varchar(50) NOT NULL,
  `current_work` varchar(50) NOT NULL,
  `Joining_Date` date NOT NULL,
  `health_state` varchar(50) NOT NULL,
  `ill_cause` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  KEY `residence_state` (`residence_state`),
  KEY `warranty_organization` (`warranty_organization`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preacher`
--


-- --------------------------------------------------------

--
-- Table structure for table `sibiling`
--

CREATE TABLE IF NOT EXISTS `sibiling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orphan_id` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `state` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `orphan_id` (`orphan_id`),
  KEY `orphan_id_2` (`orphan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sibiling`
--

INSERT INTO `sibiling` (`id`, `orphan_id`, `name`, `sex`, `birth_date`, `state`) VALUES
(1, '1', 'خالد', '0', '1995-09-17', '2'),
(2, '2147483647', 'محمد', '1', '1990-01-01', '1'),
(3, '2147483647', 'محمد', '1', '1990-01-01', '1'),
(4, '0', '', '0', '0000-00-00', ''),
(5, '2', 'sgdsg', '1', '0000-00-00', '1'),
(6, '2', 'sgdsg', '1', '0000-00-00', '1'),
(7, '2', 'sgdsg', '1', '0000-00-00', '1'),
(8, '2', 'sgdsg', '1', '0000-00-00', '1'),
(9, '0', 'خريج علوم الحاسوب', '0', '2016-09-17', '1'),
(10, '0', 'خريج علوم الحاسوب', '0', '2016-09-17', '1'),
(11, '1', 'sdfsdg', '1', '0000-00-00', '1'),
(12, '0', 'sdfsdg', '1', '0000-00-00', '1'),
(13, '0', 'sdfsdg', '1', '0000-00-00', '1'),
(14, '0', 'sdfsdg', '1', '0000-00-00', '1'),
(15, '0', 'sdfsdg', '1', '0000-00-00', '1'),
(16, '0', 'sdfsdg', '1', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `numberOFSponsored` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `name`, `numberOFSponsored`) VALUES
(1, 'قطر الخيرية', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE IF NOT EXISTS `sponsorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `saving` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `last_date` date NOT NULL,
  `sponsored` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sponsor` (`sponsor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sponsorship`
--

INSERT INTO `sponsorship` (`id`, `amount`, `date`, `saving`, `sponsor`, `last_date`, `sponsored`) VALUES
(1, 100, '2016-05-18', 0, 1, '2016-01-01', 2),
(2, 100, '2016-05-18', 0, 1, '2016-01-01', 2),
(3, 500, '2016-05-18', 50, 1, '2016-01-01', 2),
(4, 500, '2016-05-18', 50, 1, '2016-01-01', 2),
(5, 500, '2016-05-18', 50, 1, '2016-01-01', 2),
(6, 500, '2016-05-18', 50, 1, '2016-01-01', 2),
(7, 500, '2016-05-18', 50, 1, '2016-01-01', 2),
(8, 500, '2016-05-18', 50, 1, '2016-01-01', 2),
(9, 100, '2016-05-21', 10, 1, '2016-01-01', 2),
(10, 100, '2016-05-22', 10, 1, '2016-01-01', 1),
(11, 100, '2016-05-22', 10, 1, '2016-01-01', 1),
(12, 100, '2016-05-22', 10, 1, '2016-01-01', 1),
(13, 100, '2016-05-22', 10, 1, '2016-01-01', 0),
(14, 100, '2016-05-22', 10, 1, '2016-01-01', 0),
(15, 100, '2016-05-22', 10, 1, '2016-01-01', 0),
(16, 100, '2016-05-22', 10, 1, '2016-01-01', 0),
(17, 100, '2016-05-22', 10, 1, '2016-01-01', 1),
(18, 100, '2016-05-22', 10, 1, '2016-01-01', 1),
(19, 100, '2016-05-22', 10, 1, '2016-01-01', 1),
(20, 100, '2016-05-22', 10, 1, '2016-01-01', 1),
(21, 55, '2016-05-22', 10, 1, '2016-01-01', 1),
(22, 55, '2016-05-22', 10, 1, '2016-01-01', 1),
(23, 55, '2016-05-22', 10, 1, '2016-01-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships`
--

CREATE TABLE IF NOT EXISTS `sponsorships` (
  `sponsorship` int(11) NOT NULL,
  `sponsored` int(11) NOT NULL,
  `type` int(10) NOT NULL,
  KEY `sponsorship` (`sponsorship`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsorships`
--

INSERT INTO `sponsorships` (`sponsorship`, `sponsored`, `type`) VALUES
(21, 1, 1),
(22, 1, 1),
(23, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  UNIQUE KEY `id_4` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'القضارف');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `warranty_organization` int(11) NOT NULL,
  `saving` int(11) NOT NULL,
  `last_sponsorship_date` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `meddle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_4th_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `father_dead_date` date NOT NULL,
  `father_dead_cause` varchar(100) NOT NULL,
  `father_work` varchar(100) NOT NULL,
  `sisters_no` int(20) NOT NULL,
  `brothers_no` int(20) NOT NULL,
  `residence_state` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `section` int(20) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `path` varchar(500) NOT NULL,
  `major` varchar(500) NOT NULL,
  `level` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `last_result` varchar(100) NOT NULL,
  `quran_parts` int(20) NOT NULL,
  `study_year_no` int(20) NOT NULL,
  `study_date_start` date NOT NULL,
  `expected_grad` date NOT NULL,
  `health_state` varchar(50) NOT NULL,
  `ill_cause` varchar(50) NOT NULL,
  `data_entery_name` varchar(50) NOT NULL,
  `data_entery_date` date NOT NULL,
  KEY `warranty_organization` (`warranty_organization`),
  KEY `residence_state` (`residence_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_state_id` FOREIGN KEY (`residence_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sponsor` FOREIGN KEY (`warranty_organization`) REFERENCES `sponsorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finalfamily`
--
ALTER TABLE `finalfamily`
  ADD CONSTRAINT `f_family_state_id` FOREIGN KEY (`residence_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_sponsor` FOREIGN KEY (`warranty_organization`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finalorphan`
--
ALTER TABLE `finalorphan`
  ADD CONSTRAINT `f_orphan_state_id` FOREIGN KEY (`residence_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_sponsorship_organization` FOREIGN KEY (`warranty_organization`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finalpreacher`
--
ALTER TABLE `finalpreacher`
  ADD CONSTRAINT `f_pracher_state_id` FOREIGN KEY (`residence_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_preacher_sponsor_id` FOREIGN KEY (`warranty_organization`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `f_member`
--
ALTER TABLE `f_member`
  ADD CONSTRAINT `family` FOREIGN KEY (`familyID`) REFERENCES `family` (`family_id`),
  ADD CONSTRAINT `f_family` FOREIGN KEY (`familyID`) REFERENCES `finalfamily` (`family_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orphan`
--
ALTER TABLE `orphan`
  ADD CONSTRAINT `orphan_state_id` FOREIGN KEY (`residence_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sponsorship_organization` FOREIGN KEY (`warranty_organization`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preacher`
--
ALTER TABLE `preacher`
  ADD CONSTRAINT `preacher_sponsor_id` FOREIGN KEY (`warranty_organization`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preacher_state_id` FOREIGN KEY (`residence_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD CONSTRAINT `sponsorship_fk` FOREIGN KEY (`sponsor`) REFERENCES `sponsor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD CONSTRAINT `sponsorships_ibfk_1` FOREIGN KEY (`sponsorship`) REFERENCES `sponsorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_sponsor_id` FOREIGN KEY (`warranty_organization`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_state_id` FOREIGN KEY (`residence_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
