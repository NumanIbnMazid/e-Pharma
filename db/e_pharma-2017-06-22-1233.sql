-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2017 at 08:32 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `date_of_purchase` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_delivery` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `stock_quantity`, `price`, `image`, `description`) VALUES
(1, 'Multivit Plus', 3, 0, 15, 'MULTIVIT-PLUS.jpg', 'Multivitamin   and Multiminerals (Vitamins and Minerals) Indication: Vitamin and mineral deficiencies.  Dosage & Administration: Orally one Multivit® Plus tablet daily for adult and children over 5 years of age or as directed by the physicians.'),
(2, 'Test Injection A', 2, 0, 120, 'go_green.jpg', 'An injection (often referred to as a "shot" in US English, or a "jab" in UK English) is an infusion method of putting fluid into the body'),
(3, 'Amodis', 3, 0, 20, 'AMODIS-400.jpg', 'Metronidazole Antiamoebics & Antianaerobes'),
(4, 'Ace', 3, 0, 25, 'ACE-SUP-125.jpg', 'Paracetamol\r\nNon-narcotic analgesic (CNS Preparations)\r\nIndication: Fever, headache, toothache, earache, bodyache, myalgia, dysmenorrhoea, neuralgia and sprains. Pain of colic, back pain, chronic pain of cancer, inflammatory pain, and post-vaccination pai'),
(5, 'Ceevit', 5, 0, 10, 'Ceevit_large.png', 'Vitamin-C\r\nVitamin C (Vitamins and Minerals)\r\nIndication: Scurvy, pregnancy, lactation, infection, trauma, burns, cold exposure, following surgery, fever, stress, peptic ulcer, cancer, methaemoglobinaemia haematuria, dental caries, pyorrhea, acne, inferti'),
(6, 'Filwel Kids', 5, 0, 56, 'Filwel-kids-100ml.jpg', 'Multivitamin with Cod Liver Oil\r\nMultivitamin without mineral (Vitamins and Minerals)\r\nIndication: FilwelÂ® Kids Syrup helps preventing vitamin deficiencies in children & adult. It stimulates appetite and improves digestion; promotes healthy hair, skin an');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '0- Admin, 1-Customer',
  `email` varchar(70) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `password`) VALUES
(4, 'Admin', 0, 'admin@e-pharma.com', '123'),
(5, 'Kazi Sanghati Sowharda Haque', 0, 'sonnet@daffodil.ac', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
