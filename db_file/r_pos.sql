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
-- Database: `r_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_activity_log`
--

CREATE TABLE `r_activity_log` (
  `uid` int(11) NOT NULL,
  `activity` varchar(1000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r_categories`
--

CREATE TABLE `r_categories` (
  `uid` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `sku_prefix` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_categories`
--

INSERT INTO `r_categories` (`uid`, `category_name`, `sku_prefix`, `status`, `user_id`, `added_date`) VALUES
(1, 'One', 'one', 1, 2, '2021-01-29 14:31:35'),
(2, 'Two', 'two', 1, 2, '2021-01-29 14:31:39'),
(3, 'Electronics', 'ele', 1, 2, '2021-01-29 14:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `r_customers`
--

CREATE TABLE `r_customers` (
  `uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `second_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_customers`
--

INSERT INTO `r_customers` (`uid`, `user_id`, `section_id`, `first_name`, `second_name`, `last_name`, `phone`, `email`, `status`, `added_date`) VALUES
(1, 2, 2, 'Vincent', 'Norbert', 'Kioko', '254727796831', 'kioko.nobert7@gmail.com', 1, '2021-01-29 07:37:27'),
(2, 2, 2, 'Kennedy', 'Mutia', 'Mulwa', '254727796831', 'ken@gmail.com', 1, '2021-01-29 07:41:36'),
(3, 2, 1, 'David', 'Kimutai', 'Komen', '254700074506', '', 1, '2021-02-08 13:04:12'),
(4, 2, 1, 'Aboma', 'Okoth', 'Fredrick', '254710187427', '', 1, '2021-02-08 13:04:12'),
(5, 2, 1, 'George', 'Maselo', '', '254713680889', '', 1, '2021-02-08 13:04:13'),
(6, 2, 1, 'Justus', 'Kamanja', 'Mbogori', '254717989343', '', 1, '2021-02-08 13:04:13'),
(7, 2, 1, 'Lawrence', 'Ngigi', 'Gitau', '254720447177', '', 1, '2021-02-08 13:04:13'),
(8, 2, 1, 'Harun', 'Karugu', 'Kamau', '254721489359', '', 1, '2021-02-08 13:04:13'),
(9, 2, 1, 'Edward', 'Mburu', 'Waweru', '254722886006', '', 1, '2021-02-08 13:04:13'),
(10, 2, 1, 'Benson', 'Wawire', 'Uluma', '254729944919', '', 1, '2021-02-08 13:04:13'),
(11, 2, 1, 'Matilder', 'Kaari', 'Lloyd', '254721214803', '', 1, '2021-02-08 13:04:13'),
(12, 2, 1, 'Judy', 'Kyee', 'Mbuvi', '254723229344', '', 1, '2021-02-08 13:04:13'),
(13, 2, 1, 'Edwin', 'Odhiambo', 'Otieno', '254735336807', '', 1, '2021-02-08 13:04:13'),
(14, 2, 1, 'Patricia', 'Mwongeli', 'Moki', '254707489373', '', 1, '2021-02-08 13:04:13'),
(15, 2, 1, 'Elijah', 'Kibagendi', 'Nyarangi', '254710480817', '', 1, '2021-02-08 13:04:13'),
(16, 2, 1, 'Felister', 'Wamucii', 'Thengereri', '254711549417', '', 1, '2021-02-08 13:04:13'),
(17, 2, 1, 'Gedion', 'Kyalo', 'Mutua', '254712205978', '', 1, '2021-02-08 13:04:13'),
(18, 2, 1, 'Brian', 'Mwenge', 'Wangia', '254717300005', '', 1, '2021-02-08 13:04:13'),
(19, 2, 1, 'Daniel', 'Ndirangu', 'Muriithi', '254720787260', '', 1, '2021-02-08 13:04:13'),
(20, 2, 1, 'Mary', 'Wangari', 'Mwangi', '254721270753', '', 1, '2021-02-08 13:04:13'),
(21, 2, 1, 'Consolata', 'Bilinga', '', '254723049936', '', 1, '2021-02-08 13:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `r_items`
--

CREATE TABLE `r_items` (
  `uid` int(11) NOT NULL,
  `item_sku` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_description` varchar(400) NOT NULL,
  `item_image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_items`
--

INSERT INTO `r_items` (`uid`, `item_sku`, `category_id`, `user_id`, `item_name`, `item_price`, `item_description`, `item_image`, `status`, `added_date`) VALUES
(2, '2-ELE', 3, 2, 'iPhone', 10000.00, 'Some Description Here', 'GsdP5nZdNk.png', 1, '2021-01-30 06:34:50'),
(3, '3-TWO', 2, 2, 'Product 2', 1600.00, 'Some description', 'PBeWARiWp3.jpg', 1, '2021-02-08 08:51:01'),
(4, '4-ONE', 1, 2, 'Esprit Ruffle Shirt', 1600.00, 'SOME DESCRIPTION HERE', 'product-01.jpg', 1, '2021-02-08 09:04:44'),
(5, '5-ONE', 1, 2, 'Herschel supply', 3500.00, 'SOME DESCRIPTION HERE', 'product-02.jpg', 1, '2021-02-08 09:04:49'),
(6, '6-ONE', 1, 2, 'Only Check Trouser', 2550.00, 'SOME DESCRIPTION HERE', 'product-03.jpg', 1, '2021-02-08 09:04:55'),
(7, '7-ONE', 1, 2, 'Classic Trench Coat', 7500.00, 'SOME DESCRIPTION HERE', 'product-04.jpg', 1, '2021-02-08 09:05:02'),
(8, '8-ONE', 1, 2, 'Front Pocket Jumper', 3500.00, 'SOME DESCRIPTION HERE', 'product-05.jpg', 1, '2021-02-08 09:05:07'),
(9, '9-ONE', 1, 2, 'Vintage Inspired Classic', 6000.00, 'SOME DESCRIPTION HERE', 'product-06.jpg', 1, '2021-02-08 09:05:14'),
(10, '10-ONE', 1, 2, 'Shirt in Stretch Cotton', 5200.00, 'SOME DESCRIPTION HERE', 'product-07.jpg', 1, '2021-02-08 09:05:21'),
(11, '11-ONE', 1, 2, 'Pieces Metallic Printed', 2000.00, 'SOME DESCRIPTION HERE', 'product-08.jpg', 1, '2021-02-08 09:05:26'),
(12, '12-ONE', 1, 2, 'Converse All Star Hi Plimsolls', 7500.00, 'SOME DESCRIPTION HERE', 'product-09.jpg', 1, '2021-02-08 09:05:30'),
(13, '13-ONE', 1, 2, 'Femme T-Shirt In Stripe', 2585.00, 'SOME DESCRIPTION HERE', 'product-10.jpg', 1, '2021-02-08 09:05:36'),
(14, '14-ONE', 1, 2, 'Herschel supply 2', 6316.00, 'SOME DESCRIPTION HERE', 'product-11.jpg', 1, '2021-02-08 09:05:41'),
(15, '15-ONE', 1, 2, 'Herschel supply 3', 6316.00, 'SOME DESCRIPTION HERE', 'product-12.jpg', 1, '2021-02-08 09:05:50'),
(16, '16-ONE', 1, 2, 'T-Shirt with Sleeve', 1850.00, 'SOME DESCRIPTION HERE', 'product-13.jpg', 1, '2021-02-08 09:05:56'),
(17, '17-ONE', 1, 2, 'Pretty Little Thing', 5500.00, 'SOME DESCRIPTION HERE', 'product-14.jpg', 1, '2021-02-08 09:06:01'),
(18, '18-ONE', 1, 2, 'Mini Silver Mesh Watch', 8600.00, 'SOME DESCRIPTION HERE', 'product-15.jpg', 1, '2021-02-08 09:06:06'),
(19, '19-ONE', 1, 2, 'Square Neck Back', 3000.00, 'SOME DESCRIPTION HERE', 'product-16.jpg', 1, '2021-02-08 09:06:11'),
(21, '21-ONE', 1, 2, 'Somethinf', 1234.00, 'sghgdhf', 'Wcx6GK1oAF.png', 1, '2021-02-12 10:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `r_orders`
--

CREATE TABLE `r_orders` (
  `uid` int(11) NOT NULL,
  `order_id` varchar(200) DEFAULT NULL,
  `order_items` int(11) NOT NULL DEFAULT 0,
  `order_amount` double(10,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `counter` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_orders`
--

INSERT INTO `r_orders` (`uid`, `order_id`, `order_items`, `order_amount`, `user_id`, `customer_id`, `status`, `added_date`, `counter`) VALUES
(1, '202102110001', 2, 7350.00, 2, 0, 1, '2021-02-11 05:49:06', 1),
(2, '202102110002', 4, 18950.00, 2, 0, 1, '2021-02-11 05:52:15', 2),
(3, '202102110003', 4, 17100.00, 2, 0, 1, '2021-02-11 08:59:49', 3),
(4, '202102150004', 3, 17100.00, 2, 0, 1, '2021-02-15 11:24:42', 4);

-- --------------------------------------------------------

--
-- Table structure for table `r_order_items`
--

CREATE TABLE `r_order_items` (
  `uid` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_sub_total` double(10,2) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_order_items`
--

INSERT INTO `r_order_items` (`uid`, `order_id`, `item_id`, `item_quantity`, `item_price`, `item_sub_total`, `added_date`) VALUES
(1, 1, 17, 1, 5500.00, 5500.00, '2021-02-11 05:49:06'),
(2, 1, 16, 1, 1850.00, 1850.00, '2021-02-11 05:49:06'),
(3, 2, 16, 1, 1850.00, 1850.00, '2021-02-11 05:52:15'),
(4, 2, 17, 1, 5500.00, 5500.00, '2021-02-11 05:52:15'),
(5, 2, 18, 1, 8600.00, 8600.00, '2021-02-11 05:52:15'),
(6, 2, 19, 1, 3000.00, 3000.00, '2021-02-11 05:52:15'),
(7, 3, 17, 1, 5500.00, 5500.00, '2021-02-11 08:59:50'),
(8, 3, 19, 1, 3000.00, 3000.00, '2021-02-11 08:59:50'),
(9, 3, 6, 2, 2550.00, 5100.00, '2021-02-11 08:59:50'),
(10, 3, 8, 1, 3500.00, 3500.00, '2021-02-11 08:59:50'),
(11, 4, 17, 1, 5500.00, 5500.00, '2021-02-15 11:24:42'),
(12, 4, 18, 1, 8600.00, 8600.00, '2021-02-15 11:24:42'),
(13, 4, 19, 1, 3000.00, 3000.00, '2021-02-15 11:24:42');

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
-- Table structure for table `r_section_quantity`
--

CREATE TABLE `r_section_quantity` (
  `uid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_section_quantity`
--

INSERT INTO `r_section_quantity` (`uid`, `item_id`, `section_id`, `quantity`) VALUES
(4, 2, 1, 10),
(5, 2, 2, 10),
(6, 2, 3, 10),
(7, 3, 1, 10),
(8, 3, 2, 10),
(9, 3, 3, 10),
(10, 4, 1, 10),
(11, 4, 2, 10),
(12, 4, 3, 10),
(13, 5, 1, 10),
(14, 5, 2, 10),
(15, 5, 3, 10),
(16, 6, 1, 10),
(17, 6, 2, 10),
(18, 6, 3, 10),
(19, 7, 1, 10),
(20, 7, 2, 10),
(21, 7, 3, 10),
(22, 8, 1, 10),
(23, 8, 2, 10),
(24, 8, 3, 10),
(25, 9, 1, 10),
(26, 9, 2, 10),
(27, 9, 3, 10),
(28, 10, 1, 10),
(29, 10, 2, 10),
(30, 10, 3, 10),
(31, 11, 1, 10),
(32, 11, 2, 10),
(33, 11, 3, 10),
(34, 12, 1, 10),
(35, 12, 2, 10),
(36, 12, 3, 10),
(37, 13, 1, 10),
(38, 13, 2, 10),
(39, 13, 3, 10),
(40, 14, 1, 10),
(41, 14, 2, 10),
(42, 14, 3, 10),
(43, 15, 1, 10),
(44, 15, 2, 10),
(45, 15, 3, 10),
(46, 16, 1, 10),
(47, 16, 2, 10),
(48, 16, 3, 10),
(49, 17, 1, 10),
(50, 17, 2, 10),
(51, 17, 3, 10),
(52, 18, 1, 10),
(53, 18, 2, 10),
(54, 18, 3, 10),
(55, 19, 1, 10),
(56, 19, 2, 10),
(57, 19, 3, 10),
(58, 21, 1, 10),
(59, 21, 2, 10),
(60, 21, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `r_staff`
--

CREATE TABLE `r_staff` (
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
-- Dumping data for table `r_staff`
--

INSERT INTO `r_staff` (`uid`, `first_name`, `last_name`, `primary_email`, `primary_phone`, `national_id`, `user_name`, `pass`, `added_date`, `added_by`, `user_group`, `section`, `sub_section`, `status`) VALUES
(2, 'Vincent', 'Kioko', 'vincentkioko51@gmail.com', '254727796831', NULL, 'vincentkioko', 'fdc45b8ab99f52af10501bbdac25dcf50735682739748abb6296e1b5cc923666', '2021-01-28 10:06:07', 1, 2, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_staff_status`
--

CREATE TABLE `r_staff_status` (
  `uid` int(11) NOT NULL,
  `status_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `r_staff_status`
--

INSERT INTO `r_staff_status` (`uid`, `status_name`, `status`) VALUES
(1, 'active', 1),
(2, 'Blocked', 1),
(3, 'Former', 1),
(4, 'Inactive', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `r_user_sections`
--

CREATE TABLE `r_user_sections` (
  `uid` int(11) NOT NULL,
  `section_name` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Set sections that users can see e.g. specific products, specific branches';

--
-- Dumping data for table `r_user_sections`
--

INSERT INTO `r_user_sections` (`uid`, `section_name`, `status`) VALUES
(1, 'One', 1),
(2, 'Two', 1),
(3, 'Three', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_activity_log`
--
ALTER TABLE `r_activity_log`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_categories`
--
ALTER TABLE `r_categories`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_customers`
--
ALTER TABLE `r_customers`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_items`
--
ALTER TABLE `r_items`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_orders`
--
ALTER TABLE `r_orders`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `counter` (`counter`);

--
-- Indexes for table `r_order_items`
--
ALTER TABLE `r_order_items`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_passes`
--
ALTER TABLE `r_passes`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `r_section_quantity`
--
ALTER TABLE `r_section_quantity`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `r_staff`
--
ALTER TABLE `r_staff`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `primary_email_UNIQUE` (`primary_email`),
  ADD UNIQUE KEY `primary_phone_UNIQUE` (`primary_phone`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  ADD UNIQUE KEY `national_id_UNIQUE` (`national_id`);

--
-- Indexes for table `r_staff_status`
--
ALTER TABLE `r_staff_status`
  ADD PRIMARY KEY (`uid`);

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
-- Indexes for table `r_user_sections`
--
ALTER TABLE `r_user_sections`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid_UNIQUE` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_activity_log`
--
ALTER TABLE `r_activity_log`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_categories`
--
ALTER TABLE `r_categories`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_customers`
--
ALTER TABLE `r_customers`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `r_items`
--
ALTER TABLE `r_items`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `r_orders`
--
ALTER TABLE `r_orders`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_order_items`
--
ALTER TABLE `r_order_items`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `r_passes`
--
ALTER TABLE `r_passes`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_section_quantity`
--
ALTER TABLE `r_section_quantity`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `r_staff`
--
ALTER TABLE `r_staff`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_staff_status`
--
ALTER TABLE `r_staff_status`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- AUTO_INCREMENT for table `r_user_sections`
--
ALTER TABLE `r_user_sections`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
