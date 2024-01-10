-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 04:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donut_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL,
  `categorieCreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`, `categorieCreateDate`) VALUES
(1, 'Classic Donuts', '2021-03-17 18:16:28'),
(2, 'Sandwiches', '2023-12-07 23:38:51'),
(25, 'Shakes', '2023-12-07 23:57:40'),
(26, 'Coffee', '2023-12-08 00:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `donut`
--

CREATE TABLE `donut` (
  `donutId` int(12) NOT NULL,
  `donutName` varchar(255) NOT NULL,
  `donutPrice` int(12) NOT NULL,
  `donutDesc` text NOT NULL,
  `donutCategorieId` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donut`
--

INSERT INTO `donut` (`donutId`, `donutName`, `donutPrice`, `donutDesc`, `donutCategorieId`) VALUES
(1, 'Nutella', 295, 'Delicious Nutella topped donut', 1),
(2, 'Confetti', 295, 'Delicious milk chocolate frosting sprinkled with joy', 1),
(3, 'Chocolate', 295, 'Supremely light & airy, topped with decadent milk chocolate', 1),
(4, 'Glazed', 295, 'Light, airy and fluffy\r\n\r\n', 1),
(5, 'Lotus', 295, 'Indulgent lotus ganache topped with lotus crumble', 1),
(6, 'Opera', 295, 'Topped with milk chocolate ganache, peanut butter caramel and salted roasted peanuts', 1),
(7, 'Cinnamon Swirl', 295, 'Fluffy, brioche cinnamon swirl donut with cream cheese forsting drizzle', 1),
(69, 'Fajita', 531, 'Delicious chicken tikka sandwich', 2),
(70, 'Alaska', 496, 'Indulge Into A Smooth And Frothy Experience', 25),
(71, 'Cappuccino', 354, 'We Evenly Distribute Espresso, Steamed And Foamed Milk To Create The Perfect Cappuccino.', 26),
(72, 'Latte', 254, 'Our Lattes Are A Strong And Frothy Blend Of Espresso And Steamed Milk.', 26),
(73, 'Carnita', 531, 'Spicy Chicken Sandwich with cheese', 2),
(74, 'Oreo', 496, 'A Perfect Delight For All Those Oreo Lovers', 25),
(75, 'Salted Caramel', 575, 'A Creamy salted Caramel Shake', 25);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `donutId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `donutId`, `itemQuantity`) VALUES
(1, 1, 2, 1),
(7, 4, 2, 1),
(8, 4, 69, 1),
(9, 4, 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES
(1, 1, 'Plot d, 12, Block D North Nazimabad Town, Karachi, Karachi City, Sindh 74600, abc', 444444, 4444444444, 199, '0', '0', '2023-12-02 21:17:10'),
(4, 6, 'Plot d, 12, Block D North Nazimabad Town, Karachi, Karachi City, Sindh 74600, near Imtiaz Supermarket', 123456, 3360988210, 1322, '0', '0', '2024-01-10 15:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i'),
(6, 'ashfia_150', 'Ashfia', 'Binte Waqar', 'ashfia@gmail.com', 3360988210, '0', '$2y$10$Byeumdzn.Ok1p2l/ZMeWmuNRn0nr48vWlq8vPGDrZb4UPdCXn5s86');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `donutId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`cartItemId`, `donutId`, `itemQuantity`, `userId`, `addedDate`) VALUES
(21, 1, 1, 3, '2023-12-08 10:05:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieId`);

--
-- Indexes for table `donut`
--
ALTER TABLE `donut`
  ADD PRIMARY KEY (`donutId`),
  ADD KEY `donutCategorieId` (`donutCategorieId`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donutId` (`donutId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`),
  ADD KEY `donutId` (`donutId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `donut`
--
ALTER TABLE `donut`
  MODIFY `donutId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donut`
--
ALTER TABLE `donut`
  ADD CONSTRAINT `donut_ibfk_1` FOREIGN KEY (`donutCategorieId`) REFERENCES `categories` (`categorieId`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`donutId`) REFERENCES `donut` (`donutId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD CONSTRAINT `viewcart_ibfk_1` FOREIGN KEY (`donutId`) REFERENCES `donut` (`donutId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
