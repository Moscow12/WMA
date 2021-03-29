-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2021 at 02:42 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `Customer_ID` int NOT NULL,
  `Custome_name` varchar(250) NOT NULL,
  `Phone_Number` varchar(50) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Added_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_measure_type`
--

CREATE TABLE `tbl_customer_measure_type` (
  `Customer_measure_ID` int NOT NULL,
  `Customer_ID` int NOT NULL,
  `Type_measure_ID` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_measure_mantainance`
--

CREATE TABLE `tbl_measure_mantainance` (
  `Measure_mantainance_ID` int NOT NULL,
  `Customer_measure_ID` int NOT NULL,
  `Amount_required` int NOT NULL,
  `measure_status` varchar(50) NOT NULL,
  `test_date` datetime NOT NULL,
  `Payment_status` varchar(20) NOT NULL DEFAULT 'Active',
  `User_ID` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_of_measure`
--

CREATE TABLE `tbl_payment_of_measure` (
  `Payment_ID` int NOT NULL,
  `Measure_mantainance_ID` int NOT NULL,
  `Amount_paid` int NOT NULL,
  `Phone_number` int NOT NULL,
  `Payment_date` int NOT NULL,
  `Reference_number` int NOT NULL,
  `User_ID` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilage`
--

CREATE TABLE `tbl_privilage` (
  `Privilage_ID` int NOT NULL,
  `Privilage_name` varchar(200) NOT NULL,
  `added_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_of_measure`
--

CREATE TABLE `tbl_type_of_measure` (
  `Type_measure_ID` int NOT NULL,
  `Type_of_measure` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Added_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Users`
--

CREATE TABLE `tbl_Users` (
  `User_ID` int NOT NULL,
  `Full_name` varchar(250) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Phone_number` varchar(50) NOT NULL,
  `Workstation_ID` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Added_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_Users`
--

INSERT INTO `tbl_Users` (`User_ID`, `Full_name`, `Gender`, `Phone_number`, `Workstation_ID`, `username`, `Password`, `Added_by`, `created_at`) VALUES
(1, 'Meshack Muga', 'Male', '657734673', 1, 'muga', '0b982fe723649fb9f035fe1e8fb0e4db', 1, '2021-03-15 18:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_privalege`
--

CREATE TABLE `tbl_user_privalege` (
  `User_privalage_ID` int NOT NULL,
  `Privilage_ID` int NOT NULL,
  `User_ID` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_working_station`
--

CREATE TABLE `tbl_working_station` (
  `Workstation_ID` int NOT NULL,
  `Workstation_name` varchar(250) NOT NULL,
  `Location` varchar(250) NOT NULL,
  `Added_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_working_station`
--

INSERT INTO `tbl_working_station` (`Workstation_ID`, `Workstation_name`, `Location`, `Added_by`, `created_at`) VALUES
(1, 'Mtumba', 'Dodoma', 1, '2021-03-15 18:17:07'),
(2, 'DOom', 'DOM', 1, '2021-03-19 01:06:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `tbl_customer_measure_type`
--
ALTER TABLE `tbl_customer_measure_type`
  ADD PRIMARY KEY (`Customer_measure_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Type_measure_ID` (`Type_measure_ID`);

--
-- Indexes for table `tbl_measure_mantainance`
--
ALTER TABLE `tbl_measure_mantainance`
  ADD PRIMARY KEY (`Measure_mantainance_ID`),
  ADD KEY `Customer_measure_ID` (`Customer_measure_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `tbl_payment_of_measure`
--
ALTER TABLE `tbl_payment_of_measure`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Measure_mantainance_ID` (`Measure_mantainance_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `tbl_privilage`
--
ALTER TABLE `tbl_privilage`
  ADD PRIMARY KEY (`Privilage_ID`);

--
-- Indexes for table `tbl_type_of_measure`
--
ALTER TABLE `tbl_type_of_measure`
  ADD PRIMARY KEY (`Type_measure_ID`);

--
-- Indexes for table `tbl_Users`
--
ALTER TABLE `tbl_Users`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Workstation_ID` (`Workstation_ID`);

--
-- Indexes for table `tbl_user_privalege`
--
ALTER TABLE `tbl_user_privalege`
  ADD PRIMARY KEY (`User_privalage_ID`);

--
-- Indexes for table `tbl_working_station`
--
ALTER TABLE `tbl_working_station`
  ADD PRIMARY KEY (`Workstation_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `Customer_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_measure_type`
--
ALTER TABLE `tbl_customer_measure_type`
  MODIFY `Customer_measure_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_measure_mantainance`
--
ALTER TABLE `tbl_measure_mantainance`
  MODIFY `Measure_mantainance_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment_of_measure`
--
ALTER TABLE `tbl_payment_of_measure`
  MODIFY `Payment_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_privilage`
--
ALTER TABLE `tbl_privilage`
  MODIFY `Privilage_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_type_of_measure`
--
ALTER TABLE `tbl_type_of_measure`
  MODIFY `Type_measure_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_Users`
--
ALTER TABLE `tbl_Users`
  MODIFY `User_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_privalege`
--
ALTER TABLE `tbl_user_privalege`
  MODIFY `User_privalage_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_working_station`
--
ALTER TABLE `tbl_working_station`
  MODIFY `Workstation_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customer_measure_type`
--
ALTER TABLE `tbl_customer_measure_type`
  ADD CONSTRAINT `tbl_customer_measure_type_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customers` (`Customer_ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_customer_measure_type_ibfk_2` FOREIGN KEY (`Type_measure_ID`) REFERENCES `tbl_type_of_measure` (`Type_measure_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_measure_mantainance`
--
ALTER TABLE `tbl_measure_mantainance`
  ADD CONSTRAINT `tbl_measure_mantainance_ibfk_1` FOREIGN KEY (`Customer_measure_ID`) REFERENCES `tbl_customer_measure_type` (`Customer_measure_ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_measure_mantainance_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `tbl_Users` (`User_ID`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment_of_measure`
--
ALTER TABLE `tbl_payment_of_measure`
  ADD CONSTRAINT `tbl_payment_of_measure_ibfk_1` FOREIGN KEY (`Measure_mantainance_ID`) REFERENCES `tbl_measure_mantainance` (`Measure_mantainance_ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_payment_of_measure_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `tbl_Users` (`User_ID`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `tbl_Users`
--
ALTER TABLE `tbl_Users`
  ADD CONSTRAINT `tbl_Users_ibfk_1` FOREIGN KEY (`Workstation_ID`) REFERENCES `tbl_working_station` (`Workstation_ID`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
