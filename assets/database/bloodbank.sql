-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for blood_donation
CREATE DATABASE IF NOT EXISTS `blood_donation` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `blood_donation`;

-- Dumping structure for table blood_donation.approve_master
CREATE TABLE IF NOT EXISTS `approve_master` (
  `approve_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `request_id` int NOT NULL,
  `approved_date` timestamp NOT NULL,
  PRIMARY KEY (`approve_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table blood_donation.approve_master: ~4 rows (approximately)
INSERT INTO `approve_master` (`approve_id`, `user_id`, `request_id`, `approved_date`) VALUES
	(1, 5, 1, '2023-01-17 11:10:01'),
	(2, 5, 2, '2023-01-17 11:11:45'),
	(3, 5, 3, '2023-01-17 11:11:49');

-- Dumping structure for table blood_donation.blood_request
CREATE TABLE IF NOT EXISTS `blood_request` (
  `request_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `patient_gender` varchar(50) NOT NULL,
  `patient_age` smallint NOT NULL,
  `request_reason` text NOT NULL,
  `request_status` tinyint(1) NOT NULL,
  `request_date_create` timestamp NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table blood_donation.blood_request: ~11 rows (approximately)
INSERT INTO `blood_request` (`request_id`, `user_id`, `receiver_id`, `patient_name`, `hospital_name`, `blood_group`, `patient_gender`, `patient_age`, `request_reason`, `request_status`, `request_date_create`) VALUES
	(1, 4, 5, 'Adarsh K', 'KS Hegde medical Hospital Deralakatte', 'A-', 'Male', 45, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 11:09:43'),
	(2, 4, 5, 'Sumana B', 'Coloso Hospital Bangalore', 'B+', 'Female', 43, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 11:11:21'),
	(3, 6, 5, 'Deepa Rai', 'City Hospital Kankanady mangalore', 'B+', 'Female', 25, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 11:11:41'),
	(4, 4, 5, 'Sundar Moorthi', 'Indiyana Hospital Mangalotre', 'B+', 'Male', 54, 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2023-01-17 11:12:26');

-- Dumping structure for table blood_donation.login_master
CREATE TABLE IF NOT EXISTS `login_master` (
  `login_id` int NOT NULL AUTO_INCREMENT,
  `login_email_id` varchar(50) NOT NULL,
  `login_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login_date_create` timestamp NOT NULL,
  `user_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table blood_donation.login_master: ~6 rows (approximately)
INSERT INTO `login_master` (`login_id`, `login_email_id`, `login_password`, `login_date_create`, `user_type`) VALUES
	(3, 'akash@gmail.com', '1234567', '2023-01-16 10:37:07', 'User'),
	(4, 'suraj@gmail.com', '1234568', '2023-01-16 10:49:31', 'User'),
	(5, 'bharath@hotmail.com', '1234569', '2023-01-16 11:48:47', 'User'),
	(6, 'amrutha123@gmail.com', '1234560', '2023-01-16 11:49:33', 'User'),
	(7, 'bhanushree@gmail.com', '1234563', '2023-01-16 11:50:34', 'User'),
	(8, 'admin@gmail.com', '123456', '2023-01-16 11:50:34', 'Admin');

-- Dumping structure for table blood_donation.user_master
CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_email_id` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_date_create` timestamp NOT NULL,
  `user_blood_group` varchar(10) NOT NULL,
  `user_phone_number` varchar(10) NOT NULL,
  `user_age` smallint NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table blood_donation.user_master: ~5 rows (approximately)
INSERT INTO `user_master` (`user_id`, `user_name`, `user_email_id`, `user_city`, `user_gender`, `user_address`, `user_status`, `user_date_create`, `user_blood_group`, `user_phone_number`, `user_age`) VALUES
	(4, 'Akash k', 'akash@gmail.com', 'Mangalore', 'Male', '5th cross, Jp nagar, Hampankatta Mangalore', 1, '2023-01-16 10:37:07', 'O+', '9898989898', 45),
	(5, 'Suraj', 'suraj@gmail.com', 'Udupi', 'Male', 'New Mak mall Udupi', 1, '2023-01-16 10:49:31', 'B-', '9898989855', 25),
	(6, 'Bharath', 'bharath@hotmail.com', 'Bangalore', 'Male', 'KSR Rao Road Old bustand Bangalore', 1, '2023-01-16 11:48:47', 'A-', '9898989854', 85),
	(7, 'Amrutha', 'amrutha123@gmail.com', 'Hasana', 'Female', '7th Cross Near Krishna Templa Hasan', 1, '2023-01-16 11:49:33', 'AB+', '8547854125', 21),
	(8, 'Bhanu Shree', 'bhanushree@gmail.com', 'Dharvad', 'Female', 'Near Pandith house, Kodagu', 1, '2023-01-16 11:50:34', 'A-', '8569856985', 23);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
