-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db646734120.db.1and1.com
-- Generation Time: Sep 15, 2018 at 04:43 PM
-- Server version: 5.5.60-0+deb7u1-log
-- PHP Version: 5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db646734120`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE latin1_general_ci,
  `url` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Club website',
  `contact_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `contact_email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_count` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `description`, `url`, `contact_name`, `contact_email`, `contact_phone`, `user_count`, `created`, `modified`) VALUES
(1, 'Luton Someries', 'Luton Someries meet at 07.15 Friday morning at the Chiltern Hotel.  We were Chartered in 1993 and currently have about 25 members.', 'www.lutonsomeries.org.uk', 'Craig Fisher', 'some@lsrc.com', '0123456789', 4, '2016-09-10 16:54:46', '2016-12-05 18:54:03'),
(2, 'Luton', '', '', '', '', '', 0, '2016-09-10 16:54:55', '2016-09-26 18:25:24'),
(3, 'Milton Keynes Grand Union', '', '', '', '', '', 0, '2016-09-10 16:55:04', '2016-09-10 16:55:04'),
(4, 'Luton Chiltern', '', '', '', '', '', 1, '2016-09-10 16:55:14', '2017-05-04 17:02:17'),
(7, 'Luton North', '', '', '', '', '', 0, '2016-09-24 16:19:40', '2016-09-26 18:24:50'),
(6, 'Ampthill', 'Ampthill ', '', '', '', '', 0, '2016-09-20 20:34:18', '2016-09-20 20:34:18'),
(8, 'Buckingham', 'We''re a friendly and active Rotary Club in the market town of Buckingham.  Lots of professionals and some great local businesses, not least the University of Buckingham and Silverstone Business Park up by the F1 track, there are many ''petrolheads'' in the Club.   ', 'www.buckinghamrotary.co.uk', 'Jane Mordue', 'ccsf.betts@btconnect.com', '07740701927', 2, '2016-09-25 09:03:32', '2017-04-21 08:38:25'),
(9, 'Amersham', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(10, 'Amwell', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(11, 'Aylesbury', 'Founded in 1924, this is not only one of the oldest Clubs but one of the most social!  From Christmas, to Burns Night, to St Georges and the President''s summer BBQ members know how to enjoy themselves.  There''s also plenty to support the local community too, from the Santa Float to supporting young professionals in Aylesbury as well as fund-raising through events.  ', 'https://www.facebook.com/AylesburyHundredsRotary', 'Robert Kernot', 'robertkernot@gmail.com', '', 1, '2016-09-26 18:35:34', '2017-03-13 20:36:38'),
(12, 'Roger King', NULL, 'www.aylesbury100srotary.org', 'Roger ', 'roger.at.rotary@ntlworld.com', '01296482812', 0, '2016-09-26 18:35:34', '2017-01-09 08:54:57'),
(13, 'Baldock', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(14, 'Barton Le Clay', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(15, 'Bedford', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(16, 'Bedford Castle', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(17, 'Bedford de Parys', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(18, 'Bedford Park', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(19, 'Berkhamsted Bulbourne', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(20, 'Biggleswade', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(21, 'Biggleswade Ivel', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(22, 'Bletchley', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(23, 'Brookmans Park', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(24, 'Chesham', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(25, 'Dunstable', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(26, 'Dunstable Downs', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(27, 'Flitwick Vale', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(28, 'Great Missenden & D', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(29, 'Harpenden Village', '', '', '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 17:50:24'),
(30, 'Hatfield', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(31, 'Hemel Hempstead', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(32, 'Hertford', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(33, 'Hertford Shires', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(34, 'Hitchin', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(35, 'Hitchin Mimram', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(36, 'Hitchin Priory', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(37, 'Hitchin Tilehouse', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(38, 'Hoddesdon', '', '', '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 17:51:55'),
(39, 'Kempston', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(40, 'Leighton Lindslade', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(41, 'Letchworth Garden City', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(42, 'Letchworth Howard', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(43, 'Milton Keynes', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(44, 'Milton Keynes  Grand Union', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(45, 'Newport Pagnell', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(46, 'Potters Bar', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(47, 'Rickmansworth', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(48, 'St Albans', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(49, 'St Albans Priory', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(50, 'St Albans Verulamium', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(51, 'Sandy', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(52, 'Stevenage', '', '', '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 17:56:49'),
(53, 'Stevenage Grange', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(54, 'The Brickhills', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(55, 'Ware', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(56, 'Watford', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(57, 'Welwyn Garden City', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(58, 'Wendover & District', NULL, NULL, '', '', '', 1, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(59, 'Winslow', NULL, NULL, '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 18:35:34'),
(60, 'Wolverton & Stony Stratford', '', '', '', '', '', 0, '2016-09-26 18:35:34', '2016-09-26 17:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `clubs_skills`
--

CREATE TABLE IF NOT EXISTS `clubs_skills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Unique per club/skill',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_key` (`skill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=186 ;

--
-- Dumping data for table `clubs_skills`
--

INSERT INTO `clubs_skills` (`id`, `club_id`, `skill_id`, `comment`, `created`) VALUES
(9, 6, 1, NULL, '0000-00-00 00:00:00'),
(168, 8, 46, NULL, '2016-09-27 20:14:59'),
(166, 8, 43, NULL, '2016-09-27 20:14:59'),
(167, 8, 44, NULL, '2016-09-27 20:14:59'),
(26, 3, 1, NULL, '2016-09-24 16:21:01'),
(184, 4, 113, NULL, '2017-05-04 17:02:17'),
(185, 4, 112, NULL, '2017-05-04 17:02:17'),
(183, 4, 80, NULL, '2017-05-04 16:49:17'),
(55, 8, 14, NULL, '2016-09-26 17:47:58'),
(54, 8, 13, NULL, '2016-09-26 17:47:58'),
(53, 8, 12, NULL, '2016-09-26 17:47:58'),
(45, 8, 8, NULL, '2016-09-26 17:42:47'),
(46, 29, 8, NULL, '2016-09-26 17:42:47'),
(47, 38, 8, NULL, '2016-09-26 17:42:47'),
(136, 52, 26, NULL, '2016-09-26 17:56:49'),
(49, 55, 8, NULL, '2016-09-26 17:42:47'),
(50, 60, 8, NULL, '2016-09-26 17:42:47'),
(135, 52, 23, NULL, '2016-09-26 17:56:49'),
(52, 29, 11, NULL, '2016-09-26 17:44:35'),
(178, 8, 108, NULL, '2016-12-05 18:48:22'),
(57, 8, 16, NULL, '2016-09-26 17:47:58'),
(58, 8, 17, NULL, '2016-09-26 17:47:58'),
(59, 8, 18, NULL, '2016-09-26 17:47:58'),
(60, 8, 22, NULL, '2016-09-26 17:47:58'),
(61, 8, 25, NULL, '2016-09-26 17:47:58'),
(62, 8, 31, NULL, '2016-09-26 17:47:58'),
(63, 8, 33, NULL, '2016-09-26 17:47:58'),
(64, 8, 36, NULL, '2016-09-26 17:47:58'),
(65, 8, 41, NULL, '2016-09-26 17:47:58'),
(66, 8, 42, NULL, '2016-09-26 17:47:58'),
(67, 8, 49, NULL, '2016-09-26 17:47:58'),
(68, 8, 50, NULL, '2016-09-26 17:47:58'),
(69, 8, 51, NULL, '2016-09-26 17:47:58'),
(70, 8, 54, NULL, '2016-09-26 17:47:58'),
(71, 8, 65, NULL, '2016-09-26 17:47:58'),
(72, 8, 68, NULL, '2016-09-26 17:47:58'),
(73, 8, 72, NULL, '2016-09-26 17:47:58'),
(74, 8, 78, NULL, '2016-09-26 17:47:58'),
(75, 8, 79, NULL, '2016-09-26 17:47:58'),
(76, 8, 80, NULL, '2016-09-26 17:47:58'),
(77, 8, 83, NULL, '2016-09-26 17:47:58'),
(78, 8, 85, NULL, '2016-09-26 17:47:58'),
(79, 8, 88, NULL, '2016-09-26 17:47:58'),
(80, 8, 89, NULL, '2016-09-26 17:47:58'),
(81, 8, 90, NULL, '2016-09-26 17:47:58'),
(82, 8, 92, NULL, '2016-09-26 17:47:58'),
(83, 8, 93, NULL, '2016-09-26 17:47:58'),
(84, 8, 96, NULL, '2016-09-26 17:47:58'),
(85, 8, 101, NULL, '2016-09-26 17:47:58'),
(86, 8, 102, NULL, '2016-09-26 17:47:58'),
(87, 8, 106, NULL, '2016-09-26 17:47:58'),
(88, 8, 105, NULL, '2016-09-26 17:47:58'),
(89, 29, 12, NULL, '2016-09-26 17:50:24'),
(90, 29, 30, NULL, '2016-09-26 17:50:24'),
(91, 29, 33, NULL, '2016-09-26 17:50:24'),
(92, 29, 40, NULL, '2016-09-26 17:50:24'),
(93, 29, 43, NULL, '2016-09-26 17:50:24'),
(94, 29, 47, NULL, '2016-09-26 17:50:24'),
(95, 29, 51, NULL, '2016-09-26 17:50:24'),
(96, 29, 52, NULL, '2016-09-26 17:50:24'),
(97, 29, 54, NULL, '2016-09-26 17:50:24'),
(98, 29, 59, NULL, '2016-09-26 17:50:24'),
(99, 29, 64, NULL, '2016-09-26 17:50:24'),
(100, 29, 66, NULL, '2016-09-26 17:50:24'),
(101, 29, 72, NULL, '2016-09-26 17:50:24'),
(102, 29, 79, NULL, '2016-09-26 17:50:24'),
(103, 29, 80, NULL, '2016-09-26 17:50:24'),
(104, 29, 84, NULL, '2016-09-26 17:50:24'),
(105, 29, 91, NULL, '2016-09-26 17:50:24'),
(106, 29, 92, NULL, '2016-09-26 17:50:24'),
(107, 29, 98, NULL, '2016-09-26 17:50:24'),
(108, 29, 100, NULL, '2016-09-26 17:50:24'),
(109, 29, 101, NULL, '2016-09-26 17:50:24'),
(110, 29, 105, NULL, '2016-09-26 17:50:24'),
(111, 38, 36, NULL, '2016-09-26 17:51:55'),
(112, 38, 49, NULL, '2016-09-26 17:51:55'),
(113, 38, 51, NULL, '2016-09-26 17:51:55'),
(114, 38, 79, NULL, '2016-09-26 17:51:55'),
(115, 38, 77, NULL, '2016-09-26 17:51:55'),
(116, 38, 100, NULL, '2016-09-26 17:51:55'),
(117, 38, 101, NULL, '2016-09-26 17:51:55'),
(182, 4, 111, NULL, '2017-04-21 09:51:12'),
(181, 11, 110, NULL, '2017-04-21 08:43:44'),
(180, 11, 109, NULL, '2017-04-21 08:41:58'),
(179, 1, 108, NULL, '2016-12-05 18:54:03'),
(177, 1, 54, NULL, '2016-11-28 23:29:13'),
(176, 1, 41, NULL, '2016-11-28 23:29:13'),
(175, 1, 39, NULL, '2016-11-28 23:29:13'),
(174, 1, 33, NULL, '2016-11-28 23:29:13'),
(173, 1, 32, NULL, '2016-11-28 23:29:13'),
(172, 1, 25, NULL, '2016-11-28 23:29:13'),
(171, 1, 103, NULL, '2016-11-28 23:24:52'),
(170, 1, 4, NULL, '2016-11-28 22:44:18'),
(169, 1, 15, NULL, '2016-11-28 22:44:18'),
(137, 52, 30, NULL, '2016-09-26 17:56:49'),
(138, 52, 41, NULL, '2016-09-26 17:56:49'),
(139, 52, 49, NULL, '2016-09-26 17:56:49'),
(140, 52, 51, NULL, '2016-09-26 17:56:49'),
(141, 52, 55, NULL, '2016-09-26 17:56:49'),
(142, 52, 61, NULL, '2016-09-26 17:56:49'),
(143, 52, 66, NULL, '2016-09-26 17:56:49'),
(144, 52, 73, NULL, '2016-09-26 17:56:49'),
(145, 52, 75, NULL, '2016-09-26 17:56:49'),
(146, 52, 79, NULL, '2016-09-26 17:56:49'),
(147, 52, 80, NULL, '2016-09-26 17:56:49'),
(148, 52, 81, NULL, '2016-09-26 17:56:49'),
(149, 52, 83, NULL, '2016-09-26 17:56:49'),
(150, 52, 84, NULL, '2016-09-26 17:56:49'),
(151, 52, 88, NULL, '2016-09-26 17:56:49'),
(152, 52, 89, NULL, '2016-09-26 17:56:49'),
(153, 52, 91, NULL, '2016-09-26 17:56:49'),
(154, 52, 105, NULL, '2016-09-26 17:56:49'),
(155, 60, 26, NULL, '2016-09-26 17:58:03'),
(156, 60, 33, NULL, '2016-09-26 17:58:03'),
(157, 60, 36, NULL, '2016-09-26 17:58:03'),
(158, 60, 42, NULL, '2016-09-26 17:58:03'),
(159, 60, 51, NULL, '2016-09-26 17:58:03'),
(160, 60, 54, NULL, '2016-09-26 17:58:03'),
(161, 60, 66, NULL, '2016-09-26 17:58:03'),
(162, 60, 75, NULL, '2016-09-26 17:58:03'),
(163, 60, 91, NULL, '2016-09-26 17:58:03'),
(164, 60, 98, NULL, '2016-09-26 17:58:03'),
(165, 60, 100, NULL, '2016-09-26 17:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=114 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `description`, `user_id`, `approved`, `created`, `modified`) VALUES
(1, 'Bucket Shaking', 'Shaking a bucket', 1, 0, '2016-09-10 16:56:16', '2016-09-24 16:24:09'),
(4, 'Database generation', 'Building web databases. Online portals. Other online presences.', 7, 1, '2016-09-20 21:50:22', '2016-11-28 23:23:55'),
(8, 'Admin skills', '', 4, 1, '2016-09-26 18:31:27', '2017-04-21 10:03:16'),
(9, 'Art/Illustration', '', 4, 1, '2016-09-26 18:31:27', '2016-11-28 21:46:20'),
(10, 'Asset transfer', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 21:46:28'),
(11, 'Building maintenance advice', '', 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:24'),
(12, 'Business planning', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:25'),
(13, 'Carer', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:27'),
(14, 'Catering', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:28'),
(15, 'Charity organisation', '', 3, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:29'),
(16, 'Children', 'Young Carers Youth Club', 4, 1, '2016-09-26 18:31:27', '2017-04-21 10:19:55'),
(17, 'Classic cars', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:36'),
(18, 'Coaching', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:39'),
(19, 'Commercial property consult', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:42'),
(20, 'Compliance', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:54'),
(21, 'Computer literacy', '', 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:56'),
(22, 'Counselling', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:00'),
(23, 'Creative writing', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:39'),
(24, 'Cycling', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:41'),
(25, 'Disclosure & Barring checked', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:46'),
(26, 'Disability', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:45'),
(27, 'DIY', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:48'),
(28, 'Driving licence HGV LGV PCV', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:50'),
(29, 'Education', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:51'),
(30, 'Elderly', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:53'),
(31, 'Emergency', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:54'),
(32, 'Employment - preparing for work', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:56'),
(33, 'Engineer', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:22:58'),
(34, 'Entrepreneurship', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:23:00'),
(35, 'Ethics for business', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:23:02'),
(36, 'Event management', '', 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:23:04'),
(37, 'Facilitating meetings', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:23:15'),
(38, 'Farming', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:51:48'),
(39, 'Firework displays', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:23:12'),
(40, 'Financial', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:51:50'),
(41, 'First Aid', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:23:09'),
(42, 'Fund-raising', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:51:52'),
(43, 'Gardening advice', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:51:54'),
(44, 'Gliding', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:51:57'),
(45, 'Governance', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:05'),
(46, 'Global Grants', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:01'),
(47, 'Health & Safety', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:52:11'),
(48, 'HGV', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:12'),
(49, 'Hobbies - golf?', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:14'),
(50, 'International aid work', '', 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:16'),
(51, 'Interview skills', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:17'),
(52, 'IT skills', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:22'),
(53, 'Jaipur Limb', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:23'),
(54, 'Languages', NULL, 4, 1, '2016-09-26 18:31:27', '2016-11-28 23:23:20'),
(55, 'Leadership', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:26'),
(56, 'Legal advice', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:29'),
(57, 'LGV', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:32'),
(58, 'Literacy support', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:36'),
(59, 'Management', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:39'),
(60, 'Manual practical skills', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:43'),
(61, 'Marketing', NULL, 4, 1, '2016-09-26 18:31:27', '2017-04-21 09:53:45'),
(62, 'Media skills', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(63, 'Mediation', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(64, 'Meetings', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(65, 'Membership, Rotary', '', 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:27:09'),
(66, 'Mentoring', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(67, 'Minibus', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(68, 'Music', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(69, 'Nursing', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(70, 'PAT testing', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(71, 'PCV', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(72, 'Photography', '', 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:27:23'),
(73, 'Planning', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(74, 'Projects', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(75, 'Policy or report writing', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(76, 'Presentation skills training', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(77, 'Public speaking', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(78, 'PR', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(79, 'Professional', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(80, 'Project management', '', 4, 1, '2016-09-26 18:31:27', '2017-04-21 10:07:37'),
(81, 'Rotary', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(82, 'Sales and Networking', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(83, 'Schools liaison', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(84, 'Scientific research', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(85, 'Secretarial', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(86, 'Shelterbox', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(87, 'Social media', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(88, 'Social activities, fellowship', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(89, 'Strategy', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(90, 'Swimathons', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(91, 'Talks, giving', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(92, 'Teaching', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(93, 'Team building', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(94, 'Technology', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(95, 'Time management', '', 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:27:37'),
(96, 'Trades', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(97, 'TradeAid', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(98, 'Training ', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(99, 'Travel', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(100, 'Treasurer', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(101, 'Trustee', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(102, 'Values of Rotary', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(103, 'Web design', '', 7, 0, '2016-09-26 18:31:27', '2016-11-28 23:24:13'),
(104, 'Web editorship', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(105, 'Youth work', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(106, 'Youth - Rotary schemes', NULL, 4, 0, '2016-09-26 18:31:27', '2016-09-26 18:31:27'),
(107, 'Adding Skills', 'This is the description', 3, 1, '2016-11-29 00:01:31', '2017-04-21 09:52:19'),
(108, 'Car Maintenance', 'Looking after cars and fixing them', 12, 1, '2016-12-05 18:46:31', '2016-12-05 18:52:25'),
(109, 'Brewing', 'Everything to do with brewing beer', 4, 1, '2017-04-21 08:41:58', '2017-04-21 09:52:22'),
(110, 'Hypnotherapy', 'Using hypnosis to help people get their lives back on track', 4, 1, '2017-04-21 08:43:44', '2017-04-21 09:53:15'),
(111, 'Gynaecology', 'Treatment of illness to do with having babies', 4, 1, '2017-04-21 09:51:12', '2017-04-21 09:51:40'),
(112, 'Dental Technician', 'Dental technicians create crowns, bridges and dentures after receiving an impression of the patient''s teeth from a dentist. There are three main departments in a dental lab: Crown & Bridge, Porcelain, and Dentures.', 14, 0, '2017-05-04 16:53:11', '2017-05-04 16:53:11'),
(113, 'Accounting Services', ' Basic day-to-day bookkeeping, tax services, auditing, management consulting and fraud investigations', 14, 0, '2017-05-04 17:01:10', '2017-05-04 17:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `club_id` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL COMMENT 'Approved by admin',
  `club_admin` tinyint(1) NOT NULL COMMENT 'Able to approve club users',
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `admin` tinyint(1) NOT NULL COMMENT 'Admin account',
  PRIMARY KEY (`id`),
  KEY `club_key` (`club_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `club_id`, `approved`, `club_admin`, `username`, `email`, `password`, `created`, `modified`, `admin`) VALUES
(11, 'Bloggs', 'Fred', 1, 1, 0, 'fredbloggs', 'fred@acme.com', 'qwerty', '2016-11-28 23:48:35', '2016-11-28 23:48:35', 0),
(2, 'North', 'Luton', 5, 1, 1, 'northperson', 'user@lutonnorth.com', 'plokij', '2016-09-20 20:16:46', '2016-09-22 18:31:08', 0),
(3, 'Fisher', 'Craig', 1, 1, 1, 'craigfisher', 'cf@lsrc.com', '$2y$10$.XO.yHCtcCEE4CBpIENS4OK11aqorunfVfu5bM4mG5q97GpvttfNi', '2016-09-20 21:49:43', '2016-11-28 21:48:17', 0),
(4, 'Mordue', 'Jane', 8, 1, 1, 'janemordue', 'jane@mordue.email', '$2y$10$b7ec0ZvZMi0iCEOUpQFh7.NR0T8dC6FUa/QTDOu6aC3CO7qbgpgmG', '2016-09-26 16:28:42', '2017-01-03 10:43:31', 1),
(10, 'Pattenden', 'Steve', 1, 0, 0, 'stevepat', 'steve@doublestravel.co.uk', '$2y$10$7cKwjtCmCq7lUrJ9KV4vxO0VPn2m2fesHsg.BbwJCoBlSpcw8Qxyi', '2016-11-28 23:11:46', '2016-12-01 12:04:41', 0),
(7, 'User', 'Admin', 1, 1, 1, 'crayfishuk', 'crayfishuk@gmail.com', '$2y$10$Knt.hiME7/rZ2anTL61rlOGfvOKiUjr5Xk71nZUG8DhlSoRlotGQS', '2016-10-23 23:04:08', '2016-11-28 23:32:50', 1),
(12, 'Harding', 'Janis', 8, 1, 1, 'janisharding', 'janis@somewhere.com', '$2y$10$kE3ntwLGl2PBBnMpIkt0UOMcZ7ousgLaEeBQGQQyUYvbWlsch3YDG', '2016-12-05 18:42:34', '2016-12-05 18:44:38', 0),
(13, 'Kernot', 'Robert', 11, 1, 1, 'robertkernot', 'robertkernot@gmail.com', '$2y$10$XQijQs0GXOKkdYl3aIOnBOumJUj2lUhn2Xwtk6KyFrD0SdhH2iUkC', '2017-01-03 10:14:42', '2017-04-21 08:44:59', 0),
(14, 'Tony', 'Lenton', 4, 1, 1, 'tonylenton', 'tony.lenton@tiscali.co.uk', '$2y$10$D686NmGDdDdBKd13Fd2H7e2x8E9RG0H2FJP0QLMaL5wPM5DhURuXi', '2017-04-21 10:48:07', '2017-04-21 10:48:07', 0),
(15, 'Law', 'Cheryl', 58, 1, 1, 'cheryllaw', 'littlecupcakeschildcare@gmail.com', '$2y$10$EpBElJqitKXZB5iXzS/wvu38M2z56Yt5ynsmuiaPMqgpa.bpdpKHO', '2018-05-04 08:20:26', '2018-05-04 08:20:26', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
