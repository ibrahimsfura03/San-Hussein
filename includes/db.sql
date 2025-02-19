-- ******************************** XAMMP *****************************

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

--
-- Database: `san_hussain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

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

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`admin_id`, `admin_name`, `admin_email`, `admin_image`, `admin_rank`, `admin_phone`, `admin_password`, `admin_nin`) VALUES
(1, 'proh', 'ibrahimsfura03@gmail.com', '1722941718523.png', 'superior', '08033698607', '00000', '54875216935'),
(2, 'baba@baba.com', 'ibrahimsfura03@gmail.com', '', 'pro', '08033698607', 'mmmmm', '58417269315'),
(4, 'Musa', 'musa@gmail.com', '', 'pro', '00087', 'musa', '57894712457'),
(5, 'baba@baba.com', 'ibrahimsfura03@gmail.com', '', 'pro', '08033698607', 'baba', '25483697854'),
(6, 'Ib', 'ib@ib.com', '', 'pro', '888', 'ib', '09991925555'),
(7, 'umargidado', 'umargidado@gmail.com', 'file.png', 'superior', '08166676760', 'umargidado', '98765432109'),
(10, 'jon', 'jon@doe.com', 'userlogo.png', 'pro', '48564148564', 'jon', '58418515341');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(255) NOT NULL,
  `user_cart_id` int(255) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `cart_image` text NOT NULL,
  `cart_quantity` int(255) NOT NULL,
  `cart_price` int(255) NOT NULL,
  `product_cart_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_cart_id`, `cart_name`, `cart_image`, `cart_quantity`, `cart_price`, `product_cart_id`) VALUES
(1, 0, 'Womens shirt', 'women-clothes-img.png', 1, 745, 0),
(2, 0, 'mens shirt', 'dress-shirt-img.png', 3, 99, 0),
(3, 0, 'mens shirt', 'dress-shirt-img.png', 3, 99, 17),
(4, 0, 'mens shirt', 'dress-shirt-img.png', 1, 99, 17),
(133, 7, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(134, 7, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(142, 7, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(149, 14, 'mens shirt', 'dress-shirt-img.png', 1, 99, 17),
(154, 14, 'Car', 'IMG-20231202-WA0045.jpg', 1, 42000, 15),
(155, 14, 'Car', 'IMG-20231202-WA0045.jpg', 1, 42000, 15),
(157, 18, 'Car', 'IMG-20231202-WA0045.jpg', 2, 42000, 15),
(159, 6, 'Bangles', 'kangan-img.png', 1, 48, 16),
(160, 5, 'Bangles', '20240901_172020.jpg', 1, 48, 16),
(161, 5, 'Bangles', 'kangan-img.png', 5, 48, 16),
(162, 5, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(163, 20, 'Womens shirt', 'women-clothes-img.png', 3, 745, 20),
(164, 20, 'Computer Desktop ', 'computer-img.png', 3, 745, 18),
(165, 20, 'Computer Desktop ', 'computer-img.png', 1, 745, 18),
(166, 20, 'Jewellery ', 'jhumka-img.png', 0, 7745, 22),
(168, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0044.jpg', 1, 9654, 23),
(169, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0041.jpg', 1, 9654, 23),
(170, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0041.jpg', 1, 9654, 23),
(172, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0044.jpg', 1, 9654, 23),
(173, 25, 'Toyota Camry', 'IMG-20231202-WA0045.jpg', 2, 9465, 24),
(174, 25, 'Lenovo x360 laptop', '1725376925888958790471500226843.jpg', 1, 9654, 23),
(175, 25, 'Toyota Camry', 'IMG-20231202-WA0045.jpg', 4, 9465, 24),
(176, 17, 'Mobile phone ', 'mobile-img.png', 3, 455, 19);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'General'),
(2, 'Furnitures'),
(4, 'Accessories'),
(5, 'Men'),
(6, 'Kids'),
(7, 'Women'),
(16, 'Kitchen'),
(17, 'Vehicles');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `order_total_price` int(255) NOT NULL,
  `order_total_quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_unapprove` varchar(255) NOT NULL,
  `order_payment_type` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_user_name` varchar(255) NOT NULL,
  `order_user_email` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_user_id` int(255) NOT NULL,
  `order_approve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_total_price`, `order_total_quantity`, `order_status`, `order_unapprove`, `order_payment_type`, `order_address`, `order_user_name`, `order_user_email`, `order_date`, `order_user_id`, `order_approve`) VALUES
(1, 0, 0, 'pending', '', '', '', '', '', '0000-00-00', 0, ''),
(2, 11981, 24, 'pending', '', '', 'Gombe', '', '', '0000-00-00', 0, ''),
(3, 11981, 24, 'pending', '', 'on', 'Gombe', '', '', '0000-00-00', 0, ''),
(6, 11981, 24, 'unapprove', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '0000-00-00', 0, ''),
(7, 11981, 24, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '0000-00-00', 0, ''),
(10, 5769, 98, 'Deliverd', '', 'creditCard', 'Pantami', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(17, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(18, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(19, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(20, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(23, 16855, 36, 'placed', '', 'debitCard', 'GRA', 'Sea air order ', 'grammerproh@gmail.com', '2024-08-29', 5, ''),
(24, 16855, 36, 'placed', '', 'creditCard', 'GRA', 'Sea air order ', 'grammerproh@gmail.com', '2024-08-29', 5, ''),
(25, 1986, 749965, 'placed', '', 'paypal', 'Pantami', 'Mumu', 'mumu@gmail.com', '2024-08-29', 7, ''),
(26, 1986, 749965, 'placed', '', 'creditCard', 'bomala', 'Mumu', 'mumu@gmail.com', '2024-08-29', 7, ''),
(27, 55626, 750072, 'placed', '', 'creditCard', '', '', '', '2024-08-29', 7, ''),
(29, 11981, 24, 'Deliverd', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-30', 14, ''),
(30, 0, 0, 'pending', '', 'debitCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(31, 0, 0, 'placed', '', 'paypal', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(32, 0, 0, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(33, 0, 0, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(34, 0, 0, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(35, 99, 1, 'Deliverd', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(36, 84099, 3, 'Deliverd', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(37, 0, 0, 'pending', '', 'creditCard', 'Pantami', 'Baba', 'baba@baba.com', '2024-09-01', 20, ''),
(38, 2358, 3, 'Deliverd', '', 'creditCard', 'Pantami', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-01', 5, ''),
(39, 48, 1, 'pending', '', 'paypal', 'Abuja', 'adamufura', 'adamufura98@gmail.com', '2024-09-01', 6, ''),
(40, 2853, 8, 'pending', '', 'debitCard', 'twada Pantami', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-01', 5, ''),
(41, 48, 1, 'pending', '', 'creditCard', 'bomala', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-02', 5, ''),
(42, 48, 1, 'pending', '', 'creditCard', 'Sardauna', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-02', 5, ''),
(43, 5215, 7, 'Deliverd', '', 'creditCard', 'Pantami', 'Baba', 'baba@baba.com', '2024-09-02', 20, ''),
(44, 28584, 3, 'Deliverd', '', 'creditCard', 'Pantami', 'babas', 'ba@babas.com', '2024-09-03', 25, ''),
(45, 1365, 3, 'pending', '', 'creditCard', 'Pantami', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-09-04', 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` varchar(22) NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_tag` varchar(255) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  `product_purchase` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_price`, `product_description`, `product_image`, `product_tag`, `product_quantity`, `product_purchase`) VALUES
(15, 'Car', '1', 42000, 'the first womens clothing ever in town ', 'IMG-20231202-WA0045.jpg', 'womens, fashion, shop, used, necklace ', 2, 0),
(16, 'Bangles', '4', 48, 'the first womens clothing ever in town ', 'kangan-img.png', 'womens, fashion, shop, used, Bangles', 18, 0),
(17, 'mens shirt', '2', 99, 'the first mens clothing ever in town ', 'dress-shirt-img.png', 'mens, fashion, shop, used, shirt', 5, 0),
(18, 'Computer Desktop ', '1', 745, 'the first computer desktop ever in town ', 'computer-img.png', 'computer, new, tech,', 3, 0),
(19, 'Mobile phone ', '4', 455, 'the first mobile phone ever in town ', 'mobile-img.png', 'mobile phone old', 11, 0),
(20, 'Womens shirt', '5', 745, 'the first womens clothing ever in town ', 'women-clothes-img.png', 'womens fashion shop used', 22, 0),
(21, 'sports wear', '5', 786, 'the first sports clothing ever in town ', 'tshirt-img.png', 'sports siuu new goal', 254, 0),
(22, 'Jewellery ', '7', 7745, 'the first women earrings ever in town ', 'jhumka-img.png', 'women jewellery used', 0, 0),
(23, 'Lenovo x360 laptop', '1', 9654, 'This is a london used lenovo thinkpad laptop x360 compatible ', '1725376925888958790471500226843.jpg', 'Lenovo thinkpad laptop computer x360', 5, 0),
(24, 'Toyota Camry', '17', 9465, 'Brand new Toyota camry at affordable price', 'IMG-20231202-WA0045.jpg', 'Car camry new toyota', 4, 0),
(25, 'Siuu', '5', 0, 'Siuuuuubscribe', '17253768012833686078769079532478.jpg', 'Car camry new toyota', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userslist`
--

CREATE TABLE `userslist` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_phone` int(22) NOT NULL,
  `user_age` int(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userslist`
--

INSERT INTO `userslist` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_full_name`, `user_phone`, `user_age`, `user_gender`, `user_address`) VALUES
(5, 'Sea air order ', 'grammerproh@gmail.com', '00000', 'IMG_20190817_135548_1~2.jpg', 'Sea air order shipping ðŸ›³ ', 2147483647, 21, 'Male', ''),
(6, 'adamufura', 'adamufura98@gmail.com', '1234', 'IMG_20180829_061221_9.jpg', 'Adamu Fura Suleiman', 816664083, 26, 'Male', 'Abuja'),
(14, 'AdamuFura', 'ibrahimsfura03@gmail.com', '3360013', '20240325_204751.png', 'Ibrahim Suleiman Adamu', 203360013, 17, 'Male', 'Gombe'),
(17, 'CobraTate', 'ibrahimsfura03@gmail.com', 'andrew', '1696371040627.jpg', 'Ibrahim Suleiman', 2147483647, 1, 'Male', 'Pantami'),
(20, 'Baba', 'baba@baba.com', 'baba', '20240829_133531.jpg', 'Ibrahim Suleiman Adamu', 2147483647, 25, 'Male', 'Pantami'),
(22, 'baba', 'baba@baba.com', 'baba', '', '', 0, 0, '', ''),
(23, 'baba', 'baba@baba.com', 'baba', '', '', 0, 0, '', ''),
(25, 'babas', 'ba@babas.com', 'babas', '20240701_225924.jpg', 'siuuuuuuuuuuu', 2147483647, 993, 'Male', 'Pantami');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userslist`
--
ALTER TABLE `userslist`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `userslist`
--
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
CREATE TABLE `carts` (
  `cart_id` int(255) NOT NULL,
  `user_cart_id` int(255) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `cart_image` text NOT NULL,
  `cart_quantity` int(255) NOT NULL,
  `cart_price` int(255) NOT NULL,
  `product_cart_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `carts`
INSERT INTO `carts` (`cart_id`, `user_cart_id`, `cart_name`, `cart_image`, `cart_quantity`, `cart_price`, `product_cart_id`) VALUES
(1, 0, 'Womens shirt', 'women-clothes-img.png', 1, 745, 0),
(2, 0, 'mens shirt', 'dress-shirt-img.png', 3, 99, 0),
(3, 0, 'mens shirt', 'dress-shirt-img.png', 3, 99, 17),
(4, 0, 'mens shirt', 'dress-shirt-img.png', 1, 99, 17),
(133, 7, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(134, 7, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(142, 7, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(149, 14, 'mens shirt', 'dress-shirt-img.png', 1, 99, 17),
(154, 14, 'Car', 'IMG-20231202-WA0045.jpg', 1, 42000, 15),
(155, 14, 'Car', 'IMG-20231202-WA0045.jpg', 1, 42000, 15),
(157, 18, 'Car', 'IMG-20231202-WA0045.jpg', 2, 42000, 15),
(159, 6, 'Bangles', 'kangan-img.png', 1, 48, 16),
(160, 5, 'Bangles', '20240901_172020.jpg', 1, 48, 16),
(161, 5, 'Bangles', 'kangan-img.png', 5, 48, 16),
(162, 5, 'Womens shirt', 'women-clothes-img.png', 1, 745, 20),
(163, 20, 'Womens shirt', 'women-clothes-img.png', 3, 745, 20),
(164, 20, 'Computer Desktop ', 'computer-img.png', 3, 745, 18),
(165, 20, 'Computer Desktop ', 'computer-img.png', 1, 745, 18),
(166, 20, 'Jewellery ', 'jhumka-img.png', 0, 7745, 22),
(168, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0044.jpg', 1, 9654, 23),
(169, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0041.jpg', 1, 9654, 23),
(170, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0041.jpg', 1, 9654, 23),
(172, 5, 'Lenovo x360 laptop', 'IMG-20240902-WA0044.jpg', 1, 9654, 23),
(173, 25, 'Toyota Camry', 'IMG-20231202-WA0045.jpg', 2, 9465, 24),
(174, 25, 'Lenovo x360 laptop', '1725376925888958790471500226843.jpg', 1, 9654, 23),
(175, 25, 'Toyota Camry', 'IMG-20231202-WA0045.jpg', 4, 9465, 24),
(176, 17, 'Mobile phone ', 'mobile-img.png', 3, 455, 19);

-- --------------------------------------------------------

-- Table structure for table `category`
CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `category`
INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'General'),
(2, 'Furnitures'),
(4, 'Accessories'),
(5, 'Men'),
(6, 'Kids'),
(7, 'Women'),
(16, 'Kitchen'),
(17, 'Vehicles');

-- --------------------------------------------------------

-- Table structure for table `orders`
CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `order_total_price` int(255) NOT NULL,
  `order_total_quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_unapprove` varchar(255) NOT NULL,
  `order_payment_type` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_user_name` varchar(255) NOT NULL,
  `order_user_email` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_user_id` int(255) NOT NULL,
  `order_approve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `orders`
INSERT INTO `orders` (`order_id`, `order_total_price`, `order_total_quantity`, `order_status`, `order_unapprove`, `order_payment_type`, `order_address`, `order_user_name`, `order_user_email`, `order_date`, `order_user_id`, `order_approve`) VALUES
(1, 0, 0, 'pending', '', '', '', '', '', '0000-00-00', 0, ''),
(2, 11981, 24, 'pending', '', '', 'Gombe', '', '', '0000-00-00', 0, ''),
(3, 11981, 24, 'pending', '', 'on', 'Gombe', '', '', '0000-00-00', 0, ''),
(6, 11981, 24, 'unapprove', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '0000-00-00', 0, ''),
(7, 11981, 24, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '0000-00-00', 0, ''),
(10, 5769, 98, 'Deliverd', '', 'creditCard', 'Pantami', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(17, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(18, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(19, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(20, 5769, 98, 'Deliverd', '', 'paypal', 'bomala', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-08-29', 17, ''),
(23, 16855, 36, 'placed', '', 'debitCard', 'GRA', 'Sea air order ', 'grammerproh@gmail.com', '2024-08-29', 5, ''),
(24, 16855, 36, 'placed', '', 'creditCard', 'GRA', 'Sea air order ', 'grammerproh@gmail.com', '2024-08-29', 5, ''),
(25, 1986, 749965, 'placed', '', 'paypal', 'Pantami', 'Mumu', 'mumu@gmail.com', '2024-08-29', 7, ''),
(26, 1986, 749965, 'placed', '', 'creditCard', 'bomala', 'Mumu', 'mumu@gmail.com', '2024-08-29', 7, ''),
(27, 55626, 750072, 'placed', '', 'creditCard', '', '', '', '2024-08-29', 7, ''),
(29, 11981, 24, 'Deliverd', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-30', 14, ''),
(30, 0, 0, 'pending', '', 'debitCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(31, 0, 0, 'placed', '', 'paypal', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(32, 0, 0, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(33, 0, 0, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(34, 0, 0, 'pending', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(35, 99, 1, 'Deliverd', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(36, 84099, 3, 'Deliverd', '', 'creditCard', 'Gombe', 'AdamuFura', 'ibrahimsfura03@gmail.com', '2024-08-31', 14, ''),
(37, 0, 0, 'pending', '', 'creditCard', 'Pantami', 'Baba', 'baba@baba.com', '2024-09-01', 20, ''),
(38, 2358, 3, 'Deliverd', '', 'creditCard', 'Pantami', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-01', 5, ''),
(39, 48, 1, 'pending', '', 'paypal', 'Abuja', 'adamufura', 'adamufura98@gmail.com', '2024-09-01', 6, ''),
(40, 2853, 8, 'pending', '', 'debitCard', 'twada Pantami', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-01', 5, ''),
(41, 48, 1, 'pending', '', 'creditCard', 'bomala', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-02', 5, ''),
(42, 48, 1, 'pending', '', 'creditCard', 'Sardauna', 'Sea air order ', 'grammerproh@gmail.com', '2024-09-02', 5, ''),
(43, 5215, 7, 'Deliverd', '', 'creditCard', 'Pantami', 'Baba', 'baba@baba.com', '2024-09-02', 20, ''),
(44, 28584, 3, 'Deliverd', '', 'creditCard', 'Pantami', 'babas', 'ba@babas.com', '2024-09-03', 25, ''),
(45, 1365, 3, 'pending', '', 'creditCard', 'Pantami', 'CobraTate', 'ibrahimsfura03@gmail.com', '2024-09-04', 17, '');

-- --------------------------------------------------------

-- Table structure for table `products`
CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` varchar(22) NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_tag` varchar(255) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  `product_purchase` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `products`
INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_price`, `product_description`, `product_image`, `product_tag`, `product_quantity`, `product_purchase`) VALUES
(15, 'Car', '1', 42000, 'the first womens clothing ever in town ', 'IMG-20231202-WA0045.jpg', 'womens, fashion, shop, used, necklace ', 2, 0),
(16, 'Bangles', '4', 48, 'the first womens clothing ever in town ', 'kangan-img.png', 'womens, fashion, shop, used, Bangles', 18, 0),
(17, 'mens shirt', '2', 99, 'the first mens clothing ever in town ', 'dress-shirt-img.png', 'mens, fashion, shop, used, shirt', 5, 0),
(18, 'Computer Desktop ', '1', 745, 'the first computer desktop ever in town ', 'computer-img.png', 'computer, new, tech,', 3, 0),
(19, 'Mobile phone ', '4', 455, 'the first mobile phone ever in town ', 'mobile-img.png', 'mobile phone old', 11, 0),
(20, 'Womens shirt', '5', 745, 'the first womens clothing ever in town ', 'women-clothes-img.png', 'womens fashion shop used', 22, 0),
(21, 'sports wear', '5', 786, 'the first sports clothing ever in town ', 'tshirt-img.png', 'sports siuu new goal', 254, 0),
(22, 'Jewellery ', '7', 7745, 'the first women earrings ever in town ', 'jhumka-img.png', 'women jewellery used', 0, 0),
(23, 'Lenovo x360 laptop', '1', 9654, 'This is a london used lenovo thinkpad laptop x360 compatible ', '1725376925888958790471500226843.jpg', 'Lenovo thinkpad laptop computer x360', 5, 0),
(24, 'Toyota Camry', '17', 9465, 'Brand new Toyota camry at affordable price', 'IMG-20231202-WA0045.jpg', 'Car camry new toyota', 4, 0),
(25, 'Siuu', '5', 0, 'Siuuuuubscribe', '17253768012833686078769079532478.jpg', 'Car camry new toyota', 0, 0);

-- --------------------------------------------------------

-- Table structure for table `userslist`
CREATE TABLE `userslist` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_phone` int(22) NOT NULL,
  `user_age` int(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `userslist`
INSERT INTO `userslist` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_full_name`, `user_phone`, `user_age`, `user_gender`, `user_address`) VALUES
(5, 'Sea air order ', 'grammerproh@gmail.com', '00000', 'IMG_20190817_135548_1~2.jpg', 'Sea air order shipping ðŸ›³ ', 2147483647, 21, 'Male', ''),
(6, 'adamufura', 'adamufura98@gmail.com', '1234', 'IMG_20180829_061221_9.jpg', 'Adamu Fura Suleiman', 816664083, 26, 'Male', 'Abuja'),
(14, 'AdamuFura', 'ibrahimsfura03@gmail.com', '3360013', '20240325_204751.png', 'Ibrahim Suleiman Adamu', 203360013, 17, 'Male', 'Gombe'),
(17, 'CobraTate', 'ibrahimsfura03@gmail.com', 'andrew', '1696371040627.jpg', 'Ibrahim Suleiman', 2147483647, 1, 'Male', 'Pantami'),
(20, 'Baba', 'baba@baba.com', 'baba', '20240829_133531.jpg', 'Ibrahim Suleiman Adamu', 2147483647, 25, 'Male', 'Pantami'),
(22, 'baba', 'baba@baba.com', 'baba', '', '', 0, 0, '', ''),
(23, 'baba', 'baba@baba.com', 'baba', '', '', 0, 0, '', ''),
(25, 'babas', 'ba@babas.com', 'babas', '20240701_225924.jpg', 'siuuuuuuuuuuu', 2147483647, 993, 'Male', 'Pantami');

-- --------------------------------------------------------

-- Indexes for dumped tables

-- Indexes for table `admin_list`
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);

-- Indexes for table `carts`
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

-- Indexes for table `category`
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

-- Indexes for table `orders`
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

-- Indexes for table `products`
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

-- Indexes for table `userslist`
ALTER TABLE `userslist`
  ADD PRIMARY KEY (`user_id`);

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `admin_list`
ALTER TABLE `admin_list`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- AUTO_INCREMENT for table `carts`
ALTER TABLE `carts`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

-- AUTO_INCREMENT for table `category`
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

-- AUTO_INCREMENT for table `orders`
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

-- AUTO_INCREMENT for table `products`
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

-- AUTO_INCREMENT for table `userslist`
ALTER TABLE `userslist`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
