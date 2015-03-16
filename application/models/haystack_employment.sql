-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2015 at 04:21 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `additional_informations`
--

INSERT INTO `additional_informations` (`id`, `resume_id`, `information`) VALUES
(1, 6, 'test\r\n\r\nsf sf\r\nsf\r\nsf\r\ns\r\ndf \r\ns\r\ndfa\r\nsdf\r\nasdf'),
(2, 8, ''),
(3, 9, ''),
(4, 10, 'adsfsaf'),
(5, 11, 'sdfdsfdsfsdf'),
(6, 12, ''),
(7, 13, '');

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
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `current_position_title`, `expected_salary`, `preferred_country`, `resume_path`) VALUES
(5, 14, '', 0, '', ''),
(6, 15, '', 0, '', ''),
(7, 16, 'Acupuncturist', 2, '', ''),
(8, 17, 'Dev', 0, '', ''),
(9, 18, 'Something', 1000, '', ''),
(10, 21, 'Project Manager', 3000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE IF NOT EXISTS `application_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`id`, `name`, `description`) VALUES
(1, 'Seen', ''),
(2, 'Screened', ''),
(3, 'Endorsed for Interview', ''),
(4, 'Endoresed For Testing', ''),
(5, 'Interview', ''),
(6, 'Active File', ''),
(7, 'Pooling', ''),
(8, 'Failed', ''),
(9, 'Withdrawn', '');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE IF NOT EXISTS `billings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL COMMENT 'Used for any 3rd-Party tracking numbers.',
  `paid_on_date_time` datetime NOT NULL,
  `paid_by_user_id` int(11) NOT NULL,
  `amount_paid` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paid_by_user_id` (`paid_by_user_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `from_user_id`, `to_user_id`, `comment`, `date_time_updated`, `approved`) VALUES
(31, 13, 18, 'sdf', '2015-03-16 09:05:59', 1),
(32, 13, 18, 'test 1', '2015-03-16 09:08:49', 1),
(33, 13, 18, 'test 2', '2015-03-16 09:08:52', 1),
(34, 13, 18, 'lask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;lslask dfj;asdk fjasldk jasldfj ;asldkfj asdlfkj ;ls', '2015-03-16 09:11:17', 1);

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
  `is_vip` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `user_id`, `is_vip`) VALUES
(7, 13, 0);

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
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `is_vip` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `user_id`, `is_vip`) VALUES
(1, 19, 0),
(2, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_schools`
--

CREATE TABLE IF NOT EXISTS `faculty_schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faculty_schools`
--

INSERT INTO `faculty_schools` (`id`, `organization_id`, `faculty_id`) VALUES
(1, 8, 2);

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
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `date_time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `organization_id` (`organization_id`)
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
  `email` varchar(50) NOT NULL,
  `landline` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Display: Name - City, State, Country' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_type`, `name`, `nature`, `description`, `logo_filename`, `website`, `email`, `landline`, `mobile`, `fax`, `address`, `city`, `state`, `zip_code`, `country`) VALUES
(6, 'Company', 'Some Famous Company', '', 'test', '', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan'),
(7, 'School', 'sdf', '', '', '', '', '', '', '', '', 'sdf', 'sdf', '', 0, 'Austria'),
(8, 'School', 'sdf', '', '', '', '', '', '', '', '', 'sdf', 'sdf', '', 0, 'Austria');

-- --------------------------------------------------------

--
-- Table structure for table `pooled_applicants`
--

CREATE TABLE IF NOT EXISTS `pooled_applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_status_name` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `date_time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`),
  KEY `applicant_id` (`applicant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pooled_applicants`
--

INSERT INTO `pooled_applicants` (`id`, `position_id`, `applicant_id`, `application_status_name`, `notes`, `date_time_updated`) VALUES
(6, 2, 9, 'Endorsed for Interview', 'test', '2015-03-13 19:24:27');

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
  `category` enum('Full-Time','Part-Time','Internship') NOT NULL DEFAULT 'Full-Time',
  `working_hours` varchar(255) NOT NULL,
  `shift_pattern` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `vacancy_count` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `employer_id` (`employer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Job, Internship, etc.' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `description`, `date_from`, `date_to`, `industry`, `category`, `working_hours`, `shift_pattern`, `salary`, `vacancy_count`, `employer_id`, `enabled`, `archived`) VALUES
(2, 'Web Developer (Urgent)', '<b>Responsibilities</b>:&nbsp;<div><ul><li><span style="font-size: 12px; line-height: 19px;">something\r\n- something 2\r\n- something 3\r\n\r\nRequirements:\r\n- something\r\n- something 2\r\n- something 3\r\n\r\nSome perks, some perks.</span><br></li></ul></div>', '2015-03-03', '2015-03-17', 'Information Technology', 'Full-Time', '9 AM - 6 PM', 'Night Shift', '3000', 1, 7, 1, 0),
(3, 'General Manager', 'Something', '2015-03-12', '2015-03-31', 'Hospitality', 'Full-Time', '9AM - 6PM', 'No Shift', '3000', 1, 7, 1, 0),
(4, 'Janitor', 'Something', '2015-03-12', '2015-03-14', 'Hospitality', 'Part-Time', '9AM - 6PM', '2 Shift', '1000', 1, 7, 1, 0),
(5, 'Test Position', '', '2015-03-12', '2015-03-20', 'Accounting / Auditing / Taxation', 'Full-Time', '9AM - 6PM', 'No Shift', '1', 1, 7, 1, 0),
(6, 'asdfadsf', '\r\n        \r\n        <b>\r\n        Job Responsibilities:</b><div><ul><ul><li><span style="font-size: 12px; line-height: 19px;">Responsibility 1</span></li><li><span style="font-size: 12px; line-height: 19px;">Responsibility 2</span></li><li><span style="font-size: 12px; line-height: 19px;">Responsibility 3</span></li></ul></ul></div><div><div><b>Requirements:</b></div><div><ul><ul><li><span style="font-size: 12px; line-height: 19px;">Requirement 1</span></li><li><span style="font-size: 12px; line-height: 19px;">Requirement 2</span></li><li><span style="font-size: 12px; line-height: 19px;">Requirement 3</span></li></ul></ul></div><div><b>Perks:</b></div><div><ul><ul><li><span style="font-size: 12px; line-height: 19px;">Perks 1</span></li><li><span style="font-size: 12px; line-height: 19px;">Perks 2</span></li><li><span style="font-size: 12px; line-height: 19px;">Perks 3</span></li></ul></ul></div></div>\r\n        \r\n              ', '2015-03-19', '2015-03-11', 'Accounting / Auditing / Taxation', 'Full-Time', '9AM - 6PM', 'No Shift', '1', 1, 7, 1, 0),
(7, 'Something New 2', '<b><i><u><strike>hello</strike></u></i></b><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><ul><li><b style="line-height: 1.6; font-size: 12px;">world</b><br></li></ul></blockquote>', '2015-03-12', '2015-03-20', 'Accounting / Auditing / Taxation', 'Full-Time', '9AM - 6PM', 'No Shift', '1', 1, 7, 1, 0),
(8, 'Web Developer (Urgent 2)', '<b>Responsibilities</b>:<div><ul><li><span style="font-size: 12px; line-height: 19px;">something\r\n- something 2\r\n- something 3\r\n\r\nRequirements:\r\n- something\r\n- something 2\r\n- something 3\r\n\r\nSome perks, some perks.</span><br></li></ul></div>', '2015-03-03', '2015-03-17', 'Customer Service', 'Full-Time', '9 AM - 6 PM', 'Staggered days', '3000', 1, 7, 1, 0),
(9, 'Web Developer (Urgent 3)', '<b>Responsibilities</b>:?<div><ul><li><span style="font-size: 12px; line-height: 19px;">something\r\n- something 2\r\n- something 3\r\n\r\nRequirements:\r\n- something\r\n- something 2\r\n- something 3\r\n\r\nSome perks, some perks.</span><br></li></ul></div>', '2015-03-03', '2015-03-17', 'General Management', 'Part-Time', '9 AM - 6 PM', 'Regular 4-on 4 off', '3000', 1, 7, 1, 0),
(10, 'Web Developer (Urgent 3)', '<b>Responsibilities</b>:?<div><ul><li><span style="font-size: 12px; line-height: 19px;">something\r\n- something 2\r\n- something 3\r\n\r\nRequirements:\r\n- something\r\n- something 2\r\n- something 3\r\n\r\nSome perks, some perks.</span><br></li></ul></div>', '2015-03-03', '2015-03-17', 'General Management', 'Part-Time', '9 AM - 6 PM', 'Regular 4-on 4 off', '3000', 1, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position_applications`
--

CREATE TABLE IF NOT EXISTS `position_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_time_applied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `application_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_status_id` (`application_status_id`),
  KEY `applicant_id` (`applicant_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `position_applications`
--

INSERT INTO `position_applications` (`id`, `applicant_id`, `position_id`, `date_time_applied`, `application_status_id`) VALUES
(3, 9, 2, '2015-03-09 08:04:35', 9),
(4, 10, 2, '2015-03-09 12:00:37', 7),
(5, 9, 8, '2015-03-13 19:30:22', 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

--
-- Dumping data for table `position_impressions`
--

INSERT INTO `position_impressions` (`id`, `ip_address`, `position_id`, `address`, `date_time_viewed`) VALUES
(1, '::1', 2, '', '2015-03-08 08:56:00'),
(2, '::1', 2, '', '2015-03-08 08:58:04'),
(3, '::1', 2, '', '2015-03-08 08:58:09'),
(4, '::1', 2, '', '2015-03-08 08:58:24'),
(5, '::1', 2, '', '2015-03-08 10:12:38'),
(6, '::1', 2, '', '2015-03-08 11:09:34'),
(7, '::1', 2, '', '2015-03-08 11:10:56'),
(8, '::1', 2, '', '2015-03-08 11:11:01'),
(9, '::1', 2, '', '2015-03-08 11:22:34'),
(10, '::1', 2, '', '2015-03-08 11:25:51'),
(11, '::1', 2, '', '2015-03-08 12:26:41'),
(12, '::1', 2, '', '2015-03-08 13:51:19'),
(13, '::1', 2, '', '2015-03-09 08:02:36'),
(14, '::1', 2, '', '2015-03-09 08:03:10'),
(15, '::1', 2, '', '2015-03-09 08:03:32'),
(16, '::1', 2, '', '2015-03-09 08:04:34'),
(17, '::1', 2, '', '2015-03-09 08:04:35'),
(18, '::1', 2, '', '2015-03-09 08:05:09'),
(19, '::1', 2, '', '2015-03-09 12:00:29'),
(20, '::1', 2, '', '2015-03-09 12:00:38'),
(21, '::1', 2, '', '2015-03-09 12:20:32'),
(22, '::1', 2, '', '2015-03-09 17:26:34'),
(23, '::1', 2, '', '2015-03-09 17:26:36'),
(24, '::1', 2, '', '2015-03-09 17:29:21'),
(25, '::1', 2, '', '2015-03-09 17:29:26'),
(26, '::1', 2, '', '2015-03-09 17:42:23'),
(27, '::1', 2, '', '2015-03-09 17:42:28'),
(28, '::1', 2, '', '2015-03-12 08:03:51'),
(29, '::1', 2, '', '2015-03-12 08:22:00'),
(30, '::1', 2, '', '2015-03-12 08:24:34'),
(31, '::1', 2, '', '2015-03-12 08:33:52'),
(32, '::1', 2, '', '2015-03-12 08:34:41'),
(33, '::1', 2, '', '2015-03-12 08:35:00'),
(34, '::1', 2, '', '2015-03-12 08:35:56'),
(35, '::1', 2, '', '2015-03-12 08:36:07'),
(36, '::1', 2, '', '2015-03-12 08:36:32'),
(37, '::1', 2, '', '2015-03-12 08:37:26'),
(38, '::1', 2, '', '2015-03-12 08:37:33'),
(39, '::1', 2, '', '2015-03-12 08:38:09'),
(40, '::1', 2, '', '2015-03-12 08:38:38'),
(41, '::1', 2, '', '2015-03-12 08:38:50'),
(42, '::1', 2, '', '2015-03-12 08:39:40'),
(43, '::1', 2, '', '2015-03-12 08:40:09'),
(44, '::1', 2, '', '2015-03-12 08:40:36'),
(45, '::1', 2, '', '2015-03-12 08:40:46'),
(46, '::1', 2, '', '2015-03-12 08:41:25'),
(47, '::1', 2, '', '2015-03-12 08:41:28'),
(48, '::1', 2, '', '2015-03-12 08:42:04'),
(49, '::1', 2, '', '2015-03-12 08:42:06'),
(50, '::1', 2, '', '2015-03-12 08:42:36'),
(51, '::1', 2, '', '2015-03-12 08:43:18'),
(52, '::1', 2, '', '2015-03-12 08:43:30'),
(53, '::1', 2, '', '2015-03-12 08:45:16'),
(54, '::1', 2, '', '2015-03-12 08:45:19'),
(55, '::1', 2, '', '2015-03-12 08:45:50'),
(56, '::1', 2, '', '2015-03-12 08:45:56'),
(57, '::1', 2, '', '2015-03-12 08:46:53'),
(58, '::1', 2, '', '2015-03-12 08:46:56'),
(59, '::1', 2, '', '2015-03-12 09:04:16'),
(60, '::1', 2, '', '2015-03-12 09:18:13'),
(61, '::1', 3, '', '2015-03-12 09:25:02'),
(62, '::1', 3, '', '2015-03-12 09:26:10'),
(63, '::1', 4, '', '2015-03-12 09:27:25'),
(64, '::1', 4, '', '2015-03-12 09:27:25'),
(65, '::1', 4, '', '2015-03-12 09:27:34'),
(66, '::1', 4, '', '2015-03-12 09:27:44'),
(67, '::1', 4, '', '2015-03-12 09:28:41'),
(68, '::1', 4, '', '2015-03-12 09:29:02'),
(69, '::1', 4, '', '2015-03-12 09:29:07'),
(70, '::1', 4, '', '2015-03-12 09:29:15'),
(71, '::1', 4, '', '2015-03-12 09:29:22'),
(72, '::1', 4, '', '2015-03-12 09:29:27'),
(73, '::1', 4, '', '2015-03-12 09:29:39'),
(74, '::1', 4, '', '2015-03-12 09:30:17'),
(75, '::1', 4, '', '2015-03-12 09:30:52'),
(76, '::1', 4, '', '2015-03-12 09:31:19'),
(77, '::1', 4, '', '2015-03-12 09:31:30'),
(78, '::1', 4, '', '2015-03-12 09:31:49'),
(79, '::1', 4, '', '2015-03-12 09:31:59'),
(80, '::1', 4, '', '2015-03-12 09:32:16'),
(81, '::1', 4, '', '2015-03-12 09:32:28'),
(82, '::1', 4, '', '2015-03-12 09:32:55'),
(83, '::1', 4, '', '2015-03-12 09:33:20'),
(84, '::1', 4, '', '2015-03-12 09:33:30'),
(85, '::1', 4, '', '2015-03-12 09:33:49'),
(86, '::1', 4, '', '2015-03-12 09:34:06'),
(87, '::1', 4, '', '2015-03-12 09:34:14'),
(88, '::1', 4, '', '2015-03-12 09:35:27'),
(89, '::1', 4, '', '2015-03-12 09:35:29'),
(90, '::1', 4, '', '2015-03-12 09:35:52'),
(91, '::1', 4, '', '2015-03-12 09:36:10'),
(92, '::1', 2, '', '2015-03-12 19:14:55'),
(93, '::1', 3, '', '2015-03-12 19:15:14'),
(94, '::1', 4, '', '2015-03-12 20:20:48'),
(95, '::1', 3, '', '2015-03-12 20:21:14'),
(96, '::1', 4, '', '2015-03-12 20:24:12'),
(97, '::1', 4, '', '2015-03-12 20:24:44'),
(98, '::1', 4, '', '2015-03-12 20:25:13'),
(99, '::1', 4, '', '2015-03-12 20:25:36'),
(100, '::1', 4, '', '2015-03-12 20:28:29'),
(101, '::1', 4, '', '2015-03-12 20:42:35'),
(102, '::1', 4, '', '2015-03-12 20:42:49'),
(103, '::1', 4, '', '2015-03-12 20:42:51'),
(104, '::1', 4, '', '2015-03-12 20:42:58'),
(105, '::1', 4, '', '2015-03-12 20:43:09'),
(106, '::1', 4, '', '2015-03-12 20:43:24'),
(107, '::1', 4, '', '2015-03-12 20:43:37'),
(108, '::1', 4, '', '2015-03-12 20:43:48'),
(109, '::1', 3, '', '2015-03-12 20:45:12'),
(110, '::1', 3, '', '2015-03-12 20:46:10'),
(111, '::1', 3, '', '2015-03-12 20:46:15'),
(112, '::1', 3, '', '2015-03-12 20:46:22'),
(113, '::1', 3, '', '2015-03-12 20:46:40'),
(114, '::1', 3, '', '2015-03-12 20:47:27'),
(115, '::1', 3, '', '2015-03-12 20:47:33'),
(116, '::1', 3, '', '2015-03-12 20:48:23'),
(117, '::1', 3, '', '2015-03-12 20:49:10'),
(118, '::1', 3, '', '2015-03-12 20:51:05'),
(119, '::1', 3, '', '2015-03-12 20:51:30'),
(120, '::1', 3, '', '2015-03-12 20:51:40'),
(121, '::1', 3, '', '2015-03-12 20:52:54'),
(122, '::1', 3, '', '2015-03-12 20:53:43'),
(123, '::1', 3, '', '2015-03-12 20:54:05'),
(124, '::1', 3, '', '2015-03-12 20:54:08'),
(125, '::1', 3, '', '2015-03-12 20:54:30'),
(126, '::1', 3, '', '2015-03-12 20:54:56'),
(127, '::1', 3, '', '2015-03-12 20:55:03'),
(128, '::1', 2, '', '2015-03-12 20:56:12'),
(129, '::1', 2, '', '2015-03-13 14:52:01'),
(130, '::1', 2, '', '2015-03-13 14:53:32'),
(131, '::1', 5, '', '2015-03-13 15:22:08'),
(132, '::1', 5, '', '2015-03-13 15:22:08'),
(133, '::1', 6, '', '2015-03-13 15:26:33'),
(134, '::1', 7, '', '2015-03-13 15:27:15'),
(135, '::1', 7, '', '2015-03-13 15:27:15'),
(136, '::1', 7, '', '2015-03-13 15:28:22'),
(137, '::1', 7, '', '2015-03-13 15:28:36'),
(138, '::1', 7, '', '2015-03-13 15:31:37'),
(139, '::1', 7, '', '2015-03-13 15:37:23'),
(140, '::1', 7, '', '2015-03-13 15:38:27'),
(141, '::1', 7, '', '2015-03-13 15:41:22'),
(142, '::1', 7, '', '2015-03-13 15:43:55'),
(143, '::1', 7, '', '2015-03-13 15:46:46'),
(144, '::1', 7, '', '2015-03-13 15:49:14'),
(145, '::1', 7, '', '2015-03-13 15:50:44'),
(146, '::1', 7, '', '2015-03-13 15:55:23'),
(147, '::1', 7, '', '2015-03-13 15:55:34'),
(148, '::1', 7, '', '2015-03-13 15:56:02'),
(149, '::1', 7, '', '2015-03-13 15:56:15'),
(150, '::1', 7, '', '2015-03-13 15:56:29'),
(151, '::1', 7, '', '2015-03-13 15:56:46'),
(152, '::1', 7, '', '2015-03-13 15:57:09'),
(153, '::1', 7, '', '2015-03-13 15:57:19'),
(154, '::1', 7, '', '2015-03-13 15:57:35'),
(155, '::1', 7, '', '2015-03-13 15:57:54'),
(156, '::1', 7, '', '2015-03-13 16:02:01'),
(157, '::1', 7, '', '2015-03-13 16:02:03'),
(158, '::1', 7, '', '2015-03-13 16:02:11'),
(159, '::1', 7, '', '2015-03-13 16:02:19'),
(160, '::1', 7, '', '2015-03-13 16:02:21'),
(161, '::1', 7, '', '2015-03-13 16:02:28'),
(162, '::1', 7, '', '2015-03-13 16:02:40'),
(163, '::1', 7, '', '2015-03-13 16:02:57'),
(164, '::1', 7, '', '2015-03-13 16:03:02'),
(165, '::1', 7, '', '2015-03-13 16:03:05'),
(166, '::1', 7, '', '2015-03-13 16:03:09'),
(167, '::1', 7, '', '2015-03-13 16:03:10'),
(168, '::1', 2, '', '2015-03-13 16:19:40'),
(169, '::1', 2, '', '2015-03-13 16:20:56'),
(170, '::1', 2, '', '2015-03-13 17:08:45'),
(171, '::1', 3, '', '2015-03-13 17:08:51'),
(172, '::1', 7, '', '2015-03-13 17:08:58'),
(173, '::1', 2, '', '2015-03-13 17:09:46'),
(174, '::1', 2, '', '2015-03-13 17:10:08'),
(175, '::1', 2, '', '2015-03-13 17:10:37'),
(176, '::1', 2, '', '2015-03-13 17:10:43'),
(177, '::1', 2, '', '2015-03-13 17:10:59'),
(178, '::1', 2, '', '2015-03-13 17:11:01'),
(179, '::1', 2, '', '2015-03-13 17:11:09'),
(180, '::1', 2, '', '2015-03-13 17:11:41'),
(181, '::1', 2, '', '2015-03-13 17:13:48'),
(182, '::1', 2, '', '2015-03-13 17:15:14'),
(183, '::1', 8, '', '2015-03-13 17:15:29'),
(184, '::1', 2, '', '2015-03-13 17:17:18'),
(185, '::1', 2, '', '2015-03-13 17:17:22'),
(186, '::1', 9, '', '2015-03-13 17:17:33'),
(187, '::1', 2, '', '2015-03-13 17:17:42'),
(188, '::1', 10, '', '2015-03-13 17:17:45'),
(189, '::1', 10, '', '2015-03-13 17:17:45'),
(190, '::1', 8, '', '2015-03-13 19:30:18'),
(191, '::1', 8, '', '2015-03-13 19:30:22'),
(192, '::1', 4, '', '2015-03-13 19:37:40'),
(193, '::1', 2, '', '2015-03-14 07:19:51'),
(194, '::1', 2, '', '2015-03-14 07:20:15'),
(195, '::1', 2, '', '2015-03-14 10:54:40'),
(196, '::1', 2, '', '2015-03-14 10:54:42'),
(197, '::1', 8, '', '2015-03-16 09:12:43');

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
  `access_type` enum('Private','Unlisted') NOT NULL DEFAULT 'Private',
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `applicant_id` (`applicant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `applicant_id`, `name`, `headline`, `availability`, `current_industry`, `qualification`, `summary`, `access_type`, `is_public`) VALUES
(4, 5, '', '', '', '', '', '', 'Private', 0),
(5, 6, '', '', '', '', '', '', 'Private', 0),
(6, 7, 'Developer Test', 'test 2', 'Immediately', '', '', 'sss', '', 0),
(7, 8, 'My Resume 1', '', '', '', '', '', 'Private', 0),
(8, 9, 'My Resume 1x', 'For developer applications.', 'Immediately', '', 'test', 'test', 'Unlisted', 0),
(9, 9, 'My Resume 2', '', '', '', '', '', 'Private', 0),
(10, 9, 'My Resume 3', 'For management.', '2 weeks', '', 'fasdf', 'sf', 'Private', 1),
(11, 10, 'Project Manager', 'Project Manager', 'Immediately', '', 'Computer Science', 'test', 'Private', 0),
(12, 10, 'My Resume 2', '', '', '', '', '', 'Private', 0),
(13, 10, 'My Resume 3', '', '', '', '', '', 'Private', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resume_requests`
--

CREATE TABLE IF NOT EXISTS `resume_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `emails` varchar(500) NOT NULL,
  `date_time_requested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `responded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `applicant_id` (`applicant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resume_requests`
--

INSERT INTO `resume_requests` (`id`, `applicant_id`, `emails`, `date_time_requested`, `responded`) VALUES
(1, 6, 'test@test.com', '2015-03-05 15:29:44', 0),
(2, 6, 'test@test.com,ksdjf@slkfj.com,', '2015-03-05 15:30:57', 0),
(3, 6, 'sdf@jflksd.com', '2015-03-05 15:31:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(4, 'Applicant'),
(3, 'Company Member'),
(2, 'Employer'),
(5, 'Faculty'),
(6, 'School Member');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `notes`, `title`, `full_name`, `email`, `website`, `password`, `enabled`, `enable_token`, `password_reset_token`, `landline`, `mobile`, `address`, `city`, `state`, `zip_code`, `country`, `nationality`, `alternate_email`, `image_path`, `date_registered`) VALUES
(13, 2, '', 'Mr.', 'Some Employer', 'e@e.com', '', '1', 1, '528d80d64843abdbf3a9dbed0ccb84836009738d', '', '', '', '', '', '', 0, 'All Countries', '', '', '', '2015-03-04 06:15:56'),
(14, 4, '', 'Mr.', 'sdf', 'appl1@a.com', '', '1', 0, 'd293a6c0f52917fdbf7c0fec7446980b7dd43669', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 08:49:51'),
(15, 4, '', 'Mr.', 'adslfk', 'fklsj@jlfkd.com', '', '1', 0, '5fa65367e7b0bb2dd08c3fc086f48ec5bb9459ed', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 08:52:56'),
(16, 4, '', 'Mr.', 'Test User 1', 'a@a.com', '', '1', 1, 'ace203f684b8cb8a4bf201412528073b66848aa1', '', '', '', '', '', '', 0, 'All Countries', '', '', '', '2015-03-04 08:54:16'),
(17, 4, '', 'Mr.', 'sdfklj', 'a@b.com', '', '1', 0, '983708f3c2b4973d4500210ce1b7d3a21fa4cb23', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-04 18:10:44'),
(18, 4, '', 'Mr.', 'Test User 2', 'a@c.com', '', '1', 1, '40d41b1fce37c6f5ac185e71dff0479c043942ba', '', '', '', '', '', '', 0, 'All Countries', '', '', '', '2015-03-04 18:11:26'),
(19, 2, '', 'Mr.', 'sdf', 'f@f.com', '', '1', 0, 'b70017c23cc7181de46ba88e1cad48705a502628', '', '', '', '', '', '', 0, '', '', '', '', '2015-03-08 17:20:31'),
(20, 5, '', 'Ms.', 'Faculty User', 'f1@f.com', '', '1', 1, '8870cd3dfbe6724f843867f80757bf7b55a67295', '', '', '', '', '', '', 0, 'All Countries', '', '', '', '2015-03-08 17:20:58'),
(21, 4, '', 'Mr.', 'Shiela Marie', 'spalang@gmail.com', '', 'test', 1, 'ec2326e1533fc1976033ce8f5d92112d9f45bd77', '', '', '', '', '', '', 6014, 'All Countries', 'Filipino', '', '', '2015-03-09 11:41:36');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `work_histories`
--

INSERT INTO `work_histories` (`id`, `resume_id`, `position`, `company`, `location`, `summary`, `date_from`, `date_to`, `is_current_work`) VALUES
(4, 6, 'pos', 'com', 'loc', 'sum', '2015-03-06', '2015-03-10', 0),
(5, 6, 'pos', 'comp1', 'loc1', 'sum1', '2015-03-13', '2015-03-17', 0),
(6, 8, 'asdf', 'sf', 'sdf', 'sdf', '2015-03-20', '2015-03-23', 0),
(7, 11, 'Project Manager', 'Cebu Digital', '', '', '2015-03-06', '2015-03-10', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_informations`
--
ALTER TABLE `additional_informations`
  ADD CONSTRAINT `additional_informations_ibfk_1` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `analytics_report_emailers`
--
ALTER TABLE `analytics_report_emailers`
  ADD CONSTRAINT `analytics_report_emailers_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billings_ibfk_2` FOREIGN KEY (`paid_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer_companies`
--
ALTER TABLE `employer_companies`
  ADD CONSTRAINT `employer_companies_ibfk_2` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employer_companies_ibfk_3` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_schools`
--
ALTER TABLE `faculty_schools`
  ADD CONSTRAINT `faculty_schools_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_schools_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pooled_applicants`
--
ALTER TABLE `pooled_applicants`
  ADD CONSTRAINT `pooled_applicants_ibfk_4` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pooled_applicants_ibfk_5` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position_applications`
--
ALTER TABLE `position_applications`
  ADD CONSTRAINT `position_applications_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_applications_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_applications_ibfk_3` FOREIGN KEY (`application_status_id`) REFERENCES `application_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resume_requests`
--
ALTER TABLE `resume_requests`
  ADD CONSTRAINT `resume_requests_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
