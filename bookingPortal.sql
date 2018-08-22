-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 06:06 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buisness_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `password`, `image`, `role`, `updated_date`) VALUES
(1, 'Vipin ', 'Saini', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1523880934.jpg', 1, '2018-06-26 22:48:19'),
(2, 'Shubham ', 'Shahu', 'shubham@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1523880934.jpg', 2, '2018-04-18 18:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `aproved_requests`
--

CREATE TABLE `aproved_requests` (
  `id` int(11) NOT NULL,
  `buis_name` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `date_approved` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aproved_requests`
--

INSERT INTO `aproved_requests` (`id`, `buis_name`, `mobile`, `table_name`, `date_approved`, `username`) VALUES
(17, 'AVS', 55555, '', '20/04/2018', 'admin@admin.com'),
(17, 'AVD', 66666666, 'master_category', '0000-00-00', 'admin@admin.com'),
(20, 'AVDee', 234798234, '', '21/04/2018', 'admin@admin.com'),
(17, 'AVD', 555555555, 'master_category', '0000-00-00', 'admin@admin.com'),
(19, 'AVDee', 888853245, 'master_category', '21/04/2018', 'admin@admin.com'),
(17, 'QWERTY', 1234567890, 'master_category', '21/04/2018', 'admin@admin.com'),
(9, 'MSSS', 2147483647, '', '21/04/2018', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `description` longtext NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `business_name`, `mobile`, `description`, `address`) VALUES
(1, 'Hind Book Center', 9639000761, 'hlo', ''),
(3, 'Saini Clothes Center', 9639000761, 'Established in 2017, Saikirpa Sales is one of the notable companies immersed in wholesale trading of Computer Accessories, Graphic Card, Hard Disk, Micro SD Card, Computer Motherboard, Storage Pen-drives, Printers and Scanners, Computer Processor and many more. Our provided products are extremely accredited amid our clientele owing to their easy to use, top performance, longer operational life and nominal costs. These products are available with us at nominal costs and diverse configurations. The presented products are made by skilled and knowledgeable personnel who have affluent industry practice. Due to our client centered approaches and clear business policies; our company is successful in gaining formidable place for ourselves.', ' 113/1, Deepali Building, 92, Nehru Place, New Delhi - 110019, Delhi, India');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mid` tinyint(4) NOT NULL,
  `sid` tinyint(4) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mobile` int(11) NOT NULL,
  `buis_name` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `mid`, `sid`, `banner_image`, `category_image`, `description`, `status`, `date_added`, `mobile`, `buis_name`, `username`) VALUES
(5, 'Top Wears3', 17, 7, '', '', 'deseeeioeioioe', 0, '2018-04-21 15:31:25', 2147483647, 'UIDID', 'vipsainisahab@gmail.com'),
(6, 'Devices', 27, 11, '', '', '', 1, '2018-05-24 07:33:04', 0, '', 'jagraj@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `master_category`
--

CREATE TABLE `master_category` (
  `id` tinyint(4) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buis_name` varchar(30) NOT NULL,
  `mobile` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_category`
--

INSERT INTO `master_category` (`id`, `category`, `category_image`, `description`, `status`, `mid`, `sid`, `date_added`, `buis_name`, `mobile`, `username`) VALUES
(17, 'Clothes', '', 'this is AVD', 1, 0, 2, '2018-04-23 03:53:20', 'QWERTY', 1234567890, 'vipsainisahab@gmail.com'),
(18, 'Clothes', '', 'this is AVD', 1, 0, 3, '2018-04-23 03:53:22', 'AVDee', 99999999, 'vipsainisahab@gmail.com'),
(19, 'Clothes', '', 'this is AVD', 1, 0, 4, '2018-04-23 03:53:25', 'AVDee', 888853245, 'vipsainisahab@gmail.com'),
(20, 'Clothes', '', 'this is AVD', 1, 0, 5, '2018-04-23 03:53:28', 'HD', 458943, 'vipsainisahab@gmail.com'),
(22, 'ja', '', 'ttt', 1, 0, 6, '2018-04-23 03:53:30', 'aswq', 978798978, 'vipsainisahab@gmail.com'),
(23, 'Clothes', '', 'this is AVD', 1, 0, 0, '2018-04-23 05:22:54', 'fd', 3253443, 'vipsainisahab@gmail.com'),
(27, 'Computer', '', 'css', 1, 0, 0, '2018-05-24 07:01:04', '', 0, 'jagraj@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `mid`, `sid`, `cat_id`, `name`, `image`, `price`, `description`, `username`, `tags`, `added_date`) VALUES
(1, 27, 11, 6, 'Pen Drive', '', 100, 'With transfer speeds of up to 100MB/s the SanDisk Ultra USB 3.0 Flash Drive reduces the time you\'ll spend waiting for files to move from the flash drive to your computer. Enabled for USB 3.0', 'jagraj@user.com', 'pen drive, usb 3.0, usb 2.0', '2018-05-24 08:44:09'),
(2, 27, 11, 6, 'SSN', 'C:fakepathadmin.jpg', 999, 'This is SSN series.', 'jagraj@user.com', '', '2018-05-24 08:44:09'),
(3, 27, 11, 6, 'New Pro 50', '', 499, 'Abcdefghio', 'jagraj@user.com', '', '2018-05-24 08:44:09'),
(4, 27, 11, 6, 'SSN++', 'C:fakepath	witter_corner_blue.png', 1299, 'SSN++ is best.', 'jagraj@user.com', '', '2018-05-24 08:44:09'),
(5, 27, 11, 6, 'TY', '', 45334, 'TY is the best.', 'vipsainisahab@gmail.com', '', '2018-05-24 08:44:09'),
(878, 27, 11, 6, 'Pmn', '', 5000, 'o', 'jagraj@user.com', 'p,m,n', '2018-05-24 08:44:24'),
(880, 27, 11, 6, 'Pxb', '', 2300, 'ppx', 'jagraj@user.com', 'p,x,b', '2018-05-24 08:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `buis_name` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `buis_name`, `mobile`, `table_name`, `username`) VALUES
(23, 'QWERTY', 1234567890, 'master_category', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` tinyint(4) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mid` tinyint(4) NOT NULL,
  `sid` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buis_name` varchar(30) NOT NULL,
  `mobile` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category`, `mid`, `sid`, `banner_image`, `category_image`, `description`, `status`, `date_added`, `buis_name`, `mobile`, `username`) VALUES
(7, 'Mens wear2', 17, 3, '', '', 'dsdfd', 1, '2018-04-23 09:23:39', 'bsdfisdfoids', 2147483647, 'vipsainisahab@gmail.com'),
(8, 'Shirts', 17, 2, '', '', '', 1, '2018-04-23 09:19:57', 'fasdfs', 0, 'vipsainisahab@gmail.com'),
(9, 'MS', 17, 1, '', '', 'mmmmmmmm', 1, '2018-04-23 09:20:01', 'MSSS', 45893489, 'vipsainisahab@gmail.com'),
(10, 'qw', 23, 4, '', '', 'ssaas', 1, '2018-04-23 09:20:07', 'dfsdfs', 2147483647, 'vipsainisahab@gmail.com'),
(11, 'Utilities', 27, 0, '', '', '', 1, '2018-05-24 07:12:41', '', 0, 'jagraj@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `adhar_no` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pancard` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `adhar_no`, `image`, `name`, `password`, `mobile`, `username`, `pancard`, `department`, `designation`, `token`, `status`, `ip_address`, `created_at`) VALUES
(45, '122344566755', 'user.jpg', 'sum', 'e10adc3949ba59abbe56e057f20f883e', '7889990999', 'sumitnath.edu@gmail.com', '3456789900', 'atext', 'texzt', NULL, 1, NULL, '2018-06-26 09:53:08'),
(47, '123213213213', NULL, 'sahu', '827ccb0eea8a706c4c34a16891f84e7b', '2343243243', 'sahutech8@gmail.com', '2343243243', 'efsdfdsfdsefdsfsdgdsgdsgs', 'dsgdsdsgdsg', NULL, 0, NULL, '2018-06-26 08:40:02'),
(62, '214214214214', NULL, 'shubham', '827ccb0eea8a706c4c34a16891f84e7b', '3243243243', 'shubhamsahu707@gmail.com', '1242142121', 'asfsdfdsfgdsgg', 'dsfdsfdsgdsgds', NULL, 0, NULL, '2018-06-26 09:38:57'),
(63, '666666666665', NULL, 'sumit', 'e10adc3949ba59abbe56e057f20f883e', '0009999999', 'sumitnath.edu@gmail.com', 'vguit77t', 'ddd', 'aasss', NULL, 0, NULL, '2018-06-26 09:44:06'),
(65, '888888888888', '1530037321.ico', 'vipin', 'd41d8cd98f00b204e9800998ecf8427e', '8888888888888', 'vipsainisahab@gmail.com', '8888888888', 'dep', 'des', NULL, 0, NULL, '2018-06-26 18:25:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aproved_requests`
--
ALTER TABLE `aproved_requests`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_category`
--
ALTER TABLE `master_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `adhar_no` (`adhar_no`,`mobile`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_category`
--
ALTER TABLE `master_category`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=881;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
