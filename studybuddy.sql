-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 08:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studybuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `in_search_of` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `study_area` varchar(225) NOT NULL,
  `concentration` varchar(225) NOT NULL,
  `topic` varchar(225) NOT NULL,
  `knowledge_level` varchar(225) NOT NULL,
  `purpose` varchar(225) NOT NULL,
  `exam_target` varchar(10) NOT NULL,
  `exam_date` varchar(10) NOT NULL,
  `research_due_date` varchar(10) NOT NULL,
  `more_info` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `removed` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `username`, `in_search_of`, `category`, `study_area`, `concentration`, `topic`, `knowledge_level`, `purpose`, `exam_target`, `exam_date`, `research_due_date`, `more_info`, `date`, `time`, `removed`) VALUES
(1, 'jeremiahtam', 'Study Buddy', 'Vocational_Program', 'Auto_Servicing', 'Auto_Servicing', '', 'Beginner', 'Fun', '', '', '', '', '2017-10-20', '10:59:28', 'no'),
(3, 'jeremiahtam', 'Study Buddy', 'Degree_Program', 'Agriculture', 'Agricultural_Business', '', 'Beginner', 'Fun', '', '', '', 'Fun ', '2017-11-14', '10:50:01', 'no'),
(4, 'jeremiahtam', 'Study Buddy', 'Graduate_Admission_Tests', 'IELTS', 'IELTS', '', 'Beginner', 'Research', '', '', '2017-11-25', 'Fun ', '2017-11-14', '10:52:31', 'no'),
(5, 'jeremiahtam', 'Study Buddy', 'Certificate_Program', 'Business', 'Assistant', '', 'Expert', 'Fun', '', '', '', '', '2017-11-16', '11:45:53', 'no'),
(6, 'preciousebi', 'Study Buddy', 'Graduate_Admission_Tests', 'GMAT', 'GMAT', 'serving food', 'Beginner', 'Fun', '', '', '', '', '2018-01-27', '00:23:57', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `billing_settings`
--

CREATE TABLE `billing_settings` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `account_owner` varchar(250) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `billing_code` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_settings`
--

INSERT INTO `billing_settings` (`id`, `username`, `bank_name`, `account_owner`, `account_number`, `billing_code`, `date`, `time`) VALUES
(1, 'jeremiahtam', 'GTBank', 'J Tam', '0033157747', 'nCIlGF', '2017-10-07', '22:33:48'),
(2, 'johndoe', 'GTBank', 'J Tam', '0033157747', 'eFxjDa', '2017-10-27', '22:49:13'),
(3, 'nuhogambo', '', '', '', '', '2017-10-24', '21:12:59'),
(4, 'preciousebi', '', '', '', '', '2017-11-07', '16:48:53'),
(5, 'desireesite', '', '', '', '', '2017-11-08', '08:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `connection_requests`
--

CREATE TABLE `connection_requests` (
  `id` int(11) NOT NULL,
  `user_from` varchar(250) NOT NULL,
  `user_to` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection_requests`
--

INSERT INTO `connection_requests` (`id`, `user_from`, `user_to`, `status`, `date`, `time`) VALUES
(16, 'preciousebi', 'johndoe', 'connected', '2017-11-07', '16:54:26'),
(96, 'jeremiahtam', 'preciousebi', 'connected', '2018-03-13', '23:26:27'),
(99, 'jeremiahtam', 'johndoe', 'connected', '2018-03-15', '20:57:37'),
(101, 'desireesite', 'johndoe', 'connected', '2018-03-15', '20:58:09'),
(103, 'desireesite', 'preciousebi', 'pending', '2018-03-15', '17:40:33'),
(106, 'desireesite', 'jeremiahtam', 'connected', '2018-03-15', '20:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `user_1` varchar(225) NOT NULL,
  `user_2` varchar(225) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user_1`, `user_2`, `date`, `time`) VALUES
(1, 'jeremiahtam', 'desireesite', '2018-01-31', '21:37:17'),
(2, 'jeremiahtam', 'johndoe', '2018-10-06', '22:03:08'),
(3, 'desireesite', 'preciousebi', '2018-03-24', '20:55:41'),
(4, 'jeremiahtam', 'preciousebi', '2018-04-17', '11:56:35'),
(5, 'johndoe', 'preciousebi', '2018-06-12', '13:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_conversations`
--

CREATE TABLE `deleted_conversations` (
  `id` int(11) NOT NULL,
  `conversation_id` varchar(225) NOT NULL,
  `deleted_by` varchar(225) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_msgs`
--

CREATE TABLE `deleted_msgs` (
  `id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `conv_id` int(11) NOT NULL,
  `deleted_by` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_msgs`
--

INSERT INTO `deleted_msgs` (`id`, `msg_id`, `conv_id`, `deleted_by`, `date`, `time`) VALUES
(1, 32, 4, 'jeremiahtam', '2018-04-17', '11:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `educational_qualifications`
--

CREATE TABLE `educational_qualifications` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `institution` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `degree` varchar(225) NOT NULL,
  `start_date` varchar(225) NOT NULL,
  `end_date` varchar(225) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational_qualifications`
--

INSERT INTO `educational_qualifications` (`id`, `username`, `institution`, `course`, `degree`, `start_date`, `end_date`, `date`, `time`) VALUES
(9, 'jeremiahtam', 'Delta State Politechnic', 'Biochemistry', 'BSc.', '2017-11-18', '2017-11-18', '2017-11-21', '09:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `general_notifications`
--

CREATE TABLE `general_notifications` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `user_from` varchar(225) NOT NULL,
  `in_post` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `created_by` varchar(225) NOT NULL,
  `group_name` varchar(225) NOT NULL,
  `purpose` varchar(225) NOT NULL,
  `group_type` varchar(10) NOT NULL,
  `field_of_study` varchar(225) NOT NULL,
  `topic` varchar(225) NOT NULL,
  `group_rules` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `created_by`, `group_name`, `purpose`, `group_type`, `field_of_study`, `topic`, `group_rules`, `date`, `time`) VALUES
(1, 'jeremiahtam', 'Calculation Group', 'Research', 'Open', 'Science, Mathematics and Computing', 'Quadratic Equations', 'No rubbish talk', '2017-10-21', '21:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `interested_list`
--

CREATE TABLE `interested_list` (
  `id` int(11) NOT NULL,
  `interested_user` varchar(250) NOT NULL,
  `ad_id` varchar(225) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interested_list`
--

INSERT INTO `interested_list` (`id`, `interested_user`, `ad_id`, `date`, `time`) VALUES
(24, 'johndoe', '4', '2018-01-08', '16:35:47'),
(26, 'desireesite', '3', '2018-01-09', '20:01:27'),
(28, 'preciousebi', '3', '2018-01-23', '15:22:55'),
(35, 'jeremiahtam', '', '2018-02-21', '08:26:09'),
(44, 'desireesite', '6', '2018-03-09', '21:00:55'),
(51, 'desireesite', '1', '2018-03-13', '22:45:16'),
(52, 'desireesite', '5', '2018-03-13', '22:45:46'),
(53, 'preciousebi', '4', '2018-03-13', '23:22:41'),
(54, 'preciousebi', '5', '2018-03-14', '09:38:25'),
(55, 'johndoe', '1', '2018-03-25', '22:32:14'),
(56, 'jeremiahtam', '6', '2018-04-17', '11:55:06'),
(57, 'johndoe', '5', '2018-05-27', '16:31:16'),
(58, 'johndoe', '3', '2018-10-26', '18:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `msg_conversations`
--

CREATE TABLE `msg_conversations` (
  `id` int(11) NOT NULL,
  `conv_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `type` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `conv_with` varchar(225) NOT NULL,
  `seen` varchar(5) NOT NULL,
  `date` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_conversations`
--

INSERT INTO `msg_conversations` (`id`, `conv_id`, `msg`, `type`, `username`, `conv_with`, `seen`, `date`, `time`) VALUES
(1, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:53:39'),
(2, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:53:43'),
(3, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:53:46'),
(4, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:53:50'),
(5, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:53:53'),
(6, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:53:58'),
(7, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:54:03'),
(8, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:54:10'),
(9, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:54:29'),
(10, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '21:58:37'),
(11, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:00:19'),
(12, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:08:13'),
(13, 1, 'hello', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:08:28'),
(14, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:10:29'),
(15, 1, 'hello ha', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:13:17'),
(16, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:14:25'),
(17, 1, 'hi', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:14:34'),
(18, 1, 'hiiiiiiiiiiiiiiiii', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-22', '22:16:22'),
(19, 2, 'hi', 'text', 'jeremiahtam', 'johndoe', 'yes', '2017-12-25', '17:53:45'),
(20, 2, 'hey', 'text', 'johndoe', 'jeremiahtam', 'yes', '2017-12-25', '17:54:12'),
(21, 1, 'hey', 'text', 'desireesite', 'jeremiahtam', 'yes', '2017-12-25', '18:07:23'),
(22, 1, 'hi. whats good', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-25', '18:07:38'),
(23, 1, 'everything. hows d xmas', 'text', 'desireesite', 'jeremiahtam', 'yes', '2017-12-25', '18:07:53'),
(24, 1, 'fine.\r\nurs?', 'text', 'jeremiahtam', 'desireesite', 'yes', '2017-12-26', '00:30:52'),
(25, 3, 'hi', 'text', 'desireesite', 'preciousebi', 'yes', '2018-01-03', '14:49:51'),
(26, 2, 'hi', 'text', 'jeremiahtam', 'johndoe', 'yes', '2018-01-04', '23:33:16'),
(27, 4, 'hi', 'text', 'jeremiahtam', 'preciousebi', 'yes', '2018-01-18', '13:53:28'),
(28, 3, 'hey', 'text', 'preciousebi', 'desireesite', 'yes', '2018-01-23', '22:32:31'),
(29, 4, 'what?', 'text', 'preciousebi', 'jeremiahtam', 'yes', '2018-01-23', '22:33:02'),
(30, 4, 'nothing man', 'text', 'jeremiahtam', 'preciousebi', 'yes', '2018-01-30', '23:52:04'),
(31, 1, 'am good fam', 'text', 'desireesite', 'jeremiahtam', 'yes', '2018-01-31', '16:17:15'),
(32, 4, 'just chilling', 'text', 'jeremiahtam', 'preciousebi', 'yes', '2018-01-31', '16:38:35'),
(33, 2, 'how ur folks', 'text', 'jeremiahtam', 'johndoe', 'yes', '2018-01-31', '16:41:41'),
(34, 1, 'really', 'text', 'jeremiahtam', 'desireesite', 'yes', '2018-01-31', '21:37:17'),
(35, 4, 'u?', 'text', 'jeremiahtam', 'preciousebi', 'yes', '2018-02-02', '11:44:35'),
(36, 2, '?', 'text', 'jeremiahtam', 'johndoe', 'yes', '2018-02-02', '11:44:54'),
(37, 4, '?', 'text', 'jeremiahtam', 'preciousebi', 'yes', '2018-02-02', '11:45:17'),
(38, 2, 'we doing good.', 'text', 'johndoe', 'jeremiahtam', 'yes', '2018-02-02', '16:49:34'),
(39, 5, 'sup', 'text', 'johndoe', 'preciousebi', 'yes', '2018-02-05', '14:08:34'),
(40, 2, 'hi', 'text', 'jeremiahtam', 'johndoe', 'yes', '2018-02-10', '13:46:46'),
(41, 3, 'sup', 'text', 'preciousebi', 'desireesite', 'yes', '2018-03-14', '00:08:35'),
(42, 3, 'am good fam.', 'text', 'desireesite', 'preciousebi', 'yes', '2018-03-24', '20:55:41'),
(43, 4, 'hi', 'text', 'preciousebi', 'jeremiahtam', 'yes', '2018-04-17', '11:56:22'),
(44, 4, 'how are you', 'text', 'jeremiahtam', 'preciousebi', 'yes', '2018-04-17', '11:56:35'),
(45, 5, 'hi', 'text', 'johndoe', 'preciousebi', 'yes', '2018-05-27', '16:40:42'),
(46, 5, 'iuhrlgsmkl', 'text', 'johndoe', 'preciousebi', 'yes', '2018-06-12', '13:50:34'),
(47, 2, 'hello', 'text', 'johndoe', 'jeremiahtam', 'no', '2018-07-18', '17:08:20'),
(48, 2, 'hi', 'text', 'johndoe', 'jeremiahtam', 'no', '2018-09-19', '12:11:44'),
(49, 2, 'hello', 'text', 'johndoe', 'jeremiahtam', 'no', '2018-10-06', '22:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `notification_settings`
--

CREATE TABLE `notification_settings` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `requests` varchar(3) NOT NULL,
  `comments` varchar(3) NOT NULL,
  `replies` varchar(3) NOT NULL,
  `messages` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_settings`
--

INSERT INTO `notification_settings` (`id`, `username`, `requests`, `comments`, `replies`, `messages`, `date`, `time`) VALUES
(1, 'jeremiahtam', 'yes', 'yes', 'yes', 'yes', '2017-10-08', '13:35:38'),
(2, 'johndoe', 'yes', 'no', 'no', 'no', '2018-10-06', '22:03:59'),
(3, 'nuhogambo', 'yes', 'yes', 'yes', 'yes', '2017-10-24', '21:12:59'),
(4, 'preciousebi', 'yes', 'yes', 'yes', 'yes', '2017-11-07', '16:48:53'),
(5, 'desireesite', 'no', 'yes', 'yes', 'yes', '2017-12-22', '17:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_settings`
--

CREATE TABLE `privacy_settings` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `email` varchar(8) NOT NULL,
  `age` varchar(8) NOT NULL,
  `location` varchar(8) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy_settings`
--

INSERT INTO `privacy_settings` (`id`, `username`, `phone`, `email`, `age`, `location`, `date`, `time`) VALUES
(1, 'jeremiahtam', 'private', 'private', 'public', 'public', '2018-01-03', '20:53:19'),
(2, 'johndoe', 'private', 'public', 'public', 'public', '2018-07-31', '12:06:35'),
(3, 'nuhogambo', 'public', 'public', 'public', 'public', '2017-10-24', '21:12:59'),
(4, 'preciousebi', 'public', 'public', 'public', 'public', '2017-11-07', '16:48:53'),
(5, 'desireesite', 'public', 'public', 'public', 'public', '2017-11-08', '08:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `request_notifications`
--

CREATE TABLE `request_notifications` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `user_from` varchar(225) NOT NULL,
  `request_id` int(11) NOT NULL,
  `responded` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_notifications`
--

INSERT INTO `request_notifications` (`id`, `username`, `type`, `user_from`, `request_id`, `responded`, `date`, `time`) VALUES
(9, 'jeremiahtam', 'connection', 'johndoe', 9, 'yes', '2017-10-27', '23:14:28'),
(12, 'jeremiahtam', 'connection', 'johndoe', 12, 'yes', '2017-10-27', '23:15:17'),
(13, 'jeremiahtam', 'connection', 'johndoe', 13, 'yes', '2017-11-01', '23:39:56'),
(16, 'johndoe', 'connection', 'preciousebi', 16, 'yes', '2017-11-07', '16:53:26'),
(17, 'jeremiahtam', 'connection', 'preciousebi', 17, 'yes', '2017-11-07', '16:53:42'),
(75, 'desireesite', 'connection', 'johndoe', 75, 'yes', '2017-11-08', '22:03:36'),
(78, 'johndoe', 'connection', 'desireesite', 78, 'yes', '2017-11-08', '22:29:57'),
(89, 'jeremiahtam', 'connection', 'preciousebi', 89, 'yes', '2018-01-26', '21:49:02'),
(96, 'preciousebi', 'connection', 'jeremiahtam', 96, 'yes', '2018-01-30', '23:42:48'),
(98, 'desireesite', 'connection', 'jeremiahtam', 98, 'yes', '2018-01-31', '08:32:02'),
(99, 'johndoe', 'connection', 'jeremiahtam', 99, 'yes', '2018-01-31', '08:32:12'),
(100, 'desireesite', 'connection', 'preciousebi', 100, 'yes', '2018-03-13', '23:15:58'),
(101, 'johndoe', 'connection', 'desireesite', 101, 'yes', '2018-03-15', '15:53:07'),
(103, 'preciousebi', 'connection', 'desireesite', 103, 'no', '2018-03-15', '17:40:33'),
(106, 'jeremiahtam', 'connection', 'desireesite', 106, 'yes', '2018-03-15', '17:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `bio` text NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `cover_photo` varchar(2000) NOT NULL,
  `date_of_birth` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `passwordreset` varchar(100) NOT NULL,
  `removed` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phone`, `password`, `location`, `bio`, `profile_pic`, `cover_photo`, `date_of_birth`, `gender`, `date`, `time`, `passwordreset`, `removed`) VALUES
(2, 'Jeremiah Esite', 'jeremiahtam', 'jeremiahtam@yahoo.com', '07062290287', '5f4dcc3b5aa765d61d8327deb882cf99', '12 Ekenwa Road, Benin City, Nigeria', 'I am a guy who is passionate about studying. I have a bachellors degree in Applied Mathematics.', 'jeremiahtam-AYPwqEUs8etVl3r.jpg', 'jeremiahtam-1514903790.jpg', '1993-03-05', 'Male', '2017-09-19', '21:31:42', '', 'no'),
(3, 'John Doe', 'johndoe', 'john@yahoo.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', 'johndoe-1510173919.jpg', 'johndoe-1510921083.jpg', '1993-03-05', 'Female', '2017-10-15', '19:05:37', '', 'no'),
(4, 'Precious Ebi', 'preciousebi', 'preciousebi@yahoo.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', 'preciousebi-Obq68zAUWewGkZM.jpg', 'preciousebi-1513263713.jpg', '', '', '2017-11-07', '16:48:53', '', 'no'),
(5, 'Desire Esite', 'desireesite', 'desireesite@yahoo.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', 'desireesite-rm5yfPjC6oRDw9W.jpg', 'desireesite-1513265808.jpg', '', '', '2017-11-08', '08:45:58', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `organization_name` varchar(225) NOT NULL,
  `position_held` varchar(225) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `currently_there` varchar(5) NOT NULL,
  `date` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `username`, `organization_name`, `position_held`, `start_date`, `end_date`, `currently_there`, `date`, `time`) VALUES
(1, 'jeremiahtam', 'NPDC', 'Manager', '2017-09-22', '', 'yes', '2017-11-22', '11:42:13'),
(2, 'jeremiahtam', 'NNPC', 'Manager', '2017-09-22', '', 'yes', '2017-11-22', '11:26:37'),
(3, '', '', '', '', '', '', '2018-10-23', '03:15:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_settings`
--
ALTER TABLE `billing_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connection_requests`
--
ALTER TABLE `connection_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_conversations`
--
ALTER TABLE `deleted_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_msgs`
--
ALTER TABLE `deleted_msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_qualifications`
--
ALTER TABLE `educational_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_notifications`
--
ALTER TABLE `general_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interested_list`
--
ALTER TABLE `interested_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg_conversations`
--
ALTER TABLE `msg_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_settings`
--
ALTER TABLE `notification_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_settings`
--
ALTER TABLE `privacy_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_notifications`
--
ALTER TABLE `request_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD FULLTEXT KEY `fullname` (`fullname`,`username`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing_settings`
--
ALTER TABLE `billing_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `connection_requests`
--
ALTER TABLE `connection_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deleted_conversations`
--
ALTER TABLE `deleted_conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deleted_msgs`
--
ALTER TABLE `deleted_msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educational_qualifications`
--
ALTER TABLE `educational_qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `general_notifications`
--
ALTER TABLE `general_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interested_list`
--
ALTER TABLE `interested_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `msg_conversations`
--
ALTER TABLE `msg_conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `notification_settings`
--
ALTER TABLE `notification_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privacy_settings`
--
ALTER TABLE `privacy_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_notifications`
--
ALTER TABLE `request_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
