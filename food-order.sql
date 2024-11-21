-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 04:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`name`, `email`, `phone`, `message`) VALUES
('ram prasad', 'ram@gmail.com', '9867345120', 'message'),
('shyam', 'shyam@gmail.com', '9349334894', 'message'),
('sita', 'sita@gmail.com', '9863949894', 'hello'),
('eewewe1212', 'admin@gmail.com', '9876538909', '334434334'),
('ram sharma', '3434gg@gmail.com', '3494348', 'fdjfjdfjdhf'),
('ram sharma', 'admin@gmail.com', '4348938491', 'dfjdjfkdlfjsdkf'),
('Hari bahadur sharma', 'admin@gmail.com', '9876538909', 'fdfdfdf'),
('Hari bahadur sharma', 'hari@gmail.com', '9867345120', 'hello'),
('sharma', 'admin@gmail.com', '9847326784', '\''),
('ram sharm', 'admin@gmail.com', '9439487870', 'dkfdkf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `food_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`food_id`, `title`, `description`, `price`, `image_name`, `category`) VALUES
(25, 'chowmin', 'very delicious chowmin', '50', 'chowmin1659330905.jpg', 'veg'),
(26, 'pizza', 'very delicious pizza', '200', 'pizza1659331039.jpg', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food_id`, `qty`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(23, 25, 1, '2022-08-01 07:59:01', 'Delivered', 'Basudev Neupane', '9843478438', 'neupanebasudev11@gmail.com', 'Bharatpur-25'),
(24, 25, 1, '2022-08-01 08:01:28', 'Ordered', 'Basudev Neupane', '9843478438', 'neupanebasudev11@gmail.com', 'Bharatpur-25'),
(25, 26, 5, '2022-08-01 01:50:01', 'Delivered', 'Ram Sharma', '9843478438', 'ramsharma@gmail.com', 'chitwan'),
(26, 25, 1, '2022-08-01 02:39:23', 'Ordered', 'Hari sapkota', '9843478438', 'hari123@gmail.com', 'pokhara'),
(27, 25, 2, '2022-08-01 03:22:04', 'Ordered', 'Ram Sharma', '9843478438', 'abcd12@gmail.com', 'bhaktapur'),
(28, 25, 4, '2022-08-01 03:26:53', 'Ordered', 'shyam sharma', '9843478438', 'shyam@gmail.com', 'ktm'),
(29, 26, 1, '2022-08-01 03:30:00', 'Ordered', 'Basudev Neupane', '9843478438', 'neupanebasudev112@gmail.com', 'Bharatpur-25'),
(30, 25, 2, '2022-08-01 03:33:54', 'Ordered', 'Basudev Neupane', '9843478438', 'neupanebasudev111@gmail.com', 'Bharatpur-25'),
(31, 25, 1, '2022-08-01 05:27:21', 'Ordered', 'kamal dhakal', '9843478438', 'kamaldh@gmail.com', 'ktm'),
(32, 26, 1, '2022-08-01 05:34:49', 'Ordered', 'hari', '9843478438', 'hari@gmail.com', 'jhapa'),
(33, 25, 1, '2022-08-01 05:38:44', 'Ordered', 'kapil sharam', '9843478438', 'kapilsharma@gmail.com', 'dolpa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(52) NOT NULL,
  `username` varchar(52) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `password`) VALUES
(9, 'Ram Sharma', 'ram', '6a557ed1005dddd940595b8fc6ed47b2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_food_id` (`food_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `food_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `FK_food_id` FOREIGN KEY (`food_id`) REFERENCES `tbl_food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
