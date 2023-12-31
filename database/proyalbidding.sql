-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 07:57 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyalbidding`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `bid_amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '=bid,2=confirmed,3=cancelled',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unpaid,1=paid',
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `product_id`, `bid_amount`, `status`, `payment_status`, `date_created`) VALUES
(2, 5, 1, 7500, 1, 1, '2023-06-17 13:34:45'),
(4, 5, 3, 155000, 1, 1, '2023-06-17 13:41:06'),
(5, 6, 4, 15000, 1, 1, '2023-06-17 12:03:54'),
(6, 7, 5, 2, 1, 0, '2023-06-15 10:47:52'),
(7, 6, 5, 2, 1, 1, '2023-06-17 13:52:32'),
(8, 6, 5, 1, 1, 1, '2023-06-17 12:58:56'),
(9, 5, 6, 950, 1, 0, '2023-06-17 13:46:46'),
(10, 6, 6, 1000, 1, 0, '2023-06-17 13:50:03'),
(11, 7, 6, 1200, 1, 1, '2023-06-17 14:07:44'),
(12, 6, 7, 1, 1, 1, '2023-06-17 14:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Sample Category'),
(2, 'Appliances'),
(3, 'Desktop Computers'),
(4, 'Laptop'),
(5, 'Mobile Phone'),
(6, 'Clothes'),
(7, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `amount` double(25,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `transaction_code`, `amount`, `user_id`, `bid_id`, `date`) VALUES
(1, 'QY64SD4576G6', 1.00, 6, 8, '2023-06-17 12:58:56'),
(2, 'QY64SD45768D', 7500.00, 5, 2, '2023-06-17 13:34:45'),
(3, 'MY67SY85768C', 155000.00, 5, 4, '2023-06-17 13:41:06'),
(4, 'KY67SY85768C', 2.00, 6, 7, '2023-06-17 13:52:32'),
(5, 'PM54SX4526H1', 1200.00, 7, 11, '2023-06-17 14:07:44'),
(6, 'NZ67SY85788F', 1.00, 6, 12, '2023-06-17 14:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `start_bid` float NOT NULL,
  `regular_price` float NOT NULL,
  `bid_end_datetime` datetime NOT NULL,
  `img_fname` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `start_bid`, `regular_price`, `bid_end_datetime`, `img_fname`, `date_created`) VALUES
(1, 5, 'Sample Smart Phone', 'Sample only', 7000, 7000, '2020-10-27 19:00:00', '1.jpg', '2020-10-27 09:50:54'),
(3, 1, 'Gadget Package', 'Sample ', 150000, 15000, '2020-10-27 17:00:00', '3.jpg', '2020-10-27 09:59:39'),
(4, 4, 'HP FOLIO ELITEBOOK', '4GB RAM, 500GB HDD, 2.7GHZ.', 15000, 25000, '2023-06-15 10:40:00', '4.png', '2023-06-15 10:09:33'),
(5, 1, 'pork Meat 1kg', 'Pork Meat 1kg', 1, 450, '2023-06-15 10:50:00', '5.jpg', '2023-06-15 10:45:23'),
(6, 1, 'Eggs 2 Trays', 'Eggs 2 Trays', 900, 1000, '2023-06-17 13:50:00', '6.jpg', '2023-06-17 13:44:45'),
(7, 1, 'Nyama Choma', 'Nyama Choma', 1500, 1200, '2023-06-17 14:27:00', '7.jpeg', '2023-06-17 14:25:56');

-- --------------------------------------------------------



--
-- Table structure for table `upcomingproducts`
--

CREATE TABLE `upcomingproducts` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `bid_start_datetime` datetime NOT NULL,
  `regular_price` float NOT NULL,
  `img_fname` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcomingproducts`
--

INSERT INTO `upcomingproducts` (`id`, `category_id`, `name`, `description`, `start_bid`, `regular_price`, `bid_end_datetime`, `img_fname`, `date_created`) VALUES
(1, 5, 'Sample Smart Phone', 'Sample only', 7000, 7000, '2020-10-27 19:00:00', '1.jpg', '2020-10-27 09:50:54'),
(3, 1, 'Gadget Package', 'Sample ', 150000, 15000, '2020-10-27 17:00:00', '3.jpg', '2020-10-27 09:59:39'),
(4, 4, 'HP FOLIO ELITEBOOK', '4GB RAM, 500GB HDD, 2.7GHZ.', 15000, 25000, '2023-06-15 10:40:00', '4.png', '2023-06-15 10:09:33'),
(5, 1, 'pork Meat 1kg', 'Pork Meat 1kg', 1, 450, '2023-06-15 10:50:00', '5.jpg', '2023-06-15 10:45:23'),
(6, 1, 'Eggs 2 Trays', 'Eggs 2 Trays', 900, 1000, '2023-06-17 13:50:00', '6.jpg', '2023-06-17 13:44:45'),
(7, 1, 'Nyama Choma', 'Nyama Choma', 1500, 1200, '2023-06-17 14:27:00', '7.jpeg', '2023-06-17 14:25:56');

-- --------------------------------------------------------












--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Proyal Auction Bidding System', 'info@proyalauctionbid.co.ke', '+25412345678', '1603344720_1602738120_pngtree-purple-hd-business-banner-image_5493.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Subscriber',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `contact`, `address`, `type`, `date_created`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', '+123456789', '', 1, '2020-10-27 09:19:59'),
(5, 'John Smith', 'jsmith', '1254737c076cf867dc53d60a0364f38e', 'jsmith@sample.com', '+18456-5455-55', 'Sample', 2, '2020-10-27 14:18:32'),
(6, 'Joseph Njuguna', 'Joseph', 'cb07901c53218323c4ceacdea4b23c98', 'joseph@gmail.com', '0727083400', 'Nairobi', 2, '2023-06-15 10:27:55'),
(7, 'Alice Mwangi', 'Alice', '6384e2b2184bcbf58eccf10ca7a6563c', 'alice@gmail.com', '0712345435', 'Kiambu', 2, '2023-06-15 10:47:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
