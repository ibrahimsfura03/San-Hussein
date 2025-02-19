-- ******************************** XAMPP *****************************
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 08:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Select the database to use
USE `san_hussain`;

-- --------------------------------------------------------
-- Table structure for table `admin_list`
-- --------------------------------------------------------
CREATE TABLE `admin_list` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_rank` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_password` varchar(22) NOT NULL,
  `admin_nin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `admin_list`
INSERT INTO `admin_list` (`admin_id`, `admin_name`, `admin_email`, `admin_image`, `admin_rank`, `admin_phone`, `admin_password`, `admin_nin`) VALUES
(1, 'proh', 'ibrahimsfura03@gmail.com', '1722941718523.png', 'superior', '08033698607', '00000', '54875216935'),
(2, 'baba@baba.com', 'ibrahimsfura03@gmail.com', '', 'pro', '08033698607', 'mmmmm', '58417269315'),
(4, 'Musa', 'musa@gmail.com', '', 'pro', '00087', 'musa', '57894712457'),
(5, 'baba@baba.com', 'ibrahimsfura03@gmail.com', '', 'pro', '08033698607', 'baba', '25483697854'),
(6, 'Ib', 'ib@ib.com', '', 'pro', '888', 'ib', '09991925555'),
(7, 'umargidado', 'umargidado@gmail.com', 'file.png', 'superior', '08166676760', 'umargidado', '98765432109'),
(10, 'jon', 'jon@doe.com', 'userlogo.png', 'pro', '48564148564', 'jon', '58418515341');

-- --------------------------------------------------------
-- Table structure for table `carts`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `carts` (
  `cart_id` int(255) NOT NULL,
  `user_cart_id` int(255) NOT NULL DEFAULT 0,
  `cart_name` varchar(255) NOT NULL DEFAULT '',
  `cart_image` text NULL,
  `cart_quantity` int(255) NOT NULL DEFAULT 0,
  `cart_price` int(255) NOT NULL DEFAULT 0,
  `product_cart_id` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `category`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_title` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `orders`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `order_total_price` int(255) NOT NULL DEFAULT 0,
  `order_total_quantity` int(255) NOT NULL DEFAULT 0,
  `order_status` varchar(255) NOT NULL DEFAULT '',
  `order_unapprove` varchar(255) NOT NULL DEFAULT '',
  `order_payment_type` varchar(255) NOT NULL DEFAULT '',
  `order_address` varchar(255) NOT NULL DEFAULT '',
  `order_user_name` varchar(255) NOT NULL DEFAULT '',
  `order_user_email` varchar(255) NOT NULL DEFAULT '',
  `order_date` date NOT NULL DEFAULT '0000-00-00',
  `order_user_id` int(255) NOT NULL DEFAULT 0,
  `order_approve` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `products`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(50) NOT NULL DEFAULT '',
  `product_category` varchar(22) NOT NULL DEFAULT '',
  `product_price` int(12) NOT NULL DEFAULT 0,
  `product_description` varchar(255) NOT NULL DEFAULT '',
  `product_image` text NULL,
  `product_tag` varchar(255) NOT NULL DEFAULT '',
  `product_quantity` int(255) NOT NULL DEFAULT 0,
  `product_purchase` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `userslist`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `userslist` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(50) NOT NULL DEFAULT '',
  `user_password` varchar(50) NOT NULL DEFAULT '',
  `user_image` text NULL,
  `user_full_name` varchar(255) NOT NULL DEFAULT '',
  `user_phone` int(22) NOT NULL DEFAULT 0,
  `user_age` int(255) NOT NULL DEFAULT 0,
  `user_gender` varchar(255) NOT NULL DEFAULT '',
  `user_address` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Indexes for dumped tables
-- --------------------------------------------------------
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
ALTER TABLE `userslist`
  ADD PRIMARY KEY (`user_id`);

-- --------------------------------------------------------
-- AUTO_INCREMENT for dumped tables
-- --------------------------------------------------------
ALTER TABLE `admin_list`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
ALTER TABLE `carts`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
ALTER TABLE `userslist`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
























-- ************************************ WORKBENCH ************************
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 08:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

-- Disable strict mode to allow empty strings for integer columns to be treated as 0
SET SESSION sql_mode = 'NO_AUTO_VALUE_ON_ZERO,NO_ENGINE_SUBSTITUTION';
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Select the database to use
USE `san_hussain`;

-- --------------------------------------------------------
-- Table structure for table `admin_list`
-- --------------------------------------------------------
CREATE TABLE `admin_list` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_rank` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_password` varchar(22) NOT NULL,
  `admin_nin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `admin_list`
INSERT INTO `admin_list` (`admin_id`, `admin_name`, `admin_email`, `admin_image`, `admin_rank`, `admin_phone`, `admin_password`, `admin_nin`) VALUES
(1, 'proh', 'ibrahimsfura03@gmail.com', '1722941718523.png', 'superior', '08033698607', '00000', '54875216935'),
(2, 'baba@baba.com', 'ibrahimsfura03@gmail.com', '', 'pro', '08033698607', 'mmmmm', '58417269315'),
(4, 'Musa', 'musa@gmail.com', '', 'pro', '00087', 'musa', '57894712457'),
(5, 'baba@baba.com', 'ibrahimsfura03@gmail.com', '', 'pro', '08033698607', 'baba', '25483697854'),
(6, 'Ib', 'ib@ib.com', '', 'pro', '888', 'ib', '09991925555'),
(7, 'umargidado', 'umargidado@gmail.com', 'file.png', 'superior', '08166676760', 'umargidado', '98765432109'),
(10, 'jon', 'jon@doe.com', 'userlogo.png', 'pro', '48564148564', 'jon', '58418515341');

-- --------------------------------------------------------
-- Table structure for table `carts`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `carts` (
  `cart_id` int(255) NOT NULL,
  `user_cart_id` int(255) NOT NULL DEFAULT 0,
  `cart_name` varchar(255) NOT NULL DEFAULT '',
  `cart_image` text NULL,
  `cart_quantity` int(255) NOT NULL DEFAULT 0,
  `cart_price` int(255) NOT NULL DEFAULT 0,
  `product_cart_id` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `category`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_title` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `orders`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `order_total_price` int(255) NOT NULL DEFAULT 0,
  `order_total_quantity` int(255) NOT NULL DEFAULT 0,
  `order_status` varchar(255) NOT NULL DEFAULT '',
  `order_unapprove` varchar(255) NOT NULL DEFAULT '',
  `order_payment_type` varchar(255) NOT NULL DEFAULT '',
  `order_address` varchar(255) NOT NULL DEFAULT '',
  `order_user_name` varchar(255) NOT NULL DEFAULT '',
  `order_user_email` varchar(255) NOT NULL DEFAULT '',
  `order_date` date NOT NULL DEFAULT '0000-00-00',
  `order_user_id` int(255) NOT NULL DEFAULT 0,
  `order_approve` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `products`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(50) NOT NULL DEFAULT '',
  `product_category` varchar(22) NOT NULL DEFAULT '',
  `product_price` int(12) NOT NULL DEFAULT 0,
  `product_description` varchar(255) NOT NULL DEFAULT '',
  `product_image` text NULL,
  `product_tag` varchar(255) NOT NULL DEFAULT '',
  `product_quantity` int(255) NOT NULL DEFAULT 0,
  `product_purchase` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `userslist`
-- (Data removed)
-- --------------------------------------------------------
CREATE TABLE `userslist` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(50) NOT NULL DEFAULT '',
  `user_password` varchar(50) NOT NULL DEFAULT '',
  `user_image` text NULL,
  `user_full_name` varchar(255) NOT NULL DEFAULT '',
  `user_phone` int(22) NOT NULL DEFAULT 0,
  `user_age` int(255) NOT NULL DEFAULT 0,
  `user_gender` varchar(255) NOT NULL DEFAULT '',
  `user_address` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Indexes for dumped tables
-- --------------------------------------------------------
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
ALTER TABLE `userslist`
  ADD PRIMARY KEY (`user_id`);

-- --------------------------------------------------------
-- AUTO_INCREMENT for dumped tables
-- --------------------------------------------------------
ALTER TABLE `admin_list`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
ALTER TABLE `carts`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
ALTER TABLE `userslist`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
