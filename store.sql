-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql106.byetcluster.com
-- Generation Time: Jun 04, 2022 at 06:50 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eb2a_31635028_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `mybag`
--

CREATE TABLE `mybag` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` int(100) NOT NULL,
  `count` int(100) NOT NULL,
  `total` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(100) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `count`, `image`) VALUES
(93, 'watermelon', 'fruits', 3, 79, 'img/prod/cart-img-1.png'),
(95, 'chicken', 'meat', 60, 39, 'img/prod/cart-img-3.png'),
(96, 'tangerine', 'fruits', 4, 22, 'img/prod/product-1.png'),
(98, 'botatos', 'vegetables', 3, 86, 'img/prod/product-5.png'),
(99, 'carrots', 'vegetables', 3, 15, 'img/prod/product-7.png'),
(100, 'lemon', 'fruits', 5, 197, 'img/prod/product-8.png'),
(101, 'milk', 'dairy', 6, 197, 'img/prod/men (1).png'),
(113, 'Ø¬Ø¨Ù†', 'Ø§Ù„Ø¨Ø§Ù†', 20, 99, 'img/prod/download.jpg'),
(114, 'Ø¨ÙŠØ¶', 'Ø§Ù„Ø¨Ø§Ù†', 30, 95, 'img/prod/download (3).jpg'),
(115, 'Ù‚Ù‡ÙˆÙ‡', 'Ø§Ù„Ø¨Ø§Ù†', 3, 100, 'img/prod/men (1).png'),
(116, 'Ø¯Ø¬Ø§Ø¬', 'Ù„Ø­ÙˆÙ…', 40, 100, 'img/prod/chicken.png'),
(117, 'Ø³Ù…Ùƒ', 'Ù„Ø­ÙˆÙ…', 60, 100, 'img/prod/oily fishes.png'),
(118, 'Ù„Ø­ÙˆÙ…', 'Ù„Ø­ÙˆÙ…', 120, 100, 'img/prod/product-3.png'),
(119, 'Ø¹Ù†Ø¨ Ø§Ø®Ø¶Ø±', 'ÙÙˆØ§ÙƒÙ‡', 15, 100, 'img/prod/green grapes.png'),
(120, 'Ø¹Ù†Ø¨ Ø§Ø²Ø±Ù‚', 'ÙÙˆØ§ÙƒÙ‡', 16, 100, 'img/prod/blue grapes.png'),
(121, 'Ø¨Ø·ÙŠØ®', 'ÙÙˆØ§ÙƒÙ‡', 10, 100, 'img/prod/cart-img-1.png'),
(122, 'ÙØ±Ø§ÙˆÙ„Ù‡', 'ÙÙˆØ§ÙƒÙ‡', 20, 100, 'img/prod/strawberry.png'),
(123, 'ÙŠÙˆØ³ÙÙŠ', 'ÙÙˆØ§ÙƒÙ‡', 4, 100, 'img/prod/product-1.png'),
(124, 'Ø¨Ø±ØªÙ‚Ø§Ù„', 'ÙÙˆØ§ÙƒÙ‡', 5, 100, 'img/prod/orange.png'),
(125, 'Ù…ÙˆØ²', 'ÙÙˆØ§ÙƒÙ‡', 7, 100, 'img/prod/banana.png'),
(126, 'Ø¬Ø²Ø±', 'Ø®Ø¶Ø±Ø§ÙˆØ§Øª', 3, 100, 'img/prod/carrot.png'),
(127, 'Ø¨ØµÙ„', 'Ø®Ø¶Ø±Ø§ÙˆØ§Øª', 5, 100, 'img/prod/cart-img-2.png'),
(128, 'Ø¨Ø±ÙˆÙƒÙ„ÙŠ', 'Ø®Ø¶Ø±Ø§ÙˆØ§Øª', 20, 100, 'img/prod/broccoli.png'),
(129, 'ÙƒØ±Ù†Ø¨', 'Ø®Ø¶Ø±Ø§ÙˆØ§Øª', 14, 100, 'img/prod/cabbage.png'),
(130, 'ÙÙ„ÙÙ„', 'Ø®Ø¶Ø±Ø§ÙˆØ§Øª', 3, 100, 'img/prod/capsicum.png'),
(131, 'Ø¨Ø·Ø§Ø·Ø³', 'Ø®Ø¶Ø±Ø§ÙˆØ§Øª', 5, 100, 'img/prod/product-5.png'),
(132, 'Ø·Ù…Ø§Ø·Ù…', 'Ø®Ø¶Ø±Ø§ÙˆØ§Øª', 10, 100, 'img/prod/tomato.png');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `productname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `userid`, `username`, `productname`, `category`, `price`, `count`, `total`, `time`) VALUES
(38, 20, 'abdo', 'watermelon', 'fruits', 3, 5, 15, '2022-05-11 02:02:08'),
(39, 20, 'abdo', 'tangerine', 'fruits', 4, 1, 4, '2022-05-11 02:02:08'),
(40, 20, 'abdo', 'botatos', 'vegetables', 3, 1, 3, '2022-05-11 02:02:08'),
(41, 20, 'abdo', 'lemon', 'fruits', 5, 1, 5, '2022-05-11 02:02:08'),
(42, 20, 'abdo', 'Ø¬Ø¨Ù†', 'Ø§Ù„Ø¨Ø§Ù†', 20, 1, 20, '2022-05-11 11:59:52'),
(43, 20, 'abdo', 'Ø¨ÙŠØ¶', 'Ø§Ù„Ø¨Ø§Ù†', 30, 5, 150, '2022-05-11 11:59:52'),
(47, 24, 'abdo', 'tangerine', 'fruits', 4, 1, 4, '2022-05-13 03:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `userid` int(100) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `useremail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `userpassword` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`userid`, `username`, `useremail`, `userpassword`) VALUES
(19, 'mohammedgoda', 'mohammedgoda@gmail.com', '12345'),
(20, 'abdo', 'abdo@abdo.abdo', 'abdo'),
(21, 'mama', 'mama@gmail.com', '123'),
(22, 'Salma', 'salmasayedays@gmail.com', '12345'),
(24, 'abdo', 'abdogoda0a@gmail.com', '123'),
(25, 'mms', 'mms@m', 'mm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mybag`
--
ALTER TABLE `mybag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `name` (`username`),
  ADD KEY `email` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mybag`
--
ALTER TABLE `mybag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
