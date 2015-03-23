-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2015 at 12:22 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `haystack`
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
(2, 8, 'Likes: Biking, jog, drawing, games.'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `analytics_report_emailers`
--

INSERT INTO `analytics_report_emailers` (`id`, `title`, `frequency`, `recipients`, `date_from`, `date_to`, `report_type`, `organization_id`) VALUES
(1, 'test', 'Daily', 'dfs@lfksd.com', '2015-03-12', '2015-03-18', 'Views', 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `current_position_title`, `expected_salary`, `preferred_country`, `resume_path`) VALUES
(5, 14, '', 0, '', ''),
(6, 15, '', 0, '', ''),
(7, 16, 'Acupuncturist', 2, '', ''),
(8, 17, 'Dev', 0, '', ''),
(9, 18, '0', 0, '', ''),
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
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `publish_state` enum('Draft','Review','Published') NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `dated_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `author`, `content`, `slug`, `publish_state`, `tags`, `date_time_created`, `dated_updated`) VALUES
(1, 'Internship Basics', 'Simplifie Inc.', 'An internship isn''t just any temporary job. It can be a bridge to your life''s work or an experiment in a career that interests you. Maybe you''ve heard a lot about them from parents, counselors or a co-worker who used one to transition from another field. You might be wondering, "What''s in it for me?"\r\n\r\nIf you''ve got questions about whether interning is the right way to achieve your career goals, this is the place to start. We''ll begin with the basic definition and move to answering many of the most common questions people have about taking on the role of the intern.', 'internship-basics', 'Published', 'internship basics', '2015-03-18 00:00:00', '2015-03-17 16:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE IF NOT EXISTS `certifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `resume_id`, `name`) VALUES
(2, 6, 'c1'),
(3, 6, 'c2'),
(4, 10, 'sdf'),
(5, 10, 'sdf'),
(6, 8, 'IT Seminar');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `resume_id`, `degree`, `field_of_study`, `school`, `country`, `city`, `date_from`, `date_to`) VALUES
(3, 6, 'deg', 'f', 's', 'Azerbaijan', 'c', '2015-03-19', '2015-03-31'),
(4, 6, 'd1', 'f1', 's1', 'Antarctica', 'c1', '2015-03-18', '2015-03-24'),
(5, 9, 'asdf', 'sfd', 'sdf', 'Azerbaijan', 'sf', '2015-03-25', '2015-03-10'),
(6, 8, 'Bachelor', 'IT', 'USJ-R', 'Philippines', '', '2000-10-01', '2004-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `user_id`) VALUES
(7, 13),
(8, 25),
(9, 26),
(10, 27),
(11, 28),
(12, 29),
(13, 30),
(14, 31),
(15, 34),
(16, 35),
(17, 36),
(18, 37),
(19, 38),
(20, 39),
(21, 40),
(22, 47),
(23, 51),
(24, 52),
(25, 53),
(26, 54),
(27, 55),
(28, 56);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employer_companies`
--

INSERT INTO `employer_companies` (`id`, `organization_id`, `employer_id`) VALUES
(3, 6, 7),
(4, 6, 7),
(6, 6, 7),
(7, 6, 7),
(8, 6, 17),
(9, 6, 19),
(10, 6, 20),
(11, 6, 21),
(12, 6, 22),
(13, 6, 24),
(14, 6, 26),
(15, 6, 28);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `user_id`) VALUES
(1, 19),
(2, 20),
(3, 41),
(4, 42),
(5, 43),
(6, 44),
(7, 45),
(8, 46),
(9, 49),
(10, 50),
(11, 57),
(12, 58);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `faculty_schools`
--

INSERT INTO `faculty_schools` (`id`, `organization_id`, `faculty_id`) VALUES
(1, 8, 2),
(2, 9, 3),
(3, 10, 4),
(4, 9, 9),
(5, 9, 10),
(6, 8, 11),
(7, 8, 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `organization_id`, `date_time_created`) VALUES
(4, 49, 9, '2015-03-17 15:54:38'),
(5, 50, 9, '2015-03-17 16:03:34'),
(6, 52, 6, '2015-03-17 16:09:10'),
(7, 54, 6, '2015-03-17 16:11:11'),
(8, 56, 6, '2015-03-17 16:12:05'),
(9, 57, 8, '2015-03-17 16:13:37'),
(10, 58, 8, '2015-03-17 16:13:54');

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
  `logo_original_filename` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Display: Name - City, State, Country' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_type`, `name`, `nature`, `description`, `logo_filename`, `logo_original_filename`, `website`, `email`, `landline`, `mobile`, `fax`, `address`, `city`, `state`, `zip_code`, `country`) VALUES
(6, 'Company', 'Some Famous Company', '', 'test', 'bb96034c7aad99d6890a6fae1ef5fda4.jpg', 'work6.jpg', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan'),
(7, 'School', 'Some Famous Company', '', 'test', '<', '<', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan'),
(8, 'School', 'Some Famous Company', '', 'test', '<', '<', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan'),
(9, 'School', 'Some Famous Company', '', 'test', '<', '<', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan'),
(10, 'School', 'Some Famous Company', '', 'test', '<', '<', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan'),
(11, 'School', 'Some Famous Company', '', 'test', '<', '<', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan'),
(12, 'School', 'Some Famous Company', '', 'test', '<', '<', 'http://www.google.com', 'admin@google.com', '1', '1', '', 'ca', 'cc', 'NY', 0, 'Afghanistan');

-- --------------------------------------------------------

--
-- Table structure for table `pooled_applicants`
--

CREATE TABLE IF NOT EXISTS `pooled_applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_status_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `date_time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`),
  KEY `applicant_id` (`applicant_id`),
  KEY `application_status_id` (`application_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pooled_applicants`
--

INSERT INTO `pooled_applicants` (`id`, `position_id`, `applicant_id`, `application_status_id`, `notes`, `date_time_updated`) VALUES
(6, 2, 9, 7, 'test', '2015-03-13 19:24:27');

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
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_status_id` (`application_status_id`),
  KEY `applicant_id` (`applicant_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `position_applications`
--

INSERT INTO `position_applications` (`id`, `applicant_id`, `position_id`, `date_time_applied`, `application_status_id`, `notes`) VALUES
(3, 9, 2, '2015-03-09 08:04:35', 9, 'The applicant withdrew..'),
(4, 10, 2, '2015-03-09 12:00:37', 7, ''),
(5, 9, 8, '2015-03-13 19:30:22', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `position_clicks`
--

CREATE TABLE IF NOT EXISTS `position_clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '"Used to track Unique Metrics for logged in users."',
  `ip_address` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_time_clicked` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `position_clicks`
--

INSERT INTO `position_clicks` (`id`, `position_id`, `user_id`, `ip_address`, `address`, `date_time_clicked`) VALUES
(1, 3, 13, '::1', '', '2015-03-10 09:32:36'),
(2, 3, NULL, '::1', '', '2015-03-18 09:33:48'),
(3, 5, 13, '::1', '', '2015-03-19 04:13:34'),
(4, 5, 13, '::1', '', '2015-03-19 04:14:05'),
(5, 5, 13, '::1', '', '2015-03-19 04:14:09'),
(6, 5, 13, '::1', '', '2015-03-19 04:14:12'),
(7, 7, 13, '::1', '', '2015-03-19 04:14:15'),
(8, 3, 13, '::1', '', '2015-03-19 05:58:16'),
(9, 3, NULL, '::1', '', '2015-03-20 06:12:44'),
(10, 3, 13, '::1', '', '2015-03-20 09:36:03'),
(11, 3, 13, '::1', '', '2015-03-20 09:56:50'),
(12, 3, NULL, '::1', '', '2015-03-22 05:11:48'),
(13, 3, 13, '::1', '', '2015-03-22 16:43:55'),
(14, 3, NULL, '::1', '', '2015-03-22 17:05:52'),
(15, 3, NULL, '::1', '', '2015-03-22 17:10:06'),
(16, 3, NULL, '::1', '', '2015-03-22 17:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `position_dwells`
--

CREATE TABLE IF NOT EXISTS `position_dwells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `seconds` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `position_dwells`
--

INSERT INTO `position_dwells` (`id`, `user_id`, `position_id`, `ip_address`, `address`, `seconds`, `date_time_created`) VALUES
(1, NULL, 3, '::1', '', 11, '2015-03-18 08:40:07'),
(2, NULL, 3, '::1', '', 15, '2015-03-18 08:43:36'),
(3, 13, 3, '::1', '', 4, '2015-03-18 08:43:49'),
(4, 13, 3, '::1', '', 14, '2015-03-18 08:44:08'),
(5, 13, 3, '::1', '', 13, '2015-03-18 09:30:57'),
(6, 13, 3, '::1', '', 28, '2015-03-18 09:31:40'),
(7, NULL, 3, '::1', '', 1632, '2015-03-18 10:01:10'),
(8, NULL, 3, '::1', '', 4, '2015-03-18 10:01:15'),
(9, 13, 5, '::1', '', 2, '2015-03-19 04:13:37'),
(10, 13, 5, '::1', '', 0, '2015-03-19 04:14:02'),
(11, 13, 5, '::1', '', 1, '2015-03-19 04:14:07'),
(12, 13, 5, '::1', '', 0, '2015-03-19 04:14:10'),
(13, 13, 5, '::1', '', 0, '2015-03-19 04:14:13'),
(14, 13, 7, '::1', '', 18, '2015-03-19 04:14:35'),
(15, 13, 3, '::1', '', 4, '2015-03-19 05:58:22'),
(16, NULL, 3, '::1', '', 2005, '2015-03-20 07:38:20'),
(17, 13, 3, '::1', '', 79, '2015-03-20 09:37:23'),
(18, 13, 3, '::1', '', 10, '2015-03-20 09:38:25'),
(19, 13, 3, '::1', '', 5, '2015-03-20 09:38:31'),
(20, 13, 3, '::1', '', 0, '2015-03-20 09:38:45'),
(21, 13, 3, '::1', '', 27, '2015-03-20 09:39:13'),
(22, 13, 3, '::1', '', 45, '2015-03-20 09:39:59'),
(23, 13, 3, '::1', '', 3, '2015-03-20 09:40:04'),
(24, 13, 3, '::1', '', 24, '2015-03-20 09:40:29'),
(25, 13, 3, '::1', '', 96, '2015-03-20 09:42:07'),
(26, 13, 3, '::1', '', 57, '2015-03-20 09:57:49'),
(27, NULL, 3, '::1', '', 11, '2015-03-22 05:12:00'),
(28, 13, 3, '::1', '', 4, '2015-03-22 16:43:59'),
(29, NULL, 3, '::1', '', 24, '2015-03-22 17:06:17'),
(30, NULL, 3, '::1', '', 7, '2015-03-22 17:10:13'),
(31, NULL, 3, '::1', '', 311, '2015-03-22 17:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `position_impressions`
--

CREATE TABLE IF NOT EXISTS `position_impressions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `position_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_time_viewed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=328 ;

--
-- Dumping data for table `position_impressions`
--

INSERT INTO `position_impressions` (`id`, `user_id`, `ip_address`, `position_id`, `address`, `date_time_viewed`) VALUES
(1, NULL, '::1', 2, '', '2015-03-08 08:56:00'),
(2, NULL, '::1', 2, '', '2015-03-08 08:58:04'),
(3, NULL, '::1', 2, '', '2015-03-08 08:58:09'),
(4, NULL, '::1', 2, '', '2015-03-08 08:58:24'),
(5, NULL, '::1', 2, '', '2015-03-08 10:12:38'),
(6, NULL, '::1', 2, '', '2015-03-08 11:09:34'),
(7, NULL, '::1', 2, '', '2015-03-08 11:10:56'),
(8, NULL, '::1', 2, '', '2015-03-08 11:11:01'),
(9, NULL, '::1', 2, '', '2015-03-08 11:22:34'),
(10, NULL, '::1', 2, '', '2015-03-08 11:25:51'),
(11, NULL, '::1', 2, '', '2015-03-08 12:26:41'),
(12, NULL, '::1', 2, '', '2015-03-08 13:51:19'),
(13, NULL, '::1', 2, '', '2015-03-09 08:02:36'),
(14, NULL, '::1', 2, '', '2015-03-09 08:03:10'),
(15, NULL, '::1', 2, '', '2015-03-09 08:03:32'),
(16, NULL, '::1', 2, '', '2015-03-09 08:04:34'),
(17, NULL, '::1', 2, '', '2015-03-09 08:04:35'),
(18, NULL, '::1', 2, '', '2015-03-09 08:05:09'),
(19, NULL, '::1', 2, '', '2015-03-09 12:00:29'),
(20, NULL, '::1', 2, '', '2015-03-09 12:00:38'),
(21, NULL, '::1', 2, '', '2015-03-09 12:20:32'),
(22, NULL, '::1', 2, '', '2015-03-09 17:26:34'),
(23, NULL, '::1', 2, '', '2015-03-09 17:26:36'),
(24, NULL, '::1', 2, '', '2015-03-09 17:29:21'),
(25, NULL, '::1', 2, '', '2015-03-09 17:29:26'),
(26, NULL, '::1', 2, '', '2015-03-09 17:42:23'),
(27, NULL, '::1', 2, '', '2015-03-09 17:42:28'),
(28, NULL, '::1', 2, '', '2015-03-12 08:03:51'),
(29, NULL, '::1', 2, '', '2015-03-12 08:22:00'),
(30, NULL, '::1', 2, '', '2015-03-12 08:24:34'),
(31, NULL, '::1', 2, '', '2015-03-12 08:33:52'),
(32, NULL, '::1', 2, '', '2015-03-12 08:34:41'),
(33, NULL, '::1', 2, '', '2015-03-12 08:35:00'),
(34, NULL, '::1', 2, '', '2015-03-12 08:35:56'),
(35, NULL, '::1', 2, '', '2015-03-12 08:36:07'),
(36, NULL, '::1', 2, '', '2015-03-12 08:36:32'),
(37, NULL, '::1', 2, '', '2015-03-12 08:37:26'),
(38, NULL, '::1', 2, '', '2015-03-12 08:37:33'),
(39, NULL, '::1', 2, '', '2015-03-12 08:38:09'),
(40, NULL, '::1', 2, '', '2015-03-12 08:38:38'),
(41, NULL, '::1', 2, '', '2015-03-12 08:38:50'),
(42, NULL, '::1', 2, '', '2015-03-12 08:39:40'),
(43, NULL, '::1', 2, '', '2015-03-12 08:40:09'),
(44, NULL, '::1', 2, '', '2015-03-12 08:40:36'),
(45, NULL, '::1', 2, '', '2015-03-12 08:40:46'),
(46, NULL, '::1', 2, '', '2015-03-12 08:41:25'),
(47, NULL, '::1', 2, '', '2015-03-12 08:41:28'),
(48, NULL, '::1', 2, '', '2015-03-12 08:42:04'),
(49, NULL, '::1', 2, '', '2015-03-12 08:42:06'),
(50, NULL, '::1', 2, '', '2015-03-12 08:42:36'),
(51, NULL, '::1', 2, '', '2015-03-12 08:43:18'),
(52, NULL, '::1', 2, '', '2015-03-12 08:43:30'),
(53, NULL, '::1', 2, '', '2015-03-12 08:45:16'),
(54, NULL, '::1', 2, '', '2015-03-12 08:45:19'),
(55, NULL, '::1', 2, '', '2015-03-12 08:45:50'),
(56, NULL, '::1', 2, '', '2015-03-12 08:45:56'),
(57, NULL, '::1', 2, '', '2015-03-12 08:46:53'),
(58, NULL, '::1', 2, '', '2015-03-12 08:46:56'),
(59, NULL, '::1', 2, '', '2015-03-12 09:04:16'),
(60, NULL, '::1', 2, '', '2015-03-12 09:18:13'),
(61, NULL, '::1', 3, '', '2015-03-12 09:25:02'),
(62, NULL, '::1', 3, '', '2015-03-12 09:26:10'),
(63, NULL, '::1', 4, '', '2015-03-12 09:27:25'),
(64, NULL, '::1', 4, '', '2015-03-12 09:27:25'),
(65, NULL, '::1', 4, '', '2015-03-12 09:27:34'),
(66, NULL, '::1', 4, '', '2015-03-12 09:27:44'),
(67, NULL, '::1', 4, '', '2015-03-12 09:28:41'),
(68, NULL, '::1', 4, '', '2015-03-12 09:29:02'),
(69, NULL, '::1', 4, '', '2015-03-12 09:29:07'),
(70, NULL, '::1', 4, '', '2015-03-12 09:29:15'),
(71, NULL, '::1', 4, '', '2015-03-12 09:29:22'),
(72, NULL, '::1', 4, '', '2015-03-12 09:29:27'),
(73, NULL, '::1', 4, '', '2015-03-12 09:29:39'),
(74, NULL, '::1', 4, '', '2015-03-12 09:30:17'),
(75, NULL, '::1', 4, '', '2015-03-12 09:30:52'),
(76, NULL, '::1', 4, '', '2015-03-12 09:31:19'),
(77, NULL, '::1', 4, '', '2015-03-12 09:31:30'),
(78, NULL, '::1', 4, '', '2015-03-12 09:31:49'),
(79, NULL, '::1', 4, '', '2015-03-12 09:31:59'),
(80, NULL, '::1', 4, '', '2015-03-12 09:32:16'),
(81, NULL, '::1', 4, '', '2015-03-12 09:32:28'),
(82, NULL, '::1', 4, '', '2015-03-12 09:32:55'),
(83, NULL, '::1', 4, '', '2015-03-12 09:33:20'),
(84, NULL, '::1', 4, '', '2015-03-12 09:33:30'),
(85, NULL, '::1', 4, '', '2015-03-12 09:33:49'),
(86, NULL, '::1', 4, '', '2015-03-12 09:34:06'),
(87, NULL, '::1', 4, '', '2015-03-12 09:34:14'),
(88, NULL, '::1', 4, '', '2015-03-12 09:35:27'),
(89, NULL, '::1', 4, '', '2015-03-12 09:35:29'),
(90, NULL, '::1', 4, '', '2015-03-12 09:35:52'),
(91, NULL, '::1', 4, '', '2015-03-12 09:36:10'),
(92, NULL, '::1', 2, '', '2015-03-12 19:14:55'),
(93, NULL, '::1', 3, '', '2015-03-12 19:15:14'),
(94, NULL, '::1', 4, '', '2015-03-12 20:20:48'),
(95, NULL, '::1', 3, '', '2015-03-12 20:21:14'),
(96, NULL, '::1', 4, '', '2015-03-12 20:24:12'),
(97, NULL, '::1', 4, '', '2015-03-12 20:24:44'),
(98, NULL, '::1', 4, '', '2015-03-12 20:25:13'),
(99, NULL, '::1', 4, '', '2015-03-12 20:25:36'),
(100, NULL, '::1', 4, '', '2015-03-12 20:28:29'),
(101, NULL, '::1', 4, '', '2015-03-12 20:42:35'),
(102, NULL, '::1', 4, '', '2015-03-12 20:42:49'),
(103, NULL, '::1', 4, '', '2015-03-12 20:42:51'),
(104, NULL, '::1', 4, '', '2015-03-12 20:42:58'),
(105, NULL, '::1', 4, '', '2015-03-12 20:43:09'),
(106, NULL, '::1', 4, '', '2015-03-12 20:43:24'),
(107, NULL, '::1', 4, '', '2015-03-12 20:43:37'),
(108, NULL, '::1', 4, '', '2015-03-12 20:43:48'),
(109, NULL, '::1', 3, '', '2015-03-12 20:45:12'),
(110, NULL, '::1', 3, '', '2015-03-12 20:46:10'),
(111, NULL, '::1', 3, '', '2015-03-12 20:46:15'),
(112, NULL, '::1', 3, '', '2015-03-12 20:46:22'),
(113, NULL, '::1', 3, '', '2015-03-12 20:46:40'),
(114, NULL, '::1', 3, '', '2015-03-12 20:47:27'),
(115, NULL, '::1', 3, '', '2015-03-12 20:47:33'),
(116, NULL, '::1', 3, '', '2015-03-12 20:48:23'),
(117, NULL, '::1', 3, '', '2015-03-12 20:49:10'),
(118, NULL, '::1', 3, '', '2015-03-12 20:51:05'),
(119, NULL, '::1', 3, '', '2015-03-12 20:51:30'),
(120, NULL, '::1', 3, '', '2015-03-12 20:51:40'),
(121, NULL, '::1', 3, '', '2015-03-12 20:52:54'),
(122, NULL, '::1', 3, '', '2015-03-12 20:53:43'),
(123, NULL, '::1', 3, '', '2015-03-12 20:54:05'),
(124, NULL, '::1', 3, '', '2015-03-12 20:54:08'),
(125, NULL, '::1', 3, '', '2015-03-12 20:54:30'),
(126, NULL, '::1', 3, '', '2015-03-12 20:54:56'),
(127, NULL, '::1', 3, '', '2015-03-12 20:55:03'),
(128, NULL, '::1', 2, '', '2015-03-12 20:56:12'),
(129, NULL, '::1', 2, '', '2015-03-13 14:52:01'),
(130, NULL, '::1', 2, '', '2015-03-13 14:53:32'),
(131, NULL, '::1', 5, '', '2015-03-13 15:22:08'),
(132, NULL, '::1', 5, '', '2015-03-13 15:22:08'),
(133, NULL, '::1', 6, '', '2015-03-13 15:26:33'),
(134, NULL, '::1', 7, '', '2015-03-13 15:27:15'),
(135, NULL, '::1', 7, '', '2015-03-13 15:27:15'),
(136, NULL, '::1', 7, '', '2015-03-13 15:28:22'),
(137, NULL, '::1', 7, '', '2015-03-13 15:28:36'),
(138, NULL, '::1', 7, '', '2015-03-13 15:31:37'),
(139, NULL, '::1', 7, '', '2015-03-13 15:37:23'),
(140, NULL, '::1', 7, '', '2015-03-13 15:38:27'),
(141, NULL, '::1', 7, '', '2015-03-13 15:41:22'),
(142, NULL, '::1', 7, '', '2015-03-13 15:43:55'),
(143, NULL, '::1', 7, '', '2015-03-13 15:46:46'),
(144, NULL, '::1', 7, '', '2015-03-13 15:49:14'),
(145, NULL, '::1', 7, '', '2015-03-13 15:50:44'),
(146, NULL, '::1', 7, '', '2015-03-13 15:55:23'),
(147, NULL, '::1', 7, '', '2015-03-13 15:55:34'),
(148, NULL, '::1', 7, '', '2015-03-13 15:56:02'),
(149, NULL, '::1', 7, '', '2015-03-13 15:56:15'),
(150, NULL, '::1', 7, '', '2015-03-13 15:56:29'),
(151, NULL, '::1', 7, '', '2015-03-13 15:56:46'),
(152, NULL, '::1', 7, '', '2015-03-13 15:57:09'),
(153, NULL, '::1', 7, '', '2015-03-13 15:57:19'),
(154, NULL, '::1', 7, '', '2015-03-13 15:57:35'),
(155, NULL, '::1', 7, '', '2015-03-13 15:57:54'),
(156, NULL, '::1', 7, '', '2015-03-13 16:02:01'),
(157, NULL, '::1', 7, '', '2015-03-13 16:02:03'),
(158, NULL, '::1', 7, '', '2015-03-13 16:02:11'),
(159, NULL, '::1', 7, '', '2015-03-13 16:02:19'),
(160, NULL, '::1', 7, '', '2015-03-13 16:02:21'),
(161, NULL, '::1', 7, '', '2015-03-13 16:02:28'),
(162, NULL, '::1', 7, '', '2015-03-13 16:02:40'),
(163, NULL, '::1', 7, '', '2015-03-13 16:02:57'),
(164, NULL, '::1', 7, '', '2015-03-13 16:03:02'),
(165, NULL, '::1', 7, '', '2015-03-13 16:03:05'),
(166, NULL, '::1', 7, '', '2015-03-13 16:03:09'),
(167, NULL, '::1', 7, '', '2015-03-13 16:03:10'),
(168, NULL, '::1', 2, '', '2015-03-13 16:19:40'),
(169, NULL, '::1', 2, '', '2015-03-13 16:20:56'),
(170, NULL, '::1', 2, '', '2015-03-13 17:08:45'),
(171, NULL, '::1', 3, '', '2015-03-13 17:08:51'),
(172, NULL, '::1', 7, '', '2015-03-13 17:08:58'),
(173, NULL, '::1', 2, '', '2015-03-13 17:09:46'),
(174, NULL, '::1', 2, '', '2015-03-13 17:10:08'),
(175, NULL, '::1', 2, '', '2015-03-13 17:10:37'),
(176, NULL, '::1', 2, '', '2015-03-13 17:10:43'),
(177, NULL, '::1', 2, '', '2015-03-13 17:10:59'),
(178, NULL, '::1', 2, '', '2015-03-13 17:11:01'),
(179, NULL, '::1', 2, '', '2015-03-13 17:11:09'),
(180, NULL, '::1', 2, '', '2015-03-13 17:11:41'),
(181, NULL, '::1', 2, '', '2015-03-13 17:13:48'),
(182, NULL, '::1', 2, '', '2015-03-13 17:15:14'),
(183, NULL, '::1', 8, '', '2015-03-13 17:15:29'),
(184, NULL, '::1', 2, '', '2015-03-13 17:17:18'),
(185, NULL, '::1', 2, '', '2015-03-13 17:17:22'),
(186, NULL, '::1', 9, '', '2015-03-13 17:17:33'),
(187, NULL, '::1', 2, '', '2015-03-13 17:17:42'),
(188, NULL, '::1', 10, '', '2015-03-13 17:17:45'),
(189, NULL, '::1', 10, '', '2015-03-13 17:17:45'),
(190, NULL, '::1', 8, '', '2015-03-13 19:30:18'),
(191, NULL, '::1', 8, '', '2015-03-13 19:30:22'),
(192, NULL, '::1', 4, '', '2015-03-13 19:37:40'),
(193, NULL, '::1', 2, '', '2015-03-14 07:19:51'),
(194, NULL, '::1', 2, '', '2015-03-14 07:20:15'),
(195, NULL, '::1', 2, '', '2015-03-14 10:54:40'),
(196, NULL, '::1', 2, '', '2015-03-14 10:54:42'),
(197, NULL, '::1', 8, '', '2015-03-16 09:12:43'),
(198, 13, '::1', 2, '', '2015-03-16 17:52:49'),
(199, 13, '::1', 2, '', '2015-03-17 13:05:04'),
(200, 13, '::1', 2, '', '2015-03-17 13:06:55'),
(201, 13, '::1', 2, '', '2015-03-17 13:07:02'),
(202, 13, '::1', 2, '', '2015-03-17 13:07:44'),
(203, 13, '::1', 2, '', '2015-03-17 13:07:54'),
(204, 13, '::1', 2, '', '2015-03-17 13:09:11'),
(205, 13, '::1', 2, '', '2015-03-17 13:09:38'),
(206, 13, '::1', 2, '', '2015-03-17 13:09:46'),
(207, 13, '::1', 2, '', '2015-03-17 13:09:53'),
(208, NULL, '::1', 3, '', '2015-03-18 06:08:00'),
(209, NULL, '::1', 3, '', '2015-03-18 06:08:25'),
(210, NULL, '::1', 3, '', '2015-03-18 06:09:49'),
(211, NULL, '::1', 3, '', '2015-03-18 06:10:16'),
(212, NULL, '::1', 3, '', '2015-03-18 06:11:44'),
(213, NULL, '::1', 3, '', '2015-03-18 06:12:26'),
(214, NULL, '::1', 3, '', '2015-03-18 06:12:50'),
(215, NULL, '::1', 3, '', '2015-03-18 06:12:51'),
(216, NULL, '::1', 3, '', '2015-03-18 06:13:41'),
(217, NULL, '::1', 3, '', '2015-03-18 06:19:54'),
(218, NULL, '::1', 3, '', '2015-03-18 06:20:03'),
(219, NULL, '::1', 3, '', '2015-03-18 06:20:31'),
(220, NULL, '::1', 3, '', '2015-03-18 06:20:36'),
(221, NULL, '::1', 3, '', '2015-03-18 06:20:48'),
(222, NULL, '::1', 3, '', '2015-03-18 06:22:41'),
(223, NULL, '::1', 3, '', '2015-03-18 06:22:43'),
(224, NULL, '::1', 3, '', '2015-03-18 06:23:04'),
(225, NULL, '::1', 3, '', '2015-03-18 06:23:07'),
(226, NULL, '::1', 3, '', '2015-03-18 06:23:08'),
(227, NULL, '::1', 3, '', '2015-03-18 06:23:13'),
(228, NULL, '::1', 3, '', '2015-03-18 06:23:14'),
(229, NULL, '::1', 3, '', '2015-03-18 06:24:23'),
(230, NULL, '::1', 3, '', '2015-03-18 06:24:40'),
(231, NULL, '::1', 3, '', '2015-03-18 06:55:57'),
(232, NULL, '::1', 3, '', '2015-03-18 06:56:15'),
(233, NULL, '::1', 3, '', '2015-03-18 06:56:35'),
(234, NULL, '::1', 3, '', '2015-03-18 06:57:03'),
(235, NULL, '::1', 3, '', '2015-03-18 06:58:21'),
(236, NULL, '::1', 3, '', '2015-03-18 06:58:56'),
(237, NULL, '::1', 3, '', '2015-03-18 06:59:14'),
(238, NULL, '::1', 3, '', '2015-03-18 06:59:45'),
(239, NULL, '::1', 3, '', '2015-03-18 07:00:06'),
(240, NULL, '::1', 3, '', '2015-03-18 07:00:07'),
(241, NULL, '::1', 3, '', '2015-03-18 07:00:43'),
(242, NULL, '::1', 3, '', '2015-03-18 07:01:45'),
(243, NULL, '::1', 3, '', '2015-03-18 07:02:30'),
(244, NULL, '::1', 3, '', '2015-03-18 07:02:43'),
(245, NULL, '::1', 3, '', '2015-03-18 07:02:56'),
(246, NULL, '::1', 3, '', '2015-03-18 07:03:19'),
(247, NULL, '::1', 3, '', '2015-03-18 07:03:46'),
(248, NULL, '::1', 3, '', '2015-03-18 07:03:51'),
(249, NULL, '::1', 3, '', '2015-03-18 07:04:36'),
(250, NULL, '::1', 3, '', '2015-03-18 07:05:04'),
(251, NULL, '::1', 3, '', '2015-03-18 07:06:23'),
(252, NULL, '::1', 3, '', '2015-03-18 07:06:39'),
(253, NULL, '::1', 3, '', '2015-03-18 07:07:00'),
(254, NULL, '::1', 3, '', '2015-03-18 07:07:51'),
(255, NULL, '::1', 3, '', '2015-03-18 07:08:48'),
(256, NULL, '::1', 3, '', '2015-03-18 07:09:51'),
(257, NULL, '::1', 3, '', '2015-03-18 07:11:01'),
(258, NULL, '::1', 3, '', '2015-03-18 07:12:45'),
(259, NULL, '::1', 3, '', '2015-03-18 07:13:10'),
(260, NULL, '::1', 3, '', '2015-03-18 07:13:14'),
(261, NULL, '::1', 3, '', '2015-03-18 07:14:29'),
(262, NULL, '::1', 3, '', '2015-03-18 07:14:35'),
(263, NULL, '::1', 3, '', '2015-03-18 07:15:25'),
(264, NULL, '::1', 3, '', '2015-03-18 07:15:58'),
(265, NULL, '::1', 3, '', '2015-03-18 07:16:27'),
(266, NULL, '::1', 3, '', '2015-03-18 07:17:03'),
(267, NULL, '::1', 3, '', '2015-03-18 07:17:20'),
(268, NULL, '::1', 3, '', '2015-03-18 07:18:14'),
(269, NULL, '::1', 3, '', '2015-03-18 07:20:52'),
(270, NULL, '::1', 3, '', '2015-03-18 07:21:45'),
(271, NULL, '::1', 3, '', '2015-03-18 07:21:54'),
(272, NULL, '::1', 3, '', '2015-03-18 07:22:22'),
(273, NULL, '::1', 3, '', '2015-03-18 07:22:50'),
(274, NULL, '::1', 3, '', '2015-03-18 07:23:30'),
(275, NULL, '::1', 3, '', '2015-03-18 07:23:55'),
(276, NULL, '::1', 3, '', '2015-03-18 07:24:35'),
(277, NULL, '::1', 3, '', '2015-03-18 07:25:20'),
(278, NULL, '::1', 3, '', '2015-03-18 07:25:45'),
(279, NULL, '::1', 3, '', '2015-03-18 07:26:21'),
(280, NULL, '::1', 3, '', '2015-03-18 07:26:29'),
(281, NULL, '::1', 3, '', '2015-03-18 07:27:05'),
(282, NULL, '::1', 3, '', '2015-03-18 07:27:39'),
(283, NULL, '::1', 3, '', '2015-03-18 07:27:56'),
(284, NULL, '::1', 3, '', '2015-03-18 07:27:58'),
(285, NULL, '::1', 3, '', '2015-03-18 07:28:57'),
(286, NULL, '::1', 3, '', '2015-03-18 07:30:01'),
(287, NULL, '::1', 3, '', '2015-03-18 07:30:47'),
(288, NULL, '::1', 3, '', '2015-03-18 07:33:27'),
(289, NULL, '::1', 3, '', '2015-03-18 07:33:59'),
(290, NULL, '::1', 3, '', '2015-03-18 07:34:03'),
(291, NULL, '::1', 3, '', '2015-03-18 07:35:20'),
(292, NULL, '::1', 3, '', '2015-03-18 07:39:54'),
(293, NULL, '::1', 3, '', '2015-03-18 07:41:23'),
(294, NULL, '::1', 3, '', '2015-03-18 07:41:30'),
(295, NULL, '::1', 3, '', '2015-03-18 07:42:43'),
(296, NULL, '::1', 3, '', '2015-03-18 07:43:20'),
(297, 13, '::1', 3, '', '2015-03-18 07:43:43'),
(298, 13, '::1', 3, '', '2015-03-18 07:43:52'),
(299, 13, '::1', 3, '', '2015-03-18 08:30:40'),
(300, 13, '::1', 3, '', '2015-03-18 08:31:11'),
(301, NULL, '::1', 3, '', '2015-03-18 08:33:48'),
(302, NULL, '::1', 3, '', '2015-03-18 09:01:10'),
(303, 13, '::1', 5, '', '2015-03-19 03:13:34'),
(304, 13, '::1', 5, '', '2015-03-19 03:14:00'),
(305, 13, '::1', 5, '', '2015-03-19 03:14:05'),
(306, 13, '::1', 5, '', '2015-03-19 03:14:09'),
(307, 13, '::1', 5, '', '2015-03-19 03:14:12'),
(308, 13, '::1', 7, '', '2015-03-19 03:14:15'),
(309, 13, '::1', 3, '', '2015-03-19 04:58:16'),
(310, NULL, '::1', 3, '', '2015-03-20 05:12:44'),
(311, 13, '::1', 3, '', '2015-03-20 08:36:03'),
(312, 13, '::1', 3, '', '2015-03-20 08:37:23'),
(313, 13, '::1', 3, '', '2015-03-20 08:38:15'),
(314, 13, '::1', 3, '', '2015-03-20 08:38:25'),
(315, 13, '::1', 3, '', '2015-03-20 08:38:44'),
(316, 13, '::1', 3, '', '2015-03-20 08:38:45'),
(317, 13, '::1', 3, '', '2015-03-20 08:39:13'),
(318, 13, '::1', 3, '', '2015-03-20 08:39:59'),
(319, 13, '::1', 3, '', '2015-03-20 08:40:04'),
(320, 13, '::1', 3, '', '2015-03-20 08:40:29'),
(321, 13, '::1', 3, '', '2015-03-20 08:56:50'),
(322, NULL, '::1', 3, '', '2015-03-22 04:11:48'),
(323, 13, '::1', 3, '', '2015-03-22 15:43:46'),
(324, 13, '::1', 3, '', '2015-03-22 15:43:55'),
(325, NULL, '::1', 3, '', '2015-03-22 16:05:52'),
(326, NULL, '::1', 3, '', '2015-03-22 16:10:06'),
(327, NULL, '::1', 3, '', '2015-03-22 16:22:51');

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
(8, 9, 'Developer', 'For developer applications.', 'Immediately', '', 'test', 'test', 'Unlisted', 1),
(9, 9, 'My Resume 2', '', '', '', '', '', 'Private', 0),
(10, 9, 'My Resume 3', 'For management.', '2 weeks', '', 'fasdf', 'sf', 'Private', 0),
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
-- Table structure for table `saved_searches`
--

CREATE TABLE IF NOT EXISTS `saved_searches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `resume_id`, `name`) VALUES
(2, 6, 'some skill'),
(3, 6, 'sk2'),
(4, 8, 'CI'),
(5, 8, 'AS3'),
(6, 8, 'jQuery'),
(7, 8, 'CSS3');

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
  `image_original_filename` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`enable_token`,`password_reset_token`,`alternate_email`,`image_path`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `notes`, `title`, `full_name`, `email`, `website`, `password`, `enabled`, `enable_token`, `password_reset_token`, `landline`, `mobile`, `address`, `city`, `state`, `zip_code`, `country`, `nationality`, `alternate_email`, `image_path`, `image_original_filename`, `date_registered`) VALUES
(13, 2, '', 'Mr.', 'Some Employer', 'e@e.com', '', '1', 1, '528d80d64843abdbf3a9dbed0ccb84836009738d', '', '1', '2', 'cebu', 'cebu city', 'cebu', 7000, 'Austria', 'filipino', '', '164a366cc9d9726fc39adc8c8edfb38c.jpg', 'work6.jpg', '2015-03-04 06:15:56'),
(14, 4, '', 'Mr.', 'sdf', 'appl1@a.com', '', '1', 0, 'd293a6c0f52917fdbf7c0fec7446980b7dd43669', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-04 08:49:51'),
(15, 4, '', 'Mr.', 'adslfk', 'fklsj@jlfkd.com', '', '1', 0, '5fa65367e7b0bb2dd08c3fc086f48ec5bb9459ed', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-04 08:52:56'),
(16, 1, '', 'Mr.', 'Test User 1', 'a@a.com', '', '1', 1, 'ace203f684b8cb8a4bf201412528073b66848aa1', '', '', '', '', '', '', 0, 'All Countries', '', '', '7138c67e3d950c9a261bd1590938e7b1.jpg', 'work6.jpg', '2015-03-04 08:54:16'),
(17, 4, '', 'Mr.', 'sdfklj', 'a@b.com', '', '1', 0, '983708f3c2b4973d4500210ce1b7d3a21fa4cb23', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-04 18:10:44'),
(18, 4, '', 'Mr.', 'Test User 2', 'a@c.com', '', '1', 1, '40d41b1fce37c6f5ac185e71dff0479c043942ba', '', '', '', '', '', '', 0, 'All Countries', '', '', '0bef0d657988f2bc06a22f629952c89b.jpg', 'work6.jpg', '2015-03-04 18:11:26'),
(19, 2, '', 'Mr.', 'sdf', 'f@f.com', '', '1', 0, 'b70017c23cc7181de46ba88e1cad48705a502628', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-08 17:20:31'),
(20, 5, '', 'Ms.', 'Faculty User', 'f1@f.com', '', '1', 1, '8870cd3dfbe6724f843867f80757bf7b55a67295', '', '', '', '', '', '', 0, 'All Countries', '', '', '', '', '2015-03-08 17:20:58'),
(21, 4, '', 'Mr.', 'Shiela Marie', 'spalang@gmail.com', '', 'test', 1, 'ec2326e1533fc1976033ce8f5d92112d9f45bd77', '', '', '', '', '', '', 6014, 'All Countries', 'Filipino', '', '', '', '2015-03-09 11:41:36'),
(24, 2, '', 'Mr.', 'test employee', 't1@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:41:15'),
(25, 2, '', 'Mr.', 'asdf', 't2@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:44:08'),
(26, 2, '', 'Mr.', 'asdf', 't3@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:51:16'),
(27, 2, '', 'Mr.', 'sdf', 't4@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:53:52'),
(28, 2, '', 'Mr.', 'sfd', 't5@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:54:19'),
(29, 2, '', 'Mr.', 'sdf', 't6@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:55:26'),
(30, 2, '', 'Mr.', 'fs', 't7@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:55:57'),
(31, 2, '', 'Mr.', 'fs', 't8@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:56:20'),
(32, 2, '', 'Mr.', 'fsf', 't9@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:56:55'),
(33, 2, '', 'Mr.', 'sdf', 't10@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:57:21'),
(34, 2, '', 'Mr.', 'sfd', 't11@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:57:37'),
(35, 2, '', 'Mr.', 'asdf', 't12@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:59:16'),
(36, 2, '', 'Mr.', 'asf', 't13@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 10:59:45'),
(37, 2, '', 'Mr.', 'asdf', 't14@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 11:00:11'),
(38, 2, '', 'Mr.', 'sf', 't15@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 11:01:36'),
(39, 2, '', 'Mr.', 'sf', 't16@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 11:02:04'),
(40, 2, '', 'Mr.', 'fs', 't17@t.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 11:04:04'),
(41, 5, '', 'Mr.', 'fasdf', 'f2@f.com', '', '1', 1, '389ef4315b054b71dc6dad16a20fef7576906629', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:28:48'),
(42, 5, '', 'Mr.', 'asdf', 'asdflk@jflsdkf.com', '', '1', 0, '0c6c4c479fd4d0231430ebf66a886d1a2d54bd86', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:33:39'),
(43, 5, '', 'Mr.', 'asdf', 'sdlkfj@fslkdf.com', '', 'sdf', 0, 'ced22db2cbd8c3208f4f5374450aec7b9733dbbf', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:40:20'),
(44, 5, '', 'Mr.', 'adsfasdf', 'sdfs@fsdlfk.com', '', '1', 0, 'fba31b5012c4b286ac1a04bf0fd102d5d86865c7', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:40:47'),
(45, 5, '', 'Mr.', 'adsfasdf', 'sdfs@fsdlfk1.com', '', '1', 0, 'fd509dc76a4bbc723dbd61d28b723e206e480e0b', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:41:06'),
(46, 5, '', 'Mr.', 'asdf', 'sdfsdf@jflkd.com', '', '1', 0, '5ef24722f25c3facb1723483cd72aeb86d8a4606', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:42:25'),
(47, 2, '', 'Mr.', 'asdf', 'sdf@fsjldkfj.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:50:36'),
(48, 5, '', 'Mr.', 'xxx', 'fsdf@fjskfjlkdsfj.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:53:07'),
(49, 5, '', 'Mr.', 'fsf', 'ksjsf@fjlskdf.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 15:54:38'),
(50, 5, '', 'Mr.', 'fsklfjsklxxxxxxxx', 'skdfjslkfjsfks@jlskdf.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:03:34'),
(51, 2, '', 'Mr.', 'adsf', 'sdfsskjdfhsjfh@jfslkdfj.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:08:46'),
(52, 2, '', 'Mr.', 'sfsf', 'sdfsskjdfhs1jfh@jfslkdfj.com', '', '1', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:09:10'),
(53, 2, '', 'Mr.', 'adsf', 'ff2@fsdfjl.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:11:01'),
(54, 2, '', 'Mr.', '', 'ff23@fsdfjl.com', '', '', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:11:11'),
(55, 2, '', 'Mr.', 'sfsf', 'ffffff@sjdflk.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:11:50'),
(56, 2, '', 'Mr.', 'sfsf', 'ffff3ff@sjdflk.com', '', '1', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:12:05'),
(57, 5, '', 'Mr.', 'asdf', 'fskdfjslfkjslfjslkfj@jfslkfjsd.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:13:37'),
(58, 5, '', 'Mr.', 'sdfasdf', 'fjskldfjslkfjslkfjslkfjsldfjskldfj@jflskdjf.com', '', '1', 1, '', '', '', '', '', '', '', 0, '', '', '', '', '', '2015-03-17 16:13:54');

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
  ADD CONSTRAINT `pooled_applicants_ibfk_5` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pooled_applicants_ibfk_6` FOREIGN KEY (`application_status_id`) REFERENCES `application_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position_applications`
--
ALTER TABLE `position_applications`
  ADD CONSTRAINT `position_applications_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_applications_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_applications_ibfk_3` FOREIGN KEY (`application_status_id`) REFERENCES `application_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position_clicks`
--
ALTER TABLE `position_clicks`
  ADD CONSTRAINT `position_clicks_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_clicks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position_dwells`
--
ALTER TABLE `position_dwells`
  ADD CONSTRAINT `position_dwells_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_dwells_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position_impressions`
--
ALTER TABLE `position_impressions`
  ADD CONSTRAINT `position_impressions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_impressions_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `saved_searches`
--
ALTER TABLE `saved_searches`
  ADD CONSTRAINT `saved_searches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
