-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 09:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `updation_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `username`, `password`, `updation_date`) VALUES
(1, 'abalfonso', 'admin1', ''),
(2, 'kcthuplo', 'admin2', ''),
(3, 'samsantos', 'admin3', ''),
(4, 'slgzamora', 'admin4', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_no` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `date_posted` date NOT NULL,
  `details` varchar(255) NOT NULL,
  `approval` varchar(50) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_no`, `appointment_date`, `appointment_time`, `date_posted`, `details`, `approval`, `patient_id`, `doctor_id`) VALUES
(32, '2021-02-17', '00:27:00', '2021-02-12', 'Follow-up', 'pending', 25, 6),
(33, '2021-02-09', '00:28:00', '2021-02-12', 'Follow-up', 'APPROVED', 25, 6),
(34, '2021-02-17', '00:27:00', '2021-02-12', 'Follow-up', 'pending', 26, 6),
(35, '2021-02-08', '00:27:00', '2021-02-12', 'Follow-up', 'CANCELLED', 26, 6),
(36, '2021-02-10', '12:27:00', '2021-02-12', 'Checkup', 'APPROVED', 26, 6),
(37, '2021-02-09', '22:54:00', '2021-02-13', 'Follow-up', 'PENDING', 26, 7);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address_line1` varchar(95) NOT NULL,
  `address_line2` varchar(95) NOT NULL,
  `address_city` varchar(35) NOT NULL,
  `address_state` varchar(30) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `creation_date` varchar(30) NOT NULL,
  `updation_date` date NOT NULL,
  `spec_detail` varchar(30) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `username`, `password`, `fname`, `lname`, `contact_num`, `email`, `address_line1`, `address_line2`, `address_city`, `address_state`, `zip_code`, `creation_date`, `updation_date`, `spec_detail`, `admin_id`) VALUES
(6, 'dexbentley', 'tJnV4a3j', 'Dexter', 'Bentley', '09029112551', 'dexbentley@gmail.com', 'Edsa Cor Gen. Mc Arthur Ave.', 'Cubao', 'Quezon City', 'Quezon', '1109', '2016-12-29 14:25:37', '0000-00-00', 'Neurologist', 1),
(7, 'honlawson', 'bZU3eC97', 'Honey', 'Lawson', '09265612551', 'honlawson@gmail.com', 'E. Abada Street.', 'Loyola Heights', 'Quezon City', 'Metro Manila', '1108', '2018-11-20 14:25:37', '0000-00-00', 'Bones Specialist', 3),
(8, 'thomwheat', '2wFKZ5hx', 'Thomas', 'Wheatley', '09050312551', 'thomwheat@gmail.com', 'Ansons Trade Center', '800 Salazar Corner Ongpin Streets', 'Manila', 'Metro Manila', '1108', '2018-11-20 14:25:37', '0000-00-00', 'Cardiologist', 2),
(9, 'nalbar', 'rDGYm7h3', 'Nala', 'Barr', '09050312551', 'thomwheat@gmail.com', '5/F B And L Building 116 Legaspi Street', 'Legaspi Village', 'Makati City', 'Metro Manila', '1200', '2020-11-20 15:25:37', '0000-00-00', 'Dentist', 1),
(10, 'mondris', 'HHe4PcFh', 'Monica', 'Driscoll', '09185462551', 'mondris@gmail.com', '16/F Cocobank Building', 'Makati Avenue', 'Makati City', 'Metro Manila', '1200', '2017-10-19 15:25:37', '0000-00-00', 'Surgeon', 4),
(11, 'julmid', '3qFGky4W', 'Julius', 'Schmidt', '09770125359', 'julmid@gmail.com', '1540 San Marcelino St.', 'Malate', 'Manila', 'Metro Manila', '1000', '2020-10-19 15:25:37', '0000-00-00', 'General Physician', 2),
(12, 'jamswi', 'Vfh79hAd', 'Jamal', 'Swift', '09770126325', 'jamswi@gmail.com', 'Fedman Suites199 Salcedo Street', 'Legaspi Village', 'Makati City', 'Metro Manila', '1200', '2020-08-08 15:25:37', '0000-00-00', 'Homeopath', 3),
(13, 'tywel', 'ZWDMfq36', 'Tyrell', 'Welch', '09485956325', 'tywel@gmail.com', '125 West Capitol Drive', 'Kapitolyo', 'Pasig City', 'Pasig City', '1600', '2016-08-08 15:25:37', '0000-00-00', 'Obstetrician', 3),
(14, 'elkouma', 'W7bTzppA', 'Elena', 'Kouma', '09484456325', 'elkouma@gmail.com', 'PICC CCP Complex D - 431', 'Roxas Boulevard', 'Pasay City', 'Pasay City', '1300', '2017-08-08 15:25:37', '0000-00-00', 'Dermatologist', 1),
(15, 'ricoalba', 'W7bTzppA', 'Rico', 'Alba', '09215042676', 'ricoalba@gmail.com', '1801 Centerpoint Building Julia Vargas Corner Garnet Street', 'Ortigas Center', 'Pasig City', 'Pasig City', '1600', '2016-08-08 08:12:36', '0000-00-00', 'Surgeon', 4);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_log`
--

CREATE TABLE `doctor_log` (
  `doctor_log_id` int(11) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_log`
--

INSERT INTO `doctor_log` (`doctor_log_id`, `login_date_time`, `logout_date_time`, `doctor_id`) VALUES
(5, '2021-02-11 19:08:26', '2021-02-11 19:10:23', 6),
(6, '2021-02-12 17:09:06', '2021-02-12 17:24:50', 6),
(7, '2021-02-13 03:01:02', '2021-02-13 03:11:58', 6),
(8, '2021-02-13 15:45:38', '2021-02-13 15:50:30', 6),
(9, '2021-02-13 16:32:30', '2021-02-13 17:02:07', 6),
(10, '2021-02-14 09:14:07', '2021-02-14 09:23:45', 6);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `schedule_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`schedule_id`, `day`, `time_from`, `time_to`, `doctor_id`) VALUES
(1, 'Monday', '10:00:00', '17:00:00', 6),
(2, 'Wednesday', '10:00:00', '17:00:00', 7),
(3, 'Monday', '10:00:00', '15:00:00', 8),
(4, 'Tuesday', '10:00:00', '15:00:00', 9),
(5, 'Wednesday', '10:00:00', '15:00:00', 10),
(6, 'Thursday', '10:00:00', '15:00:00', 11),
(7, 'Friday', '10:00:00', '15:00:00', 12),
(8, 'Wednesday', '10:00:00', '17:00:00', 13),
(9, 'Monday', '10:00:00', '15:00:00', 14),
(10, 'Tuesday', '10:00:00', '15:00:00', 15),
(11, 'Wednesday', '07:00:00', '15:00:00', 6),
(12, 'Friday', '09:00:00', '17:00:00', 6),
(13, 'Friday', '09:00:00', '17:00:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `birth_date` varchar(30) NOT NULL,
  `sex` char(1) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address_line1` varchar(95) NOT NULL,
  `address_line2` varchar(95) NOT NULL,
  `address_city` varchar(35) NOT NULL,
  `address_state` varchar(30) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `taking_meds` tinyint(1) NOT NULL,
  `emergency_name` varchar(50) NOT NULL,
  `emergency_relation` varchar(50) NOT NULL,
  `emergency_num` varchar(15) NOT NULL,
  `registration_date` varchar(30) NOT NULL,
  `updation_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `username`, `password`, `fname`, `lname`, `birth_date`, `sex`, `contact_num`, `email`, `address_line1`, `address_line2`, `address_city`, `address_state`, `zip_code`, `marital_status`, `weight`, `height`, `taking_meds`, `emergency_name`, `emergency_relation`, `emergency_num`, `registration_date`, `updation_date`) VALUES
(25, 'patient1', 'asd', 'hello', 'world', '1999-11-20', 'm', '123', 'shawnaustin09@outlook.com', '4836D Valderama St.', 'Pio del Pilar', 'Makati City', 'NCR', '1230', 'single', 60, 173, 0, 'Manna Mateo', 'Mother', '09064672126', '2021-02-11', ''),
(26, 'patient2', 'asd', 'sample', 'text', '2020-12-11', 'f', '09178912953', 'samsantos@mymail.mapua.edu.ph', '4836D Valderama St.', 'Pio del Pilar', 'Makati City', 'NCR', '1230', 'single', 60, 173, 0, 'Manna Mateo', 'Mother', '09064672126', '2021-02-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_log`
--

CREATE TABLE `patient_log` (
  `patient_log_id` int(11) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_log`
--

INSERT INTO `patient_log` (`patient_log_id`, `login_date_time`, `logout_date_time`, `patient_id`) VALUES
(5, '2021-02-11 18:55:35', '2021-02-11 18:59:41', 25),
(6, '2021-02-11 19:00:36', '2021-02-11 19:01:21', 26),
(7, '2021-02-11 19:10:30', '2021-02-11 19:11:36', 25),
(8, '2021-02-12 17:25:11', '2021-02-12 17:25:35', 25),
(9, '2021-02-12 17:25:41', '2021-02-12 17:26:06', 26),
(10, '2021-02-13 15:34:11', '2021-02-13 15:35:59', 25),
(11, '2021-02-13 15:50:37', '2021-02-13 15:51:06', 25),
(12, '2021-02-13 15:52:31', '2021-02-13 16:31:57', 26),
(13, '2021-02-13 17:07:27', '2021-02-14 09:13:24', 25);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `spec_detail` varchar(30) NOT NULL,
  `creation_date` date NOT NULL,
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`spec_detail`, `creation_date`, `updation_date`) VALUES
('Bones Specialist', '2021-10-09', '0000-00-00'),
('Cardiologist', '2018-04-12', '0000-00-00'),
('Dentist', '2021-07-03', '0000-00-00'),
('Dermatologist', '2020-06-21', '0000-00-00'),
('General Physician', '2017-06-19', '0000-00-00'),
('Homeopath', '2020-01-29', '0000-00-00'),
('Neurologist', '2017-06-04', '0000-00-00'),
('Obstetrician', '2020-05-16', '0000-00-00'),
('Surgeon', '2017-08-08', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_no`),
  ADD KEY `to_patient` (`patient_id`),
  ADD KEY `to_doctor` (`doctor_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `to_admin` (`admin_id`),
  ADD KEY `to_specialization` (`spec_detail`);

--
-- Indexes for table `doctor_log`
--
ALTER TABLE `doctor_log`
  ADD PRIMARY KEY (`doctor_log_id`),
  ADD KEY `to_doctor_id` (`doctor_id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `doctor` (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_log`
--
ALTER TABLE `patient_log`
  ADD PRIMARY KEY (`patient_log_id`),
  ADD KEY `to_patient_id` (`patient_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`spec_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor_log`
--
ALTER TABLE `doctor_log`
  MODIFY `doctor_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patient_log`
--
ALTER TABLE `patient_log`
  MODIFY `patient_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `to_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `to_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `to_admin` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `to_specialization` FOREIGN KEY (`spec_detail`) REFERENCES `specialization` (`spec_detail`);

--
-- Constraints for table `doctor_log`
--
ALTER TABLE `doctor_log`
  ADD CONSTRAINT `to_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD CONSTRAINT `doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `patient_log`
--
ALTER TABLE `patient_log`
  ADD CONSTRAINT `to_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
