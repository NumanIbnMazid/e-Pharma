-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 09:55 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Capsule'),
(2, 'Injection'),
(3, 'Tablet'),
(4, 'Test Cat'),
(5, 'Vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `gelary`
--

CREATE TABLE `gelary` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gelary`
--

INSERT INTO `gelary` (`id`, `image`, `description`) VALUES
(1, 'AMODIS-400.jpg', 'new image');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `date_of_purchase` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_delivery` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_total`, `date_of_purchase`, `date_of_delivery`, `customer_id`) VALUES
(1, 172, '2017-07-20 02:44:09', '0000-00-00', 5),
(2, 35, '2017-07-20 02:53:53', '0000-00-00', 5),
(3, 35, '2017-07-20 02:57:02', '0000-00-00', 5),
(4, 35, '2017-07-20 03:08:37', '0000-00-00', 5),
(5, 40, '2017-07-20 03:09:08', '0000-00-00', 5),
(6, 40, '2017-07-20 03:09:52', '0000-00-00', 5),
(7, 40, '2017-07-20 03:10:45', '0000-00-00', 5),
(8, 55, '2017-07-20 03:11:13', '0000-00-00', 5),
(9, 15, '2017-07-20 03:12:44', '0000-00-00', 5),
(10, 30, '2017-07-20 03:13:16', '0000-00-00', 5),
(11, 30, '2017-07-20 03:13:55', '0000-00-00', 5),
(12, 25, '2017-07-20 03:16:04', '0000-00-00', 5),
(13, 25, '2017-07-20 03:20:02', '0000-00-00', 5),
(14, 70, '2017-07-20 03:22:53', '0000-00-00', 5),
(15, 284, '2017-07-20 03:37:08', '0000-00-00', 5),
(16, 284, '2017-07-20 03:37:34', '0000-00-00', 5),
(17, 284, '2017-07-20 03:39:11', '0000-00-00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `unit_price`, `order_quantity`, `subtotal`) VALUES
(1, 1, 3, 2, 20, 60),
(2, 1, 5, 10, 5, 50),
(3, 14, 1, 15, 2, 30),
(4, 14, 5, 10, 4, 40),
(5, 15, 1, 15, 2, 30),
(6, 15, 5, 10, 3, 30),
(7, 15, 6, 56, 4, 224),
(8, 16, 1, 15, 2, 30),
(9, 16, 5, 10, 3, 30),
(10, 16, 6, 56, 4, 224),
(11, 17, 1, 15, 2, 30),
(12, 17, 5, 10, 3, 30),
(13, 17, 6, 56, 4, 224);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `stock_quantity`, `price`, `image`, `description`) VALUES
(1, 'Multivit Plus', 3, 0, 15, 'MULTIVIT-PLUS.jpg', 'Multivitamin   and Multiminerals (Vitamins and Minerals) Indication: Vitamin and mineral deficiencies.  Dosage & Administration: Orally one Multivit® Plus tablet daily for adult and children over 5 years of age or as directed by the physicians.'),
(2, 'Test Injection A', 2, 0, 120, 'go_green.jpg', 'An injection (often referred to as a \"shot\" in US English, or a \"jab\" in UK English) is an infusion method of putting fluid into the body'),
(3, 'Amodis', 3, 0, 20, 'AMODIS-400.jpg', 'Metronidazole Antiamoebics & Antianaerobes'),
(5, 'Ceevit', 5, 0, 10, 'Ceevit_large.png', 'Vitamin-C\r\nVitamin C (Vitamins and Minerals)\r\nIndication: Scurvy, pregnancy, lactation, infection, trauma, burns, cold exposure, following surgery, fever, stress, peptic ulcer, cancer, methaemoglobinaemia haematuria, dental caries, pyorrhea, acne, inferti'),
(6, 'Filwel Kids', 5, 0, 56, 'Filwel-kids-100ml.jpg', 'Multivitamin with Cod Liver Oil\r\nMultivitamin without mineral (Vitamins and Minerals)\r\nIndication: FilwelÂ® Kids Syrup helps preventing vitamin deficiencies in children & adult. It stimulates appetite and improves digestion; promotes healthy hair, skin an');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '0- Admin, 1-Customer',
  `email` varchar(70) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `password`) VALUES
(4, 'Admin', 0, 'admin@e-pharma.com', '123'),
(5, 'Kazi Sanghati', 1, 'sonnet@daffodil.ac', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gelary`
--
ALTER TABLE `gelary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gelary`
--
ALTER TABLE `gelary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
