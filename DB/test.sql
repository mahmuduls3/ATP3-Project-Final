-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 08:55 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `c_image` varchar(200) NOT NULL,
  `active_posts` int(10) NOT NULL,
  `pending_posts` int(10) NOT NULL,
  `sold_posts` int(10) NOT NULL,
  `total_posts` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `name`, `password`, `type`, `phone`, `email`, `c_image`, `active_posts`, `pending_posts`, `sold_posts`, `total_posts`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '01787990813', 'admin@gmail.com', 'admin.png', 0, 0, 0, 0),
(2, 'moderator', 'moderator', 'moderator', 'moderator', '01743328547', 'moderator@gmail.com', 'moderator.jpg', 0, 0, 0, 0),
(3, 'employee', 'employee', 'employee', 'employee', '1245789632', 'employee@gmail.com', 'employee.png', 0, 0, 0, 0),
(4, 'customer', 'customer', 'customer', 'customer', '01111111111', 'customer@gmail.com', 'customer.png', 2, 0, 3, 5),
(5, 'mah123', 'Mahmudul', 'mah123', 'customer', '01756102305', 'mahmudulhossain786@gmail.com', 'mah123.jpg', 3, 2, 0, 5),
(6, 'himel11', 'himel11', 'himel11', 'customer', '1234567199', 'himel11@gmail.com', 'himel11.jpg', 2, 1, 0, 4),
(7, 'aziz99', 'Sahil Aziz', 'aziz99', 'customer', '01525825825', 'sahilaziz99@gmail.com', 'aziz99.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(20) NOT NULL,
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `msg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `from`, `to`, `msg`, `msg_date`) VALUES
(1, 'mah123', 'admin', 'Please, allow my post', '2020-02-06'),
(2, 'mah123', 'admin', 'My post has not been allowed since 2 days', '2020-02-08'),
(3, 'customer', 'mah123', 'Hey, I want to contact with you about your property', '2020-02-08'),
(4, 'customer', 'admin', 'Can u please allow my rent post?', '2020-02-09'),
(5, 'himel11', 'mah123', 'I am interested in your post', '2020-02-11'),
(6, 'mah123', 'himel11', 'Can I have a visit to your property?', '2020-02-11'),
(7, 'himel11', 'admin', 'I cant find my uploaded post. Can u please help?', '2020-02-12'),
(8, 'customer', 'admin', 'I have a small suggestion', '2020-02-22'),
(9, 'mah123', 'customer', 'I am interested in your property', '2020-02-23'),
(10, 'customer', 'himel11', 'Please, contact me for more details', '2020-02-23'),
(11, 'himel11', 'customer', 'Can I have your location please?', '2020-02-24'),
(12, 'admin', 'mah123', 'Approved your post', '2020-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `username` varchar(200) NOT NULL,
  `property_id` int(10) NOT NULL,
  `property_price` int(200) NOT NULL,
  `property_area` varchar(256) NOT NULL,
  `p_type` varchar(10) NOT NULL,
  `style` varchar(200) NOT NULL,
  `bed` int(10) NOT NULL,
  `bath` int(10) NOT NULL,
  `feet` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_of_clicks` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`username`, `property_id`, `property_price`, `property_area`, `p_type`, `style`, `bed`, `bath`, `feet`, `title`, `floor`, `description`, `status`, `no_of_clicks`, `date`) VALUES
('mah123', 1, 12000, 'Uttara', 'apartment', 'rent', 2, 2, 300, '2 bath 2 bed Uttara', '5', '2 bath 2 bed Uttara2 bath 2 bed Uttara2 bath 2 bed Uttara2 bath 2 bed Uttara', 'allowed', 19, '2020-02-01'),
('himel11', 2, 20000, 'Bashundhara', 'apartment', 'rent', 3, 3, 950, 'Full furnished apartment', '3', '3 bed 3 bath Full furnished apartment', 'denied', 25, '2020-02-03'),
('mah123', 3, 6500, 'Bashundhara', 'room', 'rent', 1, 1, 120, 'Single room with attached bathroom', '6', 'Single room with attached bathroomSingle room with attached bathroom', 'allowed', 30, '2020-02-04'),
('customer', 4, 25000000, 'Gulshan', 'house', 'sell', 4, 5, 2100, '2100 sqft 4 bed 5 bath', '3', '2100 sqft 4 bed 5 bath2100 sqft 4 bed 5 bath2100 sqft 4 bed 5 bath', 'sold', 25, '2020-02-04'),
('customer', 5, 12500, 'Badda', 'flat', 'rent', 2, 2, 550, '550 sqft flat Badda', '2', '550 sqft flat Badda550 sqft flat Badda550 sqft flat Badda', 'allowed', 21, '2020-02-07'),
('himel11', 6, 18000, 'Dhanmondi', 'flat', 'rent', 2, 2, 750, '750 sqft flat 2 bed 2 bath Dhanmondi', '5', '750 sqft flat 2 bed 2 bath Dhanmondi750 sqft flat 2 bed 2 bath Dhanmondi', 'featured', 0, '2020-02-08'),
('himel11', 7, 7500, 'Bashundhara', 'room', 'rent', 1, 1, 100, '1 room 1 bath Bashundhara', '5', '1 room 1 bath Bashundhara1 room 1 bath Bashundhara', 'pending', 0, '2020-02-10'),
('customer', 8, 16000000, 'Uttara', 'shop', 'sell', 0, 0, 1200, '1200 sqft shoop for sell', '0', '1200 sqft shoop for sell1200 sqft shoop for sell1200 sqft shoop for sell', 'sold', 13, '2020-02-16'),
('mah123', 9, 15000, 'Bashundhara', 'other', 'rent', 2, 2, 900, '900 sqft 2 bed 2 bath Bashundhara', '6', '900 sqft 2 bed 2 bath Bashundhara900 sqft 2 bed 2 bath Bashundhara', 'pending', 0, '2020-02-17'),
('himel11', 10, 21000000, 'Banani', 'apartment', 'sell', 4, 5, 2150, 'Luxurious apartment for sell', '4', 'Luxurious apartment for sellLuxurious apartment for sell', 'allowed', 22, '2020-02-17'),
('mah123', 11, 80000, 'Tongi', 'shop', 'rent', 0, 0, 850, 'Shop for rent Tongi', '0', 'Shop for rent TongiShop for rent TongiShop for rent Tongi', 'pending', 36, '2020-02-17'),
('customer', 12, 8500, 'Badda', 'room', 'rent', 1, 1, 120, 'Room for bachelor Badda', '3', 'Room for bachelor BaddaRoom for bachelor BaddaRoom for bachelor Badda', 'sold', 21, '2020-02-19'),
('mah123', 13, 7000, 'Kuril', 'room', 'rent', 1, 1, 100, 'Bachelor room available in Kuril', '6', 'Bachelor room available in KurilBachelor room available in Kuril', 'allowed', 0, '2020-02-20'),
('customer', 14, 15000000, 'Mirpur', 'flat', 'sell', 3, 3, 1650, 'Ready flat for sell in mirpur', '4', 'Ready flat for sell in mirpurReady flat for sell in mirpur', 'allowed', 12, '2020-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `property_picture`
--

CREATE TABLE `property_picture` (
  `property_id` int(20) NOT NULL,
  `property_image_id` int(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_picture`
--

INSERT INTO `property_picture` (`property_id`, `property_image_id`, `image`) VALUES
(1, 1, 'property/1/1.jpg'),
(1, 2, 'property/1/2.jpg'),
(1, 3, 'property/1/3.jpg'),
(2, 4, 'property/2/4.jpg'),
(2, 5, 'property/2/5.jpg'),
(2, 6, 'property/2/6.jpg'),
(3, 7, 'property/3/7.jpg'),
(3, 8, 'property/3/8.jpg'),
(3, 9, 'property/3/9.jpg'),
(4, 10, 'property/4/10.jpg'),
(4, 11, 'property/4/11.jpg'),
(4, 12, 'property/4/12.jpg'),
(5, 13, 'property/5/13.jpg'),
(5, 14, 'property/5/14.jpg'),
(5, 15, 'property/5/15.jpg'),
(6, 16, 'property/6/16.jpg'),
(6, 17, 'property/6/17.jpg'),
(6, 18, 'property/6/18.jpg'),
(7, 19, 'property/7/19.jpg'),
(7, 20, 'property/7/20.jpg'),
(7, 21, 'property/7/21.jpg'),
(8, 22, 'property/8/22.jpg'),
(8, 23, 'property/8/23.jpg'),
(8, 24, 'property/8/24.jpg'),
(9, 25, 'property/9/25.jpg'),
(9, 26, 'property/9/26.jpg'),
(9, 27, 'property/9/27.jpg'),
(10, 28, 'property/10/28.jpg'),
(10, 29, 'property/10/29.jpg'),
(10, 30, 'property/10/30.jpg'),
(11, 31, 'property/11/31.jpg'),
(11, 32, 'property/11/32.jpg'),
(11, 33, 'property/11/33.jpg'),
(12, 34, 'property/12/34.jpg'),
(12, 35, 'property/12/35.jpg'),
(12, 36, 'property/12/36.jpg'),
(13, 37, 'property/13/37.jpg'),
(13, 38, 'property/13/38.jpg'),
(13, 39, 'property/13/39.jpg'),
(14, 40, 'property/14/40.jpg'),
(14, 41, 'property/14/41.jpg'),
(14, 42, 'property/14/42.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_picture`
--
ALTER TABLE `property_picture`
  ADD PRIMARY KEY (`property_image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `property_picture`
--
ALTER TABLE `property_picture`
  MODIFY `property_image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
