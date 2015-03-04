-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2015 at 07:24 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `haystack_employment`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_informations`
--

CREATE TABLE IF NOT EXISTS `additional_informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `resume_id` (`resume_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `additional_informations`
--

INSERT INTO `additional_informations` (`id`, `resume_id`, `information`) VALUES
(1, 6, 'test\r\n\r\nsf sf\r\nsf\r\nsf\r\ns\r\ndf \r\ns\r\ndfa\r\nsdf\r\nasdf'),
(2, 8, ''),
(3, 9, ''),
(4, 10, 'adsfsaf');

-- --------------------------------------------------------

--
-- Table structure for table `analytics_report_emailers`
--

CREATE TABLE IF NOT EXISTS `analytics_report_emailers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `frequency` varchar(10) NOT NULL,
  `recipients` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `report_type` varchar(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `current_position_title` varchar(100) NOT NULL,
  `expected_salary` float NOT NULL,
  `preferred_country` varchar(100) NOT NULL,
  `resume_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `current_position_title`, `expected_salary`, `preferred_country`, `resume_path`) VALUES
(5, 14, '', 0, '', ''),
(6, 15, '', 0, '', ''),
(7, 16, 'Acupuncturist', 2, '', ''),
(8, 17, 'Dev', 0, '', ''),
(9, 18, 'Acupuncturist', 3300, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE IF NOT EXISTS `certifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `resume_id`, `name`) VALUES
(2, 6, 'c1'),
(3, 6, 'c2'),
(4, 10, 'sdf'),
(5, 10, 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approved` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE IF NOT EXISTS `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `field_of_study` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `resume_id`, `degree`, `field_of_study`, `school`, `country`, `city`, `date_from`, `date_to`) VALUES
(3, 6, 'deg', 'f', 's', 'Azerbaijan', 'c', '2015-03-19', '2015-03-31'),
(4, 6, 'd1', 'f1', 's1', 'Antarctica', 'c1', '2015-03-18', '2015-03-24'),
(5, 9, 'asdf', 'sfd', 'sdf', 'Azerbaijan', 'sf', '2015-03-25', '2015-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `user_id`) VALUES
(7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `employer_companies`
--

CREATE TABLE IF NOT EXISTS `employer_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`employer_id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employer_companies`
--

INSERT INTO `employer_companies` (`id`, `organization_id`, `employer_id`) VALUES
(3, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_type` enum('Company','School') NOT NULL,
  `name` varchar(100) NOT NULL,
  `nature` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `logo_filename` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `landline` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Display: Name - City, State, Country' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_type`, `name`, `nature`, `description`, `logo_filename`, `website`, `landline`, `mobile`, `fax`, `address`, `city`, `state`, `zip_code`, `country`) VALUES
(6, 'Company', 'cn', '', '', '', '', '', '', '', 'ca', 'cc', '', 0, 'Afghanistan');

-- --------------------------------------------------------

--
-- Table structure for table `pooled_applicants`
--

CREATE TABLE IF NOT EXISTS `pooled_applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `date_time_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `industry` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `working_hours` varchar(255) NOT NULL,
  `shift_pattern` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `vacancy_count` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employer_id` (`employer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Job, Internship, etc.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `description`, `date_from`, `date_to`, `industry`, `category`, `working_hours`, `shift_pattern`, `salary`, `vacancy_count`, `employer_id`) VALUES
(2, 'adsf', 'Role:\r\n- Some role\r\n\r\nRequirements:\r\n- Some requirements\r\n- Another requirements\r\n\r\nExtra:\r\n- Some other stuffs', '2015-03-03', '2015-03-17', 'Consulting', '1', '1', 'Night Shift', '1', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `position_applications`
--

CREATE TABLE IF NOT EXISTS `position_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_time_applied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `position_impressions`
--

CREATE TABLE IF NOT EXISTS `position_impressions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `position_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_time_viewed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `current_industry` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `applicant_id` (`applicant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `applicant_id`, `name`, `headline`, `availability`, `current_industry`, `qualification`, `summary`) VALUES
(4, 5, '', '', '', '', '', ''),
(5, 6, '', '', '', '', '', ''),
(6, 7, 'Developer Test', 'test 2', 'Immediately', '', '', 'sss'),
(7, 8, 'My Resume 1', '', '', '', '', ''),
(8, 9, 'My Resume 1x', 'For developer applications.', 'Not applicable', '', '', ''),
(9, 9, 'My Resume 2', '', '', '', '', ''),
(10, 9, 'My Resume 3', 'For management.', '2 weeks', '', 'fasdf', 'sf');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(4, 'Applicant'),
(3, 'Company Employee'),
(2, 'Employer');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `resume_id`, `name`) VALUES
(2, 6, 'some skill'),
(3, 6, 'sk2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `title` enum('Mr.','Ms.','Mrs.') NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `enabled` smallint(1) NOT NULL,
  `enable_token` varchar(100) NOT NULL,
  `password_reset_token` varchar(100) NOT NULL,
  `landline` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `country` varchar(50) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `alternate_email` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`enable_token`,`password_reset_token`,`alternate_email`,`image_path`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `notes`, `title`, `full_name`, `email`, `website`, `password`, `enabled`, `enable_token`, `password_reset_token`, `landline`, `mobile`, `address`, `city`, `state`, `zip_code`, `country`, `nationality`, `alternate_email`, `image_path`, `date_registered`) VALUES
(13, 2, '', 'Mr.', 'a', 'e@e.com', '', '1', 1, '528d80d64843abdbf3a9dbed0ccb84836009738d', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 06:15:56'),
(14, 4, '', 'Mr.', 'sdf', 'appl1@a.com', '', '1', 0, 'd293a6c0f52917fdbf7c0fec7446980b7dd43669', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 08:49:51'),
(15, 4, '', 'Mr.', 'adslfk', 'fklsj@jlfkd.com', '', '1', 0, '5fa65367e7b0bb2dd08c3fc086f48ec5bb9459ed', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 08:52:56'),
(16, 4, '', 'Mr.', 'asdf', 'a@a.com', '', '1', 1, 'ace203f684b8cb8a4bf201412528073b66848aa1', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 08:54:16'),
(17, 4, '', 'Mr.', 'sdfklj', 'a@b.com', '', '1', 0, '983708f3c2b4973d4500210ce1b7d3a21fa4cb23', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 18:10:44'),
(18, 4, '', 'Mr.', 'sdfklj', 'a@c.com', '', '1', 1, '40d41b1fce37c6f5ac185e71dff0479c043942ba', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 18:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `work_histories`
--

CREATE TABLE IF NOT EXISTS `work_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `is_current_work` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `work_histories`
--

INSERT INTO `work_histories` (`id`, `resume_id`, `position`, `company`, `location`, `summary`, `date_from`, `date_to`, `is_current_work`) VALUES
(4, 6, 'pos', 'com', 'loc', 'sum', '2015-03-06', '2015-03-10', 0),
(5, 6, 'pos', 'comp1', 'loc1', 'sum1', '2015-03-13', '2015-03-17', 0),
(6, 8, 'asdf', 'sf', 'sdf', 'sdf', '2015-03-20', '2015-03-23', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_informations`
--
ALTER TABLE `additional_informations`
  ADD CONSTRAINT `additional_informations_ibfk_1` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer_companies`
--
ALTER TABLE `employer_companies`
  ADD CONSTRAINT `employer_companies_ibfk_3` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employer_companies_ibfk_2` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
