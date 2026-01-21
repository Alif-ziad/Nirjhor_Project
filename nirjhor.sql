-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 08:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nirjhor`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address`, `total_amount`, `created_at`) VALUES
(8, 1, 'home', 800.00, '2026-01-21 15:05:36'),
(9, 12, 'here', 750.00, '2026-01-21 18:39:58'),
(10, 1, 'home', 2400.00, '2026-01-21 18:56:05'),
(11, 1, 'here', 1200.00, '2026-01-21 19:00:40'),
(12, 14, 'wherever', 6600.00, '2026-01-21 19:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `price`, `quantity`) VALUES
(13, 8, 'tablerunner', 800.00, 1),
(14, 9, 'floormat', 750.00, 1),
(15, 10, 'Jute rugs', 400.00, 1),
(16, 10, 'tablerunner', 800.00, 1),
(17, 10, 'carpet', 1200.00, 1),
(18, 11, 'carpet', 1200.00, 1),
(19, 12, 'tablerunner', 800.00, 1),
(20, 12, 'Jute rugs', 400.00, 1),
(21, 12, 'carpet', 1200.00, 1),
(22, 12, 'table mat', 1500.00, 1),
(23, 12, 'mandala', 600.00, 1),
(24, 12, 'table runnersets', 2100.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('pending','approved','denied') NOT NULL DEFAULT 'pending',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `description`, `seller_id`, `image`, `status`, `is_approved`) VALUES
(26, 'tablerunner', 800.00, 'rtert', 8, '1769005648_558165426_122171551784463724_3140025047568713329_n.jpg', 'approved', 0),
(27, 'Jute rugs', 400.00, 'traditional jute rug', 8, '1769006319_555740378_122170805960463724_2217594395217886426_n.jpg', 'approved', 0),
(28, 'carpet', 1200.00, 'traditional carpet', 8, '1769006364_589070627_122177474576463724_5043223610391721652_n.jpg', 'approved', 0),
(29, 'table mat', 1500.00, 'handcrafted table mat', 8, '1769006417_558836388_122172172226463724_7956558289952279520_n.jpg', 'approved', 0),
(30, 'mandala', 600.00, 'traditional Mandala set', 8, '1769006448_529313938_122164510040463724_5271495211534406848_n.jpg', 'approved', 0),
(31, 'table runnersets', 2100.00, 'handcrafted Table Runnerset', 3, '1769007021_515506665_122167090166463724_1379565295378265500_n.jpg', 'approved', 0),
(32, 'floormat', 900.00, 'handcrafted floormat', 3, '1769007055_557246474_122171551742463724_5225823396527785662_n.jpg', 'approved', 0),
(33, 'floormat', 750.00, 'traditional floormat', 13, '1769020690_557630547_122171663270463724_2040598598210926666_n.jpg', 'approved', 0),
(34, 'Mandala', 500.00, 'traditional mandela', 15, '1769023093_529313938_122164510040463724_5271495211534406848_n.jpg', 'approved', 0),
(35, 'table runners', 700.00, 'table runners', 3, '1769023250_556630139_122171203100463724_2555731906867840531_n.jpg', 'approved', 0),
(36, 'tablerunner', 800.00, 'tablerunner', 11, '1769023758_556630139_122171203100463724_2555731906867840531_n.jpg', 'approved', 0),
(37, 'floormat', 500.00, 'floormat', 11, '1769023783_557246474_122171551742463724_5225823396527785662_n.jpg', 'approved', 0),
(38, 'carpet', 1200.00, 'carpet', 11, '1769023808_589184648_122177475236463724_2091501119575102413_n.jpg', 'approved', 0),
(39, 'jute rugs', 300.00, 'jute rugs', 11, '1769023832_556089127_122170806044463724_3982295227740083175_n.jpg', 'approved', 0),
(40, 'table runnerset', 2200.00, 'table runnerset', 11, '1769023868_535185108_122166041390463724_7509769211779346208_n.jpg', 'approved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','seller','customer') NOT NULL,
  `status` enum('pending','approved','blocked') NOT NULL,
  `shop_name` varchar(100) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `shop_name`, `shop_address`, `is_approved`) VALUES
(1, 'toji', 'toji2011@gmail.com', 'toji', 'customer', 'approved', NULL, NULL, 1),
(2, 'nezo', 'nezo1999@gmail.com', 'nezo', 'admin', 'approved', NULL, NULL, 1),
(3, 'fumi', 'fumi2000@gmail.com', 'fumi', 'seller', 'approved', NULL, NULL, 1),
(4, 'minho', 'minho@gmail.com', '1234', 'customer', 'pending', '', '', 1),
(6, 'tamashi', 'tamashi@gmail.com', '1234', 'seller', 'approved', 'fgbgfb', 'fgbgfb', 1),
(7, 'ogi', 'ogi@gmail.com', '1234', 'customer', 'pending', '', '', 1),
(8, 'ben', 'ben@gmail.com', '1234', 'seller', 'approved', 'fwefwer', 'sdfvsrfgs', 1),
(9, 'junayed', 'junyedahad47@gmail.com', '12345678', 'customer', 'pending', '', '', 1),
(11, 'Ahad', 'go123@gmail.com', '654321', 'seller', 'approved', 'Nirjhor', 'House-3, Road-5/A, Ranavola, PO-Nishatnogor, Turag', 1),
(12, 'gojo', 'gojo@gmail.com', 'gojo', 'customer', 'pending', '', '', 1),
(13, 'otto', 'otto@gmail.com', 'otto', 'seller', 'approved', 'otto-totto', 'impel dawn', 1),
(14, 'felix', 'felix@gmail.com', '1234', 'customer', 'pending', '', '', 1),
(15, 'bento', 'bento@gmail.com', '1234', 'seller', 'approved', 'bentvent', 'bent street', 1),
(16, 'admin', 'admin@gmail.com', 'admin', 'admin', 'approved', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
