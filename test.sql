-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 10:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(11) NOT NULL,
  `airline_code` varchar(10) DEFAULT NULL,
  `flight_number` varchar(10) DEFAULT NULL,
  `passenger_title` varchar(5) DEFAULT NULL,
  `passenger_first_name` varchar(20) DEFAULT NULL,
  `passenger_last_name` varchar(20) DEFAULT NULL,
  `base_fare` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `address_line` varchar(100) DEFAULT NULL,
  `state` varchar(11) DEFAULT NULL,
  `country` varchar(11) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `airline_code`, `flight_number`, `passenger_title`, `passenger_first_name`, `passenger_last_name`, `base_fare`, `tax`, `address_line`, `state`, `country`, `postal_code`) VALUES
(1, 'AI', 'AI202', 'Mr.', 'John', 'Doe', 2500.00, 200.50, '123 Main St', 'California', 'USA', '90001'),
(2, 'AI', 'AI202', 'Mrs.', 'Jane', 'Smith', 2700.00, 250.75, '456 Oak Rd', 'Texas', 'USA', '75001'),
(3, 'UK', 'UK310', 'Dr.', 'Emily', 'Clark', 3000.00, 280.30, '789 Pine Ave', 'New York', 'USA', '10001'),
(4, 'BA', 'BA101', 'Miss', 'Sophia', 'Johnson', 1500.00, 180.00, '101 Maple St', 'Florida', 'USA', '33101'),
(5, 'LH', 'LH201', 'Mr.', 'Michael', 'Brown', 2100.00, 220.00, '202 Birch Rd', 'Illinois', 'USA', '60001'),
(6, 'AF', 'AF520', 'Mrs.', 'Linda', 'Davis', 3500.00, 300.00, '303 Elm St', 'Ohio', 'USA', '44101'),
(7, 'UA', 'UA450', 'Mx.', 'Jordan', 'Taylor', 2800.00, 240.00, '404 Cedar Dr', 'Michigan', 'USA', '48201'),
(8, 'AI', 'AI303', 'Sir', 'William', 'Miller', 3800.00, 310.50, '505 Redwood Ln', 'Nevada', 'USA', '89501'),
(9, 'QF', 'QF705', 'Lady', 'Olivia', 'Wilson', 5000.00, 400.00, '606 Ash Blvd', 'Arizona', 'USA', '85001'),
(10, 'CX', 'CX122', 'Dr.', 'James', 'Moore', 4500.00, 350.00, '707 Fir St', 'New Jersey', 'USA', '07301');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `salary` int(7) DEFAULT NULL,
  `hired_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `department`, `salary`, `hired_date`, `is_active`) VALUES
(1, 'John', 'Doe', 'Sales', 55000, '2020-05-15 10:00:00', 0),
(2, 'Jane', 'Smith', 'Marketing', 62000, '2018-08-20 10:00:00', 1),
(3, 'Mike', 'Johnson', 'IT', 75000, '2019-03-10 10:00:00', 1),
(4, 'Emily', 'Davis', 'HR', 48000, '2021-01-05 10:00:00', 0),
(5, 'Chris', 'Brown', 'IT', 72000, '2017-11-12 10:00:00', 1),
(6, 'Anna', 'Wilson', 'Sales', 53000, '2022-02-01 10:00:00', 0),
(7, 'John', 'Smith', 'IT', 55000, '2025-04-20 10:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE `flight_details` (
  `Flightld` int(11) NOT NULL,
  `AirlineCode` varchar(2) DEFAULT NULL,
  `FlightNumber` varchar(4) DEFAULT NULL,
  `DepartureDate` date DEFAULT NULL,
  `Departuretime` time DEFAULT NULL,
  `ArraivalDate` date DEFAULT NULL,
  `ArraivalTime` time DEFAULT NULL,
  `DepartureAirport` varchar(3) DEFAULT NULL,
  `ArraivalAirport` varchar(3) DEFAULT NULL,
  `BaseFare` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `Currency` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`Flightld`, `AirlineCode`, `FlightNumber`, `DepartureDate`, `Departuretime`, `ArraivalDate`, `ArraivalTime`, `DepartureAirport`, `ArraivalAirport`, `BaseFare`, `Tax`, `Currency`) VALUES
(1, 'AA', '1023', '2025-05-01', '08:30:00', '2025-05-01', '10:45:00', 'JFK', 'LAX', 300.00, 45.00, 'USD'),
(2, 'DL', '4127', '2025-05-02', '14:00:00', '2025-05-02', '16:15:00', 'ATL', 'SFO', 320.50, 50.00, 'USD'),
(3, 'UA', '5561', '2025-05-03', '18:45:00', '2025-05-03', '21:00:00', 'ORD', 'MIA', 250.00, 40.00, 'USD'),
(4, 'BA', '7789', '2025-05-04', '07:00:00', '2025-05-04', '09:30:00', 'LHR', 'JFK', 500.00, 75.00, 'GBP'),
(5, 'AF', '2456', '2025-05-05', '12:30:00', '2025-05-05', '14:45:00', 'CDG', 'LHR', 400.00, 60.00, 'EUR'),
(6, 'LH', '8312', '2025-05-06', '16:20:00', '2025-05-06', '18:55:00', 'FRA', 'MUC', 150.00, 25.00, 'EUR'),
(7, 'EK', '3071', '2025-05-07', '23:00:00', '2025-05-08', '05:00:00', 'DXB', 'JFK', 600.00, 90.00, 'USD'),
(8, 'QF', '9271', '2025-05-08', '10:30:00', '2025-05-08', '12:45:00', 'SYD', 'AKL', 200.00, 30.00, 'AUD'),
(9, 'SQ', '3215', '2025-05-09', '06:10:00', '2025-05-09', '08:00:00', 'SIN', 'HKG', 250.00, 35.00, 'SGD'),
(10, 'CA', '1452', '2025-05-10', '17:50:00', '2025-05-10', '20:00:00', 'PEK', 'BKK', 220.00, 40.00, 'CNY');

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `gift_card_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `given_to` int(11) DEFAULT NULL,
  `given_by` int(11) DEFAULT NULL,
  `issued_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expire_at` datetime NOT NULL,
  `template_id` varchar(100) DEFAULT NULL,
  `status` enum('active','redeemed','expired','blocked') DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gift_cards`
--

INSERT INTO `gift_cards` (`gift_card_id`, `code`, `value`, `platform_id`, `given_to`, `given_by`, `issued_at`, `expire_at`, `template_id`, `status`, `updated_at`) VALUES
(1, 'XMHY-9834-ANTP', 100.00, 1, 1, 1, '2025-04-18 11:05:14', '2026-04-18 11:05:14', '1', 'active', '2025-04-18 05:35:14'),
(2, 'HVSK-4004-JYNH', 100.00, 1, 1, 1, '2025-04-18 11:06:12', '2026-04-18 11:06:12', '1', 'active', '2025-04-18 05:36:12'),
(3, 'CYKV-4038-CYDP', 1000.00, 2, 1, 1, '2025-04-18 11:07:01', '2026-04-18 11:07:01', '1', 'active', '2025-04-18 05:37:01'),
(5, 'DMIG-6792-ERUQ', 100.00, 18, 1, 1, '2025-04-18 11:53:18', '2026-04-18 11:53:18', '6', 'active', '2025-04-18 06:23:18'),
(6, 'PUZI-9032-XHIY', 100.00, 14, 1, 1, '2025-04-21 22:32:24', '2026-04-21 22:32:24', '1', 'active', '2025-04-21 17:02:24'),
(7, 'OZLP-3192-SBTK', 100.00, 2, 1, 1, '2025-04-22 13:10:36', '2026-04-22 13:10:36', '1', 'active', '2025-04-22 07:40:36'),
(8, 'SYFQ-8296-MTEU', 100.00, 2, 1, 1, '2025-04-22 16:13:57', '2026-04-22 16:13:57', '1', 'active', '2025-04-22 10:43:57'),
(9, 'YCDV-1880-UVHW', 100.00, 28, 1, 1, '2025-04-22 19:09:59', '2026-04-22 19:09:59', '1', 'active', '2025-04-22 13:39:59'),
(10, 'HMSW-4547-QYJM', 100.00, 2, 1, 1, '2025-04-23 10:08:50', '2026-04-23 10:08:50', '1', 'active', '2025-04-23 04:38:50'),
(11, 'SCAX-2923-JYGN', 100.00, 3, 1, 5, '2025-04-23 10:15:35', '2026-04-23 10:15:35', '1', 'active', '2025-04-23 04:45:35'),
(12, 'CZSO-4517-XZUK', 100.00, 2, 1, 4, '2025-06-17 00:03:52', '2026-06-17 00:03:52', '1', 'active', '2025-06-16 18:33:52'),
(13, 'QXME-7440-LHVY', 100.00, 2, 1, 4, '2025-06-17 00:03:56', '2026-06-17 00:03:56', '1', 'active', '2025-06-16 18:33:56'),
(14, 'BQGU-9161-JDNV', 100.00, 2, 1, 4, '2025-06-17 00:04:25', '2026-06-17 00:04:25', '1', 'active', '2025-06-16 18:34:25'),
(15, 'GOKJ-5019-ITYP', 100.00, 2, 1, 4, '2025-06-17 00:06:40', '2026-06-17 00:06:40', '1', 'active', '2025-06-16 18:36:40'),
(16, 'SZUH-1515-DNIW', 100.00, 2, 1, 4, '2025-06-17 00:12:49', '2026-06-17 00:12:49', '1', 'active', '2025-06-16 18:42:49'),
(17, 'YFJN-5845-JDAC', 100.00, 2, 5, 4, '2025-06-17 00:13:04', '2026-06-17 00:13:04', '1', 'active', '2025-06-16 18:43:04'),
(18, 'XHIN-4221-AGEX', 1000.00, 3, 1, 4, '2025-06-17 00:56:50', '2026-06-17 00:56:50', '1', 'active', '2025-06-16 19:26:50'),
(19, 'QREV-6277-CUKE', 1000.00, 11, 1, 4, '2025-06-17 01:04:56', '2026-06-17 01:04:56', '1', 'active', '2025-06-16 19:34:56'),
(20, 'KXSO-4411-GRSD', 1000.00, 1, 1, 1, '2025-06-17 01:15:23', '2026-06-17 01:15:23', '1', 'active', '2025-06-16 19:45:23'),
(21, 'QEKS-5357-NQLX', 100.00, 2, 1, 1, '2025-06-17 01:16:38', '2026-06-17 01:16:38', '1', 'active', '2025-06-16 19:46:38'),
(22, 'VWIY-4354-JPIL', 1000.00, 6, 1, 1, '2025-06-17 01:18:10', '2026-06-17 01:18:10', '1', 'active', '2025-06-16 19:48:10'),
(23, 'FLMO-6262-DYJC', 1000.00, 7, 1, 1, '2025-06-17 01:19:24', '2026-06-17 01:19:24', '1', 'active', '2025-06-16 19:49:24'),
(24, 'TLRC-6979-PLSY', 111.00, 23, 1, 1, '2025-06-17 01:21:02', '2026-06-17 01:21:02', '1', 'active', '2025-06-16 19:51:02'),
(25, 'GLVT-2657-WSCD', 1000.00, 23, 1, 1, '2025-06-17 01:22:40', '2026-06-17 01:22:40', '1', 'active', '2025-06-16 19:52:40'),
(26, 'KJAI-6325-ZDYN', 1000.00, 2, 8, 8, '2025-06-17 10:05:40', '2026-06-17 10:05:40', '1', 'active', '2025-06-17 04:35:40'),
(27, 'OMLR-7819-GYLM', 111.00, 1, 8, 8, '2025-06-17 10:20:23', '2026-06-17 10:20:23', '1', 'active', '2025-06-17 04:50:23'),
(28, 'RDJH-5155-UFBK', 999.00, 10, 8, 8, '2025-06-17 10:21:58', '2026-06-17 10:21:58', '1', 'active', '2025-06-17 04:51:58'),
(29, 'RPGB-5049-CQVL', 123.00, 17, 8, 1, '2025-06-17 10:31:06', '2026-06-17 10:31:06', '4', 'active', '2025-06-17 05:01:06'),
(30, 'KGTM-2906-MCOI', 999.00, 17, 8, 1, '2025-06-17 10:35:50', '2026-06-17 10:35:50', '4', 'active', '2025-06-17 05:05:50'),
(31, 'ZXUE-7969-BYGI', 888.00, 57, 8, 1, '2025-06-17 10:36:52', '2026-06-17 10:36:52', '1', 'active', '2025-06-17 05:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `passport_details`
--

CREATE TABLE `passport_details` (
  `passport_id` int(11) NOT NULL,
  `passport_no` varchar(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `issued_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passport_details`
--

INSERT INTO `passport_details` (`passport_id`, `passport_no`, `name`, `dob`, `issued_date`) VALUES
(1, 'P123456789', 'John Doe', '1990-05-14', '2015-06-01'),
(2, 'P987654321', 'Alice Smith', '1985-10-22', '2017-09-15'),
(3, 'P543216789', 'Bob Johnson', '1980-03-30', '2018-12-20'),
(4, 'P321654987', 'Maria Garcia', '1995-07-07', '2020-01-10'),
(5, 'P159753486', 'James Brown', '1992-11-03', '2019-05-25'),
(6, 'P246801357', 'Emily Davis', '1988-02-16', '2021-08-12'),
(7, 'P369852741', 'Michael Lee', '1982-09-29', '2016-04-18'),
(8, 'P741258963', 'Sophia Wilson', '2000-01-11', '2022-11-05'),
(9, 'P852963741', 'David Martinez', '1994-06-25', '2017-07-19'),
(10, 'P456123789', 'Linda Taylor', '1979-12-01', '2014-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `platform_id` int(11) NOT NULL,
  `platform_name` varchar(50) NOT NULL,
  `platform_key` int(11) NOT NULL,
  `platform_category` varchar(50) NOT NULL,
  `template` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`platform_id`, `platform_name`, `platform_key`, `platform_category`, `template`) VALUES
(1, 'amazon', 1, 'E-commerce', '10'),
(2, 'flipkart', 2, 'E-commerce', '11'),
(3, 'ajio', 3, 'E-commerce', '12'),
(5, 'swiggy', 8, 'Food', '27'),
(6, 'domino\'s', 9, 'Food', '30'),
(7, 'zomato', 10, 'Food', '16'),
(8, 'uber eats', 11, 'Food', '37'),
(9, 'kfc', 12, 'Food', '22'),
(10, 'McDonald\'s', 13, 'Food', '31'),
(11, 'burger king', 14, 'Food', '38'),
(12, 'xbox', 15, 'Gaming', '17'),
(13, 'playstation', 16, 'Gaming', '14'),
(14, 'google play store', 17, 'Gaming', '44'),
(15, 'steam', 18, 'Gaming', '13'),
(16, 'roit', 19, 'Gaming', '25'),
(17, 'apple app store', 20, 'Gaming', '45'),
(18, 'Apple TV', 32, 'Entertainment', '19'),
(19, 'amazon prime', 21, 'Entertainment', '33'),
(20, 'netflix', 22, 'Entertainment', '23'),
(21, 'zee', 23, 'Entertainment', '34'),
(22, 'hotstar', 24, 'Entertainment', '21'),
(23, 'youtube', 25, 'Entertainment', '26'),
(24, 'makemytrip', 26, 'Travel', '35'),
(25, 'uber', 27, 'Travel', '15'),
(26, 'rapido', 28, 'Travel', '36'),
(27, 'ola', 29, 'Travel', '18'),
(28, 'yatra', 30, 'Travel', '39'),
(29, 'irctc', 31, 'Travel', '40'),
(57, 'huawei', 1215, 'Gaming', '46');

-- --------------------------------------------------------

--
-- Table structure for table `platform_templates`
--

CREATE TABLE `platform_templates` (
  `temp_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platform_templates`
--

INSERT INTO `platform_templates` (`temp_id`, `name`, `path`) VALUES
(1, 'default', '../platform_templates/temp_img.png'),
(2, 'new amazon', '../platform_templates/3049-new_amazon.png'),
(3, 'test', './public/platform_templates/5618-test.jpg'),
(4, 'test', './public/platform_templates/5618-test.jpg'),
(5, 'test', './public/platform_templates/5618-test.jpg'),
(9, 'amazon', './public/platform_templates/1-amazon.png'),
(10, 'amazon', './public/platform_templates/1-amazon.jpg'),
(11, 'flipkart', './public/platform_templates/2-flipkart.png'),
(12, 'ajio', './public/platform_templates/3-ajio.jpg'),
(13, 'steam', './public/platform_templates/18-steam.png'),
(14, 'playstation', './public/platform_templates/16-playstation.png'),
(15, 'uber', './public/platform_templates/27-uber.jpg'),
(16, 'zomato', './public/platform_templates/10-zomato.png'),
(17, 'xbox', './public/platform_templates/15-xbox.jpg'),
(18, 'ola', './public/platform_templates/29-ola.jpg'),
(19, 'Apple TV', './public/platform_templates/32-Apple_TV.png'),
(20, 'apple app store', './public/platform_templates/20-apple_app_store.png'),
(21, 'hotstar', './public/platform_templates/24-hotstar.png'),
(22, 'kfc', './public/platform_templates/12-kfc.jpg'),
(23, 'netflix', './public/platform_templates/22-netflix.png'),
(24, 'google play store', './public/platform_templates/17-google_play_store.j'),
(25, 'roit', './public/platform_templates/19-roit.png'),
(26, 'youtube', './public/platform_templates/25-youtube.jpg'),
(27, 'swiggy', './public/platform_templates/8-swiggy.png'),
(28, 'domino\'s', './public/platform_templates/9-domino\'s.jpg'),
(29, 'domino\'s', './public/platform_templates/9-domino\'s.jpg'),
(30, 'domino\'s', './public/platform_templates/9-domino\'s.jpg'),
(31, 'McDonald\'s', './public/platform_templates/13-McDonald\'s.jpg'),
(32, 'google play store', './public/platform_templates/17-google_play_store.j'),
(33, 'amazon prime', './public/platform_templates/21-amazon_prime.jpg'),
(34, 'zee', './public/platform_templates/23-zee.png'),
(35, 'makemytrip', './public/platform_templates/26-makemytrip.png'),
(36, 'rapido', './public/platform_templates/28-rapido.jpg'),
(37, 'uber eats', './public/platform_templates/11-uber_eats.jpg'),
(38, 'burger king', './public/platform_templates/14-burger_king.jpg'),
(39, 'yatra', './public/platform_templates/30-yatra.jpg'),
(40, 'irctc', './public/platform_templates/31-irctc.png'),
(41, 'google play store', './public/platform_templates/17-google_play_store.p'),
(42, 'google play store', './public/platform_templates/17-google_play_store.png'),
(43, 'apple app store', './public/platform_templates/20-apple_app_store.jpg'),
(44, 'google play store', './public/platform_templates/17-google_play_store.jpg'),
(45, 'apple app store', './public/platform_templates/20-apple_app_store.png'),
(46, 'huawei', './public/platform_templates/1215-huawei.png');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `temp_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `path` varchar(255) NOT NULL DEFAULT './imgs/temp_img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`temp_id`, `name`, `path`) VALUES
(1, 'default', './public/default_platform_templates/temp_img.png'),
(3, 'happy dewali', './public/default_platform_templates/temp3.jpg'),
(4, 'happy birthday', './public/default_platform_templates/temp4.jpg'),
(5, 'marry christmas', './public/default_platform_templates/temp0.jpg'),
(6, 'happy graduation', './public/default_platform_templates/temp6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `emailid` varchar(55) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `emailid`, `password`, `created_at`, `is_admin`) VALUES
(1, 'admin', 'example@example.com', '1234', '2025-04-16 10:20:00', 1),
(2, 'hello', 'hello@gmail.con', 'hellothere', '2025-04-21 08:34:38', 0),
(4, 'username', 'email@gmail.com', 'hellothere', '2025-04-21 09:10:44', 0),
(5, 'this is a new user', 'newexample@gmail.com', '12345678', '2025-04-23 04:42:12', 0),
(6, 'someonethere', 'unknown@gmail.com', '12345678', '2025-06-13 05:30:28', 0),
(7, 'unknownname', 'unknownmail@gmail.com', 'password', '2025-06-13 05:32:22', 0),
(8, 'mrbean', 'mrbean@company.com', 'password', '2025-06-17 04:34:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD PRIMARY KEY (`Flightld`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`gift_card_id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `platform_id` (`platform_id`),
  ADD KEY `given_to` (`given_to`),
  ADD KEY `given_by` (`given_by`);

--
-- Indexes for table `passport_details`
--
ALTER TABLE `passport_details`
  ADD PRIMARY KEY (`passport_id`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`platform_id`),
  ADD UNIQUE KEY `platform_name` (`platform_name`),
  ADD UNIQUE KEY `platform_key` (`platform_key`);

--
-- Indexes for table `platform_templates`
--
ALTER TABLE `platform_templates`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `gift_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `passport_details`
--
ALTER TABLE `passport_details`
  MODIFY `passport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `platform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `platform_templates`
--
ALTER TABLE `platform_templates`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD CONSTRAINT `gift_cards_ibfk_1` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`platform_id`),
  ADD CONSTRAINT `gift_cards_ibfk_2` FOREIGN KEY (`given_to`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `gift_cards_ibfk_3` FOREIGN KEY (`given_by`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
