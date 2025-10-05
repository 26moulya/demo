-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 11:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve_master`
--

CREATE TABLE `approve_master` (
  `approve_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `approved_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approve_master`
--

INSERT INTO `approve_master` (`approve_id`, `user_id`, `request_id`, `approved_date`) VALUES
(1, 5, 1, '2023-01-17 05:40:01'),
(2, 5, 2, '2023-01-17 05:41:45'),
(3, 5, 3, '2023-01-17 05:41:49'),
(4, 5, 1, '2023-01-17 05:40:01'),
(5, 5, 2, '2023-01-17 05:41:45'),
(6, 5, 3, '2023-01-17 05:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `patient_gender` varchar(50) NOT NULL,
  `patient_age` smallint(6) NOT NULL,
  `request_reason` text NOT NULL,
  `request_status` tinyint(1) NOT NULL,
  `request_date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`request_id`, `user_id`, `receiver_id`, `patient_name`, `hospital_name`, `blood_group`, `patient_gender`, `patient_age`, `request_reason`, `request_status`, `request_date_create`) VALUES
(1, 4, 5, 'Adarsh K', 'KS Hegde medical Hospital Deralakatte', 'A-', 'Male', 45, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 05:39:43'),
(2, 4, 5, 'Sumana B', 'Coloso Hospital Bangalore', 'B+', 'Female', 43, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 05:41:21'),
(3, 6, 5, 'Deepa Rai', 'City Hospital Kankanady mangalore', 'B+', 'Female', 25, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 05:41:41'),
(4, 4, 5, 'Sundar Moorthi', 'Indiyana Hospital Mangalotre', 'B+', 'Male', 54, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 05:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `login_id` int(11) NOT NULL,
  `login_email_id` varchar(50) NOT NULL,
  `login_password` varchar(50) NOT NULL,
  `login_date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`login_id`, `login_email_id`, `login_password`, `login_date_create`, `user_type`) VALUES
(1, 'akash@gmail.com', '1234567', '2023-01-16 05:07:07', 'User'),
(2, 'suraj@gmail.com', '1234568', '2023-01-16 05:19:31', 'User'),
(3, 'bharath@hotmail.com', '1234569', '2023-01-16 06:18:47', 'User'),
(4, 'amrutha123@gmail.com', '1234560', '2023-01-16 06:19:33', 'User'),
(5, 'bhanushree@gmail.com', '1234563', '2023-01-16 06:20:34', 'User'),
(6, 'admin@gmail.com', '123456', '2023-01-16 06:20:34', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email_id` varchar(75) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_address` text NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_blood_group` varchar(10) NOT NULL,
  `user_phone_number` varchar(10) NOT NULL,
  `user_age` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_name`, `user_email_id`, `user_city`, `user_gender`, `user_address`, `user_status`, `user_date_create`, `user_blood_group`, `user_phone_number`, `user_age`) VALUES
(1, 'Akash k', 'akash@gmail.com', 'Mangalore', 'Male', '5th cross, Jp nagar, Hampankatta Mangalore', 1, '2023-01-16 05:07:07', 'O+', '9898989898', 45),
(2, 'Suraj', 'suraj@gmail.com', 'Udupi', 'Male', 'New Mak mall Udupi', 1, '2023-01-16 05:19:31', 'B-', '9898989855', 25),
(3, 'Bharath', 'bharath@hotmail.com', 'Bangalore', 'Male', 'KSR Rao Road Old bustand Bangalore', 1, '2023-01-16 06:18:47', 'A-', '9898989854', 85),
(4, 'Amrutha', 'amrutha123@gmail.com', 'Hasana', 'Female', '7th Cross Near Krishna Templa Hasan', 1, '2023-01-16 06:19:33', 'AB+', '8547854125', 21),
(5, 'Bhanu Shree', 'bhanushree@gmail.com', 'Dharvad', 'Female', 'Near Pandith house, Kodagu', 1, '2023-01-16 06:20:34', 'A-', '8569856985', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve_master`
--
ALTER TABLE `approve_master`
  ADD PRIMARY KEY (`approve_id`);

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve_master`
--
ALTER TABLE `approve_master`
  MODIFY `approve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
