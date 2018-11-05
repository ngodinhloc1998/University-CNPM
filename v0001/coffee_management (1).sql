-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2018 at 01:40 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`) VALUES
(1, 'Vãng lai');

-- --------------------------------------------------------

--
-- Table structure for table `detail_import`
--

CREATE TABLE `detail_import` (
  `id` int(11) NOT NULL,
  `id_import` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice`
--

CREATE TABLE `detail_invoice` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantities` int(11) DEFAULT '1',
  `total` double DEFAULT NULL,
  `status` enum('existed','deleted') NOT NULL DEFAULT 'existed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_invoice`
--

INSERT INTO `detail_invoice` (`id`, `id_invoice`, `id_product`, `quantities`, `total`, `status`) VALUES
(3, 2, 5, 1, 28000, 'existed'),
(4, 2, 6, 2, 60000, 'existed'),
(5, 2, 4, 1, 28000, 'existed'),
(6, 2, 5, 1, 28000, 'existed'),
(7, 2, 4, 1, 28000, 'existed'),
(8, 2, 4, 1, 28000, 'existed'),
(9, 2, 5, 1, 28000, 'existed'),
(10, 2, 6, 1, 30000, 'existed'),
(11, 2, 4, 1, 28000, 'existed'),
(12, 2, 7, 1, 35000, 'existed');

--
-- Triggers `detail_invoice`
--
DELIMITER $$
CREATE TRIGGER `update_price_before_update_quatities` BEFORE UPDATE ON `detail_invoice` FOR EACH ROW BEGIN
	SET NEW.total = (SELECT price FROM price_release WHERE NEW.id_product = price_release.id_product)*NEW.quantities;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_before_insert_detail_invoice` BEFORE INSERT ON `detail_invoice` FOR EACH ROW BEGIN
	SET NEW.total = (SELECT price FROM price_release WHERE NEW.id_product = price_release.id_product)*NEW.quantities;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_invoice_after_insert_detail_invoice` AFTER INSERT ON `detail_invoice` FOR EACH ROW BEGIN
	UPDATE invoice SET total = total + NEW.total WHERE id = NEW.id_invoice; 	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_invoice_after_update_detail_invoice` AFTER UPDATE ON `detail_invoice` FOR EACH ROW BEGIN
	UPDATE invoice SET total = total - OLD.total + NEW.total WHERE id = NEW.id_invoice;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `id_table` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `total` double DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('processing','done') DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `id_table`, `id_customer`, `id_employee`, `total`, `create_at`, `status`) VALUES
(2, 1, 1, 1, 321000, '2018-11-05 19:30:17', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price_release`
--

CREATE TABLE `price_release` (
  `id_product` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price_release`
--

INSERT INTO `price_release` (`id_product`, `price`) VALUES
(4, 28000),
(5, 28000),
(6, 30000),
(7, 35000),
(8, 25000),
(9, 34000),
(10, 32000),
(11, 29000),
(12, 26000),
(13, 28000),
(14, 32000),
(15, 27000),
(16, 31000),
(17, 36000),
(18, 35000),
(19, 34000),
(20, 30000),
(21, 31000),
(22, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantities` int(11) NOT NULL DEFAULT '0',
  `description` enum('Available','Out of stock') NOT NULL DEFAULT 'Out of stock',
  `image` varchar(255) NOT NULL DEFAULT 'public/products/images/new.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_type`, `name`, `quantities`, `description`, `image`) VALUES
(4, 1, 'Americano', 10, 'Available', 'public/products/images/drink/americano.jpg'),
(5, 1, 'Cappuccino', 10, 'Available', 'public/products/images/drink/cappuccino.jpg'),
(6, 1, 'Chocolate Hot', 10, 'Available', 'public/products/images/drink/chocolate-hot.jpg'),
(7, 1, 'Chocolate Milk', 10, 'Available', 'public/products/images/drink/chocolate-milk.jpg'),
(8, 1, 'Espresso', 10, 'Available', 'public/products/images/drink/espresso.jpg'),
(9, 1, 'Latte', 10, 'Available', 'public/products/images/drink/latte.jpg'),
(10, 1, 'Latte Milk', 10, 'Available', 'public/products/images/drink/latte-milk.jpg'),
(11, 1, 'Lemon Juice', 10, 'Available', 'public/products/images/drink/lemon-juice.jpg'),
(12, 1, 'Macchiato', 10, 'Available', 'public/products/images/drink/macchiato.jpg'),
(13, 1, 'Moccha', 10, 'Available', 'public/products/images/drink/moccha.jpg'),
(14, 1, 'Orange Juice', 10, 'Available', 'public/products/images/drink/orange-juice.jpg'),
(15, 1, 'Soda Blue Ocean', 10, 'Available', 'public/products/images/drink/soda-blue-ocean.jpg'),
(16, 1, 'Soda Lemon', 10, 'Available', 'public/products/images/drink/soda-lemon.jpg'),
(17, 2, 'Cheesecake Chocolate', 10, 'Available', 'public/products/images/food/cheesecake-chocolate.jpg'),
(18, 2, 'Chicken Fried', 10, 'Available', 'public/products/images/food/chicken-fried.jpg'),
(19, 2, 'Cookie Chocolate', 10, 'Available', 'public/products/images/food/cookie-chocolate.jpg'),
(20, 2, 'Hamburger', 10, 'Available', 'public/products/images/food/hamburger.jpg'),
(21, 2, 'Potato Chips', 10, 'Available', 'public/products/images/food/potato-chips.jpg'),
(22, 2, 'Spaghetti', 10, 'Available', 'public/products/images/food/spaghetti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `address`, `phone_number`) VALUES
(1, 'Trung Nguyên', 'Quận 1', '0987788999'),
(2, 'Nestle', 'Quận 1', '0977897899');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles_permission`
--

CREATE TABLE `roles_permission` (
  `id_role` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('active','available','booked') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `status`) VALUES
(1, 'Table 1', 'active'),
(2, 'Table 2', 'active'),
(3, 'Table 3', 'active'),
(4, 'Table 4', 'active'),
(5, 'Table 5', 'available'),
(6, 'Table 6', 'available'),
(7, 'Table 7', 'available'),
(8, 'Table 8', 'available'),
(9, 'Table 9', 'available'),
(10, 'Table 10', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `name`) VALUES
(1, 'drink'),
(2, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cmnd` int(9) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `start_day` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_day` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cmnd`, `username`, `password`, `start_day`, `end_day`, `status`) VALUES
(1, 'Ngô Đình Lộc', 98996814, 'ngodinhloc', '$2y$10$puoaUq4WqyIXQElK7vj.qOKHdYXYJg49P7JMlZ4nZ2XfPIyPNJIem', '2018-10-30 12:02:36', '0000-00-00 00:00:00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id_user` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_import`
--
ALTER TABLE `detail_import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_import` (`id_import`);

--
-- Indexes for table `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_invoice_id_invoice_invoice` (`id_invoice`),
  ADD KEY `fk_detail_invoice_id_product_products` (`id_product`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_import_id_provider_provider` (`id_provider`),
  ADD KEY `fk_detail_import_id_employee_users` (`id_employee`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id_table_tables` (`id_table`),
  ADD KEY `invoice_id_customer_customer` (`id_customer`),
  ADD KEY `invoice_id_employee_users` (`id_employee`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_release`
--
ALTER TABLE `price_release`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_id_type_type_product` (`id_type`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `roles_permission`
--
ALTER TABLE `roles_permission`
  ADD PRIMARY KEY (`id_role`,`id_permission`),
  ADD KEY `fk_roles_permissions_id_permission_permisions` (`id_permission`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cmnd` (`cmnd`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id_user`,`id_permission`),
  ADD KEY `fk_user_roles_id_permission_permissions` (`id_permission`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_import`
--
ALTER TABLE `detail_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_invoice`
--
ALTER TABLE `detail_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_import`
--
ALTER TABLE `detail_import`
  ADD CONSTRAINT `detail_import_ibfk_1` FOREIGN KEY (`id_import`) REFERENCES `import` (`id`);

--
-- Constraints for table `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD CONSTRAINT `fk_detail_invoice_id_invoice_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id`),
  ADD CONSTRAINT `fk_detail_invoice_id_product_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `fk_detail_import_id_employee_users` FOREIGN KEY (`id_employee`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_detail_import_id_provider_provider` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_id_customer_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `invoice_id_employee_users` FOREIGN KEY (`id_employee`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `invoice_id_table_tables` FOREIGN KEY (`id_table`) REFERENCES `tables` (`id`);

--
-- Constraints for table `price_release`
--
ALTER TABLE `price_release`
  ADD CONSTRAINT `fk_price_release_id_product_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_id_type_type_product` FOREIGN KEY (`id_type`) REFERENCES `type_product` (`id`);

--
-- Constraints for table `roles_permission`
--
ALTER TABLE `roles_permission`
  ADD CONSTRAINT `fk_roles_permissions_id_permission_permisions` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `fk_roles_permissions_id_role_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `fk_user_roles_id_permission_permissions` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `fk_user_roles_id_user_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
