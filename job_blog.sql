-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 04:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_partner`
--

CREATE TABLE `company_partner` (
  `company_id` int(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_partner`
--

INSERT INTO `company_partner` (`company_id`, `company_name`, `logo`, `location`, `phone_number`, `description`) VALUES
(19, 'TWPC Investment (Cambodia) Co., Ltd.', 'TWPC.png', 'PhnomPenh', '09985623', 'The Company’s core business divided into three main categories: The tapioca starch starch-related products, food products, the biodegradable products distributed local well international markets, details follows:  Tapioca products include tapioca starch, alpha starch, sago (or tapioca pearl), of which manufactured sold by Company its subsidiaries, namely Thai Nam Tapioca Company Limited, D I Company Limited, Thai Wah Alpha Starch Company Limited, Tay Ninh Tapioca Joint Stock Company.  Vermicelli Noodle products include vermicelli, rice noodle, rice vermicelli, mung bean starch noodles (Shanghai noodles) which manufactured sold by Company, having vermicelli its main product. The raw materials vermicelli the other noodle products pea starch, potato starch, tapioca starch, rice.  Biodegradable products; our tapioca-based TPS derived renewable feedstock >90% bio content better elongation suitable flexible packaging of mulch film, bags other blown film applications. Our first generation TPS compounds, suitable end-of-life applications thermoforming, injection molding extrusion, unique blend high performing biodegradable feedstock that both industrial home compostable.'),
(20, 'Sorita Travel Cambodia', '62c3b2f21d2f8.png', 'Phnom Penh', '09985623', 'We now looking qualified to fulfill position below.');

-- --------------------------------------------------------

--
-- Table structure for table `job_benefit`
--

CREATE TABLE `job_benefit` (
  `benefit_id` int(50) NOT NULL,
  `position_id` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `category_Id` int(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`category_Id`, `category_name`, `description`) VALUES
(24, 'Engineer/Electrical', ''),
(25, ' Tourism/Sales/Marketing', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`) VALUES
(1, 'phearom', '123');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `salary` double NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `category_id`, `company_id`, `position_name`, `salary`, `dateTime`) VALUES
(24, 24, 19, 'Electrical Technician', 600, '2023-10-08 01:10:52'),
(25, 25, 20, 'បុគ្គលិកផ្នែកលក់សំបុត្រយន្ដហោះ', 700, '2023-10-08 01:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `requierment_id` int(50) NOT NULL,
  `position_id` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`requierment_id`, `position_id`, `company_id`, `description`) VALUES
(10, 24, 19, 'Diploma/bachelor’s degree mechatronics / Electrical Engineering /Instrument Engineer'),
(11, 24, 19, 'Year experience maintenance service manufacturing/Factory ,'),
(12, 24, 19, 'Excellence for PLC SCADA'),
(13, 25, 20, 'ត្រូវមានបទពិសោធន៏ក្នុងការកក់សំបុត្រយន្ដហោះចាប់២ឆ្នាំឡើងទៅ​'),
(14, 25, 20, 'ត្រូវចេះប្រើប្រាស់កម្មវិធី Word Excel'),
(15, 25, 20, 'ត្រូវមានភាពទទួលខុសត្រូវលើការងារ (សំរាប់អ្នកគ្មានបទពិសោធន៍ក៍អាចដាក់ពាក្យមកសិនបាន)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_partner`
--
ALTER TABLE `company_partner`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `job_benefit`
--
ALTER TABLE `job_benefit`
  ADD PRIMARY KEY (`benefit_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`category_Id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`requierment_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_partner`
--
ALTER TABLE `company_partner`
  MODIFY `company_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_benefit`
--
ALTER TABLE `job_benefit`
  MODIFY `benefit_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `category_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
  MODIFY `requierment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_benefit`
--
ALTER TABLE `job_benefit`
  ADD CONSTRAINT `job_benefit_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`),
  ADD CONSTRAINT `job_benefit_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company_partner` (`company_id`);

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`category_Id`),
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company_partner` (`company_id`);

--
-- Constraints for table `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `requirement_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`),
  ADD CONSTRAINT `requirement_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company_partner` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
