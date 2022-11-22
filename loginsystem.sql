-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 06:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_member` (IN `contact_id` VARCHAR(40), IN `Fname` VARCHAR(40), IN `Lname` VARCHAR(40))   BEGIN
UPDATE doctorapp SET fname = Fname, lname = Lname WHERE contact = contact_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doctorapp`
--

CREATE TABLE `doctorapp` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `docapp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorapp`
--

INSERT INTO `doctorapp` (`fname`, `lname`, `email`, `contact`, `docapp`) VALUES
('agh', 'asdsad', 'raman@gmail.com', '204', '103'),
('Ankit', 'Verma', 'verma12@gmail.com', '207', '103'),
('Ankit', 'Borkar', 'borkarankitank@gmail.comasf', '421', '102'),
('Ankitsad', 'asdf', 'borkarankitank@gmail.com', '456', '103');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`username`, `password`) VALUES
('admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Package_id` varchar(40) NOT NULL,
  `Package_name` varchar(40) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Package_id`, `Package_name`, `Amount`) VALUES
('121', 'preliminary', 800),
('122', 'Wt. gain', 1500),
('123', 'Wt.loss', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(10) NOT NULL,
  `Amount` int(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `Amount`, `customer_id`, `payment_type`) VALUES
(4547, 5000, '786', 'UPI');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `payment_del` BEFORE DELETE ON `payment` FOR EACH ROW INSERT INTO payment_history SET payment_id = OLD.payment_id, amount = OLD.amount, customer_id = OLD.customer_id, payment_type = OLD.payment_type
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `payment_id` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`payment_id`, `amount`, `customer_id`, `payment_type`) VALUES
(0, 0, '', ''),
(123, 150, '201', 'cash'),
(174, 1000, '421', 'card'),
(301, 1500, '201', 'cash'),
(302, 800, '202', 'card'),
(303, 1000, '203', 'cheque'),
(304, 1500, '204', 'cash'),
(305, 1500, '201', 'cash'),
(3382, 1500, '201', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `Trainer_id` int(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`Trainer_id`, `Name`, `phone`) VALUES
(102, 'Ravi', 21365789),
(708, 'pakshi', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorapp`
--
ALTER TABLE `doctorapp`
  ADD PRIMARY KEY (`contact`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`Trainer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- join query
--  select d.fname,d.lname,d.contact,p.payment_id,p.amount,p.customer_id,p.payment_type from doctorapp as d join payment as p on d.contact=p.customer_id;