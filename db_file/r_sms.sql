-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 10:37 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_contacts`
--

CREATE TABLE `r_contacts` (
  `uid` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `stream_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r_outgoing_sms`
--

CREATE TABLE `r_outgoing_sms` (
  `uid` int(20) NOT NULL,
  `short_code` varchar(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `message` varchar(400) NOT NULL,
  `linkid` varchar(245) DEFAULT NULL,
  `initiated_by` varchar(105) DEFAULT NULL,
  `date_queued` datetime NOT NULL,
  `date_processed` datetime DEFAULT NULL,
  `sent_` int(1) NOT NULL DEFAULT 0,
  `received_` int(1) NOT NULL DEFAULT 0,
  `feedback` varchar(245) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1-queued\n2-processed\n3-reprocessed\n4-deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Store all SMS from company shortcode';

-- --------------------------------------------------------

--
-- Table structure for table `r_passes`
--

CREATE TABLE `r_passes` (
  `uid` int(20) NOT NULL,
  `user` int(20) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `pass_reset_token` varchar(255) DEFAULT NULL,
  `reset_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_passes`
--

INSERT INTO `r_passes` (`uid`, `user`, `pass`, `pass_reset_token`, `reset_status`) VALUES
(1, 2, 'j[QXJ#9Au}1!jiB++Ga6sbbkG@VA.Vmg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `r_settings`
--

CREATE TABLE `r_settings` (
  `uid` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `api_username` varchar(100) DEFAULT NULL,
  `api_key` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r_streams`
--

CREATE TABLE `r_streams` (
  `uid` int(11) NOT NULL,
  `class` varchar(100) DEFAULT NULL,
  `stream` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r_student`
--

CREATE TABLE `r_student` (
  `uid` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `first_name` varchar(200) NOT NULL,
  `second_name` varchar(200) NOT NULL,
  `sur_name` varchar(200) NOT NULL,
  `stream_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r_users`
--

CREATE TABLE `r_users` (
  `uid` int(5) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `primary_email` varchar(85) NOT NULL,
  `primary_phone` varchar(15) NOT NULL,
  `national_id` varchar(15) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `pass` varchar(245) NOT NULL,
  `added_date` datetime DEFAULT current_timestamp(),
  `added_by` int(10) DEFAULT NULL,
  `user_group` int(2) NOT NULL,
  `section` int(4) DEFAULT NULL,
  `sub_section` int(4) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0-inactive, 1-active, 2-Blocked, 3-Former'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Store staff biodata';

--
-- Dumping data for table `r_users`
--

INSERT INTO `r_users` (`uid`, `first_name`, `last_name`, `primary_email`, `primary_phone`, `national_id`, `user_name`, `pass`, `added_date`, `added_by`, `user_group`, `section`, `sub_section`, `status`) VALUES
(2, 'Vincent', 'Kioko', 'vincentkioko51@gmail.com', '254727796831', NULL, 'vincentkioko', 'fdc45b8ab99f52af10501bbdac25dcf50735682739748abb6296e1b5cc923666', '2021-01-28 10:06:07', 1, 2, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_user_groups`
--

CREATE TABLE `r_user_groups` (
  `uid` int(11) NOT NULL,
  `group_name` varchar(45) NOT NULL,
  `group_status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Store groups e.g. admins, field agents';

--
-- Dumping data for table `r_user_groups`
--

INSERT INTO `r_user_groups` (`uid`, `group_name`, `group_status`) VALUES
(1, 'Admin', 1),
(2, 'Super Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_user_permissions`
--

CREATE TABLE `r_user_permissions` (
  `uid` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  `p_view` int(1) NOT NULL,
  `p_add` int(1) NOT NULL,
  `p_edit` int(1) NOT NULL,
  `p_del` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Store user based permissions, User permissions override group permissions';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_contacts`
--
ALTER TABLE `r_contacts`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_outgoing_sms`
--
ALTER TABLE `r_outgoing_sms`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid_UNIQUE` (`uid`);

--
-- Indexes for table `r_passes`
--
ALTER TABLE `r_passes`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `r_settings`
--
ALTER TABLE `r_settings`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_streams`
--
ALTER TABLE `r_streams`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_student`
--
ALTER TABLE `r_student`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_users`
--
ALTER TABLE `r_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `primary_email_UNIQUE` (`primary_email`),
  ADD UNIQUE KEY `primary_phone_UNIQUE` (`primary_phone`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  ADD UNIQUE KEY `national_id_UNIQUE` (`national_id`);

--
-- Indexes for table `r_user_groups`
--
ALTER TABLE `r_user_groups`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid_UNIQUE` (`uid`),
  ADD UNIQUE KEY `group_name_UNIQUE` (`group_name`);

--
-- Indexes for table `r_user_permissions`
--
ALTER TABLE `r_user_permissions`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid_UNIQUE` (`uid`),
  ADD UNIQUE KEY `permission_name_UNIQUE` (`permission_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_contacts`
--
ALTER TABLE `r_contacts`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_outgoing_sms`
--
ALTER TABLE `r_outgoing_sms`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2193307;

--
-- AUTO_INCREMENT for table `r_passes`
--
ALTER TABLE `r_passes`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_settings`
--
ALTER TABLE `r_settings`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_streams`
--
ALTER TABLE `r_streams`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_student`
--
ALTER TABLE `r_student`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_users`
--
ALTER TABLE `r_users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_user_groups`
--
ALTER TABLE `r_user_groups`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_user_permissions`
--
ALTER TABLE `r_user_permissions`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
