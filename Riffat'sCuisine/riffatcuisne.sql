-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 08:55 AM
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
-- Database: `riffatcuisne`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(256) NOT NULL,
  `food_type` varchar(256) NOT NULL,
  `food_price` decimal(10,2) NOT NULL,
  `food_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `food_name`, `food_type`, `food_price`, `food_size`) VALUES
(2, 'Chana Chaat Papri', 'Appetizers', 6.00, 1),
(3, 'Dahi Bhalla', 'Appetizers', 6.00, 1),
(7, 'Array', 'Appetizers', 0.00, 1),
(9, 'Array', 'Appetizers', 0.00, 1),
(10, 'Array', 'Appetizers', 0.00, 1),
(11, 'Chicken Cheese Balls', 'Appetizers', 15.00, 12),
(12, 'Chicken Samosa', 'Appetizers', 20.00, 12),
(13, 'Aloo Cutlus', 'Appetizers', 15.00, 12),
(14, 'Shami Kabab', 'Appetizers', 20.00, 12),
(15, 'Chapli Kabab', 'Appetizers', 24.00, 12),
(16, 'Seekh Kabab', 'Appetizers', 24.00, 12),
(17, 'Chicken Rolls', 'Appetizers', 20.00, 12),
(18, 'Reshmi Kabab', 'Appetizers', 24.00, 12),
(19, 'Chicken Tikka', 'Appetizers', 8.00, 2),
(20, 'Chicken Tikka Boti', 'Appetizers', 15.00, 1),
(21, 'Chicken Bihari Boti', 'Appetizers', 18.00, 1),
(22, 'Chicken Malai Boti', 'Appetizers', 18.00, 1),
(23, 'Fish Tikka', 'Appetizers', 16.00, 1),
(24, 'Dahi Bhalla', 'Frozen Appetizers', 15.00, 12),
(25, 'Chicken Samosa', 'Frozen Appetizers', 18.00, 12),
(26, 'Aloo Cutlus', 'Frozen Appetizers', 12.00, 12),
(27, 'Aloo Cutlus', 'Frozen Appetizers', 12.00, 12),
(28, 'Shami Kabab', 'Frozen Appetizers', 18.00, 12),
(29, 'Nothing', 'Frozen Appetizers', 0.00, 0),
(30, 'Seekh Kabab', 'Frozen Appetizers', 20.00, 12),
(31, 'Chicken Rolls', 'Frozen Appetizers', 18.00, 12),
(32, 'Rashmi Kabab', 'Frozen Appetizers', 20.00, 12),
(33, 'Chicken Tikka', 'Frozen Appetizers', 6.00, 2),
(34, 'Chicken Tikka Boti', 'Frozen Appetizers', 12.00, 1),
(35, 'Chicken Bihari Boti', 'Frozen Appetizers', 15.00, 1),
(36, 'Chicken Malai Boti', 'Frozen Appetizers', 15.00, 1),
(37, 'Koftay', 'Frozen Appetizers', 18.00, 12),
(38, 'Butter Chicken', 'Boneless Chicken Specials', 11.99, 1),
(39, 'Chicken Tikka Masala', 'Boneless Chicken Specials', 11.99, 1),
(40, 'Chicken Nihari', 'Boneless Chicken Specials', 11.99, 1),
(41, 'Chicken Kofta Curry', 'Boneless Chicken Specials', 11.99, 1),
(42, 'Chicken Kabab Masala', 'Boneless Chicken Specials', 11.99, 1),
(43, 'Chicken Tikka Hamdi', 'Boneless Chicken Specials', 11.99, 1),
(44, 'White Chicken Karahi', 'Boneless Chicken Specials', 11.99, 1),
(54, 'Plain Rice', 'Rice Specials', 3.99, 1),
(55, 'Veggie Pulao Rice', 'Rice Specials', 6.99, 1),
(56, 'Non-Veggie Pulao Rice', 'Rice Specials', 9.99, 1),
(57, 'Mixed Vegetable Biryani', 'Rice Specials', 9.99, 1),
(58, 'Chicken Biryani', 'Rice Specials', 10.99, 1),
(59, 'Veal Biryani', 'Rice Specials', 11.99, 1),
(60, 'Singaporean Rice', 'Rice Specials', 11.99, 1),
(61, 'Barbecue Rice', 'Rice Specials', 11.99, 1),
(62, 'Vegetable Fried Rice', 'Chinese Specials', 5.99, 1),
(63, 'Vegetable Egg Fried Rice\r\n', 'Chinese Specials', 6.99, 1),
(65, 'Chicken Fried Rice', 'Chinese Specials', 9.99, 1),
(66, 'Chicken Manchurian Fried Rice', 'Chinese Specials', 12.99, 1),
(67, 'Veggie Manchurian Fried Rice', 'Chinese Specials', 10.99, 1),
(68, 'Chicken Chow Main', 'Chinese Specials', 10.99, 1),
(69, 'Plain Rice with Shoshlik Gravy ', 'Chinese Specials', 11.99, 1),
(70, 'Plain Rice with Chicken Jalfrezi ', 'Chinese Specials', 11.99, 1),
(71, 'Plain Rice with Sweet and Sour Chicken', 'Chinese Specials', 13.99, 1),
(72, 'Plain Rice with Sweet and Sour Chicken Meatball', 'Chinese Specials', 14.99, 1),
(73, 'Dry Beef Chili', 'Chinese Specials', 14.99, 1),
(74, 'Dry Chicken Chili', 'Chinese Specials', 13.99, 1),
(75, 'Chicken Soup', 'Soups', 6.00, 1),
(76, 'Chicken Corn Soup', 'Soups', 6.00, 1),
(77, 'Hot and Sour Soup', 'Soups', 6.00, 1),
(78, 'Thai Soup', 'Soups', 6.00, 1),
(79, 'Lentil Soup', 'Soups', 6.00, 1),
(80, 'Plain Roti', 'Flatbreads', 1.25, 1),
(81, 'Missi Roti', 'Flatbreads', 2.50, 1),
(82, 'Makki di Roti', 'Flatbreads', 2.50, 1),
(83, 'Plain Paratha', 'Flatbreads', 1.50, 1),
(84, 'Aloo Paratha', 'Flatbreads', -1.00, 1),
(85, 'Mooli Paratha', 'Flatbreads', 2.50, 1),
(86, 'Palak Paratha', 'Flatbreads', 2.50, 1),
(87, 'Gobi Paratha', 'Flatbreads', 2.50, 1),
(88, 'Methi Paratha', 'Flatbreads', 2.50, 1),
(89, 'Chicken Keema Paratha', 'Flatbreads', 3.50, 1),
(90, 'Veal Keema Paratha', 'Flatbreads', 4.50, 1),
(91, 'Onion Bhindi Fry', 'Vegetarian', 6.49, 1),
(92, 'Aloo Palak', 'Vegetarian', 6.49, 1),
(93, 'Aloo Matar', 'Vegetarian', 6.49, 1),
(94, 'Aloo Baingan', 'Vegetarian', 6.49, 1),
(95, 'Aloo Bhaji', 'Vegetarian', 6.49, 1),
(96, 'Aloo Gobi', 'Vegetarian', 6.49, 1),
(97, 'Aloo Methi', 'Vegetarian', 6.49, 1),
(98, 'Aloo Methi', 'Vegetarian', 6.49, 1),
(99, 'Jeera Aloo', 'Vegetarian', 6.49, 1),
(100, 'Mix Vegetables', 'Vegetarian', 6.99, 1),
(101, 'Baingan Bharta', 'Vegetarian', 7.49, 1),
(102, 'Mash Daal', 'Vegetarian', 6.49, 1),
(103, 'Chana Daal', 'Vegetarian', 6.49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `order_time`, `order_status`, `order_price`, `order_notes`) VALUES
(1, 56, '2023-12-15', '03:25:35', 'Approved', 20.00, 'nothing'),
(5, 5, '2023-12-05', '06:29:05', 'Cancelled', 50.00, NULL),
(6, 59, '2023-12-15', '06:30:28', 'Pending', 150.00, NULL),
(9, 56, '2023-12-05', '06:39:16', 'Completed', 0.00, NULL),
(10, 66, '2023-12-18', '07:37:31', 'Pending', 83.00, NULL),
(11, 66, '2023-12-18', '07:37:55', 'Pending', 0.00, NULL),
(12, 66, '2023-12-18', '07:38:04', 'Pending', 27.00, NULL),
(13, 61, '2023-12-18', '07:59:39', 'Cancelled', 51.00, NULL),
(14, 61, '2023-12-18', '08:11:10', 'Cancelled', 19.00, ''),
(15, 61, '2023-12-18', '08:11:50', 'Cancelled', 27.00, 'Favorite!!!'),
(16, 61, '2023-12-18', '08:20:50', 'Cancelled', 16.00, ''),
(17, 56, '2023-12-18', '08:51:45', 'Pending', 27.00, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_details_view`
-- (See below for the actual view)
--
CREATE TABLE `order_details_view` (
`order_id` int(11)
,`user_id` int(11)
,`user_fname` varchar(255)
,`user_lname` varchar(255)
,`user_email` varchar(255)
,`user_username` varchar(255)
,`order_date` date
,`order_time` time
,`order_status` varchar(50)
,`order_price` decimal(10,2)
,`order_notes` text
,`food_id` int(11)
,`food_name` varchar(256)
,`food_size` int(11)
,`food_price` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `food_id`) VALUES
(2, 1, 94),
(3, 6, 92),
(4, 5, 84),
(5, 9, 29),
(6, 10, 7),
(7, 10, 9),
(8, 10, 10),
(9, 10, 15),
(10, 10, 14),
(11, 10, 3),
(12, 10, 2),
(13, 12, 7),
(14, 12, 9),
(15, 12, 10),
(16, 13, 7),
(17, 13, 16),
(18, 13, 17),
(19, 13, 29),
(20, 14, 7),
(21, 14, 10),
(22, 14, 29),
(23, 15, 7),
(24, 15, 17),
(25, 16, 29),
(26, 16, 23),
(27, 17, 7),
(28, 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_username`, `user_pass`, `user_isAdmin`) VALUES
(5, 'Admin', 'Account', 'admin@email.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(56, 'Arman', 'Abdul Ahad', 'poka@email.com', 'poka', '0421008445828ceb46f496700a5fa65e', 0),
(59, 'Muhammad Arsalan', 'Saeed', 'arsalan.m.saeed@outlook.com', 'King', '202cb962ac59075b964b07152d234b70', 0),
(60, 'Riffat', 'Saeed', 'riffatscuisine@outlook.com', 'RiffatCuisine', '202cb962ac59075b964b07152d234b70', 1),
(61, 'Julian', 'Frost', 'julianfrost@x.ca', 'King3600', 'fe0ec43cc4200e777aa2190ace58e7b4', 0),
(62, 'Test', 'Account', 'testing@test.ca', 'test', '098f6bcd4621d373cade4e832627b4f6', 0),
(66, 'Muhammad Arsalan', 'Saeed', 'arsalan.m.saeed@outlook.com', 'ron', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `second_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `phone_number`, `address`, `postal_code`, `second_email`) VALUES
(5, '1234567890', 'Vanier College', '123456', 'admin@admin.ca'),
(56, '7894561230', 'Saint Hubert', '514 933', 'second@gmail.com'),
(60, '5149334322', '#1107, Rue Briand', 'J3L 2T3', 'arsalan.m.saeed@outlook.com'),
(66, '1472583690', 'Vanier College', '123 456', 'vanier@college.ca');

-- --------------------------------------------------------

--
-- Structure for view `order_details_view`
--
DROP TABLE IF EXISTS `order_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details_view`  AS SELECT `o`.`order_id` AS `order_id`, `o`.`user_id` AS `user_id`, `u`.`user_fname` AS `user_fname`, `u`.`user_lname` AS `user_lname`, `u`.`user_email` AS `user_email`, `u`.`user_username` AS `user_username`, `o`.`order_date` AS `order_date`, `o`.`order_time` AS `order_time`, `o`.`order_status` AS `order_status`, `o`.`order_price` AS `order_price`, `o`.`order_notes` AS `order_notes`, `oi`.`food_id` AS `food_id`, `m`.`food_name` AS `food_name`, `m`.`food_size` AS `food_size`, `m`.`food_price` AS `food_price` FROM (((`orders` `o` join `order_items` `oi` on(`o`.`order_id` = `oi`.`order_id`)) join `users` `u` on(`o`.`user_id` = `u`.`user_id`)) join `menu` `m` on(`oi`.`food_id` = `m`.`food_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `user_id_4` (`user_id`),
  ADD KEY `user_id_non_unique` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `menu` (`food_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
