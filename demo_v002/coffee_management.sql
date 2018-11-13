-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2018 at 04:51 PM
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
  `status` enum('existed','deleted') NOT NULL DEFAULT 'existed',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_invoice`
--

INSERT INTO `detail_invoice` (`id`, `id_invoice`, `id_product`, `quantities`, `total`, `status`, `deleted_at`) VALUES
(6, 2, 5, 2, 56000, 'existed', '2018-11-06 13:42:52'),
(7, 2, 4, 1, 28000, 'deleted', '2018-11-06 13:42:49'),
(8, 2, 4, 1, 28000, 'deleted', '2018-11-06 13:42:44'),
(9, 2, 5, 1, 28000, 'deleted', '2018-11-06 13:42:42'),
(10, 2, 6, 1, 30000, 'deleted', '2018-11-06 13:42:37'),
(11, 2, 4, 1, 28000, 'deleted', '2018-11-06 13:42:27'),
(12, 2, 7, 1, 35000, 'deleted', '2018-11-06 13:41:39'),
(13, 2, 4, 1, 28000, 'deleted', '2018-11-06 13:40:54'),
(14, 2, 5, 1, 28000, 'deleted', '2018-11-06 13:38:26'),
(15, 2, 5, 1, 28000, 'deleted', '2018-11-06 12:38:08'),
(16, 2, 5, 1, 28000, 'existed', NULL),
(17, 2, 6, 1, 30000, 'existed', NULL),
(18, 2, 7, 1, 35000, 'deleted', '2018-11-06 17:20:17'),
(31, 8, 4, 1, 28000, 'existed', NULL),
(32, 8, 5, 1, 28000, 'existed', NULL),
(33, 8, 7, 1, 35000, 'existed', NULL),
(34, 8, 9, 1, 34000, 'existed', NULL),
(35, 9, 4, 1, 28000, 'existed', NULL),
(36, 9, 5, 1, 28000, 'existed', NULL),
(37, 9, 6, 1, 30000, 'existed', NULL),
(38, 9, 11, 1, 29000, 'deleted', '2018-11-08 04:17:47'),
(39, 10, 4, 1, 28000, 'existed', NULL),
(40, 10, 7, 1, 35000, 'existed', NULL),
(41, 10, 10, 1, 32000, 'existed', NULL),
(42, 11, 4, 1, 28000, 'existed', NULL),
(43, 11, 5, 1, 28000, 'existed', NULL),
(44, 11, 6, 1, 30000, 'existed', NULL),
(45, 12, 4, 1, 28000, 'deleted', '2018-11-09 14:52:41'),
(46, 14, 4, 1, 28000, 'existed', NULL),
(47, 14, 7, 1, 35000, 'existed', NULL),
(48, 14, 10, 1, 32000, 'existed', NULL),
(49, 16, 10, 1, 32000, 'existed', NULL),
(50, 16, 11, 1, 29000, 'existed', NULL),
(51, 16, 12, 1, 26000, 'existed', NULL),
(52, 17, 4, 1, 28000, 'existed', NULL),
(53, 17, 5, 1, 28000, 'existed', NULL),
(54, 17, 9, 1, 34000, 'existed', NULL),
(55, 18, 4, 1, 28000, 'existed', NULL),
(56, 18, 5, 1, 28000, 'existed', NULL),
(57, 18, 6, 1, 30000, 'existed', NULL),
(58, 18, 8, 1, 25000, 'existed', NULL),
(59, 18, 11, 1, 29000, 'existed', NULL),
(60, 19, 4, 1, 28000, 'existed', NULL),
(61, 19, 5, 1, 28000, 'existed', NULL),
(62, 19, 8, 1, 25000, 'existed', NULL),
(63, 19, 9, 1, 34000, 'existed', NULL),
(64, 19, 7, 1, 35000, 'existed', NULL);

--
-- Triggers `detail_invoice`
--
DELIMITER $$
CREATE TRIGGER `update_after_update_status_existed` AFTER UPDATE ON `detail_invoice` FOR EACH ROW BEGIN
	IF NEW.status = 'existed' AND OLD.status = 'deleted' THEN
		UPDATE invoice SET total = total + NEW.total WHERE id = NEW.id_invoice;
   	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_detail_invoice_after_deleted` BEFORE UPDATE ON `detail_invoice` FOR EACH ROW BEGIN
	IF NEW.status = 'deleted' THEN
    	SET NEW.deleted_at = CURRENT_TIMESTAMP;
    	UPDATE invoice SET total = total - NEW.total WHERE id = NEW.id_invoice; 
    END IF;
END
$$
DELIMITER ;
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
-- Table structure for table `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id` int(11) NOT NULL,
  `id_transaction_charge` int(11) NOT NULL,
  `id_unit_cash` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `quantities` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_transaction`
--

INSERT INTO `detail_transaction` (`id`, `id_transaction_charge`, `id_unit_cash`, `value`, `quantities`) VALUES
(35, 9, 9, 500000, 0),
(36, 9, 8, 200000, 1),
(37, 9, 7, 100000, 1),
(38, 9, 6, 50000, 1),
(39, 9, 5, 20000, 1),
(40, 9, 4, 10000, 1),
(41, 9, 3, 5000, 1),
(42, 9, 2, 2000, 0),
(43, 9, 1, 1000, 1),
(44, 11, 9, 500000, 0),
(45, 11, 8, 200000, 0),
(46, 11, 7, 100000, 0),
(47, 11, 6, 50000, 1),
(48, 11, 5, 20000, 0),
(49, 11, 4, 10000, 1),
(50, 11, 3, 5000, 0),
(51, 11, 2, 2000, 1),
(52, 11, 1, 1000, 0),
(53, 12, 9, 500000, 0),
(54, 12, 8, 200000, 0),
(55, 12, 7, 100000, 0),
(56, 12, 6, 50000, 0),
(57, 12, 5, 20000, 0),
(58, 12, 4, 10000, 0),
(59, 12, 3, 5000, 1),
(60, 12, 2, 2000, 0),
(61, 12, 1, 1000, 0),
(62, 13, 9, 500000, 0),
(63, 13, 8, 200000, 0),
(64, 13, 7, 100000, 0),
(65, 13, 6, 50000, 0),
(66, 13, 5, 20000, 0),
(67, 13, 4, 10000, 0),
(68, 13, 3, 5000, 1),
(69, 13, 2, 2000, 0),
(70, 13, 1, 1000, 0),
(71, 14, 9, 500000, 0),
(72, 14, 8, 200000, 0),
(73, 14, 7, 100000, 0),
(74, 14, 6, 50000, 0),
(75, 14, 5, 20000, 0),
(76, 14, 4, 10000, 0),
(77, 14, 3, 5000, 1),
(78, 14, 2, 2000, 0),
(79, 14, 1, 1000, 0),
(80, 15, 9, 500000, 0),
(81, 15, 8, 200000, 0),
(82, 15, 7, 100000, 0),
(83, 15, 6, 50000, 1),
(84, 15, 5, 20000, 2),
(85, 15, 4, 10000, 0),
(86, 15, 3, 5000, 1),
(87, 15, 2, 2000, 0),
(88, 15, 1, 1000, 0),
(89, 16, 9, 500000, 0),
(90, 16, 8, 200000, 0),
(91, 16, 7, 100000, 0),
(92, 16, 6, 50000, 0),
(93, 16, 5, 20000, 0),
(94, 16, 4, 10000, 0),
(95, 16, 3, 5000, 0),
(96, 16, 2, 2000, 2),
(97, 16, 1, 1000, 0),
(98, 17, 9, 500000, 0),
(99, 17, 8, 200000, 0),
(100, 17, 7, 100000, 0),
(101, 17, 6, 50000, 0),
(102, 17, 5, 20000, 0),
(103, 17, 4, 10000, 0),
(104, 17, 3, 5000, 0),
(105, 17, 2, 2000, 0),
(106, 17, 1, 1000, 1),
(107, 18, 9, 500000, 0),
(108, 18, 8, 200000, 0),
(109, 18, 7, 100000, 0),
(110, 18, 6, 50000, 0),
(111, 18, 5, 20000, 2),
(112, 18, 4, 10000, 0),
(113, 18, 3, 5000, 1),
(114, 18, 2, 2000, 0),
(115, 18, 1, 1000, 1),
(116, 19, 9, 500000, 0),
(117, 19, 8, 200000, 0),
(118, 19, 7, 100000, 0),
(119, 19, 6, 50000, 0),
(120, 19, 5, 20000, 0),
(121, 19, 4, 10000, 0),
(122, 19, 3, 5000, 1),
(123, 19, 2, 2000, 0),
(124, 19, 1, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `vat` decimal(10,0) DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `check_out_at` datetime DEFAULT NULL,
  `status` enum('processing','done') DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `id_table`, `id_customer`, `id_employee`, `total`, `vat`, `total_amount`, `create_at`, `check_out_at`, `status`) VALUES
(2, 1, 1, 1, 114000, '11400', '125400', '2018-11-05 19:30:17', '2018-11-07 21:39:13', 'done'),
(8, 2, 1, 1, 125000, '12500', '137500', '2018-11-08 04:08:06', '2018-11-08 04:08:48', 'done'),
(9, 1, 1, 1, 86000, '8600', '94600', '2018-11-08 04:17:21', '2018-11-08 04:20:07', 'done'),
(10, 1, 1, 1, 95000, '9500', '104500', '2018-11-08 04:21:00', '2018-11-08 04:21:55', 'done'),
(11, 1, 1, 1, 86000, '8600', '94600', '2018-11-08 10:33:22', '2018-11-09 13:07:49', 'done'),
(12, 1, 1, 1, 0, '0', '0', '2018-11-09 14:39:26', '2018-11-09 15:40:38', 'done'),
(13, 1, 1, 1, 0, '0', '0', '2018-11-09 15:40:45', '2018-11-09 15:40:48', 'done'),
(14, 2, 1, 1, 95000, '9500', '104500', '2018-11-09 15:41:17', '2018-11-09 15:41:43', 'done'),
(15, 6, 1, 1, 0, NULL, NULL, '2018-11-09 23:33:42', NULL, 'processing'),
(16, 4, 1, 1, 87000, '8700', '95700', '2018-11-10 01:07:40', '2018-11-10 01:08:08', 'done'),
(17, 2, 1, 1, 90000, '9000', '99000', '2018-11-10 11:28:01', '2018-11-10 11:29:02', 'done'),
(18, 1, 1, 1, 140000, '14000', '154000', '2018-11-13 03:44:12', '2018-11-13 03:44:44', 'done'),
(19, 1, 1, 1, 150000, '15000', '165000', '2018-11-13 16:42:54', '2018-11-13 16:43:36', 'done');

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `check_out_invoice` BEFORE UPDATE ON `invoice` FOR EACH ROW BEGIN
	IF NEW.status = 'done' THEN
    	SET NEW.check_out_at = CURRENT_TIMESTAMP;
        SET NEW.vat = NEW.total*0.1;
        SET NEW.total_amount = NEW.total + NEW.vat;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `description`) VALUES
(1, 'check_out'),
(2, 'tracking_bills'),
(3, 'manage_tables');

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id_role` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id_role`, `id_permission`) VALUES
(1, 1),
(2, 1),
(1, 2),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('active','available','booked') NOT NULL DEFAULT 'available',
  `book_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `status`, `book_at`) VALUES
(1, 'Table 1', 'available', '2018-11-11 19:00:00'),
(2, 'Table 2', 'available', NULL),
(3, 'Table 3', 'available', '2018-11-11 07:30:00'),
(4, 'Table 4', 'available', '2018-11-11 08:00:00'),
(5, 'Table 5', 'available', NULL),
(6, 'Table 6', 'available', NULL),
(7, 'Table 7', 'available', NULL),
(8, 'Table 8', 'available', NULL),
(9, 'Table 9', 'available', NULL),
(10, 'Table 10', 'available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_charge`
--

CREATE TABLE `transaction_charge` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `guest_cash` int(11) NOT NULL,
  `excess_cash` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_charge`
--

INSERT INTO `transaction_charge` (`id`, `id_invoice`, `guest_cash`, `excess_cash`) VALUES
(9, 2, 300000, 386000),
(11, 8, 200000, 62500),
(12, 9, 100000, 5400),
(13, 10, 110000, 5500),
(14, 11, 100000, 5400),
(15, 14, 200000, 95500),
(16, 16, 100000, 4300),
(17, 17, 100000, 1000),
(18, 18, 200000, 46000),
(19, 19, 170000, 5000);

--
-- Triggers `transaction_charge`
--
DELIMITER $$
CREATE TRIGGER `exchange_cash_after_insert_transaction_cash` AFTER INSERT ON `transaction_charge` FOR EACH ROW BEGIN
	DECLARE done BOOL DEFAULT FALSE;
    DECLARE V_quantities INT;
    DECLARE V_current_cash INT;
    DECLARE V_id_cash INT;
    DECLARE V_excess_cash INT DEFAULT NEW.excess_cash;
    DECLARE V_type_cash CURSOR FOR SELECT id,value FROM unit_cash ORDER BY value DESC;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done:=TRUE;
    
    OPEN V_type_cash;
    read_loop: LOOP
    	FETCH V_type_cash INTO V_id_cash,V_current_cash;
        IF done THEN
        	CLOSE V_type_cash;
            LEAVE read_loop;
        END IF;
        IF FLOOR(V_excess_cash/V_current_cash) > 0 THEN
        	SET V_quantities :=  FLOOR(V_excess_cash/V_current_cash);
            SET V_excess_cash = V_excess_cash - V_quantities*V_current_cash;
            INSERT INTO detail_transaction(`id_transaction_charge`,`id_unit_cash`,`value`,`quantities`) VALUES (NEW.id,V_id_cash,V_current_cash,V_quantities);
        ELSE
        	INSERT INTO detail_transaction(`id_transaction_charge`,`id_unit_cash`,`value`,`quantities`) VALUES (NEW.id,V_id_cash,V_current_cash,0);
        END IF;
    END LOOP;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_excess_cash` BEFORE INSERT ON `transaction_charge` FOR EACH ROW BEGIN
	SET NEW.excess_cash = NEW.guest_cash - (SELECT invoice.total_amount FROM invoice WHERE invoice.id = NEW.id_invoice);
END
$$
DELIMITER ;

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
-- Table structure for table `unit_cash`
--

CREATE TABLE `unit_cash` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit_cash`
--

INSERT INTO `unit_cash` (`id`, `value`) VALUES
(1, 1000),
(2, 2000),
(3, 5000),
(4, 10000),
(5, 20000),
(6, 50000),
(7, 100000),
(8, 200000),
(9, 500000);

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
(1, 'Ngô Đình Lộc', 98996814, 'ngodinhloc', '$2y$10$puoaUq4WqyIXQElK7vj.qOKHdYXYJg49P7JMlZ4nZ2XfPIyPNJIem', '2018-10-30 12:02:36', '0000-00-00 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id_user`, `id_role`) VALUES
(1, 1),
(1, 2);

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
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_transaction_id_tracsaction_charge_transaction_charge` (`id_transaction_charge`),
  ADD KEY `fk_detail_transaction_id_unit_cash_unit_cast` (`id_unit_cash`);

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
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id_role`,`id_permission`),
  ADD KEY `fk_roles_permissions_id_permission_permisions` (`id_permission`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `transaction_charge`
--
ALTER TABLE `transaction_charge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction_charge_id_invoice_invoice` (`id_invoice`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `unit_cash`
--
ALTER TABLE `unit_cash`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_user`,`id_role`),
  ADD KEY `fk_user_roles_id_roles_roles` (`id_role`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transaction_charge`
--
ALTER TABLE `transaction_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit_cash`
--
ALTER TABLE `unit_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- Constraints for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD CONSTRAINT `fk_detail_transaction_id_tracsaction_charge_transaction_charge` FOREIGN KEY (`id_transaction_charge`) REFERENCES `transaction_charge` (`id`),
  ADD CONSTRAINT `fk_detail_transaction_id_unit_cash_unit_cast` FOREIGN KEY (`id_unit_cash`) REFERENCES `unit_cash` (`id`);

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
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `fk_roles_permissions_id_permission_permisions` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `fk_roles_permissions_id_role_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `transaction_charge`
--
ALTER TABLE `transaction_charge`
  ADD CONSTRAINT `fk_transaction_charge_id_invoice_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `fk_user_roles_id_roles_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `fk_user_roles_id_user_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
