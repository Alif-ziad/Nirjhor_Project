-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 02:13 PM
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
(1, 1, 'here', 72.00, '2026-01-21 10:09:31'),
(2, 1, 'there', 10.00, '2026-01-21 10:16:01'),
(3, 0, 'here', 611.00, '2026-01-21 12:09:51'),
(4, 0, 'here', 11.00, '2026-01-21 12:25:15'),
(5, 0, 'ogi', 611.00, '2026-01-21 12:26:08'),
(6, 1, 'toji', 761.00, '2026-01-21 12:56:12'),
(7, 9, 'uttara,Dhaka', 611.00, '2026-01-21 12:59:55');

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
(1, 1, 'dana', 11.00, 2),
(2, 1, 'longcoat', 50.00, 1),
(3, 2, '###', 10.00, 1),
(4, 3, 'dana', 11.00, 1),
(5, 3, 'carpet', 600.00, 1),
(6, 4, 'dana', 11.00, 1),
(7, 5, 'dana', 11.00, 1),
(8, 5, 'carpet', 600.00, 1),
(9, 6, 'mandala', 750.00, 1),
(10, 6, 'dana', 11.00, 1),
(11, 7, 'carpet', 600.00, 1),
(12, 7, 'dana', 11.00, 1);

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
(16, 'dana', 11.00, 'sads', 6, '../assets/images/1768990048_anime-cyberpunk-24-09-2024-1727169479-hd-wallpaper (2).jpg', 'approved', 0),
(17, 'carpet', 600.00, 'carpet', 3, '../assets/images/1768995100_588492106_122177474462463724_5587239768727540950_n.jpg', 'approved', 0),
(22, 'mandala', 750.00, 'gkrdjhfgsdryufghsdui', 8, '../assets/images/1769000084_529377098_122164510082463724_4849606914220736832_n.jpg', 'approved', 0),
(24, 'table runnersets', 200.00, 'xfvgdfg', 8, '../assets/images/1769000965_534589221_122165551658463724_1209664715243495406_n.jpg', 'approved', 0),
(25, 'floormat', 600.00, 'sdfderg', 8, '../assets/images/1769000992_557597393_122171551970463724_5104079946562486132_n.jpg', 'approved', 0);

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
(11, 'Ahad', 'go123@gmail.com', '654321', 'seller', 'approved', 'Nirjhor', 'House-3, Road-5/A, Ranavola, PO-Nishatnogor, Turag', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
