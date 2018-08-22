-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2018 at 10:41 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(122) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `image`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', '1', '2018-06-27 04:46:22', '2018-06-28 07:53:08'),
(2, 'Travel Desk', 'traveldesk@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', '2', '2018-06-27 04:46:22', '2018-06-28 07:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `booking_to` varchar(255) DEFAULT NULL,
  `booking_from` varchar(255) DEFAULT NULL,
  `booking_msg` longtext,
  `return_to` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `current_date_time` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `voucher` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `arrival_date` varchar(255) DEFAULT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `venue_location` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cancellation` int(11) NOT NULL DEFAULT '0',
  `invoice_id` varchar(255) DEFAULT NULL,
  `confirmation` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `booking_to`, `booking_from`, `booking_msg`, `return_to`, `email`, `name`, `current_date_time`, `return_date`, `voucher`, `place`, `arrival_date`, `check_in`, `check_out`, `venue_location`, `city`, `cancellation`, `invoice_id`, `confirmation`, `status`, `message`, `created_at`) VALUES
(19, '', NULL, ' This is the test message. ', NULL, 'user@gmail.com', NULL, '', NULL, '1510358.jpg', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:23:04'),
(20, '', NULL, ' This is the test message. ', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:23:11'),
(21, '', NULL, ' This is the test message. ', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:23:28'),
(22, '', NULL, ' This is the test message. ', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:23:35'),
(23, '', NULL, ' hlo', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:24:20'),
(24, '', NULL, ' hlo', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:24:30'),
(25, '', NULL, ' hlo', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:25:54'),
(26, '', NULL, ' Test Message', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:26:15'),
(27, '', NULL, ' hlo how r u', NULL, 'user@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 07:28:01'),
(28, '', NULL, 'dbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', NULL, '2sumitnath@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 10:02:23'),
(29, '', NULL, 'dbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', NULL, '2sumitnath@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 10:02:31'),
(30, '', NULL, 'dbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', NULL, '2sumitnath@gmail.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 10:02:45'),
(33, '', NULL, ' aDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', NULL, '2sumitnath@gmail.com', NULL, '', NULL, '2.png', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '2018-06-28 10:37:04'),
(34, '', NULL, '   8jokljikuho\r\nylgybkjkyguybu cfhfdhdfhdfh\r\n\r\n\r\naskfvjsafjsakjsagsalfasf', NULL, 'sahutech8@gmail.com', '', '', NULL, NULL, '', '', '', '', '', '', 1, NULL, NULL, 0, NULL, '2018-06-29 06:35:10'),
(52, NULL, NULL, ' gk fdfdsfgdsfdsfdsfdsfdsf', NULL, '', 'Shubham Sahu', NULL, NULL, NULL, NULL, 'gfkj', 'gk', 'jfk', 'jk', 'efdljfgdkjsgk', 1, NULL, NULL, 0, NULL, '2018-06-30 09:12:54'),
(53, NULL, NULL, ' testing strretretreey', NULL, 'sahutech8@gmail.com', 'Shubham Sahu', NULL, NULL, NULL, NULL, '10/2/2017', '07/04/2018', '08/02/2018', 'testing', 'Allahabad', 1, NULL, NULL, 0, NULL, '2018-06-30 13:34:05'),
(54, NULL, NULL, '      adfdsfdsfdsfdsfwefewfewfewewrewrewrewrsfdsdfdsfdsfdsfdsefewfewfw\r\nghdfghfghfghfgd\r\n\r\ndsfkhdskjfgdks', NULL, 'sahutech8@gmail.com', 'Shubham Sahu', NULL, NULL, NULL, NULL, 'g', '07/12/2018', '07/19/2018', 'testing', 'alld', 1, NULL, NULL, 0, NULL, '2018-06-30 13:43:54'),
(55, NULL, NULL, '  sdfdsfdsfdsfdsffbxcbcvbcxzvgcxzxbcxbccxbcxb111111111111111111111111111111', NULL, 'sahutech8@gmail.com', 'Shubham Sahu', NULL, NULL, NULL, NULL, 'dsfdsfdsfdsf', '07/18/2018', '07/20/2018', 'dfdfdsf', 'fsfdsfdsdsf', 0, NULL, NULL, 0, NULL, '2018-06-30 14:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `name`, `email`, `phone`, `message`) VALUES
(2, 'Shubham Sahu', 'shubhamsahu707@gmail.com', '324324324', 'sadgasdiusad');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `adhar_no` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_proof` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '3',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `adhar_no`, `image`, `name`, `id_proof`, `password`, `mobile`, `username`, `address`, `pancard`, `department`, `designation`, `token`, `status`, `ip_address`, `role`, `updated_at`) VALUES
(1, '122344566755', 'user.jpg', 'sum', '', 'e10adc3949ba59abbe56e057f20f883e', '7889990999', 'sumit.nath@iflextech.in', '', '3456789900', 'atext', 'texzt', NULL, 1, NULL, 3, '2018-06-28 05:51:36'),
(3, '214214214214', NULL, 'shubham', '', '827ccb0eea8a706c4c34a16891f84e7b', '3243243243', 'shubhamsahu707@gmail.com', '', '1242142121', 'asfsdfdsfgdsgg', 'dsfdsfdsgdsgds', NULL, 0, NULL, 3, '2018-06-26 14:38:57'),
(4, '666666666665', NULL, 'sumit', '', 'e10adc3949ba59abbe56e057f20f883e', '0009999999', 'sumitnath.edu@gmail.com', '', 'vguit77t', 'ddd', 'aasss', NULL, 1, NULL, 3, '2018-06-28 10:55:46'),
(26, 'gwhdwbhdcj', 'accountant 1.jpg', 'Npahi', '', '09f99bb94c767d6ea35362835a67a3f5', '123211222332', 'nirojkumarpahi@gmail.com', '', 'bcfjksbefk', 'hgdhnx', 'hsnsnsn ', NULL, 0, NULL, 3, '2018-06-27 12:12:27'),
(27, '11111111111', NULL, 'Abhishek Singhal', '', '5f4dcc3b5aa765d61d8327deb882cf99', '9810187517', 'user@gmail.com', '', '1111111', 'fdfjwfw', 'qdqddwe', NULL, 1, NULL, 3, '2018-06-27 14:20:08'),
(28, '345678909876', NULL, 'sumit nath ', '', 'e10adc3949ba59abbe56e057f20f883e', '', 'sumitnath.mrkt@gmail.com', '', 'advv345555', 'aaaaa', 'aaaaaaa', NULL, 0, NULL, 3, '2018-06-27 14:34:00'),
(29, '111111111111', NULL, 'kofo winchik', '', 'd41d8cd98f00b204e9800998ecf8427e', '6103502713', 'iflextechnologies7@gmail.com', '', 'qqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '', NULL, 0, NULL, 3, '2018-06-27 14:36:30'),
(30, '111111111111', NULL, 'kofo winchik', '', 'd41d8cd98f00b204e9800998ecf8427e', '6103502713', 'iflextechnologies7@gmail.com', '', 'qqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '', NULL, 0, NULL, 3, '2018-06-27 14:36:32'),
(33, '123221145211', NULL, 'Niroj', '', '5f4dcc3b5aa765d61d8327deb882cf99', '5521321115', 'niroj@iflextech.in', '', 'bskjbc212w', 'ghbsbnsnj', 'shnsnxnxs', NULL, 1, NULL, 3, '2018-06-28 11:05:12'),
(34, '345678909871', 'banner.jpg', 'sumit ', '', 'e10adc3949ba59abbe56e057f20f883e', '9810605125', 'xxx@aaaa', '', '8214758241', 'cccc', 'aaaa', NULL, 0, NULL, 3, '2018-06-28 05:29:05'),
(35, '123312122324', 'metal work machine.jpg', 'Niroj', '', '09f99bb94c767d6ea35362835a67a3f5', '5632145214', 'hr@iflextech.in', '', 'jdjkwqnbkl', 'nqkdnn q', 'n dn w', NULL, 0, NULL, 3, '2018-06-28 07:21:29'),
(36, '133333333333', 'ERGO File Caddy.jpg', 'aaaaa', '', 'e10adc3949ba59abbe56e057f20f883e', '9810605125', '2sumitnath@gmail.com', '', '3333333333', 'eeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeee', NULL, 1, NULL, 3, '2018-06-28 09:54:12'),
(38, '324543535', NULL, 'Vipin', '', '5f4dcc3b5aa765d61d8327deb882cf99', '4234324234', 'admin@gmail.com', '', '4534534534', 'gfgfgfg', 'gfdfdhfhfhgf', NULL, 0, NULL, 3, '2018-06-28 09:44:32'),
(44, '543534543543', NULL, 'Vipin', '', '5f4dcc3b5aa765d61d8327deb882cf99', '5353253255', 'vipsainisahab@gmail.com', '', '5345435435', 'tretretret', 'retreterterter', NULL, 0, NULL, 3, '2018-06-28 10:02:48'),
(45, '798979798798', NULL, 'Vipin', '', '5f4dcc3b5aa765d61d8327deb882cf99', '87997987', 'vipsainisahab@gmail.com', '', '9879798798', 'lkjlkjlkjlkjljljl', 'fhgfhfhgfhfghgf', NULL, 0, NULL, 3, '2018-06-28 10:04:53'),
(46, '11111', NULL, 'aaaaaaaaaaa', '', '47bce5c74f589f4867dbd57e9ca9f808', '2345678990', 'sumitnath.seo@gmail.com', '', 'aaaaaaaaaa', 'aaaaaaaa', 'aaaaaaaaa', NULL, 0, NULL, 3, '2018-06-28 10:28:16'),
(47, '424575345983', '2.jpg', 'Shubham Sahu', '', '827ccb0eea8a706c4c34a16891f84e7b', '8585919870', 'sahutech8@gmail.com', '', '5934254358', 'asdfhjksfkdsgfkjgsdk', 'sfkjgdkjgfksdjfgsdkfj', NULL, 1, NULL, 3, '2018-06-29 06:02:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
