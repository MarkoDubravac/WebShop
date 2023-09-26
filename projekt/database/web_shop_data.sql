-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:01 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_description`, `item_rating`)
VALUES
(1, 'Apple', 'iPhone 12', 799.00, './assets/new_products/1.png', '2023-09-14 11:08:57', 'The iPhone 12 is a flagship smartphone from Apple, featuring a powerful A14 Bionic chip, OLED Super Retina XDR display, and a dual-camera system for stunning photos and videos.', 5),
(2, 'Apple', 'iPhone SE (2nd generation)', 399.00, './assets/new_products/2.png', '2023-09-14 11:10:23', 'The iPhone SE (2nd generation) combines the compact design of the iPhone 8 with the performance of the A13 Bionic chip, offering a budget-friendly option for Apple fans.', 3),
(3, 'Apple', 'iPhone 11', 699.00, './assets/new_products/3.png', '2023-09-14 11:12:05', 'The iPhone 11 features a dual-camera system, A13 Bionic chip, and a Liquid Retina display, making it a versatile and capable smartphone for everyday use.', 4),
(4, 'Samsung', 'Samsung Galaxy S21', 799.00, './assets/new_products/4.png', '2023-09-14 11:15:39', 'The Samsung Galaxy S21 series offers a powerful Exynos/Snapdragon processor, a dynamic AMOLED display, and a versatile camera setup for exceptional performance and photography.', 4),
(5, 'Samsung', 'Samsung Galaxy A52', 349.00, './assets/new_products/5.png', '2023-09-14 11:17:10', 'The Samsung Galaxy A52 is a mid-range smartphone with a high-refresh-rate AMOLED display and a capable camera system, providing great value for its price.', 4),
(6, 'Samsung', 'Samsung Galaxy Z Fold 2', 1799.00, './assets/new_products/6.png', '2023-09-14 11:19:01', 'The Samsung Galaxy Z Fold 2 is a foldable smartphone with a large foldable display, offering a unique and versatile mobile experience.', 4),
(7, 'Xiaomi', 'Xiaomi Mi 11', 699.00, './assets/new_products/7.png', '2023-09-14 11:20:45', 'The Xiaomi Mi 11 is a flagship smartphone with a Snapdragon 888 processor, a high-refresh-rate display, and a versatile camera system, making it a compelling choice for tech enthusiasts.', 4),
(8, 'Xiaomi', 'Xiaomi Mi 10T Pro', 549.00, './assets/new_products/8.png', '2023-09-14 11:22:18', 'The Xiaomi Mi 10T Pro offers a powerful Snapdragon 865 chipset, a high-refresh-rate display, and a large battery, providing a great balance between performance and value.', 4),
(9, 'Xiaomi', 'Xiaomi Redmi Note 10 Pro', 299.00, './assets/new_products/9.png', '2023-09-14 11:23:57', 'The Xiaomi Redmi Note 10 Pro is a mid-range smartphone with a high-resolution camera, a large battery, and a competitive price, making it a popular choice among budget-conscious users.', 4),
(10, 'Huawei', 'Huawei P40 Pro', 899.00, './assets/new_products/10.png', '2023-09-14 11:26:19', 'The Huawei P40 Pro features a powerful Kirin 990 processor, a versatile camera system, and a stunning OLED display, delivering a high-end smartphone experience.', 4),
(11, 'Huawei', 'Huawei Mate 40 Pro', 1099.00, './assets/new_products/11.png', '2023-09-14 11:27:48', 'The Huawei Mate 40 Pro boasts a Kirin 9000 chipset, a curved OLED display, and advanced camera capabilities, making it a top-tier smartphone choice.', 4),
(12, 'Huawei', 'Huawei Nova 7i', 299.00, './assets/new_products/12.png', '2023-09-14 11:29:15', 'The Huawei Nova 7i offers good performance, a versatile camera setup, and a stylish design at an affordable price, making it a popular choice in the mid-range segment.', 4),
(13, 'Apple', 'iPhone 12 Pro Max', 1099.00, './assets/new_products/13.png', '2023-09-14 11:31:33', 'The iPhone 12 Pro Max is the largest iPhone in the lineup, featuring a powerful A14 Bionic chip, Pro camera system, and a stunning Super Retina XDR display.', 5),
(14, 'Apple', 'iPhone 12 Mini', 699.00, './assets/new_products/14.png', '2023-09-14 11:33:01', 'The iPhone 12 Mini offers the same powerful features as its larger siblings but in a compact form factor, making it perfect for those who prefer smaller phones.', 4),
(15, 'Samsung', 'Samsung Galaxy Note 20 Ultra', 1299.00, './assets/new_products/15.png', '2023-09-14 11:34:33', 'The Samsung Galaxy Note 20 Ultra is known for its S Pen support, large Dynamic AMOLED display, and powerful performance, making it a productivity-focused flagship.', 5),
(16, 'Samsung', 'Samsung Galaxy Z Flip', 999.00, './assets/new_products/16.png', '2023-09-14 11:36:10', 'The Samsung Galaxy Z Flip is a foldable smartphone with a compact design that flips open to reveal a full-screen display, offering a unique and stylish experience.', 4),
(17, 'Xiaomi', 'Xiaomi Redmi Note 9', 249.00, './assets/new_products/17.png', '2023-09-14 11:37:45', 'The Xiaomi Redmi Note 9 is a budget-friendly smartphone with a large display, a capable camera system, and a long-lasting battery, making it a solid choice for budget-conscious consumers.', 3),
(18, 'Xiaomi', 'Xiaomi Poco X3', 299.00, './assets/new_products/18.png', '2023-09-14 11:39:18', 'The Xiaomi Poco X3 is a gaming-centric smartphone with a high-refresh-rate display, a large battery, and a Snapdragon 732G processor, offering great value for gamers.', 3),
(19, 'Huawei', 'Huawei Mate X2', 2399.00, './assets/new_products/19.png', '2023-09-14 11:40:48', 'The Huawei Mate X2 is a premium foldable smartphone with a large flexible OLED display, top-notch performance, and a versatile camera setup.', 4),
(20, 'Huawei', 'Huawei P30 Pro', 699.00, './assets/new_products/20.png', '2023-09-14 11:42:14', 'The Huawei P30 Pro is known for its impressive camera capabilities, including a periscope zoom lens, and it offers a great all-around flagship experience.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_name`, `password`) VALUES
(1, 'Marko Dubravac', 'mdubravac', ''),
(2, 'Dario Vidovic', 'dvidovic', ''),
(3, 'Inoslav Kucenjak', 'ikucenjak', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
