-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 05:41 PM
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
-- Database: `indigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `category_description`) VALUES
(1, 'Fruits', 'https://images.livemint.com/rf/Image-621x414/LiveMint/Period2/2017/10/31/Photos/Processed/fruits-kFLF--621x414@LiveMint.jpg', 'Fresh and delicious fruits for a healthy diet.'),
(2, 'Vegetables', 'https://thumbs.dreamstime.com/b/healthy-fresh-produce-vegetables-27382614.jpg', 'A variety of fresh vegetables for nutritious meals.'),
(3, 'Dairy Products', 'assets/img/dairy.png', 'Creamy and nutritious dairy products for every occasion.'),
(4, 'Bakery Items', 'assets/img/bakery.png', 'Freshly baked bread, pastries, and more.'),
(5, 'Meat & Poultry', 'assets/img/meat.png', 'High-quality meat and poultry products for protein-rich meals.'),
(6, 'Pantry Staples', 'assets/img/pantry.png', 'Essential pantry staples for everyday cooking and baking needs.'),
(7, 'Sale', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSM7Dk9Hsb-82b-Vk1iFdzltX3WuqVnaKLQt4yZrmj5vw&s', 'All the items are here in sell.');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_code` varchar(50) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_code`, `expiry_date`, `discount_percentage`) VALUES
('COUPON1', '2024-12-31', 10.00),
('COUPON2', '2024-06-30', 25.00),
('COUPON3', '2025-03-31', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `product_ids` text NOT NULL,
  `quantities` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `first_name`, `last_name`, `email`, `address`, `country`, `city`, `zip`, `payment_method`, `total_price`, `discount_amount`, `coupon_code`, `product_ids`, `quantities`, `order_date`) VALUES
(1, 'PKKHI6', 12, 'Muhammad Taha', 'Farooqui', 'mohdtaha9901@gmail.com', 'shah faisal colony', 'Pakistan', 'karachi', '75230', 'cod', 576.00, 144.00, 'COUPON3', '2,3', '2,3', '2024-03-28 14:10:31'),
(2, 'PKKHI8', 12, 'Muhammad Taha', 'Farooqui', 'mohdtaha9901@gmail.com', 'shah faisal colony', 'Pakistan', 'karachi', '75230', 'cod', 468.00, 52.00, 'COUPON1', '2', '4', '2024-03-28 14:17:20'),
(3, 'PKKHI6', 12, 'Younus ', 'Farooqui', 'mohdtaha9901@gmail.com', 'shah faisal colony', 'Pakistan', 'karachi', '75230', 'cod', 600.00, 200.00, 'COUPON2', '3', '5', '2024-03-28 14:18:53'),
(4, 'PKKHI2', 12, 'Younus ', 'Farooqui', 'umer@gmail.com', 'shah faisal colony', 'Pakistan', 'karachi', '75230', 'cod', 576.00, 64.00, 'COUPON1', '2,3', '1,3', '2024-03-28 14:23:47'),
(5, 'PKKHI6', 12, 'Younus ', 'Farooqui', 'mohdtaha9901@gmail.com', 'shah faisal colony', 'Pakistan', 'karachi', '75230', 'cod', 210.00, 70.00, 'COUPON2', '2', '1', '2024-03-28 14:24:14'),
(6, 'PKKHI3', 12, 'Younus ', 'Farooqui', 'mohdtaha9901@gmail.com', 'shah faisal colony', 'Pakistan', 'karachi', '75230', 'cod', 396.00, 44.00, 'COUPON1', '2', '3', '2024-03-28 14:38:37'),
(7, 'PKKHI6', 12, 'Younus ', 'Farooqui', 'mohdtaha9901@gmail.com', 'shah faisal colony', 'Pakistan', 'karachi', '75230', 'cod', 510.00, 170.00, 'COUPON2', '2,3', '3,2', '2024-03-28 15:15:28'),
(8, 'PKKHI9', 12, 'Younus ', 'Farooqui', 'mohdtaha9901@gmail.com', 'karachi', 'Pakistan', 'karachi', '75230', 'cod', 520.00, 0.00, '0', '2', '4', '2024-03-30 14:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_rating` decimal(3,2) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `product_price`, `product_rating`, `product_description`, `product_image`, `product_stock`) VALUES
(1, 'Apple', 1, 150.00, 4.50, 'Fresh and juicy apple', 'assets/img/apple.png', 0),
(2, 'Banana', 1, 80.00, 4.30, 'Ripe and sweet banana', 'assets/img/bananas.png', 5),
(3, 'Orange', 1, 120.00, 5.00, 'Juicy and tangy orange', 'assets/img/oranges.png', 3),
(4, 'Grapes', 1, 200.00, 3.00, 'Plump and sweet grapes', 'assets/img/grapes.png', 0),
(5, 'Tomato', 2, 50.00, 4.40, 'Fresh and ripe tomato', 'tomato.jpg', 0),
(6, 'Potato', 2, 40.00, 4.20, 'Organic potato', 'potato.jpg', 0),
(7, 'Carrot', 2, 60.00, 2.00, 'Sweet and crunchy carrot', 'carrot.jpg', 0),
(8, 'Spinach', 2, 70.00, 4.50, 'Fresh and nutritious spinach', 'spinach.jpg', 0),
(9, 'Milk', 3, 110.00, 4.60, 'Fresh dairy milk', 'milk.jpg', 0),
(10, 'Cheese', 3, 200.00, 4.50, 'Fine cheese selection', 'cheese.jpg', 0),
(11, 'Yogurt', 3, 80.00, 4.40, 'Creamy yogurt', 'yogurt.jpg', 0),
(12, 'Butter', 3, 150.00, 3.00, 'Smooth and creamy butter', 'butter.jpg', 0),
(13, 'Bread', 4, 60.00, 4.40, 'Freshly baked bread', 'bread.jpg', 0),
(14, 'Cake', 4, 250.00, 1.00, 'Delicious and moist cake', 'cake.jpg', 0),
(15, 'Croissant', 4, 90.00, 4.50, 'Flaky and buttery croissant', 'croissant.jpg', 0),
(16, 'Pastry', 4, 80.00, 4.30, 'Assorted pastry selection', 'pastry.jpg', 0),
(17, 'Chicken Breast', 5, 300.00, 4.50, 'Lean and tender chicken breast', 'chicken.jpg', 0),
(18, 'Beef Steak', 5, 500.00, 4.60, 'Juicy and flavorful beef steak', 'beef_steak.jpg', 0),
(19, 'Fish Fillet', 5, 400.00, 4.40, 'Fresh and succulent fish fillet', 'fish.jpg', 0),
(20, 'Lamb Chops', 5, 450.00, 4.50, 'Tender and delicious lamb chops', 'lamb_chops.jpg', 0),
(21, 'Rice', 6, 80.00, 5.00, 'Premium quality rice', 'rice.jpg', 0),
(22, 'Pasta', 6, 100.00, 4.30, 'Variety of pasta shapes', 'pasta.jpg', 0),
(23, 'Cooking Oil', 6, 150.00, 4.50, 'Healthy cooking oil', 'oil.jpg', 0),
(24, 'Sugar', 6, 50.00, 5.00, 'Pure white sugar', 'sugar.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `number`, `email`, `password`) VALUES
(2, 'Ali Ahmed', '03111842026', 'ahmed111@gmail.com', 'taha1123'),
(3, 'Taha Farooqui', '03111842026', 'mohdtaha19901@gmail.com', 'taha1123'),
(4, 'asjal', '03111842025', 'asjal@gmail.com', '$2y$10$jb2KWKCC6BzzOcC9sODxZuW6w3pUnDjD5ffZJeaJLc5n/FGTLGxi6'),
(5, '', '', 'asjal@gmail.com', '$2y$10$IW.WMOu95nmZh2/ahsjP1eLfHhnpO5APaCSXIVifB4DfyrzqCBIfW'),
(6, 'shahrukh', '03101252066', 'shah@gmail.com', '$2y$10$VZnHJjw.h3yx.HEk1RDujOpoiRg77Jews8sPXC4YuOF/UxbBI0USG'),
(7, 'siraj', '03101252066', 'siraj11@gmail.com', '$2y$10$x24DCP9baAmzVVNBpDU2euNfJ/6YdMQ8lvRskvkptX.0.5xcIpgGW'),
(8, 'haider', '0310122440', 'haider@gmail.com', '$2y$10$PxwV64JM580unV9.DxBJz.CFWJ3lpAZrubh2Sn2asjxNBkwnU3uHu'),
(9, 'yousuf', '03111852024', 'yousuf@gmail.com', '$2y$10$8Pd/mMJrmdc94aWnIVxffuG76.50N7qoJBSO8kItMOj6sTOxzunJO'),
(10, 'farrukh', '0000211111', 'farrukh@gmail.com', '$2y$10$jN87baFRXicJNThJir6SJe11VUeZlOsc3eWg6ZmNj/Cy6zOGknBdO'),
(12, 'Muhammad Taha Farooqui', '01313113113', 'mohdtaha9901@gmail.com', '$2y$10$.Q4j7CW.FI9N4DaNp.Dgzui8nxvlDGkFH/Jnz/5ksPAR5Y.Qkj1T6'),
(13, 'umer', '02131312211', 'umer@gmail.com', '$2y$10$cimpu9D5lXlw5NrkcXo7LOKJKu30YNFm477Jcak9Nv.XqCrFlkkgK');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `user_id`, `rating`, `review`, `created_at`) VALUES
(1, 1, 2, 4.50, 'Great product, highly recommended!', '2024-03-23 16:20:42'),
(2, 1, 3, 3.80, 'Good product, but could be improved.', '2024-03-23 16:20:42'),
(3, 2, 4, 4.20, 'Excellent service and fast delivery.', '2024-03-23 16:20:42'),
(4, 3, 8, 5.00, 'The best product I have ever bought!', '2024-03-23 16:20:42'),
(5, 2, 10, 4.00, 'Satisfied with the quality, would buy again.', '2024-03-23 16:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
